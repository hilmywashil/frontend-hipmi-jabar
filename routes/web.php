<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;

Route::get('login', [AdminAuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AdminAuthController::class, 'login'])->name('login.post');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::post('logout', [AdminAuthController::class, 'logout'])->name('logout');
});

Route::view('/', 'pages.home')->name('home');
Route::view('/e-katalog', 'pages.ekatalog')->name('e-katalog');
Route::view('/e-katalog/detail', 'pages.details.ekatalog-detail')->name('e-katalog.detail');
Route::view('/organisasi', 'pages.organisasi')->name('organisasi');
Route::view('/berita', 'pages.berita')->name('berita');
Route::view('/umkm', 'pages.umkm')->name('umkm');