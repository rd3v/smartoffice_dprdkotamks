<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostCommentsController extends Controller
{
    public function tiketPerjalanan(Request $request) {
    	$KelengkapanCommentsClass = "App\Model\KelengkapanComments";
    	$KelengkapanComments = new $KelengkapanCommentsClass;
    	$KelengkapanComments->Kelengkapan_id = $request->id;
    	$KelengkapanComments->comment = $request->comment;
    	
    	if($KelengkapanComments->save()) $response = ['state' => true,'title' => 'Koreksi tersimpan','type' => 'success']; else $response = ['state' => false,'title' => 'Gagal mengirim koreksi, silahkan hubungi admin','type' => 'danger'];
    	return response()->json($response);
    }
}
