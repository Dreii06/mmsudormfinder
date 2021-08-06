<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registrants;
use App\Models\Registrant;
use App\Models\Manager;
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
            'first_name' => $request->first,
            'middle_name' => $request->middle,
            'last_name' => $request->last,
            'dorm_name' => $request->dorm_name,
            'mobile_num' => $request->mobile_num
        ]);

        $manager->first_name = request('first', false);
        $manager->middle_name = request('middle');
        $manager->last_name = request('last', false);
        $manager->email = request('email', false);
        $manager->password = $registrant->password;
        $manager->dorm_name = request('dorm_name', false);
        $manager->mobile_num = request('mobile_num', false);

        $manager->save();
        $registrant->delete();

        return redirect('/admin/registrants');
    }
}
