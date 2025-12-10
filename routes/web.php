<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.home')->name('home');
Route::view('/e-katalog', 'pages.e-katalog')->name('e-katalog');
Route::view('/organisasi', 'pages.organisasi')->name('organisasi');
Route::view('/berita', 'pages.berita')->name('berita');
Route::view('/umkm', 'pages.umkm')->name('umkm');
Route::view('/login', 'auth.login')->name('login');