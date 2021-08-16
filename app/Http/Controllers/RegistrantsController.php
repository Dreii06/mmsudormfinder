<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registrants;
use App\Models\Registrant;
use App\Models\Manager;
use App\Models\Dorms;
use App\Models\OnCampusDorms;
use App\Models\OffCampusDorms;
use Illuminate\Support\Facades\Auth;

class RegistrantsController extends Controller
{
    //
    function show() {
        $data = Registrant::all();
        return view('admin.registrants', ['registrants' => $data]);
    }

    function get($id) {
        $details = Registrant::find($id);
        return view('admin.registrantdetails', ['details' => $details]);
    }

    function store(Request $request) {
        $registrant = Registrant::where('dorm_name', '=', request('dorm_name'))->first();
        $manager = new Manager();

        Dorms::create([
            'first_name' => $registrant->first_name,
            'middle_name' => $registrant->middle_name,
            'last_name' => $registrant->last_name,
            'dorm_name' => $registrant->dorm_name,
            'mobile_num' => $registrant->mobile_num
        ]);

        if($request->submit == ("addOnCampus")) {
            OnCampusDorms::create([
                'dormitory' => $registrant->dorm_name
            ]);
        } else if ($request->submit == ("addOffCampus")) {
            OffCampusDorms::create([
                'dormitory' => $registrant->dorm_name
            ]);
        }

        $manager->first_name = $registrant->first_name;
        $manager->middle_name = $registrant->middle_name;
        $manager->last_name =  $registrant->last_name;
        $manager->email = $registrant->email;
        $manager->password = $registrant->password;
        $manager->dorm_name = $registrant->dorm_name;
        $manager->mobile_num = $registrant->mobile_num;

        $manager->save();
        $registrant->delete();

        return redirect('/admin/registrants');
    }
}
