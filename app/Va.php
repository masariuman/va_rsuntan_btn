<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Va extends Model
{
    //
    protected $table = 'va';
    protected $fillable = [
    	'user_id',
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
    public function report() {
		return $this->hasMany('App\Report', 'va_id');
	}
}
