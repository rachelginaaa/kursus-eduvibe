<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
<<<<<<< HEAD
=======
use Illuminate\Validation\Rule;
>>>>>>> 59e06d7876bf11aebd24c69e67c75f8c1dd96929
use App\Models\Siswa;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();

<<<<<<< HEAD
        return view('profile', compact('user'));
=======
        return view('profile.profile', compact('user'));
>>>>>>> 59e06d7876bf11aebd24c69e67c75f8c1dd96929
    }

    public function index2()
    {
        $siswas = Siswa::all();
        return view('siswa.index', compact('siswas'));
    }

<<<<<<< HEAD
        public function update(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:siswa,email,' . auth()->user()->siswaid,
            'no_hp' => 'nullable|string|max:20',
        ]);

        $siswa = auth()->user();
        $siswa->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
        ]);

        return redirect()->back()->with('success', 'Profil berhasil diperbarui!');
    }
=======
    public function update(Request $request)
    {
        // ambil user yang sedang login (pastikan ini adalah model Siswa)
        $siswa = auth()->user(); // atau auth('siswa')->user() kalau pakai guard custom

        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                // ignore berdasarkan primary key model saat ini (mis. siswaid)
                Rule::unique('siswa', 'email')->ignore($siswa->getKey(), $siswa->getKeyName()),
            ],
            'no_hp' => 'nullable|string|max:20',
        ]);

        $siswa->update($request->only('nama', 'email', 'no_hp'));

        return redirect()->back()->with('success', 'Profil berhasil diperbarui!');
    }
    public function edit()
    {
        $user = Auth::guard('siswa')->user();
        return view('profile.edit_profile', compact('user'));
    }

>>>>>>> 59e06d7876bf11aebd24c69e67c75f8c1dd96929

}
