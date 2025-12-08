<?php

namespace App\Http\Controllers;

use App\Models\Mentor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminMentorController extends Controller
{
    // TAMPILKAN DATA MENTOR
    public function index(Request $request)
    {
        $query = Mentor::query();

        // PENCARIAN BERDASARKAN NAMA
        if ($request->filled('nama')) {
            $query->where('nama', 'like', '%' . $request->nama . '%');
        }

        // FILTER BERDASARKAN KEAHLIAN
        if ($request->filled('keahlian')) {
            $query->where('keahlian', 'like', '%' . $request->keahlian . '%');
        }

        $mentor = $query->get();

        return view('admin.mentor', compact('mentor'));
    }



    // FORM TAMBAH MENTOR
    public function create()
    {
        return view('admin.tambah_mentor');
    }

    // SIMPAN DATA MENTOR BARU
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:mentor,email',
            'password' => 'required|min:6',
            'keahlian' => 'nullable',
            'no_hp' => 'required',
            'status' => 'required',
        ]);

        Mentor::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'keahlian' => $request->keahlian,
            'no_hp' => $request->no_hp,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.mentor.index')
            ->with('success', 'Mentor berhasil ditambahkan');
    }

    // FORM EDIT MENTOR
    public function edit($id)
    {
        $mentor = Mentor::findOrFail($id);
        return view('admin.edit_mentor', compact('mentor'));
    }

    // UPDATE DATA MENTOR
    public function update(Request $request, $id)
    {
        $mentor = Mentor::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:mentor,email,' . $mentor->mentor_id . ',mentor_id',
            'keahlian' => 'nullable',
            'no_hp' => 'required',
            'status' => 'required',
        ]);

        $data = [
            'nama' => $request->nama,
            'email' => $request->email,
            'keahlian' => $request->keahlian,
            'no_hp' => $request->no_hp,
            'status' => $request->status,
        ];

        // Kalau password diisi, baru diupdate
        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        $mentor->update($data);

        return redirect()->route('admin.mentor.index')
            ->with('success', 'Mentor berhasil diupdate');
    }

    //HAPUS DATA MENTOR
    public function destroy($id)
    {
        $mentor = Mentor::findOrFail($id);
        $mentor->delete();

        return redirect()->route('admin.mentor.index')
            ->with('success', 'Mentor berhasil dihapus');
    }
}
