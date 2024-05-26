<?php

// App/Http/Controllers/OrderController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;
use App\Models\DaftarMakanan;
use App\Models\PembayaranMakanan;

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
            $cartItem->update(['qty' => $cartItem->qty + $attributes['qty']]);
        } else {
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
    
    public function destroy(int $id) {
        $data = Cart::where('id', $id)->delete();
        return redirect('/dashboard/customer/cart');
    }

    public function bayar(Request $request) {
        $attributes = $request->validate([
            'grandTotal' => 'required',
        ]);
        

        PembayaranMakanan::create([
            'id_customer' => Auth::id(),
            'grandTotal' => $attributes['grandTotal'],
        ]);
        // Cart::where('id_customer', Auth::id())->delete();

        
        return redirect("/dashboard/customer/pembayaranmakanan");
    }

    public function pembayaranview(string $auth){
        $data = PembayaranMakanan::where('id_customer', Auth::id())->get()->first(); // Retrieve the first item

        if ($data) {
            return view('pages.pembayaran-makanan', ['data' => $data]);
        } else {

        }
    }

    public function uploadbukti($id, Request $request) {
        $attributes = $request->validate([
            'bukti' => 'sometimes|image|mimes:jpeg,jpg,png,gif',
        ]);
    
        $pembayaran_makanan = PembayaranMakanan::find($id);
    
        if ($request->hasFile('bukti')) {
            $file = $request->file('bukti');
            $fileName = $file->getClientOriginalName();
            $filePath = $file->storeAs('public', $fileName);
    
            $pembayaran_makanan->update([
                "bukti" => $fileName,
            ]);
        } else {
            $pembayaran_makanan->update($request->except(['_token', 'submit', 'bukti']));
        }
    
        return redirect('/dashboard/admin/menumakanan');
    }
  
}
