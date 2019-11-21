<?php

namespace App\Http\Controllers;

use App\Model\Settings;
use App\User;
use Illuminate\Http\Request;
use App\Helpers\MyLibHelper;

use Auth;
use Validator;

class SuratTugasController extends Controller
{

    public function __construct() {}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $PersuratanClass = "App\Model\Persuratan";
      $SuratTugasClass = "App\Model\SuratTugas";
      $Persuratan = new $PersuratanClass;
      $SuratTugas = new $SuratTugasClass;

      $SuratTugasDelete = $SuratTugas->where('status',0)->delete();
      if($SuratTugasDelete) {
        $Persuratan->where(['sppd_id' => null,'rincian_id' => null])->delete();
      }
      
      $dp = $Persuratan->with('SuratTugas')->orderBy('id','desc')->get();
      $Persuratan_DataSurat = [];
      foreach ($dp as $value) {
        if($value->suratTugas != null) {
          array_push($Persuratan_DataSurat, (object) [
            'persuratan_id' => $value->suratTugas->persuratan_id,
            'id' => $value->suratTugas->id,
            'nomor' => $value->suratTugas->nomor,
            'berdasarkan_surat' => $value->suratTugas->berdasarkan_surat,
            'tanggal_surat_masuk' => $value->suratTugas->tanggal_surat_masuk,
            'perihal' => $value->suratTugas->perihal,
            'tanggal_mulai' => $value->suratTugas->tanggal_mulai,
            'tanggal_akhir' => $value->suratTugas->tanggal_akhir,
            'status' => $value->status,
          ]);
        }
      }

