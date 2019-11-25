<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SuratTugasAnggotaDewan extends Model
{

    	protected $table = "tbl_surat_tugas_anggota_dewan";

      protected $fillable = [
  				'id','surat_tugas_id','anggota_dewan_id'
      ];

      protected $hidden = [
  				'created_at','updated_at'
      ];

      public function surat_tugas() {
        return $this->belongsTo('App\Model\SuratTugas');
      }

  		public function anggota_dewan() {
  				return $this->belongsTo('App\Model\AnggotaDewan');
  		}

      public function getAll() {
        return self::all();
      }

      public function getOne($orderBy = 'id', $delimeter = 'asc') {
        return self::orderBy($orderBy,$delimeter)->first();
      }

      public function getWhere(array $where) {
        return self::where($where);
      }


}
