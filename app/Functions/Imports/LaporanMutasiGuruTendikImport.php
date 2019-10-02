<?php

namespace App\Functions\Imports;

use App\Model\LaporanMutasiGuruTendik;
use Maatwebsite\Excel\Concerns\ToModel;

use App\Http\Requests;
use Illuminate\Http\Request;

use Maatwebsite\Excel\Concerns\WithHeadingRow;

class LaporanMutasiGuruTendikImport implements ToModel, WithHeadingRow {

    private $req = [];

    public function __construct(Request $request) {
        $this->req = $request->input();
    }

    public function model(array $row) {
//  HAPUS HERE

        $tanggal_lahir_reverse = explode("/",$row['tgl_lahir']);
        $tanggal_lahir = $tanggal_lahir_reverse[2]."-".$tanggal_lahir_reverse[1]."-".$tanggal_lahir_reverse[0];

        $tmt_golongan_reverse = explode("/",$row['tmt_gol']);
        $tmt_golongan = $tmt_golongan_reverse[2]."-".$tmt_golongan_reverse[1]."-".$tmt_golongan_reverse[0];

        $tmt_cpns_reverse = explode("/",$row['tmt_cpns']);
        $tmt_cpns = $tmt_cpns_reverse[2]."-".$tmt_cpns_reverse[1]."-".$tmt_cpns_reverse[0];

        $tgl_mutasi_reverse = explode("/",$row['tanggal_mutasi']);
        $tgl_mutasi = $tgl_mutasi_reverse[2]."-".$tgl_mutasi_reverse[1]."-".$tgl_mutasi_reverse[0];

        $mulai_bertugas_di_sekolah_ini = explode("/",$row['mulai_bertugas_di_sekolah_ini']);
        $mulai_bertugas_di_sekolah = $mulai_bertugas_di_sekolah_ini[2]."-".$mulai_bertugas_di_sekolah_ini[1]."-".$mulai_bertugas_di_sekolah_ini[0];

        $mulai_bertugas_sbg_gr_tadm_reverse = explode("/",$row['mulai_bertugas_sbg_guru_tadm']);
        $mulai_bertugas_sbg_gr_tadm = $mulai_bertugas_sbg_gr_tadm_reverse[2]."-".$mulai_bertugas_sbg_gr_tadm_reverse[1]."-".$mulai_bertugas_sbg_gr_tadm_reverse[0];

          return new LaporanMutasiGuruTendik([
          'nomor_pokok_sekolah' => $this->req['nomor_pokok_sekolah'],
          'tahun' => $this->req['pilih_tahun'],
          'bulan' => $this->req['pilih_bulan'],
          'nama' => $row['nama_guru'],
          'nuptk' => $row['nuptk'],
          'nip_baru' => $row['nip_baru'],
          'jenis_kelamin' => $row['j_kel'],
          'tempat_lahir' => $row['tempat_lahir'],
          'tanggal_lahir' => $tanggal_lahir,
          'agama' => $row['agama'],
          'golongan' => $row['gol'],
          'status_kepegawaian' => $row['status_kepegawaian'],
          'tmt_golongan' => $tmt_golongan,
          'tmt_cpns' => $tmt_cpns,
          'mulai_bertugas_sbg_gr_tadm' => $mulai_bertugas_sbg_gr_tadm,
          'mulai_bertugas_di_sekolah' => $mulai_bertugas_di_sekolah,
          'tugas_utama' => $row['tugas_pokok'],
          'mata_pelajaran' => $row['mata_pelajaran_yang_diajarkan'],
          'jumlah_jam' => $row['jumlah_jampekerjaan'],
          'tgl_mutasi' => $tgl_mutasi,
          'sekolah_asal_tujuan' => $row['sekolah_asaltujuan'],
        ]);
    }

    public function headingRow(): int
    {
        return 1;
    }

    public function sheets(): array
    {
        return [
            new LaporanMutasiGuruTendik()
        ];
    }

}
