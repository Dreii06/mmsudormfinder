<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\DormsController;
use App\Http\Controllers\OccupantsController;
use App\Http\Controllers\ApplicantsController;
use App\Http\Controllers\RegistrantsController;
use App\Models\Dorms;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth']);

Route::get('/profilestudent', function () {
    return view('profilestudent');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/dorm', function () {
    return view('dorm');
});

Route::get('/applicationlist', [ApplicantsController::class, 'applicationlist']);

//Route::get('/profilestudent', [UserProfileController::class, 'update'])->middleware(['auth']);

Route::post('/profilestudent', [UserProfileController::class, 'update']);

/*Route::get('/offcampus', function () {
    return view('offcampusdormslist');
})->middleware(['auth']);*/


Route::get('/offcampusdormslist', [DormsController::class, 'show']);

Route::post('/searchdorm', function() {
    $q = Request::get('q');
    /*$dorm = Dorms::where('dorm_name', 'LIKE', '%' . $q . '%')->get();
    if (count($dorm) > 0)
        return view('searchdorm')->withDetails($dorm);*/
    if($q != "") {
        $dorm = Dorms::where('dorm_name', 'LIKE', '%' . $q . '%')->get();
        $room_types = Dorms::join('room_types', 'dormitory', '=', 'dorm_name')
            ->where('dorm.dorm_name', 'LIKE', '%' . $q . '%')
            ->get(['room_types.room_type', 'room_types.price']);
        $images = Dorms::join('images', 'dormitory', '=', 'dorm_name')
        ->where('dorm.dorm_name', 'LIKE', '%' . $q . '%')
        ->get(['images.filename']);
        if (count($dorm) > 0)
            return view('searchdorm', compact('images', 'room_types'))->withDetails($dorm);  
    }
});

Route::get('/dormitorydetails/{id}', [DormsController::class, 'getdorm']);

Route::get('/applyconfirmation/{id}', [DormsController::class, 'getapply']);

Route::post('/applyconfirmation/{id}', [ApplicantsController::class, 'store']);

/*Route::get('/dormdetails', function () {
    return view('dormitorydetails');
});

Route::get('/occupantdetails', function () {
    return view('occupantsdetails');
});*/

Route::get('/manager/dashboard', function () {
    return view('manager.dashboard');
})->middleware(['auth']);

Route::get('/manager/contact', function () {
    return view('manager.contact');
});

Route::get('/manager/listoccupants', [OccupantsController::class, 'show']);

Route::get('/manager/detailsoccupant/{id}', [OccupantsController::class, 'get']);

Route::post('/manager/detailsoccupant', [OccupantsController::class, 'del']);

Route::get('/manager/listapplicants', [ApplicantsController::class, 'show']);

Route::get('/manager/detailsapplicant/{id}', [ApplicantsController::class, 'get']);

Route::post('/manager/detailsapplicant', [OccupantsController::class, 'store']);

Route::get('/manager/viewdorm/{id}', [DormsController::class, 'get']);

Route::any('/manager/updatedorm/{id}', [DormsController::class, 'getupdate']);

Route::post('/manager/updatedorm', [DormsController::class, 'store']);

//Route::post('/manager/updatedorm', [DormsController::class, 'delete']);

/*Route::get('/admin/registrants', function () {
    return view('admin.registrants');
});*/

Route::get('/admin/registrants', [RegistrantsController::class, 'show']);

Route::get('/admin/registrantdetails/{id}', [RegistrantsController::class, 'get']);

Route::post('/admin/registrants', [RegistrantsController::class, 'store']);

Route::get('/admin/dorms', function () {
    return view('admin.dorms');
});

Route::get('/admin/contact', function () {
    return view('admin.contact');
});

Route::get('/admin/offcampusdorms', [DormsController::class, 'adminshow']);

Route::get('/admin/dormdetails/{id}', [DormsController::class, 'adminget']);

Route::get('/admin/{id}/occupantslist', [OccupantsController::class, 'adminshow']);

Route::get('/admin/{name}/occupantdetails/{id}', [OccupantsController::class, 'adminget']);

Route::post('/admin/{name}/occupantdetails', [OccupantsController::class, 'admindel']);

require __DIR__.'/auth.php';

Route::multiauth('Admin', 'admin');
Route::multiauth('Manager', 'manager');