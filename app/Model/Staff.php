<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $table = 'tbl_staff';

    protected $fillable = [
    	'id','nama','golongan','nip','jabatan','bagian'
    ];

    protected $hidden = [
    	'created','updated_at'
    ];

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
