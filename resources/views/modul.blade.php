@extends('layouts.app')

@section('content')
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<style>
/* Custom styles untuk modul */
.modul-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 2rem 1rem;
}

.level-selector {
    display: flex;
    justify-content: center;
    margin-bottom: 3rem;
}

.level-toggle {
    background: white;
    border-radius: 16px;
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
    padding: 8px;
    display: inline-flex;
    gap: 4px;
}

.level-btn {
    padding: 12px 24px;
    border-radius: 12px;
    border: none;
    font-weight: 600;
    font-size: 16px;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 8px;
    background: transparent;
    color: #6b7280;
}

.level-btn.active {
    background: linear-gradient(135deg, #3b82f6, #1d4ed8);
    color: white;
    box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3);
    transform: translateY(-2px);
}

.level-btn:not(.active):hover {
    background: #f3f4f6;
    color: #374151;
}

.level-content {
    animation: fadeIn 0.5s ease-in-out;
}

.level-content.hidden {
    display: none;
}

.modul-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
    gap: 24px;
    margin-top: 2rem;
}

.modul-card {
    background: white;
    border-radius: 16px;
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
    overflow: hidden;
    transition: all 0.3s ease;
    display: flex;
    flex-direction: column;
}

.modul-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.12);
}

/* Sampul Modul */
.modul-cover {
    height: 180px;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    overflow: hidden;
}

.modul-cover.smp {
    background: linear-gradient(135deg, #3b82f6 0%, #1e40af 100%);
}

.modul-cover.sma {
    background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%);
}

.modul-cover::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse"><path d="M 10 0 L 0 0 0 10" fill="none" stroke="white" stroke-width="0.5" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23grid)"/></svg>');
    opacity: 0.3;
}

.modul-cover::after {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
    animation: float 6s ease-in-out infinite;
    pointer-events: none;
}

@keyframes float {
    0%, 100% {
        transform: translateY(0px) rotate(0deg);
    }
    50% {
        transform: translateY(-10px) rotate(180deg);
    }
}

.modul-cover-content {
    position: relative;
    z-index: 2;
    text-align: center;
    color: white;
}

.modul-cover-icon {
    width: 64px;
    height: 64px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 32px;
    margin: 0 auto 12px;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.3);
}

.modul-cover-title {
    font-size: 18px;
    font-weight: 700;
    margin-bottom: 4px;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
}

.modul-cover-subject {
    font-size: 14px;
    font-weight: 500;
    opacity: 0.9;
    background: rgba(255, 255, 255, 0.2);
    padding: 4px 12px;
    border-radius: 20px;
    display: inline-block;
    backdrop-filter: blur(10px);
}

.modul-level-badge {
    position: absolute;
    top: 12px;
    right: 12px;
    background: rgba(255, 255, 255, 0.9);
    color: #1f2937;
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
    backdrop-filter: blur(10px);
}

.modul-content {
    padding: 24px;
    flex: 1;
    display: flex;
    flex-direction: column;
}

.modul-header {
    margin-bottom: 16px;
}

.modul-title {
    font-size: 18px;
    font-weight: 700;
    color: #1f2937;
    margin-bottom: 4px;
}

.modul-subject {
    font-size: 14px;
    font-weight: 600;
    margin-bottom: 16px;
}

.modul-subject.smp {
    color: #3b82f6;
}

.modul-subject.sma {
    color: #8b5cf6;
}

.modul-description {
    color: #6b7280;
    font-size: 14px;
    line-height: 1.6;
    margin-bottom: 20px;
}

.modul-actions {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
    margin-top: auto;
    padding-top: 16px;
    border-top: 1px solid #f3f4f6;
}

.btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 10px 16px;
    border-radius: 10px;
    font-size: 14px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.2s ease;
    border: none;
    cursor: pointer;
}

.btn-detail.smp {
    background: #dbeafe;
    color: #1d4ed8;
}

.btn-detail.smp:hover {
    background: #bfdbfe;
}

.btn-detail.sma {
    background: #ede9fe;
    color: #7c3aed;
}

.btn-detail.sma:hover {
    background: #ddd6fe;
}

.btn-download {
    background: #dcfce7;
    color: #166534;
}

.btn-download:hover {
    background: #bbf7d0;
}

.btn-disabled {
    background: #f3f4f6;
    color: #9ca3af;
    cursor: not-allowed;
}

.empty-state {
    text-align: center;
    padding: 60px 20px;
    grid-column: 1 / -1;
}

.empty-state i {
    font-size: 64px;
    color: #d1d5db;
    margin-bottom: 16px;
}

.empty-state h3 {
    font-size: 20px;
    font-weight: 600;
    color: #6b7280;
    margin-bottom: 8px;
}

.empty-state p {
    color: #9ca3af;
}

.section-header {
    text-align: center;
    margin-bottom: 32px;
}

.section-title {
    font-size: 28px;
    font-weight: 700;
    color: #1f2937;
    margin-bottom: 8px;
}

.section-subtitle {
    color: #6b7280;
    font-size: 16px;
}

.page-header {
    text-align: center;
    margin-bottom: 48px;
}

.page-title {
    font-size: 36px;
    font-weight: 800;
    color: #1f2937;
    margin-bottom: 16px;
}

