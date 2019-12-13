<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Va;
use App\Transaksi;
use App\Setting;
use Auth;
use GuzzleHttp\Client;
use DataTables;

class InfovarsuntanController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function dataInfovarsuntan()
    {
        $va = Va::where('status_inquiry', '1')->get();


        return view('infovarsuntan', compact('va'));

    }



    public function ubahInfovarsuntan(Request $request, $id)
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

        $dataid = Va::findOrFail($id);
        $refid = $dataid['id'];

        $idva = "UNTANWS";
        $keyva = "plqQlf6fSoKKBWx4Lxmb0OOMwRKQ3TcN";
        $secretva = "C4UMXATbTT";
        $body = [
            'ref' => $refid,
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
        $url_create = "https://vabtn-dev.btn.co.id:9021/v1/untan/updVA";
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
            $editvarsuntan = Va::where('id', $id)->update([
                'user_id' => Auth::user()->id,
                'ref' => $refid,
                'va' => $y->va,
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
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ]);

            $vaaidi = Va::where('id', $id)->first();

            $addvarsuntan = Transaksi::create([
                'user_id' => Auth::user()->id,
                'ref' => $vaaidi->ref,
                'va_id' => $vaaidi->id,
                'nama' => $vaaidi->nama,
                'layanan' => $vaaidi->layanan,
                'kodelayanan' => $vaaidi->kodelayanan,
                'jenisbayar' => $vaaidi->jenisbayar,
                'kodejenisbyr' => $vaaidi->kodejenisbyr,
                'noid' => $vaaidi->noid,
                'tagihan' => $vaaidi->tagihan,
                'flag' => $vaaidi->flag,
                'expired' => $expired,
                'reserve' => $vaaidi->reserve,
                'description' => $vaaidi->description,
                'terbayar' => "0",
                'status_transaksi' => 'pending',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ]);

            \Session::flash('Berhasil', 'Data Virtual Account berhasil diubah');

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
    }



    public function hapusInfovarsuntan($id)
    {
        $datava = Va::findOrFail($id);
        $ref = $datava['ref'];
        $va = $datava['va'];

        $idva = "UNTANWS";
        $keyva = "plqQlf6fSoKKBWx4Lxmb0OOMwRKQ3TcN";
        $secretva = "C4UMXATbTT";
        $body = [
            'ref' => $ref,
            'va' => $va
        ];
        $sign = $idva.':'.json_encode($body).':'.$keyva;
        $signature = hash_hmac('sha256', $sign, $secretva);
        $url_create = "https://vabtn-dev.btn.co.id:9021/v1/untan/deleteVA";
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
//  $x = json_encode($body);
//  $y = json_decode($x);
//  dd($y->nama);


        if($response_decode->rsp === "000"){
            $deletevarsuntan = Va::where('id', $id)->update([
                'status_inquiry' => '0',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ]);;

            $vaaidi = Va::where('id', $id)->first();

            $addvarsuntan = Transaksi::create([
                'user_id' => Auth::user()->id,
                'ref' => $vaaidi->ref,
                'va_id' => $vaaidi->id,
                'nama' => $vaaidi->nama,
                'layanan' => $vaaidi->layanan,
                'kodelayanan' => $vaaidi->kodelayanan,
                'jenisbayar' => $vaaidi->jenisbayar,
                'kodejenisbyr' => $vaaidi->kodejenisbyr,
                'noid' => $vaaidi->noid,
                'tagihan' => $vaaidi->tagihan,
                'flag' => $vaaidi->flag,
                'expired' => $vaaidi->expired,
                'reserve' => $vaaidi->reserve,
                'description' => $vaaidi->description,
                'terbayar' => "0",
                'status_transaksi' => 'cancel',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ]);

            \Session::flash('Berhasil', 'Data Virtual Account berhasil dihapus');

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
    }


    public function getTable()
    {


        $va = Va::where('status_inquiry',1)->join('users', 'users.id', '=', 'va.user_id')->select('va.*', 'users.name')->get();

        return DataTables::of($va)

            ->addColumn('option', function ($va) {
                return '<button class="mb-2 mr-2 btn btn-success" data-toggle="modal" data-target=".bd-example-modal-sm-iquiry-'. $va->id .'"> <i class="fa fa-fw" aria-hidden="true" title="Copy to use bullhorn"></i> Cek Status
                </button>||&nbsp;
                <button class="mb-2 mr-2 btn btn-info" data-toggle="modal" data-target="#exampleModalLongDetail-'. $va->id .'"> <i class="fa fa-fw" aria-hidden="true" title="Copy to use address-card"></i> Detail
                </button>||&nbsp;
                <button class="mb-2 mr-2 btn btn-alternate" data-toggle="modal" data-target="#exampleModalLongEdit-'. $va->id .'"> <i class="fa fa-fw" aria-hidden="true" title="Copy to use edit"></i> Edit
                </button>||&nbsp;
                <button class="mb-2 mr-2 btn btn-danger" data-toggle="modal" data-target=".bd-example-modal-sm-delete-'. $va->id .'"> <i class="fa fa-fw" aria-hidden="true" title="Copy to use trash"></i> Delete
                </button>||&nbsp;
                <button class="mb-2 mr-2 btn btn-focus" data-toggle="modal" data-target="#exampleModalLongHistory-'. $va->id .'"> <i class="fa fa-fw" aria-hidden="true" title="Copy to use history"></i> History
                </button>';
            })
         ->addIndexColumn()

         ->addColumn('status', function ($va) {
            return '<div class="mb-2 mr-2 badge badge-pill badge-info">Pending</div>';
        })
     ->addIndexColumn()
     ->rawColumns(['status', 'option'])

        ->make(true);

    }





    public function header() {
		$shashin = Auth::user();
		return response()->json([
			'shashin' => $shashin,
		]);
    }

    
    public function history()
    {
        return view('History');
    }

    public function cari(Request $request)
    {
        $data['cari'] = $request->cari;
        $data['search'] = Va::where('va','like',$data['cari'])->orwhere('nama','like',$data['cari'])->get();

        return view('search_history', $data);
    }



}
