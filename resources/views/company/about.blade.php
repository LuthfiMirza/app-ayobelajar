@extends('layouts.app')

@section('content')
<style>
    .company-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 2rem 1rem;
    }

    .company-header {
        text-align: center;
        margin-bottom: 4rem;
        padding: 4rem 0;
        background: linear-gradient(135deg, var(--accent-main) 0%, var(--accent-main-light) 100%);
        border-radius: var(--radius-xl);
        color: white;
        position: relative;
        overflow: hidden;
    }

    .company-header::before {
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

    .company-header h1 {
        font-size: 3rem;
        font-weight: 800;
        margin-bottom: 1rem;
        position: relative;
        z-index: 2;
    }

    .company-header p {
        font-size: 1.25rem;
        opacity: 0.9;
        position: relative;
        z-index: 2;
    }

    .content-section {
        margin-bottom: 4rem;
    }

    .content-section h2 {
        font-size: 2rem;
        font-weight: 700;
        color: var(--text-main);
        margin-bottom: 1.5rem;
        text-align: center;
    }

    .content-section p {
        font-size: 1.125rem;
        line-height: 1.8;
        color: var(--text-body);
        margin-bottom: 1.5rem;
        text-align: justify;
    }

    .mission-vision {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
        margin: 3rem 0;
    }

    .mission-card, .vision-card {
        background: var(--card-bg);
        border-radius: var(--radius-lg);
        padding: 2rem;
        box-shadow: var(--shadow-soft);
        border: 1px solid var(--border-soft);
        text-align: center;
    }

    .mission-card h3, .vision-card h3 {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--accent-main);
        margin-bottom: 1rem;
    }

    .mission-card .icon, .vision-card .icon {
        font-size: 3rem;
        color: var(--accent-main);
        margin-bottom: 1rem;
    }

    .values-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1.5rem;
        margin: 3rem 0;
    }

    .value-card {
        background: var(--card-bg);
        border-radius: var(--radius-lg);
        padding: 1.5rem;
        box-shadow: var(--shadow-soft);
        border: 1px solid var(--border-soft);
        text-align: center;
        transition: transform 0.3s ease;
    }

    .value-card:hover {
        transform: translateY(-4px);
    }

    .value-card .icon {
        font-size: 2.5rem;
        color: var(--accent-main);
        margin-bottom: 1rem;
    }

    .value-card h4 {
        font-size: 1.25rem;
        font-weight: 700;
        color: var(--text-main);
        margin-bottom: 0.5rem;
    }

    .value-card p {
        font-size: 0.875rem;
        color: var(--text-body);
        text-align: center;
    }

    @media (max-width: 768px) {
        .company-container {
            padding: 1rem;
        }

        .company-header {
            padding: 2rem 1rem;
        }

        .company-header h1 {
            font-size: 2rem;
        }

        .company-header p {
            font-size: 1rem;
        }

        .content-section h2 {
            font-size: 1.5rem;
        }

        .content-section p {
            font-size: 1rem;
        }
    }
</style>

<div class="company-container">
    <!-- Header -->
    <div class="company-header">
        <h1>Tentang Kami</h1>
        <p>Membangun masa depan pendidikan Indonesia yang lebih baik</p>
    </div>

    <!-- About Section -->
    <div class="content-section">
        <h2>Siapa Kami</h2>
        <p>
            Ayo Belajar adalah platform pendidikan digital yang lahir dari kepedulian terhadap kesenjangan pendidikan di Indonesia, 
            khususnya di daerah Terdepan, Terluar, dan Tertinggal (3T). Kami percaya bahwa setiap anak Indonesia berhak mendapatkan 
            akses pendidikan berkualitas, tanpa terbatas oleh lokasi geografis atau keterbatasan infrastruktur.
        </p>
        <p>
            Platform kami menggabungkan teknologi artificial intelligence dengan konten pembelajaran yang disesuaikan dengan 
            kurikulum Indonesia, menciptakan pengalaman belajar yang interaktif, personal, dan mudah diakses. Dengan dukungan 
            fitur penerjemah bahasa daerah dan chatbot pintar, kami berusaha menghilangkan hambatan bahasa dan memberikan 
            bantuan pembelajaran 24/7.
        </p>
    </div>

    <!-- Mission & Vision -->
    <div class="mission-vision">
        <div class="mission-card">
            <div class="icon">
                <i class="fas fa-bullseye"></i>
            </div>
            <h3>Misi Kami</h3>
            <p>
                Menyediakan akses pendidikan berkualitas untuk semua siswa Indonesia, terutama di daerah 3T, 
                melalui teknologi digital yang inovatif dan mudah digunakan.
            </p>
        </div>
        <div class="vision-card">
            <div class="icon">
                <i class="fas fa-eye"></i>
            </div>
            <h3>Visi Kami</h3>
            <p>
                Menjadi platform pendidikan digital terdepan di Indonesia yang mampu menghilangkan kesenjangan 
                pendidikan dan menciptakan generasi yang cerdas dan berkarakter.
            </p>
        </div>
    </div>

    <!-- Values -->
    <div class="content-section">
        <h2>Nilai-Nilai Kami</h2>
        <div class="values-grid">
            <div class="value-card">
                <div class="icon">
                    <i class="fas fa-heart"></i>
                </div>
                <h4>Kepedulian</h4>
                <p>Kami peduli terhadap masa depan pendidikan Indonesia dan berkomitmen untuk memberikan solusi terbaik.</p>
            </div>
            <div class="value-card">
                <div class="icon">
                    <i class="fas fa-lightbulb"></i>
                </div>
                <h4>Inovasi</h4>
                <p>Kami terus berinovasi menggunakan teknologi terdepan untuk menciptakan pengalaman belajar yang lebih baik.</p>
            </div>
            <div class="value-card">
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <h4>Inklusivitas</h4>
                <p>Kami percaya pendidikan adalah hak semua orang, tanpa memandang latar belakang atau lokasi geografis.</p>
            </div>
            <div class="value-card">
                <div class="icon">
                    <i class="fas fa-star"></i>
                </div>
                <h4>Kualitas</h4>
                <p>Kami berkomitmen memberikan konten dan layanan pendidikan dengan standar kualitas tertinggi.</p>
            </div>
        </div>
    </div>

    <!-- Story Section -->
    <div class="content-section">
        <h2>Cerita Kami</h2>
        <p>
            Ayo Belajar dimulai dari keprihatinan melihat banyak siswa di daerah terpencil yang kesulitan mengakses 
            materi pembelajaran berkualitas. Dengan latar belakang pendidikan di bidang Sistem Informasi dari Universitas Gunadarma, 
            tim kami memahami betul bagaimana teknologi dapat menjadi jembatan untuk mengatasi masalah ini.
        </p>
        <p>
            Kami mengembangkan platform yang tidak hanya menyediakan modul pembelajaran digital, tetapi juga dilengkapi 
            dengan AI chatbot yang dapat membantu siswa memahami materi dengan lebih baik. Fitur penerjemah bahasa daerah 
            kami tambahkan untuk memastikan tidak ada siswa yang tertinggal karena hambatan bahasa.
        </p>
        <p>
            Hingga saat ini, Ayo Belajar telah membantu ribuan siswa di seluruh Indonesia untuk mengakses pendidikan 
            berkualitas. Kami terus berkomitmen untuk mengembangkan platform ini agar dapat menjangkau lebih banyak 
            siswa dan memberikan dampak positif yang lebih besar bagi dunia pendidikan Indonesia.
        </p>
    </div>
</div>
@endsection