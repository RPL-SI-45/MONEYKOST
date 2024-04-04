<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\PembayaranWifiUser;
use Illuminate\Support\Facades\DB;

class WifiUserController extends Controller
{
    public function index() {
        if (Auth::check()) {
            if (Auth::user()->auth == "admin") {
                $users = User::where('auth', 'customer')->get();
                return view('pages.tambah', [
                    'users' => $users
                ]);
            }
        }
    }

    public function tambah() {
        $attributes = request()->validate([
            'id_customer' => 'required',
            'tanggal_tagihan' => 'required',
            'paket' => 'required',
            'jumlah' => 'required'
        ]);
        $attributes['jumlah'] = number_format($attributes['jumlah'], 0, ',', '.');
        $attributes['bukti'] = '';
        $attributes['status'] = 'belum lunas';
        Pembayaran::create($attributes);
        return redirect('/dashboard');
    }
}
