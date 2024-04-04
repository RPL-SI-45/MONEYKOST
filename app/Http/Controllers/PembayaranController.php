<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Pembayaran;
use Illuminate\Support\Facades\DB;

class PembayaranController extends Controller
{
    public function index(string $auth) {
        if ($auth == "admin") {
            $data = Pembayaran::all();
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
            $user = User::where('username', 'ahmad')->first();
            $data = Pembayaran::where('id_customer', $user->id)->get();
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

    public function ubah(int $id, int $status) {
        $data = Pembayaran::where('id', $id)->update([
            "status" => $status == 0 ? 'belum lunas' : 'lunas'
        ]);
        return redirect('/dashboard/admin');
    }
}
