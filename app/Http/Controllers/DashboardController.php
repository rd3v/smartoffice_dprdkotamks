<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Auth;

class DashboardController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function view() {
    	
        $user = Auth::user();

    	$data = [
    		"user"	=> $user
    	];

    	switch ($user->level) {
            case 'admin':
            return view('pages.dashboard.administrator',$data);
                break;

    		case 'protokoler':
	         	return view('pages.dashboard.protokoler',$data);
    			
    			break;
            case 'keuangan':

                return view('pages.dashboard.keuangan',$data);
                
                break;
	
    		case 'komisi':
	      	    return view('pages.dashboard.komisi',$data);
			
    			break;
	
            case 'bendahara':
                return view('pages.dashboard.bendahara',$data);
            
                break;
    
    		default:
    			# code...
    			break;
    	}

    }

}
