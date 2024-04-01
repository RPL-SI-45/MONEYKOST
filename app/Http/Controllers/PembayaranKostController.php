<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran_kost;

class PembayaranKostController extends Controller
{
    public function index(){
      $pembayaran_kost = Pembayaran_kost::all();
      return view('pembayaran_kost.index', compact(['pembayaran_kost']));
    }
}
