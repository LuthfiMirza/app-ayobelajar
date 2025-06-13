<section class="features">
    <div class="section-header">
        <h2>Fitur Unggulan</h2>
        <p>Solusi pembelajaran digital yang dirancang khusus untuk daerah 3T</p>
    </div>
    
    <div class="features-grid">
        <div class="feature-card">
            <div class="feature-icon">
                <i class="fas fa-book-reader"></i>
            </div>
            <h3>Modul Digital</h3>
            <p>Akses modul pembelajaran yang dapat digunakan secara offline, dirancang sesuai kurikulum nasional.</p>
        </div>
        
        <div class="feature-card">
            <div class="feature-icon">
                <i class="fas fa-robot"></i>
            </div>
            <h3>ChatBot Pintar</h3>
            <p>Asisten belajar AI yang membantu siswa memahami materi dan menjawab pertanyaan 24/7.</p>
        </div>
        
        <div class="feature-card">
            <div class="feature-icon">
                <i class="fas fa-language"></i>
            </div>
            <h3>Penerjemah Bahasa</h3>
            <p>Terjemahkan konten pembelajaran ke dalam bahasa daerah untuk pemahaman yang lebih baik.</p>
        </div>
    </div>
</section>

<style>
.features {
    padding: 6rem 0;
}

.section-header {
    text-align: center;
    margin-bottom: 4rem;
}

.section-header h2 {
    font-size: 2.5rem;
    font-weight: 800;
    color: var(--text-main);
    margin-bottom: 1rem;
}

.section-header p {
    font-size: 1.25rem;
    color: var(--text-body);
    max-width: 600px;
    margin: 0 auto;
}

.features-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 2rem;
    padding: 1rem;
}

.feature-card {
    background: var(--card-bg);
    padding: 2rem;
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-soft);
    text-align: center;
    transition: transform 0.3s ease;
}

.feature-card:hover {
    transform: translateY(-5px);
}

.feature-icon {
    width: 64px;
    height: 64px;
    background: var(--accent-primary-soft);
    border-radius: var(--radius-lg);
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.5rem;
}

.feature-icon i {
    font-size: 1.75rem;
    color: var(--accent-main);
}

.feature-card h3 {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--text-main);
    margin-bottom: 1rem;
}

.feature-card p {
    color: var(--text-body);
    line-height: 1.6;
}

@media (max-width: 768px) {
    .features {
        padding: 4rem 0;
    }

    .section-header h2 {
        font-size: 2rem;
    }

    .section-header p {
        font-size: 1.125rem;
    }

    .features-grid {
        grid-template-columns: 1fr;
        max-width: 400px;
        margin: 0 auto;
    }
}
</style>