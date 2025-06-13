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
            position: relative;
            width: 100%;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-size: 1.6rem;
            font-weight: 800;
            color: var(--accent-main);
            z-index: 1001;
            order: 1;
            flex: 1;
        }

        .logo i {
            font-size: 1.8rem;
            color: var(--accent-main);
        }

        .logo span {
            color: var(--accent-main);
        }

        nav {
            position: relative;
            order: 2;
        }

        nav ul {
            list-style: none;
            display: flex;
            gap: 0.5rem;
            align-items: center;
        }

        nav a {
            text-decoration: none;
            color: var(--nav-text);
            padding: 0.6rem 1.2rem;
            border-radius: var(--radius-pill);
            font-weight: 600;
            transition: background-color 0.3s ease, color 0.3s ease;
            display: block;
            white-space: nowrap;
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
            background: rgba(120, 87, 193, 0.1);
            border: 2px solid var(--accent-main);
            border-radius: var(--radius-md);
            cursor: pointer;
            padding: 0.75rem;
            width: 48px;
            height: 48px;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            z-index: 1001;
            order: 3;
            flex-shrink: 0;
        }

        .menu-toggle:hover {
            background: var(--accent-main);
            color: white;
            transform: scale(1.05);
        }

        .menu-toggle:active {
            transform: scale(0.95);
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
            header .container {
                padding-left: 1rem;
                padding-right: 1rem;
                display: flex;
                justify-content: space-between;
                align-items: center;
                width: 100%;
            }

            .logo {
                font-size: 1.2rem;
                flex: 1;
                display: flex;
                align-items: center;
                gap: 0.5rem;
            }

            .logo span {
                display: inline-block;
                font-size: 1rem;
                font-weight: 700;
            }

            .logo i {
                font-size: 1.4rem;
                margin-right: 0;
            }

            nav ul {
                display: none;
                flex-direction: column;
                width: 100vw;
                position: fixed;
                top: 80px;
                left: 0;
                background-color: var(--nav-bg);
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
                padding: 1.5rem 0;
                z-index: 1000;
                border-top: 1px solid var(--border-soft);
            }

            nav ul.active {
                display: flex;
                animation: slideDown 0.3s ease-out;
            }

            @keyframes slideDown {
                from {
                    opacity: 0;
                    transform: translateY(-20px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            nav li {
                width: 100%;
                text-align: center;
                margin: 0.25rem 0;
            }

            nav a {
                padding: 1rem 2rem;
                border-radius: var(--radius-md);
                margin: 0.25rem 1rem;
                font-size: 1rem;
                font-weight: 600;
                display: block;
                transition: all 0.3s ease;
            }

            nav a:hover {
                background-color: var(--accent-primary-soft);
                color: var(--accent-main);
                transform: translateX(8px);
            }

            .menu-toggle {
                display: flex;
                position: relative;
                margin-left: auto;
                flex-shrink: 0;
                order: 2;
            }

            .user-dropdown {
                width: 100%;
                position: relative;
            }

            .user-dropdown-trigger {
                padding: 1rem 2rem;
                margin: 0.25rem 1rem;
                border-radius: var(--radius-md);
                justify-content: center;
                background: var(--accent-primary-soft);
                border: 2px solid var(--accent-main);
                width: calc(100% - 2rem);
                display: flex;
                align-items: center;
                gap: 0.75rem;
            }

            .user-dropdown-menu {
                position: static;
                width: calc(100% - 2rem);
                margin: 0.5rem 1rem 0 1rem;
                opacity: 1;
                visibility: visible;
                transform: none;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
                border: 1px solid var(--border-soft);
                border-radius: var(--radius-lg);
                background: var(--card-bg);
                overflow: hidden;
                display: none;
            }

            .user-dropdown.active .user-dropdown-menu {
                display: block;
                animation: slideDown 0.3s ease-out;
            }

            .user-name {
                display: inline-block;
                font-size: 0.9rem;
                font-weight: 600;
                color: var(--accent-main);
            }

            .user-avatar {
                width: 2rem;
                height: 2rem;
                font-size: 0.9rem;
                flex-shrink: 0;
            }

            .dropdown-arrow {
                margin-left: auto;
                font-size: 0.8rem;
                color: var(--accent-main);
            }
        }

        /* Specific fixes for small mobile screens like 390x844 */
        @media (max-width: 480px) {
            header {
                padding: 0.75rem 0;
            }

            header .container {
                padding-left: 0.75rem;
                padding-right: 0.75rem;
                min-height: 60px;
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            .logo {
                font-size: 1.1rem;
                flex: 1;
                display: flex;
                align-items: center;
                gap: 0.4rem;
            }

            .logo span {
                display: inline-block;
                font-size: 0.9rem;
                font-weight: 700;
            }

            .logo i {
                font-size: 1.3rem;
            }

            .menu-toggle {
                width: 44px;
                height: 44px;
                padding: 0.6rem;
                font-size: 1.3rem;
                margin-left: auto;
                flex-shrink: 0;
            }

            nav ul {
                top: 75px;
                padding: 1rem 0;
            }

            nav a {
                padding: 0.875rem 1.5rem;
                font-size: 0.95rem;
            }

            .user-dropdown {
                width: 100%;
                position: relative;
            }

            .user-dropdown-trigger {
                padding: 0.875rem 1.5rem;
                margin: 0.25rem 1rem;
                border-radius: var(--radius-md);
                background: var(--accent-primary-soft);
                border: 2px solid var(--accent-main);
                width: calc(100% - 2rem);
                display: flex;
                align-items: center;
                gap: 0.5rem;
                justify-content: center;
            }

            .user-dropdown-menu {
                position: static;
                width: calc(100% - 2rem);
                margin: 0.5rem 1rem 0 1rem;
                opacity: 1;
                visibility: visible;
                transform: none;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
                border: 1px solid var(--border-soft);
                border-radius: var(--radius-lg);
                background: var(--card-bg);
                overflow: hidden;
                display: none;
            }

            .user-dropdown.active .user-dropdown-menu {
                display: block;
                animation: slideDown 0.3s ease-out;
            }

            .user-name {
                display: inline-block;
                font-size: 0.85rem;
                font-weight: 600;
                color: var(--accent-main);
            }

            .user-avatar {
                width: 1.75rem;
                height: 1.75rem;
                font-size: 0.8rem;
                flex-shrink: 0;
            }

            .dropdown-arrow {
                margin-left: auto;
                font-size: 0.75rem;
                color: var(--accent-main);
            }

            .dropdown-header {
                padding: 0.875rem;
            }

            .dropdown-item {
                padding: 0.75rem 1rem;
                font-size: 0.875rem;
            }
        }

        /* Extra small screens */
        @media (max-width: 360px) {
            header .container {
                padding-left: 0.5rem;
                padding-right: 0.5rem;
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            .logo {
                font-size: 1rem;
                flex: 1;
                display: flex;
                align-items: center;
                gap: 0.3rem;
            }

            .logo span {
                display: inline-block;
                font-size: 0.8rem;
                font-weight: 700;
            }

            .logo i {
                font-size: 1.2rem;
            }

            .menu-toggle {
                width: 40px;
                height: 40px;
                padding: 0.5rem;
                font-size: 1.2rem;
                margin-left: auto;
                flex-shrink: 0;
            }

            nav a {
                padding: 0.75rem 1rem;
                margin: 0.25rem 0.5rem;
                font-size: 0.9rem;
            }

            .user-dropdown {
                width: 100%;
                position: relative;
            }

            .user-dropdown-trigger {
                padding: 0.75rem 1rem;
                margin: 0.25rem 0.5rem;
                border-radius: var(--radius-md);
                background: var(--accent-primary-soft);
                border: 2px solid var(--accent-main);
                width: calc(100% - 1rem);
                display: flex;
                align-items: center;
                gap: 0.4rem;
                justify-content: center;
            }

            .user-dropdown-menu {
                position: static;
                width: calc(100% - 1rem);
                margin: 0.5rem 0.5rem 0 0.5rem;
                opacity: 1;
                visibility: visible;
                transform: none;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
                border: 1px solid var(--border-soft);
                border-radius: var(--radius-lg);
                background: var(--card-bg);
                overflow: hidden;
                display: none;
            }

            .user-dropdown.active .user-dropdown-menu {
                display: block;
                animation: slideDown 0.3s ease-out;
            }

            .user-name {
                display: inline-block;
                font-size: 0.8rem;
                font-weight: 600;
                color: var(--accent-main);
            }

            .user-avatar {
                width: 1.5rem;
                height: 1.5rem;
                font-size: 0.75rem;
                flex-shrink: 0;
            }

            .dropdown-arrow {
                margin-left: auto;
                font-size: 0.7rem;
                color: var(--accent-main);
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
        document.addEventListener('DOMContentLoaded', function() {
            const menuToggle = document.querySelector('.menu-toggle');
            const navMenu = document.querySelector('nav ul');
            const menuIcon = menuToggle.querySelector('i');
            const userDropdown = document.querySelector('.user-dropdown');
            const userDropdownTrigger = document.querySelector('.user-dropdown-trigger');
            
            // Hamburger menu toggle
            menuToggle.addEventListener('click', function() {
                navMenu.classList.toggle('active');
                
                // Toggle hamburger icon
                if (navMenu.classList.contains('active')) {
                    menuIcon.classList.remove('fa-bars');
                    menuIcon.classList.add('fa-times');
                    menuToggle.style.background = 'var(--accent-main)';
                    menuToggle.style.color = 'white';
                } else {
                    menuIcon.classList.remove('fa-times');
                    menuIcon.classList.add('fa-bars');
                    menuToggle.style.background = 'rgba(120, 87, 193, 0.1)';
                    menuToggle.style.color = 'var(--accent-main)';
                }
            });

            // User dropdown toggle (mobile)
            if (userDropdownTrigger) {
                userDropdownTrigger.addEventListener('click', function(e) {
                    if (window.innerWidth <= 768) {
                        e.preventDefault();
                        userDropdown.classList.toggle('active');
                        
                        // Rotate arrow
                        const arrow = userDropdownTrigger.querySelector('.dropdown-arrow');
                        if (arrow) {
                            if (userDropdown.classList.contains('active')) {
                                arrow.style.transform = 'rotate(180deg)';
                            } else {
                                arrow.style.transform = 'rotate(0deg)';
                            }
                        }
                    }
                });
            }

            // Close menu when clicking on a link (mobile)
            const navLinks = document.querySelectorAll('nav a:not(.user-dropdown-trigger)');
            navLinks.forEach(link => {
                link.addEventListener('click', function() {
                    if (window.innerWidth <= 768) {
                        navMenu.classList.remove('active');
                        menuIcon.classList.remove('fa-times');
                        menuIcon.classList.add('fa-bars');
                        menuToggle.style.background = 'rgba(120, 87, 193, 0.1)';
                        menuToggle.style.color = 'var(--accent-main)';
                    }
                });
            });

            // Close menu when clicking outside (mobile)
            document.addEventListener('click', function(event) {
                if (window.innerWidth <= 768) {
                    const isClickInsideNav = navMenu.contains(event.target);
                    const isClickOnToggle = menuToggle.contains(event.target);
                    const isClickInsideUserDropdown = userDropdown && userDropdown.contains(event.target);
                    
                    // Close hamburger menu
                    if (!isClickInsideNav && !isClickOnToggle && navMenu.classList.contains('active')) {
                        navMenu.classList.remove('active');
                        menuIcon.classList.remove('fa-times');
                        menuIcon.classList.add('fa-bars');
                        menuToggle.style.background = 'rgba(120, 87, 193, 0.1)';
                        menuToggle.style.color = 'var(--accent-main)';
                    }
                    
                    // Close user dropdown
                    if (userDropdown && !isClickInsideUserDropdown && userDropdown.classList.contains('active')) {
                        userDropdown.classList.remove('active');
                        const arrow = userDropdownTrigger.querySelector('.dropdown-arrow');
                        if (arrow) {
                            arrow.style.transform = 'rotate(0deg)';
                        }
                    }
                }
            });

            // Handle window resize
            window.addEventListener('resize', function() {
                if (window.innerWidth > 768) {
                    navMenu.classList.remove('active');
                    menuIcon.classList.remove('fa-times');
                    menuIcon.classList.add('fa-bars');
                    menuToggle.style.background = 'rgba(120, 87, 193, 0.1)';
                    menuToggle.style.color = 'var(--accent-main)';
                    
                    if (userDropdown) {
                        userDropdown.classList.remove('active');
                        const arrow = userDropdownTrigger.querySelector('.dropdown-arrow');
                        if (arrow) {
                            arrow.style.transform = 'rotate(0deg)';
                        }
                    }
                }
            });
        });
    </script>
</body>

</html>