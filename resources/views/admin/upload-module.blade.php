@extends('layouts.app')

@section('content')
<style>
    .upload-container {
        max-width: 800px;
        margin: 0 auto;
        padding: 2rem 1rem;
    }

    .upload-header {
        text-align: center;
        margin-bottom: 3rem;
        padding: 3rem 0;
        background: linear-gradient(135deg, var(--accent-main) 0%, var(--accent-main-light) 100%);
        border-radius: var(--radius-xl);
        color: white;
    }

    .upload-form {
        background: var(--card-bg);
        border-radius: var(--radius-lg);
        padding: 2rem;
        box-shadow: var(--shadow-soft);
        border: 1px solid var(--border-soft);
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-group label {
        display: block;
        font-weight: 600;
        color: var(--text-main);
        margin-bottom: 0.5rem;
    }

    .form-group input,
    .form-group select,
    .form-group textarea {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 2px solid var(--border-soft);
        border-radius: var(--radius-md);
        font-size: 1rem;
        transition: all 0.3s ease;
        background: var(--input-bg);
        color: var(--text-main);
    }

    .form-group input:focus,
    .form-group select:focus,
    .form-group textarea:focus {
        outline: none;
        border-color: var(--accent-main);
        box-shadow: 0 0 0 3px rgba(120, 87, 193, 0.1);
    }

    .file-upload-area {
        border: 2px dashed var(--border-soft);
        border-radius: var(--radius-md);
        padding: 2rem;
        text-align: center;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .file-upload-area:hover {
        border-color: var(--accent-main);
        background: var(--accent-primary-soft);
    }

    .file-upload-area.dragover {
        border-color: var(--accent-main);
        background: var(--accent-primary-soft);
    }

    .upload-icon {
        font-size: 3rem;
        color: var(--accent-main);
        margin-bottom: 1rem;
    }

    .upload-text {
        color: var(--text-body);
        margin-bottom: 0.5rem;
    }

    .file-info {
        background: rgba(120, 87, 193, 0.1);
        border-radius: var(--radius-md);
        padding: 1rem;
        margin-top: 1rem;
        display: none;
    }

    .submit-btn {
        background: linear-gradient(135deg, var(--accent-main), var(--accent-main-light));
        color: white;
        border: none;
        padding: 1rem 2rem;
        border-radius: var(--radius-md);
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        width: 100%;
    }

    .submit-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(120, 87, 193, 0.3);
    }

    .submit-btn:disabled {
        opacity: 0.7;
        cursor: not-allowed;
        transform: none;
    }

    .progress-bar {
        width: 100%;
        height: 8px;
        background: var(--border-soft);
        border-radius: var(--radius-sm);
        overflow: hidden;
        margin: 1rem 0;
        display: none;
    }

    .progress-fill {
        height: 100%;
        background: linear-gradient(90deg, var(--accent-main), var(--accent-main-light));
        width: 0%;
        transition: width 0.3s ease;
    }

    .storage-info {
        background: var(--card-bg);
        border-radius: var(--radius-lg);
        padding: 1.5rem;
        box-shadow: var(--shadow-soft);
        border: 1px solid var(--border-soft);
        margin-bottom: 2rem;
    }

    .storage-stats {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1rem;
    }

    .stat-item {
        text-align: center;
        padding: 1rem;
        background: rgba(120, 87, 193, 0.05);
        border-radius: var(--radius-md);
    }

    .stat-value {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--accent-main);
    }

    .stat-label {
        font-size: 0.875rem;
        color: var(--text-body);
    }
</style>

