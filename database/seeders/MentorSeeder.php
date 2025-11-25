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
                'nama' => 'Ahmad Wijaya',
                'password' => Hash::make('password123'),
                'email' => 'ahmad.matematikawajib1@example.com',
                'keahlian' => 'Matematika Wajib',
                'no_hp' => '081234567890',
                
            ],
            [
                'nama' => 'Siti Rahayu',
                'password' => Hash::make('password123'),
                'email' => 'siti.matematikawajib2@example.com',
                'keahlian' => 'Matematika Wajib',
                'no_hp' => '081234567891',
                
            ],

            // Untuk keahlian: Fisika
            [
                'nama' => 'Budi Santoso',
                'password' => Hash::make('password123'),
                'email' => 'budi.fisika1@example.com',
                'keahlian' => 'Fisika',
                'no_hp' => '081234567892',
                
            ],
            [
                'nama' => 'Dewi Lestari',
                'password' => Hash::make('password123'),
                'email' => 'dewi.fisika2@example.com',
                'keahlian' => 'Fisika',
                'no_hp' => '081234567893',
                
            ],

            // Untuk keahlian: Biologi
            [
                'nama' => 'Eko Prasetyo',
                'password' => Hash::make('password123'),
                'email' => 'eko.biologi1@example.com',
                'keahlian' => 'Biologi',
                'no_hp' => '081234567894',
                
            ],
            [
                'nama' => 'Fajar Nugroho',
                'password' => Hash::make('password123'),
                'email' => 'fajar.biologi2@example.com',
                'keahlian' => 'Biologi',
                'no_hp' => '081234567895',
                
            ],

            // Untuk keahlian: Kimia
            [
                'nama' => 'Gita Sari',
                'password' => Hash::make('password123'),
                'email' => 'gita.kimia1@example.com',
                'keahlian' => 'Kimia',
                'no_hp' => '081234567896',
                
            ],
            [
                'nama' => 'Hadi Susanto',
                'password' => Hash::make('password123'),
                'email' => 'hadi.kimia2@example.com',
                'keahlian' => 'Kimia',
                'no_hp' => '081234567897',
                
            ],

            // Untuk keahlian: Matematika Peminatan
            [
                'nama' => 'Indah Putri',
                'password' => Hash::make('password123'),
                'email' => 'indah.matematikapeminatan1@example.com',
                'keahlian' => 'Matematika Peminatan',
                'no_hp' => '081234567898',
                
            ],
            [
                'nama' => 'Joko Widodo',
                'password' => Hash::make('password123'),
                'email' => 'joko.matematikapeminatan2@example.com',
                'keahlian' => 'Matematika Peminatan',
                'no_hp' => '081234567899',
                
            ],

            // Untuk keahlian: Geografi
            [
                'nama' => 'Kartika Dewi',
                'password' => Hash::make('password123'),
                'email' => 'kartika.geografi1@example.com',
                'keahlian' => 'Geografi',
                'no_hp' => '081234567900',
                
            ],
            [
                'nama' => 'Larasati Ayu',
                'password' => Hash::make('password123'),
                'email' => 'larasati.geografi2@example.com',
                'keahlian' => 'Geografi',
                'no_hp' => '081234567901',
                
            ],

            // Untuk keahlian: Informatika
            [
                'nama' => 'Maman Suparman',
                'password' => Hash::make('password123'),
                'email' => 'maman.informatika1@example.com',
                'keahlian' => 'Informatika',
                'no_hp' => '081234567902',
                
            ],
            [
                'nama' => 'Nadia Amelia',
                'password' => Hash::make('password123'),
                'email' => 'nadia.informatika2@example.com',
                'keahlian' => 'Informatika',
                'no_hp' => '081234567903',
                
            ],

            // Untuk keahlian: Bahasa Inggris
            [
                'nama' => 'Oscar Tanjung',
                'password' => Hash::make('password123'),
                'email' => 'oscar.bahasainggris1@example.com',
                'keahlian' => 'Bahasa Inggris',
                'no_hp' => '081234567904',
                
            ],
            [
                'nama' => 'Putra Mahendra',
                'password' => Hash::make('password123'),
                'email' => 'putra.bahasainggris2@example.com',
                'keahlian' => 'Bahasa Inggris',
                'no_hp' => '081234567905',
                
            ],

            // Untuk keahlian: Bahasa Indonesia
            [
                'nama' => 'Qori Rahman',
                'password' => Hash::make('password123'),
                'email' => 'qori.bahasaindonesia1@example.com',
                'keahlian' => 'Bahasa Indonesia',
                'no_hp' => '081234567906',
                
            ],
            [
                'nama' => 'Rina Susanti',
                'password' => Hash::make('password123'),
                'email' => 'rina.bahasaindonesia2@example.com',
                'keahlian' => 'Bahasa Indonesia',
                'no_hp' => '081234567907',
                
            ],

            // Untuk keahlian: Sejarah Indonesia
            [
                'nama' => 'Surya Pratama',
                'password' => Hash::make('password123'),
                'email' => 'surya.sejarahindonesia1@example.com',
                'keahlian' => 'Sejarah Indonesia',
                'no_hp' => '081234567908',
                
            ],
            [
                'nama' => 'Tina Wijayanti',
                'password' => Hash::make('password123'),
                'email' => 'tina.sejarahindonesia2@example.com',
                'keahlian' => 'Sejarah Indonesia',
                'no_hp' => '081234567909',
                
            ],

            // Untuk keahlian: Pendidikan Pancasila
            [
                'nama' => 'Umar Fauzi',
                'password' => Hash::make('password123'),
                'email' => 'umar.pendidikanpancasila1@example.com',
                'keahlian' => 'Pendidikan Pancasila',
                'no_hp' => '081234567910',
                
            ],
            [
                'nama' => 'Vina Kartika',
                'password' => Hash::make('password123'),
                'email' => 'vina.pendidikanpancasila2@example.com',
                'keahlian' => 'Pendidikan Pancasila',
                'no_hp' => '081234567911',
                
            ],

            // Untuk keahlian: Pendidikan Jasmani
            [
                'nama' => 'Wawan Setiawan',
                'password' => Hash::make('password123'),
                'email' => 'wawan.pendidikanjasmani1@example.com',
                'keahlian' => 'Pendidikan Jasmani',
                'no_hp' => '081234567912',
                
            ],
            [
                'nama' => 'Xena Putri',
                'password' => Hash::make('password123'),
                'email' => 'xena.pendidikanjasmani2@example.com',
                'keahlian' => 'Pendidikan Jasmani',
                'no_hp' => '081234567913',
                
            ],

            // Untuk keahlian: Ekonomi
            [
                'nama' => 'Yanto Budi',
                'password' => Hash::make('password123'),
                'email' => 'yanto.ekonomi1@example.com',
                'keahlian' => 'Ekonomi',
                'no_hp' => '081234567914',
                
            ],
            [
                'nama' => 'Zara Lestari',
                'password' => Hash::make('password123'),
                'email' => 'zara.ekonomi2@example.com',
                'keahlian' => 'Ekonomi',
                'no_hp' => '081234567915',
                
            ],

            // Untuk keahlian: Sosiologi
            [
                'nama' => 'Agus Salim',
                'password' => Hash::make('password123'),
                'email' => 'agus.sosiologi1@example.com',
                'keahlian' => 'Sosiologi',
                'no_hp' => '081234567916',
                
            ],
            [
                'nama' => 'Bunga Citra',
                'password' => Hash::make('password123'),
                'email' => 'bunga.sosiologi2@example.com',
                'keahlian' => 'Sosiologi',
                'no_hp' => '081234567917',
                
            ],

            // Untuk keahlian: Sejarah
            [
                'nama' => 'Cahyo Nugroho',
                'password' => Hash::make('password123'),
                'email' => 'cahyo.sejarah1@example.com',
                'keahlian' => 'Sejarah',
                'no_hp' => '081234567918',
                
            ],
            [
                'nama' => 'Dina Rahmadani',
                'password' => Hash::make('password123'),
                'email' => 'dina.sejarah2@example.com',
                'keahlian' => 'Sejarah',
                'no_hp' => '081234567919',
                
            ],

            // Untuk keahlian: Pendidikan Agama
            [
                'nama' => 'Edi Santoso',
                'password' => Hash::make('password123'),
                'email' => 'edi.pendidikanagama1@example.com',
                'keahlian' => 'Pendidikan Agama',
                'no_hp' => '081234567920',
                
            ],
            [
                'nama' => 'Fina Amelia',
                'password' => Hash::make('password123'),
                'email' => 'fina.pendidikanagama2@example.com',
                'keahlian' => 'Pendidikan Agama',
                'no_hp' => '081234567921',
                
            ],

            // Untuk keahlian: PPKn
            [
                'nama' => 'Guntur Prabowo',
                'password' => Hash::make('password123'),
                'email' => 'guntur.ppkn1@example.com',
                'keahlian' => 'PPKn',
                'no_hp' => '081234567922',
                
            ],
            [
                'nama' => 'Hana Susilo',
                'password' => Hash::make('password123'),
                'email' => 'hana.ppkn2@example.com',
                'keahlian' => 'PPKn',
                'no_hp' => '081234567923',
                
            ],

            // Untuk keahlian: Kewirausahaan
            [
                'nama' => 'Iwan Setiawan',
                'password' => Hash::make('password123'),
                'email' => 'iwan.kewirausahaan1@example.com',
                'keahlian' => 'Kewirausahaan',
                'no_hp' => '081234567924',
                
            ],
            [
                'nama' => 'Julianti Sari',
                'password' => Hash::make('password123'),
                'email' => 'julianti.kewirausahaan2@example.com',
                'keahlian' => 'Kewirausahaan',
                'no_hp' => '081234567925',
                
            ],

            // Untuk keahlian: Bahasa Jepang
            [
                'nama' => 'Kamal Abdullah',
                'password' => Hash::make('password123'),
                'email' => 'kamal.bahasajepang1@example.com',
                'keahlian' => 'Bahasa Jepang',
                'no_hp' => '081234567926',
                
            ],
            [
                'nama' => 'Lina Fitri',
                'password' => Hash::make('password123'),
                'email' => 'lina.bahasajepang2@example.com',
                'keahlian' => 'Bahasa Jepang',
                'no_hp' => '081234567927',
                
            ],

            // Untuk keahlian: Bahasa Arab
            [
                'nama' => 'Miftahul Jannah',
                'password' => Hash::make('password123'),
                'email' => 'miftahul.bahasaarab1@example.com',
                'keahlian' => 'Bahasa Arab',
                'no_hp' => '081234567928',
                
            ],
            [
                'nama' => 'Nugraha Putra',
                'password' => Hash::make('password123'),
                'email' => 'nugraha.bahasaarab2@example.com',
                'keahlian' => 'Bahasa Arab',
                'no_hp' => '081234567929',
                
            ],

            // Untuk keahlian: Bahasa Jerman
            [
                'nama' => 'Oki Ramadhan',
                'password' => Hash::make('password123'),
                'email' => 'oki.bahasajerman1@example.com',
                'keahlian' => 'Bahasa Jerman',
                'no_hp' => '081234567930',
                
            ],
            [
                'nama' => 'Prita Anggraini',
                'password' => Hash::make('password123'),
                'email' => 'prita.bahasajerman2@example.com',
                'keahlian' => 'Bahasa Jerman',
                'no_hp' => '081234567931',
                
            ],

            // Untuk keahlian: Antropologi
            [
                'nama' => 'Qasim Ibrahim',
                'password' => Hash::make('password123'),
                'email' => 'qasim.antropologi1@example.com',
                'keahlian' => 'Antropologi',
                'no_hp' => '081234567932',
                
            ],
            [
                'nama' => 'Rani Sukmawati',
                'password' => Hash::make('password123'),
                'email' => 'rani.antropologi2@example.com',
                'keahlian' => 'Antropologi',
                'no_hp' => '081234567933',
                
            ],
        ]);
    }
}
