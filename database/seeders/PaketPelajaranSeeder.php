<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PaketPelajaran;

class PaketPelajaranSeeder extends Seeder
{
    public function run(): void
    {
        PaketPelajaran::create([
            'siswa_id' => 1,
            'nama_paket_pelajaran' => 'Paket A - SD',
            'deskripsi' => 'Akses 1 bulan untuk materi dasar semua pelajaran inti.',
            'jenjang' => 'SD',
            'harga' => 'Rp500.000',
        ]);

        PaketPelajaran::create([
            'siswa_id' => 2,
            'nama_paket_pelajaran' => 'Paket B - SMP',
            'deskripsi' => 'Akses 3 bulan dengan kelas interaktif dan evaluasi mingguan.',
            'jenjang' => 'SMP',
            'harga' => 'Rp1.000.000',
        ]);

        PaketPelajaran::create([
            'siswa_id' => 2,
            'nama_paket_pelajaran' => 'Paket C - SMA',
            'deskripsi' => 'Akses 6 bulan + mentor pribadi + konsultasi setiap minggu.',
            'jenjang' => 'SMA',
            'harga' => 'Rp1.500.000',
        ]);
    }
}
