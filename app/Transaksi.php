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
        'terbayar',
        'status_transaksi',
    ];
    public function user() {
		return $this->belongsTo('App\User', 'user_id');
	}
	public function va() {
		return $this->belongsTo('App\Va', 'va_id');
	}
}
