<section class="stats">
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-number">50+</div>
            <div class="stat-label">Sekolah Terdaftar</div>
        </div>
        
        <div class="stat-card">
            <div class="stat-number">1000+</div>
            <div class="stat-label">Siswa Aktif</div>
        </div>
        
        <div class="stat-card">
            <div class="stat-number">100+</div>
            <div class="stat-label">Modul Pembelajaran</div>
        </div>
        
        <div class="stat-card">
            <div class="stat-number">10+</div>
            <div class="stat-label">Bahasa Daerah</div>
        </div>
    </div>
</section>

<style>
.stats {
    padding: 4rem 0;
    background: linear-gradient(135deg, rgba(var(--accent-primary-soft-rgb), 0.3), rgba(var(--accent-primary-soft-rgb), 0.1));
    border-radius: var(--radius-xl);
    margin: 2rem 0;
}

.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 2rem;
    padding: 1rem;
}

.stat-card {
    text-align: center;
    padding: 2rem;
    background: var(--card-bg);
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-light);
    transition: transform 0.3s ease;
}

.stat-card:hover {
    transform: translateY(-5px);
}

.stat-number {
    font-size: 3rem;
    font-weight: 800;
    color: var(--accent-main);
    line-height: 1.2;
    margin-bottom: 0.5rem;
}

.stat-label {
    font-size: 1.125rem;
    font-weight: 600;
    color: var(--text-body);
}

@media (max-width: 768px) {
    .stats {
        padding: 3rem 0;
        margin: 1.5rem 0;
    }

    .stats-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 1.5rem;
    }

    .stat-number {
        font-size: 2.5rem;
    }

    .stat-label {
        font-size: 1rem;
    }
}

@media (max-width: 480px) {
    .stats-grid {
        grid-template-columns: 1fr;
        max-width: 280px;
        margin: 0 auto;
    }
}
</style>