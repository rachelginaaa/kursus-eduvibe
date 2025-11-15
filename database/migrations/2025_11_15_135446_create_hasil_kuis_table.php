<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('hasil_kuis', function (Blueprint $table) {
            $table->id('hasil_kuis_id');

            $table->unsignedBigInteger('kuis_id');
            $table->foreign('kuis_id')
                ->references('kuis_id')
                ->on('kuis')
                ->onDelete('cascade');


            $table->integer('skor');
            $table->timestamp('tgl_mengerjakan')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hasil_kuis');
    }
};
