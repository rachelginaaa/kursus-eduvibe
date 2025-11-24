<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MateriPelajaran;
class MateriController extends Controller
{
    public function showMateri($id)
    {
        $materi = MateriPelajaran::findOrFail($id);

        return view('materi_detil', compact('materi'));
    }
    
}
