<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MentorAuthController extends Controller
{
    public function showLoginForm()
    {
<<<<<<< HEAD
        return view('mentor.login');
=======
        return view('mentor.LoginMentor');
>>>>>>> 59e06d7876bf11aebd24c69e67c75f8c1dd96929
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('mentor')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/mentor/dashboard');
        }

        return back()->withErrors(['loginError' => 'Email atau password salah']);
    }

    public function logout(Request $request)
    {
        Auth::guard('mentor')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/mentor/login');
    }
}