<div class="upload-container">
    <!-- Header -->
    <div class="upload-header">
        <h1>Upload Modul ke Azure Storage</h1>
        <p>Upload file pembelajaran ke Microsoft Azure Blob Storage</p>
    </div>

    <!-- Storage Info -->
    <div class="storage-info">
        <h3 style="margin-bottom: 1rem; color: var(--text-main);">📊 Azure Storage Statistics</h3>
        <div class="storage-stats" id="storageStats">
            <div class="stat-item">
                <div class="stat-value" id="totalFiles">-</div>
                <div class="stat-label">Total Files</div>
            </div>
            <div class="stat-item">
                <div class="stat-value" id="totalSize">-</div>
                <div class="stat-label">Storage Used</div>
            </div>
            <div class="stat-item">
                <div class="stat-value" id="storageUrl">Azure</div>
                <div class="stat-label">Storage Type</div>
            </div>
        </div>
    </div>

    <!-- Upload Form -->
    <div class="upload-form">
        <form id="uploadForm" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group">
                <label for="title">Judul Modul</label>
                <input type="text" id="title" name="title" required placeholder="Contoh: Matematika Kelas 10 - Trigonometri">
            </div>

            <div class="form-group">
                <label for="subject">Mata Pelajaran</label>
                <select id="subject" name="subject" required>
                    <option value="">Pilih Mata Pelajaran</option>
                    <option value="Matematika">Matematika</option>
                    <option value="Bahasa Indonesia">Bahasa Indonesia</option>
                    <option value="Bahasa Inggris">Bahasa Inggris</option>
                    <option value="IPA">IPA</option>
                    <option value="IPS">IPS</option>
                    <option value="Fisika">Fisika</option>
                    <option value="Kimia">Kimia</option>
                    <option value="Biologi">Biologi</option>
                    <option value="Sejarah">Sejarah</option>
                    <option value="Geografi">Geografi</option>
                    <option value="Ekonomi">Ekonomi</option>
                    <option value="PKN">PKN</option>
                    <option value="Seni Budaya">Seni Budaya</option>
                    <option value="PJOK">PJOK</option>
                </select>
            </div>

            <div class="form-group">
                <label for="level">Tingkat Pendidikan</label>
                <select id="level" name="level" required>
                    <option value="">Pilih Tingkat</option>
                    <option value="SD">SD (Sekolah Dasar)</option>
                    <option value="SMP">SMP (Sekolah Menengah Pertama)</option>
                    <option value="SMA">SMA (Sekolah Menengah Atas)</option>
                    <option value="SMK">SMK (Sekolah Menengah Kejuruan)</option>
                </select>
            </div>

            <div class="form-group">
                <label for="description">Deskripsi</label>
                <textarea id="description" name="description" rows="3" placeholder="Deskripsi singkat tentang modul ini..."></textarea>
            </div>

            <div class="form-group">
                <label for="file">File Modul</label>
                <div class="file-upload-area" id="fileUploadArea">
                    <div class="upload-icon">
                        <i class="fas fa-cloud-upload-alt"></i>
                    </div>
                    <div class="upload-text">
                        <strong>Klik untuk memilih file</strong> atau drag & drop di sini
                    </div>
                    <div style="font-size: 0.875rem; color: var(--text-light); margin-top: 0.5rem;">
                        Mendukung: PDF, DOC, DOCX, PPT, PPTX (Max: 50MB)
                    </div>
                </div>
                <input type="file" id="file" name="file" accept=".pdf,.doc,.docx,.ppt,.pptx" style="display: none;" required>
                
                <div class="file-info" id="fileInfo">
                    <div id="fileName"></div>
                    <div id="fileSize"></div>
                    <div id="fileType"></div>
                </div>
            </div>

            <div class="progress-bar" id="progressBar">
                <div class="progress-fill" id="progressFill"></div>
            </div>

            <button type="submit" class="submit-btn" id="submitBtn">
                <i class="fas fa-upload"></i> Upload ke Azure Storage
            </button>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const fileUploadArea = document.getElementById('fileUploadArea');
    const fileInput = document.getElementById('file');
    const fileInfo = document.getElementById('fileInfo');
    const fileName = document.getElementById('fileName');
    const fileSize = document.getElementById('fileSize');
    const fileType = document.getElementById('fileType');
    const uploadForm = document.getElementById('uploadForm');
    const submitBtn = document.getElementById('submitBtn');
    const progressBar = document.getElementById('progressBar');
    const progressFill = document.getElementById('progressFill');

    // Load storage statistics
    loadStorageStats();

    // File upload area click
    fileUploadArea.addEventListener('click', () => {
        fileInput.click();
    });

    // Drag and drop functionality
    fileUploadArea.addEventListener('dragover', (e) => {
        e.preventDefault();
        fileUploadArea.classList.add('dragover');
    });

    fileUploadArea.addEventListener('dragleave', () => {
        fileUploadArea.classList.remove('dragover');
    });

    fileUploadArea.addEventListener('drop', (e) => {
        e.preventDefault();
        fileUploadArea.classList.remove('dragover');
        
        const files = e.dataTransfer.files;
        if (files.length > 0) {
            fileInput.files = files;
            handleFileSelect(files[0]);
        }
    });

    // File input change
    fileInput.addEventListener('change', (e) => {
        if (e.target.files.length > 0) {
            handleFileSelect(e.target.files[0]);
        }
    });

    // Handle file selection
    function handleFileSelect(file) {
        fileName.textContent = `📄 ${file.name}`;
        fileSize.textContent = `📏 ${formatFileSize(file.size)}`;
        fileType.textContent = `📋 ${file.type || 'Unknown'}`;
        fileInfo.style.display = 'block';
    }

    // Format file size
    function formatFileSize(bytes) {
        if (bytes === 0) return '0 Bytes';
        const k = 1024;
        const sizes = ['Bytes', 'KB', 'MB', 'GB'];
        const i = Math.floor(Math.log(bytes) / Math.log(k));
        return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
    }

    // Form submission
    uploadForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        
        const formData = new FormData(uploadForm);
        
        // Disable submit button
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Uploading...';
        
        // Show progress bar
        progressBar.style.display = 'block';
        
        try {
            const response = await fetch('/api/upload-module', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            });

            const result = await response.json();
            
            if (result.success) {
                // Success
                progressFill.style.width = '100%';
                
                setTimeout(() => {
                    alert('✅ File berhasil diupload ke Azure Storage!');
                    uploadForm.reset();
                    fileInfo.style.display = 'none';
                    progressBar.style.display = 'none';
                    progressFill.style.width = '0%';
                    loadStorageStats(); // Refresh stats
                }, 1000);
            } else {
                throw new Error(result.message || 'Upload failed');
            }
        } catch (error) {
            console.error('Upload error:', error);
            alert('❌ Upload gagal: ' + error.message);
        } finally {
            // Re-enable submit button
            submitBtn.disabled = false;
            submitBtn.innerHTML = '<i class="fas fa-upload"></i> Upload ke Azure Storage';
        }
    });

    // Load storage statistics
    async function loadStorageStats() {
        try {
            const response = await fetch('/api/storage-stats');
            const stats = await response.json();
            
            if (stats.success) {
                document.getElementById('totalFiles').textContent = stats.data.total_files;
                document.getElementById('totalSize').textContent = stats.data.total_size_mb + ' MB';
                document.getElementById('storageUrl').textContent = 'Azure';
            }
        } catch (error) {
            console.error('Failed to load storage stats:', error);
        }
    }

    // Simulate progress (for demo purposes)
    function simulateProgress() {
        let progress = 0;
        const interval = setInterval(() => {
            progress += Math.random() * 15;
            if (progress >= 90) {
                progress = 90;
                clearInterval(interval);
            }
            progressFill.style.width = progress + '%';
        }, 200);
    }
});
</script>
@endsection