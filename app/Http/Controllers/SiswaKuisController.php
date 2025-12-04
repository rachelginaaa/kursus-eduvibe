<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiswaKuisController extends Controller
{
    public function index($mata_pelajaran_id)
    {
        // mapel
        $mapel = DB::table('mata_pelajaran')
            ->where('mata_pelajaran_id', $mata_pelajaran_id)
            ->first();

        if (!$mapel) abort(404, 'Mapel tidak ditemukan.');

        // daftar kuis di mapel ini (kuis -> materi -> mapel)
        $kuis = DB::table('kuis')
            ->join('materi', 'kuis.materi_id', '=', 'materi.materi_id')
            ->where('materi.mata_pelajaran_id', $mata_pelajaran_id)
            ->select('kuis.*', 'materi.judul_materi')
            ->orderByDesc('kuis.kuis_id')
            ->get();

        return view('siswa.kuis', compact('mapel', 'kuis'));
    }

    public function show($kuis_id)
    {
        $kuis = DB::table('kuis')
            ->join('materi', 'kuis.materi_id', '=', 'materi.materi_id')
            ->join('mata_pelajaran', 'materi.mata_pelajaran_id', '=', 'mata_pelajaran.mata_pelajaran_id')
            ->where('kuis.kuis_id', $kuis_id)
            ->select('kuis.*', 'materi.judul_materi', 'mata_pelajaran.nama_matapelajaran')
            ->first();

        if (!$kuis) abort(404, 'Kuis tidak ditemukan.');

        $soal = DB::table('soal')
            ->where('kuis_id', $kuis_id)
            ->orderBy('soal_id')
            ->get();

        if ($soal->isEmpty()) {
            return back()->with('error', 'Soal untuk kuis ini belum ada.');
        }

        return view('siswa.kerjakan-kuis', compact('kuis', 'soal'));
    }

    public function submit(Request $request, $kuis_id)
    {
        $soal = DB::table('soal')
            ->where('kuis_id', $kuis_id)
            ->orderBy('soal_id')
            ->get();

        if ($soal->isEmpty()) abort(404, 'Soal tidak ditemukan.');

        $jawaban = $request->input('jawaban', []); // format: jawaban[soal_id] = 1..4

        $benar = 0;
        $total = $soal->count();

        foreach ($soal as $s) {
            $pilih = $jawaban[$s->soal_id] ?? null;
            if ($pilih !== null && (string)$pilih === (string)$s->jawaban_benar) {
                $benar++;
            }
        }

        $skor = $total > 0 ? round(($benar / $total) * 100) : 0;

        return redirect()->route('siswa.kuis.kerjakan', $kuis_id)
            ->with('hasil', [
                'benar' => $benar,
                'total' => $total,
                'skor'  => $skor,
            ]);
    }
}
