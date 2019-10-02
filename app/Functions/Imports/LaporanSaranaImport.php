<?php

namespace App\Functions\Imports;

use App\Model\LaporanSarana;
use Maatwebsite\Excel\Concerns\ToModel;

use App\Http\Requests;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB as Database;

use Maatwebsite\Excel\Concerns\WithHeadingRow;

class LaporanSaranaImport implements ToModel, WithHeadingRow {

    private $req = [];

    public function __construct(Request $request) {
        $this->req = $request->input();
    }

    public function model(array $row) {

      Database::table('laporan_sarana')
                ->where('nomor_pokok_sekolah',$this->req['nomor_pokok_sekolah'])
                ->where('tahun',$this->req['pilih_tahun'])
                ->where('bulan',$this->req['pilih_bulan'])
                ->delete();

          return new LaporanSarana([
          'nomor_pokok_sekolah' => $this->req['nomor_pokok_sekolah'],
          'tahun' => $this->req['pilih_tahun'],
          'bulan' => $this->req['pilih_bulan'],
          'nama_ruangan' => $row['nama_ruangan'],
          'nama_sarana' => $row['nama_sarana'],
          'jumlah_baik' => $row['jumlah_baik'],
          'jumlah_rusak' => $row['jumlah_rusak'],
        ]);
    }

    public function headingRow(): int
    {
        return 1;
    }

    public function sheets(): array
    {
        return [
            new LaporanSarana()
        ];
    }

}
