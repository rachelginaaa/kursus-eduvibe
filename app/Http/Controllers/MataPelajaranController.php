<?php

namespace App\Http\Controllers;

use App\Models\MataPelajaran;

class MataPelajaranController extends Controller
{
    // Tampilkan detail 1 mata pelajaran
    public function show($id)
    {
        $mapel = MataPelajaran::findOrFail($id);
        return view('mata_pelajaran_detail', compact('mapel'));
    }
}
