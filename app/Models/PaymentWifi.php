<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentWifi extends Model
{
    // Nama tabel yang sesuai
    protected $table = 'payment_wifi';

    // Primary key
    protected $primaryKey = 'idPembayaran';

    // Attribut yang dapat diisi
    protected $fillable = [
        'idPembayaran', 'nama', 'Tanggal_Tagihan', 'Paket', 'Jumlah', 'Bukti'
    ];

    // Attribut tanggal
    protected $dates = ['Tanggal_Tagihan'];

    // Nonaktifkan timestamps
    public $timestamps = false;
}