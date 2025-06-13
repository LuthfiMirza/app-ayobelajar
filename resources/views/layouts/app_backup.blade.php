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
                        <li class="relative group" style="min-width: 120px;">
                            <a href="#" class="nav-link flex items-center gap-2 font-semibold">
                                <i class="fas fa-user-circle"></i> {{ Str::limit(Auth::user()->name, 12) }} <i class="fas fa-caret-down text-xs"></i>
                            </a>
                            <ul class="absolute right-0 mt-1 bg-white rounded-xl shadow-xl py-2 min-w-[140px] w-40 hidden group-hover:block z-50 border border-gray-200 transition-all" style="box-shadow:0 4px 12px rgba(120,87,193,0.1);">
                                <li>
                                    <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-gray-700 hover:bg-purple-50 hover:text-purple-700 transition rounded-md text-sm">
                                        <i class="fas fa-gauge mr-2"></i> Dashboard
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('dashboard.profile') }}" class="block px-4 py-2 text-gray-700 hover:bg-purple-50 hover:text-purple-700 transition rounded-md text-sm">
                                        <i class="fas fa-user mr-2"></i> Profil
                                    </a>
                                </li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">@csrf
                                        <button type="submit" class="w-full text-left px-4 py-2 text-gray-700 hover:bg-red-50 hover:text-red-600 transition rounded-md text-sm flex items-center">
                                            <i class="fas fa-sign-out-alt mr-2"></i> Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
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