<section class="how-it-works">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Cara Menggunakan Platform</h2>
            <p class="section-subtitle">Mulai belajar dengan mudah dalam 4 langkah sederhana</p>
        </div>
        
        <div class="steps-container">
            <!-- Step 1 -->
            <div class="step-card">
                <div class="step-header">
                    <div class="step-number">1</div>
                    <div class="step-icon">📚</div>
                </div>
                <div class="step-content">
                    <h3 class="step-title">Jelajahi Modul</h3>
                    <p class="step-description">
                        Pilih modul pembelajaran sesuai tingkat pendidikan Anda. 
                        Tersedia materi untuk SD, SMP, dan SMA.
                    </p>
                    <ul class="step-features">
                        <li>Materi lengkap semua tingkat</li>
                        <li>Mudah dicari dan diakses</li>
                        <li>Kualitas terjamin</li>
                    </ul>
                    <a href="{{ route('modul') }}" class="step-button">
                        Lihat Modul
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- Step 2 -->
            <div class="step-card">
                <div class="step-header">
                    <div class="step-number">2</div>
                    <div class="step-icon">📥</div>
                </div>
                <div class="step-content">
                    <h3 class="step-title">Download Materi</h3>
                    <p class="step-description">
                        Unduh file PDF materi pembelajaran untuk belajar offline. 
                        Gratis dan bisa diakses kapan saja.
                    </p>
                    <ul class="step-features">
                        <li>Download gratis</li>
                        <li>Format PDF berkualitas</li>
                        <li>Bisa dibaca offline</li>
                    </ul>
                    <a href="{{ route('modul') }}" class="step-button">
                        Mulai Download
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- Step 3 -->
            <div class="step-card">
                <div class="step-header">
                    <div class="step-number">3</div>
                    <div class="step-icon">💬</div>
                </div>
                <div class="step-content">
                    <h3 class="step-title">Tanya GATOT AI</h3>
                    <p class="step-description">
                        Butuh bantuan memahami materi? Tanyakan langsung ke 
                        GATOT AI yang siap membantu 24 jam.
                    </p>
                    <ul class="step-features">
                        <li>Bantuan 24/7</li>
                        <li>Jawaban mudah dipahami</li>
                        <li>Gratis tanpa batas</li>
                    </ul>
                    <a href="{{ route('chatbot') }}" class="step-button">
                        Chat Sekarang
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- Step 4 -->
            <div class="step-card">
                <div class="step-header">
                    <div class="step-number">4</div>
                    <div class="step-icon">🌏</div>
                </div>
                <div class="step-content">
                    <h3 class="step-title">Terjemahkan</h3>
                    <p class="step-description">
                        Terjemahkan materi ke bahasa daerah agar lebih mudah 
                        dipahami sesuai budaya lokal.
                    </p>
                    <ul class="step-features">
                        <li>Bahasa daerah Indonesia</li>
                        <li>Terjemahan akurat</li>
                        <li>Mudah digunakan</li>
                    </ul>
                    <a href="{{ route('translator') }}" class="step-button">
                        Coba Penerjemah
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Bottom CTA -->
        <div class="section-cta">
            <h3>Siap untuk memulai?</h3>
            <p>Bergabunglah dengan ribuan siswa yang sudah merasakan manfaatnya</p>
            <div class="cta-buttons">
                <a href="{{ route('register') }}" class="cta-primary">
                    Daftar Gratis
                </a>
                <a href="{{ route('modul') }}" class="cta-secondary">
                    Lihat Modul
                </a>
            </div>
        </div>
    </div>
</section>

