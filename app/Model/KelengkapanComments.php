<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class KelengkapanComments extends Model
{
    protected $table = 'tbl_kelengkapancomments';

    protected $fillable = [
    	'kelengkapan_id','comment','created_at'
    ];

    protected $hidden = [
    	'id','updated_at'
    ];

    public function kelengkapan() {
    	return $this->belongsTo('App\Model\Kelengkapan');
    }

}
