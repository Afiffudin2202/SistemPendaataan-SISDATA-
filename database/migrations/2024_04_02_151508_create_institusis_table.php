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
        Schema::create('institusis', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nama_institusi', 100);
            $table->string('alamat', 255);
            $table->string('no_tlp', 12);
            $table->string('email', 50);
            $table->string('instagram', 50);
            $table->string('tiktok', 50);
            $table->string('nama_pimpinan', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('institusis');
    }
};
