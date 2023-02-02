<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cprofile;
use App\Models\Election;
use App\Models\Position;
use App\Models\Application;
use Illuminate\Http\Request;
use App\Models\Applicationarchive;
use App\Http\Controllers\CandidateController;
use App\Models\Partylist;

class ApplicationController extends Controller
{
    public function create(Election $election){
        $userLevel = (int)auth()->user()->yearLevel;
        $isForCollege = $election->for == 'college';
        $campusDictionary = ['MA' => 'Malolos', 'OB' => 'Obando', 'PA' => 'Pandi', 'SJ' => 'San Jose', 'SM' => 'San Miguel'
        , 'BO' => 'Bocaue', 'SR' => 'San Rafael', 'AN' => 'Angat'];
        $campusAlpha = substr(auth()->user()->studentID, 0, 2);
        $applications = Application::where('studentID', auth()->user()->studentID)->get();

        if($campusDictionary[$campusAlpha] != $election->campus || ($isForCollege ? ($userLevel > 6) : ($userLevel < 6))){
            return redirect('/');
        }
        $partyLists = Partylist::all();
        return view('client.fileCandidacy',[
            'heading' => 'File candidacy',
            'election' => $election,
            'applications' => $applications,
            'partyLists' => $partyLists,
        ]);
    }
    // onsubmit of filing candidacy form action
    public function store(Request $request){

        $formFields = $request->validate([
            'position_id' => 'required',
            'party' => 'required'
        ]);
        $candidateDetails = [
            'studentID' => auth()->user()->studentID,
            'firstName' => auth()->user()->firstName,
            'middleName' => auth()->user()->middleName,
            'lastName' => auth()->user()->lastName,
            'program' => auth()->user()->program,
            'yearLevel' => auth()->user()->yearLevel,
            'section' => auth()->user()->section,
            'status' => 'pending',
        ];
        if($formFields){
            Application::create(array_merge($formFields,$candidateDetails));
        }
        
        return back();
    }

    public function retrieve(Applicationarchive $application){

        $electionIsArchivedOrDeleted = count($application->position()->get()) != 0 || count(Position::where('id', $application->positionarchive_id)->get()) == 0;
        if($electionIsArchivedOrDeleted){
            session()->forget('studentID1');
            return back()->with([ 'studentID1' => $application->studentID, 'errorMessage' => 'Sorry, this application cannot be retrieved because the election is either archived or deleted!']);
        }
        else{
            Application::create([
                'id' => $application->id,
                'position_id' => $application->positionarchive_id,
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
                'updated_at' => $application->updated_at
            ]);
            $application->delete();
            (new AdminlogController)->store(auth()->guard('admin')
            ->user()->firstName,auth()->guard('admin')->user()->lastName,'Retrieved a candidate application');
            return back()->with( 'successMessage' , 'The application has been retrieved successfully!');
        }

    }


    // admin add candidate application
    public function storeCandidate(Request $request) {
        $user = User::where('studentID', $request->studentID)->first();
        if(!$user){
            return back()->with('errorMessage', 'Student ID:'.$request->studentID.' is invalid, never logged in or not enrolled');
        }
        else if(!$request->election_id){
            $campusDictionary = ['MA' => 'Malolos', 'OB' => 'Obando', 'PA' => 'Pandi', 'SJ' => 'San Jose', 'SM' => 'San Miguel'
            , 'BO' => 'Bocaue', 'SR' => 'San Rafael', 'AN' => 'Angat'];
            $idAlpha = substr($request->studentID, 0, 2);
            return back()->with('errorMessage', 'There are no elections open for filing in '.$campusDictionary[$idAlpha].' campus');
        }
        else if(!$request->position_id){
            return back()->with('errorMessage', 'Please select a position for this candidate');
        }

        foreach(Application::where('studentID', $request->studentID)->get() as $applicant) {

            foreach(Election::find($request->election_id)->positions()->get() as $position){
                if($applicant->position_id == $position->id){
                    return redirect("/admin/candidates")->with('errorMessage', 'Existing candidate');
                }
            }
        }
 
        $candidateDetails = [
            'position_id' => $request->position_id,
            'studentID' => $request->studentID,
            'firstName' => $user->firstName,
            'middleName' => $user->middleName,
            'lastName' => $user->lastName,
            'program' => $user->program,
            'yearLevel' => $user->yearLevel,
            'section' => $user->section,
            'party' => $request->party,
            'status' => 'accepted'
        ];

        $application = Application::create($candidateDetails);

        $createCandidate = (new CandidateController)->store($application);

        (new AdminlogController)->store(auth()->guard('admin')
        ->user()->firstName,auth()->guard('admin')->user()->lastName,'Added a candidate in an election');
        return redirect("/admin/candidates")->with('successMessage', 'Candidate created successfully!');
    }
    // accept button action form
    public function updateAccept(Application $application){
        $createCandidate = (new CandidateController)->store($application);

        if($createCandidate){
            $application->update(['status' => 'accepted']);
            (new AdminlogController)->store(auth()->guard('admin')
            ->user()->firstName,auth()->guard('admin')->user()->lastName,'Accepted '.$application->firstName.' '.$application->lastName.' as candidate for '.$application->position->title.' in '.Election::where('id', $application->position->election_id)->first()->title );
            return back();
        }
    }
    // reject button action form
    public function updateReject(Application $application){
        $application->update(['status' => 'rejected']);
        (new AdminlogController)->store(auth()->guard('admin')
        ->user()->firstName,auth()->guard('admin')->user()->lastName,'Rejected '.$application->firstName.' '.$application->lastName.' as candidate for '.$application->position->title.' in '.Election::where('id', $application->position->election_id)->first()->title );
        return back();
    }

    // undo button action form
    public function updatePending(Application $application){
        $ifDestroy = (new CandidateController)->destroy($application);
        if($ifDestroy){

        }
        $application->update(['status' => 'pending']);
        (new AdminlogController)->store(auth()->guard('admin')
        ->user()->firstName,auth()->guard('admin')->user()->lastName,'Undid previous action for '.$application->firstName.' '.$application->lastName.' as candidate for '.$application->position->title.' in '.Election::where('id', $application->position->election_id)->first()->title );
        return back();
    }
    // ARCHIVE BUTTON
    public function archive(){
        // PASS
    }
}
