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
        Schema::create('jawaban', function (Blueprint $table) {
            $table->id('id_jawaban');
            $table->unsignedBigInteger('siswa_id');
            $table->foreign('siswa_id')
                ->references('siswa_id')
                ->on('siswa')
                ->onDelete('cascade');

            $table->string('opsi_1')->nullable();
            $table->string('opsi_2')->nullable();
            $table->string('opsi_3')->nullable();
            $table->string('opsi_4')->nullable();
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jawaban');
    }
};
