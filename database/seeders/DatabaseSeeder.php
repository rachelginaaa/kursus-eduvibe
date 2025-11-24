<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call(SiswaSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(MentorSeeder::class);
<<<<<<< HEAD
=======
        $this->call(PaketPelajaranSeeder::class);
        $this->call(MataPelajaranSeeder::class);
        $this->call(MateriPelajaranSeeder::class);


>>>>>>> 59e06d7876bf11aebd24c69e67c75f8c1dd96929
    }

}
