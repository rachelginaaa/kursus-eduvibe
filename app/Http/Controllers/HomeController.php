<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MataPelajaran;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil semua mata pelajaran dari DB
        $mataPelajarans = MataPelajaran::all();

        // Kirim ke view home.blade.php
        return view('home', compact('mataPelajarans'));
    }
}
