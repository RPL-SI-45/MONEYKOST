<?php
use App\Http\Controllers\{
	PembayaranController,
	PembayaranWifiController,
	LaundryController,
	PembayaranKostController,
	KostController,
  ListrikController,
  PembayaranListrikController
}; 

// Pembayaran Laundry            

Route::get('/dashboard/{auth}', [PembayaranController::class, 'index'])->name('home');
Route::get('/ubahStatus/{id}/{status}/laundry', [PembayaranController::class, 'ubah'])->name('ubah-status-laundry');
Route::get('/tambahLaundry', [LaundryController::class, 'index'])->name('tambah.laundry');
Route::post('/tambahLaundry', [LaundryController::class, 'tambah'])->name('tambah-laundry.perform');
Route::post('/upload/{id}/laundry', [LaundryController::class, 'upload'])->name('upload-bukti-laundry');



//Pembayaran Kost
Route::get('/dashboard/{auth}/pembayarankost', [PembayaranKostController::class, 'index'])->name('pembayarankost');
Route::get('/ubahStatus/{id}/{status}/kost', [PembayaranKostController::class, 'ubah'])->name('ubah-status-kost');
Route::get('/tambahKost', [KostController::class, 'index'])->name('tambah.kost');
Route::post('/tambahKost', [KostController::class, 'tambah'])->name('tambah-kost.perform');
Route::post('/upload/{id}', [KostController::class, 'upload'])->name('upload-bukti');
Route::delete('/hapus/{id}', [PembayaranKostController::class, 'destroy'])->name('delete-kost');
Route::post('/upload/{id}/kost', [KostController::class, 'upload'])->name('upload-bukti-kost');

//Pembayaran wifi
Route::get('/dashboard/{auth}/pembayaranwifi', [PembayaranWifiController::class, 'index'])->name('pembayaranwifi');
Route::get('/ubahStatus/{id}/{status}/wifi', [PembayaranWifiController::class, 'ubah'])->name('ubah-status-wifi');

//Pembayaran Listrik
Route::get('/dashboard/{auth}/pembayaranlistrik', [PembayaranListrikController::class, 'index'])->name('pembayaranlistrik');
Route::get('/ubahStatus/{id}/{status}/listrik', [PembayaranListrikController::class, 'ubah'])->name('ubah-status-listrik');
Route::get('/tambahListrik', [ListrikController::class, 'index'])->name('tambah.listrik');
Route::post('/tambahListrik', [ListrikController::class, 'tambah'])->name('tambah-listrik.perform');
Route::post('/upload/{id}/listrik', [ListrikController::class, 'upload'])->name('upload-bukti-listrik');

//wifi Customer
Route::get('/wifi', function () {
    return view('pages.pembayaranwifi-customer');
});

