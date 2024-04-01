<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Pembayaran;
use Illuminate\Support\Facades\DB;

class LaundryController extends Controller
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
            'berat' => 'required',
            'jumlah' => 'required'
        ]);
        $attributes['jumlah'] = number_format($attributes['jumlah'], 0, ',', '.');
        $attributes['bukti'] = '';
        $attributes['status'] = 'belum lunas';
        Pembayaran::create($attributes);
        return redirect('/dashboard');
    }
}
