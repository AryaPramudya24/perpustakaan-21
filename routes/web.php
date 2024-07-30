<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('/pengguna', \App\Http\Controllers\UserController::class);

Route::group(['middleware' => 'guest'], function () {
  Route::get('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register');
  Route::post('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'registerPost'])->name('register');
  Route::get('/login', [\App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
  Route::post('/login', [\App\Http\Controllers\Auth\LoginController::class, 'loginPost'])->name('login');
});

Auth::routes();

Route::middleware('auth', 'user-access:admin')->name('admin.')->group(function () {
  Route::resource('/admin/pengguna', \App\Http\Controllers\UserController::class);
  Route::resource('/admin/anggota', \App\Http\Controllers\AnggotaController::class);
  Route::resource('/admin/buku', \App\Http\Controllers\BukuController::class);
  Route::resource('/admin/peminjaman', \App\Http\Controllers\PeminjamanController::class);
  Route::resource('/admin/penulis', \App\Http\Controllers\PenulisController::class);
  Route::resource('/admin/rak', \App\Http\Controllers\RakController::class);
  Route::resource('/admin/sanksi', \App\Http\Controllers\SanksiController::class);
  Route::get('/admin', [\App\Http\Controllers\HomeController::class, 'index'])->name('admin');
});