<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class InvoiceHotel extends Model
{
    protected $table = 'tbl_invoice_hotel';

    protected $fillable = [
    	"dinas_id","file","status","keterangan"
    ];

    protected $hidden = [
    	"id","created_at","updated_at"
    ];
}
