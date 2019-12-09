<?php 

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AnggotaDewanController extends Controller
{
	public function get(Request $request) {
    	$SpdClass = "App\Model\Spd";
    	$Spd = $SpdClass::with('anggota_dewan')->where('surat_tugas_id',$request->surat_tugas_id)->get();
    	return response()->json($Spd);		
	}

	public function getByKomisi(Request $request) {
		$AnggotaDewanClass = "App\Model\AnggotaDewan";
		$AnggotaDewan = $AnggotaDewanClass::where('komisi',$request->untuk)->orWhere('jabatan','ketua')->orWhere('jabatan','wakil')->get();
		return response()->json($AnggotaDewan);
	}

	public function getByFraksi(Request $request) {
		$AnggotaDewanClass = "App\Model\AnggotaDewan";
		$AnggotaDewan = $AnggotaDewanClass::where('partai_id',$request->fraksi)->get();
		return response()->json($AnggotaDewan);
	}

}

?>