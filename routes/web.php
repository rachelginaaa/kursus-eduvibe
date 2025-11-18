<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MentorAuthController;
use App\Http\Controllers\AdminAuthCOntroller;
use App\Http\Controllers\MataPelajaranController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\SiswaHomeController;



// landing page untuk halaman pertama tanpa login
Route::get('/', [LandingController::class, 'index'])->name('landing');

//setelah login(masih coba coba untuk login)
// Route::get('/home', [HomeController::class, 'index'])->name('home');
//Route::get('/home', [MataPelajaranController::class, 'home']);

//login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// register user baru
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.process');

// tutorial
Route::get('/tutorial', function () {
    return view('tutorial');
});

// paket
Route::get('/paket/a', fn() => view('paketA'))->name('paket.a');
Route::get('/paket/b', fn() => view('paketB'))->name('paket.b');
Route::get('/paket/c', fn() => view('paketC'))->name('paket.c');
Route::get('/profile', [ProfileController::class, 'index'])->middleware('auth');

Route::get('/siswa', [ProfileController::class, 'index'])->name('siswa.index');

// Login Mentor
Route::get('/mentor/login', [MentorAuthController::class, 'showLoginForm'])->name('mentor.login');
Route::post('/mentor/login', [MentorAuthController::class, 'login'])->name('mentor.login.process');
Route::post('/mentor/logout', [MentorAuthController::class, 'logout'])->name('mentor.logout');

// Dashboard Mentor
Route::middleware('auth:mentor')->group(function () {
    Route::get('/mentor/dashboard', function () {
        return view('mentor.mentor');
    })->name('mentor.dashboard');
});


//edit profile siswa
Route::middleware('auth:siswa')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});

// paket
Route::get('/paket/a', fn() => view('paketA'))->name('paket.a');
Route::get('/paket/b', fn() => view('paketB'))->name('paket.b');
Route::get('/paket/c', fn() => view('paketC'))->name('paket.c');

Route::get('/mata-pelajaran/{id}', [MataPelajaranController::class, 'show'])->name('mata-pelajaran.show');

Route::get('/mata-pelajaran/{id}/kuis', [MataPelajaranController::class, 'kuis'])->name('mata_pelajaran.kuis');
//cekpaket siswa
Route::post('/pilih-paket', [PaketController::class, 'pilihPaket'])->name('siswa.pilihPaket');

Route::middleware('auth:siswa')->group(function() {
    Route::get('/home', [SiswaHomeController::class, 'index'])->name('siswa.home');
    Route::post('/pilih-paket', [SiswaHomeController::class, 'pilihPaket'])->name('siswa.pilihPaket');
});
