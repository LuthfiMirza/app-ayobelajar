<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ChatbotService
{
    protected $useAzureOpenAI;
    protected $endpoint;
    protected $apiKey;
    protected $deploymentName;
    protected $apiVersion;

    public function __construct()
    {
        $this->endpoint = config('services.azure_openai.endpoint');
        $this->apiKey = config('services.azure_openai.api_key');
        $this->deploymentName = config('services.azure_openai.deployment_name');
        $this->apiVersion = config('services.azure_openai.api_version');
        
        // Check if Azure OpenAI is properly configured
        $this->useAzureOpenAI = !empty($this->endpoint) && 
                               !empty($this->apiKey) && 
                               !empty($this->deploymentName) &&
                               $this->isValidApiKey($this->apiKey);
    }

    private function isValidApiKey($apiKey)
    {
        // Basic validation - Azure OpenAI keys are typically 32+ characters
        return !empty($apiKey) && 
               strlen($apiKey) >= 32 && 
               !str_contains($apiKey, 'your_') && 
               !str_contains($apiKey, 'example');
    }

    public function sendMessage(array $messages, array $options = [])
    {
        // Force Azure OpenAI usage - no fallback
        if (!$this->useAzureOpenAI) {
            throw new \Exception('Azure OpenAI is not configured. Please check your .env configuration and ensure model deployment exists.');
        }
        
        return $this->sendToAzureOpenAI($messages, $options);
    }

    private function sendToAzureOpenAI(array $messages, array $options = [])
    {
        try {
            $apiUrl = "{$this->endpoint}openai/deployments/{$this->deploymentName}/chat/completions?api-version={$this->apiVersion}";

            $payload = [
                'messages' => $messages,
                'temperature' => $options['temperature'] ?? 0.7,
                'max_tokens' => $options['max_tokens'] ?? 2048,
                'top_p' => 1,
                'frequency_penalty' => 0,
                'presence_penalty' => 0
            ];

            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'api-key' => $this->apiKey
            ])->timeout(60)->post($apiUrl, $payload);

            if (!$response->successful()) {
                $errorData = $response->json();
                Log::error('Azure OpenAI API Error', [
                    'status' => $response->status(),
                    'error' => $errorData
                ]);

                // Throw exception instead of fallback
                $errorMessage = $errorData['error']['message'] ?? 'Unknown Azure OpenAI error';
                throw new \Exception("Azure OpenAI API Error: {$errorMessage}");
            }

            return [
                'success' => true,
                'data' => $response->json(),
                'source' => 'azure_openai'
            ];

        } catch (\Exception $e) {
            Log::error('Azure OpenAI Exception', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            // Re-throw exception instead of fallback
            throw $e;
        }
    }

    private function sendToFallbackBot(array $messages, array $options = [])
    {
        // Get the last user message
        $userMessage = '';
        foreach (array_reverse($messages) as $message) {
            if (isset($message['role']) && $message['role'] === 'user') {
                $userMessage = is_string($message['content']) ? $message['content'] : 
                              (is_array($message['content']) ? json_encode($message['content']) : '');
                break;
            }
        }

        // Generate response based on keywords
        $response = $this->generateFallbackResponse($userMessage);

        return [
            'success' => true,
            'data' => [
                'choices' => [
                    [
                        'message' => [
                            'content' => $response,
                            'role' => 'assistant'
                        ]
                    ]
                ],
                'usage' => [
                    'prompt_tokens' => 0,
                    'completion_tokens' => 0,
                    'total_tokens' => 0
                ]
            ],
            'source' => 'fallback_bot'
        ];
    }

    private function generateFallbackResponse($userMessage)
    {
        $userMessage = strtolower($userMessage);

        // Responses for common educational topics
        $responses = [
            // Matematika
            'matematika' => 'Matematika adalah ilmu yang mempelajari pola, struktur, dan hubungan. Saya dapat membantu dengan topik seperti aljabar, geometri, kalkulus, dan statistik. Apa yang ingin Anda pelajari?',
            'aljabar' => 'Aljabar adalah cabang matematika yang menggunakan simbol dan huruf untuk mewakili angka dalam persamaan. Konsep dasar meliputi variabel, persamaan linear, dan fungsi.',
            'geometri' => 'Geometri mempelajari bentuk, ukuran, dan sifat ruang. Meliputi titik, garis, sudut, bangun datar, dan bangun ruang.',
            
            // Fisika
            'fisika' => 'Fisika mempelajari materi, energi, dan interaksinya. Topik utama meliputi mekanika, termodinamika, elektromagnetisme, dan fisika modern.',
            'gaya' => 'Gaya adalah dorongan atau tarikan yang dapat mengubah keadaan gerak suatu benda. Hukum Newton menjelaskan hubungan antara gaya, massa, dan percepatan.',
            
            // Kimia
            'kimia' => 'Kimia mempelajari komposisi, struktur, dan sifat materi serta perubahan yang terjadi. Meliputi atom, molekul, reaksi kimia, dan ikatan kimia.',
            'atom' => 'Atom adalah unit terkecil dari unsur yang masih mempertahankan sifat kimianya. Terdiri dari proton, neutron, dan elektron.',
            
            // Biologi
            'biologi' => 'Biologi mempelajari makhluk hidup dan proses kehidupan. Meliputi sel, genetika, evolusi, ekologi, dan anatomi.',
            'sel' => 'Sel adalah unit dasar kehidupan. Ada dua jenis utama: sel prokariotik (tanpa inti) dan sel eukariotik (dengan inti).',
            
            // Bahasa Indonesia
            'bahasa indonesia' => 'Bahasa Indonesia adalah bahasa resmi Indonesia. Saya dapat membantu dengan tata bahasa, sastra, dan keterampilan menulis.',
            'puisi' => 'Puisi adalah karya sastra yang menggunakan bahasa yang padat, berima, dan berirama untuk mengekspresikan perasaan atau gagasan.',
            
            // Sejarah
            'sejarah' => 'Sejarah mempelajari peristiwa masa lalu dan dampaknya terhadap masa kini. Meliputi sejarah Indonesia, dunia, dan peradaban.',
            'kemerdekaan' => 'Indonesia merdeka pada 17 Agustus 1945. Proklamasi dibacakan oleh Soekarno-Hatta di Jakarta.',
            
            // Geografi
            'geografi' => 'Geografi mempelajari permukaan bumi, iklim, penduduk, dan aktivitas manusia. Meliputi geografi fisik dan geografi manusia.',
            
            // Umum
            'belajar' => 'Belajar adalah proses memperoleh pengetahuan dan keterampilan. Tips belajar efektif: buat jadwal, cari tempat tenang, dan latihan rutin.',
            'ujian' => 'Persiapan ujian yang baik meliputi: review materi secara berkala, buat ringkasan, latihan soal, dan istirahat cukup.',
        ];

        // Check for keywords in user message
        foreach ($responses as $keyword => $response) {
            if (str_contains($userMessage, $keyword)) {
                return $response;
            }
        }

        // Default responses based on question patterns
        if (str_contains($userMessage, '?') || str_contains($userMessage, 'apa') || str_contains($userMessage, 'bagaimana')) {
            return 'Terima kasih atas pertanyaan Anda! Saya adalah GATOT AI, asisten pembelajaran yang siap membantu. Meskipun saat ini saya menggunakan sistem dasar, saya tetap dapat membantu dengan topik-topik pembelajaran seperti matematika, fisika, kimia, biologi, bahasa Indonesia, sejarah, dan geografi. Silakan tanyakan topik spesifik yang ingin Anda pelajari!';
        }

        if (str_contains($userMessage, 'halo') || str_contains($userMessage, 'hai') || str_contains($userMessage, 'hello')) {
            return 'Halo! Saya GATOT AI, asisten pembelajaran Anda. Saya siap membantu dengan berbagai mata pelajaran. Apa yang ingin Anda pelajari hari ini?';
        }

        if (str_contains($userMessage, 'terima kasih') || str_contains($userMessage, 'thanks')) {
            return 'Sama-sama! Saya senang bisa membantu. Jangan ragu untuk bertanya lagi jika ada yang ingin dipelajari. Semangat belajar!';
        }

        // Default response
        return 'Saya GATOT AI, asisten pembelajaran Anda. Saat ini saya menggunakan sistem dasar karena layanan AI utama sedang dalam pemeliharaan. Namun, saya tetap dapat membantu Anda dengan berbagai topik pembelajaran seperti:

📚 **Mata Pelajaran yang dapat saya bantu:**
• Matematika (aljabar, geometri, kalkulus)
• Fisika (mekanika, listrik, gelombang)
• Kimia (atom, molekul, reaksi)
• Biologi (sel, genetika, ekologi)
• Bahasa Indonesia (tata bahasa, sastra)
• Sejarah Indonesia dan dunia
• Geografi fisik dan manusia

Silakan tanyakan topik spesifik yang ingin Anda pelajari, dan saya akan memberikan penjelasan yang mudah dipahami!';
    }

    public function isAzureOpenAIAvailable()
    {
        return $this->useAzureOpenAI;
    }

    public function getStatus()
    {
        return [
            'azure_openai_configured' => $this->useAzureOpenAI,
            'endpoint' => $this->useAzureOpenAI ? $this->endpoint : 'Not configured',
            'deployment' => $this->useAzureOpenAI ? $this->deploymentName : 'Not configured',
            'fallback_active' => !$this->useAzureOpenAI
        ];
    }
}