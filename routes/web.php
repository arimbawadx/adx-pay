<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboardController;


// =====================login============================
Route::get('/', function(){
	return view('login');
});
// ======================end login===========================



// =======================Main===========================
Route::get('/dashboard', [dashboardController::class, 'index']);
// =======================end Main===========================