<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Sppd extends Model
{
    protected $table = 'tbl_sppd';

    protected $fillable = [
    	"dinas_id","file","status","keterangan"
    ];

    protected $hidden = [
    	"id","created_at","updated_at"
    ];
}
