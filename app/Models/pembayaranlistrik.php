<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class pembayaranlistrik extends Model
{
    use HasApiTokens, Notifiable;

    protected $table = 'pembayaran_listrik';
    public $timestamps = false; 
    protected $fillable = [
        'id_customer',
        'tanggaltagihan',
        'jumlah',
        'kwh',
        'bukti',
        'status'
    ];
}
