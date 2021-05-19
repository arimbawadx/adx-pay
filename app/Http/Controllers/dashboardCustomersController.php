<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;
use App\Models\Mutations;
use Alert;

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
        $point = $customer['point']; 
        return view('customers.pages.dashboard', compact('saldo', 'point'));
    }

    public function tarikCoin()
    {
        $id = session()->get('dataLoginCustomers')['id'];
        $customer = Customers::where('id', $id)->get()->first();
        $point = $customer['point'];
        $customer->saldo = $customer['saldo'] + $point/10;
        
        // mencatat transaksi
        $transaksi = new Mutations;
        $transaksi->username = $customer['username'];
        $transaksi->jenis_transaksi = 'Tarik Coin';
        $transaksi->code = 'TC'.$customer['point'];
        $transaksi->status = '4';
        $transaksi->note = "Penarikan Coin sebesar ".$point." Coin berhasil";
        $transaksi->save();

        $customer->point = null;
        $customer->save();
        Alert::success('Penarikan Berhasil', 'Uang anda saat ini sebesar Rp. '.$customer['saldo']);
        return redirect('/customers/dashboard');
    }
}
