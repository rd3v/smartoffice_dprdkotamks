<?php 

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AnggotaDewanController extends Controller
{
	public function get(Request $request) {
    	$SpdClass = "App\Model\Spd";
    	$Spd = $Spd::with('anggota_dewan')->where('surat_tugas_id',$request->surat_tugas_id)->get();
    	return response()->json($Spd);		
	}
}

?>