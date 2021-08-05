<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Applicants;
use App\Models\Occupants;
use Illuminate\Support\Facades\Auth;
use App\Models\UserProfile;
use App\Models\Dorms;

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

    function store(Request $request) {
        $applicant = new Applicants();

        $applicant->first_name = request('first', false);
        $applicant->middle_name = request('middle', false);
        $applicant->last_name = request('last', false);
        $applicant->suffix = request('suffix');
        $applicant->stud_num = request('stud_id', false);
        $applicant->sex = request('sex', false);
        $applicant->email = request('email', false);
        $applicant->mobile_num = request('mobile_num', false);
        $applicant->guardian_name = request('guardian_name', false);
        $applicant->guardian_num = request('guardian_num', false);
        $applicant->barangay = request('barangay', false);
        $applicant->street = request('street', false);
        $applicant->city = request('city', false);
        $applicant->province = request('province', false);
        $applicant->college = request('college', false);
        $applicant->course = request('course', false);
        $applicant->dormitory = request('dorm', false);
        $applicant->room_type = request('room_type', false);

        $applicant->save();

        return redirect('/offcampusdormslist');
    }

    function applicationlist() {
        $user = Auth::user();
        $details = Applicants::join('dorm', 'dorm_name', '=', 'dormitory')
            ->where('applicants.stud_num', '=', $user->stud_num)
            ->get(['applicants.dormitory', 'dorm.first_name', 'dorm.middle_name', 'dorm.last_name', 'applicants.room_type', 'dorm.mobile_num']);

        if($details->isEmpty()) {
            $details = Occupants::join('dorm', 'dorm_name', '=', 'dormitory')
            ->where('occupants.stud_num', '=', $user->stud_num)
            ->get(['occupants.dormitory', 'dorm.first_name', 'dorm.middle_name', 'dorm.last_name', 'occupants.room_type', 'dorm.mobile_num']);
            $process = "Approved";
        } else {
            $process = "Waiting for Approval";
        }

        return view('applicationlist', ['details' => $details], ['process' => $process]);

    }
}
