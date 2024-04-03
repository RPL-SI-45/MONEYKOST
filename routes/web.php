<?php
use App\Http\Controllers\{
	PembayaranController,
	LaundryController
}; 
            
Route::get('/dashboard/{auth}', [PembayaranController::class, 'index'])->name('home');
Route::get('/ubahStatus/{id}/{status}', [PembayaranController::class, 'ubah'])->name('ubah-status');
Route::get('/tambahLaundry', [LaundryController::class, 'index'])->name('tambah.laundry');
Route::post('/tambahLaundry', [LaundryController::class, 'tambah'])->name('tambah-laundry.perform');
Route::post('/upload/{id}', [LaundryController::class, 'upload'])->name('upload-bukti');
