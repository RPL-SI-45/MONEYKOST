<?php

namespace App\Http\Controllers;

use App\Models\pembayaranlistrik;
use Illuminate\Http\Request;
use PHPUnit\TextUI\Configuration\Php;

class ListrikController extends Controller
{
    public function index(){
        $pembayaranlistrik = pembayaranlistrik::all();
        return view('pembayaranlistrik.index', compact(['pembayaranlistrik']));
    }
}
