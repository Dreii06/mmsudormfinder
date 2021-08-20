<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Dorms;
use App\Models\Reports;
use App\Models\User;

class ReportsController extends Controller
{
    function report(Request $request) {
        $user = Auth::user();
        $report = new Reports();
        
        $report->stud_num = $user->stud_num;
        $report->dormitory = request('dormitory', false);
        $report->reason = request('reason', false);
        $report->report = request('report', false);

        $report->save();
        
        return redirect()->back();
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
