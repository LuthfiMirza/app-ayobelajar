<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Ayo Belajar' }} - Pendidikan Digital untuk Daerah 3T</title>
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
        }

        .alert {
            position: fixed;
            top: 2rem;
            right: 2rem;
            padding: 1rem 1.5rem;
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-weight: 600;
            animation: slideInRight 0.3s ease-out;
            z-index: 9999;
            max-width: 400px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
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

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(100px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        /* Auto-hide alerts after 5 seconds */
        .alert {
            animation: slideInRight 0.3s ease-out, fadeOut 0.3s ease-out 4.7s forwards;
        }

        @keyframes fadeOut {
            from {
                opacity: 1;
                transform: translateX(0);
            }
            to {
                opacity: 0;
                transform: translateX(100px);
            }
        }

        @media (max-width: 768px) {
            .alert {
                top: 1rem;
                right: 1rem;
                left: 1rem;
                max-width: none;
            }
        }
    </style>
</head>

<body>
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

    <script>
        // Auto-hide alerts after 5 seconds
        document.addEventListener('DOMContentLoaded', function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                setTimeout(() => {
                    alert.style.display = 'none';
                }, 5000);
            });
        });
    </script>
</body>

</html>