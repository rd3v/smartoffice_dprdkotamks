<?php

namespace App\Http\Controllers;

use App\Model\RincianAwal;
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
        // dd($this->data['surat_tugas']);
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

    public function print() {
      $this->data["data"] = Settings::first();
      return view('pages.protokoler.rincian_awal.print',$this->data);
    }
}
