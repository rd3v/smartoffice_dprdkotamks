<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function laporan_perjalanan_dinas() {
        $data = [
            "user"  => Auth::user()
        ];
        return view('pages.laporan-perjalanan-dinas.indes',$data);
    }

    public function show() {
        $data = [
            "user"  => Auth::user()
        ];
        return view('pages.laporan-perjalanan-dinas.views',$data);
    }

    public function edit() {
        return view('pages.laporan-perjalanan-dinas.edits');
    }

    public function jadwal_sidang() {
        return view('pages.jadwal_sidang.index');
    }

    public function sppd() {
        return view('pages.laporan-perjalanan-dinas.sppd.index');
    }

    public function invoice_hotel() {
        return view('pages.laporan-perjalanan-dinas.invoice-hotel.index');
    }
}
