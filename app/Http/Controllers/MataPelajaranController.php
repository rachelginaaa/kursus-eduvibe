<?php

namespace App\Http\Controllers;

use App\Models\MataPelajaran;

class MataPelajaranController extends Controller
{
    public function home()
{
    $mataPelajarans = MataPelajaran::all();
    return view('home', compact('mataPelajarans'));
}

public function show($id)
{
    $mapel = MataPelajaran::findOrFail($id);
    return view('mata_pelajaran_detail', compact('mapel'));
}


    public function bahasa()
    {
        $mapel = MataPelajaran::where('nama_matapelajaran', 'Bahasa Indonesia')->get();
        return view('bahasa', compact('mapel'));
    }
}
