<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Kelengkapan extends Model
{
    protected $table = 'tbl_kelengkapan';

    protected $fillable = [
    	"persuratan_id","tiketperjalanan_id"
    ];

    protected $hidden = [
    	"id","created_at","updated_at"
    ];

    public function persuratan() {
    	return $this->belongsTo('App\Model\Persuratan');
    }

    public function tiketperjalanan() {
    	return $this->hasMany('App\Model\TiketPerjalanan');
    }
}
