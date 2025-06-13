<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Ayo Belajar - Pendidikan Digital untuk Daerah 3T</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --page-bg: #F5F3FF;
            --card-bg: #FFFFFF;
            --nav-bg: #FFFFFF;
            --nav-text: #4A4A68;
            --nav-active-bg: #E6D9FF;
            --nav-active-text: #3B325F;
            --nav-hover-bg: #F0EBFF;

            --accent-main: #7857C1;
            --accent-main-light: #A094E0;
            --accent-primary-soft: #E6D9FF;
            --accent-primary-soft-rgb: 230, 217, 255;
            --accent-secondary-soft: #FFDFD3;

            --warning-soft: #FFDDAA;
            --success-soft: #AEE9D0;

            --text-main: #3B325F;
            --text-body: #4A4A68;
            --text-light: #7B7B9A;
            --text-on-dark-accent: #FFFFFF;
            --text-on-light-accent: #3B325F;

            --border-ui: #D0C9F0;
            --border-soft: #E8E6F1;

            --shadow-soft: 0 8px 24px rgba(100, 100, 150, 0.12);
            --shadow-light: 0 4px 12px rgba(100, 100, 150, 0.08);

            --radius-sm: 8px;
            --radius-md: 12px;
            --radius-lg: 16px;
            --radius-xl: 24px;
            --radius-pill: 50px;
            --font-primary: 'Nunito Sans', sans-serif;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: var(--font-primary);
            background-color: var(--page-bg);
            color: var(--text-body);
            line-height: 1.6;
            overflow-x: hidden;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
            padding: 0 2rem;
        }
        header .container {
            max-width: 100vw;
            padding-left: 1.5rem;
            padding-right: 1.5rem;
        }

        header {
            background-color: var(--nav-bg);
            padding: 1rem 0;
            box-shadow: var(--shadow-light);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        header .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-size: 1.6rem;
            font-weight: 800;
            color: var(--accent-main);
        }

        .logo i {
            font-size: 1.8rem;
            color: var(--accent-secondary-soft);
        }

        nav ul {
            list-style: none;
            display: flex;
            gap: 0.5rem;
        }

        nav a {
            text-decoration: none;
            color: var(--nav-text);
            padding: 0.6rem 1.2rem;
            border-radius: var(--radius-pill);
            font-weight: 600;
            transition: background-color 0.3s ease, color 0.3s ease;
            display: block;
        }

        nav a:hover {
            background-color: var(--nav-hover-bg);
            color: var(--accent-main);
        }

        nav a.active {
            background-color: var(--nav-active-bg);
            color: var(--nav-active-text);
            font-weight: 700;
        }

        .menu-toggle {
            display: none;
            font-size: 1.5rem;
            color: var(--accent-main);
            background: none;
            border: none;
            cursor: pointer;
        }

        /* User Dropdown Styles */
        .user-dropdown {
            position: relative;
            min-width: 140px;
        }

        .user-dropdown-trigger {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.6rem 1.2rem;
            border-radius: var(--radius-pill);
            font-weight: 600;
            color: var(--nav-text);
            text-decoration: none;
            transition: all 0.3s ease;
            cursor: pointer;
            background: var(--nav-hover-bg);
            border: 2px solid transparent;
        }

        .user-dropdown-trigger:hover {
            background: var(--accent-primary-soft);
            color: var(--accent-main);
            border-color: var(--accent-main);
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(120, 87, 193, 0.15);
        }

        .user-avatar {
            width: 2rem;
            height: 2rem;
            background: var(--accent-main);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.875rem;
            font-weight: 700;
        }

        .user-name {
            font-weight: 600;
            color: var(--text-main);
        }

        .dropdown-arrow {
            font-size: 0.75rem;
            transition: transform 0.3s ease;
        }

        .user-dropdown:hover .dropdown-arrow {
            transform: rotate(180deg);
        }

        .user-dropdown-menu {
            position: absolute;
            top: calc(100% + 0.5rem);
            right: 0;
            background: var(--card-bg);
            border-radius: var(--radius-lg);
            box-shadow: 0 10px 40px rgba(120, 87, 193, 0.15);
            border: 1px solid var(--border-soft);
            min-width: 220px;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.3s ease;
            z-index: 1000;
            overflow: hidden;
        }

        .user-dropdown:hover .user-dropdown-menu {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .dropdown-header {
            padding: 1rem;
            background: linear-gradient(135deg, var(--accent-main) 0%, var(--accent-main-light) 100%);
            color: white;
            text-align: center;
            border-bottom: 1px solid var(--border-soft);
        }

        .dropdown-user-info {
            font-size: 0.875rem;
            font-weight: 600;
            margin-bottom: 0.25rem;
        }

        .dropdown-user-email {
            font-size: 0.75rem;
            opacity: 0.9;
        }

        .dropdown-menu-items {
            padding: 0.5rem 0;
        }

        .dropdown-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem 1rem;
            color: var(--text-body);
            text-decoration: none;
            font-size: 0.875rem;
            font-weight: 500;
            transition: all 0.3s ease;
            border: none;
            background: none;
            width: 100%;
            text-align: left;
            cursor: pointer;
        }

        .dropdown-item:hover {
            background: var(--accent-primary-soft);
            color: var(--accent-main);
            transform: translateX(4px);
        }

        .dropdown-item.logout-item:hover {
            background: #fee2e2;
            color: #dc2626;
        }

        .dropdown-item-icon {
            width: 1.25rem;
            height: 1.25rem;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: var(--radius-sm);
            font-size: 0.75rem;
        }

        .dropdown-item-icon.dashboard-icon {
            background: rgba(120, 87, 193, 0.1);
            color: var(--accent-main);
        }

        .dropdown-item-icon.profile-icon {
            background: rgba(59, 130, 246, 0.1);
            color: #3b82f6;
        }

        .dropdown-item-icon.logout-icon {
            background: rgba(239, 68, 68, 0.1);
            color: #ef4444;
        }

        .dropdown-divider {
            height: 1px;
            background: var(--border-soft);
            margin: 0.5rem 0;
        }

        main {
            flex: 1;
            padding: 2rem 0;
        }

        .alert {
            padding: 1rem 1.5rem;
            border-radius: var(--radius-md);
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-weight: 600;
            animation: slideIn 0.3s ease-out;
        }

        .alert-success {
            background: var(--success-soft);
            color: #2d5a3d;
            border-left: 4px solid #4CAF50;
        }

        .alert-error {
            background: #ffebee;
            color: #c62828;
            border-left: 4px solid #f44336;
        }

        .alert-info {
            background: #e3f2fd;
            color: #1565c0;
            border-left: 4px solid #2196f3;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 768px) {
            .logo span {
                display: none;
            }

            .logo i {
                margin-right: 0;
            }

            nav ul {
                display: none;
                flex-direction: column;
                width: 100%;
                position: absolute;
                top: 100%;
                left: 0;
                background-color: var(--nav-bg);
                box-shadow: var(--shadow-light);
                padding: 1rem 0;
            }

            nav ul.active {
                display: flex;
            }

            nav li {
                width: 100%;
                text-align: center;
            }

            nav a {
                padding: 0.8rem 1rem;
                border-radius: var(--radius-md);
                margin: 0.25rem 1rem;
            }

            .menu-toggle {
                display: block;
            }

            .user-dropdown-menu {
                min-width: 180px;
                right: -1rem;
            }

            .user-dropdown-trigger {
                padding: 0.5rem 1rem;
            }

            .user-name {
                display: none;
            }
        }
    </style>
