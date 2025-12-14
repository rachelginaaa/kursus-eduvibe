<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MataPelajaranSeeder extends Seeder
{
    public function run()
    {
        $now = now();

        // Ambil semua mentor
        $mentors = DB::table('mentor')->get();

        // Kelompokkan mentor berdasarkan keahlian
        $mentorByKeahlian = [];
        foreach ($mentors as $mentor) {
            $mentorByKeahlian[$mentor->keahlian][] = $mentor->mentor_id;
        }

        // Data manual paket + mata pelajaran
        $pakets = [
            1 => [ // SD
                'jenjang' => 'SD',
                'mata_pelajaran' => [
                    'Matematika',
                    'Bahasa Indonesia',
                    'IPA',
                    'IPS',
                    'Pendidikan Pancasila',
                    'Pendidikan Agama',
                ]
            ],
            2 => [ // SMP
                'jenjang' => 'SMP',
                'mata_pelajaran' => [
                    'Matematika',
                    'Bahasa Indonesia',
                    'Bahasa Inggris',
                    'IPA',
                    'IPS',
                    'Informatika',
                ]
            ],
            3 => [ // SMA
                'jenjang' => 'SMA',
                'mata_pelajaran' => [
                    'Matematika Wajib',
                    'Fisika',
                    'Kimia',
                    'Biologi',
                    'Bahasa Inggris',
                    'Ekonomi',
                ]
            ],
        ];

        $data = [];

        foreach ($pakets as $paketId => $paket) {
            foreach ($paket['mata_pelajaran'] as $nama) {

                // Ambil mentor sesuai keahlian
                if (isset($mentorByKeahlian[$nama])) {
                    $mentorId = $mentorByKeahlian[$nama][array_rand($mentorByKeahlian[$nama])];
                } else {
                    $mentorId = $mentors->random()->mentor_id;
                }

                $data[] = [
                    'paket_pelajaran_id' => $paketId, // pastikan kolom ini ada
                    'mentor_id' => $mentorId,
                    'nama_matapelajaran' => $nama,
                    'deskripsi' => "Pembelajaran $nama untuk jenjang {$paket['jenjang']}.",
                    'jenjang' => $paket['jenjang'],
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
            }
        }

        DB::table('mata_pelajaran')->insert($data);
    }
}
