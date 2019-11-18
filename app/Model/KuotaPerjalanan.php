<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class KuotaPerjalanan extends Model
{
    protected $table = 'tbl_kuota_perjalanan';

    protected $fillable = [
    	"users_id","awal","akhir","kuota","terlaksana",
    	"belum","status","keterangan"
    ];

    protected $hidden = [
    	"id","created_at","updated_at"
    ];
}
