<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PembayaranKostController;
use App\Http\Controllers\KelolaPembayaranKostController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pembayaran_kost', [PembayaranKostController::class,'index']);

Route::get('/kelola_pembayaran_kost', [KelolaPembayaranKostController::class,'index']);
Route::get('/kelola_pembayaran_kost/create', [KelolaPembayaranKostController::class,'create']);
Route::post('/kelola_pembayaran_kost/store', [KelolaPembayaranKostController::class,'store']);
Route::get('/kelola_pembayaran_kost/{id}/edit', [KelolaPembayaranKostController::class,'edit']);
Route::put('/kelola_pembayaran_kost/{id}', [KelolaPembayaranKostController::class,'update']);