<?php
use App\Http\Controllers\{
	PembayaranWifiController
}; 
            
Route::get('/dashboard/{auth}wifi', [PembayaranWifiController::class, 'index'])->name('home');
Route::get('/ubahStatus/{id}/{status}', [PembayaranWifiController::class, 'ubah'])->name('ubah-status');