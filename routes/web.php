<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;

/*
|--------------------------------------------------------------------------
| Domain A - Foundation & Authentication
|--------------------------------------------------------------------------
*/

// Route Publik Domain D (Syavira)
Route::get('/', [PublicController::class, 'index'])->name('public.home');
Route::get('/profil', [PublicController::class, 'profil'])->name('public.profil');
Route::get('/berita', [PublicController::class, 'berita'])->name('public.berita');
Route::get('/hubin', [PublicController::class, 'hubin'])->name('public.hubin');

// Route Halaman Login & Proses Login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

Route::post('/login', function () {
    return redirect()->back();
})->name('login.attempt');