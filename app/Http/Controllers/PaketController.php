<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaketPelajaran;

class PaketController extends Controller
{
    public function pilihPaket(Request $request)
    {
        $siswa = auth('siswa')->user();

        $siswa->update([
            'paket_pelajaran_id' => $request->paket_pelajaran_id
        ]);

        return redirect('/home')->with('success', 'Paket berhasil dipilih!');
    }
    public function home()
    {
        $siswa = auth('siswa')->user();

        // Jika belum pilih paket → kirim list paket
        if ($siswa->paket_pelajaran_id == null) {
            $pakets = PaketPelajaran::all();

            return view('siswa.home', [
                'siswa' => $siswa,
                'pakets' => $pakets,
                'mataPelajarans' => null
            ]);
        }

        // Jika sudah punya paket → tampilkan mata pelajaran
        $mataPelajarans = MataPelajaran::where('paket_pelajaran_id', $siswa->paket_pelajaran_id)->get();

        return view('siswa.home', [
            'siswa' => $siswa,
            'pakets' => null,
            'mataPelajarans' => $mataPelajarans
        ]);
    }

}
