<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class PembayaranMakanan extends Model
{
    use HasApiTokens, Notifiable;

    protected $table = 'pembayaran_makanan';

    protected $fillable = [
        'id_customer',
        'grandTotal',
        'bukti',
        'status'
    ];
}
