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
        $vaedit = VA::where('id', $id)->update([
            'user_id' => Auth::user()->id,
            'va' => $request->va,
            'nama' => $request->nama,
            'layanan' => $request->layanan,
            'kodelayanan' => $request->kodelayanan,
            'jenisbayar' => $request->jenisbayar,
            'kodejenisbyr' => $request->kodejenisbyr,
            'noid' => $request->kodejenisbyr,
            'tagihan' => $request->tagihan,
            'flag' => $request->flag,
            'expired' => $request->expired,
            'reserve' => $request->reserve,
            'description' => $request->reserve,
            'status_inquiry' => '0',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        \Session::flash('Berhasil', 'Data Virtual Account berhasil diubah');

        return back();
    }



    public function hapusInfovarsuntan($id)
    {
        $vadelete = Va::where('id', $id)->delete();

        \Session::flash('Berhasil', 'Data Virtual Account berhasil dihapus');

        return back();
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
