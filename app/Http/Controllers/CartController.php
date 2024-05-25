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
                    'harga_makanan' => $item->harga_makanan,
                    'gambar_makanan' => $item->gambar_makanan,
                    'qty' => $item->qty,
                ];
            }
            return view('pages.cart', ['data' => $result]);
    }

    public function addToCart($id, Request $request){
        $attributes = $request->validate([
            'qty' => 'required|integer|min:1',
        ]);
        
        $daftar_makanan = DaftarMakanan::findOrFail($id);
        $cartItem = Cart::where('id_customer', Auth::id())
                        ->where('nama_makanan', $daftar_makanan->nama_makanan)
                        ->first();
    
        if ($cartItem) {
            // If item exists in cart, update its quantity
            $cartItem->update(['qty' => $cartItem->qty + $attributes['qty']]);
        } else {
            // If item doesn't exist in cart, create a new entry
            Cart::create([
                'id_customer' => Auth::id(),
                'id_makanan' => $daftar_makanan->id,
                'nama_makanan' => $daftar_makanan->nama_makanan,
                'harga_makanan' => $daftar_makanan->harga_makanan,
                'gambar_makanan' => $daftar_makanan->gambar_makanan,
                'qty' => $attributes['qty'],
            ]);
        }
        
        return redirect("/dashboard/customer/cart");
    }
    
   
  
}
