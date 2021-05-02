<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;

class dashboardCustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$id = session()->get('dataLoginCustomers')['id'];
        $customer = Customers::where('id', $id)->get()->first();
        $saldo = $customer['saldo']; 
        return view('customers.pages.dashboard', compact('saldo'));
    }
}
