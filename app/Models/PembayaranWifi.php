<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class PembayaranWifi extends Model
{
    use HasApiTokens, Notifiable;

    protected $table = 'payment_wifi';
    public $timestamps = false;

    protected $fillable = [
        'id_customer',
        'tanggal_tagihan',
        'paket',
        'jumlah',
        'bukti',
        'status'
    ];
}
