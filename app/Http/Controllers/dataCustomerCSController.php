<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;
use Illuminate\Support\Facades\Hash;
use App\Mail\sendEmailCustomers;
use Alert;

class dataCustomerCSController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataCustomer = Customers::all();
        return view('cs.pages.dataCustomers', compact('dataCustomer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $random="CUS".rand();
        $cus= new Customers;
        $cus->name=$request->nama;
        $cus->username=$random;
        $cus->password=Hash::make($random);
        if (substr(trim($request->no_hp), 0, 2)=='62') {
            $cus->phone_number='0'.substr(trim($request->no_hp), 2);
        }else{
            $cus->phone_number=$request->no_hp;
        }
        $cus->email=$request->email;
        

        // send wa
        $chatApiToken = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJleHAiOjE2MjE5MzYwMzksInVzZXIiOiI2Mjg4MTAzNzA0MjIxNSJ9.hca2CUc_g6a9PZGmB4Xxlocm6qA1v5Ko_BwyYZKxFK0"; // Get it from https://www.phphive.info/255/get-whatsapp-password/
        if (substr(trim($request->no_hp), 0, 2)=='62') {
            $number = $request->no_hp; // Number
        }else{
            $number = '+62'.substr(trim($request->no_hp), 1);
        }
        $message = "Berikut Adalah data login anda: \nUsername : ".$random." \nPassword : ".$random; // Message
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://chat-api.phphive.info/message/send/text',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>json_encode(array("jid"=> $number."@s.whatsapp.net", "message" => $message)),
        CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer '.$chatApiToken,
        'Content-Type: application/json'
        ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        // echo $response;     

        // send email
        $emailDataLogin = [
        'title' => 'Halo '.$request->nama,
        'username' => $random,
        'password' => $random,
        'nama' => $request->nama
        ];
   
        \Mail::to($request->email)->send(new sendEmailCustomers($emailDataLogin));
        
        // return page
        $cus->save();
        Alert::success('Ditambahkan', 'Customer '.$request->nama.' berhasil ditambahkan');
        return redirect('/cs/users/data-customers');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cus=Customers::where('id', $id)->first();
        $cus->name=$request->nama;
        if (substr(trim($request->no_hp), 0, 2)=='62') {
            $cus->phone_number='0'.substr(trim($request->no_hp), 2);
        }else{
            $cus->phone_number=$request->no_hp;
        }
        $cus->email=$request->email;

        // return page
        $cus->save();
        Alert::success('Diperbaharui', 'Customer '.$request->nama.' berhasil diperbaharui');
        return redirect('/cs/users/data-customers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cus=Customers::where('id', $id)->first();
        $cus->delete();
        return redirect('/cs/users/data-customers');
    }
}
