<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TranslationController extends Controller
{
    // Azure Translator configuration
    private $azureKey;
    private $azureEndpoint;
    private $azureRegion;
    
    // Google Cloud Translation configuration
    private $googleApiKey;
    
    // Regional languages that are not supported by Azure
    private $regionalLanguages = ['jv', 'su', 'mad', 'min', 'bug'];
    
    // Azure supported languages
    private $azureSupportedLanguages = [
        'id' => 'id',      // Indonesian
        'en' => 'en',      // English
        'ar' => 'ar',      // Arabic
        'de' => 'de',      // German
        'fr' => 'fr',      // French
        'es' => 'es',      // Spanish
        'pt' => 'pt',      // Portuguese
        'ru' => 'ru',      // Russian
        'ja' => 'ja',      // Japanese
        'ko' => 'ko',      // Korean
        'zh' => 'zh',      // Chinese
        'th' => 'th',      // Thai
        'vi' => 'vi',      // Vietnamese
        'ms' => 'ms',      // Malay
        'tl' => 'tl',      // Filipino
    ];

    public function __construct()
    {
        // Load API keys from environment or config
        $this->azureKey = env('AZURE_TRANSLATOR_KEY', '');
        $this->azureEndpoint = env('AZURE_TRANSLATOR_ENDPOINT', 'https://api.cognitive.microsofttranslator.com');
        $this->azureRegion = env('AZURE_TRANSLATOR_REGION', 'eastasia');
        $this->googleApiKey = env('GOOGLE_TRANSLATE_API_KEY', '');
    }

    /**
     * Main translation endpoint
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

            // Log the request for debugging
            Log::info('Translation request', [
                'text' => $text,
                'from' => $fromLang,
                'to' => $toLang
            ]);

            // Determine which API to use based on language support
            $translatedText = $this->determineTranslationStrategy($text, $fromLang, $toLang);
            
            return response()->json([
                'success' => true,
                'translated_text' => $translatedText,
                'from' => $fromLang,
                'to' => $toLang,
                'api_used' => $this->getApiUsed($fromLang, $toLang)
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'error' => 'Validation failed',
                'details' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            Log::error('Translation error: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString()
            ]);
            
            return response()->json([
                'success' => false,
                'error' => 'Translation failed. Please try again.',
                'details' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Determine which translation strategy to use
     */
    private function determineTranslationStrategy(string $text, string $fromLang, string $toLang): string
    {
        // Check if both languages are supported by Azure
        if ($this->canUseAzure($fromLang, $toLang)) {
            return $this->translateWithAzure($text, $fromLang, $toLang);
        }
        
        // Use Google for regional languages
        return $this->translateWithGoogle($text, $fromLang, $toLang);
    }

    /**
     * Check if Azure can handle both languages
     */
    private function canUseAzure(string $fromLang, string $toLang): bool
    {
        return isset($this->azureSupportedLanguages[$fromLang]) && 
               isset($this->azureSupportedLanguages[$toLang]);
    }

    /**
     * Translate using Microsoft Azure Translator
     */
    private function translateWithAzure(string $text, string $fromLang, string $toLang): string
    {
        if (empty($this->azureKey)) {
            throw new \Exception('Azure Translator API key not configured');
        }

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
     * Translate using Google Cloud Translation API
     */
    private function translateWithGoogle(string $text, string $fromLang, string $toLang): string
    {
        if (empty($this->googleApiKey)) {
            throw new \Exception('Google Translate API key not configured');
        }

        $url = 'https://translation.googleapis.com/language/translate/v2?key=' . $this->googleApiKey;
        
        $response = Http::post($url, [
            'q' => $text,
            'source' => $fromLang,
            'target' => $toLang,
            'format' => 'text'
        ]);

        if (!$response->successful()) {
            throw new \Exception('Google translation failed: ' . $response->body());
        }

        $result = $response->json();
        
        if (!isset($result['data']['translations'][0]['translatedText'])) {
            throw new \Exception('Invalid response from Google Translate');
        }

        return $result['data']['translations'][0]['translatedText'];
    }

    /**
     * Get which API was used for the translation
     */
    private function getApiUsed(string $fromLang, string $toLang): string
    {
        if ($this->canUseAzure($fromLang, $toLang)) {
            return 'Microsoft Azure Translator';
        }
        return 'Google Cloud Translation';
    }

    /**
     * Get supported languages
     */
    public function getSupportedLanguages(): JsonResponse
    {
        $languages = [
            // Azure supported languages
            'id' => 'Bahasa Indonesia',
            'en' => 'English',
            'ar' => 'العربية (Arabic)',
            'de' => 'Deutsch (German)',
            'fr' => 'Français (French)',
            'es' => 'Español (Spanish)',
            'pt' => 'Português (Portuguese)',
            'ru' => 'Русский (Russian)',
            'ja' => '日本語 (Japanese)',
            'ko' => '한국어 (Korean)',
            'zh' => '中文 (Chinese)',
            'th' => 'ไทย (Thai)',
            'vi' => 'Tiếng Việt (Vietnamese)',
            'ms' => 'Bahasa Melayu (Malay)',
            'tl' => 'Filipino',
            
            // Regional languages (Google fallback)
            'jv' => 'Bahasa Jawa',
            'su' => 'Bahasa Sunda',
            'mad' => 'Bahasa Madura',
            'min' => 'Bahasa Minang',
            'bug' => 'Bahasa Bugis',
        ];

        return response()->json([
            'success' => true,
            'languages' => $languages
        ]);
    }

    /**
     * Health check for translation APIs
     */
    public function healthCheck(): JsonResponse
    {
        $status = [
            'azure' => [
                'configured' => !empty($this->azureKey),
                'status' => 'unknown'
            ],
            'google' => [
                'configured' => !empty($this->googleApiKey),
                'status' => 'unknown'
            ]
        ];

        // Test Azure if configured
        if ($status['azure']['configured']) {
            try {
                $this->translateWithAzure('Hello', 'en', 'id');
                $status['azure']['status'] = 'working';
            } catch (\Exception $e) {
                $status['azure']['status'] = 'error';
                $status['azure']['error'] = $e->getMessage();
            }
        }

        // Test Google if configured
        if ($status['google']['configured']) {
            try {
                $this->translateWithGoogle('Hello', 'en', 'id');
                $status['google']['status'] = 'working';
            } catch (\Exception $e) {
                $status['google']['status'] = 'error';
                $status['google']['error'] = $e->getMessage();
            }
        }

        return response()->json([
            'success' => true,
            'apis' => $status
        ]);
    }
}