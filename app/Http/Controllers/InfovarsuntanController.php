<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Va;
use Auth;

class InfovarsuntanController extends Controller
{
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

}
