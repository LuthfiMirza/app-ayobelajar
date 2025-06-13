@extends('layouts.auth')

@section('title', 'Daftar Akun')

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
        --edu-gradient-light: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);
        --shadow-3d: 0 20px 40px rgba(0, 0, 0, 0.1), 0 10px 20px rgba(0, 0, 0, 0.05);
        --shadow-hover: 0 30px 60px rgba(0, 0, 0, 0.15), 0 15px 30px rgba(0, 0, 0, 0.1);
    }

    .register-container {
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
    .register-container::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: 
            radial-gradient(circle at 20% 80%, rgba(120, 119, 198, 0.3) 0%, transparent 50%),
            radial-gradient(circle at 80% 20%, rgba(255, 119, 198, 0.3) 0%, transparent 50%),
            radial-gradient(circle at 40% 40%, rgba(120, 219, 255, 0.3) 0%, transparent 50%);
        animation: float 20s ease-in-out infinite;
    }

    .floating-elements {
        position: absolute;
        width: 100%;
        height: 100%;
        pointer-events: none;
        overflow: hidden;
    }

    .floating-book, .floating-pencil, .floating-calculator, .floating-globe {
        position: absolute;
        font-size: 2rem;
        opacity: 0.1;
        animation: floatAround 15s ease-in-out infinite;
    }

    .floating-book {
        top: 10%;
        left: 10%;
        animation-delay: 0s;
        color: #fbbf24;
    }

    .floating-pencil {
        top: 20%;
        right: 15%;
        animation-delay: 3s;
        color: #34d399;
    }

    .floating-calculator {
        bottom: 20%;
        left: 15%;
        animation-delay: 6s;
        color: #60a5fa;
    }

    .floating-globe {
        bottom: 15%;
        right: 10%;
        animation-delay: 9s;
        color: #f472b6;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0px) rotate(0deg); }
        50% { transform: translateY(-30px) rotate(180deg); }
    }

    @keyframes floatAround {
        0%, 100% { transform: translateY(0px) translateX(0px) rotate(0deg); }
        25% { transform: translateY(-20px) translateX(10px) rotate(90deg); }
        50% { transform: translateY(-10px) translateX(-10px) rotate(180deg); }
        75% { transform: translateY(-30px) translateX(5px) rotate(270deg); }
    }

    /* Main Card */
    .register-card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        border-radius: 24px;
        box-shadow: var(--shadow-3d);
        padding: 3rem 2.5rem;
        width: 100%;
        max-width: 500px;
        position: relative;
        z-index: 10;
        border: 1px solid rgba(255, 255, 255, 0.3);
        transform: perspective(1000px) rotateX(5deg);
        transition: all 0.3s ease;
    }

    .register-card:hover {
        transform: perspective(1000px) rotateX(0deg) translateY(-10px);
        box-shadow: var(--shadow-hover);
    }

    /* Header Section */
    .register-header {
        text-align: center;
        margin-bottom: 2.5rem;
        position: relative;
    }

    .edu-icon {
        width: 80px;
        height: 80px;
        background: var(--edu-gradient);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
        font-size: 2.5rem;
        color: white;
        box-shadow: 0 10px 30px rgba(102, 102, 241, 0.3);
        animation: pulse 2s ease-in-out infinite;
    }

    @keyframes pulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.05); }
    }

    .register-title {
        font-size: 2.2rem;
        font-weight: 800;
        background: var(--edu-gradient);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 0.5rem;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .register-subtitle {
        color: #64748b;
        font-size: 1rem;
        font-weight: 600;
        opacity: 0.8;
    }

    /* Form Styling */
    .form-group {
        margin-bottom: 1.5rem;
        position: relative;
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
    }

    .form-label {
        display: block;
        color: var(--edu-dark);
        font-weight: 700;
        margin-bottom: 0.75rem;
        font-size: 0.9rem;
        letter-spacing: 0.025em;
        position: relative;
    }

    .form-label::before {
        content: '';
        position: absolute;
        left: -15px;
        top: 50%;
        transform: translateY(-50%);
        width: 4px;
        height: 4px;
        background: var(--edu-primary);
        border-radius: 50%;
    }

    .form-input, .form-select {
        width: 100%;
        padding: 1rem 1.25rem;
        border: 2px solid #e2e8f0;
        border-radius: 16px;
        font-size: 0.95rem;
        font-family: inherit;
        background: rgba(255, 255, 255, 0.8);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        color: var(--edu-dark);
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
    }

    .form-input:focus, .form-select:focus {
        outline: none;
        border-color: var(--edu-primary);
        background: white;
        box-shadow: 
            0 0 0 4px rgba(99, 102, 241, 0.1),
            0 8px 25px rgba(99, 102, 241, 0.15);
        transform: translateY(-2px);
    }

    .form-input:hover, .form-select:hover {
        border-color: #cbd5e1;
        background: white;
        transform: translateY(-1px);
    }

    .form-select {
        cursor: pointer;
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236366f1' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m6 8 4 4 4-4'/%3e%3c/svg%3e");
        background-position: right 1rem center;
        background-repeat: no-repeat;
        background-size: 1.5em 1.5em;
        padding-right: 3rem;
    }

    /* Error Messages */
    .error-message {
        color: var(--edu-danger);
        font-size: 0.8rem;
        margin-top: 0.5rem;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 0.75rem;
        background: rgba(239, 68, 68, 0.1);
        border-radius: 8px;
        border-left: 3px solid var(--edu-danger);
    }

    .error-message::before {
        content: '⚠️';
        font-size: 0.9rem;
    }

    /* Submit Button */
    .register-button {
        width: 100%;
        background: var(--edu-gradient);
        color: white;
        border: none;
        padding: 1.25rem 2rem;
        border-radius: 16px;
        font-size: 1.1rem;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        text-transform: uppercase;
        letter-spacing: 0.05em;
        position: relative;
        overflow: hidden;
        box-shadow: 0 8px 25px rgba(99, 102, 241, 0.3);
        margin-top: 1rem;
    }

    .register-button::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
        transition: left 0.6s;
    }

    .register-button:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 35px rgba(99, 102, 241, 0.4);
    }

    .register-button:hover::before {
        left: 100%;
    }

    .register-button:active {
        transform: translateY(-1px);
    }

    /* Login Link */
    .login-link {
        text-align: center;
        margin-top: 2rem;
        padding-top: 2rem;
        border-top: 2px solid #e2e8f0;
        position: relative;
    }

    .login-link::before {
        content: '🎓';
        position: absolute;
        top: -15px;
        left: 50%;
        transform: translateX(-50%);
        background: white;
        padding: 0 1rem;
        font-size: 1.5rem;
    }

    .login-link-text {
        color: #64748b;
        font-size: 0.95rem;
        font-weight: 600;
    }

    .login-link a {
        color: var(--edu-primary);
        text-decoration: none;
        font-weight: 700;
        transition: all 0.3s ease;
        position: relative;
        padding: 0.25rem 0.5rem;
        border-radius: 8px;
    }

    .login-link a:hover {
        background: rgba(99, 102, 241, 0.1);
        color: var(--edu-secondary);
        transform: translateY(-1px);
    }

    /* Responsive Design */
    @media (max-width: 640px) {
        .register-container {
            padding: 1rem;
        }

        .register-card {
            padding: 2rem 1.5rem;
            transform: none;
            border-radius: 20px;
        }

        .register-card:hover {
            transform: translateY(-5px);
        }

        .form-row {
            grid-template-columns: 1fr;
            gap: 0;
        }

        .register-title {
            font-size: 1.8rem;
        }

        .edu-icon {
            width: 60px;
            height: 60px;
            font-size: 2rem;
        }

        .floating-book, .floating-pencil, .floating-calculator, .floating-globe {
            font-size: 1.5rem;
        }
    }

    @media (max-width: 480px) {
        .register-title {
            font-size: 1.6rem;
        }

        .form-input, .form-select {
            padding: 0.875rem 1rem;
        }

        .register-button {
            padding: 1rem 1.5rem;
            font-size: 1rem;
        }
    }
