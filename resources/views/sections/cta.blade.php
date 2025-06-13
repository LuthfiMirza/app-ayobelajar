<section class="cta">
    <div class="cta-container">
        <div class="cta-content">
            <div class="cta-badge">
                <i class="fas fa-star"></i>
                <span>Siap untuk memulai?</span>
            </div>
            <h2>Bergabunglah dengan ribuan siswa yang sudah merasakan manfaatnya</h2>
            <p>Akses pembelajaran digital terdepan dengan teknologi AI dan materi berkualitas tinggi</p>
            
            <div class="cta-buttons">
                <a href="{{ route('register') }}" class="btn btn-primary">
                    <div class="btn-content">
                        <i class="fas fa-rocket"></i>
                        <span class="btn-text">Daftar Gratis</span>
                        <span class="btn-subtext">Mulai dalam 30 detik</span>
                    </div>
                    <div class="btn-shine"></div>
                </a>
                
                <a href="{{ route('modul') }}" class="btn btn-secondary">
                    <div class="btn-content">
                        <i class="fas fa-book-open"></i>
                        <span class="btn-text">Lihat Modul</span>
                        <span class="btn-subtext">Jelajahi materi</span>
                    </div>
                </a>
                
                <a href="{{ route('chatbot') }}" class="btn btn-tertiary">
                    <div class="btn-content">
                        <i class="fas fa-robot"></i>
                        <span class="btn-text">Coba ChatBot</span>
                        <span class="btn-subtext">AI Assistant gratis</span>
                    </div>
                </a>
            </div>
            
            <div class="cta-trust">
                <div class="trust-item">
                    <i class="fas fa-users"></i>
                    <span>10,000+ Siswa Aktif</span>
                </div>
                <div class="trust-item">
                    <i class="fas fa-star"></i>
                    <span>Rating 4.9/5</span>
                </div>
                <div class="trust-item">
                    <i class="fas fa-shield-alt"></i>
                    <span>100% Aman & Gratis</span>
                </div>
            </div>
        </div>
        
        <div class="cta-features">
            <div class="cta-feature">
                <div class="feature-icon">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <div class="feature-content">
                    <h4>Materi Berkualitas</h4>
                    <p>Kurikulum terkini</p>
                </div>
            </div>
            <div class="cta-feature">
                <div class="feature-icon">
                    <i class="fas fa-brain"></i>
                </div>
                <div class="feature-content">
                    <h4>AI Assistant</h4>
                    <p>Bantuan 24/7</p>
                </div>
            </div>
            <div class="cta-feature">
                <div class="feature-icon">
                    <i class="fas fa-language"></i>
                </div>
                <div class="feature-content">
                    <h4>Multi Bahasa</h4>
                    <p>Bahasa daerah</p>
                </div>
            </div>
            <div class="cta-feature">
                <div class="feature-icon">
                    <i class="fas fa-mobile-alt"></i>
                </div>
                <div class="feature-content">
                    <h4>Akses Mudah</h4>
                    <p>Semua perangkat</p>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.cta {
    padding: 8rem 0;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
    color: white;
    position: relative;
    overflow: hidden;
}

.cta::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: 
        radial-gradient(circle at 20% 80%, rgba(120, 119, 198, 0.3) 0%, transparent 50%),
        radial-gradient(circle at 80% 20%, rgba(255, 119, 198, 0.3) 0%, transparent 50%),
        radial-gradient(circle at 40% 40%, rgba(120, 219, 255, 0.2) 0%, transparent 50%);
    animation: float 6s ease-in-out infinite;
}

@keyframes float {
    0%, 100% { transform: translateY(0px) rotate(0deg); }
    50% { transform: translateY(-20px) rotate(1deg); }
}

.cta-container {
    position: relative;
    z-index: 2;
    text-align: center;
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 2rem;
}

.cta-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: rgba(255, 255, 255, 0.2);
    padding: 0.75rem 1.5rem;
    border-radius: 50px;
    margin-bottom: 2rem;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.3);
    animation: pulse 2s infinite;
}

.cta-badge i {
    color: #ffd700;
    animation: sparkle 1.5s ease-in-out infinite;
}

@keyframes sparkle {
    0%, 100% { transform: scale(1) rotate(0deg); }
    50% { transform: scale(1.2) rotate(180deg); }
}

@keyframes pulse {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.05); }
}

