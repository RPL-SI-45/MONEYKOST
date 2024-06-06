<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\PembayaranMakanan;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;

class orderController extends Controller
{
    public function index(string $auth) {
        if ($auth == "admin") {
            $pembayaran_makanan = PembayaranMakanan::orderBy('created_at', 'desc')->get();
            return view('pages.kelola-pembayaran-makanan', ['pembayaran_makanan' => $pembayaran_makanan]);
        } else {

        }
    }
    public function ubah(int $id, int $status) {
        $data = PembayaranMakanan::where('id', $id)->update([
            "status" => $status == 0 ? 'belum lunas' : 'lunas'
            ]);
        return redirect('/dashboard/admin/kelolapembayaranmakanan');
    }
}

