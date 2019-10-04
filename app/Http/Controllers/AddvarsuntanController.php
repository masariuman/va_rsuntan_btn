<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Va;
use Auth;
use GuzzleHttp\Client;

use function GuzzleHttp\json_decode;

class AddvarsuntanController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function formAddvarsuntan()
    {
        return view('addvarsuntan');
    }

    public function tambahAddvarsuntan(Request $request)
    {
        $date = \Carbon\Carbon::now();
        $parse = \Carbon\Carbon::parse($date);
        $besok = $parse->addHour(24);
        // echo $date;
        // echo "  |  ";
        // echo $besok;
        // echo "  |  ";
        $duar = explode("-",$besok);
        $duarr = explode(" ",$duar[2]);
        $duarrr = explode(":",$duarr[1]);
        $y = substr( $duar[0], -2);

        $expired = $y.$duar[1].$duarr[0].$duarrr[0].$duarrr[1];
        // dd($duar);
        // echo $expired;



        $nextId = Va::max('id') + 1;
        $idva = "UNTANWS";
        $keyva = "plqQlf6fSoKKBWx4Lxmb0OOMwRKQ3TcN";
        $secretva = "C4UMXATbTT";
        $body = [
            'ref' => $request->input('id', $nextId),
            'va' => $request->va,
            'nama' => $request->nama,
            'layanan' => $request->layanan,
            'kodelayanan' => $request->kodelayanan,
            'jenisbayar' => $request->jenisbayar,
            'kodejenisbyr' => $request->kodejenisbyr,
            'noid' => $request->noid,
            'tagihan' => (int)$request->tagihan,
            'flag' => $request->flag,
            'expired' => $expired,
            'reserve' => $request->reserve,
            'description' => $request->description
        ];
        $sign = $idva.':'.json_encode($body).':'.$keyva;
        $signature = hash_hmac('sha256', $sign, $secretva);
        $url_create = "https://vabtn-dev.btn.co.id:9021/v1/untan/createVA";
        // echo $sign;

        $client = new Client([
            'verify' => false,'headers' => ['Content-Type' => 'application/json','id' => $idva, 'key' => $keyva, 'signature' => $signature]
        ]);

        $request = $client->post($url_create,
            ['body' => json_encode($body)]
        );

        $response = $request->getBody()->getContents();
        $response_decode = json_decode($response);
        dd($response_decode);


        // $addvarsuntan = Va::create([
        //     'user_id' => Auth::user()->id,
        //     'ref' => $request->input('id', $nextId),
        //     'va' => $request->va,
        //     'nama' => $request->nama,
        //     'layanan' => $request->layanan,
        //     'kodelayanan' => $request->kodelayanan,
        //     'jenisbayar' => $request->jenisbayar,
        //     'kodejenisbyr' => $request->kodejenisbyr,
        //     'noid' => $request->noid,
        //     'tagihan' => $request->tagihan,
        //     'flag' => $request->flag,
        //     'expired' => $request->expired,
        //     'reserve' => $request->reserve,
        //     'description' => $request->reserve,
        //     'status_inquiry' => '0',
        //     'created_at' => \Carbon\Carbon::now(),
        //     'updated_at' => \Carbon\Carbon::now(),
        // ]);

        // $client = new Client();
        // $response = $client->post('url', [
        //     GuzzleHttp\RequestOptions::JSON => ['foo' => 'bar']
        // ]);


        // \Session::flash('Berhasil', 'Data Virtual Account berhasil ditambahkan');

        // return back();
    }

}
