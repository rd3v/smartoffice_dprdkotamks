<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Persuratan extends Model
{
    protected $table = 'tbl_persuratan';

    protected $fillable = [
    	'id','surat_tugas_id','kelengkapan_id'
    ];

    protected $hidden = ['created_at','updated_at'];

    public function suratTugas() {
    	return $this->hasOne('App\Model\SuratTugas');
    }

    public function spd() {
        return $this->hasMany('App\Model\Spd');
    }

    public function rincian() {

    }

    public function rekapan() {

    }

    public function kelengkapan() {
        return $this->hasOne('App\Model\Kelengkapan');
    }

    public function rincian_akhir() {
        return $this->hasOne('App\Model\RincianAkhir');
    }

    public static function boot() {
      parent::boot();
      self::deleting(function($surat) {
        
        $surat->suratTugas()->each(function($surat) {
          	$surat->delete(); // delete
        });

        // do the rest cleanup

      });

	}

}
