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
        Schema::create('siswas', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('id_ku');
            $table->string('nama_lengkap');
            $table->string('nama_panggilan');
            $table->string('tpt_lahir');
            $table->string('tgl_lahir');
            $table->string('nama_ayah')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->string('asal_sekolah');
            $table->string('alamat');
            $table->string('agama');
            $table->string('status')->default(0);
            $table->timestamps();

            $table->foreign('id_ku')->references('id')->on('ku_usias')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
