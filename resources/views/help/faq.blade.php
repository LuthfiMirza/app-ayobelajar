@extends('layouts.app')

@section('content')
<style>
    .faq-container {
        max-width: 1000px;
        margin: 0 auto;
        padding: 2rem 1rem;
    }

    .faq-header {
        text-align: center;
        margin-bottom: 4rem;
        padding: 4rem 0;
        background: linear-gradient(135deg, var(--accent-main) 0%, var(--accent-main-light) 100%);
        border-radius: var(--radius-xl);
        color: white;
        position: relative;
        overflow: hidden;
    }

    .faq-header::before {
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

    .faq-header h1 {
        font-size: 3rem;
        font-weight: 800;
        margin-bottom: 1rem;
        position: relative;
        z-index: 2;
    }

    .faq-header p {
        font-size: 1.25rem;
        opacity: 0.9;
        position: relative;
        z-index: 2;
    }

    .faq-search {
        background: var(--card-bg);
        border-radius: var(--radius-lg);
        padding: 2rem;
        box-shadow: var(--shadow-soft);
        border: 1px solid var(--border-soft);
        margin-bottom: 3rem;
        text-align: center;
    }

    .search-box {
        position: relative;
        max-width: 500px;
        margin: 0 auto;
    }

    .search-box input {
        width: 100%;
        padding: 1rem 3rem 1rem 1rem;
        border: 2px solid var(--border-soft);
        border-radius: var(--radius-pill);
        font-size: 1rem;
        background: var(--input-bg);
        color: var(--text-main);
        transition: all 0.3s ease;
    }

    .search-box input:focus {
        outline: none;
        border-color: var(--accent-main);
        box-shadow: 0 0 0 3px rgba(120, 87, 193, 0.1);
    }

    .search-box i {
        position: absolute;
        right: 1rem;
        top: 50%;
        transform: translateY(-50%);
        color: var(--text-light);
        font-size: 1.25rem;
    }

    .faq-categories {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1rem;
        margin-bottom: 3rem;
    }

    .category-btn {
        background: var(--card-bg);
        border: 2px solid var(--border-soft);
        border-radius: var(--radius-md);
        padding: 1rem;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s ease;
        color: var(--text-main);
        text-decoration: none;
    }

    .category-btn:hover,
    .category-btn.active {
        background: var(--accent-primary-soft);
        border-color: var(--accent-main);
        color: var(--accent-main);
        transform: translateY(-2px);
    }

    .category-btn i {
        font-size: 1.5rem;
        margin-bottom: 0.5rem;
        display: block;
    }

    .faq-section {
        margin-bottom: 3rem;
    }

    .faq-section h2 {
        font-size: 1.75rem;
        font-weight: 700;
        color: var(--text-main);
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .faq-section h2 i {
        color: var(--accent-main);
    }

    .faq-item {
        background: var(--card-bg);
        border-radius: var(--radius-lg);
        margin-bottom: 1rem;
        box-shadow: var(--shadow-soft);
        border: 1px solid var(--border-soft);
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .faq-item:hover {
        box-shadow: 0 8px 25px rgba(120, 87, 193, 0.1);
    }

    .faq-question {
        padding: 1.5rem;
        cursor: pointer;
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: transparent;
        border: none;
        width: 100%;
        text-align: left;
        font-size: 1.125rem;
        font-weight: 600;
        color: var(--text-main);
        transition: all 0.3s ease;
    }

    .faq-question:hover {
        background: rgba(120, 87, 193, 0.05);
    }

    .faq-question.active {
        background: var(--accent-primary-soft);
        color: var(--accent-main);
    }

    .faq-icon {
        font-size: 1.25rem;
        transition: transform 0.3s ease;
        color: var(--accent-main);
    }

    .faq-question.active .faq-icon {
        transform: rotate(180deg);
    }

    .faq-answer {
        padding: 0 1.5rem 1.5rem;
        color: var(--text-body);
        line-height: 1.8;
        display: none;
    }

    .faq-answer.active {
        display: block;
        animation: slideDown 0.3s ease;
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .contact-help {
        background: linear-gradient(135deg, var(--accent-main) 0%, var(--accent-main-light) 100%);
        border-radius: var(--radius-lg);
        padding: 2rem;
        color: white;
        text-align: center;
        margin-top: 3rem;
    }

    .contact-help h3 {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 1rem;
    }

    .contact-help p {
        margin-bottom: 1.5rem;
        opacity: 0.9;
    }

    .help-buttons {
        display: flex;
        justify-content: center;
        gap: 1rem;
        flex-wrap: wrap;
    }

    .help-btn {
        background: rgba(255, 255, 255, 0.2);
        color: white;
        padding: 0.75rem 1.5rem;
        border-radius: var(--radius-pill);
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .help-btn:hover {
        background: rgba(255, 255, 255, 0.3);
        transform: translateY(-2px);
    }

    @media (max-width: 768px) {
        .faq-container {
            padding: 1rem;
        }

        .faq-header {
            padding: 2rem 1rem;
        }

        .faq-header h1 {
            font-size: 2rem;
        }

        .faq-header p {
            font-size: 1rem;
        }

        .faq-categories {
            grid-template-columns: repeat(2, 1fr);
        }

        .help-buttons {
            flex-direction: column;
            align-items: center;
        }

        .help-btn {
            width: 100%;
            max-width: 300px;
            justify-content: center;
        }
    }
</style>

<div class="faq-container">
    <!-- Header -->
    <div class="faq-header">
        <h1>FAQ (Frequently Asked Questions)</h1>
        <p>Temukan jawaban atas pertanyaan yang sering diajukan</p>
    </div>

    <!-- Search -->
    <div class="faq-search">
        <h3 style="margin-bottom: 1rem; color: var(--text-main);">Cari Pertanyaan</h3>
        <div class="search-box">
            <input type="text" id="faqSearch" placeholder="Ketik kata kunci untuk mencari FAQ...">
            <i class="fas fa-search"></i>
        </div>
    </div>

    <!-- Categories -->
    <div class="faq-categories">
        <div class="category-btn active" data-category="all">
            <i class="fas fa-list"></i>
            Semua
        </div>
        <div class="category-btn" data-category="account">
            <i class="fas fa-user"></i>
            Akun
        </div>
        <div class="category-btn" data-category="modules">
            <i class="fas fa-book"></i>
            Modul
        </div>
        <div class="category-btn" data-category="chatbot">
            <i class="fas fa-robot"></i>
            ChatBot
        </div>
        <div class="category-btn" data-category="translator">
            <i class="fas fa-language"></i>
            Penerjemah
        </div>
        <div class="category-btn" data-category="technical">
            <i class="fas fa-cog"></i>
            Teknis
        </div>
    </div>

    <!-- FAQ Sections -->
    <div class="faq-content">
        <!-- Account FAQs -->
        <div class="faq-section" data-category="account">
            <h2><i class="fas fa-user"></i> Akun & Pendaftaran</h2>
            
            <div class="faq-item">
                <button class="faq-question">
                    Bagaimana cara mendaftar di Ayo Belajar?
                    <i class="fas fa-chevron-down faq-icon"></i>
                </button>
                <div class="faq-answer">
                    <p>Untuk mendaftar di Ayo Belajar, ikuti langkah berikut:</p>
                    <ol>
                        <li>Klik tombol "Daftar" di pojok kanan atas halaman</li>
                        <li>Isi formulir pendaftaran dengan data yang valid (nama, email, password)</li>
                        <li>Verifikasi email Anda melalui link yang dikirimkan</li>
                        <li>Login menggunakan email dan password yang telah didaftarkan</li>
                    </ol>
                    <p>Pendaftaran gratis dan Anda langsung dapat mengakses semua fitur platform.</p>
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question">
                    Apakah Ayo Belajar gratis?
                    <i class="fas fa-chevron-down faq-icon"></i>
                </button>
                <div class="faq-answer">
                    <p>Ya, Ayo Belajar sepenuhnya gratis untuk digunakan. Semua fitur termasuk download modul, ChatBot, dan penerjemah dapat diakses tanpa biaya. Platform ini dikembangkan khusus untuk mendukung pendidikan di daerah 3T (Terdepan, Terluar, Tertinggal).</p>
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question">
                    Bagaimana cara mengubah password?
                    <i class="fas fa-chevron-down faq-icon"></i>
                </button>
                <div class="faq-answer">
                    <p>Untuk mengubah password:</p>
                    <ol>
                        <li>Login ke akun Anda</li>
                        <li>Klik nama Anda di pojok kanan atas</li>
                        <li>Pilih "Profil" dari dropdown menu</li>
                        <li>Scroll ke bagian "Keamanan" dan klik "Ubah Password"</li>
                        <li>Masukkan password lama dan password baru</li>
                        <li>Klik "Simpan Perubahan"</li>
                    </ol>
                </div>
            </div>
        </div>

        <!-- Modules FAQs -->
        <div class="faq-section" data-category="modules">
            <h2><i class="fas fa-book"></i> Modul Digital</h2>
            
            <div class="faq-item">
                <button class="faq-question">
                    Bagaimana cara mendownload modul?
                    <i class="fas fa-chevron-down faq-icon"></i>
                </button>
                <div class="faq-answer">
                    <p>Untuk mendownload modul:</p>
                    <ol>
                        <li>Buka halaman "Modul" dari menu navigasi</li>
                        <li>Gunakan filter atau pencarian untuk menemukan modul yang diinginkan</li>
                        <li>Klik "Lihat Detail" pada modul yang dipilih</li>
                        <li>Klik tombol "Download" (login diperlukan)</li>
                        <li>File akan terdownload dalam format PDF</li>
                    </ol>
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question">
                    Apakah modul bisa diakses offline?
                    <i class="fas fa-chevron-down faq-icon"></i>
                </button>
                <div class="faq-answer">
                    <p>Ya, setelah modul didownload, Anda dapat membacanya secara offline tanpa koneksi internet. Ini sangat berguna untuk daerah dengan koneksi internet terbatas. Modul tersimpan dalam format PDF yang dapat dibuka di berbagai perangkat.</p>
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question">
                    Berapa banyak modul yang bisa didownload?
                    <i class="fas fa-chevron-down faq-icon"></i>
                </button>
                <div class="faq-answer">
                    <p>Tidak ada batasan jumlah modul yang dapat Anda download. Anda bebas mendownload semua modul yang tersedia sesuai kebutuhan belajar Anda. Semua riwayat download juga tersimpan di dashboard untuk referensi.</p>
                </div>
            </div>
        </div>

        <!-- ChatBot FAQs -->
        <div class="faq-section" data-category="chatbot">
            <h2><i class="fas fa-robot"></i> ChatBot Pintar</h2>
            
            <div class="faq-item">
                <button class="faq-question">
                    Bagaimana cara menggunakan ChatBot?
                    <i class="fas fa-chevron-down faq-icon"></i>
                </button>
                <div class="faq-answer">
                    <p>Untuk menggunakan ChatBot:</p>
                    <ol>
                        <li>Klik menu "ChatBot" atau tombol chat di pojok kanan bawah</li>
                        <li>Ketik pertanyaan atau topik yang ingin dipelajari</li>
                        <li>Tekan Enter atau klik tombol kirim</li>
                        <li>ChatBot akan memberikan jawaban dalam beberapa detik</li>
                        <li>Lanjutkan percakapan dengan pertanyaan follow-up</li>
                    </ol>
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question">
                    Mata pelajaran apa saja yang bisa ditanyakan ke ChatBot?
                    <i class="fas fa-chevron-down faq-icon"></i>
                </button>
                <div class="faq-answer">
                    <p>ChatBot dapat membantu dengan berbagai mata pelajaran:</p>
                    <ul>
                        <li>Matematika (SD, SMP, SMA)</li>
                        <li>Bahasa Indonesia</li>
                        <li>Bahasa Inggris</li>
                        <li>IPA (Fisika, Kimia, Biologi)</li>
                        <li>IPS (Sejarah, Geografi, Ekonomi)</li>
                        <li>Dan mata pelajaran lainnya</li>
                    </ul>
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question">
                    Apakah percakapan dengan ChatBot tersimpan?
                    <i class="fas fa-chevron-down faq-icon"></i>
                </button>
                <div class="faq-answer">
                    <p>Ya, semua percakapan dengan ChatBot tersimpan di dashboard Anda. Anda dapat mengakses riwayat chat melalui menu "Riwayat Chat" di dashboard untuk referensi pembelajaran di kemudian hari.</p>
                </div>
            </div>
        </div>

        <!-- Translator FAQs -->
        <div class="faq-section" data-category="translator">
            <h2><i class="fas fa-language"></i> Penerjemah Bahasa Daerah</h2>
            
            <div class="faq-item">
                <button class="faq-question">
                    Bahasa daerah apa saja yang didukung?
                    <i class="fas fa-chevron-down faq-icon"></i>
                </button>
                <div class="faq-answer">
                    <p>Penerjemah kami mendukung berbagai bahasa daerah Indonesia:</p>
                    <ul>
                        <li>Bahasa Jawa</li>
                        <li>Bahasa Sunda</li>
                        <li>Bahasa Batak</li>
                        <li>Bahasa Minangkabau</li>
                        <li>Bahasa Bugis</li>
                        <li>Bahasa Bali</li>
                        <li>Dan bahasa daerah lainnya</li>
                    </ul>
                    <p>Kami terus menambah dukungan bahasa daerah baru.</p>
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question">
                    Bagaimana akurasi terjemahan?
                    <i class="fas fa-chevron-down faq-icon"></i>
                </button>
                <div class="faq-answer">
                    <p>Kami menggunakan teknologi AI terdepan untuk memberikan terjemahan yang akurat. Namun, untuk istilah teknis atau konteks khusus, kami sarankan untuk memverifikasi dengan penutur asli. Kami terus meningkatkan akurasi melalui feedback pengguna.</p>
                </div>
            </div>
        </div>

        <!-- Technical FAQs -->
        <div class="faq-section" data-category="technical">
            <h2><i class="fas fa-cog"></i> Masalah Teknis</h2>
            
            <div class="faq-item">
                <button class="faq-question">
                    Apa yang harus dilakukan jika website tidak bisa diakses?
                    <i class="fas fa-chevron-down faq-icon"></i>
                </button>
                <div class="faq-answer">
                    <p>Jika website tidak bisa diakses, coba langkah berikut:</p>
                    <ol>
                        <li>Periksa koneksi internet Anda</li>
                        <li>Refresh halaman (Ctrl+F5)</li>
                        <li>Hapus cache dan cookies browser</li>
                        <li>Coba gunakan browser yang berbeda</li>
                        <li>Jika masih bermasalah, hubungi tim support kami</li>
                    </ol>
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question">
                    Perangkat apa saja yang didukung?
                    <i class="fas fa-chevron-down faq-icon"></i>
                </button>
                <div class="faq-answer">
                    <p>Ayo Belajar dapat diakses melalui:</p>
                    <ul>
                        <li>Komputer/Laptop (Windows, Mac, Linux)</li>
                        <li>Smartphone Android</li>
                        <li>iPhone/iPad</li>
                        <li>Tablet</li>
                    </ul>
                    <p>Platform kami responsif dan dapat digunakan di berbagai ukuran layar.</p>
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question">
                    Bagaimana jika lupa password?
                    <i class="fas fa-chevron-down faq-icon"></i>
                </button>
                <div class="faq-answer">
                    <p>Jika lupa password:</p>
                    <ol>
                        <li>Klik "Lupa Password?" di halaman login</li>
                        <li>Masukkan email yang terdaftar</li>
                        <li>Periksa email untuk link reset password</li>
                        <li>Klik link dan buat password baru</li>
                        <li>Login dengan password baru</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Help -->
    <div class="contact-help">
        <h3>Tidak Menemukan Jawaban?</h3>
        <p>Jika pertanyaan Anda belum terjawab, jangan ragu untuk menghubungi tim support kami.</p>
        <div class="help-buttons">
            <a href="{{ route('help.support') }}" class="help-btn">
                <i class="fas fa-headset"></i>
                Hubungi Support
            </a>
            <a href="{{ route('chatbot') }}" class="help-btn">
                <i class="fas fa-robot"></i>
                Tanya ChatBot
            </a>
            <a href="{{ route('company.contact') }}" class="help-btn">
                <i class="fas fa-envelope"></i>
                Kirim Email
            </a>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // FAQ Toggle
    const faqQuestions = document.querySelectorAll('.faq-question');
    faqQuestions.forEach(question => {
        question.addEventListener('click', function() {
            const answer = this.nextElementSibling;
            const isActive = this.classList.contains('active');
            
            // Close all other FAQs
            faqQuestions.forEach(q => {
                q.classList.remove('active');
                q.nextElementSibling.classList.remove('active');
            });
            
            // Toggle current FAQ
            if (!isActive) {
                this.classList.add('active');
                answer.classList.add('active');
            }
        });
    });

    // Category Filter
    const categoryBtns = document.querySelectorAll('.category-btn');
    const faqSections = document.querySelectorAll('.faq-section');
    
    categoryBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const category = this.dataset.category;
            
            // Update active category
            categoryBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            
            // Show/hide sections
            faqSections.forEach(section => {
                if (category === 'all' || section.dataset.category === category) {
                    section.style.display = 'block';
                } else {
                    section.style.display = 'none';
                }
            });
        });
    });

    // Search functionality
    const searchInput = document.getElementById('faqSearch');
    searchInput.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        const faqItems = document.querySelectorAll('.faq-item');
        
        faqItems.forEach(item => {
            const question = item.querySelector('.faq-question').textContent.toLowerCase();
            const answer = item.querySelector('.faq-answer').textContent.toLowerCase();
            
            if (question.includes(searchTerm) || answer.includes(searchTerm)) {
                item.style.display = 'block';
                item.parentElement.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
        
        // Hide empty sections
        faqSections.forEach(section => {
            const visibleItems = section.querySelectorAll('.faq-item[style*="block"]');
            if (visibleItems.length === 0 && searchTerm !== '') {
                section.style.display = 'none';
            }
        });
    });
});
</script>
@endsection