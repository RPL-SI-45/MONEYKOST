<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DaftarMakanan;

class SearchFilter extends Controller
{
    public function index(Request $request){
        $query = DaftarMakanan::query();

        if ($request->has('search')) {
            $query->where('nama', 'like', '%' . $request->input('search') . '%')
                  ->orWhere('kategori', 'like', '%' . $request->input('search') . '%');
        }

        if ($request->has('kategori')) {
            $query->where('kategori', $request->input('kategori'));
        }

        $makanans = $query->get();

        return view('makanan.index', compact('makanans'));
    }

    public function cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;

        
        // $search = DaftarMakanan::where('nama_makanan', 'like', "%$cari%")->orWhere('tipe_makanan', $request->input('kategori'))->get();
        
        // $search = DaftarMakanan::where('tipe_makanan', $request->input('kategori'))->get();

        if (!$request->has('kategori')) 
        {
            $search = DaftarMakanan::where('nama_makanan', 'like', "%$cari%")->get();
        } 
        elseif (!$request->has('cari')) 
        {
            $search = DaftarMakanan::where('tipe_makanan', $request->input('kategori'))->get();
        }
        elseif ($request->has('kategori') && $request->has('cari'))
        {
            $search = DaftarMakanan::where('nama_makanan', 'like', "%$cari%")->where('tipe_makanan', $request->input('kategori'))->get();
        }
    		// mengambil data dari table pegawai sesuai pencarian data
		

        // dd($search);s
 
    		// mengirim data pegawai ke view index
		return view('pages.daftar-makanan-customer',['daftar_makanan' => $search]);
 
	}
    
}