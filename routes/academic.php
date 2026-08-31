<?php

use App\Http\Controllers\Academic\GuruController;
use App\Http\Controllers\Academic\MapelController;
use App\Http\Controllers\Academic\MuridController;
use App\Http\Controllers\Academic\NilaiController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'role:admin,guru'])
    ->prefix('academic')
    ->name('academic.')
    ->group(function () {
        Route::get('/guru', [GuruController::class, 'index'])->name('guru.index');
        Route::get('/mapel', [MapelController::class, 'index'])->name('mapel.index');
        Route::get('/murid', [MuridController::class, 'index'])->name('murid.index');
        Route::get('/nilai', [NilaiController::class, 'index'])->name('nilai.index');
        Route::get('/nilai/create', [NilaiController::class, 'create'])->name('nilai.create');
        Route::post('/nilai', [NilaiController::class, 'store'])->name('nilai.store');
    });
