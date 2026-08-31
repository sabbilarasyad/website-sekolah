<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Services\CanteenController;
use App\Http\Controllers\Services\QAController;
use App\Http\Controllers\Services\ReviewController;
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
/*
|--------------------------------------------------------------------------
| Domain E - Interactive Services (Public Routes)
|--------------------------------------------------------------------------
*/
Route::get('/canteen', [CanteenController::class, 'index'])->name('canteen.index');
Route::get('/qa', [QAController::class, 'index'])->name('qa.index');
Route::get('/qa/{question}', [QAController::class, 'show'])->name('qa.show');
Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');

/*
|--------------------------------------------------------------------------
| Authenticated Routes (Domain A & Domain E Protected)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Kantin
    Route::post('/canteen/checkout', [CanteenController::class, 'checkout'])->name('canteen.checkout');
    Route::get('/canteen/my-orders', [CanteenController::class, 'userOrders'])->name('canteen.orders');
    Route::patch('/canteen/orders/{order}/status', [CanteenController::class, 'updateStatus'])->name('canteen.orders.update-status');

    // Q&A
    Route::post('/qa/questions', [QAController::class, 'storeQuestion'])->name('qa.questions.store');
    Route::post('/qa/questions/{question}/answers', [QAController::class, 'storeAnswer'])->name('qa.answers.store');

    // Review
    Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
});

require __DIR__.'/academic.php';
