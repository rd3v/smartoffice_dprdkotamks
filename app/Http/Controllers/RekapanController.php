<?php

namespace App\Http\Controllers;

use App\Model\Rekapan;
use App\Model\Settings;
use Illuminate\Http\Request;

use Auth;

class RekapanController extends MyController
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
    public function create()
    {
        //
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
     * @param  \App\Model\Rekapan  $rekapan
     * @return \Illuminate\Http\Response
     */
    public function show(Rekapan $rekapan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Rekapan  $rekapan
     * @return \Illuminate\Http\Response
     */
    public function edit(Rekapan $rekapan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Rekapan  $rekapan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rekapan $rekapan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Rekapan  $rekapan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rekapan $rekapan)
    {
        //
    }

    public function print() {
        $this->data["data"] = Settings::first();
        return view('pages.rekapan.print',$this->data);
    }
}
