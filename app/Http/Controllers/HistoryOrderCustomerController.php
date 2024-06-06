<?php
// File: app/Http/Controllers/HistoryOrderCustomerController.php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Order;

class HistoryOrderCustomerController extends Controller
{
    public function index()
    {
        $data = Order::where('id_customer', Auth::id())
                     ->with('menu')
                     ->orderBy('created_at', 'desc')
                     ->get();
    
        $result = array();
    
        foreach ($data as $item) {
            $grandTotal = $item->menu->harga_makanan * $item->qty;
    
            $result[] = [
                'id' => $item->id,
                'nama_makanan' => $item->nama_makanan,
                'status' => $item->status,
                'qty' => $item->qty,
                'created_at' => $item->created_at,
                'grand_total' => $grandTotal
            ];
        }
    
        return view('pages.history_orders', ['data' => $result]);
    }
    
}
