<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Va;
use App\Setting;
use App\TransaksiHistory;
use App\Transaksi;
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
        $data['setting'] = Setting::findOrFail(1);
        $data['firstva'] = $data['setting']->prefix_va.$data['setting']->kode_instituse.$data['setting']->kode_payment;
        return view('addvarsuntan',$data);
    }

    public function tambahAddvarsuntan(Request $request)
    {

        $setting = Setting::findOrFail(1);
        $date = \Carbon\Carbon::now();
        $parse = \Carbon\Carbon::parse($date);
        $besok = $parse->addHour($setting->expired);
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


        $fixva = $setting->prefix_va.$setting->kode_instituse.$setting->kode_payment.$request->va2;

        $nextId = Va::max('id') + 1;
        $idva = "UNTANWS";
        $keyva = "plqQlf6fSoKKBWx4Lxmb0OOMwRKQ3TcN";
        $secretva = "C4UMXATbTT";
        $body = [
            'ref' => $nextId,
            'va' => $fixva,
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
        // return $sign;

        $client = new Client([
            'verify' => false,'headers' => ['Content-Type' => 'application/json','id' => $idva, 'key' => $keyva, 'signature' => $signature]
        ]);

        $request = $client->post($url_create,
            ['body' => json_encode($body)]
        );

        $response = $request->getBody()->getContents();
        $response_decode = json_decode($response);
        // dd($response_decode->rsp);

// dd($response_decode);
// $ax = json_encode($body->va);
 $x = json_encode($body);
 $y = json_decode($x);
//  dd($y->nama);




        if($response_decode->rsp === "000"){
            $addvarsuntan = Va::create([
                'user_id' => Auth::user()->id,
                'ref' => $nextId,
                'va' => $fixva,
                'nama' => $y->nama,
                'layanan' => $y->layanan,
                'kodelayanan' => $y->kodelayanan,
                'jenisbayar' => $y->jenisbayar,
                'kodejenisbyr' => $y->kodejenisbyr,
                'noid' => $y->noid,
                'tagihan' => $y->tagihan,
                'flag' => $y->flag,
                'expired' => $expired,
                'reserve' => $y->reserve,
                'description' => $y->description,

                'status_inquiry' => '1',
                'status' => 'pending',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ]);

            $vaaidi = Va::all()->last();

            $addvarsuntan = Transaksi::create([
                'user_id' => Auth::user()->id,
                'ref' => $nextId,
                'va_id' => $vaaidi->id,
                'nama' => $y->nama,
                'layanan' => $y->layanan,
                'kodelayanan' => $y->kodelayanan,
                'jenisbayar' => $y->jenisbayar,
                'kodejenisbyr' => $y->kodejenisbyr,
                'noid' => $y->noid,
                'tagihan' => $y->tagihan,
                'flag' => $y->flag,
                'expired' => $expired,
                'reserve' => $y->reserve,
                'description' => $y->description,
                'terbayar' => "0",
                'status_transaksi' => 'pending',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ]);

            \Session::flash('Berhasil', 'Data Virtual Account berhasil ditambahkan');

            return back();
        }
        else if($response_decode->rsp === "001"){
            \Session::flash('Gagal', 'VA not found');
            // echo "VA not found";
        }
        else if($response_decode->rsp === "002"){
            \Session::flash('Gagal', 'Kesalahan pada kode institusi');
            // echo "Kesalahan pada kode institusi";
        }
        else if($response_decode->rsp === "003"){
            \Session::flash('Gagal', 'Kesalahan tipe pembayaran');
            // echo "Kesalahan tipe pembayaran";
        }
        else if($response_decode->rsp === "004"){
            \Session::flash('Gagal', 'Paramete Akun institusi tidak ditemukan');
            // echo "Paramete Akun institusi tidak ditemukan";
        }
        else if($response_decode->rsp === "005"){
            \Session::flash('Gagal', 'nomor akun institusi salah');
            // echo "nomor akun institusi salah";
        }
        else if($response_decode->rsp === "006"){
            \Session::flash('Gagal', 'nomor akun institusi salah');
            // echo "nomor akun institusi salah";
        }
        else if($response_decode->rsp === "007"){
            \Session::flash('Gagal', 'kesalahan pada nomor va');
            // echo "kesalahan pada nomor va";
        }
        else if($response_decode->rsp === "008"){
            \Session::flash('Gagal', 'kadaluarsa lebih rendah dari hari ini');
            // echo "kadaluarsa lebih rendah dari hari ini";
        }
        else if($response_decode->rsp === "009"){
            \Session::flash('Gagal', 'kesalahan tanggal kadaluarsa');
            // echo "kesalahan tanggal kadaluarsa";
        }
        else if($response_decode->rsp === "098"){
            \Session::flash('Gagal', 'penggantian night mode atau day mode');
            // echo "penggantian night mode atau day mode";
        }
        else if($response_decode->rsp === "099"){
            \Session::flash('Gagal', 'tidak memiliki hak akses');
            // echo "tidak memiliki hak akses";
        }
        else if($response_decode->rsp === "998"){
            \Session::flash('Gagal', 'signature salah, silahkan kontak IT support');
            // echo "signature salah, silahkan kontak IT support";
        }
        else {
            \Session::flash('Gagal', 'GENERAL ERROR, LAKUKAN REFRESH atau TEKAN TOMBOL F5. Hubungi STAFF IT BILA TERJADI ERROR YANG SAMA');
            // echo "GENERAL ERROR, LAKUKAN REFRESH atau TEKAN TOMBOL F5. Hubungi STAFF IT BILA TERJADI ERROR YANG SAMA";
        }



        // $client = new Client();
        // $response = $client->post('url', [
        //     GuzzleHttp\RequestOptions::JSON => ['foo' => 'bar']
        // ]);



    }

}
