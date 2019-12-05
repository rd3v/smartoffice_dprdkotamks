<?php

namespace App\Http\Controllers;

use Auth;

class DashboardController extends MyController {

    public function __construct() {
        $this->middleware('auth');
    }

    public function view() {

        $user = Auth::user();

    	$data["user"] = $user;

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

            case 'staff':
                return view('pages.dashboard.staff',$data);
            
                break;
    
    		default:
    			# code...
    			break;
    	}

    }


}
