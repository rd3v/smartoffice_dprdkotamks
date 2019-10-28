<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
  protected $table = 'tbl_settings';


  public static function getAll() {
    return self::all();
  }

  public static function getOne() {
    return self::first();
  }

}
