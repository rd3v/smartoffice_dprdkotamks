<?php

namespace App\Http\Controllers;

use App\Model\RincianAwal;
use App\Model\PerwaliKota;
use App\Model\PerwaliHotel;
use App\Model\PerwaliBiayaHarianLuarDaerah;
use App\Model\PerwaliBiayaHarianDalamDaerah;
use App\Model\PerwaliTaksi;
use App\Model\Settings;
use Illuminate\Http\Request;

use Auth;
use Validator;

use App\Helpers\MyLibHelper;

class RincianAwalController extends MyController
{

    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($persuratan_id)
    {
        $SuratTugasClass = "App\Model\SuratTugas";
        $SuratTugas = new $SuratTugasClass;

        $this->data['user'] = Auth::user();
        $this->data['surat_tugas'] = $SuratTugas->with(['surat_tugas_anggota_dewan' => function($query) {
            $query->with('anggota_dewan')->get();
        }])->where('persuratan_id',$persuratan_id)->first();

        return view('pages.protokoler.rincian_awal.create',$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\RincianAwal  $rincianAwal
     * @return \Illuminate\Http\Response
     */
    public function show(RincianAwal $rincianAwal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\RincianAwal  $rincianAwal
     * @return \Illuminate\Http\Response
     */
    public function edit(RincianAwal $rincianAwal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\RincianAwal  $rincianAwal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RincianAwal $rincianAwal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\RincianAwal  $rincianAwal
     * @return \Illuminate\Http\Response
     */
    public function destroy(RincianAwal $rincianAwal)
    {
        //
    }

    public function print($spd_id,$anggota_id,$biaya_asal_makassar,$biaya_tujuan) {

      $SpdClass = "App\Model\Spd";

      $user = Auth::user();
      if ($user->protokoler_type == 'ad') {
          $Spd = $SpdClass::with('surat_tugas','anggota_dewan')->where('surat_tugas_id',$spd_id)->where('anggota_id',$anggota_id)->first();

          $this->data['biaya_harian'] = 0;
          $this->data['biaya_hotel'] = 0;
          $this->data['biaya_taksi_makassar'] = 0;
          $this->data['biaya_taksi_bandung'] = 0;          

      } elseif($user->protokoler_type == 'staff') {
          $Spd = $SpdClass::with('surat_tugas','staff')->where('surat_tugas_id',$spd_id)->where('anggota_id',$anggota_id)->first();

          $date1 = date_create($Spd->surat_tugas->tanggal_mulai);
          $date2 = date_create($Spd->surat_tugas->tanggal_akhir);
          $days  = date_diff($date1,$date2);
          $str_tanggal_mulai = explode('-',$Spd->surat_tugas->tanggal_mulai);
          $str_tanggal_akhir = explode('-',$Spd->surat_tugas->tanggal_akhir);
          $lama_kegiatan = $days->format('%a')+1;

          $perwali_kota = PerwaliKota::with('perwali_hotel')->where('kota',$Spd->surat_tugas->tempat)->first();

          if ($perwali_kota->kategori == 'dalam kota') {
              $this->data['biaya_harian'] = 0;
          } else if($perwali_kota->kategori == 'luar kota') {
              
              if ($Spd->staff->golongan_kode == "1" || $Spd->staff->golongan_kode == "2") {

                  // Hotel 
                  $this->data['biaya_hotel'] = ($lama_kegiatan-1);
                            
                  // Harian
                  $PerwaliBiayaHarianLuarDaerah = PerwaliBiayaHarianLuarDaerah::where('jabatan','golongan1_dan_golongan2')->first();

                  $satuan_harian = ($PerwaliBiayaHarianLuarDaerah->uang_saku + $PerwaliBiayaHarianLuarDaerah->uang_makan + $PerwaliBiayaHarianLuarDaerah->uang_transport_lokal + $PerwaliBiayaHarianLuarDaerah->jumlah_uang_harian + $PerwaliBiayaHarianLuarDaerah->jumlah_uang_harian_khusus_diklat);
                  $this->data['satuan_harian'] = $satuan_harian;
                  $this->data['biaya_harian'] = $satuan_harian * ($lama_kegiatan-1);

             } else if ($Spd->staff->golongan_kode == "3") {

                  // Tiket Perjalanan
                  $this->data['biaya_asal_makassar'] = $biaya_asal_makassar;
                  $this->data['biaya_tujuan'] = $biaya_tujuan;

                  // Hotel
                  $this->data['satuan_hotel'] = $perwali_kota->perwali_hotel->pejabateselon4_golongan3;
                  $this->data['biaya_hotel'] = $perwali_kota->perwali_hotel->pejabateselon4_golongan3 * ($lama_kegiatan-1);

                  // Harian
                  $PerwaliBiayaHarianLuarDaerah = PerwaliBiayaHarianLuarDaerah::where('jabatan','golongan3')->first();
                  $satuan_harian = ($PerwaliBiayaHarianLuarDaerah->uang_saku + $PerwaliBiayaHarianLuarDaerah->uang_makan + $PerwaliBiayaHarianLuarDaerah->uang_transport_lokal + $PerwaliBiayaHarianLuarDaerah->jumlah_uang_harian + $PerwaliBiayaHarianLuarDaerah->jumlah_uang_harian_khusus_diklat);
                  $this->data['satuan_harian'] = $satuan_harian;
                  $this->data['biaya_harian'] = $satuan_harian * ($lama_kegiatan-1);

                  // Taksi Makassar
                  $taksi_makassar = PerwaliTaksi::where('provinsi','sulawesi selatan')->first();
                  $this->data['satuan_taksi_makassar'] = $taksi_makassar->biaya;
                  $this->data['biaya_taksi_makassar'] = $taksi_makassar->biaya * ($lama_kegiatan-1);

                  // Taksi Tempat Perjalanan Dinas
                  $taksi_tujuan = PerwaliKota::with('perwali_taksi')->where('kota',$Spd->surat_tugas->tempat)->first();
                  $this->data['satuan_taksi_tujuan'] = $taksi_tujuan->perwali_taksi->biaya;
                  $this->data['biaya_taksi_tujuan'] = $taksi_tujuan->perwali_taksi->biaya * ($lama_kegiatan-1);

             }


          }


      }

      $satuan_jumlah = $this->data['biaya_asal_makassar'] + $this->data['biaya_tujuan'] + $this->data['satuan_hotel'] + $this->data['satuan_harian'] + $this->data['satuan_taksi_makassar'] + $this->data['satuan_taksi_tujuan'];

      $total_jumlah = $this->data['biaya_asal_makassar'] + $this->data['biaya_tujuan'] + $this->data['biaya_hotel'] + $this->data['biaya_harian'] + $this->data['biaya_taksi_makassar'] + $this->data['biaya_taksi_tujuan'];

      $this->data['satuan_jumlah'] = $satuan_jumlah;
      $this->data['total_jumlah'] = $total_jumlah;
      $this->data['terbilang'] = MyLibHelper::sebut($total_jumlah);
      
      $this->data['user'] = $user;
      $this->data["data"] = Settings::first();
      $this->data['spd'] = $Spd;
      $this->data['lama_kegiatan'] = $lama_kegiatan;
      $this->data['tanggal'] = MyLibHelper::tgl_indo($Spd->surat_tugas->tanggal_surat_masuk);

      return view('pages.protokoler.rincian_awal.print',$this->data);
    }
}
