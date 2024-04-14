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
            $table->string('idPembayaranUser', 255)->primary();
            $table->date('Tanggal_Tagihan'); 
            $table->integer('Jumlah');
            $table->string('Bukti'); 
            $table->boolean('Status')->default(false);
            $table->timestamps(); 
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