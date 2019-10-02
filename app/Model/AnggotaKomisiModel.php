<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AnggotaKomisiModel extends Model
{
    protected $table = 'tbl_anggota_komisi';

    protected $fillable = [
    	"komisi_id","nama","tempat_lahir","tanggal_lahir","users_id",
    	"email","telepon","jabatan","foto","keterangan"
    ];

    protected $hidden = [
    	"id","created_at","updated_at"
    ];
}
