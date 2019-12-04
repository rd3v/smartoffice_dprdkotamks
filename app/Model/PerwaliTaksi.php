<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PerwaliTaksi extends Model
{
    protected $table = 'tbl_perwali_taksi';

    public function perwali_kota() {
    	return $this->hasMany('App\Model\PerwaliKota');
    }

}
