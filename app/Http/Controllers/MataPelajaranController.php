<?php

namespace App\Http\Controllers;

use App\Models\MataPelajaran;

class MataPelajaranController extends Controller
{
    public function matematika()
    {
        $mapel = MataPelajaran::where('nama_matapelajaran', 'Matematika')->get();
        return view('matematika', compact('mapel'));
    }

    public function ipa()
    {
        $mapel = MataPelajaran::where('nama_matapelajaran', 'IPA')->get();
        return view('ipa', compact('mapel'));
    }

    public function bahasa()
    {
        $mapel = MataPelajaran::where('nama_matapelajaran', 'Bahasa Indonesia')->get();
        return view('bahasa', compact('mapel'));
    }
}
