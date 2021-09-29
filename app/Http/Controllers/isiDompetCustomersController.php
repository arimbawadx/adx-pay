<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mutations;

class isiDompetCustomersController extends Controller
{
	public function index()
	{
		$username = session()->get('dataLoginCustomers')['username'];
		$mutasi = Mutations::where('username', $username)->where('jenis_transaksi', 'Isi Dompet')->get()->sortByDesc('id');
		return view('customers.pages.isiDompet', compact('mutasi'));
	}

	public function isiDompet(Request $request)
	{
    	// mencatat transaksi
		$transaksi = new Mutations;
		$username = session()->get('dataLoginCustomers')['username'];
		$transaksi->username = $username;
		$transaksi->jenis_transaksi = 'Isi Dompet';
		$transaksi->code = 'DD'.$request->jumlah_isi;
		$transaksi->status = '1';
		$transaksi->jumlah_deposit = $request->jumlah_isi;
		$transaksi->note = 'Silahkan Transfer sebesar Rp. '.$request->jumlah_isi.' ke rekening BRI 011-401-021881505 a.n I Made Yoga Arimbawa. Kemudian upload bukti transfer';
		$transaksi->save();
		return redirect('/customers/transaksi/isi-dompet');
	}

	public function uploadBuktiTransfer(Request $request, $id)
	{
    		// menyimpan data file yang diupload ke variabel $file
		$file = $request->file('bukti_transfer');
		
		    // nama file
		$namaFile = 'BT'.session()->get('dataLoginCustomers')['username'].date('dmYhis').'.'.$file->getClientOriginalExtension();
		
		    // isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'bukti_transfer';
		$file->move($tujuan_upload,$namaFile);

			// menyimpan ke db
		$simpanFIleName = Mutations::where('id', $id)->first();
		$simpanFIleName->bukti_transfer = $namaFile;
		$simpanFIleName->save();
		return redirect('/customers/transaksi/isi-dompet');
	}
}
