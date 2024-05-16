<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class KelolaDataCustomerController extends Controller
{
    public function index(string $auth) {
        $kelola_data_customer = User::all();
        return view('pages.kelola-data-customer', ['kelola_data_customer' => $kelola_data_customer]);
    }
    public function destroy(int $id) {
        $item = User::where('id', $id)->delete();
        return redirect('/dashboard/admin/kelolaDataCustomer');
    }
}
