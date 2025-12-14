<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('mata_pelajaran', function (Blueprint $table) {
            $table->unsignedBigInteger('paket_pelajaran_id')->nullable()->after('mata_pelajaran_id');
            $table->index('paket_pelajaran_id');
        });
    }

    public function down(): void
    {
        Schema::table('mata_pelajaran', function (Blueprint $table) {
            $table->dropIndex(['paket_pelajaran_id']);
            $table->dropColumn('paket_pelajaran_id');
        });
    }
};
