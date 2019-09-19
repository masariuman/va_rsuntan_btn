<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    //
    protected $table = 'report';
    protected $fillable = [
        'va_id',
    	'rsp',
    	'rspdesc',
    	'nama',
        'teller',
        'transcode',
        'seq',
        'tgl',
        'jam',
        'amount',
        'revflag',
        'revseq',
        'revjam',
        'tagihan',
        'terbayar',
    ];
    public function user() {
		return $this->belongsTo('App\User', 'user_id');
	}
}
