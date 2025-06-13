@extends('layouts.auth')

@section('title', 'Masuk')

@section('content')
<style>
    :root {
        --edu-primary: #6366f1;
        --edu-secondary: #8b5cf6;
        --edu-accent: #06b6d4;
        --edu-success: #10b981;
        --edu-warning: #f59e0b;
        --edu-danger: #ef4444;
        --edu-dark: #1f2937;
        --edu-light: #f8fafc;
        --edu-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        --edu-gradient-alt: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        --shadow-3d: 0 20px 40px rgba(0, 0, 0, 0.1), 0 10px 20px rgba(0, 0, 0, 0.05);
        --shadow-hover: 0 30px 60px rgba(0, 0, 0, 0.15), 0 15px 30px rgba(0, 0, 0, 0.1);
    }

    .login-container {
        min-height: 100vh;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        position: relative;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 2rem 1rem;
    }

    /* 3D Educational Background Elements */
    .login-container::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: 
            radial-gradient(circle at 30% 70%, rgba(255, 119, 198, 0.3) 0%, transparent 50%),
            radial-gradient(circle at 70% 30%, rgba(120, 219, 255, 0.3) 0%, transparent 50%),
            radial-gradient(circle at 50% 50%, rgba(120, 119, 198, 0.2) 0%, transparent 50%);
        animation: float 25s ease-in-out infinite;
    }

    .floating-elements {
        position: absolute;
        width: 100%;
        height: 100%;
        pointer-events: none;
        overflow: hidden;
    }

    .floating-apple, .floating-lightbulb, .floating-rocket, .floating-star {
        position: absolute;
        font-size: 2.5rem;
        opacity: 0.15;
        animation: floatAround 20s ease-in-out infinite;
    }

    .floating-apple {
        top: 15%;
        left: 15%;
        animation-delay: 0s;
        color: #ef4444;
    }

    .floating-lightbulb {
        top: 25%;
        right: 20%;
        animation-delay: 5s;
        color: #fbbf24;
    }

    .floating-rocket {
        bottom: 25%;
        left: 20%;
        animation-delay: 10s;
        color: #06b6d4;
    }

    .floating-star {
        bottom: 20%;
        right: 15%;
        animation-delay: 15s;
        color: #f472b6;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0px) rotate(0deg); }
        50% { transform: translateY(-40px) rotate(180deg); }
    }

    @keyframes floatAround {
        0%, 100% { transform: translateY(0px) translateX(0px) rotate(0deg) scale(1); }
        25% { transform: translateY(-30px) translateX(15px) rotate(90deg) scale(1.1); }
        50% { transform: translateY(-15px) translateX(-15px) rotate(180deg) scale(0.9); }
        75% { transform: translateY(-40px) translateX(10px) rotate(270deg) scale(1.05); }
    }

    /* Main Login Card */
    .login-card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        border-radius: 28px;
        box-shadow: var(--shadow-3d);
        padding: 3.5rem 3rem;
        width: 100%;
        max-width: 450px;
        position: relative;
        z-index: 10;
        border: 1px solid rgba(255, 255, 255, 0.3);
        transform: perspective(1000px) rotateX(5deg);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .login-card:hover {
        transform: perspective(1000px) rotateX(0deg) translateY(-15px);
        box-shadow: var(--shadow-hover);
    }

    /* Header Section */
    .login-header {
        text-align: center;
        margin-bottom: 3rem;
        position: relative;
    }

    .welcome-icon {
        width: 90px;
        height: 90px;
        background: var(--edu-gradient);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 2rem;
        font-size: 3rem;
        color: white;
        box-shadow: 0 15px 35px rgba(102, 102, 241, 0.4);
        animation: pulse 3s ease-in-out infinite;
        position: relative;
    }

    .welcome-icon::before {
        content: '';
        position: absolute;
        top: -5px;
        left: -5px;
        right: -5px;
        bottom: -5px;
        background: var(--edu-gradient-alt);
        border-radius: 50%;
        z-index: -1;
        opacity: 0.3;
        animation: rotate 10s linear infinite;
    }

    @keyframes pulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.08); }
    }

    @keyframes rotate {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }

    .login-title {
        font-size: 2.5rem;
        font-weight: 800;
        background: var(--edu-gradient);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 0.75rem;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .login-subtitle {
        color: #64748b;
        font-size: 1.1rem;
        font-weight: 600;
        opacity: 0.8;
        margin-bottom: 0.5rem;
    }

    .login-description {
        color: #94a3b8;
        font-size: 0.9rem;
        font-weight: 500;
    }

    /* Form Styling */
    .form-group {
        margin-bottom: 2rem;
        position: relative;
    }

    .form-label {
        display: block;
        color: var(--edu-dark);
        font-weight: 700;
        margin-bottom: 0.75rem;
        font-size: 1rem;
        letter-spacing: 0.025em;
        position: relative;
        padding-left: 1.5rem;
    }

    .form-label::before {
        content: '';
        position: absolute;
        left: 0;
        top: 50%;
        transform: translateY(-50%);
        width: 6px;
        height: 6px;
        background: var(--edu-primary);
        border-radius: 50%;
        box-shadow: 0 0 10px rgba(99, 102, 241, 0.5);
    }

    .form-input {
        width: 100%;
        padding: 1.25rem 1.5rem;
        border: 2px solid #e2e8f0;
        border-radius: 18px;
        font-size: 1rem;
        font-family: inherit;
        background: rgba(255, 255, 255, 0.9);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        color: var(--edu-dark);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.05);
        position: relative;
    }

    .form-input:focus {
        outline: none;
        border-color: var(--edu-primary);
        background: white;
        box-shadow: 
            0 0 0 4px rgba(99, 102, 241, 0.15),
            0 12px 30px rgba(99, 102, 241, 0.2);
        transform: translateY(-3px);
    }

    .form-input:hover {
        border-color: #cbd5e1;
        background: white;
        transform: translateY(-1px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.08);
    }

    /* Remember Me & Forgot Password */
    .form-options {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
        flex-wrap: wrap;
        gap: 1rem;
    }

    .remember-me {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        color: #64748b;
        font-weight: 600;
        font-size: 0.9rem;
    }

    .remember-checkbox {
        width: 18px;
        height: 18px;
        border: 2px solid #cbd5e1;
        border-radius: 6px;
        background: white;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .remember-checkbox:checked {
        background: var(--edu-primary);
        border-color: var(--edu-primary);
    }

    .forgot-password {
        color: var(--edu-primary);
        text-decoration: none;
        font-weight: 600;
        font-size: 0.9rem;
        transition: all 0.3s ease;
        padding: 0.25rem 0.5rem;
        border-radius: 8px;
    }

    .forgot-password:hover {
        background: rgba(99, 102, 241, 0.1);
        color: var(--edu-secondary);
    }

    /* Error Messages */
    .error-message {
        color: var(--edu-danger);
        font-size: 0.85rem;
        margin-top: 0.75rem;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.75rem 1rem;
        background: rgba(239, 68, 68, 0.1);
        border-radius: 12px;
        border-left: 4px solid var(--edu-danger);
        animation: slideIn 0.3s ease;
    }

    @keyframes slideIn {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .error-message::before {
        content: '⚠️';
        font-size: 1rem;
    }

    /* Login Button */
    .login-button {
        width: 100%;
        background: var(--edu-gradient);
        color: white;
        border: none;
        padding: 1.5rem 2rem;
        border-radius: 18px;
        font-size: 1.2rem;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        text-transform: uppercase;
        letter-spacing: 0.05em;
        position: relative;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(99, 102, 241, 0.4);
        margin-bottom: 1.5rem;
    }

    .login-button::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
        transition: left 0.7s;
    }

    .login-button:hover {
        transform: translateY(-4px);
        box-shadow: 0 20px 40px rgba(99, 102, 241, 0.5);
    }

    .login-button:hover::before {
        left: 100%;
    }

    .login-button:active {
        transform: translateY(-2px);
    }

    /* Register Link */
    .register-link {
        text-align: center;
        margin-top: 2rem;
        padding-top: 2rem;
        border-top: 2px solid #e2e8f0;
        position: relative;
    }

    .register-link::before {
        content: '✨';
        position: absolute;
        top: -18px;
        left: 50%;
        transform: translateX(-50%);
        background: white;
        padding: 0 1.5rem;
        font-size: 1.8rem;
    }

    .register-link-text {
        color: #64748b;
        font-size: 1rem;
        font-weight: 600;
        margin-bottom: 1rem;
    }

    .register-link a {
        color: var(--edu-primary);
        text-decoration: none;
        font-weight: 700;
        transition: all 0.3s ease;
        position: relative;
        padding: 0.75rem 1.5rem;
        border-radius: 12px;
        background: rgba(99, 102, 241, 0.1);
        display: inline-block;
        border: 2px solid transparent;
    }

    .register-link a:hover {
        background: var(--edu-primary);
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(99, 102, 241, 0.3);
        border-color: var(--edu-primary);
    }

    /* Responsive Design */
    @media (max-width: 640px) {
        .login-container {
            padding: 1rem;
        }

        .login-card {
            padding: 2.5rem 2rem;
            transform: none;
            border-radius: 24px;
        }

        .login-card:hover {
            transform: translateY(-8px);
        }

        .login-title {
            font-size: 2rem;
        }

        .welcome-icon {
            width: 70px;
            height: 70px;
            font-size: 2.5rem;
        }

        .form-options {
            flex-direction: column;
            align-items: flex-start;
        }

        .floating-apple, .floating-lightbulb, .floating-rocket, .floating-star {
            font-size: 2rem;
        }
    }

    @media (max-width: 480px) {
        .login-title {
            font-size: 1.8rem;
        }

        .login-subtitle {
            font-size: 1rem;
        }

        .form-input {
            padding: 1rem 1.25rem;
        }

        .login-button {
            padding: 1.25rem 1.5rem;
            font-size: 1.1rem;
        }
    }
</style>

<div class="login-container">
    <!-- Floating Educational Elements -->
    <div class="floating-elements">
        <div class="floating-apple">🍎</div>
        <div class="floating-lightbulb">💡</div>
        <div class="floating-rocket">🚀</div>
        <div class="floating-star">⭐</div>
    </div>

    <div class="login-card">
        <div class="login-header">
            <div class="welcome-icon">
                🎯
            </div>
            <h2 class="login-title">Selamat Datang</h2>
            <p class="login-subtitle">Masuk ke Ayo Belajar</p>
            <p class="login-description">Lanjutkan perjalanan belajar Anda</p>
        </div>
        
        <form method="POST" action="{{ route('login') }}">
            @csrf
            
            <div class="form-group">
                <label class="form-label">Alamat Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required autofocus class="form-input" placeholder="Masukkan email Anda">
                @error('email')<div class="error-message">{{ $message }}</div>@enderror
            </div>
            
            <div class="form-group">
                <label class="form-label">Kata Sandi</label>
                <input type="password" name="password" required class="form-input" placeholder="Masukkan kata sandi">
                @error('password')<div class="error-message">{{ $message }}</div>@enderror
            </div>
            
            <div class="form-options">
                <label class="remember-me">
                    <input type="checkbox" name="remember" class="remember-checkbox">
                    Ingat saya
                </label>
                {{-- <a href="#" class="forgot-password">Lupa kata sandi?</a> --}}
            </div>
            
            <button type="submit" class="login-button">
                🔓 Masuk Sekarang
            </button>
        </form>
        
        <div class="register-link">
            <p class="register-link-text">
                Belum memiliki akun?
            </p>
            <a href="{{ route('register') }}">Daftar Sekarang</a>
        </div>
    </div>
</div>
@endsection