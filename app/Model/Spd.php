<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Spd extends Model
{
    protected $table = 'tbl_spd';

    protected $fillable = [
    	"persuratan_id","surat_tugas_id","anggota_id","nomor",
        "tipe_transportasi","status","created_at","updated_at"
    ];

    protected $hidden = [
    	"id","created_at","updated_at"
    ];

    public function surat_tugas() {
    	return $this->belongsTo('App\Model\SuratTugas');
    }

    public function anggota_dewan() {
        return $this->belongsTo('App\Model\AnggotaDewan','anggota_id');
    }

    public function staff() {
        return $this->belongsTo('App\Model\Staff','anggota_id');
    }

}
