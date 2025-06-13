<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GuestUsageMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $service): Response
    {
        // If user is authenticated, allow unlimited access
        if (auth()->check()) {
            return $next($request);
        }

        // For guest users, check usage limits using session
        $sessionKey = "guest_{$service}_usage";
        $currentUsage = session($sessionKey, 0);

        // Define limits for each service
        $limits = [
            'chatbot' => 1,
            'translator' => 1,
        ];

        $limit = $limits[$service] ?? 1;

        // Check if limit exceeded
        if ($currentUsage >= $limit) {
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'error' => 'Batas penggunaan tercapai',
                    'message' => "Anda telah mencapai batas penggunaan {$service} untuk pengguna yang belum login. Silakan daftar untuk menggunakan fitur ini tanpa batas.",
                    'requires_registration' => true,
                    'register_url' => route('register'),
                    'login_url' => route('login')
                ], 429);
            }

            // For web requests, redirect to registration with message
            return redirect()->route('register')->with('info', 
                "Anda telah mencapai batas penggunaan {$service}. Silakan daftar untuk menggunakan fitur ini tanpa batas."
            );
        }

        // Increment usage counter
        session([$sessionKey => $currentUsage + 1]);

        return $next($request);
    }
}