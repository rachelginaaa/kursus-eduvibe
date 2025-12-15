<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LeaderboardController extends Controller
{
    public function index(Request $request)
    {
        $jenjang = $request->query('jenjang'); // SD / SMP / SMA
        $mapelId = $request->query('mapel');   // mata_pelajaran_id

        // ambil daftar mata pelajaran untuk dropdown
        $mataPelajarans = DB::table('mata_pelajaran')
            ->select('mata_pelajaran_id', 'nama_matapelajaran')
            ->orderBy('nama_matapelajaran')
            ->get();

        $query = DB::table('hasil_kuis')
            ->join('siswa', 'hasil_kuis.siswa_id', '=', 'siswa.siswa_id')
            ->join('kuis', 'hasil_kuis.kuis_id', '=', 'kuis.kuis_id')
            ->join('materi', 'kuis.materi_id', '=', 'materi.materi_id')
            ->join('mata_pelajaran', 'materi.mata_pelajaran_id', '=', 'mata_pelajaran.mata_pelajaran_id')
            ->select(
                'siswa.siswa_id',
                'siswa.nama',
                'siswa.jenjang',
                DB::raw('SUM(hasil_kuis.skor) as total_poin')
            )
            ->groupBy('siswa.siswa_id', 'siswa.nama', 'siswa.jenjang');

        // 🔹 filter jenjang
        if ($jenjang) {
            $query->where('siswa.jenjang', $jenjang);
        }

        // 🔹 filter mata pelajaran
        if ($mapelId) {
            $query->where('mata_pelajaran.mata_pelajaran_id', $mapelId);
        }

        $leaderboard = $query
            ->orderByDesc('total_poin')
            ->get();

        return view('leaderboard.index', compact(
            'leaderboard',
            'mataPelajarans',
            'jenjang',
            'mapelId'
        ));
    }

}
