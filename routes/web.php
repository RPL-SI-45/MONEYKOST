<?php
use App\Http\Controllers\{
	PembayaranController,
	LaundryController
}; 
            
Route::get('/', function () {return redirect('/dashboard');})->middleware('auth');
	Route::get('/dashboard', [PembayaranController::class, 'index'])->name('home')->middleware('auth');
Route::group(['middleware' => 'auth'], function () {

});