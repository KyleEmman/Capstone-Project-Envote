<?php

namespace App\Http\Controllers;

use App\Models\Officerlog;
use Illuminate\Http\Request;

class OfficerlogController extends Controller
{
    public function index(){
        $logs = Officerlog::latest()->filter(request(['search']))->paginate(request()->rows ? (request()->rows == "all" ? 999999999999999999999999 : request()->rows) : 8);

        return view('admin.activitylogsOfficer', [
            'heading' => 'Activity Logs',
            'logs' => $logs,
        ]);
    }
    public function officerLogs(){
        $logs = Officerlog::latest()->filter(request(['search']))->paginate(request()->rows ? (request()->rows == "all" ? 999999999999999999999999 : request()->rows) : 8);
        
        return view('officer.activitylogs', [
            'heading' => 'Activity Logs',
            'logs' => $logs,
        ]);
    }

    public function store($firstName, $lastName, $activity){
        $name = $firstName." ".$lastName;
        Officerlog::create([
            'officer' => $name,
            'activity' => $activity
        ]);
        return true;
    }
}
