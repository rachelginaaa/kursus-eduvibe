<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jawaban_benar', function (Blueprint $table) {
            $table->id('jawaban_id');

            $table->unsignedBigInteger('soal_id');
            $table->foreign('soal_id')
                ->references('soal_id')
                ->on('soal')
                ->onDelete('cascade');

             // sesuai diagram
            $table->unsignedBigInteger('jawaban_siswa_id');
            $table->foreign('jawaban_siswa_id')
                ->references('jawaban_siswa_id')
                ->on('jawaban_siswa')
                ->onDelete('cascade');

            $table->string('jawaban_benar');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jawaban_benar');
    }
};
