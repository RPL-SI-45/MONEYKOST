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
        Schema::create('daftar_menu_makanan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_makanan');
            $table->string('harga_makanan');
            $table->string('gambar_makanan');
            $table->string('tipe_makanan');
            $table->string('deskripsi_makanan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daftar_menu_makanan');
    }
};
