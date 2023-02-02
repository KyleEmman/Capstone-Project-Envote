<?php

namespace App\Http\Controllers;

use App\Models\Voteinfo;
use App\Models\Candidate;
use Illuminate\Http\Request;

class VoteinfoController extends Controller
{
    public function store($request, $election, $vote){
        $generalVoteInfo = [
            'vote_id' => $vote->id,
            'election_id' => $election->id,
            'studentID' => auth()->user()->studentID,
        ];

        foreach ($election->positions()->get() as $position){
             if($request[$position->id]){
                $voteInfo = [
                    'position_id' => $position->id,
                    'candidateID' => $request[$position->id],
                ];
                $addVote = Candidate::find($request[$position->id]);
                $newVoteCount = $addVote->votes + 1;
                $addVote->update(['votes' => $newVoteCount]);
                Voteinfo::create(array_merge($generalVoteInfo, $voteInfo));
             }
        }
    }

    public function retrieve($voteinfos){
        
        if($voteinfos){
            foreach($voteinfos as $voteinfo){
                Voteinfo::create([
                    'vote_id' => $voteinfo->votearchive_id,
                    'election_id' => $voteinfo->electionarchive_id,
                    'position_id' => $voteinfo->positionarchive_id,
                    'studentID' => $voteinfo->studentID,
                    'candidateID' => $voteinfo->candidateID,
                    'created_at' => $voteinfo->created_at,
                    'updated_at' => $voteinfo->updated_at,
                ]);
            }
        }
        return true;
    }
}
