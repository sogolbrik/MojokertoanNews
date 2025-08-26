<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MojokertoanController;
use Illuminate\Support\Facades\Route;

//Berita
Route::get('/', [MojokertoanController::class, 'landingPage'])->name('landingPage');
Route::get('trending/{id}', [MojokertoanController::class, 'trending'])->name('trending');
Route::get('byKategori/{slug}', [MojokertoanController::class, 'byKategori'])->name('byKategori');
Route::get('allBerita', [MojokertoanController::class, 'allBerita'])->name('allBerita');

//Auth
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('proseslogin', [AuthController::class, 'authentication'])->name('authentication');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

//Manajemen
Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::resource('kategori', KategoriController::class);
    Route::resource('berita', BeritaController::class);
});
