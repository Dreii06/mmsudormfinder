<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Dorms;
use App\Models\RoomType;
use App\Models\Manager;
use App\Models\Images;
use App\Models\Amenities;

class DormsController extends Controller
{
    function showOnCampusDorms() {
        $data = Dorms::join('oncampusdorms', 'dormitory', '=', 'dorm_name')->get(['dorm_name', 'first_name', 'middle_name', 'last_name', 'mobile_num', 'dorms.id']);
        return view('oncampusdormslist', ['dorm' => $data]);
    }

    function showOffCampusDorms() {
        $data = Dorms::join('offcampusdorms', 'dormitory', '=', 'dorm_name')->get(['dorm_name', 'first_name', 'middle_name', 'last_name', 'mobile_num', 'dorms.id']);
        return view('offcampusdormslist', ['dorm' => $data]);
    }

    function adminshowOnCampusDorms() {
        $data = Dorms::join('oncampusdorms', 'dormitory', '=', 'dorm_name')->get(['dorm_name', 'first_name', 'middle_name', 'last_name', 'mobile_num', 'dorms.id']);
        return view('admin.oncampusdorms', ['dorm' => $data]);
    }

    function adminshowOffCampusDorms() {
        $data = Dorms::join('offcampusdorms', 'dormitory', '=', 'dorm_name')->get(['dorm_name', 'first_name', 'middle_name', 'last_name', 'mobile_num', 'dorms.id']);
        return view('admin.offcampusdorms', ['dorm' => $data]);
    }

    function get($id) {
        $manager = Auth::guard('manager')->user();
        $details = Dorms::where('dorm_name', '=', $manager->dorm_name)->first();

        $images = Dorms::join('images', 'dormitory', '=', 'dorm_name')
        ->where('dorms.dorm_name', '=', $details->dorm_name)
        ->get(['images.filename']);
        
        $room_types = Dorms::join('room_types', 'dormitory', '=', 'dorm_name')
        ->where('dorms.dorm_name', '=', $details->dorm_name)
        ->get();

        $amenities = Dorms::join('amenities', 'dormitory', '=', 'dorm_name')
        ->where('dorms.dorm_name', '=', $details->dorm_name)
        ->get(['amenities.amenities']);

        return view('manager.viewdorm', ['details' => $details], compact('images', 'room_types', 'amenities'));
    }
    
    function adminget($id) {
        $details = Dorms::where('dorm_name', '=', $id)->first();

        $room_types = Dorms::join('room_types', 'dormitory', '=', 'dorm_name')
        ->where('dorms.dorm_name', '=', $id)
        ->get();

        $amenities = Dorms::join('amenities', 'dormitory', '=', 'dorm_name')
        ->where('dorms.dorm_name', '=', $id)
        ->get(['amenities.amenities']);

        return view('admin.dormdetails', ['details' => $details], compact('room_types', 'amenities'));
    }

    function getupdate($id) {
        $manager = Auth::guard('manager')->user();
        $details = Dorms::where('dorm_name', '=', $manager->dorm_name)->first();
        
        $available = Dorms::join('room_types', 'dormitory', '=', 'dorm_name')
        ->where('dorms.dorm_name', '=', $details->dorm_name)->sum('vacancy');
        
        $room_types = Dorms::join('room_types', 'dormitory', '=', 'dorm_name')
        ->where('dorms.dorm_name', '=', $details->dorm_name)
        ->get();

        $amenities = Dorms::join('amenities', 'dormitory', '=', 'dorm_name')
        ->where('dorms.dorm_name', '=', $details->dorm_name)
        ->get(['amenities.amenities']);

        return view('manager.updatedorm', ['details' => $details],  compact('room_types', 'amenities', 'available'));
    }

