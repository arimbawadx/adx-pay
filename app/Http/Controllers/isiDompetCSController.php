<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mutations;
use App\Models\Customers;


class isiDompetCSController extends Controller
{
    public function transaksiDeposit()
    {
    	$mutasi = Mutations::where('jenis_transaksi', 'Isi Dompet')->get()->sortByDesc('created_at');
    	return view('cs.pages.transaksiDeposit', compact('mutasi'));
    }

    public function validTransfer($id)
    {
    	// ubah status transaksi
    	$dataTransaksi = Mutations::where('id', $id)->first();
    	$username = $dataTransaksi['username'];
    	$jumlah_deposit = $dataTransaksi['jumlah_deposit'];
    	$dataTransaksi->status = '4';
    	$dataTransaksi->note = 'Pengisian dompet sebesar Rp. '.$jumlah_deposit.' Berhasil';
    	
    	// update saldo customer
    	$UpdateSaldoCustomer = Customers::where('username', $username)->first();
    	$UpdateSaldoCustomer -> saldo = $UpdateSaldoCustomer -> saldo + $jumlah_deposit;
    	$UpdateSaldoCustomer -> point = $UpdateSaldoCustomer -> point + 1000;
    	$UpdateSaldoCustomer->save();
    	$dataTransaksi->save(); 

    	return redirect('cs/transaksi-deposit');
    }

    public function invalidTransfer($id)
    {
    	// ubah status transaksi
    	$dataTransaksi = Mutations::where('id', $id)->first();
    	$username = $dataTransaksi['username'];
    	$jumlah_deposit = $dataTransaksi['jumlah_deposit'];
    	$dataTransaksi->status = '2';
    	$dataTransaksi->note = 'Pengisian dompet sebesar Rp. '.$jumlah_deposit.' Gagal karena Data Transfer tidak valid, silahkan hubungi admin jika keberatan WA : 085847801933';
    	$dataTransaksi->save(); 

    	return redirect('cs/transaksi-deposit');
    }
}
