<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Auth;
use Validator;
use Illuminate\Support\Facades\Storage;

class LaporanPerjalananDinasController extends MyController
{

    public function __construct() {
        $this->middleware('auth');
    }


    public function lihatkomisi($komisi) {

        switch ($komisi) {
            case 'a':
                # code...
                break;
            case 'b':
                # code...
                break;
            case 'c':
                # code...
                break;
            case 'd':
                # code...
                break;
            default:
                return redirect()->route('404');
                break;
        }

        $user = Auth::user();
        $data = [
            "user" => $user,
            "kode" => $komisi,
            "komisi" => "KOMISI ".strtoupper($komisi)
        ];

        if($user->level == "keuangan") {
            $view = 'pages.laporan-perjalanan-dinas.keuangan.index';
        } else if($user->level == "bendahara") {
            $view = 'pages.laporan-perjalanan-dinas.bendahara.index';
        }

        return view($view,$data);
    }


    public function ceklaporan($id) {

        $KelengkapanClass = "App\Model\Kelengkapan";
        $Kelengkapan = new $KelengkapanClass;

        $user = Auth::user();
        $data = [
            "user" => $user,
            "kelengkapan" => $Kelengkapan->with('tiketperjalanan')->where('id',$id)->first(),
            "storage" => "storage/app/documents/"
        ];

        return view('pages.laporan-perjalanan-dinas.keuangan.cek',$data);
    }


    public function uploadKelengkapan($id) {
        $user = Auth::user();

        $KelengkapanClass = "App\Model\Kelengkapan";
        $PersuratanClass = "App\Model\Persuratan";

        $Persuratan = new $PersuratanClass;
        $Kelengkapan = new $KelengkapanClass;

        $getKelengkapan = $Kelengkapan->where('persuratan_id',$id)->first();
        if($getKelengkapan != null) {
            
            $data = [
                "user" => $user,
                "id" => $getKelengkapan->id,
                "komisi" => "KOMISI ".strtoupper($user->komisi),
                "persuratan" => $Persuratan->with('SuratTugas')->where('id',$id)->first()
            ];
            return view('pages.laporan-perjalanan-dinas.komisi.upload_kelengkapan',$data);

        } else {
            $Kelengkapan->persuratan_id = $id;
            if($Kelengkapan->save()) {

                $PersuratanQuery = $Persuratan->where('id',$id)->update(['kelengkapan_id' => $Kelengkapan->id]);
                if($PersuratanQuery==1) {

                    $data = [
                        "user" => $user,
                        "id" => $Kelengkapan->id,
                        "komisi" => "KOMISI ".strtoupper($user->komisi),
                        "persuratan" => $Persuratan->with('SuratTugas')->where('id',$id)->first()
                    ];
                    return view('pages.laporan-perjalanan-dinas.komisi.upload_kelengkapan',$data);

                } 
                    return redirect()->back()->with('response','Tidak dapat mengupdate database (level:2)');        
            }

            return redirect()->back()->with('response','Tidak dapat mengupdate database (level:1)');        
        }

    }

    public function index()
    {
        $data['user'] = Auth::user();
  
        $SuratTugasClass = "App\Model\SuratTugas";
        $PersuratanClass = "App\Model\Persuratan";
        $SuratTugas = new $SuratTugasClass;
        $Persuratan = new $PersuratanClass;

        $SuratTugasDelete = $SuratTugas->where('status',0)->delete();
        if($SuratTugasDelete) {
           $Persuratan->where(['sppd_id' => null,'rincian_id' => null])->delete();
        }

        $data['user'] = Auth::user();

        switch ($data['user']->level) {
            case 'keuangan':
                $dp = $Persuratan->with('SuratTugas')->where('kelengkapan_id','!=',null)->where('status','belum selesai')->orderBy('id','desc')->get();
            
                $view = 'pages.laporan-perjalanan-dinas.keuangan.index';
                break;

            case 'komisi':
                $dp = $Persuratan->with('SuratTugas')->where('untuk',$data['user']->komisi)->where('status','belum selesai')->orderBy('id','desc')->get();

                $view = 'pages.laporan-perjalanan-dinas.komisi.index';
                break;
            
            default:
                # code...
                break;
        }

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
                'kelengkapan_id' => $value->kelengkapan_id,
                'status' => $value->status,
              ]);
            }
          }

        $data['SuratTugas'] = $Persuratan_DataSurat;      

        return view($view,$data);

    }

    public function buatsppd($id) {

        $user = Auth::user();
        $data = [
            "user" => $user
        ];

        return view("pages.laporan-perjalanan-dinas.protokoler.formsppd",$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $rules = [
          'id'                  => 'required',
          'tiket_perjalanan.*'    => 'required|mimes:jpeg,png,pdf|max:5000',
      ];

      $rules_message = [
          'tiket_perjalanan.*.required'  => 'Anda belum mengupload Tiket Perjalanan',     
          'tiket_perjalanan.*.mimes'  => 'Format Tiket Perjalanan yang diterima hanya jpg,png, dan pdf',     
          'tiket_perjalanan.*.max'  => 'Maksimum ukuran file sebesar 5 MB',     
      ];

      $validator = Validator::make($request->all(),$rules,$rules_message);

      if ($validator->fails()) {
        return redirect()->back()->withErrors($validator);
      } 
        
        $TiketPerjalananClass = "App\Model\TiketPerjalanan";
        $KelengkapanClass = "App\Model\Kelengkapan";  
        $PersuratanClass = "App\Model\Persuratan";  
        
        $TiketPerjalanan = new $TiketPerjalananClass;
        $Kelengkapan = new $KelengkapanClass;
        $Persuratan = new $PersuratanClass;

        $Kelengkapan_id = $request->id;

        $tiket_perjalanan = $request->file('tiket_perjalanan');
        
        $tiket_data = [];
        foreach ($tiket_perjalanan as $tiket) {
            $tiket_store = $tiket->store('documents');
            $tiket_nama = explode("/", $tiket_store);
            $tiket_data[] = [
                'kelengkapan_id' => $Kelengkapan_id,
                'file' => $tiket_nama[1]
            ];
        }

        $TiketPerjalananQuery = $TiketPerjalanan->insert($tiket_data);        

        if($TiketPerjalananQuery==1) {
            return redirect()->route('laporan-perjalanan-dinas.show',['id' => $Kelengkapan_id]);
        } else {
            $response = "Tidak dapat menambah data Tiket Perjalanan";
        }

        return redirect()->back()->withErrors($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $KelengkapanClass = "App\Model\Kelengkapan";
        $Kelengkapan = new $KelengkapanClass;

        $user = Auth::user();
        $data = [
            "user" => $user,
            "kelengkapan" => $Kelengkapan->with('tiketperjalanan')->where('id',$id)->first(),
            "storage" => "storage/app/documents/"
        ];

        // dd($data['kelengkapan']->tiketperjalanan[0]->file);
        // dd(pathinfo(storage_path().'/documents/huSBWeySuAthoxEeItj9OwNX4CCFqlVyEC6CRBiW.pdf', PATHINFO_EXTENSION));
        // return Storage::download('documents/'.'huSBWeySuAthoxEeItj9OwNX4CCFqlVyEC6CRBiW.pdf');

        return view('pages.laporan-perjalanan-dinas.komisi.view',$data);
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
}
