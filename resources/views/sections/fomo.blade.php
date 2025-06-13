<section class="fomo-section">
    <div class="container">
        <!-- Live Activity Feed -->
        <div class="live-activity">
            <div class="activity-header">
                <div class="live-indicator">
                    <span class="live-dot"></span>
                    <span class="live-text">LIVE</span>
                </div>
                <h3>🔥 Aktivitas Real-time Platform</h3>
                <p>Lihat apa yang sedang dilakukan siswa lain sekarang!</p>
            </div>
            
            <div class="activity-feed">
                <div class="activity-item" data-delay="0">
                    <div class="activity-avatar">
                        <img src="{{ asset('images/avatar-1.svg') }}" alt="User">
                    </div>
                    <div class="activity-content">
                        <strong>Andi</strong> baru saja mendownload <span class="highlight">Modul Matematika SMA</span>
                        <div class="activity-time">2 menit yang lalu</div>
                    </div>
                    <div class="activity-icon">📚</div>
                </div>
                
                <div class="activity-item" data-delay="1">
                    <div class="activity-avatar">
                        <img src="{{ asset('images/avatar-2.svg') }}" alt="User">
                    </div>
                    <div class="activity-content">
                        <strong>Sari</strong> bertanya ke GATOT AI tentang <span class="highlight">Fisika Kuantum</span>
                        <div class="activity-time">5 menit yang lalu</div>
                    </div>
                    <div class="activity-icon">🤖</div>
                </div>
                
                <div class="activity-item" data-delay="2">
                    <div class="activity-avatar">
                        <img src="{{ asset('images/avatar-3.svg') }}" alt="User">
                    </div>
                    <div class="activity-content">
                        <strong>Budi</strong> menyelesaikan <span class="highlight">10 soal Kimia</span> dengan bantuan AI
                        <div class="activity-time">8 menit yang lalu</div>
                    </div>
                    <div class="activity-icon">⚗️</div>
                </div>
                
                <div class="activity-item" data-delay="3">
                    <div class="activity-avatar">
                        <img src="{{ asset('images/avatar-1.svg') }}" alt="User">
                    </div>
                    <div class="activity-content">
                        <strong>Maya</strong> bergabung dari <span class="highlight">Papua</span> dan langsung aktif belajar
                        <div class="activity-time">12 menit yang lalu</div>
                    </div>
                    <div class="activity-icon">🎉</div>
                </div>
            </div>
        </div>

        <!-- Limited Time Offer -->
        <div class="limited-offer">
            <div class="offer-badge">
                <span class="badge-text">⚡ PENAWARAN TERBATAS</span>
                <span class="badge-timer">Berakhir dalam 24 jam!</span>
            </div>
            
            <div class="offer-content">
                <h3>🎁 Bonus Eksklusif untuk 100 Pendaftar Pertama Hari Ini!</h3>
                <p>Jangan sampai terlewat! Dapatkan akses prioritas ke semua fitur premium.</p>
                
                <div class="bonus-grid">
                    <div class="bonus-item">
                        <div class="bonus-icon">🚀</div>
                        <div class="bonus-text">
                            <h4>Akses Prioritas</h4>
                            <p>Server khusus untuk performa maksimal</p>
                        </div>
                    </div>
                    
                    <div class="bonus-item">
                        <div class="bonus-icon">📖</div>
                        <div class="bonus-text">
                            <h4>Modul Eksklusif</h4>
                            <p>Materi pembelajaran yang belum dirilis</p>
                        </div>
                    </div>
                    
                    <div class="bonus-item">
                        <div class="bonus-icon">🏆</div>
                        <div class="bonus-text">
                            <h4>Badge Khusus</h4>
                            <p>Status "Early Adopter" di profil Anda</p>
                        </div>
                    </div>
                    
                    <div class="bonus-item">
                        <div class="bonus-icon">💬</div>
                        <div class="bonus-text">
                            <h4>Support Premium</h4>
                            <p>Bantuan langsung dari tim developer</p>
                        </div>
                    </div>
                </div>
                
                <div class="urgency-counter">
                    <div class="counter-item">
                        <span class="counter-number" id="spots-left">47</span>
                        <span class="counter-label">Slot tersisa</span>
                    </div>
                    <div class="counter-item">
                        <span class="counter-number" id="registered-today">53</span>
                        <span class="counter-label">Sudah daftar hari ini</span>
                    </div>
                </div>
                
                <div class="offer-cta">
                    <a href="{{ route('register') }}" class="offer-button">
                        <span>🎯 Klaim Bonus Sekarang</span>
                        <div class="button-shine"></div>
                    </a>
                    <div class="offer-guarantee">
                        <i class="fas fa-shield-alt"></i>
                        <span>100% Gratis • Tanpa Syarat • Langsung Aktif</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Social Pressure -->
        <div class="social-pressure">
            <div class="pressure-content">
                <h3>👥 Teman-temanmu Sudah Duluan!</h3>
                <p>Jangan sampai ketinggalan dari teman sekelas yang sudah merasakan manfaatnya</p>
                
                <div class="pressure-stats">
                    <div class="pressure-item">
                        <div class="pressure-icon">📈</div>
                        <div class="pressure-text">
                            <span class="pressure-number">89%</span>
                            <span class="pressure-label">siswa melaporkan nilai naik</span>
                        </div>
                    </div>
                    
                    <div class="pressure-item">
                        <div class="pressure-icon">⏰</div>
                        <div class="pressure-text">
                            <span class="pressure-number">15 menit</span>
                            <span class="pressure-label">rata-rata waktu untuk memahami materi</span>
                        </div>
                    </div>
                    
                    <div class="pressure-item">
                        <div class="pressure-icon">🎯</div>
                        <div class="pressure-text">
                            <span class="pressure-number">3x</span>
                            <span class="pressure-label">lebih cepat menyelesaikan PR</span>
                        </div>
                    </div>
                </div>
                
                <div class="testimonial-quick">
                    <div class="testimonial-content">
                        <p>"Teman-teman di kelas pada iri karena nilai saya naik drastis setelah pakai Ayo Belajar!"</p>
                        <div class="testimonial-author">
                            <img src="{{ asset('images/avatar-2.svg') }}" alt="Student">
                            <span>- Rina, Siswa SMA Jakarta</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Final Push -->
        <div class="final-push">
            <div class="push-content">
                <div class="push-icon">⚡</div>
                <h3>Mulai Sekarang atau Menyesal Nanti?</h3>
                <p>Setiap hari yang terlewat adalah kesempatan emas yang hilang untuk meningkatkan prestasi belajarmu!</p>
                
                <div class="comparison-grid">
                    <div class="comparison-item without">
                        <h4>❌ Tanpa Ayo Belajar</h4>
                        <ul>
                            <li>Belajar sendirian tanpa bantuan</li>
                            <li>Sulit memahami materi kompleks</li>
                            <li>Nilai stagnan atau menurun</li>
                            <li>Stress menghadapi ujian</li>
                        </ul>
                    </div>
                    
                    <div class="comparison-item with">
                        <h4>✅ Dengan Ayo Belajar</h4>
                        <ul>
                            <li>AI tutor pribadi 24/7</li>
                            <li>Materi mudah dipahami</li>
                            <li>Nilai meningkat signifikan</li>
                            <li>Percaya diri menghadapi ujian</li>
                        </ul>
                    </div>
                </div>
                
                <div class="final-cta">
                    <a href="{{ route('register') }}" class="final-button">
                        <span>🚀 Ya, Saya Mau Sukses!</span>
                    </a>
                    <div class="final-note">
                        <small>* Bergabung sekarang dan rasakan perbedaannya dalam 24 jam!</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .fomo-section {
        padding: 5rem 0;
        background: linear-gradient(135deg, var(--text-main) 0%, #2D2A4A 100%);
        color: white;
        position: relative;
        overflow: hidden;
    }

    .fomo-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: 
            radial-gradient(circle at 20% 80%, rgba(120, 87, 193, 0.2) 0%, transparent 50%),
            radial-gradient(circle at 80% 20%, rgba(160, 148, 224, 0.2) 0%, transparent 50%);
        pointer-events: none;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 2rem;
        position: relative;
        z-index: 2;
    }

    /* Live Activity */
    .live-activity {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(10px);
        border-radius: var(--radius-xl);
        padding: 2.5rem;
        margin-bottom: 4rem;
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .activity-header {
        text-align: center;
        margin-bottom: 2rem;
    }

    .live-indicator {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background: rgba(239, 68, 68, 0.2);
        padding: 0.5rem 1rem;
        border-radius: var(--radius-pill);
        margin-bottom: 1rem;
        border: 1px solid rgba(239, 68, 68, 0.3);
    }

    .live-dot {
        width: 8px;
        height: 8px;
        background: #ef4444;
        border-radius: 50%;
        animation: pulse 1.5s infinite;
    }

    @keyframes pulse {
        0%, 100% { opacity: 1; transform: scale(1); }
        50% { opacity: 0.5; transform: scale(1.2); }
    }

    .live-text {
        font-weight: 700;
        color: #ef4444;
        font-size: 0.9rem;
    }

    .activity-header h3 {
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
    }

    .activity-feed {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .activity-item {
        display: flex;
        align-items: center;
        gap: 1rem;
        background: rgba(255, 255, 255, 0.05);
        padding: 1rem;
        border-radius: var(--radius-md);
        border: 1px solid rgba(255, 255, 255, 0.1);
        animation: slideInLeft 0.5s ease;
        animation-delay: calc(var(--delay, 0) * 0.2s);
        animation-fill-mode: both;
    }

    @keyframes slideInLeft {
        from {
            opacity: 0;
            transform: translateX(-30px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    .activity-avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        overflow: hidden;
        flex-shrink: 0;
        border: 2px solid rgba(255, 255, 255, 0.2);
    }

    .activity-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .activity-content {
        flex: 1;
    }

    .activity-content strong {
        color: var(--warning-soft);
    }

    .highlight {
        color: var(--accent-main-light);
        font-weight: 600;
    }

    .activity-time {
        font-size: 0.8rem;
        opacity: 0.7;
        margin-top: 0.25rem;
    }

    .activity-icon {
        font-size: 1.5rem;
        flex-shrink: 0;
    }

    /* Limited Offer */
    .limited-offer {
        background: linear-gradient(135deg, var(--accent-main) 0%, var(--accent-main-light) 100%);
        border-radius: var(--radius-xl);
        padding: 3rem;
        margin-bottom: 4rem;
        position: relative;
        overflow: hidden;
    }

    .limited-offer::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: 
            radial-gradient(circle at 30% 70%, rgba(255, 255, 255, 0.1) 0%, transparent 50%);
        pointer-events: none;
    }

    .offer-badge {
        text-align: center;
        margin-bottom: 2rem;
    }

    .badge-text {
        display: block;
        font-size: 1.2rem;
        font-weight: 800;
        margin-bottom: 0.5rem;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .badge-timer {
        background: rgba(255, 255, 255, 0.2);
        padding: 0.5rem 1rem;
        border-radius: var(--radius-pill);
        font-weight: 600;
        animation: pulse 2s infinite;
        border: 1px solid rgba(255, 255, 255, 0.3);
    }

    .offer-content {
        position: relative;
        z-index: 2;
    }

    .offer-content h3 {
        font-size: 2.2rem;
        font-weight: 700;
        text-align: center;
        margin-bottom: 1rem;
    }

    .offer-content p {
        text-align: center;
        font-size: 1.1rem;
        margin-bottom: 2rem;
        opacity: 0.9;
    }

    .bonus-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .bonus-item {
        display: flex;
        align-items: center;
        gap: 1rem;
        background: rgba(255, 255, 255, 0.1);
        padding: 1.5rem;
        border-radius: var(--radius-lg);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .bonus-icon {
        font-size: 2.5rem;
        flex-shrink: 0;
    }

    .bonus-text h4 {
        font-size: 1.1rem;
        font-weight: 600;
        margin-bottom: 0.25rem;
    }

    .bonus-text p {
        font-size: 0.9rem;
        opacity: 0.8;
        margin: 0;
    }

    .urgency-counter {
        display: flex;
        justify-content: center;
        gap: 3rem;
        margin-bottom: 2rem;
    }

    .counter-item {
        text-align: center;
    }

    .counter-number {
        display: block;
        font-size: 3rem;
        font-weight: 800;
        color: var(--warning-soft);
        margin-bottom: 0.5rem;
    }

    .counter-label {
        font-size: 0.9rem;
        opacity: 0.8;
    }

    .offer-cta {
        text-align: center;
    }

    .offer-button {
        display: inline-block;
        padding: 1.5rem 3rem;
        background: linear-gradient(135deg, var(--warning-soft) 0%, #f59e0b 100%);
        color: var(--text-main);
        text-decoration: none;
        border-radius: var(--radius-pill);
        font-weight: 700;
        font-size: 1.2rem;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        margin-bottom: 1rem;
        box-shadow: 0 10px 30px rgba(251, 191, 36, 0.4);
    }

    .button-shine {
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
        transition: left 0.6s;
    }

    .offer-button:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 40px rgba(251, 191, 36, 0.5);
    }

    .offer-button:hover .button-shine {
        left: 100%;
    }

    .offer-guarantee {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        font-size: 0.9rem;
        opacity: 0.8;
    }

    .offer-guarantee i {
        color: var(--success-soft);
    }

    /* Social Pressure */
    .social-pressure {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(10px);
        border-radius: var(--radius-xl);
        padding: 2.5rem;
        margin-bottom: 4rem;
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .pressure-content h3 {
        font-size: 2rem;
        font-weight: 700;
        text-align: center;
        margin-bottom: 1rem;
    }

    .pressure-content p {
        text-align: center;
        font-size: 1.1rem;
        margin-bottom: 2rem;
        opacity: 0.9;
    }

    .pressure-stats {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .pressure-item {
        display: flex;
        align-items: center;
        gap: 1rem;
        background: rgba(255, 255, 255, 0.05);
        padding: 1.5rem;
        border-radius: var(--radius-lg);
        text-align: center;
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .pressure-icon {
        font-size: 2.5rem;
        flex-shrink: 0;
    }

    .pressure-number {
        display: block;
        font-size: 2rem;
        font-weight: 800;
        color: var(--warning-soft);
        margin-bottom: 0.25rem;
    }

    .pressure-label {
        font-size: 0.9rem;
        opacity: 0.8;
    }

    .testimonial-quick {
        background: rgba(120, 87, 193, 0.2);
        border: 1px solid rgba(120, 87, 193, 0.3);
        border-radius: var(--radius-lg);
        padding: 1.5rem;
    }

    .testimonial-content p {
        font-style: italic;
        margin-bottom: 1rem;
        text-align: left;
    }

    .testimonial-author {
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .testimonial-author img {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        border: 2px solid rgba(255, 255, 255, 0.3);
    }

    /* Final Push */
    .final-push {
        background: linear-gradient(135deg, var(--accent-main-light) 0%, var(--accent-main) 100%);
        border-radius: var(--radius-xl);
        padding: 3rem;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .final-push::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: 
            radial-gradient(circle at 50% 50%, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
        pointer-events: none;
    }

    .push-content {
        position: relative;
        z-index: 2;
    }

    .push-icon {
        font-size: 4rem;
        margin-bottom: 1rem;
    }

    .push-content h3 {
        font-size: 2.2rem;
        font-weight: 700;
        margin-bottom: 1rem;
    }

    .push-content p {
        font-size: 1.1rem;
        margin-bottom: 2rem;
        opacity: 0.9;
    }

    .comparison-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
        margin-bottom: 2rem;
    }

    .comparison-item {
        background: rgba(255, 255, 255, 0.1);
        padding: 2rem;
        border-radius: var(--radius-lg);
        backdrop-filter: blur(10px);
    }

    .comparison-item.without {
        border: 2px solid #ef4444;
    }

    .comparison-item.with {
        border: 2px solid var(--success-soft);
    }

    .comparison-item h4 {
        font-size: 1.2rem;
        font-weight: 600;
        margin-bottom: 1rem;
    }

    .comparison-item ul {
        list-style: none;
        padding: 0;
    }

    .comparison-item li {
        margin-bottom: 0.75rem;
        padding-left: 1.5rem;
        position: relative;
    }

    .without li::before {
        content: '❌';
        position: absolute;
        left: 0;
    }

    .with li::before {
        content: '✅';
        position: absolute;
        left: 0;
    }

    .final-cta {
        margin-top: 2rem;
    }

    .final-button {
        display: inline-block;
        padding: 1.5rem 3rem;
        background: linear-gradient(135deg, var(--warning-soft) 0%, #f59e0b 100%);
        color: var(--text-main);
        text-decoration: none;
        border-radius: var(--radius-pill);
        font-weight: 800;
        font-size: 1.3rem;
        transition: all 0.3s ease;
        box-shadow: 0 10px 30px rgba(251, 191, 36, 0.4);
        margin-bottom: 1rem;
    }

    .final-button:hover {
        transform: translateY(-3px) scale(1.05);
        box-shadow: 0 15px 40px rgba(251, 191, 36, 0.5);
    }

    .final-note {
        opacity: 0.8;
        font-style: italic;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .fomo-section {
            padding: 3rem 0;
        }

        .container {
            padding: 0 1rem;
        }

        .live-activity,
        .limited-offer,
        .social-pressure,
        .final-push {
            padding: 2rem;
        }

        .activity-header h3,
        .offer-content h3,
        .pressure-content h3,
        .push-content h3 {
            font-size: 1.5rem;
        }

        .bonus-grid,
        .pressure-stats,
        .comparison-grid {
            grid-template-columns: 1fr;
        }

        .urgency-counter {
            flex-direction: column;
            gap: 1rem;
        }

        .activity-item {
            flex-direction: column;
            text-align: center;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Animate activity items
        const activityItems = document.querySelectorAll('.activity-item');
        activityItems.forEach((item, index) => {
            item.style.setProperty('--delay', index);
        });
        
        // Simulate live counter updates
        function updateCounters() {
            const spotsLeft = document.getElementById('spots-left');
            const registeredToday = document.getElementById('registered-today');
            
            if (spotsLeft && registeredToday) {
                // Simulate decreasing spots and increasing registrations
                setInterval(() => {
                    let spots = parseInt(spotsLeft.textContent);
                    let registered = parseInt(registeredToday.textContent);
                    
                    if (Math.random() > 0.7 && spots > 10) { // 30% chance
                        spots--;
                        registered++;
                        spotsLeft.textContent = spots;
                        registeredToday.textContent = registered;
                    }
                }, 5000); // Update every 5 seconds
            }
        }
        
        updateCounters();
    });
</script>