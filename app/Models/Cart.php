<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Cart extends Model
{
    use HasApiTokens, Notifiable;

    protected $table = 'cart';
    public $timestamps = false;

    protected $fillable = [
        'id_customer',
        'nama_makanan',
        'harga_makanan',
        'gambar_makanan',
        'tipe_makanan',
        'deskripsi_makanan',
        'qty'
    ];
}