      $this->data['user'] = Auth::user();
      $this->data['SuratTugas'] = $Persuratan_DataSurat;
      return view('pages.protokoler.surat_tugas.index',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $AnggotaDewanClass = "App\Model\AnggotaDewan";
        $AnggotaDewan = new $AnggotaDewanClass;

        $this->data['user'] = Auth::user();
        $this->data['anggota_dewan'] = $AnggotaDewan->getAll();
        return view('pages.protokoler.surat_tugas.create',$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $PersuratanClass = "App\Model\Persuratan";
      $SuratTugasClass = "App\Model\SuratTugas";
      $SuratTugas = new $SuratTugasClass;
      $Persuratan = new $PersuratanClass;

      $SuratTugasDelete = $SuratTugas->where('status',0)->delete();
      if($SuratTugasDelete) {
        $Persuratan->where(['sppd_id' => null,'rincian_id' => null])->delete();
      }

      $rules = [
          'untuk'                   => 'required',
          'nomor'                   => 'required|unique:tbl_surat_tugas',
          'berdasarkan_surat'       => 'required',
          'tanggal_surat_masuk'     => 'required',
          'perihal'                 => 'required',
          'menugaskan'              => 'required|array',
          'untuk_maksud'            => 'required',
          'tempat'                  => 'required',
          'tanggal_mulai'           => 'required',
          'tanggal_akhir'           => 'required',
          'tahun_anggaran'          => 'required',
          'tanggal_dikeluarkan'     => 'required',
          'nama_yang_bertanda_tangan'    => 'required'
      ];

      $validator = Validator::make($request->all(), $rules);

      if ($validator->fails()) {
        return response()->json([
          'state' => false,
          'errors' => $validator->errors()
        ]);
      } else {

          $str_yang_bertanda_tangan = explode("-",$request->nama_yang_bertanda_tangan);

          $SuratTugas->nomor                    = $request->nomor;
          $SuratTugas->berdasarkan_surat        = $request->berdasarkan_surat;
          $SuratTugas->tanggal_surat_masuk      = $request->tanggal_surat_masuk;
          $SuratTugas->perihal                  = $request->perihal;
          $SuratTugas->untuk_maksud             = $request->untuk_maksud;
          $SuratTugas->tempat                   = $request->tempat;
          $SuratTugas->tanggal_mulai            = $request->tanggal_mulai;
          $SuratTugas->tanggal_akhir            = $request->tanggal_akhir;
          $SuratTugas->tahun_anggaran           = $request->tahun_anggaran;
          $SuratTugas->lambat_penyetoran        = 5;
          $SuratTugas->tempat_dikeluarkan       = "makassar";
          $SuratTugas->tanggal_dikeluarkan      = $request->tanggal_dikeluarkan;
          $SuratTugas->tanggal_dikeluarkan      = $request->tanggal_dikeluarkan;
          $SuratTugas->nama_yang_bertanda_tangan      = $str_yang_bertanda_tangan[0];
          $SuratTugas->jabatan                  = $str_yang_bertanda_tangan[1];
          $SuratTugas->status                   = 0;

          if($SuratTugas->save()) {

            $SuratTugasAnggotaDewanClass = "App\Model\SuratTugasAnggotaDewan";
            $SuratTugasAnggotaDewan = new $SuratTugasAnggotaDewanClass;

        
            foreach ($request->menugaskan as $value) {
                $data[] = [
                  'surat_tugas_id'  => $SuratTugas->id,
                  'anggota_dewan_id' => $value
                ];
            }

            $SuratTugasAnggotaDewan::insert($data);

            if($SuratTugasAnggotaDewan->save()) {

              $Persuratan->surat_tugas_id = $SuratTugas->id;
              $Persuratan->untuk = $request->untuk;
              if($Persuratan->save()) {
                
                $ResultSuratTugas = $SuratTugas->where('persuratan_id',null)->update(['persuratan_id' => $Persuratan->id]);
                
                if($ResultSuratTugas) {
                  $response = ['state' => true,'title' => 'Sukses','text' => 'Data telah tersimpan','type' => 'success'];
                } else {
                  $response = ['state' => false,'title' => 'Gagal','text' => 'Data gagal tersimpan, silahkan hubungi admin','type' => 'error'];
                }

              } else {
                $response = ['state' => false,'class' => 'Persuratan','title' => 'Gagal','text' => 'Data gagal tersimpan, silahkan hubungi admin','type' => 'error'];
              }


            } else {
              $response = ['state' => false,'class' => 'SuratTugasAnggotaDewan','title' => 'Gagal','text' => 'Data gagal tersimpan, silahkan hubungi admin','type' => 'error'];
            }

          } else {

            $response = ['state' => false,'class' => 'SuratTugas','title' => 'Gagal','text' => 'Data gagal tersimpan, silahkan hubungi admin','type' => 'error'];

          }

          return response()->json($response);

      }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\modelSuratTugas  $modelSuratTugas
     * @return \Illuminate\Http\Response
     */
    public function show(modelSuratTugas $modelSuratTugas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\modelSuratTugas  $modelSuratTugas
     * @return \Illuminate\Http\Response
     */
    public function edit(modelSuratTugas $modelSuratTugas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\modelSuratTugas  $modelSuratTugas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, modelSuratTugas $modelSuratTugas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\modelSuratTugas  $modelSuratTugas
     * @return \Illuminate\Http\Response
     */
    public function destroy(modelSuratTugas $modelSuratTugas)
    {
        //
    }

    public function printthis($id) {
      $SuratTugasClass = "App\Model\SuratTugas";
      $SuratTugasAnggotaDewanClass = "App\Model\SuratTugasAnggotaDewan";
      $AnggotaDewanClass = "App\Model\AnggotaDewan";
      $SuratTugas = new $SuratTugasClass;
      $SuratTugasAnggotaDewan = new $SuratTugasAnggotaDewanClass;
      $AnggotaDewan = new $AnggotaDewanClass;

      $this->data['data'] = Settings::getOne();
      $this->data['SuratTugas'] = (object) $SuratTugas->where(['id' => $id])->first();
      $this->data['SuratTugas']->tanggal_surat_masuk = MyLibHelper::tgl_indo($this->data['SuratTugas']->tanggal_surat_masuk);
      $this->data['SuratTugas']->tanggal_mulai = MyLibHelper::tgl_indo($this->data['SuratTugas']->tanggal_mulai);
      $this->data['SuratTugas']->tanggal_akhir = MyLibHelper::tgl_indo($this->data['SuratTugas']->tanggal_akhir);
      $this->data['SuratTugas']->tanggal_dikeluarkan = MyLibHelper::tgl_indo($this->data['SuratTugas']->tanggal_dikeluarkan);
      $this->data['AnggotaDewan'] = $SuratTugasAnggotaDewan->getWhere(['surat_tugas_id' => $this->data['SuratTugas']->id])->get();
      $this->data['BertandaTangan'] = $AnggotaDewan->getWhere(['jabatan' => 'ketua'])->first();

      return view('pages.protokoler.surat_tugas.surat_tugas',$this->data);
    }

    public function print() {
      $SuratTugasClass = "App\Model\SuratTugas";
      $SuratTugasAnggotaDewanClass = "App\Model\SuratTugasAnggotaDewan";
      $AnggotaDewanClass = "App\Model\AnggotaDewan";
      $SuratTugas = new $SuratTugasClass;
      $SuratTugasAnggotaDewan = new $SuratTugasAnggotaDewanClass;
      $AnggotaDewan = new $AnggotaDewanClass;

      $this->data['data'] = Settings::getOne();
      $this->data['SuratTugas'] = (object) $SuratTugas->where(['status' => 0])->first();
      $this->data['SuratTugas']->tanggal_surat_masuk = MyLibHelper::tgl_indo($this->data['SuratTugas']->tanggal_surat_masuk);
      $this->data['SuratTugas']->tanggal_mulai = MyLibHelper::tgl_indo($this->data['SuratTugas']->tanggal_mulai);
      $this->data['SuratTugas']->tanggal_akhir = MyLibHelper::tgl_indo($this->data['SuratTugas']->tanggal_akhir);
      $this->data['SuratTugas']->tanggal_dikeluarkan = MyLibHelper::tgl_indo($this->data['SuratTugas']->tanggal_dikeluarkan);
      $this->data['AnggotaDewan'] = $SuratTugasAnggotaDewan->getWhere(['surat_tugas_id' => $this->data['SuratTugas']->id])->get();
      $this->data['BertandaTangan'] = $AnggotaDewan->getWhere(['jabatan' => 'ketua'])->first();

      return view('pages.protokoler.surat_tugas.surat_tugas',$this->data);
    }

    public function verified() {
      $SuratTugasClass = "App\Model\SuratTugas";
      $SuratTugas = new $SuratTugasClass;

      $SuratTugas->where('status',0)->update(['status' => 1]);
    }

    public function checkNomorSuratTugas(Request $request) {
      $SuratTugasClass = "App\Model\SuratTugas";
      $SuratTugas = new $SuratTugasClass;

      $check = $SuratTugas->where('nomor',$request->nomor)->first();
      if($check != null) return response()->json(true); else return response()->json(false);
    }

    public function updateStatusBatal($id) {
      $PersuratanClass = "App\Model\Persuratan";
      $Persuratan = new $PersuratanClass;
      $result = $Persuratan->where("id",$id)->update(['status' => 'batal']);
      if($result==1) {
        $response = ['state' => true,'title' => 'Sukses','text' => 'Data telah di hapus','type' => 'success'];
      } else {
        $response = ['state' => false,'title' => 'Gagal','text' => 'Data gagal di hapus, silahkan hubungi admin','type' => 'danger'];
      }

      return response()->json($response);
    }

}
