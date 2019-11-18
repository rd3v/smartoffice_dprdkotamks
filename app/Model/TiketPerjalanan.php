<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TiketPerjalanan extends Model
{
    protected $table = 'tbl_tiket_perjalanan';

    protected $fillable = [
    	"dinas_id","file","status","keterangan"
    ];

    protected $hidden = [
    	"id","created_at","updated_at"
    ];
}
