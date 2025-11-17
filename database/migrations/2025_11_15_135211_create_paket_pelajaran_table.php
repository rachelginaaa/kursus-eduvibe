<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('paket_pelajaran', function (Blueprint $table) {
            $table->id('paket_pelajaran_id');
            // FK ke tabel siswa (harus pakai references karena PK-nya siswa_id)
            $table->unsignedBigInteger('siswa_id');
            $table->foreign('siswa_id')
                ->references('siswa_id')
                ->on('siswa')
                ->onDelete('cascade');
            $table->string('nama_paket_pelajaran');
            $table->text('deskripsi')->nullable();
            $table->string('jenjang');
            $table->string('harga');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paket_pelajaran');
    }
};
