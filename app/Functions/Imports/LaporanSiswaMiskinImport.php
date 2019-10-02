<?php

namespace App\Functions\Imports;

use App\Model\LaporanSiswaMiskin;
use Maatwebsite\Excel\Concerns\ToModel;

use App\Http\Requests;
use Illuminate\Http\Request;

use Maatwebsite\Excel\Concerns\WithHeadingRow;

class LaporanSiswaMiskinImport implements ToModel, WithHeadingRow {

    private $req = [];

    public function __construct(Request $request) {
        $this->req = $request->input();
    }

    public function model(array $row) {
        //  HAPUS HERE
        $tanggal_lahir_reverse = explode("/",$row['tanggal_lahir']);
        $tanggal_lahir = $tanggal_lahir_reverse[2]."-".$tanggal_lahir_reverse[1]."-".$tanggal_lahir_reverse[0];

          return new LaporanSiswaMiskin([
          'nomor_pokok_sekolah' => $this->req['nomor_pokok_sekolah'],
          'tahun' => $this->req['pilih_tahun'],
          'bulan' => $this->req['pilih_bulan'],
          'nama' => $row['nama_siswa'],
          'nis' => $row['nis'],
          'nisn' => $row['nisn'],
          'rombel' => $row['nama_rombel'],
          'agama' => $row['agama'],
          'tingkat' => $row['tingkat'],
          'nama_ortu' => $row['nama_ortuwali'],
          'pekerjaan_ortu' => $row['pekerjaan_ortuwali'],
          'jenis_kelamin' => $row['jenis_kelamin'],
          'tempat_lahir' => $row['tempat_lahir'],
          'tanggal_lahir' => $tanggal_lahir,
          'penghasilan_perbulan' => $row['penghasilan_perbulan'],
          'alamat' => $row['alamat'],
          'kelurahan' => $row['desakelurahan'],
          'kecamatan' => $row['kecamatan'],
          'kab_kota' => $row['kabkota'],
          'letak_demokgrafi' => $row['letak_demografi_dan_geografis_pedesaanperkotaandataran_tinggipesisir'],
        ]);
    }

    public function headingRow(): int
    {
        return 1;
    }

    public function sheets(): array
    {
        return [
            new LaporanSiswaMiskin()
        ];
    }

}
