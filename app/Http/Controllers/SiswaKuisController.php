<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiswaKuisController extends Controller
{
    public function show($kuis_id)
    {
        $kuis = DB::table('kuis')
            ->join('materi', 'kuis.materi_id', '=', 'materi.materi_id')
            ->join('mata_pelajaran', 'materi.mata_pelajaran_id', '=', 'mata_pelajaran.mata_pelajaran_id')
            ->where('kuis.kuis_id', $kuis_id)
            ->select('kuis.*', 'materi.judul_materi', 'mata_pelajaran.nama_matapelajaran')
            ->first();

        if (!$kuis)
            abort(404, 'Kuis tidak ditemukan.');

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

        if ($soal->isEmpty())
            abort(404, 'Soal tidak ditemukan.');

        // validasi: semua soal harus dijawab
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
            if ($pilih === (string) $s->jawaban_benar)
                $benar++;
        }

        $skor = $total > 0 ? round(($benar / $total) * 100) : 0;

        // balik ke halaman yang sama, tampilkan hasil
        return redirect()->route('siswa.kuis.kerjakan', $kuis_id)
            ->with('hasil', [
                'benar' => $benar,
                'total' => $total,
                'skor' => $skor,
            ]);
    }
    public function step($kuis_id, $no)
    {
        $kuis = DB::table('kuis')
            ->join('materi', 'kuis.materi_id', '=', 'materi.materi_id')
            ->join('mata_pelajaran', 'materi.mata_pelajaran_id', '=', 'mata_pelajaran.mata_pelajaran_id')
            ->where('kuis.kuis_id', $kuis_id)
            ->select('kuis.*', 'materi.judul_materi', 'mata_pelajaran.nama_matapelajaran')
            ->first();

        if (!$kuis)
            abort(404);

        $soalList = DB::table('soal')
            ->where('kuis_id', $kuis_id)
            ->orderBy('soal_id')
            ->get();

        $total = $soalList->count();
        if ($total === 0)
            return back()->with('error', 'Soal belum ada.');

        $no = (int) $no;
        if ($no < 1)
            return redirect()->route('siswa.kuis.step', [$kuis_id, 1]);
        if ($no > $total)
            return redirect()->route('siswa.kuis.step', [$kuis_id, $total]);

        $soal = $soalList[$no - 1];

        // ambil jawaban sementara dari session
        $jawabanSession = session("quiz_$kuis_id", []);
        $selected = $jawabanSession[$soal->soal_id] ?? null;

        return view('Siswa.kerjakan-kuis-step', compact('kuis', 'soal', 'no', 'total', 'selected'));
    }

    public function saveStep(Request $request, $kuis_id, $no)
    {
        $soalList = DB::table('soal')
            ->where('kuis_id', $kuis_id)
            ->orderBy('soal_id')
            ->get();

        $total = $soalList->count();
        if ($total === 0)
            abort(404);

        $no = (int) $no;
        if ($no < 1)
            $no = 1;
        if ($no > $total)
            $no = $total;

        $soal = $soalList[$no - 1];

        // simpan jawaban yang dipilih untuk soal ini ke session
        $pilih = $request->input('jawaban'); // 1-4
        if ($pilih) {
            $data = session("quiz_$kuis_id", []);
            $data[$soal->soal_id] = (string) $pilih;
            session(["quiz_$kuis_id" => $data]);
        }

        // tombol mana yang ditekan?
        if ($request->has('prev')) {
            return redirect()->route('siswa.kuis.step', [$kuis_id, max(1, $no - 1)]);
        }

        if ($request->has('next')) {
            return redirect()->route('siswa.kuis.step', [$kuis_id, min($total, $no + 1)]);
        }

        // SUBMIT: hitung skor dari session
        if ($request->has('submit')) {
            $jawabanSession = session("quiz_$kuis_id", []);

            // validasi semua soal harus dijawab
            foreach ($soalList as $s) {
                if (!isset($jawabanSession[$s->soal_id])) {
                    return redirect()->route('siswa.kuis.step', [$kuis_id, $no])
                        ->with('error', 'Masih ada soal yang belum dijawab!');
                }
            }

            $benar = 0;
            foreach ($soalList as $s) {
                if ((string) $jawabanSession[$s->soal_id] === (string) $s->jawaban_benar)
                    $benar++;
            }

            $skor = round(($benar / $total) * 100);

            // optional: bersihin session quiz biar bisa ulang
            session()->forget("quiz_$kuis_id");

            return redirect()->route('siswa.kuis.step', [$kuis_id, 1])
                ->with('hasil', ['benar' => $benar, 'total' => $total, 'skor' => $skor]);
        }

        // default kalau ga ada tombol
        return redirect()->route('siswa.kuis.step', [$kuis_id, $no]);
    }
}
