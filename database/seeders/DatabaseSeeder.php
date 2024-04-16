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
        ]);

        DB::table('payment_wifi')->insert([
            'id_customer' => 1,
            'tanggal_tagihan' => '2024-03-22',
            'paket' => '10 Mbps',
            'jumlah' => '120.000',
            'status' => 'belum lunas',
        ]);

        DB::table('pembayaran_kost')->insert([
            'id_customer' => 1,
            'tanggal_tagihan' => '2024-03-22',
            'tipe_kamar' => 'AC',
            'jumlah' => '12.000.000',
            'status' => 'belum lunas',
        ]);

        DB::table('pembayaran_kost')->insert([
            'id_customer' => 1,
            'tanggaltagihan' => '2024-03-22',
            'kwh' => '80',
            'jumlah' => '90.000',
            'status' => 'belum lunas',
        ]);
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