<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Siswa;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('profile', compact('user'));
    }

    public function index2()
    {
        $siswas = Siswa::all();
        return view('siswa.index', compact('siswas'));
    }

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

}
