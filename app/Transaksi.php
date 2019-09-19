<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    //
    protected $table = 'transaksi';
    protected $fillable = [
        'user_id',
        'va_id',
    	'ref',
    	'va',
    	'nama',
    	'layanan',
        'kodelayanan',
        'jenisbayar',
        'kodejenisbyr',
        'noid',
        'tagihan',
        'flag',
        'expired',
        'reserve',
        'description',
        'status_inquiry',
    ];
    public function user() {
		return $this->belongsTo('App\User', 'user_id');
	}
	public function transaksi() {
		return $this->hasMany('App\Transaksi', 'va_id');
	}
}
