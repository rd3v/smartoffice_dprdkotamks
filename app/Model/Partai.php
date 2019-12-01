<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Partai extends Model
{
    protected $table = 'tbl_partai';

    protected $hidden = ['id','created_at','updated_at'];

    public function anggota_dewan() {
    	return $this->belongsTo('App\Model\AnggotaDewan');
    }
}
