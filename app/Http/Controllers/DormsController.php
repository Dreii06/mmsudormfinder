<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Dorms;
use App\Models\Manager;
use App\Models\Images;
use App\Models\RoomType;
use App\Models\Amenities;

class DormsController extends Controller
{
    function show() {
        $data = Dorms::all();
        return view('offcampusdormslist', ['dorm' => $data]);
    }

    function adminshow() {
        $data = Dorms::all();
        return view('admin.offcampusdorms', ['dorm' => $data]);
    }

    function get($id) {
        $details = Dorms::find($id);

        $images = Dorms::join('images', 'dormitory', '=', 'dorm_name')
        ->where('dorm.id', '=', $id)
        ->get(['images.filename']);
        
        $room_types = Dorms::join('room_types', 'dormitory', '=', 'dorm_name')
        ->where('dorm.id', '=', $id)
        ->get(['room_types.room_type', 'room_types.price']);

        return view('manager.viewdorm', ['details' => $details], compact('images', 'room_types'));
    }
    
    function adminget($id) {
        $details = Dorms::find($id);

        $room_types = Dorms::join('room_types', 'dormitory', '=', 'dorm_name')
        ->where('dorm.id', '=', $id)
        ->get(['room_types.room_type', 'room_types.price']);

        return view('admin.dormdetails', ['details' => $details], ['room_types' => $room_types]);
    }

    function getupdate($id) {
        $details = Dorms::find($id);

        return view('manager.updatedorm', ['details' => $details]);
    }

    function getdorm($id) {
        $details = Dorms::find($id);

        $images = Dorms::join('images', 'dormitory', '=', 'dorm_name')
        ->where('dorm.id', '=', $id)
        ->get(['images.filename']);

        $room_types = Dorms::join('room_types', 'dormitory', '=', 'dorm_name')
        ->where('dorm.id', '=', $id)
        ->get(['room_types.room_type', 'room_types.price']);

        $amenities = Dorms::join('amenities', 'dormitory', '=', 'dorm_name')
        ->where('dorm.id', '=', $id)
        ->get(['amenities.amenities']);

        return view('dormitorydetails', ['details' => $details], compact('images', 'room_types', 'amenities'));
    }

    function getapply($id) {
        $details = Dorms::find($id);

        $room_types = Dorms::join('room_types', 'dormitory', '=', 'dorm_name')
        ->where('dorm.id', '=', $id)
        ->get(['room_types.room_type']);

        return view('applyconfirmation', ['details' => $details], ['room_types' => $room_types]);
    }

    function store(Request $request) {
        $id = Auth::guard('manager')->id();
        $dorm = Dorms::find($id);
        $manager = Auth::guard('manager')->user();

        $dorm->dorm_name = request('name', false);
        $manager->dorm_name = request('name', false);
        $dorm->address = request('address', false);
        $dorm->mobile_num = request('contact', false);
        $dorm->amenities = request('amenities', false);
        $dorm->available_space = request('avail', false);

        $images = Images::where('dormitory', '=', $dorm->dorm_name);
        if($images->first()) {
            $images->delete();
        }
        else {
            if($request->has('photo')) {
                $photos = $request->file('photo');
    
                foreach($photos as $photo) {
                    $filename = $photo->getClientOriginalName();
                    $photo->move(public_path('images'), $filename);
                    
                    (Images::create([
                        'dormitory' => request('name', false),
                        'filename' => $filename
                    ]));
                }
            }
        }

        $room_types = RoomType::where('dormitory', '=', $dorm->dorm_name);
        if($room_types->first()) {
            $room_types->delete();
        }
        else {
            if($request->has('room_type')) {
                foreach($request->input('room_type') as $key => $value) {
                    (RoomType::create([
                        'dormitory' => request('name', false),
                        'room_type' => $request->input('room_type')[$key],
                        'price' => $request->input('price')[$key]
                    ]));
                }
            }
        }

        $dorm->save();
        $manager->save();
        return redirect('/manager/dashboard');
    }
}
