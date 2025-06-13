@extends('layouts.app')

@section('content')
<style>
    .download-history-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 2rem 1rem;
    }

    .page-header {
        background: linear-gradient(135deg, var(--accent-main) 0%, var(--accent-main-light) 100%);
        border-radius: var(--radius-xl);
        padding: 2rem;
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
        animation: headerFloat 8s ease-in-out infinite;
    }

    @keyframes headerFloat {
        0%, 100% { transform: translateY(0px) rotate(0deg); }
        50% { transform: translateY(-15px) rotate(180deg); }
    }

    .header-content {
        position: relative;
        z-index: 2;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .header-title {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .header-icon {
        width: 3rem;
        height: 3rem;
        background: rgba(255, 255, 255, 0.2);
        border-radius: var(--radius-md);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
    }

    .header-text h1 {
        font-size: 1.75rem;
        font-weight: 800;
        margin-bottom: 0.25rem;
    }

    .header-text p {
        opacity: 0.9;
        font-size: 1rem;
    }

    .back-btn {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.75rem 1.5rem;
        background: rgba(255, 255, 255, 0.2);
        color: white;
        text-decoration: none;
        border-radius: var(--radius-pill);
        font-weight: 600;
        font-size: 0.875rem;
        transition: all 0.3s ease;
        border: 2px solid rgba(255, 255, 255, 0.3);
    }

    .back-btn:hover {
        background: white;
        color: var(--accent-main);
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(255, 255, 255, 0.3);
    }

    .downloads-card {
        background: var(--card-bg);
        border-radius: var(--radius-xl);
        box-shadow: var(--shadow-soft);
        border: 1px solid var(--border-soft);
        overflow: hidden;
    }

    .downloads-header {
        padding: 1.5rem 2rem;
        background: linear-gradient(135deg, var(--accent-primary-soft) 0%, rgba(230, 217, 255, 0.5) 100%);
        border-bottom: 1px solid var(--border-soft);
    }

    .downloads-stats {
        display: flex;
        align-items: center;
        gap: 1rem;
        flex-wrap: wrap;
    }

    .stat-item {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 1rem;
        background: white;
        border-radius: var(--radius-pill);
        font-size: 0.875rem;
        font-weight: 600;
        color: var(--text-main);
        box-shadow: 0 2px 8px rgba(120, 87, 193, 0.1);
    }

    .stat-icon {
        width: 1.5rem;
        height: 1.5rem;
        background: var(--accent-main);
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.75rem;
    }

    .downloads-grid {
        padding: 2rem;
    }

    .download-item {
        background: white;
        border: 1px solid var(--border-soft);
        border-radius: var(--radius-lg);
        padding: 1.5rem;
        margin-bottom: 1rem;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .download-item::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 4px;
        height: 100%;
        background: linear-gradient(135deg, var(--accent-main), var(--accent-main-light));
    }

    .download-item:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(120, 87, 193, 0.15);
        border-color: var(--accent-main);
    }

    .download-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 1rem;
    }

    .download-info {
        flex: 1;
    }

    .download-title {
        font-size: 1.125rem;
        font-weight: 700;
        color: var(--text-main);
        margin-bottom: 0.5rem;
        line-height: 1.4;
    }

    .download-filename {
        font-size: 0.875rem;
        color: var(--text-light);
        font-family: 'Courier New', monospace;
        background: var(--accent-primary-soft);
        padding: 0.25rem 0.5rem;
        border-radius: var(--radius-sm);
        display: inline-block;
    }

    .download-meta {
        display: flex;
        flex-wrap: wrap;
        gap: 0.75rem;
        margin-top: 1rem;
    }

    .meta-item {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.875rem;
    }

    .meta-icon {
        width: 1.25rem;
        height: 1.25rem;
        border-radius: var(--radius-sm);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.75rem;
    }

    .subject-icon {
        background: rgba(59, 130, 246, 0.1);
        color: #3b82f6;
    }

    .level-icon {
        background: rgba(34, 197, 94, 0.1);
        color: #22c55e;
    }

    .size-icon {
        background: rgba(249, 115, 22, 0.1);
        color: #f97316;
    }

    .date-icon {
        background: rgba(168, 85, 247, 0.1);
        color: #a855f7;
    }

    .subject-badge {
        padding: 0.25rem 0.75rem;
        background: rgba(59, 130, 246, 0.1);
        color: #3b82f6;
        border-radius: var(--radius-pill);
        font-size: 0.75rem;
        font-weight: 600;
    }

    .level-badge {
        padding: 0.25rem 0.75rem;
        background: rgba(34, 197, 94, 0.1);
        color: #22c55e;
        border-radius: var(--radius-pill);
        font-size: 0.75rem;
        font-weight: 600;
    }

    .empty-state {
        text-align: center;
        padding: 4rem 2rem;
        color: var(--text-light);
    }

    .empty-icon {
        width: 5rem;
        height: 5rem;
        background: var(--accent-primary-soft);
        color: var(--accent-main);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        margin: 0 auto 1.5rem;
        animation: pulse 2s infinite;
    }

    @keyframes pulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.05); }
    }

    .empty-title {
        font-size: 1.25rem;
        font-weight: 700;
        color: var(--text-main);
        margin-bottom: 0.5rem;
    }

    .empty-description {
        font-size: 1rem;
        margin-bottom: 2rem;
        max-width: 400px;
        margin-left: auto;
        margin-right: auto;
    }

    .explore-btn {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 1rem 2rem;
        background: linear-gradient(135deg, var(--accent-main) 0%, var(--accent-main-light) 100%);
        color: white;
        text-decoration: none;
        border-radius: var(--radius-pill);
        font-weight: 700;
        font-size: 1rem;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(120, 87, 193, 0.3);
    }

    .explore-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(120, 87, 193, 0.4);
    }

    .pagination-wrapper {
        padding: 2rem;
        border-top: 1px solid var(--border-soft);
        background: var(--accent-primary-soft);
    }

    @media (max-width: 768px) {
        .download-history-container {
            padding: 1rem;
        }

        .page-header {
            padding: 1.5rem;
        }

        .header-content {
            flex-direction: column;
            gap: 1rem;
            text-align: center;
        }

        .header-title {
            flex-direction: column;
            text-align: center;
        }

        .downloads-grid {
            padding: 1rem;
        }

        .download-header {
            flex-direction: column;
            gap: 1rem;
        }

        .download-meta {
            flex-direction: column;
            gap: 0.5rem;
        }

        .downloads-stats {
            justify-content: center;
        }
    }
