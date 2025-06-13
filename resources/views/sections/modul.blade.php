<section class="modul-preview">
    <div class="section-header">
        <h2>Modul Pembelajaran Terbaru</h2>
        <p>Akses koleksi modul pembelajaran yang terus diperbarui untuk mendukung proses belajar</p>
    </div>
    
    <div class="modul-categories">
        <div class="category-card smp">
            <div class="category-header">
                <div class="category-icon">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <div class="category-info">
                    <h3>Modul SMP</h3>
                    <p>Sekolah Menengah Pertama</p>
                </div>
                <div class="category-count">15+ Modul</div>
            </div>
            <div class="category-subjects">
                <span class="subject-tag">Matematika</span>
                <span class="subject-tag">IPA</span>
                <span class="subject-tag">Bahasa Indonesia</span>
                <span class="subject-tag">IPS</span>
            </div>
            <a href="{{ route('modul') }}" class="category-link">
                <i class="fas fa-arrow-right"></i>
                Lihat Semua Modul SMP
            </a>
        </div>
        
        <div class="category-card sma">
            <div class="category-header">
                <div class="category-icon">
                    <i class="fas fa-university"></i>
                </div>
                <div class="category-info">
                    <h3>Modul SMA</h3>
                    <p>Sekolah Menengah Atas</p>
                </div>
                <div class="category-count">25+ Modul</div>
            </div>
            <div class="category-subjects">
                <span class="subject-tag">Fisika</span>
                <span class="subject-tag">Kimia</span>
                <span class="subject-tag">Biologi</span>
                <span class="subject-tag">Matematika</span>
            </div>
            <a href="{{ route('modul') }}" class="category-link">
                <i class="fas fa-arrow-right"></i>
                Lihat Semua Modul SMA
            </a>
        </div>
    </div>
    
    <div class="modul-features">
        <div class="feature-item">
            <i class="fas fa-download"></i>
            <span>Download Offline</span>
        </div>
        <div class="feature-item">
            <i class="fas fa-mobile-alt"></i>
            <span>Mobile Friendly</span>
        </div>
        <div class="feature-item">
            <i class="fas fa-language"></i>
            <span>Multi Bahasa</span>
        </div>
        <div class="feature-item">
            <i class="fas fa-clock"></i>
            <span>Update Berkala</span>
        </div>
    </div>
</section>

<style>
.modul-preview {
    padding: 6rem 0;
    background: var(--page-bg);
}

.modul-categories {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
    gap: 2rem;
    margin-bottom: 4rem;
    padding: 0 1rem;
}

.category-card {
    background: var(--card-bg);
    border-radius: var(--radius-lg);
    padding: 2rem;
    box-shadow: var(--shadow-soft);
    transition: all 0.3s ease;
    border-top: 4px solid;
}

.category-card.smp {
    border-top-color: #3b82f6;
}

.category-card.sma {
    border-top-color: #8b5cf6;
}

.category-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.12);
}

.category-header {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-bottom: 1.5rem;
}

.category-icon {
    width: 56px;
    height: 56px;
    border-radius: var(--radius-lg);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
}

.category-card.smp .category-icon {
    background: #dbeafe;
    color: #3b82f6;
}

.category-card.sma .category-icon {
    background: #ede9fe;
    color: #8b5cf6;
}

.category-info {
    flex: 1;
}

.category-info h3 {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--text-main);
    margin-bottom: 0.25rem;
}

.category-info p {
    color: var(--text-body);
    font-size: 0.95rem;
}

.category-count {
    background: var(--accent-primary-soft);
    color: var(--accent-main);
    padding: 0.5rem 1rem;
    border-radius: var(--radius-pill);
    font-weight: 600;
    font-size: 0.875rem;
}

.category-subjects {
    display: flex;
    flex-wrap: wrap;
    gap: 0.5rem;
    margin-bottom: 1.5rem;
}

.subject-tag {
    background: var(--accent-primary-soft);
    color: var(--text-main);
    padding: 0.375rem 0.75rem;
    border-radius: var(--radius-pill);
    font-size: 0.8rem;
    font-weight: 500;
}

.category-link {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    color: var(--accent-main);
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
}

.category-link:hover {
    gap: 0.75rem;
    color: var(--accent-main-light);
}

.modul-features {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1.5rem;
    max-width: 800px;
    margin: 0 auto;
    padding: 0 1rem;
}

.feature-item {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.75rem;
    padding: 1.5rem;
    background: var(--card-bg);
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-light);
    transition: transform 0.3s ease;
}

.feature-item:hover {
    transform: translateY(-3px);
}

.feature-item i {
    font-size: 1.25rem;
    color: var(--accent-main);
}

.feature-item span {
    font-weight: 600;
    color: var(--text-main);
}

@media (max-width: 768px) {
    .modul-preview {
        padding: 4rem 0;
    }
    
    .modul-categories {
        grid-template-columns: 1fr;
        max-width: 500px;
        margin: 0 auto 3rem;
    }
    
    .category-header {
        flex-direction: column;
        text-align: center;
        gap: 1rem;
    }
    
    .category-info {
        text-align: center;
    }
    
    .modul-features {
        grid-template-columns: repeat(2, 1fr);
        gap: 1rem;
    }
    
    .feature-item {
        flex-direction: column;
        text-align: center;
        padding: 1rem;
    }
}

@media (max-width: 480px) {
    .modul-features {
        grid-template-columns: 1fr;
        max-width: 300px;
    }
    
    .category-subjects {
        justify-content: center;
    }
}
</style>