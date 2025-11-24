<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MateriPelajaranSeeder extends Seeder
{
    public function run()
    {
        // Daftar materi otomatis (5 materi per mapel)
        $templateMateri = [
            'Pengenalan & Dasar-Dasar',
            'Konsep Inti',
            'Contoh dan Penerapan',
            'Latihan Soal & Pembahasan',
            'Evaluasi Bab'
        ];

        // Daftar mata pelajaran: id => [nama_mapel, mentor_id, jenjang]
        $mapelData = [
            1 => ['Matematika Wajib', 1, 'SMA'],
            2 => ['Fisika', 4, 'SMA'],
            3 => ['Biologi', 6, 'SMA'],
            4 => ['Kimia', 8, 'SMA'],
            5 => ['Matematika Peminatan', 10, 'SMA'],
            6 => ['Geografi', 12, 'SMA'],
            7 => ['Informatika', 14, 'SMA'],
            8 => ['Bahasa Inggris', 16, 'SMA'],
            9 => ['Bahasa Indonesia', 17, 'SMA'],
            10 => ['Sejarah Indonesia', 19, 'SMA'],
            11 => ['Sejarah', 30, 'SMA'],
            12 => ['Pendidikan Pancasila', 22, 'SMA'],
            13 => ['Pendidikan Jasmani', 23, 'SMA'],
            14 => ['Ekonomi', 26, 'SMA'],
            15 => ['Sosiologi', 28, 'SMA'],
            16 => ['Pendidikan Agama', 31, 'SMA'],
            17 => ['PPKn', 34, 'SMA'],
            18 => ['Kewirausahaan', 36, 'SMA'],
            19 => ['Bahasa Jepang', 37, 'SMA'],
            20 => ['Bahasa Arab', 39, 'SMA'],
            21 => ['Bahasa Jerman', 42, 'SMA'],
            22 => ['Antropologi', 44, 'SMA'],
            23 => ['Matematika Wajib', 1, 'SMA'],  // paket pelajaran 2
            24 => ['Fisika', 4, 'SMA'],
            25 => ['Biologi', 5, 'SMA'],
        ];

        $insertData = [];

        foreach ($mapelData as $mapelId => $data) {
            [$namaMapel, $mentorId, $jenjang] = $data;

            foreach ($templateMateri as $index => $judul) {
                $insertData[] = [
                    'mata_pelajaran_id' => $mapelId,
                    'pengampu' => 'Mentor ' . $mentorId,
                    'judul_materi' => $namaMapel . ' - ' . $judul,
                    'deskripsi' => 'Materi "' . $judul . '" untuk mata pelajaran ' . $namaMapel . '.',
                    'file' => null,
                    'tgl_upload' => now(),
                    'jenjang' => $jenjang,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        DB::table('materi')->insert($insertData);
    }
}
