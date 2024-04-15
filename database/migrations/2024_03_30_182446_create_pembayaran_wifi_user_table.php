<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaranWifiUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran_wifi_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_customer');
            $table->date('tanggal_tagihan');
            $table->string('paket');
            $table->string('jumlah');
            $table->string('bukti');
            $table->string('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembayaran_wifi_users');
    }
}