<section class="testimonials">
    <div class="section-header">
        <h2>Testimoni Pengguna</h2>
        <p>Apa kata mereka tentang Ayo Belajar</p>
    </div>
    
    <div class="testimonials-grid">
        <div class="testimonial-card">
            <div class="testimonial-content">
                <i class="fas fa-quote-left quote-icon"></i>
                <p>"Ayo Belajar sangat membantu saya dalam mengajar. Modul-modulnya lengkap dan mudah dipahami oleh siswa."</p>
            </div>
            <div class="testimonial-author">
                <img src="{{ asset('images/avatar-1.svg') }}" alt="Foto profil">
                <div class="author-info">
                    <h4>Dewi Susanti</h4>
                    <p>Guru SD di Papua</p>
                </div>
            </div>
        </div>
        
        <div class="testimonial-card">
            <div class="testimonial-content">
                <i class="fas fa-quote-left quote-icon"></i>
                <p>"Saya senang bisa belajar dengan ChatBot yang bisa menjelaskan materi dalam bahasa daerah saya."</p>
            </div>
            <div class="testimonial-author">
                <img src="{{ asset('images/avatar-2.svg') }}" alt="Foto profil">
                <div class="author-info">
                    <h4>Made Putra</h4>
                    <p>Siswa SMP di Bali</p>
                </div>
            </div>
        </div>
        
        <div class="testimonial-card">
            <div class="testimonial-content">
                <i class="fas fa-quote-left quote-icon"></i>
                <p>"Platform ini memudahkan kami mengakses materi pembelajaran berkualitas meski di daerah terpencil."</p>
            </div>
            <div class="testimonial-author">
                <img src="{{ asset('images/avatar-3.svg') }}" alt="Foto profil">
                <div class="author-info">
                    <h4>Rahmat Abdullah</h4>
                    <p>Kepala Sekolah di NTT</p>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.testimonials {
    padding: 6rem 0;
}

.testimonials-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
    padding: 1rem;
}

.testimonial-card {
    background: var(--card-bg);
    padding: 2rem;
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-soft);
}

.testimonial-content {
    margin-bottom: 1.5rem;
    position: relative;
}

.quote-icon {
    font-size: 1.5rem;
    color: var(--accent-main);
    opacity: 0.5;
    margin-bottom: 1rem;
}

.testimonial-content p {
    font-size: 1.125rem;
    color: var(--text-body);
    line-height: 1.6;
}

.testimonial-author {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.testimonial-author img {
    width: 48px;
    height: 48px;
    border-radius: 50%;
    object-fit: cover;
}

.author-info h4 {
    font-size: 1.125rem;
    font-weight: 700;
    color: var(--text-main);
    margin-bottom: 0.25rem;
}

.author-info p {
    font-size: 0.875rem;
    color: var(--text-light);
}

@media (max-width: 768px) {
    .testimonials {
        padding: 4rem 0;
    }

    .testimonials-grid {
        grid-template-columns: 1fr;
        max-width: 500px;
        margin: 0 auto;
    }
}
</style>