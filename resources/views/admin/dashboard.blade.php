@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto mt-8">
    <div class="bg-white rounded-xl shadow-lg p-8 mb-8">
        <h2 class="text-2xl font-bold text-purple-700 mb-2">Dashboard Admin</h2>
        <p class="text-gray-600 mb-6">Selamat datang di panel administrasi Ayo Belajar.</p>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-gradient-to-r from-purple-500 to-purple-600 rounded-xl p-6 text-white">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-lg font-semibold">Total Users</h3>
                        <p class="text-3xl font-bold">{{ \App\Models\User::where('role', 'user')->count() }}</p>
                    </div>
                    <i class="fas fa-users text-4xl opacity-80"></i>
                </div>
            </div>
            
            <div class="bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl p-6 text-white">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-lg font-semibold">Total Downloads</h3>
                        <p class="text-3xl font-bold">{{ \App\Models\DownloadHistory::count() }}</p>
                    </div>
                    <i class="fas fa-download text-4xl opacity-80"></i>
                </div>
            </div>
            
            <div class="bg-gradient-to-r from-green-500 to-green-600 rounded-xl p-6 text-white">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-lg font-semibold">Chat Sessions</h3>
                        <p class="text-3xl font-bold">{{ \App\Models\ChatHistory::distinct('session_id')->count() }}</p>
                    </div>
                    <i class="fas fa-comments text-4xl opacity-80"></i>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white border border-gray-200 rounded-xl p-6">
                <h3 class="text-lg font-bold text-gray-800 mb-4">Recent Users</h3>
                @php
                    $recentUsers = \App\Models\User::where('role', 'user')->latest()->take(5)->get();
                @endphp
                @if($recentUsers->count())
                    <ul class="space-y-3">
                        @foreach($recentUsers as $user)
                            <li class="flex items-center justify-between py-2 border-b border-gray-100 last:border-b-0">
                                <div>
                                    <div class="font-semibold text-gray-800">{{ $user->name }}</div>
                                    <div class="text-sm text-gray-500">{{ $user->email }}</div>
                                </div>
                                <div class="text-xs text-gray-400">
                                    {{ $user->created_at->format('d M Y') }}
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-gray-500 text-sm">Belum ada user terdaftar.</p>
                @endif
            </div>

            <div class="bg-white border border-gray-200 rounded-xl p-6">
                <h3 class="text-lg font-bold text-gray-800 mb-4">Recent Downloads</h3>
                @php
                    $recentDownloads = \App\Models\DownloadHistory::with('user')->latest()->take(5)->get();
                @endphp
                @if($recentDownloads->count())
                    <ul class="space-y-3">
                        @foreach($recentDownloads as $download)
                            <li class="flex items-center justify-between py-2 border-b border-gray-100 last:border-b-0">
                                <div>
                                    <div class="font-semibold text-gray-800">{{ $download->module_title }}</div>
                                    <div class="text-sm text-gray-500">by {{ $download->user->name ?? 'Unknown' }}</div>
                                </div>
                                <div class="text-xs text-gray-400">
                                    {{ $download->downloaded_at->format('d M Y') }}
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-gray-500 text-sm">Belum ada download.</p>
                @endif
            </div>
        </div>

        <div class="mt-8 flex flex-wrap gap-4">
            <a href="/admin/filament" class="px-6 py-3 bg-purple-600 text-white rounded-lg font-semibold hover:bg-purple-700 transition">
                <i class="fas fa-cog mr-2"></i> Filament Admin Panel
            </a>
            <a href="{{ route('admin.upload-large') }}" class="px-6 py-3 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700 transition">
                <i class="fas fa-upload mr-2"></i> Upload Large Files
            </a>
        </div>
    </div>
</div>
@endsection