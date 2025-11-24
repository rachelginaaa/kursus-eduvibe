<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
<<<<<<< HEAD
=======
use App\Models\MataPelajaran;
use App\Models\PaketPelajaran;
>>>>>>> 59e06d7876bf11aebd24c69e67c75f8c1dd96929

class AuthController extends Controller
{
    public function showLoginForm()
    {
<<<<<<< HEAD
        return view('login');
=======
        return view('siswa.login');

    }

    public function showMentorLoginForm()
    {
        return view('mentor.LoginMentor');
    }

    public function showAdminLoginForm()
    {
        return view('auth.admin.login');
>>>>>>> 59e06d7876bf11aebd24c69e67c75f8c1dd96929
    }

    public function login(Request $request)
    {
<<<<<<< HEAD
        $credentials = $request->only('email', 'password');

        if (Auth::guard('web')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/home')->with('success', 'Selamat datang kembali!');
        }

        return back()->withErrors(['loginError' => 'Email atau password salah']);
    }
=======
    $credentials = $request->only('email', 'password');

        if (Auth::guard('siswa')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/home')->with('success', 'Selamat datang kembali, ' . Auth::guard('siswa')->user()->nama . '!');
        }

    return back()->withErrors(['loginError' => 'Email atau password salah']);
    }
    

>>>>>>> 59e06d7876bf11aebd24c69e67c75f8c1dd96929


    public function logout(Request $request)
    {
<<<<<<< HEAD
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Anda telah logout');
=======
    Auth::guard('siswa')->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/')->with('success', 'Anda telah logout');
>>>>>>> 59e06d7876bf11aebd24c69e67c75f8c1dd96929
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
<<<<<<< HEAD
=======
            
>>>>>>> 59e06d7876bf11aebd24c69e67c75f8c1dd96929
        ]);

        DB::table('siswa')->insert([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'tgl_daftar' => now(),
            'jenjang' => $request->jenjang,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_hp' => $request->no_hp,
<<<<<<< HEAD
        ]);

=======
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

>>>>>>> 59e06d7876bf11aebd24c69e67c75f8c1dd96929
        return redirect('/login')->with('success', 'Pendaftaran berhasil! Silakan login.');
    }

}
