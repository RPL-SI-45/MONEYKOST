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
use App\Models\Order;
use App\Notifications\NewOrderNotification;

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
        
        return redirect("/dashboard/customer/menumakanan");
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

    public function pembayaranview(string $auth) {
        $data = PembayaranMakanan::where('id_customer', Auth::id())
                        ->latest() 
                        ->first(); 
    
        if ($data) {
            return view('pages.pembayaran-makanan', ['data' => $data]);
        } else {

        }
    }
    

    public function uploadbukti($id, Request $request) {
        $attributes = $request->validate([
            'bukti' => 'required|image|mimes:jpeg,jpg,png,gif',
        ]);

        $user = auth()->user();

        $pembayaran_makanan = PembayaranMakanan::where('id_customer', $user->id)
            ->orderBy('created_at', 'desc')
            ->first();

        if (!$pembayaran_makanan) {
            return redirect()->back()->withErrors(['message' => 'PembayaranMakanan record not found for this user.']);
        }

        $file = $request->file('bukti');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('public', $fileName);

        $pembayaran_makanan->update([
            'bukti' => $fileName,
        ]);

        $cartItems = Cart::where('id_customer', $user->id)->get();

        foreach ($cartItems as $item) {
            Order::create([
                'id_customer' => $user->id,
                'nama_makanan' => $item->nama_makanan,
                'nama_customer' => $user->username,
                'kamar' => $user->no_kamar,
                'qty' => $item->qty,
                'status' => 'belum selesai',
            ]);

            $item->delete();
        }

        $title = 'Order baru';
        $message = 'Ada order makanan baru dari ' . $user->username . ' di kamar ' . $user->no_kamar;
        $url = '/dashboard/admin/history-orders';

        $admins = User::where('auth', 'admin')->get();

        foreach ($admins as $admin) {
            $admin->notify(new NewOrderNotification($title, $message, $url));
        }

        return redirect('/dashboard/customer/terimakasih')->with('success', 'Order has been created successfully.');
    }

    
    
    
    public function terimakasih() {
        return view('pages.terimakasih');
    }

    public function showNotifications()
    {
        $notifications = auth()->user()->unreadNotifications;

        return view('pages.notif-order', compact('notifications'));
    }

    public function markAsRead($id)
    {
        $notification = auth()->user()->notifications()->where('id', $id)->first();

        if ($notification) {
            $notification->markAsRead();
        }

        return redirect()->back();
    }
}