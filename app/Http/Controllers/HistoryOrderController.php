<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class HistoryOrderController extends Controller
{
    // Method to update order status
    public function ubah(int $id, int $status)
    {
        $statusMap = [
            0 => 'Belum dimasak',
            1 => 'Sedang dimasak',
            2 => 'Selesai dimasak'
        ];

        if (!array_key_exists($status, $statusMap)) {
            return redirect()->back()->with('error', 'Status tidak valid');
        }

        Order::where('id', $id)->update([
            "status" => $statusMap[$status]
        ]);

        return redirect('/dashboard/admin/history-orders')->with('success', 'Status order berhasil diperbarui');
    }

    // Method to delete an order
    public function destroy(int $id)
    {
        Order::where('id', $id)->delete();
        return redirect('/dashboard/admin/history-orders')->with('success', 'Order berhasil dihapus');
    }

    // Method to show all orders
    public function showHistoryOrders()
    {
        $orders = Order::orderBy('created_at', 'desc')->get();
        return view('pages.historyorders', compact('orders'));
    }
}