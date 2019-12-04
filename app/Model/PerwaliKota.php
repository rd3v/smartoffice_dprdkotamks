<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PerwaliKota extends Model
{
    protected $table = 'tbl_perwali_kota';

    protected $fillable = [
    	'id','hotel_id'
    ];

    protected $hidden = [
    	'created_at','updated_at'
    ];

    public function perwali_hotel() {
    	return $this->belongsTo('App\Model\PerwaliHotel','hotel_id');
    }

    public function perwali_taksi() {
        return $this->belongsTo('App\Model\PerwaliTaksi','taksi_id');
    }
}
