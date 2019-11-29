<?php

namespace App\Http\Controllers;

use App\Model\RincianAkhir;
use App\Model\Settings;
use Illuminate\Http\Request;

use Auth;

class RincianAkhirController extends MyController
{
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
    public function create($persuratan_id="")
    {
        if($persuratan_id == null || $persuratan_id == "") return redirect()->back();
        
        $SuratTugasClass = "App\Model\SuratTugas";
        $SuratTugas = new $SuratTugasClass;

        $this->data['user'] = Auth::user();
        $this->data['surat_tugas'] = $SuratTugas->with(['spd','surat_tugas_anggota_dewan' => function($query) {
            $query->with('anggota_dewan')->get();
        }])->where('id',$persuratan_id)->first();

        return view('pages.rincian_akhir.create',$this->data);
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
     * @param  \App\ModelRincianAkhir  $modelRincianAkhir
     * @return \Illuminate\Http\Response
     */
    public function show(ModelRincianAkhir $modelRincianAkhir)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ModelRincianAkhir  $modelRincianAkhir
     * @return \Illuminate\Http\Response
     */
    public function edit(ModelRincianAkhir $modelRincianAkhir)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ModelRincianAkhir  $modelRincianAkhir
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ModelRincianAkhir $modelRincianAkhir)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ModelRincianAkhir  $modelRincianAkhir
     * @return \Illuminate\Http\Response
     */
    public function destroy(ModelRincianAkhir $modelRincianAkhir)
    {
        //
    }

    public function print() {
      $this->data["data"] = Settings::first();
      return view('pages.rincian_akhir.print',$this->data);        
    }
}
