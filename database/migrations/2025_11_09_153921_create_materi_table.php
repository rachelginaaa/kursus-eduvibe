
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('materi', function (Blueprint $table) {
            $table->id('materi_id');

            // FK ke tabel mata_pelajaran
            $table->unsignedBigInteger('mata_pelajaran_id');
            $table->foreign('mata_pelajaran_id')
                ->references('mata_pelajaran_id')
                ->on('mata_pelajaran')
                ->onDelete('cascade');

            $table->string('pengampu');
            $table->string('judul_materi');
            $table->text('deskripsi')->nullable();
            $table->string('file')->nullable();
            $table->date('tgl_upload')->nullable();
            $table->string('jenjang');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('materi');
    }
};