.cta-content h2 {
    font-size: 3.5rem;
    font-weight: 900;
    margin-bottom: 1.5rem;
    text-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    line-height: 1.2;
    background: linear-gradient(45deg, #fff, #f0f8ff);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.cta-content p {
    font-size: 1.4rem;
    margin-bottom: 3rem;
    opacity: 0.95;
    line-height: 1.6;
    max-width: 700px;
    margin-left: auto;
    margin-right: auto;
}

.cta-buttons {
    display: flex;
    gap: 1.5rem;
    justify-content: center;
    margin-bottom: 4rem;
    flex-wrap: wrap;
}

.btn {
    position: relative;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 0;
    border-radius: 20px;
    font-weight: 700;
    text-decoration: none;
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    overflow: hidden;
    min-width: 200px;
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
}

.btn-content {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 1.5rem 2rem;
    position: relative;
    z-index: 2;
    width: 100%;
}

.btn-content i {
    font-size: 1.5rem;
    margin-bottom: 0.5rem;
}

.btn-text {
    font-size: 1.1rem;
    font-weight: 700;
    margin-bottom: 0.25rem;
}

.btn-subtext {
    font-size: 0.85rem;
    opacity: 0.8;
    font-weight: 500;
}

.btn-primary {
    background: linear-gradient(135deg, #ff6b6b, #ee5a24);
    color: white;
    position: relative;
}

.btn-primary::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, #ff7675, #fd79a8);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.btn-primary:hover::before {
    opacity: 1;
}

.btn-shine {
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
    transition: left 0.6s ease;
}

.btn-primary:hover .btn-shine {
    left: 100%;
}

.btn-primary:hover {
    transform: translateY(-5px) scale(1.05);
    box-shadow: 0 15px 40px rgba(255, 107, 107, 0.4);
}

.btn-secondary {
    background: linear-gradient(135deg, #74b9ff, #0984e3);
    color: white;
}

.btn-secondary:hover {
    transform: translateY(-5px) scale(1.05);
    box-shadow: 0 15px 40px rgba(116, 185, 255, 0.4);
    background: linear-gradient(135deg, #81ecec, #00b894);
}

.btn-tertiary {
    background: linear-gradient(135deg, #a29bfe, #6c5ce7);
    color: white;
}

.btn-tertiary:hover {
    transform: translateY(-5px) scale(1.05);
    box-shadow: 0 15px 40px rgba(162, 155, 254, 0.4);
    background: linear-gradient(135deg, #fd79a8, #e84393);
}

.cta-trust {
    display: flex;
    justify-content: center;
    gap: 2rem;
    margin-bottom: 4rem;
    flex-wrap: wrap;
}

.trust-item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    padding: 1rem 1.5rem;
    background: rgba(255, 255, 255, 0.15);
    border-radius: 15px;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    transition: all 0.3s ease;
}

.trust-item:hover {
    transform: translateY(-3px);
    background: rgba(255, 255, 255, 0.25);
}

.trust-item i {
    color: #ffd700;
    font-size: 1.2rem;
}

.trust-item span {
    font-weight: 600;
    font-size: 0.95rem;
}

.cta-features {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 2rem;
    max-width: 1000px;
    margin: 0 auto;
}

.cta-feature {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 2rem;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 20px;
    backdrop-filter: blur(15px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    transition: all 0.4s ease;
    text-align: left;
}

.cta-feature:hover {
    transform: translateY(-8px);
    background: rgba(255, 255, 255, 0.2);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
}

.feature-icon {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, #ff6b6b, #ee5a24);
    border-radius: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.feature-icon i {
    color: white;
    font-size: 1.5rem;
}

.feature-content h4 {
    font-size: 1.1rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
    color: white;
}

.feature-content p {
    font-size: 0.9rem;
    opacity: 0.8;
    margin: 0;
    line-height: 1.4;
}

@media (max-width: 768px) {
    .cta {
        padding: 6rem 0;
    }
    
    .cta-content h2 {
        font-size: 2.5rem;
    }
    
    .cta-content p {
        font-size: 1.2rem;
    }
    
    .cta-buttons {
        flex-direction: column;
        align-items: center;
        gap: 1rem;
    }
    
    .btn {
        width: 100%;
        max-width: 300px;
    }
    
    .cta-trust {
        flex-direction: column;
        align-items: center;
        gap: 1rem;
    }
    
    .cta-features {
        grid-template-columns: 1fr;
        gap: 1.5rem;
    }
    
    .cta-feature {
        padding: 1.5rem;
    }
}

@media (max-width: 480px) {
    .cta-container {
        padding: 0 1rem;
    }
    
    .cta-content h2 {
        font-size: 2rem;
    }
    
    .cta-content p {
        font-size: 1.1rem;
    }
    
    .btn-content {
        padding: 1.25rem 1.5rem;
    }
    
    .cta-feature {
        flex-direction: column;
        text-align: center;
        padding: 1.5rem;
    }
    
    .feature-icon {
        margin-bottom: 1rem;
    }
}
</style>