<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\LaporanPerjalananDinas;

use Auth;

class LaporanPerjalananDinasController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }


    public function lihatkomisi($komisi) {

        switch ($komisi) {
            case 'a':
                # code...
                break;
            case 'b':
                # code...
                break;
            case 'c':
                # code...
                break;
            case 'd':
                # code...
                break;
            
            default:
                return redirect()->route('404');
                break;
        }

        $user = Auth::user();
        $data = [
            "user" => $user,
            "kode" => $komisi,
            "komisi" => "KOMISI ".strtoupper($komisi)
        ];

        if($user->level == "keuangan") {
            $view = 'pages.laporan-perjalanan-dinas.keuangan.index';
        } else if($user->level == "bendahara") {
            $view = 'pages.laporan-perjalanan-dinas.bendahara.index';
        }

        return view($view,$data);
    }


    public function validasilaporan($komisi,$id) {
        $user = Auth::user();
        $data = [
            "user" => $user,
            "kode" => $komisi,
            "komisi" => "KOMISI ".strtoupper($komisi),
        ];

        if($user->level == "keuangan") {
            $view = 'pages.laporan-perjalanan-dinas.keuangan.validasi';
        } else if($user->level == "bendahara") {
            $view = 'pages.laporan-perjalanan-dinas.bendahara.validasi';
        }

        return view($view,$data);
    }


    public function index()
    {
        $user = Auth::user();

        switch ($user->level) {
            case 'keuangan':
                $data = [
                    "user" => $user,
                    "laporanperjalanandinas" => LaporanPerjalananDinas::orderBy('id','desc')->get()
                ];

                return view('pages.laporan-perjalanan-dinas.keuangan',$data);
                break;

            case 'komisi':
                $data = [
                    "user" => $user
                ];
                return view('pages.laporan-perjalanan-dinas.komisi.index',$data);
                break;
            
            default:
                # code...
                break;
        }

    }

    public function buatsppd($id) {

        $user = Auth::user();
        $data = [
            "user" => $user
        ];

        return view("pages.laporan-perjalanan-dinas.protokoler.formsppd",$data);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user();
        $data = [
            "user" => $user
        ];

        return view('pages.laporan-perjalanan-dinas.komisi.edit',$data);
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
