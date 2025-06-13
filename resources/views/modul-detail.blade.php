@extends('layouts.app')

@section('content')
<style>
.detail-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 2rem 0;
}

.detail-header {
    background: var(--card-bg);
    border-radius: var(--radius-lg);
    padding: 2rem;
    margin-bottom: 2rem;
    box-shadow: var(--shadow-light);
}

.detail-header h1 {
    color: var(--text-main);
    font-size: 2rem;
    margin-bottom: 1rem;
    display: flex;
    align-items: center;
    gap: 1rem;
}

.detail-header .icon {
    background: var(--accent-primary-soft);
    padding: 1rem;
    border-radius: var(--radius-md);
    font-size: 2rem;
    color: var(--accent-main);
}

.detail-meta {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1rem;
    margin: 1.5rem 0;
}

.meta-item {
    background: var(--accent-primary-soft);
    padding: 1rem;
    border-radius: var(--radius-md);
    text-align: center;
}

.meta-item .label {
    font-size: 0.9rem;
    color: var(--text-light);
    margin-bottom: 0.5rem;
}

.meta-item .value {
    font-weight: 700;
    color: var(--text-main);
    font-size: 1.1rem;
}

.description {
    color: var(--text-body);
    line-height: 1.6;
    margin-bottom: 2rem;
}

.preview-section {
    background: var(--card-bg);
    border-radius: var(--radius-lg);
    padding: 2rem;
    margin-bottom: 2rem;
    box-shadow: var(--shadow-light);
}

