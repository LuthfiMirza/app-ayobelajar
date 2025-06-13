@extends('layouts.app')

@section('content')
<style>
    .career-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 2rem 1rem;
    }

    .career-header {
        text-align: center;
        margin-bottom: 4rem;
        padding: 4rem 0;
        background: linear-gradient(135deg, var(--accent-main) 0%, var(--accent-main-light) 100%);
        border-radius: var(--radius-xl);
        color: white;
        position: relative;
        overflow: hidden;
    }

    .career-header::before {
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

    .career-header h1 {
        font-size: 3rem;
        font-weight: 800;
        margin-bottom: 1rem;
        position: relative;
        z-index: 2;
    }

    .career-header p {
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
        text-align: center;
        max-width: 800px;
        margin-left: auto;
        margin-right: auto;
    }

    .benefits-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
        margin: 3rem 0;
    }

    .benefit-card {
        background: var(--card-bg);
        border-radius: var(--radius-lg);
        padding: 2rem;
        box-shadow: var(--shadow-soft);
        border: 1px solid var(--border-soft);
        text-align: center;
        transition: transform 0.3s ease;
    }

    .benefit-card:hover {
        transform: translateY(-4px);
    }

    .benefit-card .icon {
        font-size: 3rem;
        color: var(--accent-main);
        margin-bottom: 1rem;
    }

    .benefit-card h3 {
        font-size: 1.25rem;
        font-weight: 700;
        color: var(--text-main);
        margin-bottom: 1rem;
    }

    .benefit-card p {
        color: var(--text-body);
        text-align: center;
        margin: 0;
    }

    .job-openings {
        background: var(--card-bg);
        border-radius: var(--radius-lg);
        padding: 3rem 2rem;
        box-shadow: var(--shadow-soft);
        border: 1px solid var(--border-soft);
        text-align: center;
        margin: 3rem 0;
    }

    .job-openings h3 {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--text-main);
        margin-bottom: 1rem;
    }

    .job-openings p {
        color: var(--text-body);
        margin-bottom: 2rem;
    }

    .job-list {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .job-item {
        background: rgba(120, 87, 193, 0.05);
        border-radius: var(--radius-md);
        padding: 1.5rem;
        border: 2px solid transparent;
        transition: all 0.3s ease;
    }

    .job-item:hover {
        border-color: var(--accent-main);
        background: rgba(120, 87, 193, 0.1);
    }

    .job-title {
        font-size: 1.125rem;
        font-weight: 700;
        color: var(--text-main);
        margin-bottom: 0.5rem;
    }

    .job-type {
        font-size: 0.875rem;
        color: var(--accent-main);
        font-weight: 600;
        margin-bottom: 1rem;
    }

    .job-description {
        font-size: 0.875rem;
        color: var(--text-body);
        line-height: 1.6;
    }

    .contact-info {
        background: linear-gradient(135deg, var(--accent-main) 0%, var(--accent-main-light) 100%);
        border-radius: var(--radius-lg);
        padding: 2rem;
        color: white;
        text-align: center;
        margin-top: 3rem;
    }

    .contact-info h3 {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 1rem;
    }

    .contact-info p {
        margin-bottom: 1.5rem;
        opacity: 0.9;
    }

    .contact-email {
        background: rgba(255, 255, 255, 0.2);
        border-radius: var(--radius-md);
        padding: 1rem;
        font-weight: 600;
        font-size: 1.125rem;
        margin-bottom: 1rem;
    }

    .coming-soon {
        background: linear-gradient(135deg, #f59e0b 0%, #f97316 100%);
        border-radius: var(--radius-lg);
        padding: 2rem;
        color: white;
        text-align: center;
        margin: 2rem 0;
    }

    .coming-soon h3 {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 1rem;
    }

    .coming-soon p {
        opacity: 0.9;
        margin: 0;
    }

    @media (max-width: 768px) {
        .career-container {
            padding: 1rem;
        }

        .career-header {
            padding: 2rem 1rem;
        }

        .career-header h1 {
            font-size: 2rem;
        }

        .career-header p {
            font-size: 1rem;
        }

        .content-section h2 {
            font-size: 1.5rem;
        }

        .content-section p {
            font-size: 1rem;
        }

        .job-openings {
            padding: 2rem 1rem;
        }
    }
</style>

<div class="career-container">
    <!-- Header -->
    <div class="career-header">
        <h1>Karir</h1>
        <p>Bergabunglah dengan kami dalam membangun masa depan pendidikan Indonesia</p>
    </div>

    <!-- About Working With Us -->
    <div class="content-section">
        <h2>Mengapa Bergabung dengan Kami?</h2>
        <p>
            Di Ayo Belajar, kami percaya bahwa tim yang solid adalah kunci kesuksesan. Kami mencari individu-individu 
            yang memiliki passion dalam teknologi dan pendidikan, serta berkomitmen untuk memberikan dampak positif 
            bagi masyarakat Indonesia.
        </p>
        <p>
            Sebagai startup yang sedang berkembang, kami menawarkan lingkungan kerja yang dinamis, kesempatan untuk 
            belajar dan berkembang, serta peluang untuk berkontribusi langsung dalam menciptakan solusi inovatif 
            untuk dunia pendidikan.
        </p>
    </div>

    <!-- Benefits -->
    <div class="benefits-grid">
        <div class="benefit-card">
            <div class="icon">
                <i class="fas fa-rocket"></i>
            </div>
            <h3>Pertumbuhan Cepat</h3>
            <p>Kesempatan untuk berkembang bersama startup yang sedang tumbuh pesat dan memberikan dampak nyata.</p>
        </div>
        <div class="benefit-card">
            <div class="icon">
                <i class="fas fa-lightbulb"></i>
            </div>
            <h3>Lingkungan Inovatif</h3>
            <p>Bekerja dengan teknologi terdepan dan berkontribusi dalam pengembangan solusi pendidikan yang inovatif.</p>
        </div>
        <div class="benefit-card">
            <div class="icon">
                <i class="fas fa-users"></i>
            </div>
            <h3>Tim yang Solid</h3>
            <p>Bergabung dengan tim yang kompak, saling mendukung, dan memiliki visi yang sama untuk memajukan pendidikan.</p>
        </div>
        <div class="benefit-card">
            <div class="icon">
                <i class="fas fa-heart"></i>
            </div>
            <h3>Dampak Sosial</h3>
            <p>Berkontribusi langsung dalam meningkatkan kualitas pendidikan di Indonesia, terutama di daerah 3T.</p>
        </div>
        <div class="benefit-card">
            <div class="icon">
                <i class="fas fa-graduation-cap"></i>
            </div>
            <h3>Pembelajaran Berkelanjutan</h3>
            <p>Akses ke pelatihan, workshop, dan kesempatan untuk terus mengembangkan skill dan pengetahuan.</p>
        </div>
        <div class="benefit-card">
            <div class="icon">
                <i class="fas fa-clock"></i>
            </div>
            <h3>Fleksibilitas</h3>
            <p>Work-life balance yang baik dengan fleksibilitas waktu kerja dan dukungan untuk remote working.</p>
        </div>
    </div>

    <!-- Current Job Openings -->
    <div class="job-openings">
        <h3>Posisi yang Tersedia</h3>
        <p>Saat ini kami sedang mencari talenta-talenta terbaik untuk bergabung dengan tim kami:</p>
        
        <div class="coming-soon">
            <h3>🚀 Segera Hadir!</h3>
            <p>
                Kami sedang dalam tahap ekspansi dan akan segera membuka berbagai posisi menarik. 
                Stay tuned untuk update terbaru mengenai lowongan kerja di Ayo Belajar!
            </p>
        </div>

        <div class="job-list">
            <div class="job-item">
                <div class="job-title">Frontend Developer</div>
                <div class="job-type">Full-time • Remote/Hybrid</div>
                <div class="job-description">
                    Mengembangkan antarmuka pengguna yang menarik dan responsif untuk platform Ayo Belajar. 
                    Dibutuhkan pengalaman dengan React, Vue.js, atau framework modern lainnya.
                </div>
            </div>
            <div class="job-item">
                <div class="job-title">Backend Developer</div>
                <div class="job-type">Full-time • Remote/Hybrid</div>
                <div class="job-description">
                    Membangun dan memelihara sistem backend yang robust dan scalable. 
                    Pengalaman dengan Laravel, Node.js, atau framework backend lainnya sangat diutamakan.
                </div>
            </div>
            <div class="job-item">
                <div class="job-title">UI/UX Designer</div>
                <div class="job-type">Full-time • Remote/Hybrid</div>
                <div class="job-description">
                    Merancang pengalaman pengguna yang intuitif dan menarik untuk platform pendidikan. 
                    Dibutuhkan portfolio yang kuat dan pemahaman tentang design thinking.
                </div>
            </div>
            <div class="job-item">
                <div class="job-title">Content Creator</div>
                <div class="job-type">Part-time • Remote</div>
                <div class="job-description">
                    Membuat konten edukatif yang berkualitas untuk berbagai mata pelajaran. 
                    Latar belakang pendidikan dan kemampuan menulis yang baik sangat diutamakan.
                </div>
            </div>
            <div class="job-item">
                <div class="job-title">AI/ML Engineer</div>
                <div class="job-type">Full-time • Remote/Hybrid</div>
                <div class="job-description">
                    Mengembangkan dan meningkatkan fitur AI chatbot dan sistem rekomendasi pembelajaran. 
                    Pengalaman dengan Python, TensorFlow, atau PyTorch sangat dibutuhkan.
                </div>
            </div>
            <div class="job-item">
                <div class="job-title">Quality Assurance</div>
                <div class="job-type">Full-time • Remote/Hybrid</div>
                <div class="job-description">
                    Memastikan kualitas produk melalui testing yang komprehensif. 
                    Pengalaman dengan automated testing dan manual testing sangat diutamakan.
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Information -->
    <div class="contact-info">
        <h3>Tertarik Bergabung?</h3>
        <p>
            Kirimkan CV dan portfolio terbaikmu kepada kami. Kami akan menghubungi kandidat yang sesuai 
            dengan kebutuhan tim kami.
        </p>
        <div class="contact-email">
            career@ayobelajar.id
        </div>
        <p>
            Atau hubungi kami melalui kontak yang tersedia di halaman kontak untuk informasi lebih lanjut 
            mengenai peluang karir di Ayo Belajar.
        </p>
    </div>

    <!-- Future Plans -->
    <div class="content-section">
        <h2>Rencana Masa Depan</h2>
        <p>
            Seiring dengan pertumbuhan platform Ayo Belajar, kami berencana untuk terus memperluas tim 
            dengan menghadirkan lebih banyak posisi di berbagai divisi seperti Marketing, Business Development, 
            Customer Success, dan Data Analytics.
        </p>
        <p>
            Kami juga berkomitmen untuk memberikan kesempatan magang dan program fresh graduate untuk 
            mahasiswa dan lulusan baru yang ingin memulai karir di bidang teknologi pendidikan.
        </p>
    </div>
</div>
@endsection