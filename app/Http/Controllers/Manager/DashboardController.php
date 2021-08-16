<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Applicants;
use App\Models\Occupants;
use App\Models\Dorms;
use App\Models\RoomType;

class DashboardController extends Controller
{
    public function __construct()
    {
        /*
         * Uncomment the line below if you want to use verified middleware
         */
        //$this->middleware('verified:manager.verification.notice');
    }


    public function index(){
        $manager = Auth::guard('manager')->user();
        $dorm = Dorms::where('dorm_name', '=', $manager->dorm_name)->first();
        $applicants = Applicants::where('dormitory', '=', $dorm->dorm_name)->count();
        $occupants = Occupants::where('dormitory', '=', $dorm->dorm_name)->count();
        $available_space = RoomType::where('dormitory', '=', $dorm->dorm_name)->sum('vacancy');

        $applicants_cas = Applicants::where('dormitory', '=', $dorm->dorm_name)->where('college', '=', 'CAS')->count();
        $applicants_coe = Applicants::where('dormitory', '=', $dorm->dorm_name)->where('college', '=', 'COE')->count();
        $applicants_cbea = Applicants::where('dormitory', '=', $dorm->dorm_name)-> where('college', '=', 'CBEA')->count();
        $applicants_chs = Applicants::where('dormitory', '=', $dorm->dorm_name)->where('college', '=', 'CHS')->count();
        $applicants_cafsd = Applicants::where('dormitory', '=', $dorm->dorm_name)->where('college', '=', 'CAFSD')->count();
        $applicants_casat = Applicants::where('dormitory', '=', $dorm->dorm_name)->where('college', '=', 'CASAT')->count();
        $applicants_cte = Applicants::where('dormitory', '=', $dorm->dorm_name)->where('college', '=', 'CTE')->count();
        $applicants_cit = Applicants::where('dormitory', '=', $dorm->dorm_name)->where('college', '=', 'CIT')->count();

        $occupants_cas = Occupants::where('dormitory', '=', $dorm->dorm_name)->where('college', '=', 'CAS')->count();
        $occupants_coe = Occupants::where('dormitory', '=', $dorm->dorm_name)->where('college', '=', 'COE')->count();
        $occupants_cbea = Occupants::where('dormitory', '=', $dorm->dorm_name)-> where('college', '=', 'CBEA')->count();
        $occupants_chs = Occupants::where('dormitory', '=', $dorm->dorm_name)->where('college', '=', 'CHS')->count();
        $occupants_cafsd = Occupants::where('dormitory', '=', $dorm->dorm_name)->where('college', '=', 'CAFSD')->count();
        $occupants_casat = Occupants::where('dormitory', '=', $dorm->dorm_name)->where('college', '=', 'CASAT')->count();
        $occupants_cte = Occupants::where('dormitory', '=', $dorm->dorm_name)->where('college', '=', 'CTE')->count();
        $occupants_cit = Occupants::where('dormitory', '=', $dorm->dorm_name)->where('college', '=', 'CIT')->count();

        $room_types = Dorms::join('room_types', 'dormitory', '=', 'dorm_name')
        ->where('dorms.dorm_name', '=', $dorm->dorm_name)
        ->get();

        return view('manager.dashboard', compact('applicants', 'occupants', 'applicants_cas', 'applicants_coe', 'applicants_cbea', 'applicants_chs', 'applicants_cafsd', 'applicants_casat', 'applicants_cte', 'applicants_cit','available_space', 'occupants_cas', 'occupants_coe', 'occupants_cbea', 'occupants_chs', 'occupants_cafsd', 'occupants_casat', 'occupants_cte', 'occupants_cit', 'room_types'));
    }

}
