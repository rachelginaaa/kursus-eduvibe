<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Siswa;           // import model Siswa
use App\Models\MataPelajaran;   // import model MataPelajaran
use App\Models\PaketPelajaran;  // import model PaketPelajaran

class MentorAuthController extends Controller
{
    // Login form
    public function showLoginForm()
    {
        return view('mentor.LoginMentor');
    }

    // Login
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('mentor')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/mentor/dashboard');
        }

        return back()->withErrors(['loginError' => 'Email atau password salah']);
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::guard('mentor')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/mentor/login');
    }

    // ===========================
    // Fungsi baru: Lihat Siswa
    // ===========================
    public function lihatSiswa()
    {
        // Ambil mentor_id dari guard mentor
        $mentor_id = Auth::guard('mentor')->id();

        // Join tabel mata_pelajaran → paket_pelajaran → siswa
        $siswa = Siswa::select('siswa.*')
            ->join('paket_pelajaran', 'siswa.siswa_id', '=', 'paket_pelajaran.siswa_id')
            ->join('mata_pelajaran', 'paket_pelajaran.paket_pelajaran_id', '=', 'mata_pelajaran.paket_pelajaran_id')
            ->where('mata_pelajaran.mentor_id', $mentor_id)
            ->distinct()
            ->get();

        return view('mentor.lihat_siswa', compact('siswa'));
    }
}
