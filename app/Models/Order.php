<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Order extends Model
{
    use HasApiTokens, Notifiable;

    protected $table = 'order';

    protected $fillable = [
        'id_customer',
        'nama_customer',
        'nama_makanan',
        'qty',
        'kamar',
        'status'
    ];
}