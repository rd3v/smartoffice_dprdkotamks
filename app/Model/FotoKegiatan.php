<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FotoKegiatan extends Model
{
    protected $table = 'tbl_foto_kegiatan';

    protected $fillable = [
    	"dinas_id","file","status","keterangan"
    ];

    protected $hidden = [
    	"id","created_at","updated_at"
    ];
}
