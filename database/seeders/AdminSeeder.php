<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('admin')->insert([
            [
                'nama_admin' => 'Admin Utama',
                'username' => 'admin1',
                'password' => Hash::make('123456'),
<<<<<<< HEAD
=======
                'email' => 'admin1@gmail.com',
>>>>>>> 59e06d7876bf11aebd24c69e67c75f8c1dd96929
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
