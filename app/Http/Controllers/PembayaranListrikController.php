<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Pembayaranlistrik;
use Illuminate\Support\Facades\DB;

class PembayaranListrikController extends Controller
{
    public function index(string $auth) {
        if ($auth == "admin") {
            $data = Pembayaranlistrik::all();
            $result = array();
            foreach($data as $item) {
                $nama = User::select('username')->where('id', $item->id_customer)->first()->username;
                $result[] = [
                    'nama_cust' => $nama,
                    'id_pembayaran' => $item->id,
                    'tanggaltagihan' => $item->tanggaltagihan,
                    'jumlah' => 'RP. ' . $item->jumlah,
                    'kwh' => $item->kwh,
                    'status' => $item->status,
                    'bukti' => $item->bukti,
                ];
            }
            // print_r($result[1]['status']);
            return view('pages.listrik-admin', ['data' => $result]);
        } else {
            $data = Pembayaranlistrik::where('id_customer', Auth::id())->get();
            $result = array();
            foreach($data as $item) {
                $result[] = [
                    'id' => $item->id,
                    'tanggaltagihan' => $item->tanggaltagihan,
                    'jumlah' => $item->jumlah,
                    'kwh' => $item->kwh,
                    'status' => $item->status,
                    'bukti' => $item->bukti,
                ];
            }
            return view('pages.listrik-customer', ['data' => $result]);
        }
    }

    public function ubah(int $id, int $status) {
        $data = Pembayaranlistrik::where('id', $id)->update([
            "status" => $status == 0 ? 'belum' : 'lunas'
        ]);
        return redirect('/dashboard/admin/pembayaranlistrik');
    }
    public function destroy(int $id) {
        $data = Pembayaranlistrik::where('id', $id)->delete();
        return redirect('/dashboard/admin/pembayaranlistrik');
    } 
}
