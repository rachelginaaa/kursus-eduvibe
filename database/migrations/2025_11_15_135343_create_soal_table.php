<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('soal', function (Blueprint $table) {
            $table->id('soal_id');

            $table->unsignedBigInteger('kuis_id');
            $table->foreign('kuis_id')
                ->references('kuis_id')
                ->on('kuis')
                ->onDelete('cascade');

            $table->text('soal');
            $table->string('opsi1');
            $table->string('opsi2');
            $table->string('opsi3');
            $table->string('opsi4');

            $table->string('jawaban_benar'); // atau integer jika pilihan 1–4

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('soal');
    }
};
