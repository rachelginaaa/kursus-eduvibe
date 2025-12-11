<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Siswa;           // import model Siswa
use Illuminate\Validation\Rule;
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

    public function index() 
    {
    $mentor = auth()->guard('mentor')->user();
    return view('Mentor.profile_mentor', compact('mentor'));
    }

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

        public function edit()
    {
        $mentor = Auth::guard('mentor')->user();
        return view('mentor.edit_profile_mentor', compact('mentor'));
    }

    public function update(Request $request)
    {
        $mentor = Auth::guard('mentor')->user();
        
        if ($request->hasFile('foto')) {
            $request->validate([
                'foto' => 'image|mimes:jpeg,png,jpg|max:2048'
            ]);

            // Hapus foto lama jika ada
            if ($mentor->foto && file_exists(storage_path('app/public/'.$mentor->foto))) {
                unlink(storage_path('app/public/'.$mentor->foto));
            }

            // Simpan foto baru
            $path = $request->file('foto')->store('mentor_foto', 'public');
            $mentor->foto = $path;
        }

        $request->validate([
            'email' => ['required', 'email', Rule::unique('mentor', 'email')->ignore($mentor->mentor_id, 'mentor_id')],
            'no_hp' => ['nullable|string|max:20', 'regex:/^(\\+62|0)[0-9]{9,15}$/'],
        ]);

        $mentor->update($request->only('email', 'no_hp', 'foto'));


        return redirect()->route('Mentor.profile_mentor')->with('success', 'Profil mentor berhasil diperbarui!');
    }
}
