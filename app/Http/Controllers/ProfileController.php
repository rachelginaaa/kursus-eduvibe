<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Models\Siswa;
use App\Models\Mentor;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('profile.profile', compact('user'));
    }

    public function index2()
    {
        $siswas = Siswa::all();
        return view('siswa.index', compact('siswas'));
    }

    public function index3()
    {
        $mentor = Mentor::all();
        return view('mentor.index', compact('mentor'));
    }

    public function update(Request $request)
    {
        if (Auth::guard('siswa')->check()) {
            $user = Auth::guard('siswa')->user();

            $request->validate([
                'nama' => 'required|string|max:255',
                'email' => [
                    'required', 
                    'email', 
                    Rule::unique('siswa', 'email')->ignore($user->getKey(), $user->getKeyName())
                ],
                'no_hp' => 'nullable|string|max:20',
            ]);

            $user->update($request->only('nama', 'email', 'no_hp'));

            return back()->with('success', 'Profil siswa berhasil diperbarui!');
        }

        if (Auth::guard('mentor')->check()) {
            $user = Auth::guard('mentor')->user();

            $request->validate([
                'email' => [
                    'required', 
                    'email', 
                    Rule::unique('mentor', 'email')->ignore($user->getKey(), $user->getKeyName())
                ],
                'no_hp' => 'nullable|string|max:20',
            ]);

            $user->update($request->only('email', 'no_hp'));

            return back()->with('success', 'Profil mentor berhasil diperbarui!');
        }

        return abort(403, 'Unauthorized');
    }

    public function edit()
    {
        $user = Auth::guard('siswa')->user();
        return view('profile.edit_profile', compact('user'));
    }

    public function edit2()
    {
        $mentor = Auth::guard('mentor')->user();
        return view('mentor.edit_profile_mentor', compact('mentor'));
    }
}