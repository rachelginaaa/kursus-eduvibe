<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kuis', function (Blueprint $table) {
            $table->id('kuis_id');

            $table->unsignedBigInteger('materi_id');
            $table->foreign('materi_id')
                ->references('materi_id')
                ->on('materi')
                ->onDelete('cascade');

            $table->unsignedBigInteger('mentor_id');
            $table->foreign('mentor_id')
                ->references('mentor_id')
                ->on('mentor')
                ->onDelete('cascade');

            $table->string('nama_kuis');
            $table->text('deskripsi')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kuis');
    }
};
