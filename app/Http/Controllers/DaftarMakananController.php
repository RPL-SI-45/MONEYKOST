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
}
