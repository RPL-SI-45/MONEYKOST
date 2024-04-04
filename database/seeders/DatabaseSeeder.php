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
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123'),
            'auth' => 'admin',
        ]);
        DB::table('users')->insert([
            'username' => 'ujang',
            'email' => 'ujang@gmail.com',
            'password' => bcrypt('123'),
            'auth' => 'customer',
        ]);
        DB::table('pembayaran')->insert([
            'id_customer' => 1,
            'tanggal_tagihan' => '2024-03-22',
            'berat' => '10 KG',
            'jumlah' => '75.000',
            'bukti' => 'bruce-mars.jpg',
            'status' => 'lunas',
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
