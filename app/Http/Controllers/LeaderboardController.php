<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LeaderboardController extends Controller
{
    public function index(Request $request)
    {
        $jenjang = $request->query('jenjang'); // SD / SMP / SMA / null

        $query = DB::table('hasil_kuis')
            ->join('siswa', 'hasil_kuis.siswa_id', '=', 'siswa.siswa_id')
            ->select(
                'siswa.siswa_id',
                'siswa.nama',
                'siswa.jenjang',
                DB::raw('SUM(hasil_kuis.skor) as total_poin')
            )
            ->groupBy('siswa.siswa_id', 'siswa.nama', 'siswa.jenjang');

        // 🔥 FILTER JENJANG
        if ($jenjang) {
            $query->where('siswa.jenjang', $jenjang);
        }

        $leaderboard = $query
            ->orderByDesc('total_poin')
            ->get();

        return view('leaderboard.index', compact('leaderboard', 'jenjang'));
    }

}
