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
        Schema::create('staff', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('id_divisi');
            $table->string('nama_staff');
            $table->string('alamat');
            $table->string('tpt_lahir');
            $table->string('tgl_lahir');
            $table->string('status')->default(0);
            $table->string('no_tlp', 12);
            $table->timestamps();

            $table->foreign('id_divisi')->references('id')->on('divisis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff');
    }
};
