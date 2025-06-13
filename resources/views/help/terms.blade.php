@extends('layouts.app')

@section('content')
<style>
    .terms-container {
        max-width: 1000px;
        margin: 0 auto;
        padding: 2rem 1rem;
    }

    .terms-header {
        text-align: center;
        margin-bottom: 4rem;
        padding: 4rem 0;
        background: linear-gradient(135deg, var(--accent-main) 0%, var(--accent-main-light) 100%);
        border-radius: var(--radius-xl);
        color: white;
        position: relative;
        overflow: hidden;
    }

    .terms-header::before {
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

    .terms-header h1 {
        font-size: 3rem;
        font-weight: 800;
        margin-bottom: 1rem;
        position: relative;
        z-index: 2;
    }

    .terms-header p {
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

    .terms-nav {
        background: var(--card-bg);
        border-radius: var(--radius-lg);
        padding: 2rem;
        box-shadow: var(--shadow-soft);
        border: 1px solid var(--border-soft);
        margin-bottom: 3rem;
        position: sticky;
        top: 2rem;
    }

    .terms-nav h3 {
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
        font-size: 0.875rem;
    }

    .nav-list a:hover {
        background: var(--accent-primary-soft);
        color: var(--accent-main);
    }

    .terms-content {
        background: var(--card-bg);
        border-radius: var(--radius-lg);
        padding: 2rem;
        box-shadow: var(--shadow-soft);
        border: 1px solid var(--border-soft);
    }

    .terms-section {
        margin-bottom: 3rem;
        padding-bottom: 2rem;
        border-bottom: 1px solid var(--border-soft);
    }

    .terms-section:last-child {
        border-bottom: none;
        margin-bottom: 0;
    }

    .terms-section h2 {
        font-size: 1.75rem;
        font-weight: 700;
        color: var(--text-main);
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .terms-section h2 i {
        color: var(--accent-main);
    }

    .terms-section h3 {
        font-size: 1.25rem;
        font-weight: 700;
        color: var(--text-main);
        margin: 1.5rem 0 1rem 0;
    }

    .terms-section p {
        color: var(--text-body);
        line-height: 1.8;
        margin-bottom: 1rem;
        text-align: justify;
    }

    .terms-section ul,
    .terms-section ol {
        color: var(--text-body);
        line-height: 1.8;
        margin-bottom: 1rem;
        padding-left: 2rem;
    }

    .terms-section li {
        margin-bottom: 0.5rem;
    }

    .important-box {
        background: rgba(239, 68, 68, 0.1);
        border-radius: var(--radius-md);
        padding: 1.5rem;
        border-left: 4px solid #ef4444;
        margin: 1.5rem 0;
    }

    .important-box h4 {
        color: #ef4444;
        font-weight: 700;
        margin-bottom: 0.75rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .important-box p {
        margin: 0;
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
        .terms-container {
            padding: 1rem;
        }

        .terms-header {
            padding: 2rem 1rem;
        }

        .terms-header h1 {
            font-size: 2rem;
        }

        .terms-header p {
            font-size: 1rem;
        }

        .terms-nav {
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

<div class="terms-container">
    <!-- Header -->
    <div class="terms-header">
        <h1>Syarat & Ketentuan</h1>
        <p>Aturan dan ketentuan penggunaan platform Ayo Belajar</p>
    </div>

    <!-- Last Updated -->
    <div class="last-updated">
        <strong>Terakhir diperbarui:</strong> {{ date('d F Y') }}
    </div>

    <div style="display: grid; grid-template-columns: 300px 1fr; gap: 2rem; align-items: start;">
        <!-- Navigation -->
        <div class="terms-nav">
            <h3>Daftar Isi</h3>
            <ul class="nav-list">
                <li><a href="#acceptance">Penerimaan Syarat</a></li>
                <li><a href="#definitions">Definisi</a></li>
                <li><a href="#services">Layanan Kami</a></li>
                <li><a href="#registration">Pendaftaran Akun</a></li>
                <li><a href="#usage">Penggunaan Platform</a></li>
                <li><a href="#content">Konten dan Hak Cipta</a></li>
                <li><a href="#prohibited">Aktivitas Terlarang</a></li>
                <li><a href="#privacy">Privasi</a></li>
                <li><a href="#liability">Batasan Tanggung Jawab</a></li>
                <li><a href="#termination">Penghentian Layanan</a></li>
                <li><a href="#changes">Perubahan Syarat</a></li>
                <li><a href="#governing-law">Hukum yang Berlaku</a></li>
                <li><a href="#contact">Kontak</a></li>
            </ul>
        </div>

        <!-- Content -->
        <div class="terms-content">
            <!-- Acceptance -->
            <div id="acceptance" class="terms-section">
                <h2><i class="fas fa-handshake"></i> Penerimaan Syarat</h2>
                <p>
                    Dengan mengakses dan menggunakan platform Ayo Belajar, Anda menyetujui untuk terikat 
                    oleh Syarat dan Ketentuan ini. Jika Anda tidak setuju dengan syarat-syarat ini, 
                    mohon untuk tidak menggunakan layanan kami.
                </p>
                <p>
                    Syarat dan Ketentuan ini berlaku untuk semua pengguna platform, termasuk siswa, 
                    guru, orang tua, dan pengunjung umum.
                </p>
                
                <div class="important-box">
                    <h4><i class="fas fa-exclamation-triangle"></i> Penting</h4>
                    <p>
                        Penggunaan berkelanjutan platform kami setelah perubahan Syarat dan Ketentuan 
                        menandakan persetujuan Anda terhadap syarat yang diperbarui.
                    </p>
                </div>
            </div>

            <!-- Definitions -->
            <div id="definitions" class="terms-section">
                <h2><i class="fas fa-book"></i> Definisi</h2>
                <p>Dalam Syarat dan Ketentuan ini:</p>
                <ul>
                    <li><strong>"Platform"</strong> merujuk pada website dan aplikasi Ayo Belajar</li>
                    <li><strong>"Layanan"</strong> merujuk pada semua fitur yang disediakan oleh Ayo Belajar</li>
                    <li><strong>"Pengguna"</strong> merujuk pada setiap orang yang mengakses platform</li>
                    <li><strong>"Konten"</strong> merujuk pada semua materi, teks, gambar, video, dan data lainnya</li>
                    <li><strong>"Akun"</strong> merujuk pada akun pengguna yang terdaftar</li>
                    <li><strong>"Kami"</strong> merujuk pada tim Ayo Belajar</li>
                </ul>
            </div>

            <!-- Services -->
            <div id="services" class="terms-section">
                <h2><i class="fas fa-cogs"></i> Layanan Kami</h2>
                
                <h3>Layanan yang Disediakan</h3>
                <p>Ayo Belajar menyediakan platform pembelajaran digital yang mencakup:</p>
                <ul>
                    <li>Modul pembelajaran digital untuk berbagai mata pelajaran</li>
                    <li>ChatBot AI untuk bantuan pembelajaran</li>
                    <li>Penerjemah bahasa daerah Indonesia</li>
                    <li>Dashboard pengguna untuk tracking progress</li>
                    <li>Fitur download dan akses offline</li>
                </ul>

                <h3>Ketersediaan Layanan</h3>
                <p>
                    Kami berusaha menjaga platform tersedia 24/7, namun tidak dapat menjamin 
                    ketersediaan tanpa gangguan. Pemeliharaan berkala dan update sistem 
                    mungkin menyebabkan gangguan sementara.
                </p>

                <div class="highlight-box">
                    <h4>Layanan Gratis</h4>
                    <p>
                        Semua layanan Ayo Belajar disediakan secara gratis untuk mendukung 
                        pendidikan di Indonesia, khususnya di daerah 3T.
                    </p>
                </div>
            </div>

            <!-- Registration -->
            <div id="registration" class="terms-section">
                <h2><i class="fas fa-user-plus"></i> Pendaftaran Akun</h2>
                
                <h3>Persyaratan Pendaftaran</h3>
                <ul>
                    <li>Memberikan informasi yang akurat dan lengkap</li>
                    <li>Memiliki alamat email yang valid</li>
                    <li>Berusia minimal 13 tahun (atau memiliki persetujuan orang tua)</li>
                    <li>Menyetujui Syarat dan Ketentuan serta Kebijakan Privasi</li>
                </ul>

                <h3>Keamanan Akun</h3>
                <p>Anda bertanggung jawab untuk:</p>
                <ul>
                    <li>Menjaga kerahasiaan password</li>
                    <li>Melaporkan penggunaan akun yang tidak sah</li>
                    <li>Memperbarui informasi akun secara berkala</li>
                    <li>Tidak membagikan akses akun kepada orang lain</li>
                </ul>

                <div class="important-box">
                    <h4><i class="fas fa-shield-alt"></i> Keamanan</h4>
                    <p>
                        Kami tidak bertanggung jawab atas kerugian yang timbul akibat 
                        kelalaian Anda dalam menjaga keamanan akun.
                    </p>
                </div>
            </div>

            <!-- Usage -->
            <div id="usage" class="terms-section">
                <h2><i class="fas fa-laptop"></i> Penggunaan Platform</h2>
                
                <h3>Penggunaan yang Diizinkan</h3>
                <ul>
                    <li>Mengakses dan mengunduh modul untuk keperluan pembelajaran</li>
                    <li>Menggunakan ChatBot untuk bantuan akademik</li>
                    <li>Menggunakan penerjemah untuk keperluan pendidikan</li>
                    <li>Berbagi konten dengan teman untuk tujuan pembelajaran</li>
                </ul>

                <h3>Batasan Penggunaan</h3>
                <ul>
                    <li>Tidak menggunakan platform untuk tujuan komersial</li>
                    <li>Tidak mendistribusikan ulang konten tanpa izin</li>
                    <li>Tidak menggunakan bot atau script otomatis</li>
                    <li>Tidak mencoba mengakses sistem secara tidak sah</li>
                </ul>
            </div>

            <!-- Content -->
            <div id="content" class="terms-section">
                <h2><i class="fas fa-copyright"></i> Konten dan Hak Cipta</h2>
                
                <h3>Hak Cipta Kami</h3>
                <p>
                    Semua konten di platform Ayo Belajar, termasuk teks, gambar, video, 
                    dan software, dilindungi oleh hak cipta dan hak kekayaan intelektual lainnya.
                </p>

                <h3>Lisensi Penggunaan</h3>
                <p>Kami memberikan Anda lisensi terbatas untuk:</p>
                <ul>
                    <li>Mengakses dan menggunakan platform untuk keperluan pribadi</li>
                    <li>Mengunduh modul untuk pembelajaran offline</li>
                    <li>Mencetak materi untuk keperluan belajar</li>
                </ul>

                <h3>Konten Pengguna</h3>
                <p>
                    Dengan mengirimkan konten ke platform (seperti pertanyaan ke ChatBot), 
                    Anda memberikan kami hak untuk menggunakan konten tersebut untuk 
                    meningkatkan layanan kami.
                </p>
            </div>

            <!-- Prohibited Activities -->
            <div id="prohibited" class="terms-section">
                <h2><i class="fas fa-ban"></i> Aktivitas Terlarang</h2>
                
                <p>Anda dilarang untuk:</p>
                <ul>
                    <li>Menggunakan platform untuk aktivitas ilegal</li>
                    <li>Mengganggu atau merusak sistem platform</li>
                    <li>Mencoba mengakses akun pengguna lain</li>
                    <li>Mengirim spam atau konten berbahaya</li>
                    <li>Melanggar hak cipta atau hak kekayaan intelektual</li>
                    <li>Menyebarkan virus atau malware</li>
                    <li>Menggunakan platform untuk menyebarkan konten yang tidak pantas</li>
                </ul>

                <div class="important-box">
                    <h4><i class="fas fa-gavel"></i> Konsekuensi</h4>
                    <p>
                        Pelanggaran terhadap aturan ini dapat mengakibatkan penangguhan 
                        atau penghentian akses ke platform tanpa pemberitahuan sebelumnya.
                    </p>
                </div>
            </div>

            <!-- Privacy -->
            <div id="privacy" class="terms-section">
                <h2><i class="fas fa-user-shield"></i> Privasi</h2>
                
                <p>
                    Penggunaan platform kami juga diatur oleh Kebijakan Privasi kami, 
                    yang menjelaskan bagaimana kami mengumpulkan, menggunakan, dan 
                    melindungi informasi pribadi Anda.
                </p>

                <p>
                    Dengan menggunakan platform ini, Anda juga menyetujui praktik 
                    yang dijelaskan dalam Kebijakan Privasi kami.
                </p>

                <div class="highlight-box">
                    <h4>Komitmen Privasi</h4>
                    <p>
                        Kami berkomitmen untuk melindungi privasi Anda dan tidak akan 
                        menjual atau menyewakan data pribadi Anda kepada pihak ketiga.
                    </p>
                </div>
            </div>

            <!-- Liability -->
            <div id="liability" class="terms-section">
                <h2><i class="fas fa-balance-scale"></i> Batasan Tanggung Jawab</h2>
                
                <h3>Penyangkalan Jaminan</h3>
                <p>
                    Platform Ayo Belajar disediakan "sebagaimana adanya" tanpa jaminan 
                    apapun, baik tersurat maupun tersirat. Kami tidak menjamin bahwa:
                </p>
                <ul>
                    <li>Platform akan selalu tersedia tanpa gangguan</li>
                    <li>Semua informasi akurat dan terkini</li>
                    <li>Platform bebas dari virus atau malware</li>
                    <li>Layanan akan memenuhi semua kebutuhan Anda</li>
                </ul>

                <h3>Batasan Tanggung Jawab</h3>
                <p>
                    Kami tidak bertanggung jawab atas kerugian langsung, tidak langsung, 
                    insidental, atau konsekuensial yang timbul dari penggunaan platform, 
                    termasuk namun tidak terbatas pada:
                </p>
                <ul>
                    <li>Kehilangan data atau informasi</li>
                    <li>Gangguan bisnis atau pendidikan</li>
                    <li>Kerugian finansial</li>
                    <li>Kerusakan perangkat</li>
                </ul>
            </div>

            <!-- Termination -->
            <div id="termination" class="terms-section">
                <h2><i class="fas fa-times-circle"></i> Penghentian Layanan</h2>
                
                <h3>Penghentian oleh Pengguna</h3>
                <p>
                    Anda dapat menghentikan penggunaan platform kapan saja dengan 
                    menghapus akun Anda melalui pengaturan profil atau menghubungi 
                    tim support kami.
                </p>

                <h3>Penghentian oleh Kami</h3>
                <p>Kami berhak menghentikan akses Anda jika:</p>
                <ul>
                    <li>Anda melanggar Syarat dan Ketentuan ini</li>
                    <li>Anda menggunakan platform untuk aktivitas ilegal</li>
                    <li>Akun tidak aktif dalam jangka waktu lama</li>
                    <li>Diperlukan untuk menjaga keamanan platform</li>
                </ul>

                <h3>Efek Penghentian</h3>
                <p>
                    Setelah penghentian, akses Anda ke platform akan dihentikan, 
                    namun data yang telah diunduh sebelumnya tetap dapat Anda gunakan 
                    sesuai dengan lisensi yang diberikan.
                </p>
            </div>

            <!-- Changes -->
            <div id="changes" class="terms-section">
                <h2><i class="fas fa-edit"></i> Perubahan Syarat</h2>
                
                <p>
                    Kami berhak mengubah Syarat dan Ketentuan ini kapan saja. 
                    Perubahan akan diberitahukan melalui:
                </p>
                <ul>
                    <li>Email notifikasi untuk perubahan material</li>
                    <li>Pengumuman di platform</li>
                    <li>Update tanggal "Terakhir diperbarui"</li>
                </ul>

                <p>
                    Penggunaan berkelanjutan platform setelah perubahan menandakan 
                    persetujuan Anda terhadap syarat yang diperbarui.
                </p>
            </div>

            <!-- Governing Law -->
            <div id="governing-law" class="terms-section">
                <h2><i class="fas fa-gavel"></i> Hukum yang Berlaku</h2>
                
                <p>
                    Syarat dan Ketentuan ini diatur oleh dan ditafsirkan sesuai dengan 
                    hukum Republik Indonesia. Setiap sengketa yang timbul akan diselesaikan 
                    melalui pengadilan yang berwenang di Indonesia.
                </p>

                <h3>Penyelesaian Sengketa</h3>
                <p>
                    Kami mendorong penyelesaian sengketa melalui negosiasi dan mediasi 
                    sebelum mengambil langkah hukum formal.
                </p>
            </div>
        </div>
    </div>

    <!-- Contact Section -->
    <div id="contact" class="contact-section">
        <h3>Hubungi Kami</h3>
        <p>
            Jika Anda memiliki pertanyaan tentang Syarat dan Ketentuan ini, 
            jangan ragu untuk menghubungi kami.
        </p>
        <div class="contact-info">
            <div class="contact-item">
                <strong>Email:</strong><br>
                legal@ayobelajar.id
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
    const sections = document.querySelectorAll('.terms-section');
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