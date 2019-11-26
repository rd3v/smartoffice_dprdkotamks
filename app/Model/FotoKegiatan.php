<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FotoKegiatan extends Model
{
    protected $table = 'tbl_fotokegiatan';

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
