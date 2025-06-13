@extends('layouts.app')

@section('content')
<style>
    .guide-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 2rem 1rem;
    }

    .guide-header {
        text-align: center;
        margin-bottom: 4rem;
        padding: 4rem 0;
        background: linear-gradient(135deg, var(--accent-main) 0%, var(--accent-main-light) 100%);
        border-radius: var(--radius-xl);
        color: white;
        position: relative;
        overflow: hidden;
    }

    .guide-header::before {
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

    .guide-header h1 {
        font-size: 3rem;
        font-weight: 800;
        margin-bottom: 1rem;
        position: relative;
        z-index: 2;
    }

    .guide-header p {
        font-size: 1.25rem;
        opacity: 0.9;
        position: relative;
        z-index: 2;
    }

    .guide-nav {
        background: var(--card-bg);
        border-radius: var(--radius-lg);
        padding: 2rem;
        box-shadow: var(--shadow-soft);
        border: 1px solid var(--border-soft);
        margin-bottom: 3rem;
    }

    .guide-nav h2 {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--text-main);
        margin-bottom: 1.5rem;
        text-align: center;
    }

    .nav-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1rem;
    }

    .nav-item {
        background: rgba(120, 87, 193, 0.05);
        border-radius: var(--radius-md);
        padding: 1rem;
        text-align: center;
        transition: all 0.3s ease;
        cursor: pointer;
        border: 2px solid transparent;
    }

    .nav-item:hover {
        background: rgba(120, 87, 193, 0.1);
        border-color: var(--accent-main);
        transform: translateY(-2px);
    }

    .nav-item i {
        font-size: 2rem;
        color: var(--accent-main);
        margin-bottom: 0.5rem;
    }

    .nav-item h3 {
        font-size: 1rem;
        font-weight: 700;
        color: var(--text-main);
        margin: 0;
    }

    .guide-section {
        background: var(--card-bg);
        border-radius: var(--radius-lg);
        padding: 2rem;
        box-shadow: var(--shadow-soft);
        border: 1px solid var(--border-soft);
        margin-bottom: 2rem;
    }

    .guide-section h2 {
        font-size: 1.75rem;
        font-weight: 700;
        color: var(--text-main);
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .guide-section h2 i {
        color: var(--accent-main);
    }

    .guide-section h3 {
        font-size: 1.25rem;
        font-weight: 700;
        color: var(--text-main);
        margin: 1.5rem 0 1rem 0;
    }

    .guide-section p {
        color: var(--text-body);
        line-height: 1.8;
        margin-bottom: 1rem;
    }

    .step-list {
        list-style: none;
        padding: 0;
        margin: 1.5rem 0;
    }

    .step-list li {
        background: rgba(120, 87, 193, 0.05);
        border-radius: var(--radius-md);
        padding: 1rem;
        margin-bottom: 1rem;
        border-left: 4px solid var(--accent-main);
        position: relative;
    }

    .step-number {
        background: var(--accent-main);
        color: white;
        width: 1.5rem;
        height: 1.5rem;
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 0.75rem;
        font-weight: 700;
        margin-right: 0.75rem;
    }

    .feature-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 1.5rem;
        margin: 2rem 0;
    }

    .feature-card {
        background: rgba(120, 87, 193, 0.05);
        border-radius: var(--radius-md);
        padding: 1.5rem;
        border: 1px solid var(--border-soft);
        transition: all 0.3s ease;
    }

    .feature-card:hover {
        background: rgba(120, 87, 193, 0.1);
        transform: translateY(-2px);
    }

    .feature-card h4 {
        font-size: 1.125rem;
        font-weight: 700;
        color: var(--text-main);
        margin-bottom: 0.75rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .feature-card i {
        color: var(--accent-main);
    }

    .feature-card p {
        margin: 0;
        font-size: 0.875rem;
    }

    .tips-box {
        background: linear-gradient(135deg, #f59e0b 0%, #f97316 100%);
        border-radius: var(--radius-lg);
        padding: 1.5rem;
        color: white;
        margin: 2rem 0;
    }

    .tips-box h4 {
        font-size: 1.125rem;
        font-weight: 700;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .tips-box ul {
        margin: 0;
        padding-left: 1.5rem;
    }

    .tips-box li {
        margin-bottom: 0.5rem;
        opacity: 0.95;
    }

    .video-placeholder {
        background: rgba(120, 87, 193, 0.1);
        border-radius: var(--radius-lg);
        padding: 3rem;
        text-align: center;
        border: 2px dashed var(--accent-main);
        margin: 2rem 0;
    }

    .video-placeholder i {
        font-size: 3rem;
        color: var(--accent-main);
        margin-bottom: 1rem;
    }

    .video-placeholder h4 {
        font-size: 1.25rem;
        font-weight: 700;
        color: var(--text-main);
        margin-bottom: 0.5rem;
    }

    .video-placeholder p {
        color: var(--text-body);
        margin: 0;
    }

    @media (max-width: 768px) {
        .guide-container {
            padding: 1rem;
        }

        .guide-header {
            padding: 2rem 1rem;
        }

        .guide-header h1 {
            font-size: 2rem;
        }

        .guide-header p {
            font-size: 1rem;
        }

        .nav-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .feature-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="guide-container">
    <!-- Header -->
    <div class="guide-header">
        <h1>Panduan Penggunaan</h1>
        <p>Pelajari cara menggunakan semua fitur Ayo Belajar dengan mudah</p>
    </div>

    <!-- Quick Navigation -->
    <div class="guide-nav">
        <h2>Navigasi Cepat</h2>
        <div class="nav-grid">
            <div class="nav-item" onclick="scrollToSection('getting-started')">
                <i class="fas fa-play-circle"></i>
                <h3>Memulai</h3>
            </div>
            <div class="nav-item" onclick="scrollToSection('modules')">
                <i class="fas fa-book"></i>
                <h3>Modul Digital</h3>
            </div>
            <div class="nav-item" onclick="scrollToSection('chatbot')">
                <i class="fas fa-robot"></i>
                <h3>ChatBot</h3>
            </div>
            <div class="nav-item" onclick="scrollToSection('translator')">
                <i class="fas fa-language"></i>
                <h3>Penerjemah</h3>
            </div>
            <div class="nav-item" onclick="scrollToSection('account')">
                <i class="fas fa-user"></i>
                <h3>Akun & Profil</h3>
            </div>
            <div class="nav-item" onclick="scrollToSection('tips')">
                <i class="fas fa-lightbulb"></i>
                <h3>Tips & Trik</h3>
            </div>
        </div>
    </div>

    <!-- Getting Started -->
    <div id="getting-started" class="guide-section">
        <h2><i class="fas fa-play-circle"></i> Memulai dengan Ayo Belajar</h2>
        
        <h3>Langkah Pertama</h3>
        <ol class="step-list">
            <li>
                <span class="step-number">1</span>
                <strong>Daftar Akun:</strong> Klik tombol "Daftar" di pojok kanan atas dan isi formulir pendaftaran dengan data yang valid.
            </li>
            <li>
                <span class="step-number">2</span>
                <strong>Verifikasi Email:</strong> Periksa email Anda dan klik link verifikasi yang dikirimkan.
            </li>
            <li>
                <span class="step-number">3</span>
                <strong>Login:</strong> Masuk ke akun Anda menggunakan email dan password yang telah didaftarkan.
            </li>
            <li>
                <span class="step-number">4</span>
                <strong>Lengkapi Profil:</strong> Isi informasi profil Anda untuk pengalaman yang lebih personal.
            </li>
        </ol>

        <div class="video-placeholder">
            <i class="fas fa-play-circle"></i>
            <h4>Video Tutorial: Cara Mendaftar</h4>
            <p>Video panduan lengkap cara mendaftar dan memulai menggunakan Ayo Belajar</p>
        </div>
    </div>

    <!-- Modules Guide -->
    <div id="modules" class="guide-section">
        <h2><i class="fas fa-book"></i> Menggunakan Modul Digital</h2>
        
        <p>Modul Digital adalah koleksi materi pembelajaran yang dapat diunduh dan dipelajari secara offline.</p>

        <h3>Cara Mengakses Modul</h3>
        <ol class="step-list">
            <li>
                <span class="step-number">1</span>
                <strong>Buka Halaman Modul:</strong> Klik menu "Modul" di navigasi utama.
            </li>
            <li>
                <span class="step-number">2</span>
                <strong>Filter Modul:</strong> Gunakan filter berdasarkan mata pelajaran, tingkat, atau kata kunci.
            </li>
            <li>
                <span class="step-number">3</span>
                <strong>Preview Modul:</strong> Klik "Lihat Detail" untuk melihat preview dan deskripsi modul.
            </li>
            <li>
                <span class="step-number">4</span>
                <strong>Download:</strong> Klik tombol "Download" untuk mengunduh modul ke perangkat Anda.
            </li>
        </ol>

        <div class="feature-grid">
            <div class="feature-card">
                <h4><i class="fas fa-search"></i> Pencarian Cerdas</h4>
                <p>Gunakan fitur pencarian untuk menemukan modul yang sesuai dengan kebutuhan belajar Anda.</p>
            </div>
            <div class="feature-card">
                <h4><i class="fas fa-filter"></i> Filter Lanjutan</h4>
                <p>Filter modul berdasarkan mata pelajaran, tingkat pendidikan, dan kategori khusus.</p>
            </div>
            <div class="feature-card">
                <h4><i class="fas fa-eye"></i> Preview Modul</h4>
                <p>Lihat preview modul sebelum mengunduh untuk memastikan kesesuaian dengan kebutuhan.</p>
            </div>
            <div class="feature-card">
                <h4><i class="fas fa-download"></i> Download Offline</h4>
                <p>Unduh modul untuk dipelajari secara offline tanpa memerlukan koneksi internet.</p>
            </div>
        </div>
    </div>

    <!-- ChatBot Guide -->
    <div id="chatbot" class="guide-section">
        <h2><i class="fas fa-robot"></i> Menggunakan ChatBot Pintar</h2>
        
        <p>ChatBot Pintar adalah asisten AI yang siap membantu Anda 24/7 dalam menjawab pertanyaan seputar pembelajaran.</p>

        <h3>Cara Menggunakan ChatBot</h3>
        <ol class="step-list">
            <li>
                <span class="step-number">1</span>
                <strong>Akses ChatBot:</strong> Klik menu "ChatBot" atau tombol chat di pojok kanan bawah.
            </li>
            <li>
                <span class="step-number">2</span>
                <strong>Mulai Percakapan:</strong> Ketik pertanyaan atau topik yang ingin Anda pelajari.
            </li>
            <li>
                <span class="step-number">3</span>
                <strong>Interaksi:</strong> ChatBot akan memberikan jawaban dan Anda bisa melanjutkan dengan pertanyaan lanjutan.
            </li>
            <li>
                <span class="step-number">4</span>
                <strong>Simpan Riwayat:</strong> Semua percakapan tersimpan di dashboard untuk referensi di kemudian hari.
            </li>
        </ol>

        <div class="tips-box">
            <h4><i class="fas fa-lightbulb"></i> Tips Menggunakan ChatBot</h4>
            <ul>
                <li>Gunakan pertanyaan yang spesifik untuk mendapatkan jawaban yang lebih akurat</li>
                <li>Jika jawaban kurang memuaskan, coba ubah cara bertanya</li>
                <li>Manfaatkan fitur follow-up question untuk mendalami topik</li>
                <li>ChatBot dapat membantu dengan berbagai mata pelajaran dari SD hingga SMA</li>
            </ul>
        </div>
    </div>

    <!-- Translator Guide -->
    <div id="translator" class="guide-section">
        <h2><i class="fas fa-language"></i> Menggunakan Penerjemah Bahasa Daerah</h2>
        
        <p>Fitur Penerjemah membantu menerjemahkan teks dari Bahasa Indonesia ke berbagai bahasa daerah di Indonesia.</p>

        <h3>Cara Menggunakan Penerjemah</h3>
        <ol class="step-list">
            <li>
                <span class="step-number">1</span>
                <strong>Buka Penerjemah:</strong> Klik menu "Penerjemah" di navigasi utama.
            </li>
            <li>
                <span class="step-number">2</span>
                <strong>Pilih Bahasa:</strong> Pilih bahasa sumber dan bahasa tujuan dari dropdown.
            </li>
            <li>
                <span class="step-number">3</span>
                <strong>Input Teks:</strong> Ketik atau paste teks yang ingin diterjemahkan.
            </li>
            <li>
                <span class="step-number">4</span>
                <strong>Terjemahkan:</strong> Klik tombol "Terjemahkan" untuk mendapatkan hasil.
            </li>
        </ol>

        <div class="feature-grid">
            <div class="feature-card">
                <h4><i class="fas fa-globe"></i> Multi Bahasa Daerah</h4>
                <p>Mendukung berbagai bahasa daerah seperti Jawa, Sunda, Batak, Minang, dan lainnya.</p>
            </div>
            <div class="feature-card">
                <h4><i class="fas fa-copy"></i> Copy Hasil</h4>
                <p>Hasil terjemahan dapat langsung disalin untuk digunakan di aplikasi lain.</p>
            </div>
            <div class="feature-card">
                <h4><i class="fas fa-history"></i> Riwayat Terjemahan</h4>
                <p>Akses riwayat terjemahan sebelumnya untuk referensi cepat.</p>
            </div>
            <div class="feature-card">
                <h4><i class="fas fa-volume-up"></i> Text-to-Speech</h4>
                <p>Dengarkan pronunciation hasil terjemahan dengan fitur audio.</p>
            </div>
        </div>
    </div>

    <!-- Account Management -->
    <div id="account" class="guide-section">
        <h2><i class="fas fa-user"></i> Mengelola Akun & Profil</h2>
        
        <h3>Dashboard Pengguna</h3>
        <p>Dashboard adalah pusat kontrol akun Anda yang menampilkan statistik penggunaan dan aktivitas terbaru.</p>

        <div class="feature-grid">
            <div class="feature-card">
                <h4><i class="fas fa-chart-bar"></i> Statistik Penggunaan</h4>
                <p>Lihat total download modul, jumlah chat dengan bot, dan aktivitas pembelajaran Anda.</p>
            </div>
            <div class="feature-card">
                <h4><i class="fas fa-download"></i> Riwayat Download</h4>
                <p>Akses semua modul yang pernah Anda download dengan mudah.</p>
            </div>
            <div class="feature-card">
                <h4><i class="fas fa-comments"></i> Riwayat Chat</h4>
                <p>Lihat kembali percakapan dengan ChatBot untuk referensi pembelajaran.</p>
            </div>
            <div class="feature-card">
                <h4><i class="fas fa-edit"></i> Edit Profil</h4>
                <p>Perbarui informasi profil, sekolah, dan preferensi pembelajaran Anda.</p>
            </div>
        </div>

        <h3>Mengubah Profil</h3>
        <ol class="step-list">
            <li>
                <span class="step-number">1</span>
                <strong>Akses Profil:</strong> Klik nama Anda di pojok kanan atas, lalu pilih "Profil".
            </li>
            <li>
                <span class="step-number">2</span>
                <strong>Edit Informasi:</strong> Ubah nama, email, nomor telepon, atau informasi lainnya.
            </li>
            <li>
                <span class="step-number">3</span>
                <strong>Simpan Perubahan:</strong> Klik tombol "Simpan" untuk menyimpan perubahan.
            </li>
        </ol>
    </div>

    <!-- Tips & Tricks -->
    <div id="tips" class="guide-section">
        <h2><i class="fas fa-lightbulb"></i> Tips & Trik Belajar Efektif</h2>
        
        <div class="feature-grid">
            <div class="feature-card">
                <h4><i class="fas fa-clock"></i> Belajar Konsisten</h4>
                <p>Luangkan waktu 30-60 menit setiap hari untuk belajar menggunakan modul digital.</p>
            </div>
            <div class="feature-card">
                <h4><i class="fas fa-question-circle"></i> Aktif Bertanya</h4>
                <p>Manfaatkan ChatBot untuk bertanya hal-hal yang tidak dipahami saat belajar.</p>
            </div>
            <div class="feature-card">
                <h4><i class="fas fa-bookmark"></i> Catat Poin Penting</h4>
                <p>Buat catatan dari modul yang dipelajari dan simpan percakapan penting dengan ChatBot.</p>
            </div>
            <div class="feature-card">
                <h4><i class="fas fa-users"></i> Belajar Bersama</h4>
                <p>Bagikan modul dengan teman dan diskusikan materi menggunakan fitur penerjemah jika diperlukan.</p>
            </div>
        </div>

        <div class="tips-box">
            <h4><i class="fas fa-star"></i> Tips Khusus untuk Daerah 3T</h4>
            <ul>
                <li>Download modul saat koneksi internet stabil untuk belajar offline</li>
                <li>Gunakan penerjemah untuk memahami istilah dalam bahasa daerah</li>
                <li>Manfaatkan ChatBot saat ada koneksi untuk mendapatkan penjelasan tambahan</li>
                <li>Simpan hasil terjemahan penting untuk referensi offline</li>
            </ul>
        </div>
    </div>
</div>

<script>
function scrollToSection(sectionId) {
    const element = document.getElementById(sectionId);
    if (element) {
        element.scrollIntoView({ 
            behavior: 'smooth',
            block: 'start'
        });
    }
}

// Add smooth scrolling for all anchor links
document.addEventListener('DOMContentLoaded', function() {
    // Highlight current section in navigation
    const sections = document.querySelectorAll('.guide-section');
    const navItems = document.querySelectorAll('.nav-item');
    
    function highlightCurrentSection() {
        let current = '';
        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.clientHeight;
            if (window.pageYOffset >= sectionTop - 200) {
                current = section.getAttribute('id');
            }
        });
        
        navItems.forEach(item => {
            item.classList.remove('active');
            if (item.getAttribute('onclick').includes(current)) {
                item.classList.add('active');
            }
        });
    }
    
    window.addEventListener('scroll', highlightCurrentSection);
});
</script>

<style>
.nav-item.active {
    background: var(--accent-primary-soft) !important;
    border-color: var(--accent-main) !important;
    transform: translateY(-2px);
}
</style>
@endsection