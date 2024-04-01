<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class PembayaranController extends Controller
{
    public function index() {
        if(Auth::check()) {
            if (Auth::user()->auth == 'admin') {
                $data = DB::table('pembayaran')->get();
                $result = array();
                foreach($data as $item) {
                    $nama = User::select('username')->where('id', $item->id_customer)->first()->username;
                    $result[] = [
                        'nama_cust' => $nama,
                        'id_pembayaran' => $item->id,
                        'tanggal_tagihan' => $item->tanggal_tagihan,
                        'berat' => $item->berat,
                        'jumlah' => 'RP. ' . $item->jumlah,
                        'status' => $item->status,
                        'bukti' => $item->bukti,
                    ];
                }
                // print_r($result[1]['status']);
                return view('pages.pembayaran-admin', ['data' => $result]);
            } else {
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

    public function ubah(int $id, int $status) {
        $data = DB::table('pembayaran')->where('id', $id)->update([
            "status" => $status == 0 ? 'belum lunas' : 'lunas'
        ]);
        return redirect('dashboard');
    }
}
