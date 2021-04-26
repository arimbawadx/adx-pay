<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\CustomerServices;
use App\Models\Customers;
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
}
