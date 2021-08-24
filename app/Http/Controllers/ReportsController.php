<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Dorms;
use App\Models\Reports;
use App\Models\User;
use App\Models\Occupants;

class ReportsController extends Controller
{

    function displayReport() {
        $user = Auth::user();
        $dorms = Occupants::where('stud_num', '=', $user->stud_num)->get(['dormitory']);

        return view('reportdorm', compact('dorms'));
    }

    function report(Request $request) {
        $user = Auth::user();
        $report = new Reports();
        
        $report->stud_num = $user->stud_num;
        $report->dormitory = request('dormitory', false);
        $report->reason = request('reason', false);
        $report->report = request('report', false);

        $report->save();
        
        return redirect()->back()->with('success', 'Feedback Sent Successfully!');
    }

    function getReports() {
        $reports = User::join('reports', 'users.stud_num', '=', 'reports.stud_num')->get();

        return view('admin.reportoccupant', compact('reports'));
    }

    function doneReport($id) {
        $report = Reports::where('id', '=', $id)->first();
        $report->delete();

        return redirect()->back();
    }
}
