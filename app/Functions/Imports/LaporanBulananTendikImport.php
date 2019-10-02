<?php

namespace App\Functions\Imports;

use App\Model\LaporanBulananTendik;
use Maatwebsite\Excel\Concerns\ToModel;

use App\Http\Requests;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB as Database;

use Maatwebsite\Excel\Concerns\WithHeadingRow;

class LaporanBulananTendikImport implements ToModel, WithHeadingRow {

    private $req = [];

    public function __construct(Request $request) {
        $this->req = $request->input();
    }

    public function model(array $row) {

      Database::table('laporan_bulanan_tendik')
                ->where('nomor_pokok_sekolah',$this->req['nomor_pokok_sekolah'])
                ->where('tahun',$this->req['pilih_tahun'])
                ->where('bulan',$this->req['pilih_bulan'])
                ->delete();

        $tanggal_lahir_reverse = explode("/",$row['tgl_lahir']);
        $tanggal_lahir = $tanggal_lahir_reverse[2]."-".$tanggal_lahir_reverse[1]."-".$tanggal_lahir_reverse[0];

        $tmt_golongan_reverse = explode("/",$row['tmt_gol']);
        $tmt_golongan = $tmt_golongan_reverse[2]."-".$tmt_golongan_reverse[1]."-".$tmt_golongan_reverse[0];

        $tmt_cpns_reverse = explode("/",$row['tmt_cpns']);
        $tmt_cpns = $tmt_cpns_reverse[2]."-".$tmt_cpns_reverse[1]."-".$tmt_cpns_reverse[0];

        $tmt_tendik_reverse = explode("/",$row['tmt_tendik']);
        $tmt_tendik = $tmt_tendik_reverse[2]."-".$tmt_tendik_reverse[1]."-".$tmt_tendik_reverse[0];

        $mulai_bertugas_di_sekolah_ini = explode("/",$row['mulai_bertugas_di_sekolah_ini']);
        $mulai_bertugas_di_sekolah = $mulai_bertugas_di_sekolah_ini[2]."-".$mulai_bertugas_di_sekolah_ini[1]."-".$mulai_bertugas_di_sekolah_ini[0];

          return new LaporanBulananTendik([
          'nomor_pokok_sekolah' => $this->req['nomor_pokok_sekolah'],
          'tahun' => $this->req['pilih_tahun'],
          'bulan' => $this->req['pilih_bulan'],
          'nama' => $row['nama_tendik'],
          'nuptk' => $row['nuptk'],
          'npwp' => $row['npwp'],
          'nip_baru' => $row['nip_baru'],
          'jenis_kelamin' => $row['j_kel'],
          'tempat_lahir' => $row['tempat_lahir'],
          'tanggal_lahir' => $tanggal_lahir,
          'status_kawin' => $row['status_kawin_kbkdj'],
          'jumlah_tanggungan' => $row['jumlah_tanggungan'],
          'agama' => $row['agama'],
          'status_kepegawaian' => $row['status_kepegawaian'],
          'golongan' => $row['gol'],
          'tmt_golongan' => $tmt_golongan,
          'tmt_cpns' => $tmt_cpns,
          'mk_gol_akhir_thn' => $row['masa_kerja_golongan_terakhir_thn'],
          'mk_gol_akhir_bln' => $row['masa_kerja_golongan_terakhir_bln'],
          'mk_pada_gol_thn' => $row['masa_kerja_pada_golongan_thn'],
          'mk_pada_gol_bln' => $row['masa_kerja_pada_golongan_bln'],
          'tingkat_ijazah' => $row['tingkat_ijazah'],
          'jurusan' => $row['jurusan'],
          'institusi' => $row['institusi'],
          'thn_lulus' => $row['thn_lulus'],
          'tmt_tendik' => $tmt_tendik,
          'mk_tendik_thn' => $row['masa_kerja_sebagai_tendik_thn'],
          'mk_tendik_bln' => $row['masa_kerja_sebagai_tendik_bln'],
          'mulai_bertugas_di_sekolah' => $mulai_bertugas_di_sekolah,
          'tugas_utama' => $row['tugas_pokok'],
          'tugas_tambahan' => $row['tugas_tambahan'],
          'keterangan' => $row['keterangan']
        ]);
    }

    public function headingRow(): int
    {
        return 1;
    }

    public function sheets(): array
    {
        return [
            new LaporanBulananTendik()
        ];
    }

}
