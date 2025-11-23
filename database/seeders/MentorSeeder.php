<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
class MentorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mentor')->insert([
            [
                'nama' => 'Budi Santoso',
                'password' => Hash::make('password123'),
                'email' => 'budi@example.com',
                'keahlian' => 'Matematika',
                'no_hp' => '08123456789',
            ],
            [
                'nama' => 'Siti Lestari',
                'password' => Hash::make('password123'),
                'email' => 'siti@example.com',
                'keahlian' => 'Fisika',
                'no_hp' => '08987654321',
            ],
        ]);
    }
}
