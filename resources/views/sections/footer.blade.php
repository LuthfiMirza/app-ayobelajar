<footer class="footer">
    <div class="footer-content">
        <div class="footer-brand">
            <div class="logo">
                <i class="fas fa-graduation-cap"></i>
                <span>Ayo Belajar</span>
            </div>
            <p>Platform pendidikan digital yang dirancang khusus untuk membantu siswa dan guru di daerah 3T mengakses pendidikan berkualitas.</p>
        </div>
        
        <div class="footer-links">
            <div class="footer-section">
                <h4>Produk</h4>
                <ul>
                    <li><a href="{{ route('modul') }}">Modul Digital</a></li>
                    <li><a href="{{ route('chatbot') }}">ChatBot Pintar</a></li>
                    <li><a href="{{ route('translator') }}">Penerjemah</a></li>
                    <li><a href="{{ route('panduan') }}">Panduan Penggunaan</a></li>
                </ul>
            </div>
            
            <div class="footer-section">
                <h4>Perusahaan</h4>
                <ul>
                    <li><a href="{{ route('company.about') }}">Tentang Kami</a></li>
                    <li><a href="{{ route('company.team') }}">Tim</a></li>
                    <li><a href="{{ route('company.career') }}">Karir</a></li>
                    <li><a href="{{ route('company.contact') }}">Kontak</a></li>
                </ul>
            </div>
            
            <div class="footer-section">
                <h4>Bantuan</h4>
                <ul>
                    <li><a href="{{ route('help.faq') }}">FAQ</a></li>
                    <li><a href="{{ route('help.support') }}">Dukungan</a></li>
                    <li><a href="{{ route('help.privacy') }}">Kebijakan Privasi</a></li>
                    <li><a href="{{ route('help.terms') }}">Syarat & Ketentuan</a></li>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="footer-bottom">
        <p>&copy; {{ date('Y') }} Ayo Belajar. Hak Cipta Dilindungi.</p>
        <div class="social-links">
            <a href="#" aria-label="Facebook"><i class="fab fa-facebook"></i></a>
            <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
            <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
            <a href="#" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
        </div>
    </div>
</footer>

<style>
.footer {
    background-color: var(--nav-bg);
    padding: 4rem 0 0;
    margin-top: 4rem;
    box-shadow: var(--shadow-soft);
}

.footer-content {
    max-width: 1100px;
    margin: 0 auto;
    padding: 0 1.5rem;
    display: grid;
    grid-template-columns: 2fr 3fr;
    gap: 4rem;
}

.footer-brand {
    max-width: 400px;
}

.footer-brand .logo {
    margin-bottom: 1.5rem;
}

.footer-brand p {
    color: var(--text-body);
    line-height: 1.6;
}

.footer-links {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 2rem;
}

.footer-section h4 {
    color: var(--text-main);
    font-size: 1.125rem;
    font-weight: 700;
    margin-bottom: 1.25rem;
}

.footer-section ul {
    list-style: none;
    padding: 0;
}

.footer-section li {
    margin-bottom: 0.75rem;
}

.footer-section a {
    color: var(--text-body);
    text-decoration: none;
    transition: color 0.3s ease;
}

.footer-section a:hover {
    color: var(--accent-main);
}

.footer-bottom {
    margin-top: 4rem;
    padding: 1.5rem;
    border-top: 1px solid var(--border-soft);
    display: flex;
    justify-content: space-between;
    align-items: center;
    max-width: 1100px;
    margin-left: auto;
    margin-right: auto;
}

.footer-bottom p {
    color: var(--text-light);
}

.social-links {
    display: flex;
    gap: 1rem;
}

.social-links a {
    color: var(--text-light);
    font-size: 1.25rem;
    transition: color 0.3s ease;
}

.social-links a:hover {
    color: var(--accent-main);
}

@media (max-width: 992px) {
    .footer-content {
        grid-template-columns: 1fr;
        gap: 3rem;
    }

    .footer-brand {
        max-width: 100%;
        text-align: center;
    }

    .footer-brand .logo {
        justify-content: center;
    }
}

@media (max-width: 768px) {
    .footer {
        padding-top: 3rem;
        margin-top: 3rem;
    }

    .footer-links {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 576px) {
    .footer-links {
        grid-template-columns: 1fr;
        text-align: center;
    }

    .footer-bottom {
        flex-direction: column;
        gap: 1rem;
        text-align: center;
    }
}
</style>