.page-description {
    font-size: 18px;
    color: #6b7280;
    max-width: 600px;
    margin: 0 auto;
    line-height: 1.6;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@media (max-width: 768px) {
    .modul-container {
        padding: 1rem;
    }
    
    .page-title {
        font-size: 28px;
    }
    
    .page-description {
        font-size: 16px;
    }
    
    .level-btn {
        padding: 10px 20px;
        font-size: 14px;
    }
    
    .modul-grid {
        grid-template-columns: 1fr;
        gap: 16px;
    }
    
    .modul-content {
        padding: 20px;
    }
}
</style>

<div class="modul-container">
    <!-- Page Header -->
    <div class="page-header">
        <h1 class="page-title">Modul Pembelajaran</h1>
        <p class="page-description">
            Pilih tingkat pendidikan dan unduh modul belajar yang kamu butuhkan. 
            Materi dirancang agar ringan dan mudah diakses untuk mendukung pembelajaran.
        </p>
    </div>

    <!-- Level Selection -->
    <div class="level-selector">
        <div class="level-toggle">
            <button id="smpBtn" class="level-btn active">
                <i class="fas fa-graduation-cap"></i>
                SMP
            </button>
            <button id="smaBtn" class="level-btn">
                <i class="fas fa-university"></i>
                SMA
            </button>
        </div>
    </div>

    <!-- SMP Modules -->
    <div id="smpModules" class="level-content">
        <div class="section-header">
            <h2 class="section-title">Modul SMP</h2>
            <p class="section-subtitle">Materi pembelajaran untuk tingkat Sekolah Menengah Pertama</p>
        </div>
        
        <div class="modul-grid">
            @foreach($modules->where('level', 'SMP') as $module)
                <div class="modul-card">
                    <!-- Sampul Modul -->
                    <div class="modul-cover smp">
                        <div class="modul-level-badge">SMP</div>
                        <div class="modul-cover-content">
                            <div class="modul-cover-icon">
                                <i class="{{ $module->icon }}"></i>
                            </div>
                            <h3 class="modul-cover-title">{{ $module->title }}</h3>
                            <div class="modul-cover-subject">{{ $module->subject }}</div>
                        </div>
                    </div>
                    
                    <!-- Konten Modul -->
                    <div class="modul-content">
                        <div class="modul-header">
                            <p class="modul-description">{{ $module->description }}</p>
                        </div>
                        
                        <div class="modul-actions" style="margin-top: auto;">
                            <a href="{{ route('modul.detail', $module) }}" class="btn btn-detail smp">
                                <i class="fas fa-eye"></i>
                                Detail
                            </a>
                            
                            @if($module->file_path)
                                <a href="{{ route('modul.download', $module) }}" class="btn btn-download">
                                    <i class="fas fa-download"></i>
                                    Unduh ({{ $module->file_size_formatted }})
                                </a>
                            @else
                                <span class="btn btn-disabled">
                                    <i class="fas fa-times"></i>
                                    Tidak tersedia
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
            
            @if($modules->where('level', 'SMP')->isEmpty())
                <div class="empty-state">
                    <i class="fas fa-book"></i>
                    <h3>Belum Ada Modul SMP</h3>
                    <p>Modul untuk tingkat SMP sedang dalam persiapan</p>
                </div>
            @endif
        </div>
    </div>

    <!-- SMA Modules -->
    <div id="smaModules" class="level-content hidden">
        <div class="section-header">
            <h2 class="section-title">Modul SMA</h2>
            <p class="section-subtitle">Materi pembelajaran untuk tingkat Sekolah Menengah Atas</p>
        </div>
        
        <div class="modul-grid">
            @foreach($modules->where('level', 'SMA') as $module)
                <div class="modul-card">
                    <!-- Sampul Modul -->
                    <div class="modul-cover sma">
                        <div class="modul-level-badge">SMA</div>
                        <div class="modul-cover-content">
                            <div class="modul-cover-icon">
                                <i class="{{ $module->icon }}"></i>
                            </div>
                            <h3 class="modul-cover-title">{{ $module->title }}</h3>
                            <div class="modul-cover-subject">{{ $module->subject }}</div>
                        </div>
                    </div>
                    
                    <!-- Konten Modul -->
                    <div class="modul-content">
                        <div class="modul-header">
                            <p class="modul-description">{{ $module->description }}</p>
                        </div>
                        
                        <div class="modul-actions" style="margin-top: auto;">
                            <a href="{{ route('modul.detail', $module) }}" class="btn btn-detail sma">
                                <i class="fas fa-eye"></i>
                                Detail
                            </a>
                            
                            @if($module->file_path)
                                <a href="{{ route('modul.download', $module) }}" class="btn btn-download">
                                    <i class="fas fa-download"></i>
                                    Unduh ({{ $module->file_size_formatted }})
                                </a>
                            @else
                                <span class="btn btn-disabled">
                                    <i class="fas fa-times"></i>
                                    Tidak tersedia
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
            
            @if($modules->where('level', 'SMA')->isEmpty())
                <div class="empty-state">
                    <i class="fas fa-university"></i>
                    <h3>Belum Ada Modul SMA</h3>
                    <p>Modul untuk tingkat SMA sedang dalam persiapan</p>
                </div>
            @endif
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const smpBtn = document.getElementById('smpBtn');
    const smaBtn = document.getElementById('smaBtn');
    const smpModules = document.getElementById('smpModules');
    const smaModules = document.getElementById('smaModules');

    function showLevel(level) {
        // Remove active class from all buttons
        smpBtn.classList.remove('active');
        smaBtn.classList.remove('active');
        
        // Hide all content
        smpModules.classList.add('hidden');
        smaModules.classList.add('hidden');
        
        // Show selected level
        if (level === 'smp') {
            smpBtn.classList.add('active');
            smpModules.classList.remove('hidden');
        } else if (level === 'sma') {
            smaBtn.classList.add('active');
            smaModules.classList.remove('hidden');
        }
    }

    smpBtn.addEventListener('click', () => showLevel('smp'));
    smaBtn.addEventListener('click', () => showLevel('sma'));
    
    // Initialize with SMP active
    showLevel('smp');
});
</script>
@endsection