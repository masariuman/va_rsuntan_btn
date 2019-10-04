<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Va;
use Auth;
use DataTables;

class InfovarsuntanController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    
    public function dataInfovarsuntan()
    {
        $va = Va::get(); 

        return view('infovarsuntan', compact('va'));
      
    }



    public function ubahInfovarsuntan(Request $request, $id)
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
        $url_create = "https://vabtn-dev.btn.co.id:9021/v1/untan/updVA";
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


        // $vaedit = VA::where('id', $id)->update([
        //     'user_id' => Auth::user()->id,
        //     'va' => $request->va,
        //     'nama' => $request->nama,
        //     'layanan' => $request->layanan,
        //     'kodelayanan' => $request->kodelayanan,
        //     'jenisbayar' => $request->jenisbayar,
        //     'kodejenisbyr' => $request->kodejenisbyr,
        //     'noid' => $request->kodejenisbyr,
        //     'tagihan' => $request->tagihan,
        //     'flag' => $request->flag,
        //     'expired' => $request->expired,
        //     'reserve' => $request->reserve,
        //     'description' => $request->reserve,
        //     'status_inquiry' => '0',
        //     'created_at' => \Carbon\Carbon::now(),
        //     'updated_at' => \Carbon\Carbon::now(),
        // ]);

        // \Session::flash('Berhasil', 'Data Virtual Account berhasil diubah');

        // return back();
    }



    public function hapusInfovarsuntan($id)
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
        ];
        $sign = $idva.':'.json_encode($body).':'.$keyva;
        $signature = hash_hmac('sha256', $sign, $secretva);
        $url_create = "https://vabtn-dev.btn.co.id:9021/v1/untan/deleteVA";
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


        // $vadelete = Va::where('id', $id)->delete();

        // \Session::flash('Berhasil', 'Data Virtual Account berhasil dihapus');

        // return back();
    }


    public function getTable()
    {
       

        $va = Va::join('users', 'users.id', '=', 'va.user_id')->select('va.*', 'users.name')->get();
     
        return DataTables::of($va)

            ->addColumn('option', function ($va) {
                return '<button class="mb-2 mr-2 btn btn-success" data-toggle="modal" data-target=".bd-example-modal-sm-iquiry-'. $va->id .'"> <i class="fa fa-fw" aria-hidden="true" title="Copy to use plus-square"></i> Iquiry
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

}
