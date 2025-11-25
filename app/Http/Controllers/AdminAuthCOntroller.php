<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Siswa;
use App\Models\Mentor;


class AdminAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('Admin.loginAdmin');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin/dashboard');
        }

        return back()->withErrors(['loginError' => 'Email atau password salah']);
    }

    public function index() {
    $admin = auth()->guard('admin')->user();
    return view('Admin.admin_profile', compact('admin'));
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/admin/login');
    }
    public function siswa()
    {
        $siswa = Siswa::all();
        return view('admin.siswa', compact('siswa'));
    }

    public function mentor()
    {
        $mentor = Mentor::all();
        return view('admin.mentor', compact('mentor'));
    }

    public function kelas()
    {
        $mentor = Mentor::all();
        return view('admin.mentor', compact('mentor'));
    }

}
