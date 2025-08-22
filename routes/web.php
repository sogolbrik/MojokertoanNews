<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MojokertoanController;
use App\Models\Category;
use App\Models\News;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Route;

//Berita
Route::get('/', [MojokertoanController::class, 'landingPage'])->name('landingPage');
Route::get('page-kategori', [MojokertoanController::class, 'kategori'])->name('page-kategori');

//Auth
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('proseslogin', [AuthController::class, 'authentication'])->name('authentication');

//Manajemen
Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::resource('kategori', KategoriController::class);
    Route::resource('berita', BeritaController::class);
});