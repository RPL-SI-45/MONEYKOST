<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_wifi')->insert([
            'id_customer' => 1,
            'tanggal_tagihan' => '2024-03-22',
            'paket' => '10 Mbps',
            'jumlah' => '75.000',
            'bukti' => 'bruce-mars.jpg',
            'status' => 'lunas',
        ]);
        DB::table('payment_wifi')->insert([
            'id_customer' => 1,
            'tanggal_tagihan' => '2024-03-27',
            'paket' => '20 Mbps',
            'jumlah' => '125.000',
            'bukti' => '',
            'status' => 'belum lunas',
        ]);
    }
}