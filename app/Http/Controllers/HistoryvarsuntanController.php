<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Va;
use App\Transaksi;
use App\Setting;
use Auth;
use GuzzleHttp\Client;
use DataTables;

class HistoryvarsuntanController extends Controller
{
    public function dataHistoryvarsuntan()
    {
        $va = Va::where('status_inquiry', '1')->get();


        return view('historyvarsuntan', compact('va'));

    }
}
