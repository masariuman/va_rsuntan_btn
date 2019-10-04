<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    //
    protected $table = 'setting';
    protected $fillable = [
        'nama',
        'expired',
    	'prefix_va',
    	'kode_instituse',
    	'kode_payment',
    ];
}
