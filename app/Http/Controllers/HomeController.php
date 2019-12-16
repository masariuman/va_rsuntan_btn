<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Setting;
use App\Va;
use App\User;
use Auth;
use Hash;

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
        $va = "94578000f";
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

    public function test_create()
    {

        // return view('home');
        $va = "9457800010100110011";
        $kode_institusi = 4578;
        $length_vs = 19;
        $kode_product = 000;
        $id = "UNTANWS";
        $key = "plqQlf6fSoKKBWx4Lxmb0OOMwRKQ3TcN";
        $secret = "C4UMXATbTT";
        $signature = "2f7c6d0d63c7868be05d8fe8c625593f8495bca10397cd32705e0a83b6c003ba";
        $ref = "123456789012";
        $nama = "UNTAN";
        $layanan = "layanan";
        $kodelayanan = "100001";
        $jenisbayar = "transfer";
        $kodejenisbyr = "1";
        $noid = "000001";
        $tagihan = 200;
        $flag = "F";
        $expired = "";
        $reserve = "";
        $description = "";
        $url_inq = "https://vabtn-dev.btn.co.id:9021/v1/untan/inqVA";
        $url_create = "https://vabtn-dev.btn.co.id:9021/v1/untan/createVA";
        $url_update = "https://vabtn-dev.btn.co.id:9021/v1/untan/updVA";
        $url_delete = "https://vabtn-dev.btn.co.id:9021/v1/untan/deleteVA";
        $url_report = "https://vabtn-dev.btn.co.id:9021/v1/untan/report";


        $body = [
            'ref' => $ref,
            'va' => $va,
            'nama' => $nama,
            'layanan' => $layanan,
            'kodelayanan' => $kodelayanan,
            'jenisbayar' => $jenisbayar,
            'kodejenisbyr' => $kodejenisbyr,
            'noid' => $noid,
            'tagihan' => $tagihan,
            'flag' => $flag,
            'expired' => $expired,
            'reserve' => $reserve,
            'description' => $description
        ];


        $client = new Client([
            'verify' => false,'headers' => ['Content-Type' => 'application/json','id' => $id, 'key' => $key, 'signature' => $signature]
        ]);

        $request = $client->post($url_create,
            ['body' => json_encode($body)]
        );

        $response = $request->getBody()->getContents();
        $response_decode = json_decode($response);
        // dd($response_decode);
        // dd(json_encode($body));
        // $sign = $id.':'.json_encode($body).':'.$key;
        // echo $sign;
        echo json_encode($body);
    }

    public function test_update()
    {

        // return view('home');
        $va = "9457800010100110011";
        $kode_institusi = 4578;
        $length_vs = 19;
        $kode_product = 000;
        $id = "UNTANWS";
        $key = "plqQlf6fSoKKBWx4Lxmb0OOMwRKQ3TcN";
        $secret = "C4UMXATbTT";
        $signature = "960d18444bdc9c2d547ed80ac765f7884d323fb7f386e7131b36a5b9c0c06292";
        $ref = "123456789012";
        $nama = "UNTAN";
        $layanan = "layanan apdet";
        $kodelayanan = "100001";
        $jenisbayar = "transfer";
        $kodejenisbyr = "1";
        $noid = "000001";
        $tagihan = 200;
        $flag = "F";
        $expired = "";
        $reserve = "";
        $description = "";
        $url_inq = "https://vabtn-dev.btn.co.id:9021/v1/untan/inqVA";
        $url_create = "https://vabtn-dev.btn.co.id:9021/v1/untan/createVA";
        $url_update = "https://vabtn-dev.btn.co.id:9021/v1/untan/updVA";
        $url_delete = "https://vabtn-dev.btn.co.id:9021/v1/untan/deleteVA";
        $url_report = "https://vabtn-dev.btn.co.id:9021/v1/untan/report";


        $body = [
            'ref' => $ref,
            'va' => $va,
            'nama' => $nama,
            'layanan' => $layanan,
            'kodelayanan' => $kodelayanan,
            'jenisbayar' => $jenisbayar,
            'kodejenisbyr' => $kodejenisbyr,
            'noid' => $noid,
            'tagihan' => $tagihan,
            'flag' => $flag,
            'expired' => $expired,
            'reserve' => $reserve,
            'description' => $description
        ];


        $client = new Client([
            'verify' => false,'headers' => ['Content-Type' => 'application/json','id' => $id, 'key' => $key, 'signature' => $signature]
        ]);

        $request = $client->post($url_update,
            ['body' => json_encode($body)]
        );

        $response = $request->getBody()->getContents();
        $response_decode = json_decode($response);
        dd($response_decode);
        // dd(json_encode($body));
    }

    public function test_delete()
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

        $request = $client->post($url_delete,
            ['body' => json_encode($body)]
        );

        $response = $request->getBody()->getContents();
        $response_decode = json_decode($response);
        dd($response_decode);
    }

    public function test_something() {
        $expired_hour = Setting::findOrFail(1);
        $setting = Setting::findOrFail(1);
        $date = \Carbon\Carbon::now();
        $parse = \Carbon\Carbon::parse($date);
        $besok = $parse->addHour($expired_hour->expired);
        echo $date;
        echo "  |  ";
        echo $besok;
        echo "  |  ";
        $duar = explode("-",$besok);
        $duarr = explode(" ",$duar[2]);
        $duarrr = explode(":",$duarr[1]);
        $y = substr( $duar[0], -2);

        $expired = $y.$duar[1].$duarr[0].$duarrr[0].$duarrr[1];
        // dd($duar);
        echo $expired;
        $va = "12345";

        $fixva = $setting->prefix_va.$setting->kode_instituse.$setting->kode_payment.$va;
        echo " | ";
        // echo $fixva;

        $vaaidi = Va::all()->last();
        echo $vaaidi;
    }

    public function account() {
        $data['account'] = User::findOrFail(Auth::user()->id);
        return view('account', $data);
    }

    public function account_edit(Request $request) {
        $account = User::findOrFail(Auth::user()->id);
        $oldcheck = Hash::check($request->oldpassword,$account->password);
        if($request->newpassword === $request->newpasswordconfirm){
            if($oldcheck) {
                $pass = Hash::make($request->newpassword);
                $update = $account->update([
                    'password' => $pass,
                    'updated_at' => \Carbon\Carbon::now(),
                ]);
                \Session::flash('Berhasil', 'Password Berhasil Diubah');
                return back();
            }
            else {
                \Session::flash('Gagal', 'Password lama yang dimasukkan tidak sesuai dengan data yang ada');
                return back();
            }

        }
        else {
            \Session::flash('Gagal', 'Masukan Password Baru tidak Sesuai Dengan Konfirmasi Masukan Password Baru');
            return back();
        }
        // return view('account', $data);
    }
}
