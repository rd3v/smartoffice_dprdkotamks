<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AnggotaDewan extends Model
{
  protected $table = 'tbl_anggota_dewan';

  protected $fillable = [
    "nama","partai_id","jabatan_id","komisi","jabatan","jabatan_text"
  ];

  protected $hidden = [
    "id","created_at","updated_at"
  ];

  public function partai() {
    return $this->belongsTo('App\Model\Partai');
  }

  public function suratTugasAnggotaDewan() {
    return $this->hasMany('App\Model\SuratTugasAnggotaDewan');
  }

  public function getAll() {
    return self::orderBy('jabatan_id','asc')->get();
  }

  public function getOne($orderBy = 'id', $delimeter = 'asc') {
    return self::orderBy($orderBy,$delimeter)->first();
  }

  public function getWhere(array $where) {
    return self::where($where);
  }

}
