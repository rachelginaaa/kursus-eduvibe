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
        Schema::create('hasil_kuis', function (Blueprint $table) {
            $table->id('hasil_id');
            $table->unsignedBigInteger('kuis_id');
            $table->foreign('kuis_id')
                ->references('kuis_id')
                ->on('kuis')
                ->onDelete('cascade');
            $table->unsignedBigInteger('siswa_id');
            $table->foreign('siswa_id')
                ->references('siswa_id')
                ->on('siswa')
                ->onDelete('cascade');
            $table->integer('skor');
            $table->date('tgl_mengerjakan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hasil_kuis');
    }
};
