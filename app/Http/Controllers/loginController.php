<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\CustomerServices;
use App\Models\Customers;
use App\Mail\sendEmailCustomers;
use Illuminate\Http\Request;
use Alert;

class loginController extends Controller
{
  public function index(Request $request)
  {
    $CustomerService=CustomerServices::where('username', $request->username)->first();
    $Customer=Customers::where('username', $request->username)->first();

    if ($CustomerService==true) {
      if ($CustomerService && Hash::check($request->password, $CustomerService->password)) {
         Alert::success('Selamat Datang '.$CustomerService['name']);
         session()->put('dataLoginCustomerServices', $CustomerService);
         return redirect('/cs/dashboard');
      }else{
         Alert::error('username atau password salah');
         return redirect('/');
      }
   }elseif($Customer==true){
      if($Customer && Hash::check($request->password, $Customer->password)){
         Alert::success('Selamat Datang '.$Customer['name']);
         session()->put('dataLoginCustomers', $Customer);
         return redirect('/customers/dashboard');
      }else{
         Alert::error('username atau password salah');
         return redirect('/');
      }
   }else{
      Alert::error('username atau password salah');
      return redirect('/');
   }

}



public function logout()
{
   Alert::success('Anda Keluar');
   session()->forget('dataLoginCustomerServices');
   session()->forget('dataLoginCustomers');
   return redirect('/');
}

      // public function daftarCustomers(Request $request)
      // {
      //    $random="CUS".rand();
      //      $cus= new Customers;
      //      $cus->name=$request->nama;
      //      $cus->username=$random;
      //      $cus->password=Hash::make($random);
      //      if (substr(trim($request->no_hp), 0, 2)=='62') {
      //          $cus->phone_number='0'.substr(trim($request->no_hp), 2);
      //      }else{
      //          $cus->phone_number=$request->no_hp;
      //      }
      //      $cus->email=$request->email;


      //      // send wa
      //      $chatApiToken = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJleHAiOjE2MjE5MzYwMzksInVzZXIiOiI2Mjg4MTAzNzA0MjIxNSJ9.hca2CUc_g6a9PZGmB4Xxlocm6qA1v5Ko_BwyYZKxFK0"; // Get it from https://www.phphive.info/255/get-whatsapp-password/
      //      if (substr(trim($request->no_hp), 0, 2)=='62') {
      //          $number = $request->no_hp; // Number
      //      }else{
      //          $number = '+62'.substr(trim($request->no_hp), 1);
      //      }
      //      $message = "Berikut Adalah data login anda: \nUsername : ".$random." \nPassword : ".$random; // Message
      //      $curl = curl_init();
      //      curl_setopt_array($curl, array(
      //      CURLOPT_URL => 'http://chat-api.phphive.info/message/send/text',
      //      CURLOPT_RETURNTRANSFER => true,
      //      CURLOPT_ENCODING => '',
      //      CURLOPT_MAXREDIRS => 10,
      //      CURLOPT_TIMEOUT => 0,
      //      CURLOPT_FOLLOWLOCATION => true,
      //      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      //      CURLOPT_CUSTOMREQUEST => 'POST',
      //      CURLOPT_POSTFIELDS =>json_encode(array("jid"=> $number."@s.whatsapp.net", "message" => $message)),
      //      CURLOPT_HTTPHEADER => array(
      //      'Authorization: Bearer '.$chatApiToken,
      //      'Content-Type: application/json'
      //      ),
      //      ));
      //      $response = curl_exec($curl);
      //      curl_close($curl);
      //      // echo $response;     

      //      // send email
      //      $emailDataLogin = [
      //      'title' => 'Halo '.$request->nama,
      //      'username' => $random,
      //      'password' => $random,
      //      'nama' => $request->nama
      //      ];

      //      \Mail::to($request->email)->send(new sendEmailCustomers($emailDataLogin));

      //      // return page
      //      $cus->save();
      //      Alert::success('Buat Akun Berhasil', 'Selamat datang '.$request->nama.' sayangggkuu, Silahkan Check Email atau Whatsaap untuk Data Login');
      //      return redirect('/');
      // }
}