</head>

<body>
    <header>
        <div class="container">
            <div class="logo">
                <i class="fas fa-graduation-cap"></i>
                <span>Ayo Belajar</span>
            </div>
            <button class="menu-toggle" id="menuToggle"><i class="fas fa-bars"></i></button>
            <nav id="mainNav">
                <ul>
                    <li><a href="{{ route('home') }}" class="nav-link {{ Request::is('/') ? 'active' : '' }}">Beranda</a></li>
                    <li><a href="{{ route('modul') }}" class="nav-link {{ Request::is('modul') ? 'active' : '' }}">Modul</a></li>
                    <li><a href="{{ route('chatbot') }}" class="nav-link {{ Request::is('chatbot') ? 'active' : '' }}">ChatBot</a></li>
                    <li><a href="{{ route('translator') }}" class="nav-link {{ Request::is('translator') ? 'active' : '' }}">Penerjemah</a></li>
                    @guest
                        <li><a href="{{ route('register') }}" class="nav-link {{ Request::is('register') ? 'active' : '' }}">Daftar</a></li>
                        <li><a href="{{ route('login') }}" class="nav-link {{ Request::is('login') ? 'active' : '' }}">Login</a></li>
                    @else
                        <li class="user-dropdown">
                            <a href="#" class="user-dropdown-trigger">
                                <div class="user-avatar">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                </div>
                                <span class="user-name">{{ Str::limit(Auth::user()->name, 12) }}</span>
                                <i class="fas fa-chevron-down dropdown-arrow"></i>
                            </a>
                            <div class="user-dropdown-menu">
                                <div class="dropdown-header">
                                    <div class="dropdown-user-info">{{ Auth::user()->name }}</div>
                                    <div class="dropdown-user-email">{{ Auth::user()->email }}</div>
                                </div>
                                <div class="dropdown-menu-items">
                                    <a href="{{ route('dashboard') }}" class="dropdown-item">
                                        <div class="dropdown-item-icon dashboard-icon">
                                            <i class="fas fa-gauge"></i>
                                        </div>
                                        Dashboard
                                    </a>
                                    <a href="{{ route('dashboard.profile') }}" class="dropdown-item">
                                        <div class="dropdown-item-icon profile-icon">
                                            <i class="fas fa-user"></i>
                                        </div>
                                        Profil Saya
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item logout-item">
                                            <div class="dropdown-item-icon logout-icon">
                                                <i class="fas fa-sign-out-alt"></i>
                                            </div>
                                            Logout
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </li>
                    @endguest
                </ul>
            </nav>
        </div>
    </header>

    <main class="container">
        @if(session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i>
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-error">
                <i class="fas fa-exclamation-circle"></i>
                {{ session('error') }}
            </div>
        @endif

        @if(session('info'))
            <div class="alert alert-info">
                <i class="fas fa-info-circle"></i>
                {{ session('info') }}
            </div>
        @endif

        @yield('content')
    </main>

    @include('sections.footer')

    <script>
        document.querySelector('.menu-toggle').addEventListener('click', function() {
            document.querySelector('nav ul').classList.toggle('active');
        });
    </script>
</body>

</html>