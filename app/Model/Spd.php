<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Spd extends Model
{
    protected $table = 'tbl_spd';

    protected $fillable = [
    	"persuratan_id","nomor","pejabat_yang_memberi_perintah","pejabat_yang_mengadakan_perjalanan_dinas","jabatan_dari_yang_diperintahkan",
    	"tempat","tanggal_mulai","tanggal_akhir","perihal","atas_beban","kode_rekening",
    	"surat_tugas_nomor","tanggal","created_at","updated_at"
    ];

    protected $hidden = [
    	"id","created_at","updated_at"
    ];

    public function persuratan() {
    	return $this->belongsTo('App\Model\Persuratan');
    }
}
