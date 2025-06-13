<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ModulController;

// Include authentication routes
require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/modul', [\App\Http\Controllers\ModulController::class, 'index'])->name('modul');
Route::get('/modul/{module}', [\App\Http\Controllers\ModulController::class, 'detail'])->name('modul.detail');
Route::get('/modul/{module}/download', [\App\Http\Controllers\ModulController::class, 'download'])->name('modul.download');
Route::get('/modul/{module}/preview', [\App\Http\Controllers\ModulController::class, 'preview'])->name('modul.preview');

// USER AUTH
Route::get('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'register']);
Route::get('/login', [\App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [\App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

// PUBLIC CHATBOT ROUTE (with usage limit for guests)
Route::get('/chatbot', function () {
    return view('chatbot');
})->name('chatbot')->middleware('guest.usage:chatbot');

// AUTHENTICATED USER ROUTES
Route::middleware(['auth'])->group(function () {
    // Chat API is now handled by API routes to support both auth and guest users
});

// USER DASHBOARD
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/download-history', [\App\Http\Controllers\DashboardController::class, 'downloadHistory'])->name('dashboard.download-history');
    Route::get('/dashboard/chat-history', [\App\Http\Controllers\DashboardController::class, 'chatHistory'])->name('dashboard.chat-history');
    Route::get('/dashboard/chat-session/{sessionId}', [\App\Http\Controllers\DashboardController::class, 'chatSession'])->name('dashboard.chat-session');
    Route::get('/dashboard/profile', [\App\Http\Controllers\DashboardController::class, 'profile'])->name('dashboard.profile');
    Route::post('/dashboard/profile', [\App\Http\Controllers\DashboardController::class, 'updateProfile'])->name('dashboard.profile.update');
});



Route::get('/translator', function () {
    return view('translator');
})->name('translator')->middleware('guest.usage:translator');

Route::get('/translator-comparison', function () {
    return view('translator-comparison');
})->name('translator.comparison');

// Company pages
Route::get('/tentang-kami', function () {
    return view('company.about');
})->name('company.about');

Route::get('/tim', function () {
    return view('company.team');
})->name('company.team');

Route::get('/karir', function () {
    return view('company.career');
})->name('company.career');

Route::get('/kontak', function () {
    return view('company.contact');
})->name('company.contact');

// User Guide page
Route::get('/panduan', function () {
    return view('panduan');
})->name('panduan');

// Admin upload module page
Route::get('/admin/upload-module', [\App\Http\Controllers\ModulController::class, 'showUploadForm'])
    ->name('admin.upload.module')
    ->middleware(['auth', 'role:admin']);

// Help pages
Route::get('/faq', function () {
    return view('help.faq');
})->name('help.faq');

Route::get('/dukungan', function () {
    return view('help.support');
})->name('help.support');

Route::get('/kebijakan-privasi', function () {
    return view('help.privacy');
})->name('help.privacy');

Route::get('/syarat-ketentuan', function () {
    return view('help.terms');
})->name('help.terms');


// Large file upload route
Route::get('/admin/upload-large', function () {
    return view('admin.upload-large');
})->name('admin.upload-large');
