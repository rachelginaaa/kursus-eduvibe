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
            $table->string('email')->unique();
            $table->string('password'); // biasanya disimpan hashed (255 default cukup)
            $table->string('keahlian');
            $table->string('no_hp', 20)->nullable(); // batasi length biar rapih
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mentor');
    }
};
