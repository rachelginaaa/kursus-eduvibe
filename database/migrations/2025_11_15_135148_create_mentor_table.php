<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mentor', function (Blueprint $table) {
            $table->id('mentor_id');
            $table->string('nama');
            $table->string('password');
            $table->string('email')->unique();
            $table->string('keahlian');
            $table->string('no_hp')->nullable();
            $table->string('role', 20);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mentor');
    }
};
