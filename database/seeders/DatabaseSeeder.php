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

        DB::table('users')->insert([
            'username' => 'ujang',
            'email' => 'ujang@gmail.com',
            'password' => bcrypt('123'),
            'auth' => 'customer',

        // DB::table('payment_wifi')->insert([
        //     'id_customer' => 1,
        //     'tanggal_tagihan' => '2024-03-22',
        //     'paket' => '10 Mbps',
        // ]);

        DB::table('pembayaran')->insert([
            'id_customer' => 1,
            'tanggal_tagihan' => '2024-03-22',
            'berat' => '10 KG',
            'jumlah' => '75.000',
            'bukti' => 'bruce-mars.jpg',
            'status' => 'lunas',
        ]);

        // DB::table('payment_wifi')->insert([
        //     'id_customer' => 1,
        //     'tanggal_tagihan' => '2024-03-27',
        //     'paket' => '20 Mbps',
        // ]);

        DB::table('pembayaran')->insert([
            'id_customer' => 1,
            'tanggal_tagihan' => '2024-03-27',
            'berat' => '20 KG',
            'jumlah' => '125.000',
            'bukti' => '',
            'status' => 'belum lunas',
        ]);
    }
}