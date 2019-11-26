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
        $KelengkapanCommentsClass = "App\Model\KelengkapanComments";
        $Kelengkapan = new $KelengkapanClass;
        $KelengkapanComments = new $KelengkapanCommentsClass;

        $user = Auth::user();
        $data = [
            "user" => $user,
            "kelengkapan" => $Kelengkapan->with('tiket_perjalanan','invoice_hotel','foto_kegiatan')->where('id',$id)->first(),
            "comments" => $KelengkapanComments->where('kelengkapan_id',$id)->orderBy('id','desc')->get(),
            "storage_documents" => "storage/app/documents/"
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

    public function editKelengkapan($persuratan_id) {
        $user = Auth::user();

        $PersuratanClass = "App\Model\Persuratan";
        $KelengkapanClass = "App\Model\Kelengkapan";

        $Persuratan = new $PersuratanClass;
        $Kelengkapan = new $KelengkapanClass;

        $getKelengkapan = $Kelengkapan->with('tiket_perjalanan','invoice_hotel','foto_kegiatan')->where('persuratan_id',$persuratan_id)->first();

        $data = [
            "user" => $user,
            "id" => $getKelengkapan->id,
            "komisi" => "KOMISI ".strtoupper($user->komisi),
            "persuratan" => $Persuratan->with(['SuratTugas','kelengkapan' => function($query) {
                $query->with('tiket_perjalanan','invoice_hotel','foto_kegiatan')->first();
            }])->where('id',$persuratan_id)->first(),
            "kelengkapan" => $Kelengkapan->with('tiket_perjalanan','invoice_hotel','foto_kegiatan')->where('id',$getKelengkapan->id)->first(),
            "storage_tiketperjalanan" => "storage/app/documents/tiket_perjalanan/",
            "storage_invoicehotel" => "storage/app/documents/invoice_hotel/",
            "storage_fotokegiatan" => "storage/app/documents/foto_kegiatan/"            
        ];

        return view('pages.laporan-perjalanan-dinas.komisi.edit_kelengkapan',$data);
    }

    public function index()
    {
        $data['user'] = Auth::user();
  
        $SuratTugasClass = "App\Model\SuratTugas";
        $PersuratanClass = "App\Model\Persuratan";
        $KelengkapanClass = "App\Model\Kelengkapan";
        $SuratTugas = new $SuratTugasClass;
        $Persuratan = new $PersuratanClass;
        $Kelengkapan = new $KelengkapanClass;

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
                'rincianakhir_id' => $value->rincianakhir_id,
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
          'tiket_perjalanan.*'  => 'mimes:jpeg,png,pdf|max:5000',
          'invoice_hotel.*'     => 'mimes:jpeg,png,pdf|max:5000',
          'foto_kegiatan.*'     => 'mimes:jpeg,png,pdf|max:5000',
      ];

      $rules_message = [
          'tiket_perjalanan.*.mimes'  => 'Format Tiket Perjalanan yang diterima hanya jpg,png, dan pdf',     
          'tiket_perjalanan.*.max'  => 'Maksimum ukuran file Tiket Perjalanan sebesar 5 MB',
          'invoice_hotel.*.mimes'  => 'Format Invoice Hotel yang diterima hanya jpg,png, dan pdf',     
          'invoice_hotel.*.max'  => 'Maksimum ukuran file Invoice Hotel sebesar 5 MB',     
          'foto_kegiatan.*.mimes'  => 'Format Foto Kegiatan yang diterima hanya jpg,png, dan pdf',     
          'foto_kegiatan.*.max'  => 'Maksimum ukuran file Foto Kegiatan sebesar 5 MB',     
      ];

      $validator = Validator::make($request->all(),$rules,$rules_message);

      if ($validator->fails()) {
        return redirect()->back()->withErrors($validator);
      } 
        
        $TiketPerjalananClass = "App\Model\TiketPerjalanan";
        $InvoiceHotelClass = "App\Model\InvoiceHotel";
        $FotoKegiatanClass = "App\Model\FotoKegiatan";
        $KelengkapanClass = "App\Model\Kelengkapan";  
        $PersuratanClass = "App\Model\Persuratan";  
        
        $TiketPerjalanan = new $TiketPerjalananClass;
        $InvoiceHotel = new $InvoiceHotelClass;
        $FotoKegiatan = new $FotoKegiatanClass;
        $Kelengkapan = new $KelengkapanClass;
        $Persuratan = new $PersuratanClass;

        $Kelengkapan_id = $request->id;

        $tiket_perjalanan = $request->file('tiket_perjalanan');
        $invoice_hotel = $request->file('invoice_hotel');
        $foto_kegiatan = $request->file('foto_kegiatan');
        
        if($tiket_perjalanan != null) {

            $tiket_data = [];
            foreach ($tiket_perjalanan as $tiket) {
                $tiket_store = $tiket->store('documents/tiket_perjalanan');
                $tiket_nama = explode("/", $tiket_store);
                $tiket_data[] = [
                    'kelengkapan_id' => $Kelengkapan_id,
                    'file' => $tiket_nama[2]
                ];
            }

            $TiketPerjalananQuery = $TiketPerjalanan->insert($tiket_data);        

            if($TiketPerjalananQuery!=1) {
                return redirect()->back()->withErrors("Tidak dapat menambah data Tiket Perjalanan");
            }

        }

        if($invoice_hotel != null) {

            $invoice_data = [];
            foreach ($invoice_hotel as $hotel) {
                $invoice_store = $hotel->store('documents/invoice_hotel');
                $invoice_nama = explode("/", $invoice_store);
                $invoice_data[] = [
                    'kelengkapan_id' => $Kelengkapan_id,
                    'file' => $invoice_nama[2]
                ];
            }

            $InvoiceHotelQuery = $InvoiceHotel->insert($invoice_data);        

            if($InvoiceHotelQuery!=1) {
                return redirect()->back()->withErrors("Tidak dapat menambah data Invoice Hotel");
            }

        }

        if($foto_kegiatan != null) {

            $fk_data = [];
            foreach ($foto_kegiatan as $fk) {
                $fk_store = $fk->store('documents/foto_kegiatan');
                $fk_nama = explode("/", $fk_store);
                $fk_data[] = [
                    'kelengkapan_id' => $Kelengkapan_id,
                    'file' => $fk_nama[2]
                ];
            }

            $FotoKegiatanQuery = $FotoKegiatan->insert($fk_data);        

            if($FotoKegiatanQuery!=1) {
                return redirect()->back()->withErrors("Tidak dapat menambah data Foto Kegiatan");
            }

        }

        return redirect()->route('laporan-perjalanan-dinas.show',['id' => $Kelengkapan_id]);
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
            "kelengkapan" => $Kelengkapan->with('tiket_perjalanan','invoice_hotel','foto_kegiatan')->where('id',$id)->first(),
            "storage_tiketperjalanan" => "storage/app/documents/tiket_perjalanan/",
            "storage_invoicehotel" => "storage/app/documents/invoice_hotel/",
            "storage_fotokegiatan" => "storage/app/documents/foto_kegiatan/"
        ];

        // dd($data['kelengkapan']->tiket_perjalanan[0]->file);
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
    public function destroy(Request $request,$id)
    {

        $TiketPerjalananClass = "App\Model\TiketPerjalanan";
        $InvoiceHotelClass = "App\Model\InvoiceHotel";
        $FotoKegiatanClass = "App\Model\FotoKegiatan";

        $TiketPerjalanan = new $TiketPerjalananClass;
        $InvoiceHotel = new $InvoiceHotelClass;
        $FotoKegiatan = new $FotoKegiatanClass;

        $response = null;

        switch ($request->kategori) {
            case 'tiket_perjalanan':
                
                $myFile = $this->getDocumentPath('tiket_perjalanan').$request->nama;
                $delete = unlink($myFile);

                if($delete) {
                    $delete = $TiketPerjalanan->where('id',$request->id)->delete();
                    if($delete) {
                        $response = $this->sweetResponse(true,"data");
                    } else {
                        $response = $this->sweetResponse(false,"data");
                    }

                } else {
                    $response = $this->sweetResponse(false,"file");
                }

                break;
            case 'invoice_hotel':
                $myFile = $this->getDocumentPath('invoice_hotel').$request->nama;
                $delete = unlink($myFile);

                if($delete) {
                    $delete = $InvoiceHotel->where('id',$request->id)->delete();
                    if($delete != false) $response = $this->sweetResponse(true,"data"); else $response = $this->sweetResponse(false,"data"); 
                } else {
                    $response = $this->sweetResponse(false,"file");
                }

                break;
            case 'foto_kegiatan':
                $myFile = $this->getDocumentPath('foto_kegiatan').$request->nama;
                $delete = unlink($myFile);
                
                if($delete) {
                    $delete = $FotoKegiatan->where('id',$request->id)->delete();
                    if($delete != false) $response = $this->sweetResponse(true,"data"); else $response = $this->sweetResponse(false,"data"); 
                } else {
                    $response = $this->sweetResponse(false,"file");
                }
                break;
        }

        return response()->json($response);
    }

    public function getComments(Request $request) {
        $CommentsClass = "App\Model\KelengkapanComments";
        $Comments = new $CommentsClass;
        $response = $Comments->where('kelengkapan_id',$request->kelengkapan_id)->get();
        return response()->json($response);
    }

}
