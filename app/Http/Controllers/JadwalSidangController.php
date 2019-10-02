<?php

namespace App\Http\Controllers;

use App\Model\JadwalSidang;
use Illuminate\Http\Request;

use Auth;

class JadwalSidangController extends Controller
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

        switch ($user->level) {
            case 'keuangan':
                return view('pages.jadwal_sidang.keuangan',$data);
                break;
            
            case 'komisi':
                return view('pages.jadwal_sidang.komisi',$data);
                break;
            
            default:
                # code...
                break;
        }

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
     * @param  \App\Model\JadwalSidang  $jadwalSidang
     * @return \Illuminate\Http\Response
     */
    public function show(JadwalSidang $jadwalSidang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\JadwalSidang  $jadwalSidang
     * @return \Illuminate\Http\Response
     */
    public function edit(JadwalSidang $jadwalSidang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\JadwalSidang  $jadwalSidang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JadwalSidang $jadwalSidang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\JadwalSidang  $jadwalSidang
     * @return \Illuminate\Http\Response
     */
    public function destroy(JadwalSidang $jadwalSidang)
    {
        //
    }
}
