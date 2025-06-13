@extends('layouts.app')

@section('content')
<section class="hero">
    <div class="hero-content">
        <h1>Pendidikan Digital untuk Daerah 3T</h1>
        <p>Membantu siswa dan guru di daerah 3T mengakses pendidikan berkualitas melalui teknologi digital yang inklusif.</p>
        <div class="hero-cta">
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
            <a href="{{ route('chatbot') }}" class="btn btn-outline">
                <div class="btn-content">
                    <i class="fas fa-robot"></i>
                    <span class="btn-text">Coba ChatBot</span>
                    <span class="btn-subtext">AI Assistant gratis</span>
                </div>
            </a>
        </div>
    </div>
    <div class="hero-image">
        <img src="{{ asset('images/hero-illustration.svg') }}" alt="Ilustrasi pendidikan digital">
    </div>
</section>

@include('sections.features')
@include('sections.benefits')
@include('sections.stats')
@include('sections.modul')
@include('sections.how-it-works')
@include('sections.social-proof')
@include('sections.fomo')
@include('sections.testimonials')
@include('sections.faq')
@include('sections.cta')

<style>
.hero {
    display: flex;
    align-items: center;
    gap: 2rem;
    padding: 3rem 0;
    min-height: calc(100vh - 80px);
}

.hero-content {
flex: 1;
max-width: 600px;
}

.hero h1 {
    font-size: 3.5rem;
    font-weight: 800;
    line-height: 1.2;
    color: var(--text-main);
    margin-bottom: 1.5rem;
}

.hero p {
    font-size: 1.25rem;
    color: var(--text-body);
    margin-bottom: 2rem;
    max-width: 600px;
}

.hero-cta {
    display: flex;
    gap: 1.5rem;
    flex-wrap: wrap;
}

.btn {
    position: relative;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 0;
    border-radius: 16px;
    font-weight: 700;
    text-decoration: none;
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    overflow: hidden;
    min-width: 180px;
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
}

.btn-content {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 1.25rem 1.75rem;
    position: relative;
    z-index: 2;
    width: 100%;
}

.btn-content i {
    font-size: 1.3rem;
    margin-bottom: 0.4rem;
}

.btn-text {
    font-size: 1rem;
    font-weight: 700;
    margin-bottom: 0.2rem;
}

.btn-subtext {
    font-size: 0.8rem;
    opacity: 0.8;
    font-weight: 500;
}

.btn-primary {
    background: linear-gradient(135deg, #ff6b6b, #ee5a24);
    color: white;
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
    transform: translateY(-3px) scale(1.03);
    box-shadow: 0 12px 30px rgba(255, 107, 107, 0.4);
}

.btn-secondary {
    background: linear-gradient(135deg, #74b9ff, #0984e3);
    color: white;
}

.btn-secondary:hover {
    transform: translateY(-3px) scale(1.03);
    box-shadow: 0 12px 30px rgba(116, 185, 255, 0.4);
    background: linear-gradient(135deg, #81ecec, #00b894);
}

.btn-outline {
    background: rgba(255, 255, 255, 0.1);
    border: 2px solid var(--accent-main);
    color: var(--accent-main);
    backdrop-filter: blur(10px);
}

.btn-outline:hover {
    background: var(--accent-main);
    color: white;
    transform: translateY(-3px) scale(1.03);
    box-shadow: 0 12px 30px rgba(99, 102, 241, 0.4);
}

.hero-image {
    flex: 1;
    display: flex;
    justify-content: center;
    align-items: center;
}

.hero-image img {
    max-width: 100%;
    height: auto;
}

@media (max-width: 992px) {
    .hero {
        flex-direction: column;
        text-align: center;
        padding: 2rem 0;
    }

    .hero p {
        margin-left: auto;
        margin-right: auto;
    }

    .hero-cta {
        justify-content: center;
    }

    .hero h1 {
        font-size: 2.5rem;
    }
}

@media (max-width: 576px) {
    .hero h1 {
        font-size: 2rem;
    }

    .hero p {
        font-size: 1.125rem;
    }

    .hero-cta {
        flex-direction: column;
        align-items: center;
    }

    .btn {
        width: 100%;
        max-width: 280px;
    }
    
    .btn-content {
        padding: 1rem 1.5rem;
    }
    
    .btn-content i {
        font-size: 1.2rem;
    }
    
    .btn-text {
        font-size: 0.95rem;
    }
    
    .btn-subtext {
        font-size: 0.75rem;
    }
}
</style>
@endsection
