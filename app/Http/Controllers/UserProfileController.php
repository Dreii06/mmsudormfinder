<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserProfile;
use App\Models\User;

class UserProfileController extends Controller
{

    public function update(Request $request) {
        $id = Auth::user()->id;
        $user = UserProfile::find($id);

        $user->last_name = request('last', false);
        $user->first_name = request('first', false);
        $user->middle_name = request('middle', false);
        $user->suffix = request('suffix');
        $user->stud_num = request('stud_id', false);
        $user->sex = request('sex', false);
        $user->mobile_num = request('mobile_num', false);
        $user->guardian_name = request('guardian_name', false);
        $user->guardian_num = request('guardian_num', false);
        $user->barangay = request('barangay', false);
        $user->street = request('street', false);
        $user->city = request('city', false);
        $user->province = request('province', false);
        $user->college = request('college', false);
        $user->course = request('course', false);

        $user->save();

        return redirect()->back();
    }
}