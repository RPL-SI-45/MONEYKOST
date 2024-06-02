<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\PembayaranWifi;
use Illuminate\Support\Facades\Auth;

class DashboardPenggunaController extends Controller
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


    public function dashboard() {

        if(auth()->user()->auth === 'admin'){
            return view('pages.dashboard-admin');
        }

        $user_id = auth()->user()->id;

        // Define the months
        $months = [
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei'
        ];

        // Initialize array to store totals
        $totals = []; //total wifi

        $totals_laundry = []; //total laundry

        // Iterate over each month and calculate the total
        foreach ($months as $month => $monthName) {
            $query = PembayaranWifi::where('id_customer', $user_id)
                                ->whereMonth('tanggal_tagihan', $month);

            // Get filtered data
            $data_wifi = $query->get();

            // Calculate total amount for the month
            $total = 0;
            foreach ($data_wifi as $data) {
                $total += (int)$data->jumlah; // Ensure jumlah is treated as an integer
            }

            // Store the total in the array
            $totals[$monthName] = [
                'total' => $total,
                'status' => $data_wifi->isNotEmpty() ? $data_wifi->first()->status : 'N/A' // Get the status of the first record or set 'N/A'
            ];
        }

        foreach ($months as $month => $monthName) {
            $query = Pembayaran::where('id_customer', $user_id)
                                ->whereMonth('tanggal_tagihan', $month);
        
            // Get filtered data
            $data_laundry = $query->get();
        
            // Calculate total amount for the month
            $total_laundry = 0;
            foreach ($data_laundry as $data) {
                $total_laundry += (int)$data->jumlah; // Ensure jumlah is treated as an integer
            }
        
            // Store the total in the array
            $totals_laundry[$monthName] = [
                'total' => $total_laundry,
                'status' => $data_laundry->isNotEmpty() ? $data_laundry->first()->status : 'N/A' // Get the status of the first record or set 'N/A'
            ];
        }
        
      
        return view('pages.dashboard-pengguna', compact('totals', 'totals_laundry'));

        
    }

    public function customer() {
        return redirect(route('pembayaran', ['auth' => 'customer']));
    }



}
