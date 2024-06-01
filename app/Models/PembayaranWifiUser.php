<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PembayaranWifiUser extends Model
{
    protected $table = 'pembayaran_wifi_users'; 

    protected $primaryKey = 'idPembayaranUser'; 

    protected $fillable = [
        'Tanggal_Tagihan',
        'Jumlah',
        'Bukti',
        'Status',
    ];

    protected $casts = [
        'Status' => 'boolean', 
    ];
}
