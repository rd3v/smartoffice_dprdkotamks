<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RincianAkhir extends Model
{
    protected $table = 'tbl_rincianakhir';

    protected $fillable = [

    ];

    protected $hidden = [
    	'id','created_at','updated_at'
    ];

    public function persuratan() {
    	return $this->belongsTo('App\Model\Persuratan');
    }
}
