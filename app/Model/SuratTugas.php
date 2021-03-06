<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SuratTugas extends Model
{
  	protected $table = "tbl_surat_tugas";

    protected $fillable = [
				'id','persuratan_id','nomor','berdasarkan_surat','jenis_kegiatan','tanggal_surat_masuk','perihal',
        'untuk_maksud1','untuk_maksud2','untuk_maksud3','untuk_maksud4','untuk_maksud5',
				'tempat','tanggal_mulai','tanggal_akhir','tahun_anggaran','lambat_penyetoran',
        'tempat_dikeluarkan','tanggal_dikeluarkan','nama_yang_bertanda_tangan','jabatan','status'
    ];

    protected $hidden = [
				'created_at','updated_at'
    ];

		public function surat_tugas_tembusans() {
				return $this->hasMany('App\Model\SuratTugasTembusan');
		}

    public function persuratan() {
      return $this->belongsTo('App\Model\Persuratan');  
    }

    public function surat_tugas_anggota_dewan() {
      return $this->hasMany('App\Model\SuratTugasAnggotaDewan');  
    }

    public function surat_tugas_staff() {
      return $this->hasMany('App\Model\SuratTugasStaff');
    }

    public function anggota_dewan() {
      return $this->belongsTo('App\Model\AnggotaDewan');  
    }

    public function spd() {
      return $this->hasMany('App\Model\Spd');  
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
