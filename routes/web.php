<?php
use App\Http\Controllers\{
	PembayaranController,

	LaundryController,
	PembayaranKostController,
	KostController
}; 
// Pembayaran Laundry            

Route::get('/dashboard/{auth}', [PembayaranController::class, 'index'])->name('home');
Route::get('/ubahStatus/{id}/{status}', [PembayaranController::class, 'ubah'])->name('ubah-status');
Route::get('/tambahLaundry', [LaundryController::class, 'index'])->name('tambah.laundry');
Route::post('/tambahLaundry', [LaundryController::class, 'tambah'])->name('tambah-laundry.perform');
Route::post('/upload/{id}', [LaundryController::class, 'upload'])->name('upload-bukti');


//Pembayaran Kost
Route::get('/dashboard/{auth}/pembayarankost', [PembayaranKostController::class, 'index'])->name('pembayarankost');
Route::get('/ubahStatus/{id}/{status}', [PembayaranKostController::class, 'ubah'])->name('ubah-status');
Route::get('/tambahKost', [KostController::class, 'index'])->name('tambah.kost');
Route::post('/tambahKost', [KostController::class, 'tambah'])->name('tambah-kost.perform');
Route::post('/upload/{id}', [KostController::class, 'upload'])->name('upload-bukti');
Route::delete('/hapus/{id}', [PembayaranKostController::class, 'destroy'])->name('delete-kost');
