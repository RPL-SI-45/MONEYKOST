<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PembayaranController extends Controller
{
    public function index() {
        if(Auth::check()) {
            if (Auth::user()->auth == 'customer') { 
                $data = DB::table('pembayaran')->where('id_customer', Auth::id())->get();
                $result = array();
                foreach($data as $item) {
                    $result[] = [
                        'id' => $item->id,
                        'tanggal_tagihan' => $item->tanggal_tagihan,
                        'berat' => $item->berat,
                        'jumlah' => 'RP. ' . $item->jumlah,
                        'status' => $item->status,
                        'bukti' => $item->bukti,
                    ];
                }
                return view('pages.pembayaran-customer', ['data' => $result]);
            }
        }
    }
}
