<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Model\Settings;

use Auth;
use Validator;

use App\Helpers\MyLibHelper;

class SpdController extends Controller
{

    private $data = [];

    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect()->back();
        // $this->data['user'] = Auth::user();
        // $this->data['users'] = User::where('level','<>','master')->get();
        // return view('pages.spd.protokoler.index',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $SpdClass = "App\Model\Spd";
      $Spd = new $SpdClass;

      $SpdDelete = $Spd->where('status',0)->delete();

      $rules = [
          'nomor'                   => 'required|unique:tbl_spd',
          'persuratan_id'           => 'required',
          'surat_tugas_id'          => 'required',
          'anggota_id'              => 'required',
          'tipe_transportasi'       => 'required'
      ];

      $validator = Validator::make($request->all(), $rules);


      if ($validator->fails()) {
        return response()->json([
          'state' => false,
          'errors' => $validator->errors()
        ]);
      } else {
          $Spd->persuratan_id            = $request->persuratan_id;
          $Spd->surat_tugas_id           = $request->surat_tugas_id;
          $Spd->anggota_id               = $request->anggota_id;
          $Spd->nomor                    = $request->nomor;
          $Spd->tipe_transportasi        = $request->tipe_transportasi;
          $Spd->status                   = 0;

          if($Spd->save()) {
                $response = ['state' => true,'title' => 'Sukses','text' => 'Data telah tersimpan','type' => 'success'];
          } else {

                $response = ['state' => false,'class' => 'Spd','title' => 'Gagal','text' => 'Data gagal tersimpan, silahkan hubungi admin','type' => 'error'];

          }
        
          return response()->json($response);

      }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function buatspd($surat_tugas_id) {
        $SuratTugasClass = "App\Model\SuratTugas";
        $SuratTugas = new $SuratTugasClass;

        $this->data['user'] = Auth::user();
        
        $this->data['surat_tugas'] = $this->data['user']->protokoler_type == 'ad' ? $SuratTugas->with('surat_tugas_anggota_dewan')->where('id',$surat_tugas_id)->first() : $SuratTugas->with('surat_tugas_staff')->where('id',$surat_tugas_id)->first();

        return view('pages.spd.create',$this->data);        
    }

    public function checkNomorSPD(Request $request) {
      $SpdClass = "App\Model\Spd";
      $Spd = new $SpdClass;

      $check = $Spd->where('nomor',$request->nomor)->first();
      if($check != null) return response()->json(true); else return response()->json(false);
    }

    public function printthis($id) {
      $SpdClass = "App\Model\Spd";
      $Spd = new $SpdClass;

      $this->data['user'] = Auth::user();
      $this->data['data'] = Settings::getOne();
      $this->data['Spd'] = (object) $Spd->with('surat_tugas')->where(['id' => $id])->first();
      $this->data['Spd']->surat_tugas->tanggal_dikeluarkan = MyLibHelper::tgl_indo($this->data['Spd']->surat_tugas->tanggal_dikeluarkan);

      $this->data['tanggal_mulai'] = MyLibHelper::tgl_indo($this->data['Spd']->surat_tugas->tanggal_mulai);
      $this->data['tanggal_akhir'] = MyLibHelper::tgl_indo($this->data['Spd']->surat_tugas->tanggal_akhir);

      return view('pages.spd.protokoler.surat_perjalanan_dinas',$this->data);
    }


    public function print() {
      $SpdClass = "App\Model\Spd";
      $Spd = new $SpdClass;

      $user = Auth::user();
      $this->data['user'] = $user;
      $this->data['data'] = Settings::getOne();

      if($user->protokoler_type == 'ad') {
        $this->data['Spd'] = (object) $Spd->with('surat_tugas','anggota_dewan')->where(['status' => 0])->first();
      } else if($user->protokoler_type == 'staff') {
        $this->data['Spd'] = (object) $Spd->with('surat_tugas','staff')->where(['status' => 0])->first();
      }

      $this->data['Spd']->surat_tugas->tanggal_dikeluarkan = MyLibHelper::tgl_indo($this->data['Spd']->surat_tugas->tanggal_dikeluarkan);
      
      $this->data['tanggal_mulai'] = MyLibHelper::tgl_indo($this->data['Spd']->surat_tugas->tanggal_mulai);
      $this->data['tanggal_akhir'] = MyLibHelper::tgl_indo($this->data['Spd']->surat_tugas->tanggal_akhir);

      return view('pages.spd.protokoler.surat_perjalanan_dinas',$this->data);
    }

    public function verified() {
      $SpdClass = "App\Model\Spd";
      $Spd = new $SpdClass;

      $Spd->where('status',0)->update(['status' => 1]);
    }


}
