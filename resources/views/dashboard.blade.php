@extends('layouts.app')

@section('content')
<style>
    .dashboard-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 2rem 1rem;
    }

    .welcome-card {
        background: linear-gradient(135deg, var(--accent-main) 0%, var(--accent-main-light) 100%);
        border-radius: var(--radius-xl);
        padding: 2.5rem;
        margin-bottom: 2rem;
        color: white;
        position: relative;
        overflow: hidden;
    }

    .welcome-card::before {
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

    .welcome-content {
        position: relative;
        z-index: 2;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .stat-card {
        background: var(--card-bg);
        border-radius: var(--radius-lg);
        padding: 1.5rem;
        box-shadow: var(--shadow-soft);
        border: 1px solid var(--border-soft);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .stat-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 32px rgba(120, 87, 193, 0.15);
    }

    .stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 4px;
        background: linear-gradient(90deg, var(--accent-main), var(--accent-main-light));
    }

    .stat-icon {
        width: 3rem;
        height: 3rem;
        border-radius: var(--radius-md);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.25rem;
        margin-bottom: 1rem;
    }

    .stat-purple { background: rgba(120, 87, 193, 0.1); color: var(--accent-main); }
    .stat-blue { background: rgba(59, 130, 246, 0.1); color: #3b82f6; }
    .stat-green { background: rgba(34, 197, 94, 0.1); color: #22c55e; }
    .stat-orange { background: rgba(249, 115, 22, 0.1); color: #f97316; }

    .stat-number {
        font-size: 2rem;
        font-weight: 800;
        color: var(--text-main);
        margin-bottom: 0.25rem;
    }

    .stat-label {
        font-size: 0.875rem;
        color: var(--text-light);
        font-weight: 600;
    }

    .action-buttons {
        display: flex;
        flex-wrap: wrap;
        gap: 1rem;
        margin-bottom: 2rem;
    }

    .action-btn {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.75rem 1.5rem;
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
        background: rgba(59, 130, 246, 0.1);
        color: #3b82f6;
        border-color: rgba(59, 130, 246, 0.2);
    }

    .action-btn-secondary:hover {
        background: #3b82f6;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(59, 130, 246, 0.3);
    }

    .action-btn-success {
        background: rgba(34, 197, 94, 0.1);
        color: #22c55e;
        border-color: rgba(34, 197, 94, 0.2);
    }

    .action-btn-success:hover {
        background: #22c55e;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(34, 197, 94, 0.3);
    }

    .activity-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
        gap: 2rem;
    }

    .activity-card {
        background: var(--card-bg);
        border-radius: var(--radius-lg);
        padding: 1.5rem;
        box-shadow: var(--shadow-soft);
        border: 1px solid var(--border-soft);
    }

    .activity-header {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        margin-bottom: 1.5rem;
        padding-bottom: 1rem;
        border-bottom: 2px solid var(--border-soft);
    }

    .activity-icon {
        width: 2.5rem;
        height: 2.5rem;
        border-radius: var(--radius-md);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1rem;
    }

    .activity-title {
        font-size: 1.125rem;
        font-weight: 700;
        color: var(--text-main);
    }

    .activity-item {
        padding: 1rem 0;
        border-bottom: 1px solid var(--border-soft);
        transition: all 0.3s ease;
    }

    .activity-item:last-child {
        border-bottom: none;
    }

    .activity-item:hover {
        background: rgba(120, 87, 193, 0.02);
        margin: 0 -1rem;
        padding: 1rem;
        border-radius: var(--radius-md);
    }

    .activity-content {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
    }

    .activity-info h4 {
        font-weight: 600;
        color: var(--text-main);
        margin-bottom: 0.25rem;
    }

    .activity-meta {
        font-size: 0.75rem;
        color: var(--text-light);
    }

    .activity-time {
        font-size: 0.75rem;
        color: var(--text-light);
        white-space: nowrap;
    }

    .activity-link {
        font-size: 0.75rem;
        color: var(--accent-main);
        text-decoration: none;
        font-weight: 600;
        padding: 0.25rem 0.5rem;
        border-radius: var(--radius-sm);
        transition: all 0.3s ease;
    }

    .activity-link:hover {
        background: var(--accent-primary-soft);
        transform: translateX(4px);
    }

    .empty-state {
        text-align: center;
        padding: 2rem;
        color: var(--text-light);
    }

    .empty-state i {
        font-size: 3rem;
        margin-bottom: 1rem;
        opacity: 0.5;
    }

    @media (max-width: 768px) {
        .dashboard-container {
            padding: 1rem;
        }

        .welcome-card {
            padding: 1.5rem;
        }

        .stats-grid {
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
        }

        .activity-grid {
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }

        .action-buttons {
            justify-content: center;
        }

        .activity-content {
            flex-direction: column;
            gap: 0.5rem;
        }
    }
</style>

<div class="dashboard-container">
    <!-- Welcome Section -->
    <div class="welcome-card">
        <div class="welcome-content">
            <h1 style="font-size: 2rem; font-weight: 800; margin-bottom: 0.5rem;">
                Halo, {{ $user->name }}! 👋
            </h1>
            <p style="font-size: 1.125rem; opacity: 0.9; margin-bottom: 0;">
                Selamat datang di dashboard Ayo Belajar. Berikut ringkasan aktivitas belajarmu.
            </p>
        </div>
    </div>

    <!-- Statistics Grid -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon stat-purple">
                <i class="fas fa-download"></i>
            </div>
            <div class="stat-number">{{ $stats['total_downloads'] }}</div>
            <div class="stat-label">Total Download Modul</div>
        </div>
        <div class="stat-card">
            <div class="stat-icon stat-blue">
                <i class="fas fa-robot"></i>
            </div>
            <div class="stat-number">{{ $stats['total_chat_messages'] }}</div>
            <div class="stat-label">Total Pesan ChatBot</div>
        </div>
        <div class="stat-card">
            <div class="stat-icon stat-green">
                <i class="fas fa-comments"></i>
            </div>
            <div class="stat-number">{{ $stats['total_chat_sessions'] }}</div>
            <div class="stat-label">Sesi Chat</div>
        </div>
        <div class="stat-card">
            <div class="stat-icon stat-orange">
                <i class="fas fa-calendar-alt"></i>
            </div>
            <div class="stat-number">{{ $stats['this_month_downloads'] }}</div>
            <div class="stat-label">Download Bulan Ini</div>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="action-buttons">
        <a href="{{ route('dashboard.profile') }}" class="action-btn action-btn-primary">
            <i class="fas fa-user"></i> Kelola Profil
        </a>
        <a href="{{ route('dashboard.download-history') }}" class="action-btn action-btn-secondary">
            <i class="fas fa-download"></i> Riwayat Download
        </a>
        <a href="{{ route('dashboard.chat-history') }}" class="action-btn action-btn-success">
            <i class="fas fa-comments"></i> Riwayat Chat
        </a>
    </div>

    <!-- Activity Grid -->
    <div class="activity-grid">
        <!-- Recent Downloads -->
        <div class="activity-card">
            <div class="activity-header">
                <div class="activity-icon stat-purple">
                    <i class="fas fa-download"></i>
                </div>
                <div class="activity-title">Download Terakhir</div>
            </div>
            @if($recentDownloads->count())
                @foreach($recentDownloads as $d)
                    <div class="activity-item">
                        <div class="activity-content">
                            <div class="activity-info">
                                <h4>{{ $d->module_title }}</h4>
                                <div class="activity-meta">{{ $d->module_subject }} • {{ $d->module_level }}</div>
                            </div>
                            <div class="activity-time">{{ $d->downloaded_at->format('d M Y') }}</div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="empty-state">
                    <i class="fas fa-download"></i>
                    <p>Belum ada download modul</p>
                </div>
            @endif
        </div>

        <!-- Recent Chat Sessions -->
        <div class="activity-card">
            <div class="activity-header">
                <div class="activity-icon stat-green">
                    <i class="fas fa-comments"></i>
                </div>
                <div class="activity-title">ChatBot Terakhir</div>
            </div>
            @if($chatSessions->count())
                @foreach($chatSessions as $s)
                    <div class="activity-item">
                        <div class="activity-content">
                            <div class="activity-info">
                                <h4>Sesi Chat</h4>
                                <div class="activity-meta">{{ $s->created_at->format('d M Y H:i') }}</div>
                            </div>
                            <a href="{{ route('dashboard.chat-session', $s->session_id) }}" class="activity-link">
                                Lihat Detail →
                            </a>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="empty-state">
                    <i class="fas fa-comments"></i>
                    <p>Belum ada riwayat chat</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
