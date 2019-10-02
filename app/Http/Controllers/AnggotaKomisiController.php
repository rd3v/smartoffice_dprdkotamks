<?php

namespace App\Http\Controllers;

use App\Model\AnggotaKomisiModel;
use Illuminate\Http\Request;

use Auth;

class AnggotaKomisiController extends Controller
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
        $user = Auth::user();
        $data = [
            "user" => $user
        ];

        return view('pages.datakomisi.lihatanggota',$data);
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
     * @param  \App\Model\AnggotaKomisiModel  $anggotaKomisiModel
     * @return \Illuminate\Http\Response
     */
    public function show(AnggotaKomisiModel $anggotaKomisiModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\AnggotaKomisiModel  $anggotaKomisiModel
     * @return \Illuminate\Http\Response
     */
    public function edit(AnggotaKomisiModel $anggotaKomisiModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\AnggotaKomisiModel  $anggotaKomisiModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AnggotaKomisiModel $anggotaKomisiModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\AnggotaKomisiModel  $anggotaKomisiModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(AnggotaKomisiModel $anggotaKomisiModel)
    {
        //
    }
}
