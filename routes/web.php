<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;


// landing page untuk halaman pertama tanpa login
Route::get('/', [LandingController::class, 'index'])->name('landing');

//setelah login(masih coba coba untuk login)
Route::get('/home', [HomeController::class, 'index'])->name('home');

//login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
//register user baru
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.process');

Route::get('/tutorial', function () {
    return view('tutorial');
});

