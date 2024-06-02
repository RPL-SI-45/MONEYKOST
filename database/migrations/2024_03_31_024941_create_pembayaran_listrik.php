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
        Schema::create('pembayaran_listrik', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_customer');
            $table->date('tanggaltagihan');
            $table->string('jumlah');
            $table->integer('kwh');
            $table->string('bukti')->nullable();
            $table->enum('status', ['lunas', 'belum']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran_listrik');
    }
};
