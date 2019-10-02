<?php

namespace App\Functions\Imports;

use App\Model\LaporanSiswaBerprestasi;
use Maatwebsite\Excel\Concerns\ToModel;

use App\Http\Requests;
use Illuminate\Http\Request;

use Maatwebsite\Excel\Concerns\WithHeadingRow;

class LaporanSiswaBerprestasiImport implements ToModel, WithHeadingRow {

    private $req = [];

    public function __construct(Request $request) {
        $this->req = $request->input();
    }

    public function model(array $row) {
        //  HAPUS HERE
        $tanggal_lahir_reverse = explode("/",$row['tanggal_lahir']);
        $tanggal_lahir = $tanggal_lahir_reverse[2]."-".$tanggal_lahir_reverse[1]."-".$tanggal_lahir_reverse[0];

          return new LaporanSiswaBerprestasi([
          'nomor_pokok_sekolah' => $this->req['nomor_pokok_sekolah'],
          'tahun' => $this->req['pilih_tahun'],
          'bulan' => $this->req['pilih_bulan'],
          'nama' => $row['nama_siswa'],
          'nis' => $row['nis'],
          'nisn' => $row['nisn'],
          'kelas' => $row['kelas'],
          'jenis_kelamin' => $row['jenis_kelamin_lp'],
          'tempat_lahir' => $row['tempat_lahir'],
          'tanggal_lahir' => $tanggal_lahir,
          'jenis_prestasi' => $row['jenis_prestasipenghargaan'],
          'tingkat' => $row['tingkat'],
          'penyelenggara' => $row['penyelenggarapemberi_penghargaan']
        ]);
    }

    public function headingRow(): int
    {
        return 1;
    }

    public function sheets(): array
    {
        return [
            new LaporanSiswaBerprestasi()
        ];
    }

}
