<?php

namespace Database\Seeders;

<<<<<<< HEAD
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
class MataPelajaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mata_pelajarans')->insert([
            [
                'mentor_id' => 1,
                'siswa_id' => 1,
                'nama_matapelajaran' => 'Matematika Dasar',
                'deskripsi' => 'Pelajaran dasar aritmatika dan aljabar.',
                'jenjang' => 'SMA',
            ],
            [
                'mentor_id' => 2,
                'siswa_id' => 1,
                'nama_matapelajaran' => 'Fisika Mekanika',
                'deskripsi' => 'Mempelajari hukum Newton dan gerak benda.',
                'jenjang' => 'SMA',
            ],
        ]);
=======
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

        // Daftar semua paket (kosong dulu)
        $paket_mata_pelajaran = [
            1 => [], // Paket 1
            2 => [], // Paket 2
            3 => [], // Paket 3
        ];

        // Daftar mata pelajaran gabungan dari semua paket
        $all_mata_pelajaran = [
            'Matematika Wajib', 'Fisika', 'Biologi', 'Kimia', 'Matematika Peminatan',
            'Geografi', 'Informatika', 'Bahasa Inggris', 'Bahasa Indonesia', 'Sejarah Indonesia',
            'Sejarah', 'Pendidikan Pancasila', 'Pendidikan Jasmani', 'Ekonomi', 'Sosiologi',
            'Pendidikan Agama', 'PPKn', 'Kewirausahaan', 'Bahasa Jepang', 'Bahasa Arab', 'Bahasa Jerman',
            'Antropologi'
        ];

        // Assign semua mata pelajaran ke setiap paket
        foreach ($paket_mata_pelajaran as $paket_id => &$mata_pelajaran) {
            $mata_pelajaran = $all_mata_pelajaran;
        }

        $data = [];

        // Masukkan semua mata pelajaran ke tiap paket dengan mentor sesuai keahlian
        foreach ($paket_mata_pelajaran as $paketId => $mataPelajaranList) {
            foreach ($mataPelajaranList as $nama) {
                // Pilih mentor sesuai keahlian, kalau tidak ada random
                if (isset($mentorByKeahlian[$nama])) {
                    $mentorId = $mentorByKeahlian[$nama][array_rand($mentorByKeahlian[$nama])];
                } else {
                    $mentorId = $mentors->random()->mentor_id;
                }

                $data[] = [
                    'mentor_id' => $mentorId,
                    'paket_pelajaran_id' => $paketId,
                    'nama_matapelajaran' => $nama,
                    'deskripsi' => "Pembelajaran tentang $nama untuk jenjang SMA.",
                    'jenjang' => 'SMA',
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
            }
        }

        DB::table('mata_pelajaran')->insert($data);
>>>>>>> 59e06d7876bf11aebd24c69e67c75f8c1dd96929
    }
}
