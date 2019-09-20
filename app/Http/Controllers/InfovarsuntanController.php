<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Va;

class InfovarsuntanController extends Controller
{
    public function dataInfovarsuntan()
    {
        $va = Va::get(); 

        return view('infovarsuntan', compact('va'));
      
    }

    
}
