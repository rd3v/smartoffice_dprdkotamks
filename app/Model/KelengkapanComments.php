<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class KelengkapanComments extends Model
{
    protected $table = 'tbl_kelengkapancomments';

    protected $fillable = [
    	'kelengkapan_id','comment'
    ];

    protected $hidden = [
    	'id','created_at','updated_at'
    ];

    public function tiket_perjalanan() {
    	return $this->belongsTo('App\Model\TiketPerjalanan');
    }

}
