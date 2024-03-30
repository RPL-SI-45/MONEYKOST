<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentWifiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_wifi', function (Blueprint $table) {
            $table->string('idPembayaran')->primary();
            $table->string('nama');
            $table->date('Tanggal_Tagihan');
            $table->string('Paket');
            $table->integer('Jumlah');
            $table->string('Bukti');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_wifi');
    }
}
