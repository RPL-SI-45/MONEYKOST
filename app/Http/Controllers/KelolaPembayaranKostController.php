<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran_kost;

class KelolaPembayaranKostController extends Controller
{
    public function index(){
      $pembayaran_kost = Pembayaran_kost::all();
      return view('kelola_pembayaran_kost.index', compact(['pembayaran_kost']));
    }

    public function create(){
      return view('kelola_pembayaran_kost.create');
    }

    public function store(Request $request){
      Pembayaran_kost::create($request->except(['_token','submit']));
      return redirect('/kelola_pembayaran_kost');
    }

    public function edit($id){
      $pembayaran_kost = Pembayaran_kost::find($id);
      return view('kelola_pembayaran_kost.edit', compact(['pembayaran_kost']));
    }

    public function update($id, Request $request){
      $pembayaran_kost = Pembayaran_kost::find($id);
      $pembayaran_kost->update($request->except(['_token','submit']));
      return redirect('/kelola_pembayaran_kost');
    }

    public function destroy($id){
      $pembayaran_kost = Pembayaran_kost::find($id);
      $pembayaran_kost->delete();
      return redirect('/kelola_pembayaran_kost');
    }
}
