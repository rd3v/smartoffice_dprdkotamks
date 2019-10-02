<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Komisi;
use App\Model\AnggotaKomisiModel as Anggota;

use Auth;


class DataKomisiController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function lihat_anggota($id) {

        $user = Auth::user();
        $anggota = Anggota::select("*")->where("komisi_id",$id)->get();

        $data = [
            "user" => $user,
            "anggota" => $anggota
        ];
        return view('pages.datakomisi.lihatanggota',$data);
    }

    public function index()
    {
        $user = Auth::user();
        $komisi = Komisi::all();

        $data = [
            "user" => $user,
            "komisi" => $komisi
        ];

        return view('pages.datakomisi.keuangan',$data); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $data = [
            "user" => $user
        ];

        return view('pages.datakomisi.keuangan-create',$data);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
