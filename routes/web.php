<?php
use App\Http\Controllers\{
	DashboardController,
	LaundryController,
	RegisterController,
	LoginController,
	ResetPassword,
	ChangePassword,
	PembayaranController,
	PembayaranWifiController,
	PembayaranKostController,
	KostController,
	DaftarMakananController,
    KelolaDataCustomerController,
    ListrikController,
	PembayaranListrikController,
	WifiController,
}; 
use Illuminate\Support\Facades\Route;

//Index
Route::get('/', [DashboardController::class, 'index'])->middleware('auth')->name('home');

// Pembayaran Laundry            
Route::get('/laundry/{auth}', [PembayaranController::class, 'index'])->name('home_laundry')->middleware('auth');
Route::get('/dashboard/{auth}', [DashboardController::class, 'admin'])->name('dashboard')->middleware('auth');

//Pembayaran Kost
Route::get('/dashboard/{auth}/pembayarankost', [PembayaranKostController::class, 'index'])->name('pembayarankost')->middleware('auth');

//Pembayaran wifi
Route::get('/dashboard/{auth}/pembayaranwifi', [PembayaranWifiController::class, 'index'])->name('pembayaranwifi')->middleware('auth');

//Pembayaran Listrik
Route::get('/dashboard/{auth}/pembayaranlistrik', [PembayaranListrikController::class, 'index'])->name('pembayaranlistrik')->middleware('auth');

//Daftar Makanan
Route::get('/dashboard/{auth}/menumakanan', [DaftarMakananController::class, 'index'])->name('menumakanan');


//login
Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest')->name('register.perform');
Route::get('/login', [LoginController::class, 'show'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login.perform');
Route::get('/reset-password', [ResetPassword::class, 'show'])->middleware('guest')->name('reset-password');
Route::post('/reset-password', [ResetPassword::class, 'send'])->middleware('guest')->name('reset.perform');
Route::get('/change-password', [ChangePassword::class, 'show'])->middleware('guest')->name('change-password');
Route::post('/change-password', [ChangePassword::class, 'update'])->middleware('guest')->name('change.perform');


// Kelola Data Customer
Route::get('dashboard/{auth}/kelolaDataCustomer', [KelolaDataCustomerController::class, 'index'])->name('kelola.data.customer');
Route::delete('/hapuscustomer/{id}', [KelolaDataCustomerController::class, 'destroy'])->name('delete-customer');

Route::group(['middleware', 'auth'], function () {
	//Laundry
	Route::get('/pembayaranlaundry/{auth}', [PembayaranController::class, 'index'])->name('pembayaran');
	Route::get('/ubahStatus/{id}/{status}/laundry', [PembayaranController::class, 'ubah'])->name('ubah-status-laundry');
	Route::get('/tambahLaundry', [LaundryController::class, 'index'])->name('tambah.laundry');
	Route::post('/tambahLaundry', [LaundryController::class, 'tambah'])->name('tambah-laundry.perform');
	Route::post('/upload/{id}', [LaundryController::class, 'upload'])->name('upload-bukti');
	Route::delete('/hapuslaundry/{id}', [PembayaranController::class, 'destroy'])->name('delete-laundry');

	//Kost
	Route::get('/ubahStatus/{id}/{status}/kost', [PembayaranKostController::class, 'ubah'])->name('ubah-status-kost');
	Route::get('/tambahKost', [KostController::class, 'index'])->name('tambah.kost');
	Route::post('/tambahKost', [KostController::class, 'tambah'])->name('tambah-kost.perform');
	Route::delete('/hapuskost/{id}', [PembayaranKostController::class, 'destroy'])->name('delete-kost');
	Route::post('/upload/{id}/kost', [KostController::class, 'upload'])->name('upload-bukti-kost');

	//Wifi
	Route::get('/ubahStatus/{id}/{status}/wifi', [PembayaranWifiController::class, 'ubah'])->name('ubah-status-wifi');
	Route::delete('/hapuswifi/{id}', [PembayaranWifiController::class, 'destroy'])->name('delete-wifi');

	//Listrik
	Route::get('/ubahStatus/{id}/{status}/listrik', [PembayaranListrikController::class, 'ubah'])->name('ubah-status-listrik');
	Route::get('/tambahListrik', [ListrikController::class, 'index'])->name('tambah.listrik');
	Route::post('/tambahListrik', [ListrikController::class, 'tambah'])->name('tambah-listrik.perform');
	Route::post('/upload/{id}/listrik', [ListrikController::class, 'upload'])->name('upload-bukti-listrik');
	Route::delete('/hapuslistrik/{id}', [PembayaranListrikController::class, 'destroy'])->name('delete-listrik');

	//Wifi Customer
	Route::get('/tambahWifi', [WifiController::class, 'index'])->name('tambah.wifi');
	Route::post('/tambahWifi', [WifiController::class, 'tambah'])->name('tambah-wifi.perform');
	Route::post('/upload/{id}/wifi', [WifiController::class, 'upload'])->name('upload-bukti-wifi');

	//Daftar Makanan
	Route::get('/dashboard/menumakanan/{id}', [DaftarMakananController::class, 'show']);
	Route::get('/dashboard/kelolamenumakanan/create', [DaftarMakananController::class, 'create'])->name('tambah.menu');
	Route::post('/upload-menumakanan/{id}', [DaftarMakananController::class, 'upload'])->name('upload-menumakanan');
	Route::post('/tambahMenu', [DaftarMakananController::class, 'tambah'])->name('tambah-menu.perform');
	Route::delete('/hapusmenu/{id}', [DaftarMakananController::class, 'destroy'])->name('delete-menumakanan');
	Route::get('/editmenu/{id}', [DaftarMakananController::class, 'edit']);
	Route::put('/editmenu/{id}/perform', [DaftarMakananController::class, 'update'])->name('edit-menu.perform');

	//Logout
	Route::post('logout', [LoginController::class, 'logout'])->name('logout');


});

