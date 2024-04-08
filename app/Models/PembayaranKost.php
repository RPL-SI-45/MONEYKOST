<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class PembayaranKost extends Model
{
    use HasApiTokens, Notifiable;

    protected $table = 'pembayaran_kost';
    public $timestamps = false;

    protected $fillable = [
        'id_customer',
        'tanggal_tagihan',
        'tipe_kamar',
        'jumlah',
        'bukti',
        'status'
    ];
}
