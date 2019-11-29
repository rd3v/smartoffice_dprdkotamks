<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RincianAwal extends Model
{
    protected $table = 'tbl_rincianawal';

    protected $fillable = [
    	'id'
    ];

    protected $hidden = [
    	'created_','updated_at'
    ];

    public function persuratan() {
    	return $this->belongsTo('App\Model\Persuratan');
    }

}
