@extends('layouts.app')

@section('content')
<style>
    .privacy-container {
        max-width: 1000px;
        margin: 0 auto;
        padding: 2rem 1rem;
    }

    .privacy-header {
        text-align: center;
        margin-bottom: 4rem;
        padding: 4rem 0;
        background: linear-gradient(135deg, var(--accent-main) 0%, var(--accent-main-light) 100%);
        border-radius: var(--radius-xl);
        color: white;
        position: relative;
        overflow: hidden;
    }

    .privacy-header::before {
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

    .privacy-header h1 {
        font-size: 3rem;
        font-weight: 800;
        margin-bottom: 1rem;
        position: relative;
        z-index: 2;
    }

    .privacy-header p {
        font-size: 1.25rem;
        opacity: 0.9;
        position: relative;
        z-index: 2;
    }

    .last-updated {
        background: rgba(34, 197, 94, 0.1);
        border-radius: var(--radius-md);
        padding: 1rem;
        border-left: 4px solid #22c55e;
        margin-bottom: 3rem;
        text-align: center;
    }

    .last-updated strong {
        color: #22c55e;
    }

    .privacy-nav {
        background: var(--card-bg);
        border-radius: var(--radius-lg);
        padding: 2rem;
        box-shadow: var(--shadow-soft);
        border: 1px solid var(--border-soft);
        margin-bottom: 3rem;
        position: sticky;
        top: 2rem;
    }

    .privacy-nav h3 {
        font-size: 1.25rem;
        font-weight: 700;
        color: var(--text-main);
        margin-bottom: 1rem;
    }

    .nav-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .nav-list li {
        margin-bottom: 0.5rem;
    }

    .nav-list a {
        color: var(--text-body);
        text-decoration: none;
        padding: 0.5rem;
        border-radius: var(--radius-sm);
        display: block;
        transition: all 0.3s ease;
    }

    .nav-list a:hover {
        background: var(--accent-primary-soft);
        color: var(--accent-main);
    }

    .privacy-content {
        background: var(--card-bg);
        border-radius: var(--radius-lg);
        padding: 2rem;
        box-shadow: var(--shadow-soft);
        border: 1px solid var(--border-soft);
    }

    .privacy-section {
        margin-bottom: 3rem;
        padding-bottom: 2rem;
        border-bottom: 1px solid var(--border-soft);
    }

    .privacy-section:last-child {
        border-bottom: none;
        margin-bottom: 0;
    }

    .privacy-section h2 {
        font-size: 1.75rem;
        font-weight: 700;
        color: var(--text-main);
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .privacy-section h2 i {
        color: var(--accent-main);
    }

    .privacy-section h3 {
        font-size: 1.25rem;
        font-weight: 700;
        color: var(--text-main);
        margin: 1.5rem 0 1rem 0;
    }

    .privacy-section p {
        color: var(--text-body);
        line-height: 1.8;
        margin-bottom: 1rem;
        text-align: justify;
    }

    .privacy-section ul,
    .privacy-section ol {
        color: var(--text-body);
        line-height: 1.8;
        margin-bottom: 1rem;
        padding-left: 2rem;
    }

    .privacy-section li {
        margin-bottom: 0.5rem;
    }

    .highlight-box {
        background: rgba(120, 87, 193, 0.1);
        border-radius: var(--radius-md);
        padding: 1.5rem;
        border-left: 4px solid var(--accent-main);
        margin: 1.5rem 0;
    }

    .highlight-box h4 {
        color: var(--accent-main);
        font-weight: 700;
        margin-bottom: 0.75rem;
    }

    .highlight-box p {
        margin: 0;
    }

    .contact-section {
        background: linear-gradient(135deg, var(--accent-main) 0%, var(--accent-main-light) 100%);
        border-radius: var(--radius-lg);
        padding: 2rem;
        color: white;
        text-align: center;
        margin-top: 3rem;
    }

    .contact-section h3 {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 1rem;
    }

    .contact-section p {
        margin-bottom: 1.5rem;
        opacity: 0.9;
    }

    .contact-info {
        display: flex;
        justify-content: center;
        gap: 2rem;
        flex-wrap: wrap;
    }

    .contact-item {
        background: rgba(255, 255, 255, 0.2);
        border-radius: var(--radius-md);
        padding: 1rem;
        font-weight: 600;
    }

    @media (max-width: 768px) {
        .privacy-container {
            padding: 1rem;
        }

        .privacy-header {
            padding: 2rem 1rem;
        }

        .privacy-header h1 {
            font-size: 2rem;
        }

        .privacy-header p {
            font-size: 1rem;
        }

        .privacy-nav {
            position: static;
        }

        .contact-info {
            flex-direction: column;
            align-items: center;
        }

        .contact-item {
            width: 100%;
            max-width: 300px;
        }
    }
</style>

<div class="privacy-container">
    <!-- Header -->
    <div class="privacy-header">
        <h1>Kebijakan Privasi</h1>
        <p>Komitmen kami dalam melindungi data dan privasi Anda</p>
    </div>

    <!-- Last Updated -->
    <div class="last-updated">
        <strong>Terakhir diperbarui:</strong> {{ date('d F Y') }}
    </div>

    <div style="display: grid; grid-template-columns: 300px 1fr; gap: 2rem; align-items: start;">
        <!-- Navigation -->
        <div class="privacy-nav">
            <h3>Daftar Isi</h3>
            <ul class="nav-list">
                <li><a href="#introduction">Pendahuluan</a></li>
                <li><a href="#data-collection">Pengumpulan Data</a></li>
                <li><a href="#data-usage">Penggunaan Data</a></li>
                <li><a href="#data-sharing">Pembagian Data</a></li>
                <li><a href="#data-security">Keamanan Data</a></li>
                <li><a href="#cookies">Cookies</a></li>
                <li><a href="#user-rights">Hak Pengguna</a></li>
                <li><a href="#children">Perlindungan Anak</a></li>
                <li><a href="#changes">Perubahan Kebijakan</a></li>
                <li><a href="#contact">Kontak</a></li>
            </ul>
        </div>

        <!-- Content -->
        <div class="privacy-content">
            <!-- Introduction -->
            <div id="introduction" class="privacy-section">
                <h2><i class="fas fa-info-circle"></i> Pendahuluan</h2>
                <p>
                    Selamat datang di Ayo Belajar. Kami berkomitmen untuk melindungi privasi dan data pribadi Anda. 
                    Kebijakan Privasi ini menjelaskan bagaimana kami mengumpulkan, menggunakan, menyimpan, dan 
                    melindungi informasi Anda saat menggunakan platform pembelajaran digital kami.
                </p>
                <p>
                    Dengan menggunakan layanan Ayo Belajar, Anda menyetujui praktik yang dijelaskan dalam 
                    Kebijakan Privasi ini. Jika Anda tidak setuju dengan kebijakan ini, mohon untuk tidak 
                    menggunakan layanan kami.
                </p>
                
                <div class="highlight-box">
                    <h4>Komitmen Kami</h4>
                    <p>
                        Kami berkomitmen untuk menjaga kepercayaan Anda dengan menerapkan standar keamanan 
                        tertinggi dan transparansi penuh dalam pengelolaan data pribadi Anda.
                    </p>
                </div>
            </div>

            <!-- Data Collection -->
            <div id="data-collection" class="privacy-section">
                <h2><i class="fas fa-database"></i> Pengumpulan Data</h2>
                
                <h3>Data yang Kami Kumpulkan</h3>
                <p>Kami mengumpulkan beberapa jenis informasi untuk memberikan layanan terbaik kepada Anda:</p>
                
                <h4>1. Informasi Akun</h4>
                <ul>
                    <li>Nama lengkap</li>
                    <li>Alamat email</li>
                    <li>Nomor telepon (opsional)</li>
                    <li>Informasi sekolah/institusi</li>
                    <li>Tingkat pendidikan</li>
                    <li>Wilayah/daerah</li>
                </ul>

                <h4>2. Data Aktivitas</h4>
                <ul>
                    <li>Riwayat download modul</li>
                    <li>Percakapan dengan ChatBot</li>
                    <li>Riwayat penggunaan penerjemah</li>
                    <li>Waktu dan durasi penggunaan platform</li>
                    <li>Preferensi pembelajaran</li>
                </ul>

                <h4>3. Data Teknis</h4>
                <ul>
                    <li>Alamat IP</li>
                    <li>Jenis browser dan perangkat</li>
                    <li>Sistem operasi</li>
                    <li>Data lokasi umum (kota/provinsi)</li>
                    <li>Log aktivitas sistem</li>
                </ul>
            </div>

            <!-- Data Usage -->
            <div id="data-usage" class="privacy-section">
                <h2><i class="fas fa-cogs"></i> Penggunaan Data</h2>
                
                <p>Kami menggunakan data yang dikumpulkan untuk tujuan berikut:</p>
                
                <h3>1. Penyediaan Layanan</h3>
                <ul>
                    <li>Memberikan akses ke modul pembelajaran</li>
                    <li>Menyediakan layanan ChatBot yang personal</li>
                    <li>Mengoperasikan fitur penerjemah bahasa daerah</li>
                    <li>Menyimpan riwayat aktivitas pembelajaran</li>
                </ul>

                <h3>2. Peningkatan Layanan</h3>
                <ul>
                    <li>Menganalisis pola penggunaan untuk meningkatkan platform</li>
                    <li>Mengembangkan fitur baru berdasarkan kebutuhan pengguna</li>
                    <li>Meningkatkan akurasi ChatBot dan penerjemah</li>
                    <li>Optimalisasi performa platform</li>
                </ul>

                <h3>3. Komunikasi</h3>
                <ul>
                    <li>Mengirim notifikasi penting tentang layanan</li>
                    <li>Memberikan dukungan teknis</li>
                    <li>Menginformasikan update dan fitur baru</li>
                    <li>Merespon pertanyaan dan feedback</li>
                </ul>
            </div>

            <!-- Data Sharing -->
            <div id="data-sharing" class="privacy-section">
                <h2><i class="fas fa-share-alt"></i> Pembagian Data</h2>
                
                <div class="highlight-box">
                    <h4>Prinsip Utama</h4>
                    <p>
                        Kami TIDAK menjual, menyewakan, atau memperdagangkan data pribadi Anda kepada pihak ketiga 
                        untuk tujuan komersial.
                    </p>
                </div>

                <h3>Pembagian Terbatas</h3>
                <p>Kami hanya membagikan data dalam situasi berikut:</p>
                
                <ul>
                    <li><strong>Penyedia Layanan:</strong> Dengan partner teknologi yang membantu operasional platform (hosting, analytics) dengan perjanjian kerahasiaan yang ketat</li>
                    <li><strong>Kewajiban Hukum:</strong> Jika diwajibkan oleh hukum atau perintah pengadilan</li>
                    <li><strong>Keamanan:</strong> Untuk melindungi keamanan platform dan pengguna lain</li>
                    <li><strong>Persetujuan:</strong> Dengan persetujuan eksplisit dari Anda</li>
                </ul>
            </div>

            <!-- Data Security -->
            <div id="data-security" class="privacy-section">
                <h2><i class="fas fa-shield-alt"></i> Keamanan Data</h2>
                
                <p>Kami menerapkan berbagai langkah keamanan untuk melindungi data Anda:</p>
                
                <h3>Langkah Keamanan Teknis</h3>
                <ul>
                    <li>Enkripsi data saat transmisi (SSL/TLS)</li>
                    <li>Enkripsi data saat penyimpanan</li>
                    <li>Sistem autentikasi yang aman</li>
                    <li>Firewall dan sistem deteksi intrusi</li>
                    <li>Backup data secara berkala</li>
                </ul>

                <h3>Langkah Keamanan Operasional</h3>
                <ul>
                    <li>Akses terbatas ke data pribadi</li>
                    <li>Pelatihan keamanan untuk tim</li>
                    <li>Audit keamanan berkala</li>
                    <li>Protokol respons insiden</li>
                </ul>

                <div class="highlight-box">
                    <h4>Catatan Penting</h4>
                    <p>
                        Meskipun kami menerapkan langkah keamanan terbaik, tidak ada sistem yang 100% aman. 
                        Kami terus memperbarui dan meningkatkan sistem keamanan kami.
                    </p>
                </div>
            </div>

            <!-- Cookies -->
            <div id="cookies" class="privacy-section">
                <h2><i class="fas fa-cookie-bite"></i> Cookies dan Teknologi Serupa</h2>
                
                <p>Kami menggunakan cookies dan teknologi serupa untuk:</p>
                
                <ul>
                    <li>Menjaga sesi login Anda</li>
                    <li>Mengingat preferensi Anda</li>
                    <li>Menganalisis penggunaan platform</li>
                    <li>Meningkatkan pengalaman pengguna</li>
                </ul>

                <h3>Jenis Cookies</h3>
                <ul>
                    <li><strong>Cookies Esensial:</strong> Diperlukan untuk fungsi dasar platform</li>
                    <li><strong>Cookies Fungsional:</strong> Mengingat pilihan dan preferensi Anda</li>
                    <li><strong>Cookies Analitik:</strong> Membantu kami memahami cara penggunaan platform</li>
                </ul>

                <p>Anda dapat mengatur preferensi cookies melalui pengaturan browser Anda.</p>
            </div>

            <!-- User Rights -->
            <div id="user-rights" class="privacy-section">
                <h2><i class="fas fa-user-shield"></i> Hak Pengguna</h2>
                
                <p>Sebagai pengguna, Anda memiliki hak-hak berikut:</p>
                
                <ul>
                    <li><strong>Akses:</strong> Melihat data pribadi yang kami simpan</li>
                    <li><strong>Koreksi:</strong> Memperbarui atau memperbaiki data yang tidak akurat</li>
                    <li><strong>Penghapusan:</strong> Meminta penghapusan data pribadi Anda</li>
                    <li><strong>Portabilitas:</strong> Mendapatkan salinan data Anda</li>
                    <li><strong>Pembatasan:</strong> Membatasi pemrosesan data tertentu</li>
                    <li><strong>Keberatan:</strong> Menolak pemrosesan data untuk tujuan tertentu</li>
                </ul>

                <div class="highlight-box">
                    <h4>Cara Menggunakan Hak Anda</h4>
                    <p>
                        Untuk menggunakan hak-hak ini, hubungi kami melalui email privacy@ayobelajar.id 
                        atau melalui halaman kontak. Kami akan merespon dalam 30 hari.
                    </p>
                </div>
            </div>

            <!-- Children Protection -->
            <div id="children" class="privacy-section">
                <h2><i class="fas fa-child"></i> Perlindungan Anak</h2>
                
                <p>
                    Platform Ayo Belajar dirancang untuk mendukung pendidikan anak-anak dan remaja. 
                    Kami berkomitmen untuk melindungi privasi pengguna di bawah umur.
                </p>

                <h3>Kebijakan untuk Anak di Bawah 13 Tahun</h3>
                <ul>
                    <li>Memerlukan persetujuan orang tua/wali</li>
                    <li>Pengumpulan data minimal yang diperlukan</li>
                    <li>Tidak ada iklan yang ditargetkan</li>
                    <li>Pengawasan ekstra terhadap keamanan data</li>
                </ul>

                <h3>Kebijakan untuk Remaja (13-17 Tahun)</h3>
                <ul>
                    <li>Edukasi tentang privasi dan keamanan online</li>
                    <li>Kontrol privasi yang mudah digunakan</li>
                    <li>Transparansi dalam pengumpulan data</li>
                </ul>
            </div>

            <!-- Policy Changes -->
            <div id="changes" class="privacy-section">
                <h2><i class="fas fa-edit"></i> Perubahan Kebijakan</h2>
                
                <p>
                    Kami dapat memperbarui Kebijakan Privasi ini dari waktu ke waktu untuk mencerminkan 
                    perubahan dalam layanan kami atau persyaratan hukum.
                </p>

                <h3>Pemberitahuan Perubahan</h3>
                <ul>
                    <li>Notifikasi email untuk perubahan material</li>
                    <li>Pengumuman di platform</li>
                    <li>Update tanggal "Terakhir diperbarui"</li>
                    <li>Periode transisi 30 hari untuk perubahan signifikan</li>
                </ul>

                <p>
                    Penggunaan berkelanjutan layanan kami setelah perubahan kebijakan menandakan 
                    persetujuan Anda terhadap kebijakan yang diperbarui.
                </p>
            </div>
        </div>
    </div>

    <!-- Contact Section -->
    <div id="contact" class="contact-section">
        <h3>Hubungi Kami</h3>
        <p>
            Jika Anda memiliki pertanyaan tentang Kebijakan Privasi ini atau ingin menggunakan hak privasi Anda, 
            jangan ragu untuk menghubungi kami.
        </p>
        <div class="contact-info">
            <div class="contact-item">
                <strong>Email:</strong><br>
                privacy@ayobelajar.id
            </div>
            <div class="contact-item">
                <strong>Alamat:</strong><br>
                Universitas Gunadarma<br>
                Depok, Jawa Barat
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Smooth scrolling for navigation links
    const navLinks = document.querySelectorAll('.nav-list a');
    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href').substring(1);
            const targetElement = document.getElementById(targetId);
            if (targetElement) {
                targetElement.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Highlight current section in navigation
    const sections = document.querySelectorAll('.privacy-section');
    const navItems = document.querySelectorAll('.nav-list a');
    
    function highlightCurrentSection() {
        let current = '';
        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            if (window.pageYOffset >= sectionTop - 100) {
                current = section.getAttribute('id');
            }
        });
        
        navItems.forEach(item => {
            item.style.background = '';
            item.style.color = '';
            if (item.getAttribute('href') === '#' + current) {
                item.style.background = 'var(--accent-primary-soft)';
                item.style.color = 'var(--accent-main)';
            }
        });
    }
    
    window.addEventListener('scroll', highlightCurrentSection);
});
</script>
@endsection