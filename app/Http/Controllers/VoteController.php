<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Vote;
use App\Events\castVote;
use App\Models\Election;
use App\Models\Position;
use App\Models\Candidate;
use App\Models\Certificate;
use Illuminate\Http\Request;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\MailController;

class VoteController extends Controller
{
    public function submit(Election $election, Request $request){
        $votes = Vote::all();
        $positions = $election->positions()->get();
        $candidates = Candidate::all();
        if(count($votes->where('studentID', auth()->user()->studentID)->where('election_id', $election->id)) != 0){
            return redirect('/');
        }
        if(!$election){
            return redirect('/');
        }
        return view('users.voteConfirm', [
            'heading' => 'Confirm your vote',
            'request' => $request,
            'positions' => $positions,
            'candidates' => $candidates,
            'election' => $election
        ]);
    }

    public function store(Election $election, Request $request){

        $positions = $request->positions;
        $mail = new MailController;
        $candidates = Candidate::all();
        $validElection = Election::where('id', $election->id)->first();
        if ($validElection->status != 'ongoing') {
            return redirect('/');
        }
        $votes = Vote::all();
        if(count($votes->where('studentID', auth()->user()->studentID)->where('election_id', $election->id)) != 0){
            return redirect('/');
        }
        $formFields = [
            'election_id' => $election->id,
            'studentID' => auth()->user()->studentID,
            'yearLevel' => auth()->user()->yearLevel,
            'program' => auth()->user()->program,
        ];
        $accountDateCreate = auth()->user()->created_at;
        $date = new Carbon( $accountDateCreate );  
        
        $certificateInfo = [
            'election_id' => $election->id,
            'studentID' => auth()->user()->studentID,
            'firstName' => auth()->user()->firstName,
            'middleName' => " ",
            'lastName' => auth()->user()->lastName,
            'schoolYear' => (strval($date->year)."-".strval($date->year+1)),
            'url' => strval(URL('voteConfirmation/e-certificate', ['studentID' => auth()->user()->studentID, 'election' => $election->id])),
        ];
        
        $cert = (new CertificateController)->store($certificateInfo);
        $createVote = Vote::create($formFields);

        if($createVote){
            (new VoteinfoController)->store($request, $election, $createVote);
            if (auth()->user()->email) {
                $mail->sendMail($request, $election, $candidates);
            }
            return view('users.voteSuccess', [
                'heading' => 'Vote Success!',
                'cert' => Certificate::find($cert),
                'election' => $election
            ]);
        }
    }

    public function retrieve($votes){  
        if($votes){
            foreach($votes as $vote){
                Vote::create([
                    'id' => $vote->id,
                    'election_id' => $vote->electionarchive_id,
                    'studentID' => $vote->studentID,
                    'yearLevel' => $vote->yearLevel,
                    'program' => $vote->program,
                    'created_at' => $vote->created_at,
                    'updated_at' => $vote->updated_at,
                ]);
            }
        }
        return true;
    }

    public function show(){
        $elections = Election::all();
        $positions = Position::all();
        $votes = Vote::all();
        return view('users.ongoingElection.results', [
            'elections' => $elections,
            'positions' => $positions,
            'votes' => $votes,
        ]);
    }
    
}
