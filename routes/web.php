<?php

use App\Http\Controllers\AlatController;
use App\Http\Controllers\KategoriAlatController;
use App\Http\Controllers\PeminjamanController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('templates', function () {
    return view('layouts.dashboard');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// kategori
Route::resource('kategori', KategoriAlatController::class);

// PEMINJAMAN pakai middleware auth
Route::middleware('auth')->group(function () {
    Route::resource('peminjaman', PeminjamanController::class);
});

// alat
Route::resource('alat', AlatController::class);
