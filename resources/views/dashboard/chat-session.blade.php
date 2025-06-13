@extends('layouts.app')

@section('content')
<style>
    .chat-session-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 2rem 1rem;
    }

    .page-header {
        background: linear-gradient(135deg, var(--accent-main) 0%, var(--accent-main-light) 100%);
        border-radius: var(--radius-xl);
        padding: 2.5rem;
        margin-bottom: 2rem;
        color: white;
        position: relative;
        overflow: hidden;
    }

    .page-header::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
        animation: float 6s ease-in-out infinite;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0px) rotate(0deg); }
        50% { transform: translateY(-20px) rotate(180deg); }
    }

    .header-content {
        position: relative;
        z-index: 2;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 1rem;
    }

    .header-info h1 {
        font-size: 2rem;
        font-weight: 800;
        margin-bottom: 0.5rem;
    }

    .header-info p {
        font-size: 1rem;
        opacity: 0.9;
        margin: 0;
        font-family: 'Courier New', monospace;
        background: rgba(255, 255, 255, 0.2);
        padding: 0.5rem 1rem;
        border-radius: var(--radius-pill);
        backdrop-filter: blur(10px);
    }

    .back-btn {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.75rem 1.5rem;
        background: rgba(255, 255, 255, 0.2);
        color: white;
        border-radius: var(--radius-pill);
        text-decoration: none;
        font-weight: 600;
        font-size: 0.875rem;
        transition: all 0.3s ease;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.3);
    }

    .back-btn:hover {
        background: rgba(255, 255, 255, 0.3);
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    }

    .chat-container {
        background: var(--card-bg);
        border-radius: var(--radius-xl);
        box-shadow: var(--shadow-soft);
        border: 1px solid var(--border-soft);
        overflow: hidden;
        margin-bottom: 2rem;
    }

    .chat-messages {
        max-height: 600px;
        overflow-y: auto;
        padding: 2rem;
        background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
    }

    .chat-messages::-webkit-scrollbar {
        width: 8px;
    }

    .chat-messages::-webkit-scrollbar-thumb {
        background: linear-gradient(135deg, var(--accent-main), var(--accent-main-light));
        border-radius: 10px;
    }

    .chat-messages::-webkit-scrollbar-track {
        background: rgba(226, 232, 240, 0.3);
        border-radius: 10px;
    }

    .message-wrapper {
        margin-bottom: 1.5rem;
        display: flex;
        align-items: flex-start;
        gap: 1rem;
    }

    .message-wrapper.user {
        flex-direction: row-reverse;
    }

    .message-avatar {
        width: 2.5rem;
        height: 2.5rem;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1rem;
        font-weight: 600;
        flex-shrink: 0;
    }

    .message-avatar.user {
        background: var(--accent-main);
        color: white;
    }

    .message-avatar.ai {
        background: rgba(34, 197, 94, 0.1);
        color: #22c55e;
    }

    .message-bubble {
        max-width: 70%;
        padding: 1.25rem 1.5rem;
        border-radius: var(--radius-lg);
        font-size: 0.95rem;
        line-height: 1.6;
        word-wrap: break-word;
        position: relative;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
    }

    .message-bubble.user {
        background: var(--accent-main);
        color: white;
        border-bottom-right-radius: 0.5rem;
    }

    .message-bubble.ai {
        background: white;
        color: var(--text-main);
        border: 1px solid var(--border-soft);
        border-bottom-left-radius: 0.5rem;
    }

    .message-content {
        margin-bottom: 0.5rem;
    }

    .message-time {
        font-size: 0.75rem;
        opacity: 0.7;
        text-align: right;
    }

    .message-bubble.ai .message-time {
        color: var(--text-light);
        text-align: left;
    }

    .chat-stats {
        background: var(--card-bg);
        border-radius: var(--radius-lg);
        padding: 1.5rem;
        box-shadow: var(--shadow-soft);
        border: 1px solid var(--border-soft);
        border-top: 4px solid var(--accent-main);
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1.5rem;
    }

    .stat-item {
        text-align: center;
        padding: 1rem;
        background: rgba(120, 87, 193, 0.05);
        border-radius: var(--radius-md);
    }

    .stat-icon {
        width: 2.5rem;
        height: 2.5rem;
        border-radius: 50%;
        background: var(--accent-primary-soft);
        color: var(--accent-main);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1rem;
        margin: 0 auto 0.75rem;
    }

    .stat-number {
        font-size: 1.5rem;
        font-weight: 800;
        color: var(--text-main);
        margin-bottom: 0.25rem;
    }

    .stat-label {
        font-size: 0.875rem;
        color: var(--text-light);
        font-weight: 600;
    }

    .empty-state {
        background: var(--card-bg);
        border-radius: var(--radius-xl);
        padding: 4rem 2rem;
        text-align: center;
        box-shadow: var(--shadow-soft);
        border: 1px solid var(--border-soft);
    }

    .empty-state-icon {
        width: 5rem;
        height: 5rem;
        border-radius: 50%;
        background: rgba(239, 68, 68, 0.1);
        color: #ef4444;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2.5rem;
        margin: 0 auto 1.5rem;
    }

    .empty-state h3 {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--text-main);
        margin-bottom: 0.75rem;
    }

    .empty-state p {
        font-size: 1rem;
        color: var(--text-light);
        margin-bottom: 2rem;
        max-width: 400px;
        margin-left: auto;
        margin-right: auto;
    }

    @media (max-width: 768px) {
        .chat-session-container {
            padding: 1rem;
        }

        .page-header {
            padding: 1.5rem;
        }

        .header-content {
            flex-direction: column;
            align-items: flex-start;
        }

        .header-info h1 {
            font-size: 1.5rem;
        }

        .chat-messages {
            padding: 1rem;
            max-height: 400px;
        }

        .message-bubble {
            max-width: 85%;
            padding: 1rem;
        }

        .stats-grid {
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 1rem;
        }

        .empty-state {
            padding: 2rem 1rem;
        }
    }
