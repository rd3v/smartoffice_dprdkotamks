<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SuratTugasStaff extends Model
{
 	  
 	  protected $table = "tbl_surat_tugas_staff";

      protected $fillable = [
			'id','surat_tugas_id','staff_id'
      ];

      protected $hidden = [
			'created_at','updated_at'
      ];

      public function surat_tugas() {
        return $this->belongsTo('App\Model\SuratTugas');
      }

      public function staff() {
    		return $this->belongsTo('App\Model\Staff');
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
