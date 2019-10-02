<?php

namespace App\Functions\Imports;

use App\Model\LaporanBulananSiswa;
use Maatwebsite\Excel\Concerns\ToModel;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB as Database;

use Maatwebsite\Excel\Concerns\WithHeadingRow;

class LaporanBulananSiswaImport implements ToModel, WithHeadingRow {

    private $req = [];

    public function __construct(Request $request) {
        $this->req = $request->input();
    }

    public function model(array $row) {

        Database::table('laporan_bulanan_siswa')
                  ->where('nomor_pokok_sekolah',$this->req['nomor_pokok_sekolah'])
                  ->where('tahun',$this->req['pilih_tahun'])
                  ->where('bulan',$this->req['pilih_bulan'])
                  ->delete();

        $tanggal_lahir_reverse = explode("/",$row['tanggal_lahir']);
        $tanggal_lahir = $tanggal_lahir_reverse[2]."-".$tanggal_lahir_reverse[1]."-".$tanggal_lahir_reverse[0];

          return new LaporanBulananSiswa([
            'nomor_pokok_sekolah' => $this->req['nomor_pokok_sekolah'],
            'tahun' => $this->req['pilih_tahun'],
            'bulan' => $this->req['pilih_bulan'],
            'tingkat' => $row['tingkat'],
            'rombel' => $row['nama_rombel'],
            'nis' => $row['nis'],
            'nisn' => $row['nisn'],
            'nama' => $row['nama_siswa'],
            'jenis_kelamin' => $row['jenis_kelamin'],
            'tempat_lahir' => $row['tempat_lahir'],
            'tanggal_lahir' => $tanggal_lahir,
            'agama' => $row['agama'],
            'nama_ortu' => $row['nama_ortuwali'],
            'pekerjaan_ortu' => $row['pekerjaan_ortuwali'],
            'penghasilan_perbulan' => $row['penghasilan_perbulan'],
            'alamat' => $row['alamat'],
            'kelurahan' => $row['desakelurahan'],
            'kecamatan' => $row['kecamatan'],
            'kab_kota' => $row['kabkota'],
            'letak_demokgrafi' => $row['letak_demografi_dan_geografis_pedesaanperkotaandataran_tinggipesisir']
        ]);
    }

    public function headingRow(): int
    {
        return 1;
    }

    public function sheets(): array
    {
        return [
            new LaporanBulananGuru()
        ];
    }

}
