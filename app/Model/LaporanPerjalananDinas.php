<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class LaporanPerjalananDinas extends Model
{
    protected $table = 'tbl_laporan_perjalanan_dinas';

    protected $fillable = [
    	"perjalanan_id","users_id","hal","lama","mulai",
        "akhir","status","keterangan"
    ];

    protected $hidden = [
    	"id","created_at","updated_at"
    ];

    public function spd() {
    	return $this->hasMany('App\Sppd');
    }

    public function invoice_hotel() {
    	return $this->hasMany('App\InvoiceHotel');
    }

    public function tiket_perjalanan() {
    	return $this->hasMany('App\TiketPerjalanan');
    }

    public function foto_kegiatan() {
    	return $this->hasMany('App\FotoKegiatan');
    }

    public function laporan() {
    	return $this->hasMany('App\Laporan');
    }

}
