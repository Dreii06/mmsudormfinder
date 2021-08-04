<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Occupants;
use App\Models\Applicants;

class OccupantsController extends Controller
{
    //
    function show() {
        $manager = Auth::guard('manager')->user();
        $data = Occupants::where('dormitory', '=', $manager->dorm_name)->get();;
        return view('manager.listoccupants', ['occupants' => $data]);
    }

    function adminshow($name) {
        /*$data = Occupants::where('dormitory', '=', $name)->get();
        return view('admin.occupantslist', ['occupants' => $data], ['dorm_name' => $name]);*/

        $details = Occupants::join('dorm', 'dorm_name', '=', 'dormitory')
            ->where('dorm_name', '=', $name)
            ->get(['dorm.dorm_name', 'occupants.id', 'occupants.name', 'occupants.stud_num', 'occupants.mobile_num']);

        return view('admin.occupantslist', ['details' => $details], ['dorm_name' => $name]);
    }

    function get($id) {
        $details = Occupants::find($id);
        return view('manager.detailsoccupant', ['details' => $details]);
    }

    function adminget($name, $id) {
        $details = Occupants::find($id);
        return view('admin.occupantdetails', ['details' => $details], ['dorm_name' => $name]);
    }

    function store(Request $request) {
        $manager = Auth::guard('manager')->user();
        $occupant = new Occupants();

        $occupant->name = request('name', false);
        $occupant->stud_num = request('stud_id', false);
        $occupant->sex = request('sex', false);
        $occupant->email = request('email', false);
        $occupant->mobile_num = request('mobile', false);
        $occupant->guardian_num = request('guardian', false);
        $occupant->dob = request('dob', false);
        $occupant->address = request('address', false);
        $occupant->college = request('college', false);
        $occupant->course = request('course', false);
        $occupant->dormitory = $manager->dorm_name;

        $occupant->save();

        $applicant = Applicants::where('name', '=', $occupant->name)->where('dormitory', '=', $manager->dorm_name)->first();
        $applicant->delete();

        return redirect('/manager/listapplicants');
    }

    function del(Request $request) {
        $manager = Auth::guard('manager')->user();
        $occupant = Occupants::where('name', '=', request('name'))->first();
        $occupant->delete();

        return redirect('/manager/listoccupants');
    }

    function admindel($name, Request $request) {
        $occupant = Occupants::where('name', '=', request('name'))->first();
        $occupant->delete();
        
        $details = Occupants::join('dorm', 'dorm_name', '=', 'dormitory')
            ->where('dorm_name', '=', $name)
            ->get(['dorm.dorm_name', 'occupants.id', 'occupants.name', 'occupants.stud_num', 'occupants.mobile_num']);

        return view('admin.occupantslist', ['details' => $details], ['dorm_name' => $name]);
    }
}