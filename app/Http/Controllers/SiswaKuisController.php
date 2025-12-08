<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SiswaKuisController extends Controller
{
    // =============================
    // MODE LAMA: tampil semua soal sekaligus (optional)
    // =============================
    public function show($kuis_id)
    {
        $kuis = DB::table('kuis')
            ->join('materi', 'kuis.materi_id', '=', 'materi.materi_id')
            ->join('mata_pelajaran', 'materi.mata_pelajaran_id', '=', 'mata_pelajaran.mata_pelajaran_id')
            ->where('kuis.kuis_id', $kuis_id)
            ->select('kuis.*', 'materi.judul_materi', 'mata_pelajaran.nama_matapelajaran')
            ->first();

        if (!$kuis) abort(404, 'Kuis tidak ditemukan.');

        $soal = DB::table('soal')
            ->where('kuis_id', $kuis_id)
            ->orderBy('soal_id')
            ->get();

        if ($soal->isEmpty()) {
            return back()->with('error', 'Soal untuk kuis ini belum ada.');
        }

        return view('Siswa.kerjakan-kuis', compact('kuis', 'soal'));
    }

    public function submit(Request $request, $kuis_id)
    {
        $soal = DB::table('soal')
            ->where('kuis_id', $kuis_id)
            ->orderBy('soal_id')
            ->get();

        if ($soal->isEmpty()) abort(404, 'Soal tidak ditemukan.');

        // Validasi: semua soal wajib dijawab
        $jawaban = $request->input('jawaban', []);
        foreach ($soal as $s) {
            if (!isset($jawaban[$s->soal_id])) {
                return back()->with('error', 'Semua soal wajib dijawab sebelum submit!')->withInput();
            }
        }

        $benar = 0;
        $total = $soal->count();

        foreach ($soal as $s) {
            $pilih = (string) ($jawaban[$s->soal_id] ?? '');
            if ($pilih === (string) $s->jawaban_benar) $benar++;
        }

        $skor = $total > 0 ? round(($benar / $total) * 100) : 0;

        $this->saveHasilKuis($kuis_id, $skor);

        // (Mode lama) tetap balik ke halaman kerjakan-kuis
        return redirect()->route('siswa.kuis.kerjakan', $kuis_id)
            ->with('hasil', ['benar' => $benar, 'total' => $total, 'skor' => $skor]);
    }

    // =============================
    // MODE STEPPER: 1 soal per halaman
    // =============================
    public function step($kuis_id, $no)
    {
        $kuis = DB::table('kuis')
            ->join('materi', 'kuis.materi_id', '=', 'materi.materi_id')
            ->join('mata_pelajaran', 'materi.mata_pelajaran_id', '=', 'mata_pelajaran.mata_pelajaran_id')
            ->where('kuis.kuis_id', $kuis_id)
            ->select('kuis.*', 'materi.judul_materi', 'mata_pelajaran.nama_matapelajaran')
            ->first();

        if (!$kuis) abort(404, 'Kuis tidak ditemukan.');

        $soalList = DB::table('soal')
            ->where('kuis_id', $kuis_id)
            ->orderBy('soal_id')
            ->get();

        $total = $soalList->count();
        if ($total === 0) {
            return back()->with('error', 'Soal untuk kuis ini belum ada.');
        }

        $no = (int) $no;
        if ($no < 1) return redirect()->route('siswa.kuis.step', [$kuis_id, 1]);
        if ($no > $total) return redirect()->route('siswa.kuis.step', [$kuis_id, $total]);

        $soal = $soalList[$no - 1];

        // Jawaban sementara dari session
        $jawabanSession = session("quiz_$kuis_id", []);
        $selected = $jawabanSession[$soal->soal_id] ?? null;

        return view('Siswa.kerjakan-kuis-step', compact('kuis', 'soal', 'no', 'total', 'selected', 'soalList'));
    }

    public function saveStep(Request $request, $kuis_id, $no)
    {
        $soalList = DB::table('soal')
            ->where('kuis_id', $kuis_id)
            ->orderBy('soal_id')
            ->get();

        $total = $soalList->count();
        if ($total === 0) abort(404, 'Soal tidak ditemukan.');

        $no = (int) $no;
        if ($no < 1) $no = 1;
        if ($no > $total) $no = $total;

        $soal = $soalList[$no - 1];

        // Simpan jawaban pilihan untuk soal ini ke session
        $pilih = $request->input('jawaban'); // 1-4
        if (!is_null($pilih) && $pilih !== '') {
            $data = session("quiz_$kuis_id", []);
            $data[$soal->soal_id] = (string) $pilih;
            session(["quiz_$kuis_id" => $data]);
        }

        // Prev / Next
        if ($request->has('prev')) {
            return redirect()->route('siswa.kuis.step', [$kuis_id, max(1, $no - 1)]);
        }

        if ($request->has('next')) {
            return redirect()->route('siswa.kuis.step', [$kuis_id, min($total, $no + 1)]);
        }

        // SUBMIT (stepper)
        if ($request->has('submit')) {
            $jawabanSession = session("quiz_$kuis_id", []);

            // Validasi: semua soal harus dijawab
            foreach ($soalList as $s) {
                if (!isset($jawabanSession[$s->soal_id])) {
                    return redirect()->route('siswa.kuis.step', [$kuis_id, $no])
                        ->with('error', 'Masih ada soal yang belum dijawab!');
                }
            }

            $benar = 0;
            foreach ($soalList as $s) {
                if ((string) $jawabanSession[$s->soal_id] === (string) $s->jawaban_benar) {
                    $benar++;
                }
            }

            $skor = $total > 0 ? round(($benar / $total) * 100) : 0;

            $this->saveHasilKuis($kuis_id, $skor);

            // bersihin session quiz biar bisa ulang
            session()->forget("quiz_$kuis_id");

            return redirect()->route('siswa.kuis.hasil', $kuis_id)
                ->with('hasil', ['benar' => $benar, 'total' => $total, 'skor' => $skor]);
        }

        // default
        return redirect()->route('siswa.kuis.step', [$kuis_id, $no]);
    }

    // =============================
    // Helper: simpan skor ke tabel hasil_kuis
    // =============================
    private function saveHasilKuis($kuis_id, $skor)
    {
        $siswa = Auth::guard('siswa')->user();

        if (!$siswa) abort(403, 'Anda belum login sebagai siswa.');

        $siswa_id = $siswa->siswa_id ?? null;
        if (!$siswa_id) abort(500, 'siswa_id tidak ditemukan pada user siswa yang login.');

        DB::table('hasil_kuis')->updateOrInsert(
            ['siswa_id' => $siswa_id, 'kuis_id' => $kuis_id],
            [
                'skor' => (int) $skor,
                'tgl_mengerjakan' => now(),
                'updated_at' => now(),
                // biar created_at ga selalu ketimpa setiap update:
                'created_at' => DB::raw('COALESCE(created_at, NOW())'),
            ]
        );
    }

    // =============================
    // HALAMAN HASIL + ULANGI
    // =============================
    public function hasil($kuis_id)
    {
        $kuis = DB::table('kuis')
            ->join('materi', 'kuis.materi_id', '=', 'materi.materi_id')
            ->join('mata_pelajaran', 'materi.mata_pelajaran_id', '=', 'mata_pelajaran.mata_pelajaran_id')
            ->where('kuis.kuis_id', $kuis_id)
            ->select('kuis.*', 'materi.judul_materi', 'mata_pelajaran.nama_matapelajaran', 'materi.mata_pelajaran_id')
            ->first();

        if (!$kuis) abort(404, 'Kuis tidak ditemukan.');

        $hasil = session('hasil');
        if (!$hasil) {
            return redirect()->route('siswa.kuis.step', [$kuis_id, 1])
                ->with('error', 'Hasil kuis belum tersedia. Silakan submit kuis terlebih dahulu.');
        }

        return view('Siswa.hasil-kuis', compact('kuis', 'hasil'));
    }

    public function ulang($kuis_id)
    {
        session()->forget("quiz_$kuis_id");

        return redirect()->route('siswa.kuis.step', [$kuis_id, 1])
            ->with('success', 'Silakan kerjakan ulang kuis.');
    }
}
