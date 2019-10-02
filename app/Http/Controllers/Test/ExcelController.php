<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Excel;

class ExcelController extends Controller {

    private $excel;

    public function __construct(Excel $excel) {
        $this->excel = $excel;
    }

    public function Index() {
        return view('Test.index');
    }

}
