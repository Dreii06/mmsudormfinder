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
        $registrant = Registrant::where('name', '=', request('name'))->first();
        $manager = new Manager();

        $manager->name = request('name', false);
        $manager->email = request('email', false);
        $manager->password = $registrant->password;
        $manager->dorm_name = request('dorm_name', false);
        $manager->mobile_num = request('contact', false);

        $manager->save();
        $registrant->delete();

        return redirect('/admin/registrants');
    }
}
