<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

use function GuzzleHttp\json_decode;

// use GuzzleHttp\Message\Request;

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
        $va = "9457800010100110011";
        $kode_institusi = 4578;
        $length_vs = 19;
        $kode_product = 000;
        $id = "UNTANWS";
        $key = "plqQlf6fSoKKBWx4Lxmb0OOMwRKQ3TcN";
        $secret = "C4UMXATbTT";
        $signature = "0bf145958638ea90cb1a0162b11b294e02247062f61521818ca166fdc09896ca";
        $ref = "123456789012";
        $url_inq = "https://vabtn-dev.btn.co.id:9021/v1/untan/inqVA";
        $url_create = "https://vabtn-dev.btn.co.id:9021/v1/untan/createVA";
        $url_update = "https://vabtn-dev.btn.co.id:9021/v1/untan/updVA";
        $url_delete = "https://vabtn-dev.btn.co.id:9021/v1/untan/deleteVA";
        $url_report = "https://vabtn-dev.btn.co.id:9021/v1/untan/report";


        $body = ['ref' => $ref, 'va' => $va];


        $client = new Client([
            'verify' => false,'headers' => ['Content-Type' => 'application/json','id' => $id, 'key' => $key, 'signature' => $signature]
        ]);

        $request = $client->post($url_inq,
            ['body' => json_encode($body)]
        );

        $response = $request->getBody()->getContents();
        $response_decode = json_decode($response);
        dd($response_decode);





    }
}
