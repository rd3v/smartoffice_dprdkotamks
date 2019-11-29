<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Spd extends Model
{
    protected $table = 'tbl_spd';

    protected $fillable = [
    	"persuratan_id","surat_tugas_id","nomor","nama_pejabat","jabatan",
    	"tipe_transportasi","status","created_at","updated_at"
    ];

    protected $hidden = [
    	"id","created_at","updated_at"
    ];

    public function surat_tugas() {
    	return $this->belongsTo('App\Model\SuratTugas');
    }
}
