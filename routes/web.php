<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\KategoriController;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('page-berita.landingPage');
})->name('home');

//Auth
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('proseslogin', [AuthController::class, 'authentication'])->name('authentication');

//Manajemen
Route::resource('kategori', KategoriController::class);
Route::resource('berita', BeritaController::class);
Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');