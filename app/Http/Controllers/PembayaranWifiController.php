<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\PembayaranWifi;
use Illuminate\Support\Facades\DB;

class PembayaranWifiController extends Controller
{
    public function index(string $auth) {
        if ($auth == "admin") {
            $data = PembayaranWifi::all();
            $result = array();
            foreach($data as $item) {
                $nama = User::select('username')->where('id', $item->id_customer)->first()->username;
                $result[] = [
                    'nama_cust' => $nama,
                    'id_pembayaran' => $item->id,
                    'tanggal_tagihan' => $item->tanggal_tagihan,
                    'paket' => $item->paket,
                    'jumlah' => 'RP. ' . $item->jumlah,
                    'status' => $item->status,
                    'bukti' => $item->bukti,
                ];
            }
            // print_r($result[1]['status']);
            return view('pages.pembayaran-wifi-admin', ['data' => $result]);
        } else {
            $user = User::where('username', 'ujang')->first();
            $data = PembayaranWifi::where('id_customer', $user->id)->get();
            $result = array();
            foreach($data as $item) {
                $result[] = [
                    'id' => $item->id,
                    'tanggal_tagihan' => $item->tanggal_tagihan,
                    'paket' => $item->paket,
                    'jumlah' => 'RP. ' . $item->jumlah,
                    'status' => $item->status,
                    'bukti' => $item->bukti,
                ];
            }
            return view('pages.pembayaran-wifi-customer', ['data' => $result]);
        }
    }

    public function ubah(int $id, int $status) {
        $data = PembayaranWifi::where('id', $id)->update([
            "status" => $status == 0 ? 'belum lunas' : 'lunas'
        ]);
        return redirect('/dashboard/admin/pembayaranwifi');
    }
}