</style>

<div class="download-history-container">
    <!-- Page Header -->
    <div class="page-header">
        <div class="header-content">
            <div class="header-title">
                <div class="header-icon">
                    <i class="fas fa-download"></i>
                </div>
                <div class="header-text">
                    <h1>Riwayat Download</h1>
                    <p>Kelola dan lihat semua modul yang telah Anda unduh</p>
                </div>
            </div>
            <a href="{{ route('dashboard') }}" class="back-btn">
                <i class="fas fa-arrow-left"></i> Kembali ke Dashboard
            </a>
        </div>
    </div>

    <!-- Downloads Card -->
    <div class="downloads-card">
        @if($downloads->count())
            <!-- Downloads Header with Stats -->
            <div class="downloads-header">
                <div class="downloads-stats">
                    <div class="stat-item">
                        <div class="stat-icon">
                            <i class="fas fa-file"></i>
                        </div>
                        <span>{{ $downloads->total() }} Total Download</span>
                    </div>
                    <div class="stat-item">
                        <div class="stat-icon">
                            <i class="fas fa-calendar"></i>
                        </div>
                        <span>{{ $downloads->where('downloaded_at', '>=', now()->startOfMonth())->count() }} Bulan Ini</span>
                    </div>
                </div>
            </div>

            <!-- Downloads Grid -->
            <div class="downloads-grid">
                @foreach($downloads as $download)
                    <div class="download-item">
                        <div class="download-header">
                            <div class="download-info">
                                <h3 class="download-title">{{ $download->module_title }}</h3>
                                <div class="download-filename">
                                    <i class="fas fa-file-alt"></i> {{ $download->file_name }}
                                </div>
                            </div>
                        </div>
                        
                        <div class="download-meta">
                            <div class="meta-item">
                                <div class="meta-icon subject-icon">
                                    <i class="fas fa-book"></i>
                                </div>
                                <span class="subject-badge">{{ $download->module_subject }}</span>
                            </div>
                            
                            <div class="meta-item">
                                <div class="meta-icon level-icon">
                                    <i class="fas fa-graduation-cap"></i>
                                </div>
                                <span class="level-badge">{{ $download->module_level }}</span>
                            </div>
                            
                            <div class="meta-item">
                                <div class="meta-icon size-icon">
                                    <i class="fas fa-hdd"></i>
                                </div>
                                <span>{{ $download->formatted_file_size ?? 'Unknown' }}</span>
                            </div>
                            
                            <div class="meta-item">
                                <div class="meta-icon date-icon">
                                    <i class="fas fa-clock"></i>
                                </div>
                                <span>{{ $download->downloaded_at->format('d M Y, H:i') }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            @if($downloads->hasPages())
                <div class="pagination-wrapper">
                    {{ $downloads->links() }}
                </div>
            @endif
        @else
            <!-- Empty State -->
            <div class="empty-state">
                <div class="empty-icon">
                    <i class="fas fa-download"></i>
                </div>
                <h3 class="empty-title">Belum Ada Riwayat Download</h3>
                <p class="empty-description">
                    Anda belum pernah mendownload modul pembelajaran. Mulai jelajahi koleksi modul kami dan tingkatkan pengetahuan Anda!
                </p>
                <a href="{{ route('modul') }}" class="explore-btn">
                    <i class="fas fa-search"></i> Jelajahi Modul
                </a>
            </div>
        @endif
    </div>
</div>
@endsection