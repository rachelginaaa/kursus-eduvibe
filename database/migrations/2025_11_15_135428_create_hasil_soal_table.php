<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('hasil_soal', function (Blueprint $table) {
            $table->id('hasil_id');

            $table->unsignedBigInteger('jawaban_id');
            $table->foreign('jawaban_id')
                ->references('jawaban_id')
                ->on('jawaban_benar')
                ->onDelete('cascade');

            

            $table->integer('skor');
            $table->timestamp('tgl_mengerjakan')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hasil_soal');
    }
};
