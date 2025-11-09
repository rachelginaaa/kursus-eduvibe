<?php

namespace Database\Seeders;

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
    }
}
