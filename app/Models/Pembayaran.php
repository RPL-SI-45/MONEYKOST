<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Pembayaran extends Model
{
    use HasApiTokens, Notifiable;

    protected $table = 'pembayaran';
    public $timestamps = false;

    protected $fillable = [
        'id_customer',
        'tanggal_tagihan',
        'berat',
        'jumlah',
        'bukti',
        'status'
    ];
}
