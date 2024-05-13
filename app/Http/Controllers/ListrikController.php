<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Pembayaranlistrik;
use Illuminate\Support\Facades\DB;

class ListrikController extends Controller
{
    public function index() {
        $users = User::where('auth', 'customer')->get();
        return view('pages.tambahlistrik', [
            'users' => $users
        ]);
    }

    public function tambah() {
        $attributes = request()->validate([
            'id_customer' => 'required',
            'tanggaltagihan' => 'required',
            'jumlah' => 'required',
            'kwh' => 'required'
        ]);
        $attributes['jumlah'] = number_format($attributes['jumlah'], 0, ',', '.');
        $attributes['bukti'] = '';
        $attributes['status'] = 'belum';
        Pembayaranlistrik::create($attributes);
        return redirect("/dashboard/admin/pembayaranlistrik");
    }

    public function upload(int $id) {
        request()->validate([
            'upload-bukti' => 'required|image|mimes:jpeg,jpg,png,gif',
        ]);
        if (request()->file()) {
            $fileName = time().'_cust.'.request()->file('upload-bukti')->extension();
            $filePath = request()->file('upload-bukti')->storeAs('bukti', $fileName, 'public');
            $data = Pembayaranlistrik::where('id', $id)->update([
                "bukti" => "bukti/" . $fileName,
                "status" => "lunas"
            ]);
            return redirect("/dashboard/customer/pembayaranlistrik");
        }
    }
}
