<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboardCSController;
use App\Http\Controllers\dataCSCSController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\dataCustomerCSController;
use App\Http\Controllers\transaksiCSController;


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
// =======================end Customer Service===========================