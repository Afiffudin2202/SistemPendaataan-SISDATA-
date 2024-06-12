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
        Schema::create('rapors', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('id_siswa');
            $table->uuid('id_periode');
            $table->string('passing');
            $table->string('dribling');
            $table->string('control');
            $table->string('intercept');
            $table->string('heading');
            $table->string('shooting');
            $table->string('leadership');
            $table->string('attitude');
            $table->string('communication');
            $table->string('notes');

            $table->foreign('id_siswa')->references('id')->on('siswas')->onDelete('cascade');
            $table->foreign('id_periode')->references('id')->on('periodes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rapors');
    }
};
