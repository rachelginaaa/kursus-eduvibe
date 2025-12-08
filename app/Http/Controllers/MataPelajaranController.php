<?php

namespace App\Http\Controllers;

use App\Models\MataPelajaran;
use App\Models\PaketPelajaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Mentor;

class MataPelajaranController extends Controller
{
    // Detail 1 mata pelajaran + materi + kuis (+ nilai siswa)
    public function show($id)
    {
        $mapel = MataPelajaran::with(['mentor', 'materi'])->findOrFail($id);

        $siswa = Auth::guard('siswa')->user();
        $siswa_id = $siswa->siswa_id ?? null;

        $kuis = DB::table('kuis')
            ->join('materi', 'kuis.materi_id', '=', 'materi.materi_id')
            ->leftJoin('hasil_kuis', function ($join) use ($siswa_id) {
                $join->on('hasil_kuis.kuis_id', '=', 'kuis.kuis_id');
                if ($siswa_id) {
                    $join->where('hasil_kuis.siswa_id', '=', $siswa_id);
                } else {
                    // kalau belum login siswa, paksa join tidak match
                    $join->whereRaw('1=0');
                }
            })
            ->where('materi.mata_pelajaran_id', $id)
            ->select(
                'kuis.*',
                'materi.judul_materi',
                'hasil_kuis.skor as nilai_saya',
                'hasil_kuis.tgl_mengerjakan as tgl_mengerjakan'
            )
            ->orderByDesc('kuis.kuis_id')
            ->get();

        return view('mata_pelajaran_detail', compact('mapel', 'kuis'));
    }

    public function kuis($id)
    {
        $mapel = MataPelajaran::findOrFail($id);

        $siswa = Auth::guard('siswa')->user();
        $siswa_id = $siswa->siswa_id ?? null;

        $kuis = DB::table('kuis')
            ->join('materi', 'kuis.materi_id', '=', 'materi.materi_id')
            ->leftJoin('hasil_kuis', function ($join) use ($siswa_id) {
                $join->on('hasil_kuis.kuis_id', '=', 'kuis.kuis_id');
                if ($siswa_id) {
                    $join->where('hasil_kuis.siswa_id', '=', $siswa_id);
                } else {
                    $join->whereRaw('1=0');
                }
            })
            ->where('materi.mata_pelajaran_id', $id)
            ->select(
                'kuis.*',
                'materi.judul_materi',
                'hasil_kuis.skor as nilai_saya',
                'hasil_kuis.tgl_mengerjakan as tgl_mengerjakan'
            )
            ->orderByDesc('kuis.kuis_id')
            ->get();

        return view('kuis', compact('mapel', 'kuis'));
    }

     // Form tambah
    public function create($paket_id)
    {
        $paket = PaketPelajaran::findOrFail($paket_id);
        $mentors = Mentor::all();
        return view('admin.add_matapelajaran', compact('paket','mentors'));
    }

    // Store
    public function store(Request $request)
    {
        $request->validate([
            'paket_id' => 'required|exists:paket_pelajaran,paket_pelajaran_id',
            'nama_mata_pelajaran' => 'required|string',
            'deskripsi' => 'nullable|string',
        ]);

        MataPelajaran::create([
            'paket_pelajaran_id' => $request->paket_id,
            'mentor_id' => $request->mentor_id,
            'nama_matapelajaran' => $request->nama_mata_pelajaran,
            'jenjang' => $request->jenjang,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect('/admin/paket/index/' . $request->paket_id)
        ->with('success', 'Mata pelajaran berhasil ditambahkan!');
    }

    // Form edit
    public function edit($id)
    {
        $mataPelajaran = MataPelajaran::findOrFail($id);
        $paket = $mataPelajaran->paketPelajaran; // ambil paket terkait
        $mentors = Mentor::all(); // ambil semua mentor untuk dropdown

        return view('admin.edit_mapel', compact('mataPelajaran', 'paket', 'mentors'));
    }

    // Update
    public function update(Request $request, $id)
{
    $request->validate([
        'nama_matapelajaran' => 'required|string',
        'jenjang' => 'required|string',
        'mentor_id' => 'required|exists:mentor,mentor_id',
        'deskripsi' => 'nullable|string',
    ]);

    $mataPelajaran = MataPelajaran::findOrFail($id);
    $mataPelajaran->update([
        'nama_matapelajaran' => $request->nama_matapelajaran,
        'jenjang' => $request->jenjang,
        'mentor_id' => $request->mentor_id,
        'deskripsi' => $request->deskripsi,
    ]);

    return redirect('/admin/paket/index/' . $mataPelajaran->paket_pelajaran_id)
    ->with('success', 'Mata pelajaran berhasil diubah!');


}

    // Delete
    public function destroy($id)
    {
        $mataPelajaran = MataPelajaran::findOrFail($id);
        $mataPelajaran->delete();

        return redirect('/admin/paket/index/' . $mataPelajaran->paket_pelajaran_id)
        ->with('success', 'Mata pelajaran berhasil dihapus!');
    }
}
