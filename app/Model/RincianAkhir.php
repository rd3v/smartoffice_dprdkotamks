<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RincianAkhir extends Model
{
    protected $table = 'tbl_rincianakhir';

    public function persuratan() {
    	return $this->belongsTo('App\Model\Persuratan');
    }
}
