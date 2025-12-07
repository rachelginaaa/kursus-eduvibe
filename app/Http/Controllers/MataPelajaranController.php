<?php

namespace App\Http\Controllers;

use App\Models\MataPelajaran;
use Illuminate\Support\Facades\DB;

class MataPelajaranController extends Controller
{
    // Detail 1 mata pelajaran + materi + kuis
    public function show($id)
    {
        // sekalian ambil mentor + materi (biar yang di blade kamu aman)
        $mapel = MataPelajaran::with(['mentor', 'materi'])->findOrFail($id);

        // ambil daftar kuis untuk mapel ini (join ke materi)
        $kuis = DB::table('kuis')
            ->join('materi', 'kuis.materi_id', '=', 'materi.materi_id')
            ->where('materi.mata_pelajaran_id', $id)
            ->select('kuis.*', 'materi.judul_materi')
            ->orderByDesc('kuis.kuis_id')
            ->get();

        return view('mata_pelajaran_detail', compact('mapel', 'kuis'));
    }

    // Halaman daftar kuis (kalau kamu masih butuh halaman terpisah)
    public function kuis($id)
    {
        $mapel = MataPelajaran::findOrFail($id);

        $kuis = DB::table('kuis')
            ->join('materi', 'kuis.materi_id', '=', 'materi.materi_id')
            ->where('materi.mata_pelajaran_id', $id)
            ->select('kuis.*', 'materi.judul_materi')
            ->orderByDesc('kuis.kuis_id')
            ->get();

        return view('kuis', compact('mapel', 'kuis'));
    }
}
