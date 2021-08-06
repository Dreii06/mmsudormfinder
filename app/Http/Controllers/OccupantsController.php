<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Occupants;
use App\Models\Applicants;
use App\Models\Dorms;

class OccupantsController extends Controller
{
    //
    function show() {
        $manager = Auth::guard('manager')->user();
        $data = Occupants::where('dormitory', '=', $manager->dorm_name)->get();
        return view('manager.listoccupants', ['occupants' => $data]);
    }

    function adminshow() {
        $details = Occupants::all();

        return view('admin.occupantslist', ['details' => $details]);
    }

    function adminshowdorm($name) {
        $details = Occupants::join('dorm', 'dorm_name', '=', 'dormitory')
            ->where('dorm_name', '=', $name)
            ->get(['dorm.dorm_name', 'occupants.id', 'occupants.first_name', 'occupants.middle_name', 'occupants.last_name',  'occupants.stud_num', 'occupants.mobile_num']);

        return view('admin.dormoccupantslist', ['details' => $details], ['dorm_name' => $name]);
    }

    function get($id) {
        $details = Occupants::find($id);
        return view('manager.detailsoccupant', ['details' => $details]);
    }

    function adminget($id) {
        $details = Occupants::find($id);
        return view('admin.occupantdetails', ['details' => $details]);
    }

    function admingetdorm($name, $id) {
        $details = Occupants::find($id);
        return view('admin.dormoccupantdetails', ['details' => $details], ['dorm_name' => $name]);
    }

    function store(Request $request) {
        $manager = Auth::guard('manager')->user();
        $occupant = new Occupants();
        $id = Auth::guard('manager')->id();
        $dorm = Dorms::find($id);

        if($request->submit == "ACCEPT") {
            $occupant->first_name = request('first', false);
            $occupant->middle_name = request('middle', false);
            $occupant->last_name = request('last', false);
            $occupant->suffix = request('suffix');
            $occupant->stud_num = request('stud_id', false);
            $occupant->sex = request('sex', false);
            $occupant->email = request('email', false);
            $occupant->mobile_num = request('mobile_num', false);
            $occupant->guardian_name = request('guardian_name', false);
            $occupant->guardian_num = request('guardian_num', false);
            $occupant->barangay = request('barangay', false);
            $occupant->street = request('street', false);
            $occupant->city = request('city', false);
            $occupant->province = request('province', false);
            $occupant->college = request('college', false);
            $occupant->course = request('course', false);
            $occupant->dormitory = $manager->dorm_name;
            $occupant->room_type = request('room_type', false);

            $occupant->save();
            $dorm->decrement('available_space');

            $applicant = Applicants::where('stud_num', '=', $occupant->stud_num)->where('dormitory', '=', $manager->dorm_name)->first();
            $applicant->delete();
        } else if ($request->submit == "DENY") {
            $applicant = Applicants::where('stud_num', '=',request('stud_id', false))->where('dormitory', '=', $manager->dorm_name)->first();
            $applicant->delete();
        }

        return redirect('/manager/listapplicants');
    }

    function del(Request $request) {
        $manager = Auth::guard('manager')->user();
        $occupant = Occupants::where('stud_num', '=', request('stud_id'))->first();
        $id = Auth::guard('manager')->id();
        $dorm = Dorms::find($id);

        $occupant->delete();
        $dorm->increment('available_space');

        return redirect('/manager/listoccupants');
    }

    function admindel($name, Request $request) {
        $occupant = Occupants::where('stud_num', '=', request('stud_num'))->first();
        $occupant->delete();
        
        $details = Occupants::join('dorm', 'dorm_name', '=', 'dormitory')
            ->where('dorm_name', '=', $name)
            ->get(['dorm.dorm_name', 'occupants.id', 'occupants.first_name', 'occupants.middle_name', 'occupants.last_name', 'occupants.stud_num', 'occupants.mobile_num']);

        return view('admin.dormoccupantslist', ['details' => $details], ['dorm_name' => $name]);
    }
}