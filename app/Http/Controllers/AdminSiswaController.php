<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Siswa;

class AdminSiswaController extends Controller
{
    // Tampilkan daftar siswa
    public function index()
    {
        $siswa = Siswa::all();
        return view('admin.siswa.index', compact('siswa'));
    }


    // Form tambah siswa
    public function create()
    {
        return view('admin.siswa.create');
    }

    // Form edit siswa
    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('admin.siswa.edit', compact('siswa'));
    }

    // Update siswa
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'required|email|unique:siswa,email,' . $id . ',siswa_id',
            'jenjang' => 'required|string',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'no_hp' => 'required',
        ]);

        $siswa = Siswa::findOrFail($id);
        $siswa->nama = $request->nama;
        $siswa->email = $request->email;
        if ($request->password) {
            $siswa->password = Hash::make($request->password);
        }
        $siswa->jenjang = $request->jenjang;
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->no_hp = $request->no_hp;
        $siswa->save();

        return redirect()->route('admin.siswa.index')->with('success', 'Siswa berhasil diupdate!');
    }

    // Simpan siswa baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'required|email|unique:siswa,email',
            'password' => 'required|min:6|confirmed',
            'jenjang' => 'required',
            'jenis_kelamin' => 'required',
            'no_hp' => 'required',
        ]);

        Siswa::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'tgl_daftar' => now(),
            'jenjang' => $request->jenjang,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_hp' => $request->no_hp,
            'role' => 'siswa',
        ]);


        return redirect()->route('admin.siswa.index')->with('success', 'Siswa berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();

        return redirect()->route('admin.siswa.index')->with('success', 'Siswa berhasil dihapus');
    }
}
