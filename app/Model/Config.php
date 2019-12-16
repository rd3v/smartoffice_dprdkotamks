<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    protected $table = 'config';

    protected $fillable = [
    	'id','feature','module','status'
    ];

    protected $hidden = [
    	'created_at','updated_at'
    ];
}
