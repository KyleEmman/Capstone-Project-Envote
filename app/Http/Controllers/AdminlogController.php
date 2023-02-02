<?php

namespace App\Http\Controllers;

use App\Models\Adminlog;
use Illuminate\Http\Request;

class AdminlogController extends Controller
{
    public function index(){
        $logs = Adminlog::latest()->filter(request(['search']))->paginate(request()->rows ? (request()->rows == "all" ? 999999999999999999999999 : request()->rows) : 8);

        return view('admin.activitylogs', [
            'heading' => 'Activity Logs',
            'logs' => $logs,
        ]);
    }

    public function store($firstName, $lastName, $activity){
        $name = $firstName." ".$lastName;
        Adminlog::create([
            'admin' => $name,
            'activity' => $activity
        ]);
        return true;
    }
}
