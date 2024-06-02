<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PaymentLaundrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id_customer' => 1,
                'tanggal_tagihan' => Carbon::create(2024, 3, 15),
                'berat' => 'berat A',
                'jumlah' => '80000',
                'bukti' => null,
                'status' => 'Belum Lunas'
            ],
            [
                'id_customer' => 1,
                'tanggal_tagihan' => Carbon::create(2024, 3, 20),
                'berat' => 'berat B',
                'jumlah' => '85000',
                'bukti' => null,
                'status' => 'Lunas'
            ],
            [
                'id_customer' => 2,
                'tanggal_tagihan' => Carbon::create(2024, 4, 10),
                'berat' => 'berat C',
                'jumlah' => '75000',
                'bukti' => null,
                'status' => 'Lunas'
            ],
            [
                'id_customer' => 2,
                'tanggal_tagihan' => Carbon::create(2024, 4, 5),
                'berat' => 'berat A',
                'jumlah' => '80000',
                'bukti' => null,
                'status' => 'Belum Lunas'
            ],
            [
                'id_customer' => 1,
                'tanggal_tagihan' => Carbon::create(2024, 5, 12),
                'berat' => 'berat B',
                'jumlah' => '85000',
                'bukti' => null,
                'status' => 'Lunas'
            ],
            [
                'id_customer' => 1,
                'tanggal_tagihan' => Carbon::create(2024, 5, 8),
                'berat' => 'berat C',
                'jumlah' => '75000',
                'bukti' => null,
                'status' => 'Belum Lunas'
            ],
            [
                'id_customer' => 2,
                'tanggal_tagihan' => Carbon::create(2024, 6, 14),
                'berat' => 'berat A',
                'jumlah' => '80000',
                'bukti' => null,
                'status' => 'Lunas'
            ],
            [
                'id_customer' => 2,
                'tanggal_tagihan' => Carbon::create(2024, 6, 9),
                'berat' => 'berat B',
                'jumlah' => '85000',
                'bukti' => null,
                'status' => 'Belum Lunas'
            ],
            [
                'id_customer' => 1,
                'tanggal_tagihan' => Carbon::create(2024, 3, 25),
                'berat' => 'berat C',
                'jumlah' => '75000',
                'bukti' => null,
                'status' => 'Lunas'
            ],
            [
                'id_customer' => 1,
                'tanggal_tagihan' => Carbon::create(2024, 4, 18),
                'berat' => 'berat A',
                'jumlah' => '80000',
                'bukti' => null,
                'status' => 'Belum Lunas'
            ]
        ];

        DB::table('pembayaran')->insert($data);
    }
}