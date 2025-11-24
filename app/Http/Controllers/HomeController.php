<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
<<<<<<< HEAD
=======
use App\Models\MataPelajaran;
>>>>>>> 59e06d7876bf11aebd24c69e67c75f8c1dd96929

class HomeController extends Controller
{
    public function index()
    {
<<<<<<< HEAD
        return view('home');
=======
        // Ambil semua mata pelajaran dari DB
        $mataPelajarans = MataPelajaran::all();

        // Kirim ke view home.blade.php
        return view('home', compact('mataPelajarans'));
>>>>>>> 59e06d7876bf11aebd24c69e67c75f8c1dd96929
    }
}
