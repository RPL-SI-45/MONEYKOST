<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\DaftarMakanan;
use Illuminate\Support\Facades\DB;


class DaftarMakananController extends Controller
{
    public function index() {
        $daftar_makanan = DaftarMakanan::all();
        return view('pages.daftar-makanan-customer', ['daftar_makanan' => $daftar_makanan ]);
    }

    public function show($id)
    {
        $daftar_makanan = DaftarMakanan::findOrFail($id);
        return view('pages.daftar-makanan-show', ['daftar_makanan' => $daftar_makanan]);
    }

    public function adminindex() {
        $daftar_makanan = DaftarMakanan::all();
        return view('pages.daftar-makanan-admin', ['daftar_makanan' => $daftar_makanan ]);
    }

    public function create() {
        $daftar_makanan = DaftarMakanan::all();
        return view('pages.daftar-makanan-create', ['daftar_makanan' => $daftar_makanan ]);
    }

    public function tambah(Request $request) {
        $attributes = $request->validate([
            'nama_makanan' => 'required',
            'harga_makanan' => 'required',
            'tipe_makanan' => 'required',
            'deskripsi_makanan' => 'required',
            'gambar_makanan' => 'required|image|mimes:jpeg,jpg,png,gif',
        ]);
    
        $file = $request->file('gambar_makanan');
        $fileName = $file->getClientOriginalName();
        $filePath = $file->storeAs('public', $fileName);
        $data = DaftarMakanan::create([
            "nama_makanan" => $attributes['nama_makanan'],
            "harga_makanan" => $attributes['harga_makanan'],
            "tipe_makanan" => $attributes['tipe_makanan'],
            "deskripsi_makanan" => $attributes['deskripsi_makanan'],
            "gambar_makanan" => $fileName,
        ]);
    
        // Optionally, you may want to redirect the user after successful upload
        return redirect("/dashboard/admin/kelolamenumakanan");
    }

    public function destroy(int $id) {
        $data = DaftarMakanan::where('id', $id)->delete();
        return redirect('/dashboard/admin/kelolamenumakanan');
    }

    public function edit($id) {
        $daftar_makanan = DaftarMakanan::find($id);
        return view('pages.daftar-makanan-edit', ['daftar_makanan' => $daftar_makanan ]);
    }

    public function update($id, Request $request) {
        $attributes = $request->validate([
            'nama_makanan' => 'required',
            'harga_makanan' => 'required',
            'tipe_makanan' => 'required',
            'deskripsi_makanan' => 'required',
            'gambar_makanan' => 'required|image|mimes:jpeg,jpg,png,gif',
        ]);
        $daftar_makanan = DaftarMakanan::find($id);
        $file = $request->file('gambar_makanan');
        $fileName = $file->getClientOriginalName();
        $filePath = $file->storeAs('public', $fileName);
        $data = DaftarMakanan::where('id', $id)->update([
            "nama_makanan" => $attributes['nama_makanan'],
            "harga_makanan" => $attributes['harga_makanan'],
            "tipe_makanan" => $attributes['tipe_makanan'],
            "deskripsi_makanan" => $attributes['deskripsi_makanan'],
            "gambar_makanan" => $fileName,
        ]);
        // $daftar_makanan->update($request->except(['_token','submit']));
        return redirect('/dashboard/admin/kelolamenumakanan');
    }
}

