<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $siswa = DB::table('siswa')->where('email', $request->email)->first();

        if ($siswa && Hash::check($request->password, $siswa->password)) {
            // Simpan sesi
            $request->session()->put('siswa', $siswa);
            return redirect('/home')->with('success', 'Selamat datang kembali, ' . $siswa->nama . '!');
        }

        return back()->withErrors(['loginError' => 'Email atau password salah']);
    }

    public function logout(Request $request)
    {
        $request->session()->forget('siswa');
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
        ]);

        return redirect('/login')->with('success', 'Pendaftaran berhasil! Silakan login.');
    }
}
