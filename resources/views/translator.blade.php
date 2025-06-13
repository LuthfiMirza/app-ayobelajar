@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="text-center mb-12">
        <h1 class="text-4xl font-bold text-gray-900 mb-4">Penerjemah Bahasa Daerah</h1>
        <p class="text-lg text-gray-600 max-w-2xl mx-auto">
            Terjemahkan teks dari dan ke berbagai bahasa daerah di Indonesia dengan mudah dan cepat. 
            Dukung pelestarian bahasa daerah melalui teknologi modern.
        </p>
    </div>

    @include('sections.translator')

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
                    <p>Pilih bahasa sumber dan bahasa target</p>
                </div>
                <div class="flex items-start space-x-3 text-gray-600">
                    <div class="flex-shrink-0 w-6 h-6 bg-blue-100 rounded-full flex items-center justify-center">
                        <span class="text-blue-500 font-semibold">2</span>
                    </div>
                    <p>Ketik atau tempel teks yang ingin diterjemahkan</p>
                </div>
                <div class="flex items-start space-x-3 text-gray-600">
                    <div class="flex-shrink-0 w-6 h-6 bg-blue-100 rounded-full flex items-center justify-center">
                        <span class="text-blue-500 font-semibold">3</span>
                    </div>
                    <p>Klik tombol "Terjemahkan" atau tekan Ctrl+Enter</p>
                </div>
                <div class="flex items-start space-x-3 text-gray-600">
                    <div class="flex-shrink-0 w-6 h-6 bg-blue-100 rounded-full flex items-center justify-center">
                        <span class="text-blue-500 font-semibold">4</span>
                    </div>
                    <p>Lihat hasil terjemahan di kotak sebelah kanan</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-lg p-6 border-t-4 border-green-500 hover:shadow-xl transition-shadow duration-300">
            <div class="flex items-center mb-4">
                <i class="fas fa-lightbulb text-2xl text-green-500 mr-3"></i>
                <h3 class="text-xl font-bold text-gray-800">Tips Terjemahan</h3>
            </div>
            <div class="space-y-4">
                <div class="flex items-start space-x-3 text-gray-600">
                    <div class="flex-shrink-0 w-6 h-6 bg-green-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-check text-sm text-green-500"></i>
                    </div>
                    <p>Gunakan kalimat yang lengkap dan jelas</p>
                </div>
                <div class="flex items-start space-x-3 text-gray-600">
                    <div class="flex-shrink-0 w-6 h-6 bg-green-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-check text-sm text-green-500"></i>
                    </div>
                    <p>Perhatikan tata bahasa dan ejaan yang benar</p>
                </div>
                <div class="flex items-start space-x-3 text-gray-600">
                    <div class="flex-shrink-0 w-6 h-6 bg-green-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-check text-sm text-green-500"></i>
                    </div>
                    <p>Hindari penggunaan singkatan atau slang</p>
                </div>
                <div class="flex items-start space-x-3 text-gray-600">
                    <div class="flex-shrink-0 w-6 h-6 bg-green-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-check text-sm text-green-500"></i>
                    </div>
                    <p>Periksa kembali hasil untuk memastikan konteks</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection