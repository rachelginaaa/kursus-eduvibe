<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mata_pelajaran', function (Blueprint $table) {
            $table->id('mata_pelajaran_id');

            // FK ke tabel mentor (harus pakai references karena PK-nya mentor_id)
            $table->unsignedBigInteger('mentor_id');
            $table->foreign('mentor_id')
                ->references('mentor_id')
                ->on('mentor')
                ->onDelete('cascade');

            // FK ke tabel siswa (harus pakai references karena PK-nya siswa_id)
            $table->unsignedBigInteger('paket_pelajaran_id');
            $table->foreign('paket_pelajaran_id')
                ->references('paket_pelajaran_id')
                ->on('paket_pelajaran')
                ->onDelete('cascade');

            $table->string('nama_matapelajaran');
            $table->text('deskripsi')->nullable();
            $table->string('jenjang');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mata_pelajaran');
    }
};

