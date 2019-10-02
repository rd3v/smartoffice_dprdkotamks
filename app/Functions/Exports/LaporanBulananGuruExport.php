<?php

namespace App\Functions\Exports;

use App\Model\LaporanBulananGuru;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LaporanBulananGuruExport implements FromCollection, WithHeadings {

    public function collection() {
        return LaporanBulananGuru::all();
    }

    public function headings(): array {
        return [
            'NAMA','NUPTK','NPWP','NIP BARU','J.KEL',
            'TEMPAT LAHIR','TANGGAL LAHIR','STATUS KAWIN(K/BK/D/J)','JUMLAH TANGGUNGAN','AGAMA'
            'STATUS KEPEGAWAIAN','GOLONGAN','TMT GOL','TMT CPNS','nomor_pokok_sekolah','tahun','bulan',

            'mk_gol_akhir_thn','mk_gol_akhir_bln','mk_pada_gol_thn',
            'mk_pada_gol_bln','tingkat_ijazah','jurusan','institusi','thn_lulus',
            'tmt_guru','mk_guru_thn','mk_guru_bln','mulai_bertugas_di_sekolah','tugas_utama',
            'tugas_tambahan','mengajar_di_kelas','mata_pelajaran','jumlah_jam','nomor_peserta_sertifikat',
            'tahun_lulus_sertifikat','nomor_register_guru','keterangan'];
    }

}
