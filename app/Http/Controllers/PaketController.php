<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaketPelajaran;
use App\Models\MataPelajaran;

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

        public function index($id)
    {
        $paket = PaketPelajaran::findOrFail($id);
        $mataPelajaran = MataPelajaran::where('paket_pelajaran_id', $id)->get();

        return view('admin.mapel_index', compact('paket', 'mataPelajaran'));
    }

    // Tambah mapel
    public function store(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'nullable'
        ]);

        MataPelajaran::create([
            'paket_pelajaran_id' => $id,
            'nama_mata_pelajaran' => $request->nama,
            'deskripsi' => $request->deskripsi,
        ]);

        return back()->with('success', 'Mata pelajaran berhasil ditambahkan');
    }

    // Update
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        $mapel = MataPelajaran::findOrFail($id);
        $mapel->nama_mata_pelajaran = $request->nama;
        $mapel->deskripsi = $request->deskripsi;
        $mapel->save();

        return back()->with('success', 'Mata pelajaran berhasil diperbarui');
    }

    // Hapus
    public function destroy($id)
    {
        MataPelajaran::destroy($id);
        return back()->with('success', 'Mata pelajaran berhasil dihapus');
    }

    public function create()
    {
        return view('admin.add_paket');
    }

    public function storepaket(Request $request)
{
    $request->validate([
        'nama_paket_pelajaran' => 'required',
        'deskripsi' => 'nullable',
        'jenjang' => 'required',
        'harga' => 'required',
    ]);

    PaketPelajaran::create([
        'nama_paket_pelajaran' => $request->nama_paket_pelajaran,
        'deskripsi' => $request->deskripsi,
        'jenjang' => $request->jenjang,
        'harga' => $request->harga,
    ]);

    return redirect()->route('admin.paket.index')->with('success', 'Paket berhasil ditambahkan!');
}


        public function edit($id)
    {
        $paket = PaketPelajaran::findOrFail($id);
        return view('admin.edit_paket', compact('paket'));
    }

    public function updatePaket(Request $request, $id)
    {
        $request->validate([
            'nama_paket_pelajaran' => 'required',
            'deskripsi' => 'required',
            'jenjang' => 'required',
            'harga' => 'required',
        ]);

        $paket = PaketPelajaran::findOrFail($id);
        $paket->update($request->all());

        return redirect()->route('admin.paket.index')->with('success', 'Paket berhasil diperbarui!');
    }

    public function destroyPaket($id)
    {
        PaketPelajaran::destroy($id);
        return back()->with('success', 'Paket berhasil dihapus!');
    }


}
