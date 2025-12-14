<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('kuis', function (Blueprint $table) {
            $table->integer('durasi_menit')->default(10);
        });
    }

    public function down()
    {
        Schema::table('kuis', function (Blueprint $table) {
            $table->dropColumn('durasi_menit');
        });
    }
};
