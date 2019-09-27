<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     return view('home');
    // }

    public function test_inquiry()
    {

        // return view('home');
        $va = 9333300100000000001;
        $kode_institusi = 3333;
        $length_vs = 19;
        $kode_product = 001;
        $id = "BTNTEST";
        $key = "BtNT3sting";
        $secret = "SeCr3tKey";
        $signature = "fffd0bc1b10a4acd5286d1dc0acc59fa04c7a8bc";
        $ref = "123456789012";

        $client = new \GuzzleHttp\Client();
        $response = $client->post('https://vabtn-dev.btn.co.id:9021/test/inqVA', [
            GuzzleHttp\RequestOptions::JSON => [
                'header' => [
                    'Content-Type' => 'application/json',
                    'id' => $id,
                    'key' => $key,
                    'signature' => $signature
                ],
                'body' => [
                    'ref' => $ref,
                    'va' => $va
                ]
            ]
        ]);
    }
}