</style>

<div class="register-container">
    <!-- Floating Educational Elements -->
    <div class="floating-elements">
        <div class="floating-book">📚</div>
        <div class="floating-pencil">✏️</div>
        <div class="floating-calculator">🧮</div>
        <div class="floating-globe">🌍</div>
    </div>

    <div class="register-card">
        <div class="register-header">
            <div class="edu-icon">
                🎓
            </div>
            <h2 class="register-title">Bergabung Bersama Kami</h2>
            <p class="register-subtitle">Mulai perjalanan belajar yang menyenangkan</p>
        </div>
        
        <form method="POST" action="{{ route('register') }}">
            @csrf
            
            <div class="form-group">
                <label class="form-label">Nama Lengkap</label>
                <input type="text" name="name" value="{{ old('name') }}" required autofocus class="form-input" placeholder="Masukkan nama lengkap Anda">
                @error('name')<div class="error-message">{{ $message }}</div>@enderror
            </div>
            
            <div class="form-group">
                <label class="form-label">Alamat Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required class="form-input" placeholder="contoh@email.com">
                @error('email')<div class="error-message">{{ $message }}</div>@enderror
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Nomor HP</label>
                    <input type="text" name="phone" value="{{ old('phone') }}" class="form-input" placeholder="08xxxxxxxxxx">
                    @error('phone')<div class="error-message">{{ $message }}</div>@enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Asal Sekolah</label>
                    <input type="text" name="school" value="{{ old('school') }}" class="form-input" placeholder="Nama sekolah">
                    @error('school')<div class="error-message">{{ $message }}</div>@enderror
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Tingkat Pendidikan</label>
                    <select name="level" class="form-select">
                        <option value="">Pilih Tingkat</option>
                        <option value="SD" {{ old('level')=='SD' ? 'selected' : '' }}>🎒 SD (Sekolah Dasar)</option>
                        <option value="SMP" {{ old('level')=='SMP' ? 'selected' : '' }}>📖 SMP (Sekolah Menengah Pertama)</option>
                        <option value="SMA" {{ old('level')=='SMA' ? 'selected' : '' }}>🎓 SMA (Sekolah Menengah Atas)</option>
                        <option value="Guru" {{ old('level')=='Guru' ? 'selected' : '' }}>👨‍🏫 Guru</option>
                        <option value="Umum" {{ old('level')=='Umum' ? 'selected' : '' }}>👥 Umum</option>
                    </select>
                    @error('level')<div class="error-message">{{ $message }}</div>@enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Wilayah/Daerah</label>
                    <input type="text" name="region" value="{{ old('region') }}" class="form-input" placeholder="Kota/Kabupaten">
                    @error('region')<div class="error-message">{{ $message }}</div>@enderror
                </div>
            </div>
            
            <div class="form-group">
                <label class="form-label">Kata Sandi</label>
                <input type="password" name="password" required class="form-input" placeholder="Minimal 8 karakter">
                @error('password')<div class="error-message">{{ $message }}</div>@enderror
            </div>
            
            <div class="form-group">
                <label class="form-label">Konfirmasi Kata Sandi</label>
                <input type="password" name="password_confirmation" required class="form-input" placeholder="Ulangi kata sandi">
            </div>
            
            <button type="submit" class="register-button">
                🚀 Daftar Sekarang
            </button>
        </form>
        
        <div class="login-link">
            <p class="login-link-text">
                Sudah memiliki akun? <a href="{{ route('login') }}">Masuk di sini</a>
            </p>
        </div>
    </div>
</div>
@endsection