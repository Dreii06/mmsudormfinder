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

        $amenities = Dorms::join('amenities', 'dormitory', '=', 'dorm_name')
        ->where('dorm.id', '=', $id)
        ->get(['amenities.amenities']);

        return view('manager.viewdorm', ['details' => $details], compact('images', 'room_types', 'amenities'));
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

        $room_types = Dorms::join('room_types', 'dormitory', '=', 'dorm_name')
        ->where('dorm.id', '=', $id)
        ->get(['room_types.room_type', 'room_types.price']);

        $amenities = Dorms::join('amenities', 'dormitory', '=', 'dorm_name')
        ->where('dorm.id', '=', $id)
        ->get(['amenities.amenities']);

        return view('manager.updatedorm', ['details' => $details],  compact('room_types', 'amenities'));
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

        $dorm->first_name = request('first', false);
        $dorm->middle_name = request('middle', false);
        $dorm->last_name = request('last', false);
        $dorm->dorm_name = request('dorm_name', false);
        $manager->first_name = request('first', false);
        $manager->middle_name = request('middle', false);
        $manager->last_name = request('last', false);
        $manager->dorm_name = request('dorm_name', false);
        $dorm->barangay = request('barangay', false);
        $dorm->street = request('street', false);
        $dorm->house_num = request('house_num', false);
        $dorm->nearest = request('nearest', false);
        $dorm->mobile_num = request('contact', false);
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

        if ($request->submit == "DELROOM") {
            $room_types = RoomType::where('dormitory', '=', $dorm->dorm_name)->
                                    where('room_type', '=', request('room_type'))->first();
            $room_types->delete();
        } else if ($request->submit == "DELAME") {
            $amenities = Amenities::where('dormitory', '=', $dorm->dorm_name)->
                                    where('amenities', '=', request('amenities'))->first();
            $amenities->delete();
        } else {
            if($request->filled('room_types') && !$request->filled('amenity')) {
                RoomType::create([
                    'dormitory' => request('dorm_name', false),
                    'room_type' => request('room_types', false),
                    'price' => request('prices', false)
                ]);
            } else if ($request->filled('amenity') && !$request->filled('room_types')) {
                Amenities::create([
                    'dormitory' => request('dorm_name', false),
                    'amenities' => request('amenity', false)
                ]);
            } else if ($request->filled('room_types') && $request->filled('amenity')) {
                RoomType::create([
                    'dormitory' => request('dorm_name', false),
                    'room_type' => request('room_types', false),
                    'price' => request('prices', false)
                ]);
                Amenities::create([
                    'dormitory' => request('dorm_name', false),
                    'amenities' => request('amenity', false)
                ]);
            } else {
                $dorm->save();
                $manager->save();
            }
            $dorm->save();
            $manager->save();
        }

        return redirect()->back();
    }
}
