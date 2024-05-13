<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index() {
        if (Auth::check()) {
            if (Auth::user()->auth == 'admin') {
                return redirect(route('dashboard', ['auth' => 'customer']));
            } else {
                return redirect(route('pembayaran', ['auth' => 'customer']));
            }
        } else {
            return redirect("/login");
        }
    }
    public function admin() {
        return view('pages.dashboard-admin');
    }

    public function customer() {
        return redirect(route('pembayaran', ['auth' => 'customer']));
    }
}
