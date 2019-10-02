<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Input;
use DB;
use Session;
use App\Functions\Exports\PostExport;
use App\Functions\Imports\PostImport;
use Maatwebsite\Excel\Facades\Excel;

class MaatwebsiteController extends Controller {

    private $excel;

    public function __construct(Excel $excel) {
        $this->excel = $excel;
    }

    public function importExport() {
        return view('Test.index');
    }

    public function downloadExcel($nameFile,$type) {

        return Excel::download(new PostExport,$nameFile.'.'.$type);

        // $data = Post::get()->toArray();
        // return $this->excel->create('laravelcode', function($excel) use ($data) {
        //     $excel->sheet('mySheet', function($sheet) use ($data) {
        //         $sheet->fromArray($data);
        //     });
        // })->download($type);
    }

    public function importExcel(Request $request) {

        if($request->hasFile('import_file')) {

            Excel::import(new PostImport, $request->file('import_file'));

        }

        Session::put('success', 'Your file successfully import in database!!!');

        return back();
    }
}
