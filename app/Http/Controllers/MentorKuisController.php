<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MentorKuisController extends Controller
{
    /**
     * Ambil ID mentor dari session (fallback beberapa key umum).
     */
    private function currentMentorId()
    {
        return session('mentor_id') ?? session('mentorId') ?? session('id') ?? null;
    }

    /**
     * Halaman kelola kuis per mapel.
     */
    public function index($mata_pelajaran_id)
    {
        $mentorId = $this->currentMentorId();

        // Cek mapel
        $mapel = DB::table('mata_pelajaran')
            ->where('mata_pelajaran_id', $mata_pelajaran_id)
            ->first();

        if (!$mapel) {
            abort(404, 'Mapel tidak ditemukan.');
        }

        // OPTIONAL SECURITY (aktifkan bila ownership sudah siap)
        // if ($mentorId && (int)$mapel->mentor_id !== (int)$mentorId) abort(403, 'Anda tidak punya akses ke mapel ini.');

        // Daftar materi dalam mapel ini
        $materi = DB::table('materi')
            ->where('mata_pelajaran_id', $mata_pelajaran_id)
            ->orderByDesc('materi_id')
            ->get();

        // Daftar kuis (join ke materi untuk filter by mapel)
        $kuisQuery = DB::table('kuis')
            ->join('materi', 'kuis.materi_id', '=', 'materi.materi_id')
            ->where('materi.mata_pelajaran_id', $mata_pelajaran_id)
            ->select('kuis.*', 'materi.judul_materi')
            ->orderByDesc('kuis.kuis_id');

        // Jika mentorId ada, filter kuis milik mentor tsb
        if ($mentorId) {
            $kuisQuery->where('kuis.mentor_id', $mentorId);
        }

        $kuis = $kuisQuery->get();

        return view('mentor.kuis', compact('mapel', 'materi', 'kuis'));
    }

    /**
     * Simpan kuis baru.
     */
    public function store(Request $request, $mata_pelajaran_id)
    {
        $mentorId = $this->currentMentorId();

        $mapel = DB::table('mata_pelajaran')
            ->where('mata_pelajaran_id', $mata_pelajaran_id)
            ->first();

        if (!$mapel) {
            abort(404, 'Mapel tidak ditemukan.');
        }

        $validated = $request->validate([
            'materi_id' => 'required|integer',
            'nama_kuis' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        // Pastikan materi sesuai dengan mapel ini
        $materiValid = DB::table('materi')
            ->where('materi_id', $validated['materi_id'])
            ->where('mata_pelajaran_id', $mata_pelajaran_id)
            ->exists();

        if (!$materiValid) {
            return back()->withErrors(['materi_id' => 'Materi tidak valid untuk mapel ini.'])->withInput();
        }

        // Kalau session mentor_id kosong, fallback ke mentor_id dari mapel
        $mentorIdToSave = $mentorId ?? $mapel->mentor_id;

        $kuisId = DB::table('kuis')->insertGetId([
            'materi_id'  => $validated['materi_id'],
            'mentor_id'  => $mentorIdToSave,
            'nama_kuis'  => $validated['nama_kuis'],
            'deskripsi'  => $validated['deskripsi'] ?? null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('mentor.kuis.soal', $kuisId)
            ->with('success', 'Kuis berhasil dibuat. Silakan tambahkan soal.');
    }

    /**
     * Halaman kelola soal untuk 1 kuis.
     */
    public function soalIndex($kuis_id)
    {
        $mentorId = $this->currentMentorId();

        $kuis = DB::table('kuis')
            ->join('materi', 'kuis.materi_id', '=', 'materi.materi_id')
            ->join('mata_pelajaran', 'materi.mata_pelajaran_id', '=', 'mata_pelajaran.mata_pelajaran_id')
            ->where('kuis.kuis_id', $kuis_id)
            ->select(
                'kuis.*',
                'materi.judul_materi',
                'mata_pelajaran.nama_matapelajaran',
                'mata_pelajaran.mata_pelajaran_id'
            )
            ->first();

        if (!$kuis) {
            abort(404, 'Kuis tidak ditemukan.');
        }

        // OPTIONAL SECURITY
        // if ($mentorId && (int)$kuis->mentor_id !== (int)$mentorId) abort(403, 'Anda tidak punya akses ke kuis ini.');

        $soal = DB::table('soal')
            ->where('kuis_id', $kuis_id)
            ->orderBy('soal_id')
            ->get();

        return view('mentor.kuis-soal', compact('kuis', 'soal'));
    }

    /**
     * Simpan soal untuk 1 kuis.
     */
    public function soalStore(Request $request, $kuis_id)
    {
        $kuis = DB::table('kuis')->where('kuis_id', $kuis_id)->first();
        if (!$kuis) {
            abort(404, 'Kuis tidak ditemukan.');
        }

        $validated = $request->validate([
            'pertanyaan'      => 'required|string',
            'opsi_jawaban_1'  => 'required|string|max:255',
            'opsi_jawaban_2'  => 'required|string|max:255',
            'opsi_jawaban_3'  => 'required|string|max:255',
            'opsi_jawaban_4'  => 'required|string|max:255',
            'jawaban_benar'   => 'required|in:1,2,3,4',
        ]);

        DB::table('soal')->insert([
            'kuis_id'        => $kuis_id,
            'soal'           => $validated['pertanyaan'],
            'opsi1'          => $validated['opsi_jawaban_1'],
            'opsi2'          => $validated['opsi_jawaban_2'],
            'opsi3'          => $validated['opsi_jawaban_3'],
            'opsi4'          => $validated['opsi_jawaban_4'],
            // Simpan kunci sebagai angka 1-4 (sesuai pilihan)
            'jawaban_benar'  => $validated['jawaban_benar'],
            'created_at'     => now(),
            'updated_at'     => now(),
        ]);

        return back()->with('success', 'Soal berhasil ditambahkan!');
    }

    /**
     * Tampilkan form edit kuis.
     */
    public function edit($kuis_id)
    {
        $mentorId = $this->currentMentorId();

        $kuis = DB::table('kuis')
            ->join('materi', 'kuis.materi_id', '=', 'materi.materi_id')
            ->join('mata_pelajaran', 'materi.mata_pelajaran_id', '=', 'mata_pelajaran.mata_pelajaran_id')
            ->where('kuis.kuis_id', $kuis_id)
            ->select(
                'kuis.*',
                'materi.mata_pelajaran_id',
                'mata_pelajaran.nama_matapelajaran'
            )
            ->first();

        if (!$kuis) {
            abort(404, 'Kuis tidak ditemukan.');
        }

        // OPTIONAL SECURITY
        // if ($mentorId && (int)$kuis->mentor_id !== (int)$mentorId) abort(403, 'Anda tidak punya akses ke kuis ini.');

        // Ambil semua materi yang masih di mapel yang sama
        $materi = DB::table('materi')
            ->where('mata_pelajaran_id', $kuis->mata_pelajaran_id)
            ->orderByDesc('materi_id')
            ->get();

        return view('mentor.kuis-edit', compact('kuis', 'materi'));
    }

    /**
     * Proses update kuis.
     */
    public function update(Request $request, $kuis_id)
    {
        $mentorId = $this->currentMentorId();

        // Ambil kuis + info mapel-nya
        $kuis = DB::table('kuis')
            ->join('materi', 'kuis.materi_id', '=', 'materi.materi_id')
            ->join('mata_pelajaran', 'materi.mata_pelajaran_id', '=', 'mata_pelajaran.mata_pelajaran_id')
            ->where('kuis.kuis_id', $kuis_id)
            ->select('kuis.*', 'materi.mata_pelajaran_id')
            ->first();

        if (!$kuis) {
            abort(404, 'Kuis tidak ditemukan.');
        }

        // OPTIONAL SECURITY
        // if ($mentorId && (int)$kuis->mentor_id !== (int)$mentorId) abort(403, 'Anda tidak punya akses ke kuis ini.');

        $validated = $request->validate([
            'materi_id' => 'required|integer',
            'nama_kuis' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        // Materi pengganti harus masih dalam mapel yang sama
        $materiValid = DB::table('materi')
            ->where('materi_id', $validated['materi_id'])
            ->where('mata_pelajaran_id', $kuis->mata_pelajaran_id)
            ->exists();

        if (!$materiValid) {
            return back()->withErrors(['materi_id' => 'Materi tidak valid untuk mapel ini.'])->withInput();
        }

        DB::table('kuis')
            ->where('kuis_id', $kuis_id)
            ->update([
                'materi_id'  => $validated['materi_id'],
                'nama_kuis'  => $validated['nama_kuis'],
                'deskripsi'  => $validated['deskripsi'] ?? null,
                'updated_at' => now(),
            ]);

        return back()->with('success', 'Kuis berhasil diperbarui.');
    }

    /**
     * Hapus kuis (beserta soal apabila tidak pakai FK cascade).
     */
    public function destroy($kuis_id)
    {
        $mentorId = $this->currentMentorId();

        $kuis = DB::table('kuis')->where('kuis_id', $kuis_id)->first();
        if (!$kuis) {
            abort(404, 'Kuis tidak ditemukan.');
        }

        // OPTIONAL SECURITY
        // if ($mentorId && (int)$kuis->mentor_id !== (int)$mentorId) abort(403, 'Anda tidak punya akses ke kuis ini.');

        // Hapus soal terkait (jika belum pakai ON DELETE CASCADE)
        DB::table('soal')->where('kuis_id', $kuis_id)->delete();

        // Hapus kuis
        DB::table('kuis')->where('kuis_id', $kuis_id)->delete();

        return back()->with('success', 'Kuis berhasil dihapus.');
    }
}
