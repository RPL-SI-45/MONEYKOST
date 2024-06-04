<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\PembayaranWifi;
use Illuminate\Support\Facades\DB;
use App\Notifications\NewOrderNotification;

class WifiController extends Controller
{
    public function index() {
        $users = User::where('auth', 'customer')->get();
        return view('pages.tambah-wifi', [
            'users' => $users
        ]);
    }

    public function tambah() {
        $attributes = request()->validate([
            'id_customer' => 'required',
            'tanggal_tagihan' => 'required',
            'paket' => 'required',
        ]);
        if ($attributes['paket'] == '5 Mbps') {
            $attributes['jumlah'] = '90.000'; // Paket 5 mbps
        } elseif ($attributes['paket'] == '10 Mbps') {
            $attributes['jumlah'] = '120.000'; // Paket 10 mbps
        } else {
            $attributes['jumlah'] = 0;
        }
        $attributes['bukti'] = '';
        $attributes['status'] = 'belum lunas';
        PembayaranWifi::create($attributes);
        
        $user = auth()->user();
        $title = 'Wifi';
        $message = 'Ada pembelian paket wifi dari ' . $user->username ;
        $url = '/dashboard/admin/pembayaranwifi';

        $admins = User::where('auth', 'admin')->get();
        

        foreach ($admins as $admin) {
            $admin->notify(new NewOrderNotification($title, $message, $url));
        }
        return redirect("/dashboard/customer/pembayaranwifi");
    }

    public function upload(int $id) {
        request()->validate([
            'upload-bukti' => 'required|image|mimes:jpeg,jpg,png,gif',
        ]);
        if (request()->file()) {
            $fileName = time().'_cust.'.request()->file('upload-bukti')->extension();
            $filePath = request()->file('upload-bukti')->storeAs('bukti', $fileName, 'public');
            $data = PembayaranWifi::where('id', $id)->update([
                "bukti" => "bukti/" . $fileName,
                "status" => "lunas"
            ]);
            return redirect("/dashboard/customer/pembayaranwifi");
        }
    }
}