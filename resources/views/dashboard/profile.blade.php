@extends('layouts.app')

@section('content')
<style>
    .profile-container {
        max-width: 800px;
        margin: 0 auto;
        padding: 2rem 1rem;
    }

    .profile-header {
        background: linear-gradient(135deg, var(--accent-main) 0%, var(--accent-main-light) 100%);
        border-radius: var(--radius-xl);
        padding: 2rem;
        margin-bottom: 2rem;
        color: white;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .profile-header::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
        animation: profileFloat 8s ease-in-out infinite;
    }

    @keyframes profileFloat {
        0%, 100% { transform: translateY(0px) rotate(0deg); }
        50% { transform: translateY(-15px) rotate(180deg); }
    }

    .profile-avatar {
        width: 5rem;
        height: 5rem;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        margin: 0 auto 1rem;
        border: 3px solid rgba(255, 255, 255, 0.3);
        position: relative;
        z-index: 2;
    }

    .profile-title {
        font-size: 1.75rem;
        font-weight: 800;
        margin-bottom: 0.5rem;
        position: relative;
        z-index: 2;
    }

    .profile-subtitle {
        font-size: 1rem;
        opacity: 0.9;
        position: relative;
        z-index: 2;
    }

    .profile-form-card {
        background: var(--card-bg);
        border-radius: var(--radius-xl);
        padding: 2rem;
        box-shadow: var(--shadow-soft);
        border: 1px solid var(--border-soft);
        position: relative;
    }

    .form-section {
        margin-bottom: 2rem;
    }

    .section-title {
        font-size: 1.125rem;
        font-weight: 700;
        color: var(--text-main);
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .section-icon {
        width: 1.5rem;
        height: 1.5rem;
        background: var(--accent-primary-soft);
        color: var(--accent-main);
        border-radius: var(--radius-sm);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.75rem;
    }

    .form-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1.5rem;
    }

    .form-group {
        position: relative;
    }

    .form-label {
        display: block;
        font-weight: 600;
        color: var(--text-main);
        margin-bottom: 0.5rem;
        font-size: 0.875rem;
    }

    .form-input, .form-select {
        width: 100%;
        padding: 0.875rem 1rem;
        border: 2px solid var(--border-soft);
        border-radius: var(--radius-md);
        font-size: 0.875rem;
        transition: all 0.3s ease;
        background: var(--card-bg);
        color: var(--text-main);
    }

    .form-input:focus, .form-select:focus {
        outline: none;
        border-color: var(--accent-main);
        box-shadow: 0 0 0 3px rgba(120, 87, 193, 0.1);
        transform: translateY(-1px);
    }

    .form-input:hover, .form-select:hover {
        border-color: var(--accent-main-light);
    }

    .form-error {
        color: #ef4444;
        font-size: 0.75rem;
        margin-top: 0.25rem;
        display: flex;
        align-items: center;
        gap: 0.25rem;
    }

    .submit-btn {
        width: 100%;
        background: linear-gradient(135deg, var(--accent-main) 0%, var(--accent-main-light) 100%);
        color: white;
        border: none;
        padding: 1rem 2rem;
        border-radius: var(--radius-md);
        font-weight: 700;
        font-size: 1rem;
        cursor: pointer;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .submit-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(120, 87, 193, 0.3);
    }

    .submit-btn:active {
        transform: translateY(0);
    }

    .submit-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
        transition: left 0.5s;
    }

    .submit-btn:hover::before {
        left: 100%;
    }

    .back-btn {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.75rem 1.5rem;
        background: rgba(120, 87, 193, 0.1);
        color: var(--accent-main);
        text-decoration: none;
        border-radius: var(--radius-pill);
        font-weight: 600;
        font-size: 0.875rem;
        transition: all 0.3s ease;
        margin-bottom: 1rem;
    }

    .back-btn:hover {
        background: var(--accent-main);
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(120, 87, 193, 0.3);
    }

    .required-indicator {
        color: #ef4444;
        margin-left: 0.25rem;
    }

    @media (max-width: 768px) {
        .profile-container {
            padding: 1rem;
        }

        .profile-header {
            padding: 1.5rem;
        }

        .profile-form-card {
            padding: 1.5rem;
        }

        .form-grid {
            grid-template-columns: 1fr;
            gap: 1rem;
        }

        .profile-avatar {
            width: 4rem;
            height: 4rem;
            font-size: 1.5rem;
        }

        .profile-title {
            font-size: 1.5rem;
        }
    }
