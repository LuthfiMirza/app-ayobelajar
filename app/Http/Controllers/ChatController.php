<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Models\ChatHistory;
use App\Services\ChatbotService;
use Illuminate\Support\Str;

class ChatController extends Controller
{
    protected $chatbotService;

    public function __construct(ChatbotService $chatbotService)
    {
        $this->chatbotService = $chatbotService;
    }

    public function sendMessage(Request $request)
    {
        try {
            $request->validate([
                'messages' => 'required|array',
                'temperature' => 'numeric|min:0|max:2',
                'max_tokens' => 'integer|min:1|max:4096',
                'session_id' => 'nullable|string',
            ]);

            $messages = $request->input('messages');
            $temperature = $request->input('temperature', 0.7);
            $maxTokens = $request->input('max_tokens', 2048);
            $sessionId = $request->input('session_id', Str::uuid()->toString());

            // Get the current user
            $user = Auth::user();

            // Save user message to database (skip system messages) - only for authenticated users
            $lastMessage = end($messages);
            if ($user && $lastMessage && isset($lastMessage['role']) && $lastMessage['role'] === 'user') {
                $messageContent = is_array($lastMessage['content']) 
                    ? json_encode($lastMessage['content']) 
                    : $lastMessage['content'];

                ChatHistory::create([
                    'user_id' => $user->id,
                    'session_id' => $sessionId,
                    'message_type' => 'user',
                    'message_content' => $messageContent,
                    'message_metadata' => [
                        'temperature' => $temperature,
                        'max_tokens' => $maxTokens,
                        'timestamp' => now()->toISOString()
                    ],
                    'sent_at' => now(),
                ]);
            }

            // Use ChatbotService to send message
            $result = $this->chatbotService->sendMessage($messages, [
                'temperature' => $temperature,
                'max_tokens' => $maxTokens
            ]);

            if (!$result['success']) {
                return response()->json([
                    'error' => 'Chatbot service failed',
                    'message' => 'Unable to process your request at this time'
                ], 500);
            }

            // Save AI response to database - only for authenticated users
            if ($user && isset($result['data']['choices'][0]['message']['content'])) {
                ChatHistory::create([
                    'user_id' => $user->id,
                    'session_id' => $sessionId,
                    'message_type' => 'assistant',
                    'message_content' => $result['data']['choices'][0]['message']['content'],
                    'message_metadata' => [
                        'model' => $result['data']['model'] ?? 'fallback',
                        'usage' => $result['data']['usage'] ?? [],
                        'source' => $result['source'] ?? 'unknown',
                        'timestamp' => now()->toISOString()
                    ],
                    'sent_at' => now(),
                ]);
            }

            return response()->json([
                'success' => true,
                'data' => $result['data'],
                'session_id' => $sessionId,
                'source' => $result['source'] ?? 'unknown'
            ]);

        } catch (\Exception $e) {
            Log::error('Chat Controller Error', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'error' => 'Internal server error',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
