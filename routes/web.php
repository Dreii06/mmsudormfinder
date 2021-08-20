<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\DormsController;
use App\Http\Controllers\OccupantsController;
use App\Http\Controllers\ApplicantsController;
use App\Http\Controllers\RegistrantsController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\Manager\DashboardController as ManagerDashboardController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Models\Dorms;
use App\Models\Applicants;
use App\Models\Occupants;
use App\Models\Registrant;

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

Route::post('/applicationlist', [ApplicantsController::class, 'delapplication']);

Route::post('/profilestudent', [UserProfileController::class, 'update']);

Route::get('/reportdorm', [DormsController::class, 'getdorms']);

Route::post('/reportdorm', [ReportsController::class, 'report']);

Route::get('/oncampusdormslist', [DormsController::class, 'showOnCampusDorms']);

Route::post('/searchoncampusdorms', function() {
    $q = Request::get('q');
    if($q != "") {
        $dorm = Dorms::join('oncampusdorms', 'dormitory', '=', 'dorm_name')->
                        where('dorms.dorm_name', 'LIKE', '%' . $q . '%')->get();
        return view('searchoncampusdorms', compact('dorm'));
    } else {
        return redirect()->back();
    }
});

Route::get('/offcampusdormslist', [DormsController::class, 'showOffCampusDorms']);

Route::post('/searchoffcampusdorms', function() {
    $q = Request::get('q');
    if($q != "") {
        $dorm = Dorms::join('offcampusdorms', 'dormitory', '=', 'dorm_name')->
                        where('dorms.dorm_name', 'LIKE', '%' . $q . '%')->get();
        return view('searchoffcampusdorms', compact('dorm'));
    } else {
        return redirect()->back();
    }
});

Route::get('/dormitorydetails/{id}', [DormsController::class, 'getdorm']);

Route::get('/applyconfirmation/{id}', [DormsController::class, 'getapply']);

Route::post('/applyconfirmation/{id}', [ApplicantsController::class, 'store']);

Route::get('/manager/dashboard', [ManagerDashboardController::class, 'index'])->middleware(['auth']);

Route::get('/manager/contact', function () {
    return view('manager.contact');
});

Route::get('/manager/listoccupants', [OccupantsController::class, 'show']);

Route::post('/manager/searchoccupants', function() {
    $search = Request::get('search');
    if($search != "") {
        $occupants = Occupants::where('stud_num', 'LIKE', '%' . $search . '%')->
                                orWhere('first_name', 'LIKE', '%' . $search . '%')->
                                orWhere('last_name', 'LIKE', '%' . $search . '%')->get();
        return view('manager.searchoccupants', compact('occupants'));
    } else {
        return redirect()->back();
    }
});

Route::get('/manager/detailsoccupant/{id}', [OccupantsController::class, 'get']);

Route::post('/manager/detailsoccupant', [OccupantsController::class, 'del']);

Route::get('/manager/listapplicants', [ApplicantsController::class, 'show']);

Route::post('/manager/searchapplicants', function() {
    $search = Request::get('search');
    if($search != "") {
        $applicants = Applicants::where('stud_num', 'LIKE', '%' . $search . '%')->
                                    orWhere('first_name', 'LIKE', '%' . $search . '%')->
                                    orWhere('last_name', 'LIKE', '%' . $search . '%')->get();
        return view('manager.searchapplicants', compact('applicants'));
    } else {
        return redirect()->back();
    }
});

Route::get('/manager/detailsapplicant/{id}', [ApplicantsController::class, 'get']);

Route::post('/manager/detailsapplicant/{id}', [OccupantsController::class, 'store']);

Route::get('/manager/viewdorm/{id}', [DormsController::class, 'get']);

Route::any('/manager/updatedorm/{id}', [DormsController::class, 'getupdate']);

Route::post('/manager/updatedorm', [DormsController::class, 'store']);

Route::get('/manager/updateimage/{id}', [DormsController::class, 'getdormimage']);

Route::post('/manager/updateimage/{id}', [DormsController::class, 'storeimg']);

Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->middleware(['auth']);

Route::get('/admin/registrants', [RegistrantsController::class, 'show']);

Route::post('/admin/searchregistrants', function() {
    $search = Request::get('search');
    if($search != "") {
        $registrants = Registrant::where('dorm_name', 'LIKE', '%' . $search . '%')->
                                    orWhere('first_name', 'LIKE', '%' . $search . '%')->
                                    orWhere('last_name', 'LIKE', '%' . $search . '%')->get();
        return view('admin.searchregistrants', compact('registrants'));
    } else {
        return redirect()->back();
    }
});

Route::get('/admin/registrantdetails/{id}', [RegistrantsController::class, 'get']);

Route::post('/admin/registrants', [RegistrantsController::class, 'store']);

Route::get('/admin/dorms', function () {
    return view('admin.dorms');
});

Route::get('/admin/contact', function () {
    return view('admin.contact');
});

Route::get('/admin/occupantslist', [OccupantsController::class, 'adminshow']);

Route::post('/admin/searchoccupants', function() {
    $search = Request::get('search');
    if($search != "") {
        $occupants = Occupants::where('stud_num', 'LIKE', '%' . $search . '%')->
                                orWhere('first_name', 'LIKE', '%' . $search . '%')->
                                orWhere('last_name', 'LIKE', '%' . $search . '%')->
                                orWhere('dormitory', 'LIKE', '%' . $search . '%')->get();
        return view('admin.searchoccupants', compact('occupants'));
    } else {
        return redirect()->back();
    }
});

Route::get('/admin/occupantdetails/{id}', [OccupantsController::class, 'adminget']);

Route::post('/admin/occupantdetails', [OccupantsController::class, 'admindel']);

Route::get('/admin/oncampusdorms', [DormsController::class, 'adminshowOnCampusDorms']);

Route::post('/admin/searchoncampusdorms', function() {
    $search = Request::get('search');
    if($search != "") {
        $oncampusdorms = Dorms::join('oncampusdorms', 'dormitory', '=', 'dorm_name')->
                                where('dorms.dorm_name', 'LIKE', '%' . $search . '%')->get();
        return view('admin.searchoncampusdorms', compact('oncampusdorms'));
    } else {
        return redirect()->back();
    }
});

Route::get('/admin/offcampusdorms', [DormsController::class, 'adminshowOffCampusDorms']);

Route::post('/admin/searchoffcampusdorms', function() {
    $search = Request::get('search');
    if($search != "") {
        $offcampusdorms = Dorms::join('offcampusdorms', 'dormitory', '=', 'dorm_name')->
                                where('dorm_name', 'LIKE', '%' . $search . '%')->get();
        return view('admin.searchoffcampusdorms', compact('offcampusdorms'));
    } else {
        return redirect()->back();
    }
});

Route::get('/admin/dormdetails/{id}', [DormsController::class, 'adminget']);

Route::get('/admin/{id}/dormoccupantslist', [OccupantsController::class, 'adminshowdorm']);

Route::get('/admin/{name}/dormoccupantdetails/{id}', [OccupantsController::class, 'admingetdorm']);

Route::get('/admin/reportoccupant', [ReportsController::class, 'getReports']);

Route::post('/admin/reportoccupant/{id}', [ReportsController::class, 'doneReport']);

require __DIR__.'/auth.php';

Route::multiauth('Admin', 'admin');
Route::multiauth('Manager', 'manager');
