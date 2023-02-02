<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Result;
use App\Models\Election;
use App\Models\User;
use App\Models\Vote;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function index(Election $election){
        $result = $election->result;
        $votes = count(Vote::where('election_id', $election->id)->get());
        return view('admin.electionResult', [
            'heading' => $election->title." - Winners",
            'result' => $result,
            'votes' => $votes
        ]);
    }


    public function store(Election $election){
    $votes = count(Vote::where('election_id', $election->id)->get());
    if ($votes == 0) {
        return back()->with('errorMessage', 'There are no votes in this election yet.');
    }
    $campus = ['Malolos' => 'MA', 'Obando' => 'OB', 'Pandi' => 'PA', 
    'San Jose' => 'SJ', 'San Miguel' => 'SM', 'Bocaue' => 'BO',
    'San Rafael' => 'SR', 'Angat' => 'AN'];
    $totalVoters = 0;
    if($election->for == 'college'){
        $totalVoters = User::where('studentID', 'like', '%' . $campus[$election->campus] . '%')
        ->where(function($q){
            $q->orWhere('yearLevel', '1')
            ->orWhere('yearLevel', '2')
            ->orWhere('yearLevel', '3')
            ->orWhere('yearLevel', '4')
            ->orWhere('yearLevel', '5')
            ->orWhere('yearLevel', '6')
            ->orWhere('yearLevel', '7');
        })
        ->get();
    }
    else{
        $totalVoters = User::where('studentID', 'like', '%' . $campus[$election->campus] . '%')
        ->where(function($q){
            $q->orWhere('yearLevel', '11')
            ->orWhere('yearLevel', '12');
        })
        ->get();
    }
    $totalVoters = count($totalVoters);
    $fields = [
        'election_id' => $election->id,
        'totalVoters' => $totalVoters];
    $createResult = Result::create($fields);

    foreach($election->positions as $position){
        
        $winner = $position->candidates()->orderBy('votes', 'DESC')->first();
        $isSolo = count($position->candidates()->get()) == 1;
        if($winner ?? False){
            
            if ((($winner->votes/$votes)*100) >= 75 && $isSolo){
                (new WinnerController)->store($winner, $createResult->id, $election->id);
            }
            else if (!$isSolo){
                (new WinnerController)->store($winner, $createResult->id, $election->id);
            }
            else{
                (new WinnerController)->store($position->title, $createResult->id, $election->id);
            }
        }
    }
    $election->update(['status' => 'Completed']);
    return back()->with('successMessage', 'Winners are declared!');
    }

    public function test ($test) {
        return back()->with('successMessage' , "nice");
    }
}
