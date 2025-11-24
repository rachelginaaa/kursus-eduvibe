<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\MataPelajaran;
use App\Models\PaketPelajaran;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('siswa.login');

    }

    public function showMentorLoginForm()
    {
        return view('mentor.LoginMentor');
    }

    public function showAdminLoginForm()
    {
        return view('auth.admin.login');
    }

    public function login(Request $request)
    {
    $credentials = $request->only('email', 'password');

        if (Auth::guard('siswa')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/home')->with('success', 'Selamat datang kembali, ' . Auth::guard('siswa')->user()->nama . '!');
        }

    return back()->withErrors(['loginError' => 'Email atau password salah']);
    }
    



    public function logout(Request $request)
    {
    Auth::guard('siswa')->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/')->with('success', 'Anda telah logout');
    }

        public function showRegisterForm()
        {
            return view('register');
        }


    public function register(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'required|email|unique:siswa,email',
            'password' => 'required|min:6|confirmed',
            'jenjang' => 'required',
            'jenis_kelamin' => 'required',
            'no_hp' => 'required',
            
        ]);

        DB::table('siswa')->insert([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'tgl_daftar' => now(),
            'jenjang' => $request->jenjang,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_hp' => $request->no_hp,
            'role' => 'siswa',
        ]);

        // DB::table('mentor')->insert([
        //     'nama' => $request->nama,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        //     'tgl_daftar' => now(),
        //     'keahlian' => $request->keahlian,
        //     'jenis_kelamin' => $request->jenis_kelamin,
        //     'no_hp' => $request->no_hp,
        // ]);

        return redirect('/login')->with('success', 'Pendaftaran berhasil! Silakan login.');
    }

}
