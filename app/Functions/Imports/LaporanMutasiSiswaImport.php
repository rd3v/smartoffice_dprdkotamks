<?php

namespace App\Functions\Imports;

use App\Model\LaporanMutasiSiswa;
use Maatwebsite\Excel\Concerns\ToModel;

use App\Http\Requests;
use Illuminate\Http\Request;

use Maatwebsite\Excel\Concerns\WithHeadingRow;

class LaporanMutasiSiswaImport implements ToModel, WithHeadingRow {

    private $req = [];

    public function __construct(Request $request) {
        $this->req = $request->input();
    }

    public function model(array $row) {
//  HAPUS HERE
        $tanggal_lahir_reverse = explode("/",$row['tanggal_lahir']);
        $tanggal_lahir = $tanggal_lahir_reverse[2]."-".$tanggal_lahir_reverse[1]."-".$tanggal_lahir_reverse[0];

        $tanggal_mutasi_reverse = explode("/",$row['tanggal_mutasi']);
        $tanggal_mutasi = $tanggal_mutasi_reverse[2]."-".$tanggal_mutasi_reverse[1]."-".$tanggal_mutasi_reverse[0];

          return new LaporanMutasiSiswa([
          'nomor_pokok_sekolah' => $this->req['nomor_pokok_sekolah'],
          'tahun' => $this->req['pilih_tahun'],
          'bulan' => $this->req['pilih_bulan'],
          'nama' => $row['nama_siswa'],
          'nis' => $row['nis'],
          'nisn' => $row['nisn'],
          'jenis_kelamin' => $row['jenis_kelamin'],
          'tempat_lahir' => $row['tempat_lahir'],
          'tanggal_lahir' => $tanggal_lahir,
          'agama' => $row['agama'],
          'tingkat' => $row['tingkat'],
          'jenis_mutasi' => $row['jenis_mutasi_masukkeluar'],
          'tanggal_mutasi' => $tanggal_mutasi,
          'npsn_sekolah_asal_tujuan' => $row['npsn_sekolah_asaltujuan'],
          'nama_sekolah_asal_tujuan' => $row['nama_sekolah_asaltujuan']
        ]);
    }

    public function headingRow(): int
    {
        return 1;
    }

    public function sheets(): array
    {
        return [
            new LaporanMutasiSiswa()
        ];
    }

}