</style>

<div class="profile-container">
    <!-- Back Button -->
    <a href="{{ route('dashboard') }}" class="back-btn">
        <i class="fas fa-arrow-left"></i> Kembali ke Dashboard
    </a>

    <!-- Profile Header -->
    <div class="profile-header">
        <div class="profile-avatar">
            <i class="fas fa-user"></i>
        </div>
        <h1 class="profile-title">Profil Saya</h1>
        <p class="profile-subtitle">Kelola informasi pribadi dan preferensi akun Anda</p>
    </div>

    <!-- Profile Form -->
    <div class="profile-form-card">
        <form method="POST" action="{{ route('dashboard.profile.update') }}">
            @csrf
            
            <!-- Personal Information Section -->
            <div class="form-section">
                <h2 class="section-title">
                    <div class="section-icon">
                        <i class="fas fa-user"></i>
                    </div>
                    Informasi Pribadi
                </h2>
                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label">
                            Nama Lengkap <span class="required-indicator">*</span>
                        </label>
                        <input type="text" name="name" value="{{ old('name', $user->name) }}" required class="form-input" placeholder="Masukkan nama lengkap">
                        @error('name')
                            <div class="form-error">
                                <i class="fas fa-exclamation-circle"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">
                            Email <span class="required-indicator">*</span>
                        </label>
                        <input type="email" name="email" value="{{ old('email', $user->email) }}" required class="form-input" placeholder="contoh@email.com">
                        @error('email')
                            <div class="form-error">
                                <i class="fas fa-exclamation-circle"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Contact Information Section -->
            <div class="form-section">
                <h2 class="section-title">
                    <div class="section-icon">
                        <i class="fas fa-phone"></i>
                    </div>
                    Informasi Kontak
                </h2>
                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label">No. HP</label>
                        <input type="text" name="phone" value="{{ old('phone', $user->phone) }}" class="form-input" placeholder="08xxxxxxxxxx">
                        @error('phone')
                            <div class="form-error">
                                <i class="fas fa-exclamation-circle"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Wilayah/Daerah</label>
                        <input type="text" name="region" value="{{ old('region', $user->region) }}" class="form-input" placeholder="Kota/Kabupaten">
                        @error('region')
                            <div class="form-error">
                                <i class="fas fa-exclamation-circle"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Educational Information Section -->
            <div class="form-section">
                <h2 class="section-title">
                    <div class="section-icon">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    Informasi Pendidikan
                </h2>
                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label">Asal Sekolah/Institusi</label>
                        <input type="text" name="school" value="{{ old('school', $user->school) }}" class="form-input" placeholder="Nama sekolah atau institusi">
                        @error('school')
                            <div class="form-error">
                                <i class="fas fa-exclamation-circle"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Tingkat Pendidikan</label>
                        <select name="level" class="form-select">
                            <option value="">Pilih tingkat pendidikan</option>
                            <option value="SD" {{ old('level', $user->level) == 'SD' ? 'selected' : '' }}>SD (Sekolah Dasar)</option>
                            <option value="SMP" {{ old('level', $user->level) == 'SMP' ? 'selected' : '' }}>SMP (Sekolah Menengah Pertama)</option>
                            <option value="SMA" {{ old('level', $user->level) == 'SMA' ? 'selected' : '' }}>SMA (Sekolah Menengah Atas)</option>
                            <option value="Guru" {{ old('level', $user->level) == 'Guru' ? 'selected' : '' }}>Guru/Pendidik</option>
                            <option value="Umum" {{ old('level', $user->level) == 'Umum' ? 'selected' : '' }}>Umum</option>
                        </select>
                        @error('level')
                            <div class="form-error">
                                <i class="fas fa-exclamation-circle"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="submit-btn">
                <i class="fas fa-save" style="margin-right: 0.5rem;"></i>
                Simpan Perubahan
            </button>
        </form>
    </div>
</div>
@endsection
