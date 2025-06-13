<section class="benefits-section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">🎯 Kenapa Harus Bergabung dengan Ayo Belajar?</h2>
            <p class="section-subtitle">Dapatkan keuntungan eksklusif yang akan mengubah cara belajarmu!</p>
        </div>

        <div class="benefits-grid">
            <!-- Benefit 1 -->
            <div class="benefit-card highlight">
                <div class="benefit-icon">
                    <div class="icon-wrapper free">
                        <i class="fas fa-gift"></i>
                    </div>
                </div>
                <h3 class="benefit-title">100% GRATIS</h3>
                <p class="benefit-description">
                    Semua fitur premium tanpa biaya sepeser pun! Download modul, chat dengan AI, dan akses semua materi pembelajaran.
                </p>
                <div class="benefit-features">
                    <span class="feature-tag">✨ Tanpa Iklan</span>
                    <span class="feature-tag">🔓 Akses Unlimited</span>
                    <span class="feature-tag">📚 Semua Modul</span>
                </div>
            </div>

            <!-- Benefit 2 -->
            <div class="benefit-card">
                <div class="benefit-icon">
                    <div class="icon-wrapper ai">
                        <i class="fas fa-robot"></i>
                    </div>
                </div>
                <h3 class="benefit-title">AI Tutor Pribadi</h3>
                <p class="benefit-description">
                    GATOT AI siap membantu 24/7! Tanya apa saja tentang pelajaran dan dapatkan jawaban yang mudah dipahami.
                </p>
                <div class="benefit-stats">
                    <div class="stat-item">
                        <span class="stat-number">24/7</span>
                        <span class="stat-label">Siap Membantu</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">∞</span>
                        <span class="stat-label">Pertanyaan</span>
                    </div>
                </div>
            </div>

            <!-- Benefit 3 -->
            <div class="benefit-card">
                <div class="benefit-icon">
                    <div class="icon-wrapper download">
                        <i class="fas fa-download"></i>
                    </div>
                </div>
                <h3 class="benefit-title">Download & Belajar Offline</h3>
                <p class="benefit-description">
                    Download semua materi dalam format PDF berkualitas tinggi. Belajar kapan saja, di mana saja, tanpa internet!
                </p>
                <div class="benefit-features">
                    <span class="feature-tag">📱 Mobile Friendly</span>
                    <span class="feature-tag">🔄 Sync Otomatis</span>
                </div>
            </div>

            <!-- Benefit 4 -->
            <div class="benefit-card">
                <div class="benefit-icon">
                    <div class="icon-wrapper translate">
                        <i class="fas fa-language"></i>
                    </div>
                </div>
                <h3 class="benefit-title">Bahasa Daerah</h3>
                <p class="benefit-description">
                    Terjemahkan materi ke bahasa daerahmu! Belajar jadi lebih mudah dengan bahasa yang familiar.
                </p>
                <div class="benefit-features">
                    <span class="feature-tag">🌍 Multi Bahasa</span>
                    <span class="feature-tag">🎯 Akurat</span>
                </div>
            </div>
        </div>

        <!-- Special Offer -->
        <div class="special-offer">
            <div class="offer-content">
                <div class="offer-badge">🎉 PENAWARAN TERBATAS</div>
                <h3>Daftar Sekarang & Dapatkan Bonus Eksklusif!</h3>
                <div class="bonus-list">
                    <div class="bonus-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Akses prioritas ke fitur terbaru</span>
                    </div>
                    <div class="bonus-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Modul pembelajaran eksklusif</span>
                    </div>
                    <div class="bonus-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Sertifikat digital gratis</span>
                    </div>
                </div>
                <div class="offer-timer">
                    <span class="timer-text">Bergabung dengan <strong>10,000+</strong> siswa lainnya!</span>
                </div>
                <a href="{{ route('register') }}" class="offer-button">
                    <span>Daftar Gratis Sekarang</span>
                    <i class="fas fa-rocket"></i>
                </a>
            </div>
            <div class="offer-visual">
                <div class="floating-icons">
                    <div class="float-icon" style="--delay: 0s;">📚</div>
                    <div class="float-icon" style="--delay: 1s;">🎓</div>
                    <div class="float-icon" style="--delay: 2s;">⭐</div>
                    <div class="float-icon" style="--delay: 3s;">🚀</div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .benefits-section {
        padding: 5rem 0;
        background: linear-gradient(135deg, var(--page-bg) 0%, #E8E6F1 100%);
        position: relative;
        overflow: hidden;
    }

    .benefits-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: 
            radial-gradient(circle at 20% 80%, rgba(120, 87, 193, 0.08) 0%, transparent 50%),
            radial-gradient(circle at 80% 20%, rgba(160, 148, 224, 0.08) 0%, transparent 50%);
        pointer-events: none;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 2rem;
        position: relative;
        z-index: 2;
    }

    .section-header {
        text-align: center;
        margin-bottom: 4rem;
    }

    .section-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: var(--text-main);
        margin-bottom: 1rem;
    }

    .section-subtitle {
        font-size: 1.2rem;
        color: var(--text-light);
        max-width: 600px;
        margin: 0 auto;
    }

    .benefits-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 2rem;
        margin-bottom: 4rem;
    }

    .benefit-card {
        background: var(--card-bg);
        backdrop-filter: blur(10px);
        border-radius: var(--radius-xl);
        padding: 2rem;
        text-align: center;
        transition: all 0.3s ease;
        border: 1px solid var(--border-soft);
        position: relative;
        overflow: hidden;
        box-shadow: var(--shadow-soft);
    }

    .benefit-card.highlight {
        background: linear-gradient(135deg, var(--accent-main) 0%, var(--accent-main-light) 100%);
        color: white;
        transform: scale(1.05);
        box-shadow: 0 20px 40px rgba(120, 87, 193, 0.25);
        border-color: var(--accent-main);
    }

    .benefit-card.highlight::before {
        content: '🔥 PALING POPULER';
        position: absolute;
        top: -10px;
        left: 50%;
        transform: translateX(-50%);
        background: var(--warning-soft);
        color: var(--text-main);
        padding: 0.5rem 1rem;
        border-radius: var(--radius-pill);
        font-size: 0.8rem;
        font-weight: 700;
        letter-spacing: 0.5px;
        border: 2px solid var(--card-bg);
    }

    .benefit-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(120, 87, 193, 0.15);
    }

    .benefit-card.highlight:hover {
        transform: scale(1.05) translateY(-8px);
    }

    .benefit-icon {
        margin-bottom: 1.5rem;
    }

    .icon-wrapper {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto;
        font-size: 2rem;
        color: white;
        position: relative;
    }

    .icon-wrapper.free {
        background: linear-gradient(135deg, var(--accent-main) 0%, var(--accent-main-light) 100%);
    }

    .icon-wrapper.ai {
        background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
    }

    .icon-wrapper.download {
        background: linear-gradient(135deg, var(--accent-main-light) 0%, var(--accent-main) 100%);
    }

    .icon-wrapper.translate {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    }

    .benefit-title {
        font-size: 1.4rem;
        font-weight: 700;
        margin-bottom: 1rem;
        color: var(--text-main);
    }

    .benefit-card.highlight .benefit-title {
        color: white;
    }

    .benefit-description {
        color: var(--text-body);
        line-height: 1.6;
        margin-bottom: 1.5rem;
    }

    .benefit-card.highlight .benefit-description {
        color: rgba(255, 255, 255, 0.9);
    }

    .benefit-features {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
        justify-content: center;
    }

    .feature-tag {
        background: var(--accent-primary-soft);
        color: var(--accent-main);
        padding: 0.25rem 0.75rem;
        border-radius: var(--radius-pill);
        font-size: 0.8rem;
        font-weight: 600;
    }

    .benefit-card.highlight .feature-tag {
        background: rgba(255, 255, 255, 0.2);
        color: white;
    }

    .benefit-stats {
        display: flex;
        justify-content: space-around;
        margin-top: 1rem;
    }

    .stat-item {
        text-align: center;
    }

    .stat-number {
        display: block;
        font-size: 1.5rem;
        font-weight: 800;
        color: var(--accent-main);
    }

    .stat-label {
        font-size: 0.8rem;
        color: var(--text-light);
    }

    .special-offer {
        background: linear-gradient(135deg, var(--text-main) 0%, #2D2A4A 100%);
        border-radius: var(--radius-xl);
        padding: 3rem;
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 2rem;
        align-items: center;
        position: relative;
        overflow: hidden;
        color: white;
    }

    .special-offer::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: 
            radial-gradient(circle at 70% 30%, rgba(120, 87, 193, 0.3) 0%, transparent 50%),
            radial-gradient(circle at 30% 70%, rgba(160, 148, 224, 0.3) 0%, transparent 50%);
        pointer-events: none;
    }

    .offer-content {
        position: relative;
        z-index: 2;
    }

    .offer-badge {
        display: inline-block;
        background: var(--warning-soft);
        color: var(--text-main);
        padding: 0.5rem 1rem;
        border-radius: var(--radius-pill);
        font-size: 0.9rem;
        font-weight: 700;
        margin-bottom: 1rem;
        animation: pulse 2s infinite;
    }

    @keyframes pulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.05); }
    }

    .offer-content h3 {
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 1.5rem;
        line-height: 1.2;
    }

    .bonus-list {
        margin-bottom: 1.5rem;
    }

    .bonus-item {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        margin-bottom: 0.75rem;
        font-size: 1rem;
    }

    .bonus-item i {
        color: var(--success-soft);
        font-size: 1.1rem;
    }

    .offer-timer {
        margin-bottom: 2rem;
        padding: 1rem;
        background: rgba(255, 255, 255, 0.1);
        border-radius: var(--radius-md);
        text-align: center;
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .timer-text {
        font-size: 1.1rem;
    }

    .offer-button {
        display: inline-flex;
        align-items: center;
        gap: 0.75rem;
        padding: 1.25rem 2.5rem;
        background: linear-gradient(135deg, var(--accent-main) 0%, var(--accent-main-light) 100%);
        color: white;
        text-decoration: none;
        border-radius: var(--radius-pill);
        font-weight: 700;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        box-shadow: 0 8px 25px rgba(120, 87, 193, 0.4);
    }

    .offer-button:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 35px rgba(120, 87, 193, 0.5);
    }

    .offer-visual {
        position: relative;
        height: 200px;
    }

    .floating-icons {
        position: relative;
        width: 100%;
        height: 100%;
    }

    .float-icon {
        position: absolute;
        font-size: 3rem;
        animation: floatUp 4s ease-in-out infinite;
        animation-delay: var(--delay);
        opacity: 0.7;
    }

    .float-icon:nth-child(1) { top: 20%; left: 20%; }
    .float-icon:nth-child(2) { top: 60%; left: 60%; }
    .float-icon:nth-child(3) { top: 10%; right: 20%; }
    .float-icon:nth-child(4) { bottom: 20%; left: 50%; }

    @keyframes floatUp {
        0%, 100% { transform: translateY(0px) rotate(0deg); }
        50% { transform: translateY(-20px) rotate(180deg); }
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .benefits-section {
            padding: 3rem 0;
        }

        .container {
            padding: 0 1rem;
        }

        .section-title {
            font-size: 2rem;
        }

        .benefits-grid {
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }

        .benefit-card.highlight {
            transform: none;
        }

        .special-offer {
            grid-template-columns: 1fr;
            padding: 2rem;
            text-align: center;
        }

        .offer-content h3 {
            font-size: 1.5rem;
        }

        .offer-visual {
            height: 150px;
        }

        .float-icon {
            font-size: 2rem;
        }
    }
</style>