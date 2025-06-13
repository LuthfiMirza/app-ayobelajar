@extends('layouts.app')

@section('content')
<style>
    .contact-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 2rem 1rem;
    }

    .contact-header {
        text-align: center;
        margin-bottom: 4rem;
        padding: 4rem 0;
        background: linear-gradient(135deg, var(--accent-main) 0%, var(--accent-main-light) 100%);
        border-radius: var(--radius-xl);
        color: white;
        position: relative;
        overflow: hidden;
    }

    .contact-header::before {
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

    .contact-header h1 {
        font-size: 3rem;
        font-weight: 800;
        margin-bottom: 1rem;
        position: relative;
        z-index: 2;
    }

    .contact-header p {
        font-size: 1.25rem;
        opacity: 0.9;
        position: relative;
        z-index: 2;
    }

    .contact-content {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 4rem;
        margin-bottom: 4rem;
    }

    .contact-info {
        background: var(--card-bg);
        border-radius: var(--radius-lg);
        padding: 2rem;
        box-shadow: var(--shadow-soft);
        border: 1px solid var(--border-soft);
    }

    .contact-info h2 {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--text-main);
        margin-bottom: 1.5rem;
    }

    .contact-item {
        display: flex;
        align-items: flex-start;
        gap: 1rem;
        margin-bottom: 2rem;
        padding: 1rem;
        border-radius: var(--radius-md);
        transition: all 0.3s ease;
    }

    .contact-item:hover {
        background: rgba(120, 87, 193, 0.05);
    }

    .contact-icon {
        width: 3rem;
        height: 3rem;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--accent-main), var(--accent-main-light));
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.25rem;
        flex-shrink: 0;
    }

    .contact-details h3 {
        font-size: 1.125rem;
        font-weight: 700;
        color: var(--text-main);
        margin-bottom: 0.5rem;
    }

    .contact-details p {
        color: var(--text-body);
        line-height: 1.6;
        margin: 0;
    }

    .contact-details a {
        color: var(--accent-main);
        text-decoration: none;
        font-weight: 600;
    }

    .contact-details a:hover {
        text-decoration: underline;
    }

    .contact-form {
        background: var(--card-bg);
        border-radius: var(--radius-lg);
        padding: 2rem;
        box-shadow: var(--shadow-soft);
        border: 1px solid var(--border-soft);
    }

    .contact-form h2 {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--text-main);
        margin-bottom: 1.5rem;
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

    .office-info {
        background: var(--card-bg);
        border-radius: var(--radius-lg);
        padding: 2rem;
        box-shadow: var(--shadow-soft);
        border: 1px solid var(--border-soft);
        text-align: center;
        margin-bottom: 3rem;
    }

    .office-info h2 {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--text-main);
        margin-bottom: 1rem;
    }

    .office-info p {
        color: var(--text-body);
        line-height: 1.6;
        margin-bottom: 1.5rem;
    }

    .office-hours {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1rem;
        margin-top: 2rem;
    }

    .hours-item {
        background: rgba(120, 87, 193, 0.1);
        border-radius: var(--radius-md);
        padding: 1rem;
        border-left: 4px solid var(--accent-main);
    }

    .hours-item h4 {
        font-weight: 700;
        color: var(--text-main);
        margin-bottom: 0.5rem;
    }

    .hours-item p {
        color: var(--text-body);
        margin: 0;
        font-size: 0.875rem;
    }

    .social-section {
        background: linear-gradient(135deg, var(--accent-main) 0%, var(--accent-main-light) 100%);
        border-radius: var(--radius-lg);
        padding: 2rem;
        color: white;
        text-align: center;
    }

    .social-section h2 {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 1rem;
    }

    .social-section p {
        opacity: 0.9;
        margin-bottom: 2rem;
    }

    .social-links {
        display: flex;
        justify-content: center;
        gap: 1rem;
        flex-wrap: wrap;
    }

    .social-link {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        background: rgba(255, 255, 255, 0.2);
        padding: 0.75rem 1.5rem;
        border-radius: var(--radius-pill);
        color: white;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .social-link:hover {
        background: rgba(255, 255, 255, 0.3);
        transform: translateY(-2px);
    }

    @media (max-width: 768px) {
        .contact-container {
            padding: 1rem;
        }

        .contact-header {
            padding: 2rem 1rem;
        }

        .contact-header h1 {
            font-size: 2rem;
        }

        .contact-header p {
            font-size: 1rem;
        }

        .contact-content {
            grid-template-columns: 1fr;
            gap: 2rem;
        }

        .social-links {
            flex-direction: column;
            align-items: center;
        }

        .social-link {
            width: 100%;
            max-width: 300px;
            justify-content: center;
        }
    }
</style>

<div class="contact-container">
    <!-- Header -->
    <div class="contact-header">
        <h1>Kontak Kami</h1>
        <p>Hubungi kami untuk pertanyaan, saran, atau kerjasama</p>
    </div>

    <!-- Contact Content -->
    <div class="contact-content">
        <!-- Contact Information -->
        <div class="contact-info">
            <h2>Informasi Kontak</h2>
            
            <div class="contact-item">
                <div class="contact-icon">
                    <i class="fas fa-envelope"></i>
                </div>
                <div class="contact-details">
                    <h3>Email</h3>
                    <p>
                        <a href="mailto:info@ayobelajar.id">info@ayobelajar.id</a><br>
                        <a href="mailto:support@ayobelajar.id">support@ayobelajar.id</a>
                    </p>
                </div>
            </div>

            <div class="contact-item">
                <div class="contact-icon">
                    <i class="fas fa-phone"></i>
                </div>
                <div class="contact-details">
                    <h3>Telepon</h3>
                    <p>
                        <a href="tel:+6281234567890">+62 812-3456-7890</a><br>
                        <small>Senin - Jumat, 09:00 - 17:00 WIB</small>
                    </p>
                </div>
            </div>

            <div class="contact-item">
                <div class="contact-icon">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <div class="contact-details">
                    <h3>Alamat</h3>
                    <p>
                        Universitas Gunadarma<br>
                        Jl. Margonda Raya No. 100<br>
                        Depok, Jawa Barat 16424<br>
                        Indonesia
                    </p>
                </div>
            </div>

            <div class="contact-item">
                <div class="contact-icon">
                    <i class="fas fa-comments"></i>
                </div>
                <div class="contact-details">
                    <h3>Live Chat</h3>
                    <p>
                        Gunakan fitur ChatBot di platform kami<br>
                        untuk bantuan langsung 24/7
                    </p>
                </div>
            </div>
        </div>

        <!-- Contact Form -->
        <div class="contact-form">
            <h2>Kirim Pesan</h2>
            <form action="#" method="POST">
                <div class="form-group">
                    <label for="name">Nama Lengkap</label>
                    <input type="text" id="name" name="name" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="subject">Subjek</label>
                    <select id="subject" name="subject" required>
                        <option value="">Pilih subjek</option>
                        <option value="general">Pertanyaan Umum</option>
                        <option value="support">Bantuan Teknis</option>
                        <option value="partnership">Kerjasama</option>
                        <option value="feedback">Saran & Masukan</option>
                        <option value="career">Karir</option>
                        <option value="other">Lainnya</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="message">Pesan</label>
                    <textarea id="message" name="message" placeholder="Tuliskan pesan Anda di sini..." required></textarea>
                </div>

                <button type="submit" class="submit-btn">
                    <i class="fas fa-paper-plane"></i> Kirim Pesan
                </button>
            </form>
        </div>
    </div>

    <!-- Office Information -->
    <div class="office-info">
        <h2>Jam Operasional</h2>
        <p>
            Tim kami siap membantu Anda dalam jam kerja berikut. Untuk bantuan di luar jam kerja, 
            silakan gunakan fitur ChatBot atau kirim email yang akan kami respon sesegera mungkin.
        </p>
        
        <div class="office-hours">
            <div class="hours-item">
                <h4>Senin - Jumat</h4>
                <p>09:00 - 17:00 WIB</p>
            </div>
            <div class="hours-item">
                <h4>Sabtu</h4>
                <p>09:00 - 15:00 WIB</p>
            </div>
            <div class="hours-item">
                <h4>Minggu</h4>
                <p>Tutup</p>
            </div>
            <div class="hours-item">
                <h4>ChatBot</h4>
                <p>24/7 Tersedia</p>
            </div>
        </div>
    </div>

    <!-- Social Media -->
    <div class="social-section">
        <h2>Ikuti Kami</h2>
        <p>
            Tetap terhubung dengan kami melalui media sosial untuk mendapatkan update terbaru, 
            tips belajar, dan informasi menarik lainnya.
        </p>
        
        <div class="social-links">
            <a href="#" class="social-link">
                <i class="fab fa-facebook"></i>
                Facebook
            </a>
            <a href="#" class="social-link">
                <i class="fab fa-instagram"></i>
                Instagram
            </a>
            <a href="#" class="social-link">
                <i class="fab fa-twitter"></i>
                Twitter
            </a>
            <a href="#" class="social-link">
                <i class="fab fa-youtube"></i>
                YouTube
            </a>
            <a href="#" class="social-link">
                <i class="fab fa-linkedin"></i>
                LinkedIn
            </a>
            <a href="#" class="social-link">
                <i class="fab fa-tiktok"></i>
                TikTok
            </a>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('.contact-form form');
    
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Get form data
        const formData = new FormData(form);
        const name = formData.get('name');
        const email = formData.get('email');
        const subject = formData.get('subject');
        const message = formData.get('message');
        
        // Simple validation
        if (!name || !email || !subject || !message) {
            alert('Mohon lengkapi semua field yang diperlukan.');
            return;
        }
        
        // Simulate form submission
        const submitBtn = form.querySelector('.submit-btn');
        const originalText = submitBtn.innerHTML;
        
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Mengirim...';
        submitBtn.disabled = true;
        
        setTimeout(() => {
            alert('Terima kasih! Pesan Anda telah terkirim. Kami akan merespon sesegera mungkin.');
            form.reset();
            submitBtn.innerHTML = originalText;
            submitBtn.disabled = false;
        }, 2000);
    });
});
</script>
@endsection