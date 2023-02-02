<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use App\Models\Applicationarchive;

class ApplicationarchiveController extends Controller
{
    public function index(){
        $applications = Applicationarchive::latest()->filter(request(['search', 'status', 'campus']))->paginate(request()->rows ? request()->rows : 8);
        return view('admin.candidatesArchives', [
            'heading' => 'Candidates Archives',
            'applications' => $applications,
        ]);
    }

    public function store($applications){
        if(count($applications) != 0){
            foreach($applications as $application){
                Applicationarchive::create([
                    'id' => $application->id,
                    'positionarchive_id' => $application->position_id,
                    'studentID' => $application->studentID,
                    'firstName' => $application->firstName,
                    'middleName' => $application->middleName,
                    'lastName' => $application->lastName,
                    'program' => $application->program,
                    'yearLevel' => $application->yearLevel,
                    'section' => $application->section,
                    'party' => $application->party,
                    'status' => $application->status,
                    'created_at' => $application->created_at,
                    'updated_at' => $application->updated_at,
                ]);
            }
        }
        return true;
    }

    public function store1(Application $application){
        Applicationarchive::create([
            'id' => $application->id,
            'positionarchive_id' => $application->position_id,
            'studentID' => $application->studentID,
            'firstName' => $application->firstName,
            'middleName' => $application->middleName,
            'lastName' => $application->lastName,
            'program' => $application->program,
            'yearLevel' => $application->yearLevel,
            'section' => $application->section,
            'party' => $application->party,
            'status' => $application->status,
            'created_at' => $application->created_at,
            'updated_at' => $application->updated_at,
        ]);
        $application->delete();
        (new AdminlogController)->store(auth()->guard('admin')->user()->firstName,auth()->guard('admin')->user()->lastName,'Archived a Candidate Application');
        return back()->with('successMessage', 'Candidate application/s has been moved to archive folder');
    }

    public function destroy(Applicationarchive $application){
        Applicationarchive::find($application)->first()->delete();
        (new AdminlogController)->store(auth()->guard('admin')->user()->firstName,auth()->guard('admin')->user()->lastName,'Deleted a Candidate Application');
        return back()->with('successMessage', 'The application has been deleted permanently');
    }
}
