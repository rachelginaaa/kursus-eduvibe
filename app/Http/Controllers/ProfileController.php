<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Models\Siswa;

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


}
