<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
        public function run(): void
    {
        $data = [
            [
                'nama' => 'Samuel Riguntoro',
                'email' => 'samuel@example.com',
                'password' => Hash::make('123456'),
                'tgl_daftar' => now(),
                'jenjang' => 'SMA',
                'jenis_kelamin' => 'Laki-laki',
                'no_hp' => '081234567890',
                'role' => 'siswa',
            ],
            [
                'nama' => 'Hans Sebastian',
                'email' => 'hans@example.com',
                'password' => Hash::make('654321'),
                'tgl_daftar' => now(),
                'jenjang' => 'SMP',
                'jenis_kelamin' => 'Laki-laki',
                'no_hp' => '082112223333',
                'role' => 'siswa',
            ]
        ];

        foreach ($data as $siswa) {
            DB::table('siswa')->updateOrInsert(
                ['email' => $siswa['email']], // cek berdasarkan email
                array_merge($siswa, [
                    'created_at' => now(),
                    'updated_at' => now(),
                ])
            );
        }
    }
}
