<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MataPelajaran;
use Illuminate\Support\Facades\Auth;
use App\Models\MateriPelajaran;

class MentorKelasController extends Controller
{
    // Halaman "Kelas Saya"
    public function index()
    {
        // Ambil data mentor yang sedang login
        $mentorId = Auth::guard('mentor')->id();

        // Ambil semua mata pelajaran yang dia ajar
        $kelas = MataPelajaran::where('mentor_id', $mentorId)->get();

        return view('mentor.kelas', compact('kelas'));
    }

    // Tampilkan daftar materi (kelas detail)
    public function materiIndex($id)
    {
        $mata_pelajaran = MataPelajaran::findOrFail($id);
        $materi = MateriPelajaran::where('mata_pelajaran_id', $id)->get();

        return view('mentor.kelas_detail', compact('mata_pelajaran', 'materi'));
    }

    // Simpan materi baru
    public function materiStore(Request $request, $id)
    {
        $request->validate([
            'judul_materi' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'file' => 'nullable|file|mimes:pdf,docx,zip'
        ]);

        // Ambil mata pelajaran supaya bisa ambil jenjang
        $mata_pelajaran = MataPelajaran::findOrFail($id);

        // Simpan file jika ada
        $filePath = $request->file('file') ? $request->file('file')->store('materi_files') : null;

        // Simpan materi baru dengan semua field wajib
        MateriPelajaran::create([
            'mata_pelajaran_id' => $id,
            'pengampu' => Auth::guard('mentor')->user()->nama,
            'judul_materi' => $request->judul_materi,
            'deskripsi' => $request->deskripsi,
            'file' => $filePath,
            'jenjang' => $mata_pelajaran->jenjang,
        ]);

        return back()->with('success', 'Materi berhasil ditambahkan!');
    }

    // Hapus materi
    public function materiDestroy($id_mata_pelajaran, $materi_id)
    {
        $materi = MateriPelajaran::findOrFail($materi_id);

        if ($materi->file) {
            \Storage::delete($materi->file);
        }

        $materi->delete();

        return back()->with('success', 'Materi berhasil dihapus!');
    }
}
