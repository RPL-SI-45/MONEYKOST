<?php

// App/Http/Controllers/OrderController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;
use App\Models\DaftarMakanan;

class CartController extends Controller
{
    public function index(string $auth)
    {
        $data = Cart::where('id_customer', Auth::id())->get();
            $result = array();
            foreach($data as $item) {
                $result[] = [
                    'id' => $item->id,
                    'id_makanan' => $item->id_makanan,
                    'nama_makanan' => $item->nama_makanan,
                    'harga_makanan' => 'RP. ' . number_format($item->harga_makanan, 0, ',', '.'),
                    'gambar_makanan' => $item->gambar_makanan,
                    'qty' => $item->qty,
                ];
            }
            return view('pages.cart', ['data' => $result]);
    }

    public function addToCart($id,Request $request){
    $attributes = $request->validate([
        // 'nama_makanan' => 'required',
        // 'harga_makanan' => 'required',
        // 'tipe_makanan' => 'required',
        // 'deskripsi_makanan' => 'required',
        // 'gambar_makanan' => 'required',
        'qty' => 'required|integer|min:1',
    ]);
    $daftar_makanan = DaftarMakanan::findOrFail($id);
    Cart::create([
        'id_customer' => Auth::id(),
        'id_makanan' => $daftar_makanan->id,
        'nama_makanan' => $daftar_makanan->nama_makanan,
        'harga_makanan' => $daftar_makanan->harga_makanan,
        'gambar_makanan' => $daftar_makanan->gambar_makanan,
        'qty' => $attributes['qty'],
    ]);
    return redirect("/dashboard/customer/cart");

}
   
  
}
