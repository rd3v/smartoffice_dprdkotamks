<?php

namespace App\Functions\Imports;

use App\Model\LaporanPrasarana;
use Maatwebsite\Excel\Concerns\ToModel;

use App\Http\Requests;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB as Database;

use Maatwebsite\Excel\Concerns\WithHeadingRow;

class LaporanPrasaranaImport implements ToModel, WithHeadingRow {

    private $req = [];

    public function __construct(Request $request) {
        $this->req = $request->input();
    }

    public function model(array $row) {

      dd($row);
      Database::table('laporan_prasarana')
                ->where('nomor_pokok_sekolah',$this->req['nomor_pokok_sekolah'])
                ->where('tahun',$this->req['pilih_tahun'])
                ->where('bulan',$this->req['pilih_bulan'])
                ->delete();

          return new LaporanPrasarana([
          'nomor_pokok_sekolah' => $this->req['nomor_pokok_sekolah'],
          'tahun' => $this->req['pilih_tahun'],
          'bulan' => $this->req['pilih_bulan'],
          'nama_prasarana',
          'milik_permanen',
          'milik_semipermanen',
          'milik_darurat',
          'menumpang_permanen',
          'menumpang_semipermanen',
          'menumpang_darurat',
          'sewa_permanen',
          'sewa_semipermanen',
          'sewa_darurat',
          'atap_baik',
          'atap_rusak',
          'plafon_baik',
          'plafon_rusak',
          'dinding_baik',
          'dinding_rusak',
          'lantai_baik',
          'lantai_rusak',
          'jendela_baik',
          'jendela_rusak'
        ]);
    }

    public function headingRow(): int
    {
        return 1;
    }

    public function sheets(): array
    {
        return [
            new LaporanPrasarana()
        ];
    }

}
