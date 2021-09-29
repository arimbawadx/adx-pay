<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboardCSController;
use App\Http\Controllers\dashboardCustomersController;
use App\Http\Controllers\dataCSCSController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\dataCustomerCSController;
use App\Http\Controllers\transaksiCSController;
use App\Http\Controllers\transaksiCustomerController;
use App\Http\Controllers\dataTransaksiCustomersController;
use App\Http\Controllers\isiDompetCustomersController;
use App\Http\Controllers\isiDompetCSController;


// =====================login============================
Route::get('/', function(){
	return view('login');
});
Route::post('/login-check', [loginController::class, 'index']);
Route::get('/logout', [loginController::class, 'logout']);
// ======================end login===========================



// =======================Customer Service===========================
// dashboard
Route::get('/cs/dashboard', [dashboardCSController::class, 'index'])->middleware('SessionCustomerServices');

// data cs
Route::get('/cs/users/data-cs', [dataCSCSController::class, 'index'])->middleware('SessionCustomerServices');
Route::post('/cs/users/data-cs', [dataCSCSController::class, 'store'])->middleware('SessionCustomerServices');
Route::post('/cs/users/data-cs/update/{id}', [dataCSCSController::class, 'update'])->middleware('SessionCustomerServices');
Route::get('/cs/users/data-cs/delete/{id}', [dataCSCSController::class, 'destroy'])->middleware('SessionCustomerServices');

// data Customer
Route::get('/cs/users/data-customers', [dataCustomerCSController::class, 'index'])->middleware('SessionCustomerServices');
Route::post('/cs/users/data-customers', [dataCustomerCSController::class, 'store'])->middleware('SessionCustomerServices');
Route::post('/cs/users/data-customers/update/{id}', [dataCustomerCSController::class, 'update'])->middleware('SessionCustomerServices');
Route::get('/cs/users/data-customers/delete/{id}', [dataCustomerCSController::class, 'destroy'])->middleware('SessionCustomerServices');

// transaksi
Route::get('/cs/transaksi/pulsa/1', [transaksiCSController::class, 'transaksiPulsa1'])->middleware('SessionCustomerServices');
Route::post('/cs/transaksi/pulsa/2', [transaksiCSController::class, 'transaksiPulsa2'])->middleware('SessionCustomerServices');
Route::post('/cs/transaksi/pulsa/3', [transaksiCSController::class, 'transaksiPulsa3'])->middleware('SessionCustomerServices');

// menunggu konfirmasi
Route::get('/cs/transaksi-deposit', [isiDompetCSController::class, 'transaksiDeposit'])->middleware('SessionCustomerServices');

// validTransfer
Route::get('/cs/isi-dompet/valid/{id}', [isiDompetCSController::class, 'validTransfer'])->middleware('SessionCustomerServices');

// invalid Tranfer
Route::get('/cs/isi-dompet/invalid/{id}', [isiDompetCSController::class, 'invalidTransfer'])->middleware('SessionCustomerServices');
// =======================end Customer Service===========================



// =======================Customer===========================
// daftar
// Route::get('/customers/daftar', function(){
// 	return view('customers.pages.daftar');
// });
// Route::post('/customers/registering', [loginController::class, 'daftarCustomers']);

// dashboard
Route::get('/customers/dashboard', [dashboardCustomersController::class, 'index'])->middleware('SessionCustomers');

// tarik-coin
Route::post('/customers/tarik-coin', [dashboardCustomersController::class, 'tarikCoin'])->middleware('SessionCustomers');

// data-transaksi
Route::get('/customers/data-transaksi', [dataTransaksiCustomersController::class, 'index'])->middleware('SessionCustomers');

// isi dompet
Route::get('/customers/transaksi/isi-dompet', [isiDompetCustomersController::class, 'index'])->middleware('SessionCustomers');
Route::post('/customers/transaksi/isi-dompet/proses', [isiDompetCustomersController::class, 'isiDompet'])->middleware('SessionCustomers');
Route::post('/customers/transaksi/isi-dompet/upload-bukti/{id}', [isiDompetCustomersController::class, 'uploadBuktiTransfer'])->middleware('SessionCustomers');

// transaksi
Route::get('/customers/transaksi/pulsa/1', [transaksiCustomerController::class, 'transaksiPulsa1'])->middleware('SessionCustomers');
Route::post('/customers/transaksi/pulsa/2', [transaksiCustomerController::class, 'transaksiPulsa2'])->middleware('SessionCustomers');
Route::post('/customers/transaksi/pulsa/3', [transaksiCustomerController::class, 'transaksiPulsa3'])->middleware('SessionCustomers');


// =======================end Customer===========================