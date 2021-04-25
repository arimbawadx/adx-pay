<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class dashboardCSController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $url = 'https://portalpulsa.com/api/connect/';

        $header = array(
        'portal-userid: P46764',
        'portal-key: 41fcc20cd1e5ca411b197501cb6f0921', // lihat hasil autogenerate di member area
        'portal-secret: 2adfc91b46723e05053cc76a8a37c43392abe12dd53f2ce3e418f6bd0d78dc55', // lihat hasil autogenerate di member area
        );

        $data = array(
        'inquiry' => 'S', // konstan
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_POSTREDIR, CURL_REDIR_POST_ALL);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $resultSaldo = curl_exec($ch);

        $contentSaldo=utf8_encode($resultSaldo);
        $resultSaldo2=json_decode($contentSaldo,true);
        // return $resultSaldo2;
        $saldo = $resultSaldo2['balance'];


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
        
        // return $saldo;
        return view('cs.pages.dashboard', compact('saldo', 'resultHargaPulsa2'));
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
