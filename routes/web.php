<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboardCSController;
use App\Http\Controllers\dataCSCSController;

// =====================login============================
Route::get('/', function(){
	return view('login');
});
// ======================end login===========================



// =======================Customer Service===========================
Route::get('/cs/dashboard', [dashboardCSController::class, 'index']);
Route::get('/cs/users/data-cs', [dataCSCSController::class, 'index']);
Route::post('/cs/users/data-cs', [dataCSCSController::class, 'store']);
Route::post('/cs/users/data-cs/update/{id}', [dataCSCSController::class, 'update']);
Route::get('/cs/users/data-cs/delete/{id}', [dataCSCSController::class, 'destroy']);
// =======================end Customer Service===========================