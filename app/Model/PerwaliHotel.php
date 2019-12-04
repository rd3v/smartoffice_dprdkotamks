<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PerwaliHotel extends Model
{
    protected $table = 'tbl_perwali_hotel';

    protected $fillable = [
    	'id','provinsi','satuan','walikota_wakilwalikota_pimpinan','sekretarisdaerah_pejabateselon2_anggotadprd','pejabateselon3_golongan4','pejabateselon4_golongan3','golongan1_dan_golongan2'
    ];

    protected $hidden = [
    	'created_at','updated_at'
    ];

    public function perwali_kota() {
    	return $this->hasMany('App\Model\PerwaliKota');
    }
}
