<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('leaderboard', function (Blueprint $table) {
            $table->id('leaderboard_id');

            // FK ke siswa
            $table->unsignedBigInteger('siswa_id');
            $table->foreign('siswa_id')
                ->references('siswa_id')
                ->on('siswa')
                ->onDelete('cascade');

            // FK ke mata pelajaran
            $table->unsignedBigInteger('mata_pelajaran_id');
            $table->foreign('mata_pelajaran_id')
                ->references('mata_pelajaran_id')
                ->on('mata_pelajaran')
                ->onDelete('cascade');

            // FK ke hasil (belum jelas tabelnya apa)
            $table->unsignedBigInteger('hasil_id')->nullable();
            // Kalau kamu sudah tahu tabelnya, tinggal ganti:
            // ->references('hasil_id')->on('hasil')->onDelete('cascade');

            $table->integer('total_poin')->default(0);
            $table->integer('peringkat')->nullable();
            $table->date('tgl_update')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('leaderboard');
    }
};
