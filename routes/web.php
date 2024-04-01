<?php
use App\Http\Controllers\{
	PembayaranController,
	LaundryController
}; 
            
Route::get('/', function () {return redirect('/dashboard');})->middleware('auth');
	Route::get('/dashboard', [PembayaranController::class, 'index'])->name('home')->middleware('auth');
Route::group(['middleware' => 'auth'], function () {
	Route::get('/ubahStatus/{id}/{status}', [PembayaranController::class, 'ubah'])->name('ubah-status');
	Route::get('/tambahLaundry', [LaundryController::class, 'index'])->name('tambah.laundry');
	Route::post('/tambahLaundry', [LaundryController::class, 'tambah'])->name('tambah-laundry.perform');
});