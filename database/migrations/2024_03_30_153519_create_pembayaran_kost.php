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
        Schema::create('pembayaran_kost', function (Blueprint $table) {
            $table->id();
            $table->string('id_Pembayaran_Kost');
            $table->integer('tagihan_Pembayaran_Kost');
            $table->date('tanggal_Pemabayaran_Kost');
            $table->string('bukti_Pembayaran_Kost');
            $table->enum('status',['Sudah Lunas','Belum Lunas']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran_kost');
    }
};
