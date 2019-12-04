<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StaffController extends Controller
{
	public function get(Request $request) {
    	$SpdClass = "App\Model\Spd";
    	$Spd = $SpdClass::with('staff')->where('surat_tugas_id',$request->surat_tugas_id)->where('status',1)->get();
    	return response()->json($Spd);
	}

	// public function get(Request $request) {
 //    	$SuratTugasStaffClass = "App\Model\SuratTugasStaff";
 //    	$SuratTugasStaff = new $SuratTugasStaffClass;
 //    	$response = $SuratTugasStaff::with('staff')->where('surat_tugas_id',$request->surat_tugas_id)->get();
 //    	return response()->json($response);
	// }

}
