<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MakananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('daftar_menu_makanan')->insert([
            [
                'nama_makanan' => 'Nasi Goreng',
                'harga_makanan' => '15000',
                'gambar_makanan' => 'nasi_goreng.jpg',
                'tipe_makanan' => 'Main Course',
                'deskripsi_makanan' => 'Nasi goreng with chicken and vegetables',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_makanan' => 'Mie Ayam',
                'harga_makanan' => '12000',
                'gambar_makanan' => 'mie_ayam.jpg',
                'tipe_makanan' => 'Main Course',
                'deskripsi_makanan' => 'Delicious noodle soup with chicken',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_makanan' => 'Sate Ayam',
                'harga_makanan' => '20000',
                'gambar_makanan' => 'sate_ayam.jpg',
                'tipe_makanan' => 'Main Course',
                'deskripsi_makanan' => 'Grilled chicken skewers with peanut sauce',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more items as needed
        ]);
    }
}
