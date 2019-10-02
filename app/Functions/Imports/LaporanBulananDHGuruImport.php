<?php

namespace App\Functions\Imports;

use App\Model\LaporanBulananDHGuru;
use Maatwebsite\Excel\Concerns\ToModel;

use App\Http\Requests;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB as Database;

use Maatwebsite\Excel\Concerns\WithHeadingRow;

class LaporanBulananDHGuruImport implements ToModel, WithHeadingRow {

    private $req = [];

    public function __construct(Request $request) {
        $this->req = $request->input();
    }

    public function model(array $row) {

      Database::table('laporan_dh_guru')
                ->where('nomor_pokok_sekolah',$this->req['nomor_pokok_sekolah'])
                ->where('tahun',$this->req['pilih_tahun'])
                ->where('bulan',$this->req['pilih_bulan'])
                ->delete();

          return new LaporanBulananDHGuru([
          'nomor_pokok_sekolah' => $this->req['nomor_pokok_sekolah'],
          'tahun' => $this->req['pilih_tahun'],
          'bulan' => $this->req['pilih_bulan'],
          'nama' => $row['nama_guru'],
          'tgl_01' => $row['tgl_1'],'tgl_02' => $row['tgl_2'],
          'tgl_03' => $row['tgl_3'],'tgl_04' => $row['tgl_4'],
          'tgl_05' => $row['tgl_5'],'tgl_06' => $row['tgl_6'],
          'tgl_07' => $row['tgl_7'],'tgl_08' => $row['tgl_8'],
          'tgl_09' => $row['tgl_9'],'tgl_10' => $row['tgl_10'],
          'tgl_11' => $row['tgl_11'],'tgl_12' => $row['tgl_12'],
          'tgl_13' => $row['tgl_13'],'tgl_14' => $row['tgl_14'],
          'tgl_15' => $row['tgl_15'],'tgl_16' => $row['tgl_16'],
          'tgl_17' => $row['tgl_17'],'tgl_18' => $row['tgl_18'],
          'tgl_19' => $row['tgl_19'],'tgl_20' => $row['tgl_20'],
          'tgl_21' => $row['tgl_21'],'tgl_22' => $row['tgl_22'],
          'tgl_23' => $row['tgl_23'],'tgl_24' => $row['tgl_24'],
          'tgl_25' => $row['tgl_25'],'tgl_26' => $row['tgl_26'],
          'tgl_27' => $row['tgl_27'],'tgl_28' => $row['tgl_28'],
          'tgl_29' => $row['tgl_29'],'tgl_30' => $row['tgl_30'],
          'tgl_31' => $row['tgl_31'],
          'harus_hadir' => $row['harus_hadir'],
          'sakit' => $row['sakit'],
          'ijin' => $row['ijin'],
          'alfa' => $row['alfa'],
          'cuti' => $row['cuti'],
          'jlh' => $row['jlh'],
          'tl' => $row['tl']
        ]);
    }

    public function headingRow(): int
    {
        return 1;
    }

    public function sheets(): array
    {
        return [
            new LaporanBulananDHGuru()
        ];
    }

}
