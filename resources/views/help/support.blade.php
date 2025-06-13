@extends('layouts.app')

@section('content')
<style>
    .support-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 2rem 1rem;
    }

    .support-header {
        text-align: center;
        margin-bottom: 4rem;
        padding: 4rem 0;
        background: linear-gradient(135deg, var(--accent-main) 0%, var(--accent-main-light) 100%);
        border-radius: var(--radius-xl);
        color: white;
        position: relative;
        overflow: hidden;
    }

    .support-header::before {
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

    .support-header h1 {
        font-size: 3rem;
        font-weight: 800;
        margin-bottom: 1rem;
        position: relative;
        z-index: 2;
    }

    .support-header p {
        font-size: 1.25rem;
        opacity: 0.9;
        position: relative;
        z-index: 2;
    }

    .support-options {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
        margin-bottom: 4rem;
    }

    .support-card {
        background: var(--card-bg);
        border-radius: var(--radius-lg);
        padding: 2rem;
        box-shadow: var(--shadow-soft);
        border: 1px solid var(--border-soft);
        text-align: center;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .support-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 32px rgba(120, 87, 193, 0.15);
    }

    .support-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 4px;
        background: linear-gradient(90deg, var(--accent-main), var(--accent-main-light));
    }

    .support-icon {
        width: 4rem;
        height: 4rem;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--accent-main), var(--accent-main-light));
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
        font-size: 1.5rem;
        color: white;
    }

    .support-card h3 {
        font-size: 1.25rem;
        font-weight: 700;
        color: var(--text-main);
        margin-bottom: 1rem;
    }

    .support-card p {
        color: var(--text-body);
        line-height: 1.6;
        margin-bottom: 1.5rem;
    }

    .support-btn {
        background: var(--accent-primary-soft);
        color: var(--accent-main);
        padding: 0.75rem 1.5rem;
        border-radius: var(--radius-pill);
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }

    .support-btn:hover {
        background: var(--accent-main);
        color: white;
        transform: translateY(-2px);
    }

    .contact-form-section {
        background: var(--card-bg);
        border-radius: var(--radius-lg);
        padding: 2rem;
        box-shadow: var(--shadow-soft);
        border: 1px solid var(--border-soft);
        margin-bottom: 3rem;
    }

    .contact-form-section h2 {
        font-size: 1.75rem;
        font-weight: 700;
        color: var(--text-main);
        margin-bottom: 1rem;
        text-align: center;
    }

    .contact-form-section p {
        text-align: center;
        color: var(--text-body);
        margin-bottom: 2rem;
    }

    .form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 2rem;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-group.full-width {
        grid-column: 1 / -1;
    }

    .form-group label {
        display: block;
        font-weight: 600;
        color: var(--text-main);
        margin-bottom: 0.5rem;
    }

    .form-group input,
    .form-group textarea,
    .form-group select {
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
    .form-group textarea:focus,
    .form-group select:focus {
        outline: none;
        border-color: var(--accent-main);
        box-shadow: 0 0 0 3px rgba(120, 87, 193, 0.1);
    }

    .form-group textarea {
        resize: vertical;
        min-height: 120px;
    }

    .submit-btn {
        background: linear-gradient(135deg, var(--accent-main), var(--accent-main-light));
        color: white;
        border: none;
        padding: 0.75rem 2rem;
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

    .response-time {
        background: rgba(34, 197, 94, 0.1);
        border-radius: var(--radius-lg);
        padding: 1.5rem;
        border-left: 4px solid #22c55e;
        margin-bottom: 3rem;
    }

    .response-time h3 {
        color: #22c55e;
        font-size: 1.25rem;
        font-weight: 700;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .response-time ul {
        margin: 0;
        padding-left: 1.5rem;
        color: var(--text-body);
    }

    .response-time li {
        margin-bottom: 0.5rem;
    }

    .knowledge-base {
        background: var(--card-bg);
        border-radius: var(--radius-lg);
        padding: 2rem;
        box-shadow: var(--shadow-soft);
        border: 1px solid var(--border-soft);
        text-align: center;
    }

    .knowledge-base h3 {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--text-main);
        margin-bottom: 1rem;
    }

    .knowledge-base p {
        color: var(--text-body);
        margin-bottom: 2rem;
    }

    .kb-links {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1rem;
    }

    .kb-link {
        background: rgba(120, 87, 193, 0.05);
        border-radius: var(--radius-md);
        padding: 1rem;
        text-decoration: none;
        color: var(--text-main);
        transition: all 0.3s ease;
        border: 2px solid transparent;
    }

    .kb-link:hover {
        background: var(--accent-primary-soft);
        border-color: var(--accent-main);
        transform: translateY(-2px);
    }

    .kb-link i {
        font-size: 1.5rem;
        color: var(--accent-main);
        margin-bottom: 0.5rem;
        display: block;
    }

    .kb-link h4 {
        font-weight: 600;
        margin: 0;
    }

    @media (max-width: 768px) {
        .support-container {
            padding: 1rem;
        }

        .support-header {
            padding: 2rem 1rem;
        }

        .support-header h1 {
            font-size: 2rem;
        }

        .support-header p {
            font-size: 1rem;
        }

        .support-options {
            grid-template-columns: 1fr;
        }

        .form-grid {
            grid-template-columns: 1fr;
        }

        .kb-links {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="support-container">
    <!-- Header -->
    <div class="support-header">
        <h1>Pusat Dukungan</h1>
        <p>Kami siap membantu Anda dengan berbagai cara</p>
    </div>

    <!-- Response Time Info -->
    <div class="response-time">
        <h3><i class="fas fa-clock"></i> Waktu Respon Support</h3>
        <ul>
            <li><strong>ChatBot:</strong> Respon instan 24/7</li>
            <li><strong>Email:</strong> Maksimal 24 jam pada hari kerja</li>
            <li><strong>Telepon:</strong> Senin-Jumat 09:00-17:00 WIB</li>
            <li><strong>Live Chat:</strong> Senin-Sabtu 08:00-20:00 WIB</li>
        </ul>
    </div>

    <!-- Support Options -->
    <div class="support-options">
        <div class="support-card">
            <div class="support-icon">
                <i class="fas fa-robot"></i>
            </div>
            <h3>ChatBot Pintar</h3>
            <p>Dapatkan bantuan instan 24/7 dari AI assistant kami. Cocok untuk pertanyaan umum dan panduan penggunaan.</p>
            <a href="{{ route('chatbot') }}" class="support-btn">
                <i class="fas fa-comments"></i>
                Mulai Chat
            </a>
        </div>

        <div class="support-card">
            <div class="support-icon">
                <i class="fas fa-envelope"></i>
            </div>
            <h3>Email Support</h3>
            <p>Kirim pertanyaan detail melalui email. Tim kami akan merespon dalam 24 jam pada hari kerja.</p>
            <a href="mailto:support@ayobelajar.id" class="support-btn">
                <i class="fas fa-paper-plane"></i>
                Kirim Email
            </a>
        </div>

        <div class="support-card">
            <div class="support-icon">
                <i class="fas fa-phone"></i>
            </div>
            <h3>Telepon</h3>
            <p>Hubungi langsung tim support kami untuk bantuan real-time dan penyelesaian masalah mendesak.</p>
            <a href="tel:+6281234567890" class="support-btn">
                <i class="fas fa-phone-alt"></i>
                +62 812-3456-7890
            </a>
        </div>

        <div class="support-card">
            <div class="support-icon">
                <i class="fas fa-question-circle"></i>
            </div>
            <h3>FAQ</h3>
            <p>Cari jawaban cepat untuk pertanyaan yang sering diajukan. Mungkin jawaban Anda sudah tersedia di sini.</p>
            <a href="{{ route('help.faq') }}" class="support-btn">
                <i class="fas fa-search"></i>
                Lihat FAQ
            </a>
        </div>

        <div class="support-card">
            <div class="support-icon">
                <i class="fas fa-book"></i>
            </div>
            <h3>Panduan Lengkap</h3>
            <p>Pelajari cara menggunakan semua fitur Ayo Belajar dengan panduan step-by-step yang mudah diikuti.</p>
            <a href="{{ route('panduan') }}" class="support-btn">
                <i class="fas fa-graduation-cap"></i>
                Baca Panduan
            </a>
        </div>

        <div class="support-card">
            <div class="support-icon">
                <i class="fas fa-bug"></i>
            </div>
            <h3>Laporkan Bug</h3>
            <p>Temukan bug atau masalah teknis? Laporkan kepada kami agar dapat segera diperbaiki.</p>
            <a href="#contact-form" class="support-btn">
                <i class="fas fa-exclamation-triangle"></i>
                Laporkan
            </a>
        </div>
    </div>

    <!-- Contact Form -->
    <div id="contact-form" class="contact-form-section">
        <h2>Formulir Dukungan</h2>
        <p>Isi formulir di bawah ini untuk mendapatkan bantuan yang lebih spesifik dari tim support kami.</p>
        
        <form action="#" method="POST">
            <div class="form-grid">
                <div class="form-group">
                    <label for="name">Nama Lengkap</label>
                    <input type="text" id="name" name="name" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="phone">Nomor Telepon</label>
                    <input type="tel" id="phone" name="phone">
                </div>

                <div class="form-group">
                    <label for="category">Kategori Masalah</label>
                    <select id="category" name="category" required>
                        <option value="">Pilih kategori</option>
                        <option value="account">Masalah Akun</option>
                        <option value="modules">Modul Digital</option>
                        <option value="chatbot">ChatBot</option>
                        <option value="translator">Penerjemah</option>
                        <option value="technical">Masalah Teknis</option>
                        <option value="bug">Laporan Bug</option>
                        <option value="feature">Permintaan Fitur</option>
                        <option value="other">Lainnya</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="priority">Tingkat Prioritas</label>
                    <select id="priority" name="priority" required>
                        <option value="">Pilih prioritas</option>
                        <option value="low">Rendah</option>
                        <option value="medium">Sedang</option>
                        <option value="high">Tinggi</option>
                        <option value="urgent">Mendesak</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="device">Perangkat yang Digunakan</label>
                    <select id="device" name="device">
                        <option value="">Pilih perangkat</option>
                        <option value="desktop">Desktop/Laptop</option>
                        <option value="mobile">Smartphone</option>
                        <option value="tablet">Tablet</option>
                    </select>
                </div>

                <div class="form-group full-width">
                    <label for="subject">Subjek</label>
                    <input type="text" id="subject" name="subject" placeholder="Ringkasan singkat masalah Anda" required>
                </div>

                <div class="form-group full-width">
                    <label for="message">Deskripsi Masalah</label>
                    <textarea id="message" name="message" placeholder="Jelaskan masalah Anda secara detail. Sertakan langkah-langkah yang sudah dicoba dan pesan error jika ada." required></textarea>
                </div>

                <div class="form-group full-width">
                    <button type="submit" class="submit-btn">
                        <i class="fas fa-paper-plane"></i> Kirim Permintaan Support
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- Knowledge Base -->
    <div class="knowledge-base">
        <h3>Sumber Daya Bantuan</h3>
        <p>Jelajahi berbagai sumber daya yang tersedia untuk membantu Anda menggunakan platform dengan maksimal.</p>
        
        <div class="kb-links">
            <a href="{{ route('panduan') }}" class="kb-link">
                <i class="fas fa-book-open"></i>
                <h4>Panduan Penggunaan</h4>
            </a>
            <a href="{{ route('help.faq') }}" class="kb-link">
                <i class="fas fa-question-circle"></i>
                <h4>FAQ</h4>
            </a>
            <a href="{{ route('chatbot') }}" class="kb-link">
                <i class="fas fa-robot"></i>
                <h4>ChatBot Helper</h4>
            </a>
            <a href="{{ route('company.contact') }}" class="kb-link">
                <i class="fas fa-envelope"></i>
                <h4>Kontak Kami</h4>
            </a>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('.contact-form-section form');
    
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Get form data
        const formData = new FormData(form);
        const name = formData.get('name');
        const email = formData.get('email');
        const category = formData.get('category');
        const priority = formData.get('priority');
        const subject = formData.get('subject');
        const message = formData.get('message');
        
        // Simple validation
        if (!name || !email || !category || !priority || !subject || !message) {
            alert('Mohon lengkapi semua field yang diperlukan.');
            return;
        }
        
        // Simulate form submission
        const submitBtn = form.querySelector('.submit-btn');
        const originalText = submitBtn.innerHTML;
        
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Mengirim...';
        submitBtn.disabled = true;
        
        setTimeout(() => {
            alert('Terima kasih! Permintaan support Anda telah dikirim. Tim kami akan segera menghubungi Anda.');
            form.reset();
            submitBtn.innerHTML = originalText;
            submitBtn.disabled = false;
        }, 2000);
    });

    // Smooth scroll to contact form
    const reportBugBtn = document.querySelector('a[href="#contact-form"]');
    if (reportBugBtn) {
        reportBugBtn.addEventListener('click', function(e) {
            e.preventDefault();
            document.getElementById('contact-form').scrollIntoView({
                behavior: 'smooth'
            });
        });
    }
});
</script>
@endsection