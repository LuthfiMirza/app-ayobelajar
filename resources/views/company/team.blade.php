@extends('layouts.app')

@section('content')
<style>
    .team-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 2rem 1rem;
    }

    .team-header {
        text-align: center;
        margin-bottom: 4rem;
        padding: 4rem 0;
        background: linear-gradient(135deg, var(--accent-main) 0%, var(--accent-main-light) 100%);
        border-radius: var(--radius-xl);
        color: white;
        position: relative;
        overflow: hidden;
    }

    .team-header::before {
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

    .team-header h1 {
        font-size: 3rem;
        font-weight: 800;
        margin-bottom: 1rem;
        position: relative;
        z-index: 2;
    }

    .team-header p {
        font-size: 1.25rem;
        opacity: 0.9;
        position: relative;
        z-index: 2;
    }

    .team-intro {
        text-align: center;
        margin-bottom: 4rem;
    }

    .team-intro h2 {
        font-size: 2rem;
        font-weight: 700;
        color: var(--text-main);
        margin-bottom: 1rem;
    }

    .team-intro p {
        font-size: 1.125rem;
        color: var(--text-body);
        line-height: 1.8;
        max-width: 800px;
        margin: 0 auto;
    }

    .team-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 2rem;
        margin-bottom: 4rem;
    }

    .team-member {
        background: var(--card-bg);
        border-radius: var(--radius-xl);
        padding: 2rem;
        box-shadow: var(--shadow-soft);
        border: 1px solid var(--border-soft);
        text-align: center;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .team-member:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(120, 87, 193, 0.15);
    }

    .team-member::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 4px;
        background: linear-gradient(90deg, var(--accent-main), var(--accent-main-light));
    }

    .member-avatar {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--accent-main), var(--accent-main-light));
        margin: 0 auto 1.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 3rem;
        color: white;
        font-weight: 700;
        position: relative;
        overflow: hidden;
    }

    .member-avatar::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255,255,255,0.2) 0%, transparent 70%);
        animation: rotate 8s linear infinite;
    }

    @keyframes rotate {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    .member-name {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--text-main);
        margin-bottom: 0.5rem;
    }

    .member-role {
        font-size: 1rem;
        color: var(--accent-main);
        font-weight: 600;
        margin-bottom: 1rem;
    }

    .member-education {
        background: rgba(120, 87, 193, 0.1);
        border-radius: var(--radius-md);
        padding: 0.75rem 1rem;
        margin-bottom: 1.5rem;
        border-left: 4px solid var(--accent-main);
    }

    .member-education .university {
        font-weight: 600;
        color: var(--text-main);
        margin-bottom: 0.25rem;
    }

    .member-education .major {
        font-size: 0.875rem;
        color: var(--text-body);
    }

    .member-description {
        color: var(--text-body);
        line-height: 1.6;
        margin-bottom: 1.5rem;
    }

    .member-skills {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
        justify-content: center;
        margin-bottom: 1.5rem;
    }

    .skill-tag {
        background: var(--accent-primary-soft);
        color: var(--accent-main);
        padding: 0.25rem 0.75rem;
        border-radius: var(--radius-pill);
        font-size: 0.75rem;
        font-weight: 600;
    }

    .member-contact {
        border-top: 1px solid var(--border-soft);
        padding-top: 1.5rem;
        margin-top: 1.5rem;
    }

    .member-contact h4 {
        font-size: 1rem;
        font-weight: 700;
        color: var(--text-main);
        margin-bottom: 1rem;
        text-align: center;
    }

    .contact-info {
        display: flex;
        flex-direction: column;
        gap: 0.75rem;
        margin-bottom: 1rem;
    }

    .contact-item {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding: 0.5rem;
        border-radius: var(--radius-md);
        transition: all 0.3s ease;
    }

    .contact-item:hover {
        background: rgba(120, 87, 193, 0.05);
    }

    .contact-item i {
        width: 1.5rem;
        color: var(--accent-main);
        font-size: 0.875rem;
    }

    .contact-item span {
        font-size: 0.875rem;
        color: var(--text-body);
    }

    .contact-item a {
        font-size: 0.875rem;
        color: var(--text-body);
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .contact-item a:hover {
        color: var(--accent-main);
    }

    .social-links {
        display: flex;
        justify-content: center;
        gap: 1rem;
        margin-top: 1rem;
    }

    .social-link {
        width: 2.5rem;
        height: 2.5rem;
        border-radius: 50%;
        background: var(--accent-primary-soft);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--accent-main);
        text-decoration: none;
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .social-link:hover {
        background: var(--accent-main);
        color: white;
        transform: translateY(-2px);
    }

    .social-link.linkedin {
        background: rgba(0, 119, 181, 0.1);
        color: #0077b5;
    }

    .social-link.linkedin:hover {
        background: #0077b5;
        color: white;
    }

    .social-link.email {
        background: rgba(234, 67, 53, 0.1);
        color: #ea4335;
    }

    .social-link.email:hover {
        background: #ea4335;
        color: white;
    }

    .social-link.phone {
        background: rgba(34, 197, 94, 0.1);
        color: #22c55e;
    }

    .social-link.phone:hover {
        background: #22c55e;
        color: white;
    }

    .university-info {
        background: var(--card-bg);
        border-radius: var(--radius-lg);
        padding: 2rem;
        box-shadow: var(--shadow-soft);
        border: 1px solid var(--border-soft);
        text-align: center;
        margin-top: 3rem;
    }

    .university-info h3 {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--text-main);
        margin-bottom: 1rem;
    }

    .university-info p {
        color: var(--text-body);
        line-height: 1.6;
    }

    .university-logo {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, #1e40af, #3b82f6);
        border-radius: 50%;
        margin: 0 auto 1rem;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        color: white;
        font-weight: 700;
    }

    @media (max-width: 768px) {
        .team-container {
            padding: 1rem;
        }

        .team-header {
            padding: 2rem 1rem;
        }

        .team-header h1 {
            font-size: 2rem;
        }

        .team-header p {
            font-size: 1rem;
        }

        .team-grid {
            grid-template-columns: 1fr;
        }

        .team-intro h2 {
            font-size: 1.5rem;
        }

        .team-intro p {
            font-size: 1rem;
        }
    }