.preview-section h2 {
    color: var(--text-main);
    margin-bottom: 1.5rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.preview-container {
    border: 2px solid var(--border-soft);
    border-radius: var(--radius-md);
    overflow: hidden;
    background: #f8f9fa;
    min-height: 600px;
    position: relative;
}

.preview-iframe {
    width: 100%;
    height: 600px;
    border: none;
    background: white;
}

.preview-loading {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
    color: var(--text-light);
}

.preview-loading i {
    font-size: 3rem;
    margin-bottom: 1rem;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

.preview-error {
    text-align: center;
    padding: 3rem;
    color: var(--text-light);
}

.preview-error i {
    font-size: 3rem;
    margin-bottom: 1rem;
    color: #dc3545;
}

.action-buttons {
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;
    margin-top: 2rem;
}

.btn {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.875rem 1.5rem;
    border-radius: var(--radius-pill);
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
    border: none;
    cursor: pointer;
    font-size: 1rem;
}

.btn-primary {
    background: var(--accent-main);
    color: white;
}

.btn-primary:hover {
    background: var(--accent-main-light);
    transform: translateY(-2px);
}

.btn-secondary {
    background: var(--success-soft);
    color: var(--text-main);
}

.btn-secondary:hover {
    background: #4CAF50;
    color: white;
    transform: translateY(-2px);
}

.btn-outline {
    background: transparent;
    color: var(--text-main);
    border: 2px solid var(--border-ui);
}

.btn-outline:hover {
    background: var(--accent-primary-soft);
    border-color: var(--accent-main);
}

.back-link {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    color: var(--text-light);
    text-decoration: none;
    margin-bottom: 1rem;
    font-weight: 600;
    transition: color 0.3s ease;
}

.back-link:hover {
    color: var(--accent-main);
}

.preview-controls {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 1rem;
    padding: 1rem;
    background: var(--accent-primary-soft);
    border-radius: var(--radius-md);
}

.preview-controls .left {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.preview-controls .right {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.control-btn {
    background: white;
    border: 1px solid var(--border-ui);
    padding: 0.5rem;
    border-radius: var(--radius-sm);
    cursor: pointer;
    transition: all 0.3s ease;
    color: var(--text-main);
}

.control-btn:hover {
    background: var(--accent-main);
    color: white;
    border-color: var(--accent-main);
}

@media (max-width: 768px) {
    .detail-container {
        padding: 1rem;
    }
    
    .detail-header {
        padding: 1.5rem;
    }
    
    .detail-header h1 {
        font-size: 1.5rem;
        flex-direction: column;
        text-align: center;
    }
    
    .preview-iframe {
        height: 400px;
    }
    
    .action-buttons {
        flex-direction: column;
    }
    
    .btn {
        justify-content: center;
    }
}
</style>

<div class="detail-container">
    <a href="{{ route('modul') }}" class="back-link">
        <i class="fas fa-arrow-left"></i>
        Kembali ke Daftar Modul
    </a>

    <div class="detail-header">
        <h1>
            <div class="icon">
                <i class="{{ $module->icon }}"></i>
            </div>
            {{ $module->title }}
        </h1>
        
        <div class="detail-meta">
            <div class="meta-item">
                <div class="label">Level</div>
                <div class="value">{{ ucfirst($module->level) }}</div>
            </div>
            <div class="meta-item">
                <div class="label">Mata Pelajaran</div>
                <div class="value">{{ $module->subject }}</div>
            </div>
            @if($module->file_size_formatted)
            <div class="meta-item">
                <div class="label">Ukuran File</div>
                <div class="value">{{ $module->file_size_formatted }}</div>
            </div>
            @endif
            <div class="meta-item">
                <div class="label">Status</div>
                <div class="value">{{ $module->is_active ? 'Aktif' : 'Tidak Aktif' }}</div>
            </div>
        </div>

        <div class="description">
            {{ $module->description }}
        </div>

        <div class="action-buttons">
            @if($module->file_path)
                <a href="{{ route('modul.download', $module) }}" class="btn btn-primary">
                    <i class="fas fa-download"></i>
                    Unduh File
                </a>
                @if($module->is_previewable && $module->file_extension === 'pdf')
                    <button onclick="openPreviewModal()" class="btn btn-secondary">
                        <i class="fas fa-eye"></i>
                        Preview File
                    </button>
                @elseif($module->file_path)
                    <a href="{{ route('modul.preview', $module) }}" target="_blank" class="btn btn-secondary">
                        <i class="fas fa-external-link-alt"></i>
                        Buka File
                    </a>
                @endif
            @else
                <span class="btn btn-outline" style="opacity: 0.5; cursor: not-allowed;">
                    <i class="fas fa-times"></i>
                    File Tidak Tersedia
                </span>
            @endif
        </div>
    </div>

    @if($module->file_path && $module->file_extension === 'pdf')
    <div class="preview-section">
        <h2>
            <i class="fas fa-file-pdf"></i>
            Preview File
        </h2>
        
        <div class="preview-controls">
            <div class="left">
                <span style="font-weight: 600; color: var(--text-main);">{{ $module->file_name }}</span>
            </div>
            <div class="right">
                <button onclick="refreshPreview()" class="control-btn" title="Refresh">
                    <i class="fas fa-refresh"></i>
                </button>
                <button onclick="openFullscreen()" class="control-btn" title="Fullscreen">
                    <i class="fas fa-expand"></i>
                </button>
                <a href="{{ route('modul.preview', $module) }}" target="_blank" class="control-btn" title="Buka di Tab Baru">
                    <i class="fas fa-external-link-alt"></i>
                </a>
            </div>
        </div>

        <div class="preview-container" id="previewContainer">
            <div class="preview-loading" id="previewLoading">
                <i class="fas fa-spinner"></i>
                <div>Memuat preview...</div>
            </div>
            <iframe 
                id="previewFrame"
                class="preview-iframe" 
                src="{{ route('modul.preview', $module) }}"
                onload="hideLoading()"
                onerror="showError()"
                style="display: none;">
            </iframe>
        </div>
    </div>
    @endif
</div>

<!-- Preview Modal -->
<div id="previewModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.9); z-index: 10000;">
    <div style="position: relative; width: 100%; height: 100%; display: flex; flex-direction: column;">
        <div style="padding: 1rem; background: rgba(255,255,255,0.1); display: flex; justify-content: space-between; align-items: center;">
            <h3 style="color: white; margin: 0;">{{ $module->title }}</h3>
            <button onclick="closePreviewModal()" style="background: none; border: none; color: white; font-size: 1.5rem; cursor: pointer;">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <iframe id="modalPreviewFrame" style="flex: 1; border: none; background: white;" src="{{ route('modul.preview', $module) }}"></iframe>
    </div>
</div>

<script>
function hideLoading() {
    document.getElementById('previewLoading').style.display = 'none';
    document.getElementById('previewFrame').style.display = 'block';
}

function showError() {
    document.getElementById('previewLoading').innerHTML = `
        <div class="preview-error">
            <i class="fas fa-exclamation-triangle"></i>
            <div>Gagal memuat preview. <a href="{{ route('modul.preview', $module) }}" target="_blank">Buka di tab baru</a></div>
        </div>
    `;
}

function refreshPreview() {
    document.getElementById('previewLoading').style.display = 'block';
    document.getElementById('previewFrame').style.display = 'none';
    document.getElementById('previewFrame').src = document.getElementById('previewFrame').src;
}

function openFullscreen() {
    const iframe = document.getElementById('previewFrame');
    if (iframe.requestFullscreen) {
        iframe.requestFullscreen();
    } else if (iframe.webkitRequestFullscreen) {
        iframe.webkitRequestFullscreen();
    } else if (iframe.msRequestFullscreen) {
        iframe.msRequestFullscreen();
    }
}

function openPreviewModal() {
    document.getElementById('previewModal').style.display = 'block';
    document.body.style.overflow = 'hidden';
}

function closePreviewModal() {
    document.getElementById('previewModal').style.display = 'none';
    document.body.style.overflow = 'auto';
}

// Close modal with Escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closePreviewModal();
    }
});
</script>
@endsection