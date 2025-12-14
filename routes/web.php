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
use App\Http\Controllers\MentorKuisController;
use App\Http\Controllers\SiswaKuisController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\LeaderboardController;





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
    return view('tutorial'); });





// paket
Route::get('/paket/a', fn() => view('paketA'))->name('paket.a');
Route::get('/paket/b', fn() => view('paketB'))->name('paket.b');
Route::get('/paket/c', fn() => view('paketC'))->name('paket.c');
Route::get('/profile', [ProfileController::class, 'index'])->middleware('auth');

Route::get('/siswa', [ProfileController::class, 'index'])->name('siswa.index');

// Login Mentor
Route::get('/mentor/login', [MentorAuthController::class, 'showLoginForm'])->name('mentor.login');
Route::post('/mentor/login', [MentorAuthController::class, 'login'])->name('mentor.login.process');
Route::get('/mentor/logout', [MentorAuthController::class, 'logout'])->name('mentor.logout');

//leaderboard
Route::get('/leaderboard', [LeaderboardController::class, 'index'])->name('leaderboard');

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
Route::get('/admin/paket', [AdminAuthController::class, 'paket'])->name('admin.paket');

//fitur admin-siswa
Route::middleware('auth:admin')->prefix('admin')->name('admin.')->group(function () {

    //create
    Route::get('/siswa', [AdminSiswaController::class, 'index'])->name('siswa.index');
    Route::get('/siswa/create', [AdminSiswaController::class, 'create'])->name('siswa.create');
    Route::post('/siswa', [AdminSiswaController::class, 'store'])->name('siswa.store');
    //edit
    Route::get('/siswa/{id}/edit', [AdminSiswaController::class, 'edit'])->name('siswa.edit');
    Route::put('/siswa/{id}', [AdminSiswaController::class, 'update'])->name('siswa.update');
    // delte
    Route::delete('/siswa/{id}', [AdminSiswaController::class, 'destroy'])->name('siswa.delete');

    Route::get('/paket', [AdminAuthCOntroller::class, 'paket'])->name('paket.index');
    // CRUD MAPEL
    Route::get('/paket/create', [PaketController::class, 'create'])->name('paket.create');
    Route::post('/paket/store', [PaketController::class, 'storepaket'])->name('paket.store');

    Route::get('/paket/{id}/edit', [PaketController::class, 'edit'])->name('paket.edit');
    Route::put('/paket/update/{id}', [PaketController::class, 'updatePaket'])->name('paket.update');
    Route::delete('/paket/delete/{id}', [PaketController::class, 'destroyPaket'])->name('paket.delete');
    Route::get('/paket/index/{id}', [PaketController::class, 'index'])->name('paket.index');

    // Form tambah mata pelajaran untuk paket tertentu
    Route::get('/mataPelajaran/create/{paket_id}', [MataPelajaranController::class, 'create'])->name('mataPelajaran.create');
    Route::post('/mataPelajaran/store', [MataPelajaranController::class, 'store'])->name('mataPelajaran.store');

    // Form edit mata pelajaran
    Route::get('/mataPelajaran/{id}/edit', [MataPelajaranController::class, 'edit'])->name('mataPelajaran.edit');
    Route::put('/mataPelajaran/update/{id}', [MataPelajaranController::class, 'update'])->name('mataPelajaran.update');

    // Delete mata pelajaran
    Route::delete('/mataPelajaran/delete/{id}', [MataPelajaranController::class, 'destroy'])->name('mataPelajaran.delete');

    Route::get('/profile/edit', [AdminProfileController::class, 'edit']);
    Route::put('/profile/update', [AdminProfileController::class, 'update']);

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

//edit profile mentor
Route::middleware('auth:mentor')->group(function () {
    Route::get('/mentor/profile', [MentorAuthController::class, 'index'])->name('Mentor.profile_mentor');
    Route::get('/mentor/profile/edit', [MentorAuthController::class, 'edit'])->name('mentor.profile.edit');
    Route::put('/mentor/profile/update', [MentorAuthController::class, 'update'])->name('mentor.profile.update');
});

Route::get('/mentor/kelas', [MentorKelasController::class, 'index'])
    ->name('mentor.kelas')
    ->middleware('auth:mentor');

Route::get('/materi/{id}', [MateriController::class, 'showMateri'])
    ->name('materi.show');

Route::get('/materi/{id}/video', [MateriController::class, 'showVideo'])
    ->name('materi.video');
Route::get('/materi/{id}/dokumen', [MateriController::class, 'showDokumen'])
    ->name('materi.dokumen');


Route::middleware('auth:mentor')->group(function () {
    Route::get('/mentor/profile', [MentorAuthController::class, 'index'])->name('Mentor.profile_mentor');
});

Route::middleware('auth:admin')->group(function () {
    Route::get('/admin/profile', [AdminAuthCOntroller::class, 'index'])->name('Admin.admin_profile');
});
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



// Kuis Mentor
Route::prefix('mentor')->group(function () {
    Route::get('/mapel/{mata_pelajaran_id}/kuis', [MentorKuisController::class, 'index'])
        ->name('mentor.kuis.index');

    Route::post('/mapel/{mata_pelajaran_id}/kuis', [MentorKuisController::class, 'store'])
        ->name('mentor.kuis.store');

    Route::get('/kuis/{kuis_id}/soal', [MentorKuisController::class, 'soalIndex'])
        ->name('mentor.kuis.soal');

    Route::post('/kuis/{kuis_id}/soal', [MentorKuisController::class, 'soalStore'])
        ->name('mentor.kuis.soal.store');
});

Route::prefix('siswa')->group(function () {
    // daftar kuis per mapel
    Route::get('/mapel/{mata_pelajaran_id}/kuis', [SiswaKuisController::class, 'index'])
        ->name('siswa.kuis.index');

    // kerjakan kuis (tampil soal)
    Route::get('/kuis/{kuis_id}/kerjakan', [SiswaKuisController::class, 'show'])
        ->name('siswa.kuis.kerjakan');

    // submit jawaban & hitung skor
    Route::post('/kuis/{kuis_id}/submit', [SiswaKuisController::class, 'submit'])
        ->name('siswa.kuis.submit');
});

// halaman 1 soal per step
Route::get('/kuis/{kuis_id}/kerjakan/{no}', [SiswaKuisController::class, 'step'])
    ->name('siswa.kuis.step');

// simpan jawaban step (Next/Prev/Submit)
Route::post('/kuis/{kuis_id}/jawab/{no}', [SiswaKuisController::class, 'saveStep'])
    ->name('siswa.kuis.step.save');


// halaman hasil kuis
Route::get('/kuis/{kuis_id}/hasil', [SiswaKuisController::class, 'hasil'])
    ->name('siswa.kuis.hasil');

// reset (ulang kuis)
Route::post('/kuis/{kuis_id}/ulang', [SiswaKuisController::class, 'ulang'])
    ->name('siswa.kuis.ulang');

Route::get('/mata-pelajaran/{id}', [MataPelajaranController::class, 'show'])
    ->name('mata_pelajaran_detail');

Route::prefix('mentor')->name('mentor.')->group(function () {
    // Halaman kelola kuis per mapel (view kuis.blade.php yang kamu kirim)
    Route::get('/mapel/{mapel}/kuis', [MentorKuisController::class, 'index'])->name('kuis.index');
    Route::post('/mapel/{mapel}/kuis', [MentorKuisController::class, 'store'])->name('kuis.store');

    // EDIT & UPDATE
    Route::get('/kuis/{kuis}/edit', [MentorKuisController::class, 'edit'])->name('kuis.edit');
    Route::put('/kuis/{kuis}', [MentorKuisController::class, 'update'])->name('kuis.update');

    // DELETE
    Route::delete('/kuis/{kuis}', [MentorKuisController::class, 'destroy'])->name('kuis.destroy');

    // Kelola Soal (kamu sudah pakai di view)
    Route::get('/kuis/{kuis}/soal', [MentorKuisController::class, 'soal'])->name('kuis.soal');
});

Route::put('/mentor/kuis/{kuis}/soal/{soal}', [MentorKuisController::class, 'soalUpdate'])->name('mentor.kuis.soal.update');
Route::delete('/mentor/kuis/{kuis}/soal/{soal}', [MentorKuisController::class, 'soalDestroy'])->name('mentor.kuis.soal.destroy');