</style>

<div class="team-container">
    <!-- Header -->
    <div class="team-header">
        <h1>Tim Kami</h1>
        <p>Berkenalan dengan orang-orang di balik Ayo Belajar</p>
    </div>

    <!-- Team Introduction -->
    <div class="team-intro">
        <h2>Tentang Tim Kami</h2>
        <p>
            Tim Ayo Belajar terdiri dari individu-individu yang berdedikasi tinggi dalam bidang teknologi dan pendidikan. 
            Dengan latar belakang pendidikan Sistem Informasi dari Universitas Gunadarma, kami memiliki visi yang sama 
            untuk menciptakan solusi teknologi yang dapat memberikan dampak positif bagi dunia pendidikan Indonesia.
        </p>
    </div>

    <!-- Team Members -->
    <div class="team-grid">
        <!-- Member 1: Luthfi Mirza Darsono -->
        <div class="team-member">
            <div class="member-avatar">
                LM
            </div>
            <div class="member-name">Luthfi Mirza Darsono</div>
            <div class="member-role">Founder & Lead Developer</div>
            <div class="member-education">
                <div class="university">Universitas Gunadarma</div>
                <div class="major">Sistem Informasi</div>
            </div>
            <div class="member-description">
                Luthfi adalah seorang developer berpengalaman yang memiliki passion dalam mengembangkan solusi teknologi 
                untuk pendidikan. Dengan keahlian dalam pengembangan web dan mobile, ia memimpin tim dalam menciptakan 
                platform Ayo Belajar yang user-friendly dan inovatif.
            </div>
            <div class="member-skills">
                <span class="skill-tag">Full-Stack Development</span>
                <span class="skill-tag">Database Design</span>
                <span class="skill-tag">System Architecture</span>
                <span class="skill-tag">Project Management</span>
            </div>
            
            <div class="member-contact">
                <h4>Kontak & Social Media</h4>
                <div class="contact-info">
                    <div class="contact-item">
                        <i class="fas fa-envelope"></i>
                        <a href="mailto:luthfimirza2004@gmail.com">luthfimirza2004@gmail.com</a>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-phone"></i>
                        <a href="tel:+6285609408506">+62 856-0940-8506</a>
                    </div>
                    <div class="contact-item">
                        <i class="fab fa-linkedin"></i>
                        <a href="https://www.linkedin.com/in/luthfi-mirza-darsono-675663242/" target="_blank">https://www.linkedin.com/in/luthfi-mirza-darsono-675663242/</a>
                    </div>
                </div>
                <div class="social-links">
                    <a href="mailto:luthfimirza2004@gmail.com" class="social-link email" title="Email">
                        <i class="fas fa-envelope"></i>
                    </a>
                    <a href="tel:+6285609408506" class="social-link phone" title="Telepon">
                        <i class="fas fa-phone"></i>
                    </a>
                    <a href="https://www.linkedin.com/in/luthfi-mirza-darsono-675663242/" target="_blank" class="social-link linkedin" title="LinkedIn">
                        <i class="fab fa-linkedin"></i>
                    </a>
                    <a href="https://github.com/LuthfiMirza" target="_blank" class="social-link" title="GitHub">
                        <i class="fab fa-github"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Member 2: Alwan Farras -->
        <div class="team-member">
            <div class="member-avatar">
                AF
            </div>
            <div class="member-name">Alwan Farras</div>
            <div class="member-role">Co-Founder & Technical Lead</div>
            <div class="member-education">
                <div class="university">Universitas Gunadarma</div>
                <div class="major">Sistem Informasi</div>
            </div>
            <div class="member-description">
                Alwan adalah teknisi handal yang fokus pada pengembangan backend dan integrasi sistem. Dengan pemahaman 
                mendalam tentang database dan API development, ia memastikan platform Ayo Belajar dapat berjalan dengan 
                optimal dan scalable untuk melayani ribuan pengguna.
            </div>
            <div class="member-skills">
                <span class="skill-tag">Backend Development</span>
                <span class="skill-tag">AI Integration</span>
                <span class="skill-tag">API Development</span>
                <span class="skill-tag">System Optimization</span>
            </div>
            
            <div class="member-contact">
                <h4>Kontak & Social Media</h4>
                <div class="contact-info">
                    <div class="contact-item">
                        <i class="fas fa-envelope"></i>
                        <a href="mailto:alwanfarras711@gmail.com">alwanfarras711@gmail.com</a>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-phone"></i>
                        <a href="tel:+62881025741054">+62 881-0257-41054</a>
                    </div>
                    <div class="contact-item">
                        <i class="fab fa-linkedin"></i>
                        <a href="https://www.linkedin.com/in/muhammad-alwan-farras-76829728b/" target="_blank">https://www.linkedin.com/in/muhammad-alwan-farras-76829728b/</a>
                    </div>
                </div>
                <div class="social-links">
                    <a href="mailto:alwanfarras711@gmail.com" class="social-link email" title="Email">
                        <i class="fas fa-envelope"></i>
                    </a>
                    <a href="tel:+62881025741054" class="social-link phone" title="Telepon">
                        <i class="fas fa-phone"></i>
                    </a>
                    <a href="https://www.linkedin.com/in/muhammad-alwan-farras-76829728b/" target="_blank" class="social-link linkedin" title="LinkedIn">
                        <i class="fab fa-linkedin"></i>
                    </a>
                    <a href="https://github.com/alwanfarras" target="_blank" class="social-link" title="GitHub">
                        <i class="fab fa-github"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- University Information -->
    <div class="university-info">
        <div class="university-logo">
            UG
        </div>
        <h3>Universitas Gunadarma</h3>
        <p>
            Universitas Gunadarma adalah salah satu universitas terkemuka di Indonesia yang dikenal dengan program 
            Sistem Informasi yang berkualitas. Dengan kurikulum yang selalu mengikuti perkembangan teknologi terkini, 
            universitas ini telah melahirkan banyak profesional IT yang kompeten dan siap menghadapi tantangan 
            industri digital.
        </p>
        <p>
            Program Sistem Informasi di Universitas Gunadarma membekali mahasiswa dengan pengetahuan komprehensif 
            tentang pengembangan sistem, manajemen database, analisis sistem, dan teknologi informasi terbaru. 
            Hal ini menjadi fondasi kuat bagi tim Ayo Belajar dalam mengembangkan platform pendidikan digital 
            yang inovatif dan berkualitas.
        </p>
    </div>
</div>
@endsection