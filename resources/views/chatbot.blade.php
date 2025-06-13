@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="text-center mb-12">
        <h1 class="text-4xl font-bold text-gray-900 mb-4">AYO BELAJAR dengan GATOT</h1>
        <p class="text-lg text-gray-600 max-w-2xl mx-auto">
            GATOT AI yang siap membantu kamu memahami materi pelajaran dengan lebih baik.
            Tanyakan apa saja seputar pelajaranmu dengan ChatBot GATOT AI.
        </p>
    </div>

    @include('sections.chatbot')
    
    <!-- Debug script for development -->
    @if(config('app.debug'))
    <script src="{{ asset('js/chatbot-debug.js') }}"></script>
    @endif

    <div class="mt-12 grid md:grid-cols-2 gap-6">
        <div class="bg-white rounded-xl shadow-lg p-6 border-t-4 border-blue-500 hover:shadow-xl transition-shadow duration-300">
            <div class="flex items-center mb-4">
                <i class="fas fa-book-reader text-2xl text-blue-500 mr-3"></i>
                <h3 class="text-xl font-bold text-gray-800">Cara Menggunakan</h3>
            </div>
            <div class="space-y-4">
                <div class="flex items-start space-x-3 text-gray-600">
                    <div class="flex-shrink-0 w-6 h-6 bg-blue-100 rounded-full flex items-center justify-center">
                        <span class="text-blue-500 font-semibold">1</span>
                    </div>
                    <p>Ketik pertanyaanmu di kotak chat</p>
                </div>
                <div class="flex items-start space-x-3 text-gray-600">
                    <div class="flex-shrink-0 w-6 h-6 bg-blue-100 rounded-full flex items-center justify-center">
                        <span class="text-blue-500 font-semibold">2</span>
                    </div>
                    <p>Tekan tombol Kirim atau Enter</p>
                </div>
                <div class="flex items-start space-x-3 text-gray-600">
                    <div class="flex-shrink-0 w-6 h-6 bg-blue-100 rounded-full flex items-center justify-center">
                        <span class="text-blue-500 font-semibold">3</span>
                    </div>
                    <p>Tunggu respon dari ChatBot</p>
                </div>
                <div class="flex items-start space-x-3 text-gray-600">
                    <div class="flex-shrink-0 w-6 h-6 bg-blue-100 rounded-full flex items-center justify-center">
                        <span class="text-blue-500 font-semibold">4</span>
                    </div>
                    <p>Baca jawaban dengan seksama</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-lg p-6 border-t-4 border-green-500 hover:shadow-xl transition-shadow duration-300">
            <div class="flex items-center mb-4">
                <i class="fas fa-lightbulb text-2xl text-green-500 mr-3"></i>
                <h3 class="text-xl font-bold text-gray-800">Tips Bertanya</h3>
            </div>
            <div class="space-y-4">
                <div class="flex items-start space-x-3 text-gray-600">
                    <div class="flex-shrink-0 w-6 h-6 bg-green-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-check text-sm text-green-500"></i>
                    </div>
                    <p>Gunakan bahasa yang jelas dan sopan</p>
                </div>
                <div class="flex items-start space-x-3 text-gray-600">
                    <div class="flex-shrink-0 w-6 h-6 bg-green-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-check text-sm text-green-500"></i>
                    </div>
                    <p>Berikan konteks yang cukup</p>
                </div>
                <div class="flex items-start space-x-3 text-gray-600">
                    <div class="flex-shrink-0 w-6 h-6 bg-green-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-check text-sm text-green-500"></i>
                    </div>
                    <p>Fokus pada satu topik per pertanyaan</p>
                </div>
                <div class="flex items-start space-x-3 text-gray-600">
                    <div class="flex-shrink-0 w-6 h-6 bg-green-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-check text-sm text-green-500"></i>
                    </div>
                    <p>Tanyakan hal spesifik yang ingin dipahami</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection