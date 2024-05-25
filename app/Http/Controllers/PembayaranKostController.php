<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\PembayaranKost;
use Illuminate\Support\Facades\DB;

class PembayaranKostController extends Controller
{
    public function index(string $auth) {
        if ($auth == "admin") {
            $data = PembayaranKost::all();
            $result = array();
            foreach($data as $item) {
                $nama = User::select('username')->where('id', $item->id_customer)->first()->username;
                $result[] = [
                    'nama_cust' => $nama,
                    'id_pembayaran' => $item->id,
                    'tanggal_tagihan' => $item->tanggal_tagihan,
                    'tipe_kamar' => $item->tipe_kamar,
                    'jumlah' => 'RP. ' . $item->jumlah,
                    'status' => $item->status,
                    'bukti' => $item->bukti,
                ];
            }
            // print_r($result[1]['status']);
            return view('pages.pembayaran-kost-admin', ['data' => $result]);
        } else {
            $data = PembayaranKost::where('id_customer', Auth::id())->get();
            $result = array();
            foreach($data as $item) {
                $result[] = [
                    'id' => $item->id,
                    'tanggal_tagihan' => $item->tanggal_tagihan,
                    'tipe_kamar' => $item->tipe_kamar,
                    'jumlah' => 'RP. ' . $item->jumlah,
                    'status' => $item->status,
                    'bukti' => $item->bukti,
                ];
            }
            return view('pages.pembayaran-kost-customer', ['data' => $result]);
        }
    }

    public function ubah(int $id, int $status) {
        $data = PembayaranKost::where('id', $id)->update([
            "status" => $status == 0 ? 'belum lunas' : 'lunas'
        ]);
        return redirect('/dashboard/admin/pembayarankost');
    }
    public function destroy(int $id) {
        $data = PembayaranKost::where('id', $id)->delete();
        return redirect('/dashboard/admin/pembayarankost');
    } 
}
