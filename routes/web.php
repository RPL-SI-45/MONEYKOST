<?php
use App\Http\Controllers\{
	PembayaranController,
	PembayaranWifiController,
	LaundryController,
	PembayaranKostController,
	KostController,
  	ListrikController,
  	PembayaranListrikController,
	WifiController,
	DaftarMakananController
}; 

// Pembayaran Laundry            

Route::get('/dashboard/{auth}', [PembayaranController::class, 'index'])->name('home');
Route::get('/ubahStatus/{id}/{status}/laundry', [PembayaranController::class, 'ubah'])->name('ubah-status-laundry');
Route::get('/tambahLaundry', [LaundryController::class, 'index'])->name('tambah.laundry');
Route::post('/tambahLaundry', [LaundryController::class, 'tambah'])->name('tambah-laundry.perform');
Route::post('/upload/{id}/laundry', [LaundryController::class, 'upload'])->name('upload-bukti-laundry');
Route::delete('/hapuslaundry/{id}', [PembayaranController::class, 'destroy'])->name('delete-laundry');

//Pembayaran Kost
Route::get('/dashboard/{auth}/pembayarankost', [PembayaranKostController::class, 'index'])->name('pembayarankost');
Route::get('/ubahStatus/{id}/{status}/kost', [PembayaranKostController::class, 'ubah'])->name('ubah-status-kost');
Route::get('/tambahKost', [KostController::class, 'index'])->name('tambah.kost');
Route::post('/tambahKost', [KostController::class, 'tambah'])->name('tambah-kost.perform');
Route::delete('/hapuskost/{id}', [PembayaranKostController::class, 'destroy'])->name('delete-kost');
Route::post('/upload/{id}/kost', [KostController::class, 'upload'])->name('upload-bukti-kost');

//Pembayaran wifi
Route::get('/dashboard/{auth}/pembayaranwifi', [PembayaranWifiController::class, 'index'])->name('pembayaranwifi');
Route::get('/ubahStatus/{id}/{status}/wifi', [PembayaranWifiController::class, 'ubah'])->name('ubah-status-wifi');
Route::delete('/hapuswifi/{id}', [PembayaranWifiController::class, 'destroy'])->name('delete-wifi');

//Pembayaran Listrik
Route::get('/dashboard/{auth}/pembayaranlistrik', [PembayaranListrikController::class, 'index'])->name('pembayaranlistrik');
Route::get('/ubahStatus/{id}/{status}/listrik', [PembayaranListrikController::class, 'ubah'])->name('ubah-status-listrik');
Route::get('/tambahListrik', [ListrikController::class, 'index'])->name('tambah.listrik');
Route::post('/tambahListrik', [ListrikController::class, 'tambah'])->name('tambah-listrik.perform');
Route::post('/upload/{id}/listrik', [ListrikController::class, 'upload'])->name('upload-bukti-listrik');
Route::delete('/hapuslistrik/{id}', [PembayaranListrikController::class, 'destroy'])->name('delete-listrik');

//wifi Customer
Route::get('/tambahWifi', [WifiController::class, 'index'])->name('tambah.wifi');
Route::post('/tambahWifi', [WifiController::class, 'tambah'])->name('tambah-wifi.perform');
Route::post('/upload/{id}/wifi', [WifiController::class, 'upload'])->name('upload-bukti-wifi');


//Daftar Makanan
Route::get('/dashboard/{auth}/menumakanan', [DaftarMakananController::class, 'index'])->name('menumakanan');
Route::get('/dashboard/menumakanan/{id}', [DaftarMakananController::class, 'show']);
Route::get('/dashboard/{auth}/kelolamenumakanan', [DaftarMakananController::class, 'adminindex']);
Route::get('/dashboard/kelolamenumakanan/create', [DaftarMakananController::class, 'create'])->name('tambah.menu');
Route::post('/upload-menumakanan/{id}', [DaftarMakananController::class, 'upload'])->name('upload-menumakanan');
Route::post('/tambahMenu', [DaftarMakananController::class, 'tambah'])->name('tambah-menu.perform');
Route::delete('/hapusmenu/{id}', [DaftarMakananController::class, 'destroy'])->name('delete-menumakanan');