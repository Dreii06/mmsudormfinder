<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Occupants;
use App\Models\Applicants;
use App\Models\Dorms;
use App\Models\RoomType;

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
        $details = Occupants::join('dorms', 'dorm_name', '=', 'dormitory')
            ->where('dorm_name', '=', $name)
            ->get(['dorms.dorm_name', 'occupants.id', 'occupants.first_name', 'occupants.middle_name', 'occupants.last_name', 'occupants.stud_num', 'occupants.mobile_num']);

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

    function store($id, Request $request) {
        $manager = Auth::guard('manager')->user();
        $dorm = Dorms::where('dorm_name', '=', $manager->dorm_name)->first();
        $applicant = Applicants::find($id);
        $occupant = new Occupants();

        if($request->submit == "ACCEPT") {
            $occupant->first_name = $applicant->first_name;
            $occupant->middle_name = $applicant->middle_name;
            $occupant->last_name = $applicant->last_name;
            $occupant->suffix = $applicant->suffix;
            $occupant->stud_num = $applicant->stud_num;
            $occupant->sex = $applicant->sex;
            $occupant->email = $applicant->email;
            $occupant->mobile_num = $applicant->mobile_num;
            $occupant->guardian_name = $applicant->guardian_name;
            $occupant->guardian_num = $applicant->guardian_num;
            $occupant->barangay = $applicant->barangay;
            $occupant->street = $applicant->street;
            $occupant->city = $applicant->city;
            $occupant->province = $applicant->province;
            $occupant->college = $applicant->college;
            $occupant->course = $applicant->course;
            $occupant->dormitory = $manager->dorm_name;
            $occupant->room_type = $applicant->room_type;

            $occupant->save();
            $dorm->increment('num_of_occupants');

            $room_type = RoomType::where('room_type', '=', $occupant->room_type)->first();
            $room_type->decrement('vacancy');

            $applicant->delete();
        } else if ($request->submit == "DENY") {
            $applicant->delete();
        }

        return redirect('/manager/listapplicants');
    }

    function del(Request $request) {
        $manager = Auth::guard('manager')->user();
        $occupant = Occupants::where('stud_num', '=', request('stud_id'))->first();
        $id = Auth::guard('manager')->id();
        $dorm = Dorms::find($id);

        $room_type = RoomType::where('room_type', '=', $occupant->room_type)->first();
        $room_type->increment('vacancy');

        $occupant->delete();
        $dorm->decrement('num_of_occupants');

        return redirect('/manager/listoccupants');
    }

    function admindel(Request $request) {
        $occupant = Occupants::where('stud_num', '=', request('stud_num'))->first();
        $occupant->delete();

        $room_type = RoomType::where('room_type', '=', $occupant->room_type)->first();
        $room_type->increment('vacancy');

        $dorm = Dorms::where('dorm_name', '=', $occupant->dormitory)->first();
        $dorm->decrement('num_of_occupants');
        
        $details = Occupants::join('dorms', 'dorm_name', '=', 'dormitory')
            ->where('dorm_name', '=', $occupant->dormitory)
            ->get(['dorms.dorm_name', 'occupants.id', 'occupants.first_name', 'occupants.middle_name', 'occupants.last_name', 'occupants.stud_num', 'occupants.mobile_num']);

        return view('admin.dormoccupantslist', ['details' => $details]);
    }
}