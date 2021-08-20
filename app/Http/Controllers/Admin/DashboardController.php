<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Occupants;
use App\Models\Dorms;
use App\Models\Registrant;

class DashboardController extends Controller
{
    public function __construct()
    {
        /*
         * Uncomment the line below if you want to use verified middleware
         */
        //$this->middleware('verified:admin.verification.notice');
    }


    public function index(Request $request){
        $registrants = Registrant::all()->count();
        $occupants = Occupants::all()->count();

        $occupants_cas = Occupants::where('college', '=', 'CAS')->count();
        $occupants_coe = Occupants::where('college', '=', 'COE')->count();
        $occupants_cbea = Occupants::where('college', '=', 'CBEA')->count();
        $occupants_chs = Occupants::where('college', '=', 'CHS')->count();
        $occupants_cafsd = Occupants::where('college', '=', 'CAFSD')->count();
        $occupants_casat = Occupants::where('college', '=', 'CASAT')->count();
        $occupants_cte = Occupants::where('college', '=', 'CTE')->count();
        $occupants_cit = Occupants::where('college', '=', 'CIT')->count();
        $dorms_count = Dorms::all()->count();
        $dorms = Dorms::all();
        $dorms_capacity = Dorms::all()->sum('capacity');
        $dorms_occupantsnum = Dorms::all()->sum('num_of_occupants');
        $dorms_vacancy = $dorms_capacity - $dorms_occupantsnum;

        return view('admin.dashboard', compact('registrants', 'occupants', 'occupants_cas', 'occupants_coe', 'occupants_cbea', 'occupants_chs', 'occupants_cafsd', 'occupants_casat', 'occupants_cte', 'occupants_cit', 'dorms_count', 'dorms', 'dorms_capacity', 'dorms_vacancy'));
    }
}
