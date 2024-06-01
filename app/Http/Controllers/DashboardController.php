<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\{
    Pembayaran,
    PembayaranWifi,
    PembayaranKost,
    Pembayaranlistrik,
    PembayaranMakanan,
    PembayaranWifiUser,
    User,
    Order
};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    private function format_rupiah($number)
    {
        return 'Rp ' . number_format($number, 0, ',', '.');
    }
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
        $totalLaundry = Pembayaran::where('status', 'lunas')->get()->sum(function ($payment) {
            return intval(str_replace('.', '', $payment->jumlah));
        });

        $totalKost = PembayaranKost::where('status', 'lunas')->get()->sum(function ($payment) {
            return intval(str_replace('.', '', $payment->jumlah));
        });

        $totalListrik = Pembayaranlistrik::where('status', 'lunas')->get()->sum(function ($payment) {
            return intval(str_replace('.', '', $payment->jumlah));
        });

        $totalWifi = PembayaranWifi::where('status', 'lunas')->get()->sum(function ($payment) {
            return intval(str_replace('.', '', $payment->jumlah));
        });

        $totalWifiUser = PembayaranWifiUser::where('Status', 'lunas')->get()->sum(function ($payment) {
            return intval(str_replace('.', '', $payment->jumlah));
        });

        $totalMakanan = PembayaranMakanan::where('status', 'lunas')->get()->sum(function ($payment) {
            return intval(str_replace('.', '', $payment->grandTotal));
        });

        $totalUsers = User::count();

        $totalPembayaran = $this->format_rupiah($totalLaundry + $totalKost + $totalListrik + $totalWifi + $totalWifiUser + $totalMakanan);
        $totalPembayaranKost = $this->format_rupiah($totalKost);

        $posts = Order::query();
        $topMakanan = $posts->select('nama_makanan', DB::raw('SUM(qty) as total_qty'))
            ->groupBy('nama_makanan')
            ->orderByDesc('total_qty')
            ->take(5)
            ->get();
        $maxQty = $topMakanan->max('total_qty');

        $totalQty = $topMakanan->sum('total_qty');

        return view('pages.dashboard-admin', compact('totalUsers', 'totalPembayaran', 'topMakanan', 'maxQty', 'totalPembayaranKost', 'totalQty'));

        
    }

    public function customer() {
        return redirect(route('pembayaran', ['auth' => 'customer']));
    }

    public function test() {
        $user_id = auth()->user()->id;

        // Define the months
        $months = [
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei'
        ];

        // Initialize array to store totals
        $totals = [];

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

        return view('pages.test', compact('totals'));

    }

    public function test2() {
        return view('pages.test2');
    }


}
