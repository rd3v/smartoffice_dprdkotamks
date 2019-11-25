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
          'nama_pejabat'            => 'required',
          'jabatan'                 => 'required',
          'tipe_transportasi'       => 'required',
          'atas_beban'              => 'required',
          'kode_rekening'           => 'required'
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
          $Spd->nomor                    = $request->nomor;
          $Spd->nama_pejabat             = $request->nama_pejabat;
          $Spd->jabatan                  = $request->jabatan;
          $Spd->tipe_transportasi        = $request->tipe_transportasi;
          $Spd->atas_beban               = $request->atas_beban;
          $Spd->kode_rekening            = $request->kode_rekening;
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
        $this->data['surat_tugas'] = $SuratTugas->with(['surat_tugas_anggota_dewan' => function($query) {
            $query->with('anggota_dewan')->get();
        }])->where('id',$surat_tugas_id)->first();
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

      $this->data['data'] = Settings::getOne();
      $this->data['Spd'] = (object) $Spd->with('surat_tugas')->where(['id' => $id])->first();
      $this->data['Spd']->surat_tugas->tanggal_dikeluarkan = MyLibHelper::tgl_indo($this->data['Spd']->surat_tugas->tanggal_dikeluarkan);

      return view('pages.spd.protokoler.surat_perjalanan_dinas',$this->data);
    }


    public function print() {
      $SpdClass = "App\Model\Spd";
      $Spd = new $SpdClass;
 
      $this->data['data'] = Settings::getOne();
      $this->data['Spd'] = (object) $Spd->with('surat_tugas')->where(['status' => 0])->first();
      $this->data['Spd']->surat_tugas->tanggal_dikeluarkan = MyLibHelper::tgl_indo($this->data['Spd']->surat_tugas->tanggal_dikeluarkan);

      return view('pages.spd.protokoler.surat_perjalanan_dinas',$this->data);
    }

    public function verified() {
      $SpdClass = "App\Model\Spd";
      $Spd = new $SpdClass;

      $Spd->where('status',0)->update(['status' => 1]);
    }


}
