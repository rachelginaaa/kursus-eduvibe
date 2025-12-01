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
use App\Http\Controllers\MentorKelasController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\AdminSiswaController;




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

// Login Admin
Route::get('/admin/login', [AdminAuthCOntroller::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthCOntroller::class, 'login'])->name('admin.login.process');
Route::post('/admin/logout', [AdminAuthCOntroller::class, 'logout'])->name('admin.logout');

// Dashboard Admin
Route::middleware('auth:admin')->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('Admin.admin');
    })->name('admin.dashboard');
});
//fitur admin
Route::get('/admin/siswa', [AdminAuthController::class, 'siswa'])->name('admin.siswa');
Route::get('/admin/mentor', [AdminAuthController::class, 'mentor'])->name('admin.mentor');
Route::get('/admin/kelas', [AdminAuthController::class, 'kelas'])->name('admin.kelas');

//fitur admin-siswa
Route::middleware('auth:admin')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/siswa', [AdminSiswaController::class, 'index'])->name('siswa.index');
    Route::get('/siswa/create', [AdminSiswaController::class, 'create'])->name('siswa.create');
    Route::post('/siswa', [AdminSiswaController::class, 'store'])->name('siswa.store');
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

Route::middleware('auth:siswa')->group(function () {
    Route::get('/home', [SiswaHomeController::class, 'index'])->name('siswa.home');
    Route::post('/pilih-paket', [SiswaHomeController::class, 'pilihPaket'])->name('siswa.pilihPaket');
});

Route::get('/mentor/kelas', [MentorKelasController::class, 'index'])
    ->name('mentor.kelas')
    ->middleware('auth:mentor');

Route::get('/materi/{id}', [MateriController::class, 'showMateri'])
    ->name('materi.show');

Route::get('/mentor/siswa', [MentorAuthController::class, 'lihatSiswa'])
    ->name('mentor.siswa')
    ->middleware('auth:mentor');

Route::get('/mentor/kelola-tugas', function () {
    $submissions = collect([
        (object) [
            'siswa_nama' => 'Rian Pratama',
            'tgl_submit' => '2025-11-24',
            'file' => 'tugas1.pdf',
            'nilai' => 90,
            'feedback' => 'Bagus!'
        ],
        (object) [
            'siswa_nama' => 'Alya Putri',
            'tgl_submit' => '2025-11-23',
            'file' => 'tugas1.docx',
            'nilai' => null,
            'feedback' => null
        ]
    ]);

    return view('mentor.kelola_tugas', compact('submissions'));
})->name('mentor.kelola_tugas');

Route::get('/mentor/tugas/{id}/submissions', function ($id) {
    // Dummy data submissions
    $submissions = [
        (object) [
            'siswa_nama' => 'Rian Pratama',
            'tgl_submit' => '2025-11-24',
            'file' => 'tugas' . $id . '_rian.pdf',
            'nilai' => 90,
            'feedback' => 'Bagus!'
        ],
        (object) [
            'siswa_nama' => 'Alya Putri',
            'tgl_submit' => '2025-11-23',
            'file' => 'tugas' . $id . '_alya.docx',
            'nilai' => null,
            'feedback' => null
        ]
    ];

    return view('mentor.lihat_submission', compact('submissions', 'id'));
})->name('mentor.lihat_submission');

Route::get('/mentor/kelas/{id}/materi', [MentorKelasController::class, 'materiIndex'])->name('mentor.materi');

Route::post('/mentor/kelas/{id}/materi', [MentorKelasController::class, 'materiStore'])->name('mentor.materi.store');

Route::delete('/mentor/kelas/{id}/materi/{materi}', [MentorKelasController::class, 'materiDestroy'])
    ->name('mentor.materi.destroy')
    ->whereNumber('materi'); // pastikan id numeric

