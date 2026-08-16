<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Domain A - Foundation & Authentication
|--------------------------------------------------------------------------
| Routes ini adalah fondasi untuk seluruh domain lain. Domain B/C/D/E
| menambahkan route mereka sendiri di file terpisah (mis. routes/guru.php,
| routes/siswa.php, dst.) dan meng-include-nya di sini, ATAU mendaftarkan
| route group baru dengan middleware ['auth', 'role:...'] yang sudah
| disediakan oleh domain ini. Jangan mengubah route auth/dashboard di bawah.
*/

Route::get('/', function () {
    return redirect()->route('login');
});

// Guest routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.attempt');
});

// Authenticated routes
Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Contoh pola untuk domain lain menambahkan route ter-scope per role:
    // Route::middleware('role:admin')->prefix('admin')->group(function () {
    //     Route::get('/guru', [GuruController::class, 'index'])->name('admin.guru.index');
    // });
});
