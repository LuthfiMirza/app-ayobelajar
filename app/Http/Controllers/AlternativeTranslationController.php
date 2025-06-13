<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class AlternativeTranslationController extends Controller
{
    // Azure Translator configuration (tetap untuk bahasa internasional)
    private $azureKey;
    private $azureEndpoint;
    private $azureRegion;
    
    // Alternative APIs configuration
    private $myMemoryApiKey;
    private $yandexApiKey;
    
    // Regional languages
    private $regionalLanguages = ['jv', 'su', 'mad', 'min', 'bug'];
    
    // Azure supported languages
    private $azureSupportedLanguages = [
        'id' => 'id', 'en' => 'en', 'ar' => 'ar', 'de' => 'de', 'fr' => 'fr',
        'es' => 'es', 'pt' => 'pt', 'ru' => 'ru', 'ja' => 'ja', 'ko' => 'ko',
        'zh' => 'zh', 'th' => 'th', 'vi' => 'vi', 'ms' => 'ms', 'tl' => 'tl',
    ];

    // Local dictionary for common phrases
    private $localDictionary = [
        'jv' => [
            'halo' => 'sugeng',
            'selamat pagi' => 'sugeng enjing',
            'selamat siang' => 'sugeng siang',
            'selamat malam' => 'sugeng dalu',
            'terima kasih' => 'matur nuwun',
            'maaf' => 'nyuwun pangapunten',
            'permisi' => 'nyuwun sewu',
            'apa kabar' => 'pripun kabare',
            'baik' => 'sae',
            'tidak' => 'mboten',
            'ya' => 'inggih',
            'saya' => 'kula',
            'kamu' => 'panjenengan',
            'dia' => 'piyambakipun',
            'makan' => 'nedha',
            'minum' => 'ngombe',
            'tidur' => 'tilem',
            'rumah' => 'griya',
            'sekolah' => 'sekolahan',
            'belajar' => 'sinau',
        ],
        'su' => [
            'halo' => 'halo',
            'selamat pagi' => 'wilujeng enjing',
            'selamat siang' => 'wilujeng siang',
            'selamat malam' => 'wilujeng wengi',
            'terima kasih' => 'hatur nuhun',
            'maaf' => 'hapunten',
            'permisi' => 'punten',
            'apa kabar' => 'kumaha damang',
            'baik' => 'sae',
            'tidak' => 'henteu',
            'ya' => 'enya',
            'saya' => 'abdi',
            'kamu' => 'anjeun',
            'dia' => 'anjeunna',
            'makan' => 'tuang',
            'minum' => 'nginum',
            'tidur' => 'sar��',
            'rumah' => 'bumi',
            'sekolah' => 'sakola',
            'belajar' => 'diajar',
        ],
        'min' => [
            'halo' => 'halo',
            'selamat pagi' => 'salamaik pagi',
            'selamat siang' => 'salamaik siang',
            'selamat malam' => 'salamaik malam',
            'terima kasih' => 'tarimo kasih',
            'maaf' => 'maaf',
            'permisi' => 'permisi',
            'apa kabar' => 'apo kaba',
            'baik' => 'baiak',
            'tidak' => 'indak',
            'ya' => 'yo',
            'saya' => 'ambo',
            'kamu' => 'awak',
            'dia' => 'inyo',
            'makan' => 'makan',
            'minum' => 'minum',
            'tidur' => 'tidua',
            'rumah' => 'rumah',
            'sekolah' => 'sikola',
            'belajar' => 'balajar',
        ]
    ];

    public function __construct()
    {
        $this->azureKey = env('AZURE_TRANSLATOR_KEY', '');
        $this->azureEndpoint = env('AZURE_TRANSLATOR_ENDPOINT', 'https://api.cognitive.microsofttranslator.com');
        $this->azureRegion = env('AZURE_TRANSLATOR_REGION', 'eastasia');
        $this->myMemoryApiKey = env('MYMEMORY_API_KEY', '');
        $this->yandexApiKey = env('YANDEX_API_KEY', '');
    }

    /**
     * Main translation endpoint with multiple fallback strategies
     */
    public function translate(Request $request): JsonResponse
    {
        try {
            $request->validate([
                'text' => 'required|string|max:5000',
                'from' => 'required|string|min:2|max:3',
                'to' => 'required|string|min:2|max:3'
            ]);

            $text = $request->input('text');
            $fromLang = $request->input('from');
            $toLang = $request->input('to');

            // Check if user is guest and increment usage counter
            // This ensures ALL translation attempts are counted, regardless of API used
            if (!auth()->check()) {
                $sessionKey = "guest_translator_usage";
                $currentUsage = session($sessionKey, 0);
                
                // If this is the first request, it was already counted by middleware
                // For subsequent requests, they should have been blocked by middleware
                // This is a double-check to ensure no bypass
                if ($currentUsage > 1) {
                    return response()->json([
                        'success' => false,
                        'error' => 'Batas penggunaan tercapai',
                        'message' => 'Anda telah mencapai batas penggunaan translator untuk pengguna yang belum login. Silakan daftar untuk menggunakan fitur ini tanpa batas.',
                        'requires_registration' => true,
                        'register_url' => route('register'),
                        'login_url' => route('login')
                    ], 429);
                }
            }

            Log::info('Alternative translation request', [
                'text' => $text,
                'from' => $fromLang,
                'to' => $toLang,
                'user_authenticated' => auth()->check()
            ]);

            // Strategy 1: Use Azure for international languages
            if ($this->canUseAzure($fromLang, $toLang)) {
                $translatedText = $this->translateWithAzure($text, $fromLang, $toLang);
                $apiUsed = 'Microsoft Azure Translator';
            }
            // Strategy 2: Use local dictionary for common phrases
            elseif ($this->canUseLocalDictionary($text, $fromLang, $toLang)) {
                $translatedText = $this->translateWithLocalDictionary($text, $fromLang, $toLang);
                $apiUsed = 'Local Dictionary';
            }
            // Strategy 3: Use MyMemory API
            elseif ($this->canUseMyMemory()) {
                $translatedText = $this->translateWithMyMemory($text, $fromLang, $toLang);
                $apiUsed = 'MyMemory Translation API';
            }
            // Strategy 4: Use Yandex API
            elseif ($this->canUseYandex()) {
                $translatedText = $this->translateWithYandex($text, $fromLang, $toLang);
                $apiUsed = 'Yandex Translate';
            }
            // Strategy 5: Fallback to rule-based translation
            else {
                $translatedText = $this->translateWithRuleBased($text, $fromLang, $toLang);
                $apiUsed = 'Rule-based Translation (Limited)';
            }
            
            return response()->json([
                'success' => true,
                'translated_text' => $translatedText,
                'from' => $fromLang,
                'to' => $toLang,
                'api_used' => $apiUsed
            ]);

        } catch (\Exception $e) {
            Log::error('Alternative translation error: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'error' => 'Translation failed. Please try again.',
                'details' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Check if Azure can handle both languages
     */
    private function canUseAzure(string $fromLang, string $toLang): bool
    {
        return isset($this->azureSupportedLanguages[$fromLang]) && 
               isset($this->azureSupportedLanguages[$toLang]) &&
               !empty($this->azureKey);
    }

    /**
     * Translate using Microsoft Azure Translator
     */
    private function translateWithAzure(string $text, string $fromLang, string $toLang): string
    {
        $url = $this->azureEndpoint . '/translate?api-version=3.0&from=' . $fromLang . '&to=' . $toLang;
        
        $response = Http::withHeaders([
            'Ocp-Apim-Subscription-Key' => $this->azureKey,
            'Ocp-Apim-Subscription-Region' => $this->azureRegion,
            'Content-Type' => 'application/json',
        ])->post($url, [
            [
                'text' => $text
            ]
        ]);

        if (!$response->successful()) {
            throw new \Exception('Azure translation failed: ' . $response->body());
        }

        $result = $response->json();
        
        if (empty($result) || !isset($result[0]['translations'][0]['text'])) {
            throw new \Exception('Invalid response from Azure Translator');
        }

        return $result[0]['translations'][0]['text'];
    }

    /**
     * Check if local dictionary can handle the translation
     */
    private function canUseLocalDictionary(string $text, string $fromLang, string $toLang): bool
    {
        $text = strtolower(trim($text));
        
        // Check if translating from Indonesian to regional language
        if ($fromLang === 'id' && in_array($toLang, $this->regionalLanguages)) {
            return isset($this->localDictionary[$toLang][$text]);
        }
        
        // Check if translating from regional language to Indonesian
        if (in_array($fromLang, $this->regionalLanguages) && $toLang === 'id') {
            $dictionary = $this->localDictionary[$fromLang] ?? [];
            return in_array($text, $dictionary);
        }
        
        return false;
    }

    /**
     * Translate using local dictionary
     */
    private function translateWithLocalDictionary(string $text, string $fromLang, string $toLang): string
    {
        $text = strtolower(trim($text));
        
        // Indonesian to regional language
        if ($fromLang === 'id' && in_array($toLang, $this->regionalLanguages)) {
            return $this->localDictionary[$toLang][$text] ?? $text;
        }
        
        // Regional language to Indonesian
        if (in_array($fromLang, $this->regionalLanguages) && $toLang === 'id') {
            $dictionary = $this->localDictionary[$fromLang] ?? [];
            $flipped = array_flip($dictionary);
            return $flipped[$text] ?? $text;
        }
        
        return $text;
    }

    /**
     * Check if MyMemory API is available
     */
    private function canUseMyMemory(): bool
    {
        return true; // MyMemory has free tier without API key
    }

    /**
     * Translate using MyMemory API
     */
    private function translateWithMyMemory(string $text, string $fromLang, string $toLang): string
    {
        $url = 'https://api.mymemory.translated.net/get';
        
        $params = [
            'q' => $text,
            'langpair' => $fromLang . '|' . $toLang
        ];
        
        if (!empty($this->myMemoryApiKey)) {
            $params['key'] = $this->myMemoryApiKey;
        }
        
        $response = Http::get($url, $params);

        if (!$response->successful()) {
            throw new \Exception('MyMemory translation failed');
        }

        $result = $response->json();
        
        if (!isset($result['responseData']['translatedText'])) {
            throw new \Exception('Invalid response from MyMemory');
        }

        return $result['responseData']['translatedText'];
    }

    /**
     * Check if Yandex API is available
     */
    private function canUseYandex(): bool
    {
        return !empty($this->yandexApiKey);
    }

    /**
     * Translate using Yandex API
     */
    private function translateWithYandex(string $text, string $fromLang, string $toLang): string
    {
        $url = 'https://translate.yandex.net/api/v1.5/tr.json/translate';
        
        $response = Http::post($url, [
            'key' => $this->yandexApiKey,
            'text' => $text,
            'lang' => $fromLang . '-' . $toLang
        ]);

        if (!$response->successful()) {
            throw new \Exception('Yandex translation failed');
        }

        $result = $response->json();
        
        if (!isset($result['text'][0])) {
            throw new \Exception('Invalid response from Yandex');
        }

        return $result['text'][0];
    }

    /**
     * Rule-based translation for basic phrases
     */
    private function translateWithRuleBased(string $text, string $fromLang, string $toLang): string
    {
        $text = strtolower(trim($text));
        
        // Basic word-by-word translation for common words
        $basicWords = [
            'id' => [
                'saya' => ['jv' => 'kula', 'su' => 'abdi', 'min' => 'ambo'],
                'kamu' => ['jv' => 'panjenengan', 'su' => 'anjeun', 'min' => 'awak'],
                'dia' => ['jv' => 'piyambakipun', 'su' => 'anjeunna', 'min' => 'inyo'],
                'baik' => ['jv' => 'sae', 'su' => 'sae', 'min' => 'baiak'],
                'tidak' => ['jv' => 'mboten', 'su' => 'henteu', 'min' => 'indak'],
                'ya' => ['jv' => 'inggih', 'su' => 'enya', 'min' => 'yo'],
            ]
        ];
        
        if ($fromLang === 'id' && in_array($toLang, $this->regionalLanguages)) {
            $words = explode(' ', $text);
            $translatedWords = [];
            
            foreach ($words as $word) {
                if (isset($basicWords['id'][$word][$toLang])) {
                    $translatedWords[] = $basicWords['id'][$word][$toLang];
                } else {
                    $translatedWords[] = $word; // Keep original if no translation
                }
            }
            
            return implode(' ', $translatedWords);
        }
        
        // If no rule applies, return original text with note
        return $text . ' (Terjemahan terbatas - silakan gunakan kamus)';
    }

    /**
     * Health check for all translation services
     */
    public function healthCheck(): JsonResponse
    {
        $status = [
            'azure' => [
                'configured' => !empty($this->azureKey),
                'status' => 'unknown'
            ],
            'mymemory' => [
                'configured' => true, // Free tier available
                'status' => 'unknown'
            ],
            'yandex' => [
                'configured' => !empty($this->yandexApiKey),
                'status' => 'unknown'
            ],
            'local_dictionary' => [
                'configured' => true,
                'status' => 'working',
                'supported_languages' => array_keys($this->localDictionary)
            ]
        ];

        // Test Azure
        if ($status['azure']['configured']) {
            try {
                $this->translateWithAzure('Hello', 'en', 'id');
                $status['azure']['status'] = 'working';
            } catch (\Exception $e) {
                $status['azure']['status'] = 'error';
                $status['azure']['error'] = $e->getMessage();
            }
        }

        // Test MyMemory
        try {
            $this->translateWithMyMemory('Hello', 'en', 'id');
            $status['mymemory']['status'] = 'working';
        } catch (\Exception $e) {
            $status['mymemory']['status'] = 'error';
            $status['mymemory']['error'] = $e->getMessage();
        }

        // Test Yandex
        if ($status['yandex']['configured']) {
            try {
                $this->translateWithYandex('Hello', 'en', 'id');
                $status['yandex']['status'] = 'working';
            } catch (\Exception $e) {
                $status['yandex']['status'] = 'error';
                $status['yandex']['error'] = $e->getMessage();
            }
        }

        return response()->json([
            'success' => true,
            'apis' => $status
        ]);
    }

    /**
     * Get supported languages with their sources
     */
    public function getSupportedLanguages(): JsonResponse
    {
        $languages = [
            // Azure supported languages
            'id' => ['name' => 'Bahasa Indonesia', 'source' => 'Azure/MyMemory'],
            'en' => ['name' => 'English', 'source' => 'Azure/MyMemory'],
            'ar' => ['name' => 'العربية (Arabic)', 'source' => 'Azure/MyMemory'],
            'de' => ['name' => 'Deutsch (German)', 'source' => 'Azure/MyMemory'],
            'fr' => ['name' => 'Français (French)', 'source' => 'Azure/MyMemory'],
            'es' => ['name' => 'Español (Spanish)', 'source' => 'Azure/MyMemory'],
            'pt' => ['name' => 'Português (Portuguese)', 'source' => 'Azure/MyMemory'],
            'ru' => ['name' => 'Русский (Russian)', 'source' => 'Azure/MyMemory'],
            'ja' => ['name' => '日本語 (Japanese)', 'source' => 'Azure/MyMemory'],
            'ko' => ['name' => '한국어 (Korean)', 'source' => 'Azure/MyMemory'],
            'zh' => ['name' => '中文 (Chinese)', 'source' => 'Azure/MyMemory'],
            'th' => ['name' => 'ไทย (Thai)', 'source' => 'Azure/MyMemory'],
            'vi' => ['name' => 'Tiếng Việt (Vietnamese)', 'source' => 'Azure/MyMemory'],
            'ms' => ['name' => 'Bahasa Melayu (Malay)', 'source' => 'Azure/MyMemory'],
            'tl' => ['name' => 'Filipino', 'source' => 'Azure/MyMemory'],
            
            // Regional languages
            'jv' => ['name' => 'Bahasa Jawa', 'source' => 'Local Dictionary/MyMemory'],
            'su' => ['name' => 'Bahasa Sunda', 'source' => 'Local Dictionary/MyMemory'],
            'mad' => ['name' => 'Bahasa Madura', 'source' => 'MyMemory/Rule-based'],
            'min' => ['name' => 'Bahasa Minang', 'source' => 'Local Dictionary/MyMemory'],
            'bug' => ['name' => 'Bahasa Bugis', 'source' => 'MyMemory/Rule-based'],
        ];

        return response()->json([
            'success' => true,
            'languages' => $languages
        ]);
    }
}