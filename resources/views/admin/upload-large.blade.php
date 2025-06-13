<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Modul Besar - Ayo Belajar Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @livewireStyles
</head>
<body class="bg-gray-100">
    <!-- Header -->
    <header class="bg-white shadow-sm border-b">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center space-x-2">
                        <i class="fas fa-graduation-cap text-2xl text-blue-600"></i>
                        <span class="text-xl font-bold text-gray-900">Ayo Belajar</span>
                        <span class="text-sm bg-blue-100 text-blue-800 px-2 py-1 rounded-full">Admin</span>
                    </a>
                </div>
                
                <nav class="flex space-x-8">
                    <a href="/admin" class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">
                        <i class="fas fa-tachometer-alt mr-2"></i>Dashboard
                    </a>
                    <a href="/admin/modules" class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">
                        <i class="fas fa-book mr-2"></i>Kelola Modul
                    </a>
                    <a href="{{ route('modul') }}" class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">
                        <i class="fas fa-eye mr-2"></i>Lihat Website
                    </a>
                </nav>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="min-h-screen py-8">
        @livewire('admin.large-file-upload')
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t mt-auto">
        <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
            <div class="text-center text-sm text-gray-500">
                © {{ date('Y') }} Ayo Belajar - Upload Modul Besar
            </div>
        </div>
    </footer>

    @livewireScripts
</body>
</html>