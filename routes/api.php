<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TranslationController;
use App\Http\Controllers\AlternativeTranslationController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ModulController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Original Translation API routes (Azure + Google)
Route::post('/translate', [TranslationController::class, 'translate'])->name('api.translate');
Route::get('/translate/languages', [TranslationController::class, 'getSupportedLanguages'])->name('api.translate.languages');
Route::get('/translate/health', [TranslationController::class, 'healthCheck'])->name('api.translate.health');

// Alternative Translation API routes (Azure + MyMemory + Local Dictionary)
Route::post('/translate-alt', [AlternativeTranslationController::class, 'translate'])
    ->name('api.translate.alternative')
    ->middleware(['web', 'guest.usage:translator']);
Route::get('/translate-alt/languages', [AlternativeTranslationController::class, 'getSupportedLanguages'])->name('api.translate.alternative.languages');
Route::get('/translate-alt/health', [AlternativeTranslationController::class, 'healthCheck'])->name('api.translate.alternative.health');

// Public Chat API routes (with usage limit for guests)
Route::post('/chat/send', [ChatController::class, 'sendMessage'])
    ->name('api.chat.send.public')
    ->middleware(['web', 'guest.usage:chatbot']);

// Azure Storage API routes
Route::post('/upload-module', [ModulController::class, 'uploadModule'])
    ->name('api.upload.module')
    ->middleware(['web', 'auth']);

Route::get('/storage-stats', [ModulController::class, 'getStorageStats'])
    ->name('api.storage.stats')
    ->middleware(['web']);