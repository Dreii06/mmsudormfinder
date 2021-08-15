<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Applicants;
use App\Models\Occupants;
use Illuminate\Support\Facades\Auth;
use App\Models\UserProfile;
use App\Models\Dorms;
use App\Models\RoomType;

class ApplicantsController extends Controller
{
    //
    function show() {
        $manager = Auth::guard('manager')->user();
        $data = Applicants::where('dormitory', '=', $manager->dorm_name)->get();
        return view('manager.listapplicants', ['applicants' => $data]);
    }

    function get($id) {
        $details = Applicants::find($id);

        return view('manager.detailsapplicant', ['details' => $details]);
    }

    function store($id, Request $request) {
        $dorm = Dorms::find($id);
        $user_id = Auth::user()->id;
        $user = UserProfile::find($user_id);
        $applicant = new Applicants();

        $applicant->first_name = $user->first_name;
        $applicant->middle_name = $user->middle_name;
        $applicant->last_name = $user->last_name;
        $applicant->suffix = $user->suffix;
        $applicant->stud_num = $user->stud_num;
        $applicant->sex = $user->sex;
        $applicant->email = $user->email;
        $applicant->mobile_num = $user->mobile_num;
        $applicant->guardian_name = $user->guardian_name;
        $applicant->guardian_num = $user->guardian_num;
        $applicant->barangay = $user->barangay;
        $applicant->street = $user->street;
        $applicant->city = $user->city;
        $applicant->province = $user->province;
        $applicant->college = $user->college;
        $applicant->course = $user->course;
        $applicant->dormitory = $dorm->dorm_name;
        $applicant->room_type = request('type', false);

        $applicant->save();

        return redirect('/applicationlist');
    }

    function applicationlist() {
        $user = Auth::user();
        $details = Applicants::join('dorms', 'dorm_name', '=', 'dormitory')
            ->where('applicants.stud_num', '=', $user->stud_num)
            ->get(['applicants.dormitory', 'dorms.first_name', 'dorms.middle_name', 'dorms.last_name', 'applicants.room_type', 'dorms.mobile_num']);

        if($details->isEmpty()) {
            $details = Occupants::join('dorms', 'dorm_name', '=', 'dormitory')
            ->where('occupants.stud_num', '=', $user->stud_num)
            ->get(['occupants.dormitory', 'dorms.first_name', 'dorms.middle_name', 'dorms.last_name', 'occupants.room_type', 'dorms.mobile_num']);
            $process = "Approved";
        } else {
            $process = "Waiting for Approval";
        }

        return view('applicationlist', ['details' => $details], ['process' => $process]);
    }

    function delapplication(Request $request) {
        $user = Auth::user();
        $applicant = Applicants::where('stud_num', '=', $user->stud_num)->first();
        
        $applicant->delete();

        return redirect()->back();
    }
}
