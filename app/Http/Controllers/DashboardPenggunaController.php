<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use App\Models\PembayaranWifi;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardPenggunaController extends Controller
{
    public function dashboard()
    {
        if (auth()->user()->auth === 'admin') {
            return view('pages.dashboard-admin');
        }
    
        $id_customer = auth()->user()->id;
    
        $wifi = PembayaranWifi::where('id_customer', $id_customer)
            ->orderBy('tanggal_tagihan', 'desc')
            ->take(4)
            ->get();
        
        $laundry = Pembayaran::where('id_customer', $id_customer)
            ->orderBy('tanggal_tagihan', 'desc')
            ->take(4)
            ->get();
    
        $top_foods = DB::table('order')
            ->select('nama_makanan', DB::raw('SUM(qty) as total_qty'))
            ->where('id_customer', $id_customer)
            ->groupBy('nama_makanan')
            ->orderBy('total_qty', 'desc')
            ->take(5)
            ->get();
    
        return view('pages.dashboard-pengguna', compact('wifi', 'laundry', 'top_foods'));
    }
}

        // // Define the last 4 months
        // $months = [];
        // for ($i = 0; $i < 4; $i++) {
        //     $month = Carbon::now()->subMonths($i);
        //     $months[$month->month] = $month->translatedFormat('F');
        // }
        
        // // Reverse the order of months
        // $months = array_reverse($months, true);

        // // Initialize array to store totals
        // $totals = []; // total wifi
        // $totals_laundry = []; // total laundry

        // // Iterate over each month and calculate the total
        // foreach ($months as $month => $monthName) {
        //     $query = PembayaranWifi::where('id_customer', $user_id)
        //         ->whereMonth('tanggal_tagihan', $month);

        //     // Get filtered data
        //     $data_wifi = $query->get();

        //     // Calculate total amount for the month
        //     $total = 0;
        //     foreach ($data_wifi as $data) {
        //         $total += (int) $data->jumlah; // Ensure jumlah is treated as an integer
        //     }

        //     // Store the total in the array
        //     $totals[$monthName] = [
        //         'total' => $total,
        //         'status' => $data_wifi->isNotEmpty() ? $data_wifi->first()->status : 'N/A' // Get the status of the first record or set 'N/A'
        //     ];
        // }

        // foreach ($months as $month => $monthName) {
        //     $query = Pembayaran::where('id_customer', $user_id)
        //         ->whereMonth('tanggal_tagihan', $month);

        //     // Get filtered data
        //     $data_laundry = $query->get();

        //     // Calculate total amount for the month
        //     $total_laundry = 0;
        //     foreach ($data_laundry as $data) {
        //         $total_laundry += (int) $data->jumlah; // Ensure jumlah is treated as an integer
        //     }

        //     // Store the total in the array
        //     $totals_laundry[$monthName] = [
        //         'total' => $total_laundry,
        //         'status' => $data_laundry->isNotEmpty() ? $data_laundry->first()->status : 'N/A' // Get the status of the first record or set 'N/A'
        //     ];
        // }