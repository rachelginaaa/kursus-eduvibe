<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaketPelajaran;
use App\Models\MataPelajaran;

class SiswaHomeController extends Controller
{
    public function index()
    {
        $siswa = auth('siswa')->user();

        // cek apakah siswa sudah memiliki paket
        $paketSiswa = PaketPelajaran::where('siswa_id', $siswa->siswa_id)->first();

        // jika belum punya paket → tampilkan semua paket
        if (!$paketSiswa) {
            $pakets = PaketPelajaran::where('jenjang', $siswa->jenjang)->get();
            return view('home', [
                'pakets' => $pakets,
                'mataPelajarans' => collect(),
                'punyaPaket' => false
            ]);
        }

        // jika sudah punya paket → tampilkan mata pelajaran
        $mataPelajarans = MataPelajaran::where('paket_pelajaran_id', $paketSiswa->paket_pelajaran_id)
                               ->where('jenjang', $paketSiswa->jenjang) // ← tambah ini
                                ->get();

        return view('home', [
            'pakets' => collect(), // kosong
            'mataPelajarans' => $mataPelajarans,
            'punyaPaket' => true
        ]);
    }

    public function pilihPaket(Request $request)
    {
        $request->validate([
            'paket_pelajaran_id' => 'required|exists:paket_pelajaran,paket_pelajaran_id'
        ]);

        $siswa = auth('siswa')->user();

        // update paket → tambahkan siswa_id
        PaketPelajaran::where('paket_pelajaran_id', $request->paket_pelajaran_id)
            ->update([
                'siswa_id' => $siswa->siswa_id
            ]);

        return redirect('/home')->with('success', 'Paket berhasil dipilih!');
    }

}