<style>
    .how-it-works {
        padding: 5rem 0;
        background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
        position: relative;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 2rem;
    }

    .section-header {
        text-align: center;
        margin-bottom: 4rem;
    }

    .section-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 1rem;
    }

    .section-subtitle {
        font-size: 1.2rem;
        color: #64748b;
        font-weight: 500;
        max-width: 600px;
        margin: 0 auto;
    }

    .steps-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 2rem;
        margin-bottom: 4rem;
    }

    .step-card {
        background: white;
        border-radius: 16px;
        padding: 2rem;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        border: 1px solid #e2e8f0;
        transition: all 0.3s ease;
        position: relative;
    }

    .step-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 24px rgba(0, 0, 0, 0.1);
        border-color: #7c3aed;
    }

    .step-header {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 1.5rem;
    }

    .step-number {
        width: 40px;
        height: 40px;
        background: linear-gradient(135deg, #7c3aed, #a855f7);
        color: white;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 1.1rem;
        flex-shrink: 0;
    }

    .step-icon {
        font-size: 2rem;
        opacity: 0.8;
    }

    .step-content {
        flex: 1;
    }

    .step-title {
        font-size: 1.4rem;
        font-weight: 600;
        color: #1e293b;
        margin-bottom: 0.75rem;
    }

    .step-description {
        color: #64748b;
        line-height: 1.6;
        margin-bottom: 1.5rem;
        font-size: 0.95rem;
    }

    .step-features {
        list-style: none;
        padding: 0;
        margin: 0 0 1.5rem 0;
    }

    .step-features li {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin-bottom: 0.5rem;
        font-size: 0.9rem;
        color: #475569;
    }

    .step-features li::before {
        content: '✓';
        width: 16px;
        height: 16px;
        background: #10b981;
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.7rem;
        font-weight: bold;
        flex-shrink: 0;
    }

    .step-button {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.75rem 1.5rem;
        background: #7c3aed;
        color: white;
        text-decoration: none;
        border-radius: 8px;
        font-weight: 500;
        font-size: 0.9rem;
        transition: all 0.3s ease;
    }

    .step-button:hover {
        background: #6d28d9;
        transform: translateX(2px);
    }

    .step-button i {
        font-size: 0.8rem;
        transition: transform 0.3s ease;
    }

    .step-button:hover i {
        transform: translateX(2px);
    }

    .section-cta {
        text-align: center;
        padding: 3rem 2rem;
        background: white;
        border-radius: 20px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        border: 1px solid #e2e8f0;
    }

    .section-cta h3 {
        font-size: 1.8rem;
        font-weight: 600;
        color: #1e293b;
        margin-bottom: 0.5rem;
    }

    .section-cta p {
        color: #64748b;
        font-size: 1rem;
        margin-bottom: 2rem;
    }

    .cta-buttons {
        display: flex;
        gap: 1rem;
        justify-content: center;
        flex-wrap: wrap;
    }

    .cta-primary {
        display: inline-flex;
        align-items: center;
        padding: 1rem 2rem;
        background: linear-gradient(135deg, #7c3aed, #a855f7);
        color: white;
        text-decoration: none;
        border-radius: 12px;
        font-weight: 600;
        font-size: 1rem;
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(124, 58, 237, 0.3);
    }

    .cta-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(124, 58, 237, 0.4);
    }

    .cta-secondary {
        display: inline-flex;
        align-items: center;
        padding: 1rem 2rem;
        background: transparent;
        color: #7c3aed;
        text-decoration: none;
        border-radius: 12px;
        font-weight: 600;
        font-size: 1rem;
        border: 2px solid #7c3aed;
        transition: all 0.3s ease;
    }

    .cta-secondary:hover {
        background: #7c3aed;
        color: white;
        transform: translateY(-2px);
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .how-it-works {
            padding: 3rem 0;
        }

        .container {
            padding: 0 1rem;
        }

        .section-title {
            font-size: 2rem;
        }

        .section-subtitle {
            font-size: 1.1rem;
        }

        .steps-container {
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }

        .step-card {
            padding: 1.5rem;
        }

        .step-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 0.75rem;
        }

        .section-cta {
            padding: 2rem 1rem;
        }

        .section-cta h3 {
            font-size: 1.5rem;
        }

        .cta-buttons {
            flex-direction: column;
            align-items: center;
        }

        .cta-primary,
        .cta-secondary {
            width: 100%;
            max-width: 280px;
            justify-content: center;
        }
    }

    @media (max-width: 480px) {
        .section-title {
            font-size: 1.8rem;
        }

        .step-card {
            padding: 1.25rem;
        }

        .step-title {
            font-size: 1.2rem;
        }

        .step-description {
            font-size: 0.9rem;
        }
    }
</style>