<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SuratTugasTembusan extends Model
{
    protected $table = 'tbl_surat_tugas_tembusan';

    protected $fillable = [
        'id','surat_tugas_id','kepada'
    ];

    protected $hidden = [
        'created_at','updated_at'
    ];

    public function surat_tugas() {
      return $this->belongsTo('App\Model\SuratTugas');
    }

    public static function getAll() {
      return self::all();
    }

    public static function getOne($orderBy = 'id', $delimeter = 'asc') {
      return self::orderBy($orderBy,$delimeter)->first();
    }

}
