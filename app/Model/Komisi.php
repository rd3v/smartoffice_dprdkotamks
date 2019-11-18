<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Komisi extends Model
{
    protected $table = 'tbl_komisi';

    protected $fillable = [
    	"komisi","bidang"
    ];

    protected $hidden = [
    	"id","created_at","updated_at"
    ];

    public function anggota() {
    	return $this->hasMany('App\AnggotaKomisiModel');
    }

}