</style>

<div class="chat-session-container">
    <!-- Page Header -->
    <div class="page-header">
        <div class="header-content">
            <div class="header-info">
                <h1>💬 Detail Sesi Chat</h1>
                <p>Session ID: {{ $sessionId }}</p>
            </div>
            <a href="{{ route('dashboard.chat-history') }}" class="back-btn">
                <i class="fas fa-arrow-left"></i>
                Kembali ke Riwayat
            </a>
        </div>
    </div>

    @if($messages->count())
        <!-- Chat Container -->
        <div class="chat-container">
            <div class="chat-messages">
                @foreach($messages as $message)
                    <div class="message-wrapper {{ $message->message_type }}">
                        <div class="message-avatar {{ $message->message_type }}">
                            @if($message->message_type === 'user')
                                <i class="fas fa-user"></i>
                            @else
                                <i class="fas fa-robot"></i>
                            @endif
                        </div>
                        <div class="message-bubble {{ $message->message_type }}">
                            <div class="message-content">
                                @if($message->message_type === 'user' && is_string($message->message_content) && str_starts_with($message->message_content, '['))
                                    @php
                                        $content = json_decode($message->message_content, true);
                                        $textContent = '';
                                        if (is_array($content)) {
                                            foreach ($content as $item) {
                                                if (isset($item['type']) && $item['type'] === 'text') {
                                                    $textContent .= $item['text'] . ' ';
                                                }
                                            }
                                        }
                                    @endphp
                                    {{ trim($textContent) ?: $message->message_content }}
                                @else
                                    {!! nl2br(e($message->message_content)) !!}
                                @endif
                            </div>
                            <div class="message-time">
                                {{ $message->sent_at->format('H:i') }} WIB
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Chat Statistics -->
        <div class="chat-stats">
            <div class="stats-grid">
                <div class="stat-item">
                    <div class="stat-icon">
                        <i class="fas fa-comments"></i>
                    </div>
                    <div class="stat-number">{{ $messages->count() }}</div>
                    <div class="stat-label">Total Pesan</div>
                </div>
                <div class="stat-item">
                    <div class="stat-icon">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="stat-number">{{ $messages->where('message_type', 'user')->count() }}</div>
                    <div class="stat-label">Pesan Anda</div>
                </div>
                <div class="stat-item">
                    <div class="stat-icon">
                        <i class="fas fa-robot"></i>
                    </div>
                    <div class="stat-number">{{ $messages->where('message_type', 'assistant')->count() }}</div>
                    <div class="stat-label">Respon GATOT AI</div>
                </div>
                <div class="stat-item">
                    <div class="stat-icon">
                        <i class="fas fa-calendar"></i>
                    </div>
                    <div class="stat-number">{{ $messages->first()->sent_at->format('d M') }}</div>
                    <div class="stat-label">Tanggal Chat</div>
                </div>
            </div>
        </div>
    @else
        <!-- Empty State -->
        <div class="empty-state">
            <div class="empty-state-icon">
                <i class="fas fa-comment-slash"></i>
            </div>
            <h3>Tidak Ada Pesan</h3>
            <p>Sesi chat ini tidak memiliki pesan atau telah dihapus.</p>
        </div>
    @endif
</div>
@endsection