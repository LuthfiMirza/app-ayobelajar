@extends('layouts.app')

@section('content')
<style>
    .chat-history-container {
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
        font-size: 1.125rem;
        opacity: 0.9;
        margin: 0;
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

    .chat-sessions-grid {
        display: grid;
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .session-card {
        background: var(--card-bg);
        border-radius: var(--radius-lg);
        padding: 1.5rem;
        box-shadow: var(--shadow-soft);
        border: 1px solid var(--border-soft);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .session-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 32px rgba(120, 87, 193, 0.15);
        border-color: var(--accent-main);
    }

    .session-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 4px;
        background: linear-gradient(90deg, var(--accent-main), var(--accent-main-light));
    }

    .session-header {
        display: flex;
        align-items: flex-start;
        gap: 1rem;
        margin-bottom: 1rem;
    }

    .session-icon {
        width: 3rem;
        height: 3rem;
        border-radius: var(--radius-md);
        background: rgba(120, 87, 193, 0.1);
        color: var(--accent-main);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.25rem;
        flex-shrink: 0;
    }

    .session-info {
        flex: 1;
        min-width: 0;
    }

    .session-title {
        font-size: 1.125rem;
        font-weight: 700;
        color: var(--text-main);
        margin-bottom: 0.5rem;
    }

    .session-meta {
        display: flex;
        flex-wrap: wrap;
        gap: 1rem;
        font-size: 0.875rem;
        color: var(--text-light);
        margin-bottom: 0.75rem;
    }

    .session-meta-item {
        display: flex;
        align-items: center;
        gap: 0.25rem;
    }

    .session-id {
        font-family: 'Courier New', monospace;
        background: rgba(120, 87, 193, 0.1);
        color: var(--accent-main);
        padding: 0.25rem 0.5rem;
        border-radius: var(--radius-sm);
        font-size: 0.75rem;
        font-weight: 600;
    }

    .session-actions {
        display: flex;
        gap: 0.75rem;
        margin-top: 1rem;
    }

    .action-btn {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.75rem 1.25rem;
        border-radius: var(--radius-pill);
        font-weight: 600;
        font-size: 0.875rem;
        text-decoration: none;
        transition: all 0.3s ease;
        border: 2px solid transparent;
    }

    .action-btn-primary {
        background: var(--accent-primary-soft);
        color: var(--accent-main);
        border-color: var(--accent-primary-soft);
    }

    .action-btn-primary:hover {
        background: var(--accent-main);
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(120, 87, 193, 0.3);
    }

    .action-btn-secondary {
        background: rgba(239, 68, 68, 0.1);
        color: #ef4444;
        border-color: rgba(239, 68, 68, 0.2);
    }

    .action-btn-secondary:hover {
        background: #ef4444;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(239, 68, 68, 0.3);
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
        background: rgba(120, 87, 193, 0.1);
        color: var(--accent-main);
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

    .start-chat-btn {
        display: inline-flex;
        align-items: center;
        gap: 0.75rem;
        padding: 1rem 2rem;
        background: var(--accent-main);
        color: white;
        border-radius: var(--radius-pill);
        text-decoration: none;
        font-weight: 700;
        font-size: 1rem;
        transition: all 0.3s ease;
        box-shadow: 0 4px 16px rgba(120, 87, 193, 0.3);
    }

    .start-chat-btn:hover {
        background: var(--accent-main-dark);
        transform: translateY(-2px);
        box-shadow: 0 8px 24px rgba(120, 87, 193, 0.4);
    }

    .pagination-wrapper {
        display: flex;
        justify-content: center;
        margin-top: 2rem;
    }

    .pagination-wrapper nav {
        background: var(--card-bg);
        border-radius: var(--radius-lg);
        padding: 1rem;
        box-shadow: var(--shadow-soft);
        border: 1px solid var(--border-soft);
    }

    @media (max-width: 768px) {
        .chat-history-container {
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

        .header-info p {
            font-size: 1rem;
        }

        .session-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .session-meta {
            flex-direction: column;
            gap: 0.5rem;
        }

        .session-actions {
            flex-direction: column;
        }

        .empty-state {
            padding: 2rem 1rem;
        }
    }
</style>

<div class="chat-history-container">
    <!-- Page Header -->
    <div class="page-header">
        <div class="header-content">
            <div class="header-info">
                <h1>💬 Riwayat Chat</h1>
                <p>Lihat semua percakapan Anda dengan GATOT AI Assistant</p>
            </div>
            <a href="{{ route('dashboard') }}" class="back-btn">
                <i class="fas fa-arrow-left"></i>
                Kembali ke Dashboard
            </a>
        </div>
    </div>

    @if($sessions->count())
        <!-- Chat Sessions Grid -->
        <div class="chat-sessions-grid">
            @foreach($sessions as $session)
                <div class="session-card">
                    <div class="session-header">
                        <div class="session-icon">
                            <i class="fas fa-robot"></i>
                        </div>
                        <div class="session-info">
                            <h3 class="session-title">Sesi Chat dengan GATOT AI</h3>
                            <div class="session-meta">
                                <div class="session-meta-item">
                                    <i class="fas fa-calendar"></i>
                                    {{ $session->created_at->format('d M Y') }}
                                </div>
                                <div class="session-meta-item">
                                    <i class="fas fa-clock"></i>
                                    {{ $session->created_at->format('H:i') }} WIB
                                </div>
                                <div class="session-meta-item">
                                    <i class="fas fa-history"></i>
                                    {{ $session->created_at->diffForHumans() }}
                                </div>
                            </div>
                            <div class="session-id">
                                ID: {{ Str::limit($session->session_id, 20) }}
                            </div>
                        </div>
                    </div>
                    
                    <div class="session-actions">
                        <a href="{{ route('dashboard.chat-session', $session->session_id) }}" 
                           class="action-btn action-btn-primary">
                            <i class="fas fa-eye"></i>
                            Lihat Percakapan
                        </a>
                        <a href="{{ route('chatbot') }}" 
                           class="action-btn action-btn-secondary">
                            <i class="fas fa-plus"></i>
                            Chat Baru
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="pagination-wrapper">
            {{ $sessions->links() }}
        </div>
    @else
        <!-- Empty State -->
        <div class="empty-state">
            <div class="empty-state-icon">
                <i class="fas fa-comments"></i>
            </div>
            <h3>Belum Ada Riwayat Chat</h3>
            <p>Anda belum pernah menggunakan fitur chatbot GATOT AI. Mulai percakapan pertama Anda sekarang!</p>
            <a href="{{ route('chatbot') }}" class="start-chat-btn">
                <i class="fas fa-robot"></i>
                Mulai Chat dengan GATOT AI
            </a>
        </div>
    @endif
</div>
@endsection