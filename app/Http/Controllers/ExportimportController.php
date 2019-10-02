<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Input;
use DB;
use Session;

use App\Functions\Imports\LaporanBulananSiswaImport;
use App\Functions\Imports\LaporanBulananGuruImport;
use App\Functions\Imports\LaporanBulananTendikImport;
use App\Functions\Imports\LaporanBulananDHGuruImport;
use App\Functions\Imports\LaporanBulananDHTendikImport;
use App\Functions\Imports\LaporanSaranaImport;
use App\Functions\Imports\LaporanPrasaranaImport;
use App\Functions\Imports\LaporanMutasiGuruTendikImport;
use App\Functions\Imports\LaporanMutasiSiswaImport;
use App\Functions\Imports\LaporanGuruTendikBerprestasiImport;
use App\Functions\Imports\LaporanSiswaBerprestasiImport;
use App\Functions\Imports\LaporanSiswaMiskinImport;

use Maatwebsite\Excel\Facades\Excel;

class ExportimportController extends Controller
{
    private $excel;

    public function __construct(Excel $excel) {
        $this->excel = $excel;
    }

    public function importExcel(Request $request) {

        if($request->hasFile('pilih_dokumen')) {

            switch ($request->laporanUntuk) {
              case 'laporansiswa':
                $ins = new LaporanBulananSiswaImport($request);
                break;
              case 'laporanguru':
                $ins = new LaporanBulananGuruImport($request);
                break;
              case 'laporantendik':
                $ins = new LaporanBulananTendikImport($request);
                break;
              case 'laporandhguru':
                $ins = new LaporanBulananDHGuruImport($request);
                break;
              case 'laporandhtendik':
                $ins = new LaporanBulananDHTendikImport($request);
                break;
              case 'laporansarana':
                $ins = new LaporanSaranaImport($request);
                break;
              case 'laporanprasarana':
                $ins = new LaporanPrasaranaImport($request);
                break;
              case 'laporanmutasigurutendik':
                $ins = new LaporanMutasiGuruTendikImport($request);
                break;
              case 'laporanmutasisiswa':
                $ins = new LaporanMutasiSiswaImport($request);
                break;
              case 'laporangurutendikberprestasi':
                $ins = new LaporanGuruTendikBerprestasiImport($request);
                break;
              case 'laporansiswaberprestasi':
                $ins = new LaporanSiswaBerprestasiImport($request);
                break;
              case 'laporansiswamiskin':
                $ins = new LaporanSiswaMiskinImport($request);
                break;
            }

          $result = Excel::import($ins, $request->file('pilih_dokumen'));
          if($result) {
              $response = ['message' => 'Data anda telah terinput', 'result' => 1];
          } else {
              $response = ['message' => 'Terjadi kesalahan', 'result' => 0];
          }
          return response()->json(['response' => $response]);
        } else {
            return response()->json(['response' => ['message' => 'No Request']]);
        }

    }

}
