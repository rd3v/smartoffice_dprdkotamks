<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TiketPerjalanan extends Model
{
    protected $table = 'tbl_tiketperjalanan';

    protected $fillable = [
    	"kelengkapan_id","file"
    ];

    protected $hidden = [
    	"id","created_at","updated_at"
    ];

    public function kelengkapan() {
    	return $this->belongsTo('App\Model\Kelengkapan');
    }

}
