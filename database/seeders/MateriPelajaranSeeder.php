<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MateriPelajaranSeeder extends Seeder
{
    public function run()
    {
        $now = now();

        // Template materi (5 materi per mapel)
        $templateMateri = [
            'Pengenalan & Dasar-Dasar',
            'Konsep Inti',
            'Contoh dan Penerapan',
            'Latihan Soal & Pembahasan',
            'Evaluasi Bab',
        ];

        // Ambil semua mata pelajaran
        $mataPelajarans = DB::table('mata_pelajaran')->get();

        $insertData = [];

        foreach ($mataPelajarans as $mapel) {
            foreach ($templateMateri as $judul) {
                $insertData[] = [
                    'mata_pelajaran_id' => $mapel->mata_pelajaran_id, // ✅ AMAN
                    'pengampu' => 'Mentor ' . $mapel->mentor_id,
                    'judul_materi' => $mapel->nama_matapelajaran . ' - ' . $judul,
                    'deskripsi' => 'Materi "' . $judul . '" untuk mata pelajaran ' . $mapel->nama_matapelajaran . '.',
                    'file' => null,
                    'tgl_upload' => $now,
                    'jenjang' => $mapel->jenjang,
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
            }
        }

        DB::table('materi')->insert($insertData);
    }
}
