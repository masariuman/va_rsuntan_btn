<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiHistory extends Model
{
    //
    protected $table = 'transaksi_history';
    protected $fillable = [
        'transaksi_id',
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
    public function transaksi() {
        return $this->belongsTo('App\Transaksi', 'transaksi_id');
    }
}
