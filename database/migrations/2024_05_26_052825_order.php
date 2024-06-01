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
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_customer');
            $table->string('nama_customer');
            $table->string('nama_makanan');
            $table->string('qty');
            $table->string('kamar');
            $table->string('status');
            $table->timestamps();
        Schema::table('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->nullable()->after('nama_customer');
            $table->foreign('id')->references('id')->on('daftar_menu_makanan');
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['id']);
            $table->dropColumn('id');
        });
    }
};
