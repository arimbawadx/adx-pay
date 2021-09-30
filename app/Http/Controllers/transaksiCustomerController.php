<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mutations;
use App\Models\Customers;
use App\Models\Hutang;
use Alert;


class transaksiCustomerController extends Controller
{
    public function transaksiPulsa1()
    {
        $username = session()->get('dataLoginCustomers')['username'];
        $mutasi = Mutations::where('username', $username)->get()->sortByDesc('created_at');
        return view('customers.pages.transaksiPulsa1', compact('mutasi'));
    }
    public function transaksiPulsa2(Request $request)
    {
        // cek provider
        if (substr(trim($request->no_hp), 0, 4)=='0859' OR substr(trim($request->no_hp), 0, 4)=='0877' OR substr(trim($request->no_hp), 0, 4)=='0878' OR substr(trim($request->no_hp), 0, 4)=='0817' OR substr(trim($request->no_hp), 0, 4)=='0818' OR substr(trim($request->no_hp), 0, 4)=='0819') {
            $inquiry = 'X';
        }elseif (substr(trim($request->no_hp), 0, 4)=='0814' OR substr(trim($request->no_hp), 0, 4)=='0815' OR substr(trim($request->no_hp), 0, 4)=='0816' OR substr(trim($request->no_hp), 0, 4)=='0855' OR substr(trim($request->no_hp), 0, 4)=='0856' OR substr(trim($request->no_hp), 0, 4)=='0857' OR substr(trim($request->no_hp), 0, 4)=='0858') {
            $inquiry = 'I';
        }elseif (substr(trim($request->no_hp), 0, 4)=='0811' OR substr(trim($request->no_hp), 0, 4)=='0812' OR substr(trim($request->no_hp), 0, 4)=='0813' OR substr(trim($request->no_hp), 0, 4)=='0821' OR substr(trim($request->no_hp), 0, 4)=='0822' OR substr(trim($request->no_hp), 0, 4)=='0823' OR substr(trim($request->no_hp), 0, 4)=='0852' OR substr(trim($request->no_hp), 0, 4)=='0853' OR substr(trim($request->no_hp), 0, 4)=='0851') {
            $inquiry = 'S';
        }elseif (substr(trim($request->no_hp), 0, 4)=='0898' OR substr(trim($request->no_hp), 0, 4)=='0899' OR substr(trim($request->no_hp), 0, 4)=='0895' OR substr(trim($request->no_hp), 0, 4)=='0896' OR substr(trim($request->no_hp), 0, 4)=='0897') {
            $inquiry = 'T';
        }elseif (substr(trim($request->no_hp), 0, 4)=='0889' OR substr(trim($request->no_hp), 0, 4)=='0881' OR substr(trim($request->no_hp), 0, 4)=='0882' OR substr(trim($request->no_hp), 0, 4)=='0883' OR substr(trim($request->no_hp), 0, 4)=='0886' OR substr(trim($request->no_hp), 0, 4)=='0887' OR substr(trim($request->no_hp), 0, 4)=='0888' OR substr(trim($request->no_hp), 0, 4)=='0884' OR substr(trim($request->no_hp), 0, 4)=='0885') {
            $inquiry = 'SM';
        }elseif (substr(trim($request->no_hp), 0, 4)=='0832' OR substr(trim($request->no_hp), 0, 4)=='0833' OR substr(trim($request->no_hp), 0, 4)=='0838' OR substr(trim($request->no_hp), 0, 4)=='0831') {
            $inquiry = 'AX';
        }

        // mengambil informasi produk
        $url = 'https://portalpulsa.com/api/connect/';

        $header = array(
            'portal-userid: P188648',
        'portal-key: 11b52208f4b343faab6d8500d2af5a83', // lihat hasil autogenerate di member area
        'portal-secret: fb49f43727e794793ad5004f0a94ffe129057df99eed9018f7bcb3d71c8f65ed', // lihat hasil autogenerate di member area
    );

        $dataHargaPulsa = array(
        'inquiry' => 'HARGA', // konstan
        'code' => 'pulsa', // pilihan: pln, pulsa, game
    );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_POSTREDIR, CURL_REDIR_POST_ALL);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataHargaPulsa);
        $resultHargaPulsa = curl_exec($ch);

        $contentHargaPulsa=utf8_encode($resultHargaPulsa);
        $resultHargaPulsa2=json_decode($contentHargaPulsa,true);
        $phone = $request->no_hp;

        $username = session()->get('dataLoginCustomers')['username'];
        $saldoCustomers = Customers::where('username', $username)->get()->first();


        return view('customers.pages.transaksiPulsa2', compact('inquiry', 'resultHargaPulsa2', 'phone', 'saldoCustomers'));
    }

    public function transaksiPulsa3(Request $request)
    {
        if ($request->metode_pembayaran == "Hutang") {
            $url = 'https://portalpulsa.com/api/connect/';

            $header = array(
                'portal-userid: P188648',
                'portal-key: 11b52208f4b343faab6d8500d2af5a83', // lihat hasil autogenerate di member area
                'portal-secret: fb49f43727e794793ad5004f0a94ffe129057df99eed9018f7bcb3d71c8f65ed', // lihat hasil autogenerate di member area
            );

            // membuat trxid_api
            $trxid_api = date('Ymd').rand();

            $data = array(
                'inquiry' => 'I', // konstan
                'code' => $request->code, // kode produk
                'phone' => $request->no_hp, // nohp pembeli
                'trxid_api' => $trxid_api, // Trxid / Reffid dari sisi client
                'no' => '1', // untuk isi lebih dari 1x dlm sehari, isi urutan 1,2,3,4,dst
            );

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_POSTREDIR, CURL_REDIR_POST_ALL);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            $result = curl_exec($ch);

            $dataCekStatus = array(
                'inquiry' => 'STATUS', // konstan
                'trxid_api' => $trxid_api, // Trxid atau Reffid dari sisi client saat transaksi pengisian
            );

            $ch1 = curl_init();
            curl_setopt($ch1, CURLOPT_URL, $url);
            curl_setopt($ch1, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch1, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch1, CURLOPT_POSTREDIR, CURL_REDIR_POST_ALL);
            curl_setopt($ch1, CURLOPT_HTTPHEADER, $header);
            curl_setopt($ch1, CURLOPT_POST, 1);
            curl_setopt($ch1, CURLOPT_POSTFIELDS, $dataCekStatus);
            $resultCekStatus = curl_exec($ch1);

            $resultCekStatus2=json_decode($resultCekStatus,true);

            $code = $resultCekStatus2['message'][0]['code'];
            $phone = $resultCekStatus2['message'][0]['phone'];
            $idcust = $resultCekStatus2['message'][0]['idcust'];
            $status = $resultCekStatus2['message'][0]['status'];
            $trxidApi = $resultCekStatus2['message'][0]['trxid_api'];
            $note = $resultCekStatus2['message'][0]['note'];
            // return $resultCekStatus2;

            // mencatat ke mutasi
            $mutasi = new Mutations;
            $mutasi -> username = session()->get('dataLoginCustomers')['username'];
            $mutasi -> jenis_transaksi = 'pulsa';
            $mutasi -> code = $code;
            $mutasi -> phone = $phone;
            if ($idcust==null) {    
                $mutasi -> idcust = null;
            }else{
                $mutasi -> idcust = $idcust;
            }
            $mutasi -> status = $status;
            $mutasi -> trxid_api = $trxidApi;
            if ($status == 2) {
                $mutasi -> note = "Transaksi gagal, Silahkan hubungi admin untuk cek kendala, WA : 085847801933";
            }elseif ($status == 4) {
                $mutasi -> note = "Transaksi berhasil, Terimakasih atas transaksi nya 😊 ";
            }else{
                $mutasi -> note = "Transaksi GHOIB, silahkan tunggu";
            }
            $mutasi -> save();

            // mencatat ke hutang
            if ($status == 4) {
                $hutang = new Hutang;
                $hutang -> customer_id = session()->get('dataLoginCustomers')['id'];
                if ($request->code == $request->inquiry.'5') {
                    $hutang -> nominal = 7000;
                }elseif ($request->code == $request->inquiry.'10') {
                    $hutang -> nominal = 12000;
                }elseif ($request->code == $request->inquiry.'12') {
                    $hutang -> nominal = 14000;
                }elseif ($request->code == $request->inquiry.'15') {
                    $hutang -> nominal = 17000;
                }elseif ($request->code == $request->inquiry.'20') {
                    $hutang -> nominal = 22000;
                }elseif ($request->code == $request->inquiry.'25') {
                    $hutang -> nominal = 27000;
                }elseif ($request->code == $request->inquiry.'30') {
                    $hutang -> nominal = 32000;
                }elseif ($request->code == $request->inquiry.'40') {
                    $hutang -> nominal = 42000;
                }elseif ($request->code == $request->inquiry.'50') {
                    $hutang -> nominal = 52000;
                }elseif ($request->code == $request->inquiry.'60') {
                    $hutang -> nominal = 62000;
                }elseif ($request->code == $request->inquiry.'70') {
                    $hutang -> nominal = 72000;
                }elseif ($request->code == $request->inquiry.'80') {
                    $hutang -> nominal = 82000;
                }elseif ($request->code == $request->inquiry.'90') {
                    $hutang -> nominal = 92000;
                }elseif ($request->code == $request->inquiry.'100') {
                    $hutang -> nominal = 102000;
                }elseif ($request->code == $request->inquiry.'150') {
                    $hutang -> nominal = 152000;
                }elseif ($request->code == $request->inquiry.'200') {
                    $hutang -> nominal = 202000;
                }elseif ($request->code == $request->inquiry.'250') {
                    $hutang -> nominal = 270000;
                }elseif ($request->code == $request->inquiry.'300') {
                    $hutang -> nominal = 302000;
                }elseif ($request->code == $request->inquiry.'500') {
                    $hutang -> nominal = 502000;
                }
                $hutang -> keterangan = "Pembelian Produk ".$request->code;
                $hutang -> save();
            }        

            return redirect('/customers/transaksi/pulsa/1');
        }elseif($request->metode_pembayaran == "Dompet") {

            // pengurangan dompet
            $idCustomer = session()->get('dataLoginCustomers')['id'];
            $ubahDompet = Customers::where('id', $idCustomer)->get()->first();
            $dompetSekarang = $ubahDompet->saldo;
            if ($request->code == $request->inquiry.'5') {
                $harga = 7000;
            }elseif ($request->code == $request->inquiry.'10') {
                $harga = 12000;
            }elseif ($request->code == $request->inquiry.'12') {
                $harga = 14000;
            }elseif ($request->code == $request->inquiry.'15') {
                $harga = 17000;
            }elseif ($request->code == $request->inquiry.'20') {
                $harga = 22000;
            }elseif ($request->code == $request->inquiry.'25') {
                $harga = 27000;
            }elseif ($request->code == $request->inquiry.'30') {
                $harga = 32000;
            }elseif ($request->code == $request->inquiry.'40') {
                $harga = 42000;
            }elseif ($request->code == $request->inquiry.'50') {
                $harga = 52000;
            }elseif ($request->code == $request->inquiry.'60') {
                $harga = 62000;
            }elseif ($request->code == $request->inquiry.'70') {
                $harga = 72000;
            }elseif ($request->code == $request->inquiry.'80') {
                $harga = 82000;
            }elseif ($request->code == $request->inquiry.'90') {
                $harga = 92000;
            }elseif ($request->code == $request->inquiry.'100') {
                $harga = 102000;
            }elseif ($request->code == $request->inquiry.'150') {
                $harga = 152000;
            }elseif ($request->code == $request->inquiry.'200') {
                $harga = 202000;
            }elseif ($request->code == $request->inquiry.'250') {
                $harga = 250000;
            }elseif ($request->code == $request->inquiry.'300') {
                $harga = 302000;
            }elseif ($request->code == $request->inquiry.'500') {
                $harga = 502000;
            }
            
            if ($dompetSekarang >= $harga) {
                $saldoNew = $dompetSekarang-$harga;
                return $dompetSekarang;
                $ubahDompet -> saldo = $saldoNew;
                $ubahDompet ->save();

                $url = 'https://portalpulsa.com/api/connect/';

                $header = array(
                    'portal-userid: P188648',
                'portal-key: 11b52208f4b343faab6d8500d2af5a83', // lihat hasil autogenerate di member area
                'portal-secret: fb49f43727e794793ad5004f0a94ffe129057df99eed9018f7bcb3d71c8f65ed', // lihat hasil autogenerate di member area
            );

            // membuat trxid_api
                $trxid_api = date('Ymd').rand();

                $data = array(
                'inquiry' => 'I', // konstan
                'code' => $request->code, // kode produk
                'phone' => $request->no_hp, // nohp pembeli
                'trxid_api' => $trxid_api, // Trxid / Reffid dari sisi client
                'no' => '1', // untuk isi lebih dari 1x dlm sehari, isi urutan 1,2,3,4,dst
            );

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                curl_setopt($ch, CURLOPT_POSTREDIR, CURL_REDIR_POST_ALL);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                $result = curl_exec($ch);

                $dataCekStatus = array(
                'inquiry' => 'STATUS', // konstan
                'trxid_api' => $trxid_api, // Trxid atau Reffid dari sisi client saat transaksi pengisian
            );

                $ch1 = curl_init();
                curl_setopt($ch1, CURLOPT_URL, $url);
                curl_setopt($ch1, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch1, CURLOPT_FOLLOWLOCATION, 1);
                curl_setopt($ch1, CURLOPT_POSTREDIR, CURL_REDIR_POST_ALL);
                curl_setopt($ch1, CURLOPT_HTTPHEADER, $header);
                curl_setopt($ch1, CURLOPT_POST, 1);
                curl_setopt($ch1, CURLOPT_POSTFIELDS, $dataCekStatus);
                $resultCekStatus = curl_exec($ch1);

                $resultCekStatus2=json_decode($resultCekStatus,true);

                $code = $resultCekStatus2['message'][0]['code'];
                $phone = $resultCekStatus2['message'][0]['phone'];
                $idcust = $resultCekStatus2['message'][0]['idcust'];
                $status = $resultCekStatus2['message'][0]['status'];
                $trxidApi = $resultCekStatus2['message'][0]['trxid_api'];
                $note = $resultCekStatus2['message'][0]['note'];
            // return $resultCekStatus2;

            // mencatat ke mutasi
                $mutasi = new Mutations;
                $mutasi -> username = session()->get('dataLoginCustomers')['username'];
                $mutasi -> jenis_transaksi = 'pulsa';
                $mutasi -> code = $code;
                $mutasi -> phone = $phone;
                if ($idcust==null) {    
                    $mutasi -> idcust = null;
                }else{
                    $mutasi -> idcust = $idcust;
                }
                $mutasi -> status = $status;
                $mutasi -> trxid_api = $trxidApi;
                if ($status == 2) {
                    $mutasi -> note = "Transaksi gagal, Silahkan hubungi admin untuk cek kendala, WA : 085847801933";
                }elseif ($status == 4) {
                    $mutasi -> note = "Transaksi berhasil, Terimakasih atas transaksi nya 😊 ";
                }else{
                    $mutasi -> note = "Transaksi GHOIB, silahkan tunggu";
                }
                $mutasi -> save();

            }else{
                Alert::error('Gagal', 'Saldo Anda tidak cukup kawan');
            }

            return redirect('/customers/transaksi/pulsa/1');
        }else{
            return redirect('/customers/transaksi/pulsa/1');
        }
    }
}