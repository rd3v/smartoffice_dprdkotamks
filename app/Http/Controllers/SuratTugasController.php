<?php

namespace App\Http\Controllers;

use App\Model\Config;
use App\Model\Settings;
use App\Model\SuratTugas;
use App\User;
use Illuminate\Http\Request;
use App\Helpers\MyLibHelper;

use Auth;
use Validator;
use Carbon\Carbon;

class SuratTugasController extends MyController
{

    public function __construct() {}

    public function arsip() {
      $PersuratanClass = "App\Model\Persuratan";
      $SuratTugasClass = "App\Model\SuratTugas";
      $Persuratan = new $PersuratanClass;
      $SuratTugas = new $SuratTugasClass;

      $SuratTugasDelete = $SuratTugas->where('status',0)->delete();
      if($SuratTugasDelete) {
        $Persuratan->where(['surat_tugas_id' => $SuratTugas->id])->delete();
      }

      $this->data['user'] = Auth::user();
      $this->data['config'] = Config::where('module','surat-tugas')->get();
      
      if ($this->data['user']->protokoler_type == 'ad') {
        $dp = $Persuratan->with([
              'SuratTugas','spd' => function($query) {
                  $query->with('anggota_dewan')->get();
              }
            ])->where('status','!=','batal')
              ->where('untuk','!=','staff')
              ->whereYear('created_at','<',date('Y'))
              ->orderBy('id','desc')->get();

      } else if($this->data['user']->protokoler_type == 'staff') {
        
        $dp = $Persuratan->with([
            'SuratTugas',
            'spd' => function($query) {
                $query->with('staff')->get();
            }
          ])->where('status','!=','batal')
            ->where('untuk','staff')
            ->whereYear('created_at','<',date('Y'))
            ->orderBy('id','desc')->get();
      }

      $Persuratan_DataSurat = [];
      foreach ($dp as $value) {
        if($value->suratTugas != null) {
          array_push($Persuratan_DataSurat, (object) [
            'persuratan_id' => $value->suratTugas->persuratan_id,
            'id' => $value->suratTugas->id,
            'is_spd' => count($value->spd),
            'rincian_id' => $value->rincian_id,
            'rekapan_id' => $value->rekapan_id,
            'kelengkapan_id' => $value->kelengkapan_id,
            'rincianakhir_id' => $value->rincianakhir_id,
            'nomor' => $value->suratTugas->nomor,
            'berdasarkan_surat' => $value->suratTugas->berdasarkan_surat,
            'tanggal_surat_masuk' => $value->suratTugas->tanggal_surat_masuk,
            'tempat' => $value->suratTugas->tempat,
            'perihal' => $value->suratTugas->perihal,
            'tanggal_mulai' => $value->suratTugas->tanggal_mulai,
            'tanggal_akhir' => $value->suratTugas->tanggal_akhir,
            'status' => $value->status,
            'spd' => $value->spd
          ]);
        }
      }
      $this->data['SuratTugas'] = $Persuratan_DataSurat;
      return view('pages.protokoler.surat_tugas.arsip',$this->data);
    }
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
        $Persuratan->where(['surat_tugas_id' => $SuratTugas->id])->delete();
      }

      $this->data['user'] = Auth::user();
      $this->data['config'] = Config::where('module','surat-tugas')->get();
      
      if ($this->data['user']->protokoler_type == 'ad') {

        $dp = $Persuratan->with([
              'SuratTugas',
              'spd' => function($query) {
                $query->with('anggota_dewan')->get();
              }
        ])->where('status','!=','batal')
          ->where('untuk','!=','staff')
          ->whereYear('created_at',date('Y'))
          ->orderBy('id','desc')->get();

      } else if($this->data['user']->protokoler_type == 'staff') {
        
        $dp = $Persuratan->with([
                'SuratTugas',
                'spd' => function($query) {
                    $query->with('staff')->get();
                }
          ])->where('status','!=','batal')
            ->where('untuk','staff')
            ->whereYear('created_at',date('Y'))
            ->orderBy('id','desc')->get();
      
      }

      $Persuratan_DataSurat = [];
      foreach ($dp as $value) {
        if($value->suratTugas != null) {
          array_push($Persuratan_DataSurat, (object) [
            'persuratan_id' => $value->suratTugas->persuratan_id,
            'id' => $value->suratTugas->id,
            'is_spd' => count($value->spd),
            'rincian_id' => $value->rincian_id,
            'rekapan_id' => $value->rekapan_id,
            'kelengkapan_id' => $value->kelengkapan_id,
            'rincianakhir_id' => $value->rincianakhir_id,
            'nomor' => $value->suratTugas->nomor,
            'berdasarkan_surat' => $value->suratTugas->berdasarkan_surat,
            'tanggal_surat_masuk' => $value->suratTugas->tanggal_surat_masuk,
            'tempat' => $value->suratTugas->tempat,
            'perihal' => $value->suratTugas->perihal,
            'tanggal_mulai' => $value->suratTugas->tanggal_mulai,
            'tanggal_akhir' => $value->suratTugas->tanggal_akhir,
            'status' => $value->status,
            'spd' => $value->spd
          ]);
        }
      }
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

        $this->data['user'] = Auth::user();
        $AnggotaDewanClass = "App\Model\AnggotaDewan";
        $AnggotaDewan = new $AnggotaDewanClass;
        $this->data['anggota_dewan'] = $AnggotaDewan->getAll();

        if ($this->data['user']->protokoler_type == 'ad') {

          $PartaiClass = "App\Model\Partai";
          $AnggotaDewanClass = "App\Model\AnggotaDewan";
          $Partai = new $PartaiClass;
          $AnggotaDewan = new $AnggotaDewanClass;
          $this->data['anggota_dewan'] = $AnggotaDewan->getAll();
          $this->data['partai'] = $Partai::all();

        } else if($this->data['user']->protokoler_type == 'staff') {

          $StaffClass = "App\Model\Staff";
          $Staff = new $StaffClass;
          $this->data['staff'] = $Staff->all();

        }

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

      }
      $user = Auth::user();
      $rules = [
          'untuk'                   => 'required',
          'nomor'                   => 'required|unique:tbl_surat_tugas',
          'berdasarkan_surat'       => 'required',
          'jenis_kegiatan'          => 'required',
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
          if ($user->protokoler_type == 'ad') {
            $SuratTugas->nomor_surat_komisi     = $request->nomor_surat_komisi;
          }
          $SuratTugas->berdasarkan_surat        = $request->berdasarkan_surat;
          $SuratTugas->jenis_kegiatan           = $request->jenis_kegiatan;
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

            if ($user->protokoler_type == 'ad') {
              
              $SuratTugasAnggotaDewanClass = "App\Model\SuratTugasAnggotaDewan";
              $suratTugasAnggota = new $SuratTugasAnggotaDewanClass;
              
              foreach ($request->menugaskan as $value) {
                  $data[] = [
                    'surat_tugas_id'  => $SuratTugas->id,
                    'anggota_dewan_id' => $value
                  ];
              }

              $suratTugasAnggota::insert($data);

            } else if($user->protokoler_type == 'staff') {

              $SuratTugasStaffClass = "App\Model\SuratTugasStaff";
              $suratTugasAnggota = new $SuratTugasStaffClass;

              foreach ($request->menugaskan as $value) {
                  $data[] = [
                    'surat_tugas_id'  => $SuratTugas->id,
                    'staff_id' => $value
                  ];
              }

              $suratTugasAnggota::insert($data);

            }


            if($suratTugasAnggota->save()) {

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
    public function show(SuratTugas $modelSuratTugas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\modelSuratTugas  $modelSuratTugas
     * @return \Illuminate\Http\Response
     */
    public function edit(SuratTugas $SuratTugas)
    {

        // dd($SuratTugas);
        $this->data['user'] = Auth::user();
        $AnggotaDewanClass = "App\Model\AnggotaDewan";
        $AnggotaDewan = new $AnggotaDewanClass;
        $this->data['anggota_dewan'] = $AnggotaDewan->getAll();

        if ($this->data['user']->protokoler_type == 'ad') {

          $PartaiClass = "App\Model\Partai";
          $AnggotaDewanClass = "App\Model\AnggotaDewan";
          $Partai = new $PartaiClass;
          $AnggotaDewan = new $AnggotaDewanClass;
          $this->data['anggota_dewan'] = $AnggotaDewan->getAll();
          $this->data['partai'] = $Partai::all();

        } else if($this->data['user']->protokoler_type == 'staff') {

          $StaffClass = "App\Model\Staff";
          $Staff = new $StaffClass;
          $this->data['staff'] = $Staff->all();

        }

        return view('pages.protokoler.surat_tugas.edit',$this->data);        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\modelSuratTugas  $modelSuratTugas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SuratTugas $modelSuratTugas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\modelSuratTugas  $modelSuratTugas
     * @return \Illuminate\Http\Response
     */
    public function destroy(SuratTugas $modelSuratTugas)
    {
        //
    }

    public function printthis($id) {
      $SuratTugasClass = "App\Model\SuratTugas";
      $SuratTugas = new $SuratTugasClass;

      $user = Auth::user();
      $this->data['data'] = Settings::getOne();
      $this->data['SuratTugas'] = (object) $SuratTugas->where(['id' => $id])->first();      
      if ($user->protokoler_type == 'ad') {
        $SuratTugasAnggotaDewanClass = "App\Model\SuratTugasAnggotaDewan";
        $SuratTugasAnggotaDewan = new $SuratTugasAnggotaDewanClass;
        
        $AnggotaDewanClass = "App\Model\AnggotaDewan";
        $AnggotaDewan = new $AnggotaDewanClass;

        $this->data['AnggotaDewan'] = $SuratTugasAnggotaDewan->with(['anggota_dewan' => function($query) {
            $query->orderBy('jabatan_id','asc')->get();
        }])->where(['surat_tugas_id' => $this->data['SuratTugas']->id])->get();
        
        $this->data['BertandaTangan'] = $AnggotaDewan->getWhere(['jabatan' => 'ketua'])->first();

      } else if($user->protokoler_type == 'staff') {
        $StaffClass = "App\Model\Staff";
        $Staff = new $StaffClass;

        $SuratTugasStaffClass = "App\Model\SuratTugasStaff";
        $SuratTugasStaff = new $SuratTugasStaffClass;

        $this->data['Staff'] = $SuratTugasStaff->getWhere(['surat_tugas_id' => $this->data['SuratTugas']->id])->get();
        $this->data['BertandaTangan'] = $Staff->where('ttd',1)->first();

      }

      $this->data['SuratTugas']->tanggal_surat_masuk = MyLibHelper::tgl_indo($this->data['SuratTugas']->tanggal_surat_masuk);
      $this->data['SuratTugas']->tanggal_mulai = MyLibHelper::tgl_indo($this->data['SuratTugas']->tanggal_mulai);
      $this->data['SuratTugas']->tanggal_akhir = MyLibHelper::tgl_indo($this->data['SuratTugas']->tanggal_akhir);
      $this->data['SuratTugas']->tanggal_dikeluarkan = MyLibHelper::tgl_indo($this->data['SuratTugas']->tanggal_dikeluarkan);
      $this->data['user'] = $user;
      
      return view('pages.protokoler.surat_tugas.surat_tugas',$this->data);
    }

    public function print() {
      
      $SuratTugasClass = "App\Model\SuratTugas";
      $SuratTugas = new $SuratTugasClass;
      
      $this->data['SuratTugas'] = (object) $SuratTugas->where('status',0)->first();
      $user = Auth::user();
      if ($user->protokoler_type == 'ad') {
  
        $SuratTugasAnggotaDewanClass = "App\Model\SuratTugasAnggotaDewan";
        $AnggotaDewanClass = "App\Model\AnggotaDewan";
  
        $SuratTugasAnggotaDewan = new $SuratTugasAnggotaDewanClass;
        $AnggotaDewan = new $AnggotaDewanClass;

        $this->data['AnggotaDewan'] = $SuratTugasAnggotaDewan->getWhere(['surat_tugas_id' => $this->data['SuratTugas']->id])->get();
        $this->data['BertandaTangan'] = $AnggotaDewan->getWhere(['jabatan' => 'ketua'])->first();
      
      } else if($user->protokoler_type == 'staff') {
  
        $SuratTugasStaffClass = "App\Model\SuratTugasStaff";
        $StaffClass = "App\Model\Staff";

        $SuratTugasStaff = new $SuratTugasStaffClass;
        $Staff = new $StaffClass;

        $this->data['Staff'] = $SuratTugasStaff->getWhere(['surat_tugas_id' => $this->data['SuratTugas']->id])->get();
        $this->data['BertandaTangan'] = $Staff->where('ttd',1)->first();

      }

      $this->data['user'] = Auth::user();
      $this->data['data'] = Settings::getOne();
      $this->data['SuratTugas']->tanggal_surat_masuk = MyLibHelper::tgl_indo($this->data['SuratTugas']->tanggal_surat_masuk);

      $this->data['SuratTugas']->tanggal_mulai = MyLibHelper::tgl_indo($this->data['SuratTugas']->tanggal_mulai);
      $this->data['SuratTugas']->tanggal_akhir = MyLibHelper::tgl_indo($this->data['SuratTugas']->tanggal_akhir);
      $this->data['SuratTugas']->tanggal_dikeluarkan = MyLibHelper::tgl_indo($this->data['SuratTugas']->tanggal_dikeluarkan);


      return view('pages.protokoler.surat_tugas.surat_tugas',$this->data);
    }

    public function verified() {
      $SuratTugasClass = "App\Model\SuratTugas";
      $SuratTugas = new $SuratTugasClass;

      $value = $SuratTugas->where('status',0)->first();
      $SuratTugas->where('id',$value->id)->update(['status' => 1]);

      $text = [
          "action" => "store",
          "module" => "Surat Tugas",
          "type" => ucfirst(Auth::user()->protokoler_type),
          "nomor" => $value->nomor,
          "perihal" => ucfirst($value->perihal),
          "status" => $SuratTugas
      ];

      $this->TelegramNotify($text);

    }

    public function checkNomorSuratTugas(Request $request) {
      $SuratTugasClass = "App\Model\SuratTugas";
      $SuratTugas = new $SuratTugasClass;

      $check = $SuratTugas->where('nomor',$request->nomor)->first();
      if($check != null) return response()->json(true); else return response()->json(false);
    }

    public function checkNomorSuratKomisi(Request $request) {
      $SuratTugasClass = "App\Model\SuratTugas";
      $SuratTugas = new $SuratTugasClass;

      $check = $SuratTugas->where('nomor_surat_komisi',$request->nomor)->first();
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