    function getdorm($id) {
        $details = Dorms::where('dorm_name', '=', $id)->first();

        $images = Dorms::join('images', 'dormitory', '=', 'dorm_name')
        ->where('dorms.dorm_name', '=', $id)
        ->get();

        $room_types = Dorms::join('room_types', 'dormitory', '=', 'dorm_name')
        ->where('dorms.dorm_name', '=', $id)
        ->get();

        $amenities = Dorms::join('amenities', 'dormitory', '=', 'dorm_name')
        ->where('dorms.dorm_name', '=', $id)
        ->get(['amenities.amenities']);

        return view('dormitorydetails', ['details' => $details], compact('images', 'room_types', 'amenities'));
    }

    function getapply($id) {
        $details = Dorms::where('dorm_name', '=', $id)->first();

        $images = Dorms::join('images', 'dormitory', '=', 'dorm_name')
        ->where('dorms.dorm_name', '=', $id)
        ->get();

        $room_types = Dorms::join('room_types', 'dormitory', '=', 'dorm_name')
        ->where('dorms.dorm_name', '=', $id)
        ->get();

        return view('applyconfirmation', ['details' => $details], compact('images', 'room_types'));
    }

    function getdorms() {
        $dorms = Dorms::all();

        return view ('reportdorm', compact ('dorms'));
    }

    function store(Request $request) {
        $manager = Auth::guard('manager')->user();
        $dorm = Dorms::where('dorm_name', '=', $manager->dorm_name)->first();

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
        $dorm->nearest = request('nearest', false);
        $dorm->mobile_num = request('mobile_num', false);
        $dorm->capacity = RoomType::where('dormitory', '=', $manager->dorm_name)->sum('vacancy');
        $dorm->description = request('description', false);

        if ($request->has('amen')) {
            $amenities = Amenities::where('dormitory', '=', $dorm->dorm_name)->
                                    where('amenities', '=', $request->input('amen'))->first();
            $amenities->delete();

            return redirect()->back();
        } else if ($request->has('type')) {
            $room_types = RoomType::where('dormitory', '=', $dorm->dorm_name)->
                                    where('room_type', '=', $request->input('type'))->first();
            $room_types->delete();
            
            return redirect()->back();
        } else if($request->submit == ("addAmen")) {
            Amenities::create([
                'dormitory' => request('dorm_name', false),
                'amenities' => request('amenities', false)
            ]);
            
            return redirect()->back();
        } else if($request->submit == ("addRoomType")) {
            RoomType::create([
                'dormitory' => request('dorm_name', false),
                'room_type' => request('roomtype', false),
                'vacancy' => request('vacancy', false),
                'price' => request('prices')
            ]);
            
            return redirect()->back();
        } else {
            $dorm->save();
            $manager->save();
        }
        $dorm->save();
        $manager->save();

        return redirect('/manager/viewdorm/'. $manager->id);
    }

    function getdormimage($id) {
        $manager = Auth::guard('manager')->user();
        $details = Dorms::where('dorm_name', '=', $manager->dorm_name)->first();

        $images = Dorms::join('images', 'dormitory', '=', 'dorm_name')
        ->where('dorms.dorm_name', '=', $details->dorm_name)
        ->get();

        return view('manager.updateimage', ['details' => $details], ['images' => $images]);
    }

    function storeimg(Request $request) {
        $manager = Auth::guard('manager')->user();
        $dorm = Dorms::where('dorm_name', '=', $manager->dorm_name)->first();

        $images = Images::where('dormitory', '=', $dorm->dorm_name);

        if($request->submit == "ADD") {
            if($request->has('image')) {
                $photos = $request->file('image');
                
                $filename = $photos->getClientOriginalName();
                $label = request('filename');
                $photos->move(public_path('images'), $filename);
                
                (Images::create([
                        'dormitory' => $dorm->dorm_name,
                        'filename' => $filename,
                        'label' => $label
                ]));

                return redirect()->back();
            }
        } else if ($request->submit == "DEL") {
            $images = Images::where('dormitory', '=', $dorm->dorm_name)
                            ->where('id', '=', request('delfilename'))->first();
            $images->delete();

            return redirect()->back();
        }

    }
}