<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mutations;

class dataTransaksiCustomersController extends Controller
{
    public function index()
    {
    	$username = session()->get('dataLoginCustomers')['username'];
    	$mutasi = Mutations::where('username', $username)->get();
    	return view('customers.pages.dataTransaksi', compact('mutasi'));
    }
}
