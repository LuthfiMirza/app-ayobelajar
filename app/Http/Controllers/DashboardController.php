<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Show the dashboard.
     */
    public function index()
    {
        $user = Auth::user();
        
        // Get recent downloads
        $recentDownloads = $user->recentDownloads(5);
        
        // Get chat sessions
        $chatSessions = $user->chatSessions()->take(5)->get();
        
        // Get statistics
        $stats = [
            'total_downloads' => $user->downloadHistories()->count(),
            'total_chat_messages' => $user->chatHistories()->count(),
            'total_chat_sessions' => $user->chatHistories()->distinct('session_id')->count(),
            'this_month_downloads' => $user->downloadHistories()
                ->whereMonth('downloaded_at', now()->month)
                ->whereYear('downloaded_at', now()->year)
                ->count(),
        ];

        return view('dashboard', compact('user', 'recentDownloads', 'chatSessions', 'stats'));
    }

    /**
     * Show download history.
     */
    public function downloadHistory()
    {
        $user = Auth::user();
        $downloads = $user->downloadHistories()
                          ->orderBy('downloaded_at', 'desc')
                          ->paginate(20);

        return view('dashboard.download-history', compact('downloads'));
    }

    /**
     * Show chat history.
     */
    public function chatHistory()
    {
        $user = Auth::user();
        $sessions = $user->chatHistories()
                         ->select('session_id', DB::raw('MIN(created_at) as created_at'))
                         ->groupBy('session_id')
                         ->orderBy('created_at', 'desc')
                         ->paginate(10);

        return view('dashboard.chat-history', compact('sessions'));
    }

    /**
     * Show specific chat session.
     */
    public function chatSession($sessionId)
    {
        $user = Auth::user();
        $messages = $user->chatHistories()
                         ->where('session_id', $sessionId)
                         ->orderBy('sent_at', 'asc')
                         ->get();

        if ($messages->isEmpty()) {
            abort(404);
        }

        return view('dashboard.chat-session', compact('messages', 'sessionId'));
    }

    /**
     * Show profile.
     */
    public function profile()
    {
        $user = Auth::user();
        return view('dashboard.profile', compact('user'));
    }

    /**
     * Update profile.
     */
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'phone' => ['nullable', 'string', 'max:20'],
            'school' => ['nullable', 'string', 'max:255'],
            'level' => ['nullable', 'in:SD,SMP,SMA,Guru,Umum'],
            'region' => ['nullable', 'string', 'max:255'],
        ]);

        $user->update($request->only(['name', 'email', 'phone', 'school', 'level', 'region']));

        return redirect()->route('dashboard.profile')->with('success', 'Profil berhasil diperbarui.');
    }
}
