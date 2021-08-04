<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Applicants;
use Illuminate\Support\Facades\Auth;
use App\Models\UserProfile;

class ApplicantsController extends Controller
{
    //
    function show() {
        $manager = Auth::guard('manager')->user();
        $data = Applicants::where('dormitory', '=', $manager->dorm_name)->get();
        return view('manager.listapplicants', ['applicants' => $data]);
    }

    function get($id) {
        //$details = Occupants::whereName($id)->first();
        $details = Applicants::find($id);
        return view('manager.detailsapplicant', ['details' => $details]);
    }

    function store(Request $request) {
        $applicant = new Applicants();

        $applicant->name = request('name', false);
        $applicant->stud_num = request('stud_id', false);
        $applicant->sex = request('sex', false);
        $applicant->email = request('email', false);
        $applicant->mobile_num = request('mobile', false);
        $applicant->guardian_num = request('guardian', false);
        $applicant->dob = request('dob', false);
        $applicant->address = request('address', false);
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
            ->where('applicants.name', '=', $user->name)
            ->get(['applicants.dormitory', 'dorm.owner_name', 'applicants.room_type', 'dorm.mobile_num']);

        return view('applicationlist', ['details' => $details]);

    }
}
