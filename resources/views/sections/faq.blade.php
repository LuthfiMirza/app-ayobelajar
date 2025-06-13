<section class="faq">
    <div class="section-header">
        <h2>Pertanyaan yang Sering Diajukan</h2>
        <p>Temukan jawaban untuk pertanyaan umum tentang platform Ayo Belajar</p>
    </div>
    
    <div class="faq-container">
        <div class="faq-item">
            <div class="faq-question" onclick="toggleFaq(this)">
                <h3>Apakah platform ini benar-benar gratis?</h3>
                <i class="fas fa-chevron-down"></i>
            </div>
            <div class="faq-answer">
                <p>Ya, platform Ayo Belajar 100% gratis untuk semua pengguna. Kami berkomitmen menyediakan akses pendidikan berkualitas tanpa biaya untuk mendukung pemerataan pendidikan di daerah 3T.</p>
            </div>
        </div>
        
        <div class="faq-item">
            <div class="faq-question" onclick="toggleFaq(this)">
                <h3>Bisakah mengakses modul tanpa koneksi internet?</h3>
                <i class="fas fa-chevron-down"></i>
            </div>
            <div class="faq-answer">
                <p>Ya, semua modul dapat diunduh dan diakses secara offline. Ini sangat membantu untuk daerah dengan koneksi internet terbatas. Anda hanya perlu koneksi internet saat mengunduh modul pertama kali.</p>
            </div>
        </div>
        
        <div class="faq-item">
            <div class="faq-question" onclick="toggleFaq(this)">
                <h3>Bahasa daerah apa saja yang didukung?</h3>
                <i class="fas fa-chevron-down"></i>
            </div>
            <div class="faq-answer">
                <p>Saat ini kami mendukung bahasa Jawa, Sunda, Minang, Madura, dan Bugis. Kami terus menambahkan dukungan untuk bahasa daerah lainnya berdasarkan kebutuhan pengguna.</p>
            </div>
        </div>
        
        <div class="faq-item">
            <div class="faq-question" onclick="toggleFaq(this)">
                <h3>Bagaimana cara kerja ChatBot AI?</h3>
                <i class="fas fa-chevron-down"></i>
            </div>
            <div class="faq-answer">
                <p>ChatBot GATOT menggunakan teknologi AI untuk membantu menjawab pertanyaan seputar materi pembelajaran. Anda bisa bertanya dalam bahasa Indonesia atau bahasa daerah, dan ChatBot akan memberikan penjelasan yang mudah dipahami.</p>
            </div>
        </div>
        
        <div class="faq-item">
            <div class="faq-question" onclick="toggleFaq(this)">
                <h3>Apakah ada sertifikat setelah menyelesaikan modul?</h3>
                <i class="fas fa-chevron-down"></i>
            </div>
            <div class="faq-answer">
                <p>Saat ini kami fokus pada penyediaan materi pembelajaran berkualitas. Fitur sertifikat sedang dalam pengembangan dan akan segera hadir untuk memberikan pengakuan atas pencapaian belajar Anda.</p>
            </div>
        </div>
        
        <div class="faq-item">
            <div class="faq-question" onclick="toggleFaq(this)">
                <h3>Bagaimana cara melaporkan masalah atau memberikan saran?</h3>
                <i class="fas fa-chevron-down"></i>
            </div>
            <div class="faq-answer">
                <p>Anda dapat menghubungi tim support kami melalui ChatBot atau email. Kami sangat menghargai feedback untuk terus meningkatkan kualitas platform pembelajaran.</p>
            </div>
        </div>
    </div>
</section>

<style>
.faq {
    padding: 6rem 0;
    background: var(--card-bg);
}

.faq-container {
    max-width: 800px;
    margin: 0 auto;
    padding: 0 1rem;
}

.faq-item {
    background: var(--page-bg);
    border-radius: var(--radius-lg);
    margin-bottom: 1rem;
    box-shadow: var(--shadow-light);
    overflow: hidden;
    transition: all 0.3s ease;
}

.faq-item:hover {
    box-shadow: var(--shadow-soft);
}

.faq-question {
    padding: 1.5rem 2rem;
    cursor: pointer;
    display: flex;
    justify-content: space-between;
    align-items: center;
    transition: all 0.3s ease;
    user-select: none;
}

.faq-question:hover {
    background: rgba(var(--accent-primary-soft-rgb), 0.3);
}

.faq-question h3 {
    font-size: 1.125rem;
    font-weight: 600;
    color: var(--text-main);
    margin: 0;
    flex: 1;
    padding-right: 1rem;
}

.faq-question i {
    color: var(--accent-main);
    font-size: 1rem;
    transition: transform 0.3s ease;
}

.faq-question.active i {
    transform: rotate(180deg);
}

.faq-answer {
    max-height: 0;
    overflow: hidden;
    transition: all 0.3s ease;
    background: var(--card-bg);
}

.faq-answer.active {
    max-height: 200px;
    padding: 0 2rem 1.5rem;
}

.faq-answer p {
    color: var(--text-body);
    line-height: 1.6;
    margin: 0;
    padding-top: 0.5rem;
}

@media (max-width: 768px) {
    .faq {
        padding: 4rem 0;
    }
    
    .faq-question {
        padding: 1.25rem 1.5rem;
    }
    
    .faq-question h3 {
        font-size: 1rem;
        padding-right: 0.75rem;
    }
    
    .faq-answer.active {
        padding: 0 1.5rem 1.25rem;
    }
}
</style>

<script>
function toggleFaq(element) {
    const faqItem = element.parentElement;
    const answer = faqItem.querySelector('.faq-answer');
    const question = faqItem.querySelector('.faq-question');
    
    // Close all other FAQ items
    document.querySelectorAll('.faq-item').forEach(item => {
        if (item !== faqItem) {
            item.querySelector('.faq-answer').classList.remove('active');
            item.querySelector('.faq-question').classList.remove('active');
        }
    });
    
    // Toggle current FAQ item
    answer.classList.toggle('active');
    question.classList.toggle('active');
}
</script>