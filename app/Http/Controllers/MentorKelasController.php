<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MataPelajaran;
use Illuminate\Support\Facades\Auth;

class MentorKelasController extends Controller
{
    public function index()
    {
        // Ambil data mentor yang sedang login
        $mentorId = Auth::guard('mentor')->id();

        // Ambil semua mata pelajaran yang dia ajar
        $kelas = MataPelajaran::where('mentor_id', $mentorId)->get();

        return view('mentor.kelas', compact('kelas'));
    }
}
