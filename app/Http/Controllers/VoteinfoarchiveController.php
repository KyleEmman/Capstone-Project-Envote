<?php

namespace App\Http\Controllers;

use App\Models\Voteinfoarchive;
use Illuminate\Http\Request;

class VoteinfoarchiveController extends Controller
{
    public function store($voteinfos){
        if($voteinfos){
            foreach($voteinfos as $voteinfo){
                Voteinfoarchive::create([
                    'votearchive_id' => $voteinfo->vote_id,
                    'electionarchive_id' => $voteinfo->election_id,
                    'positionarchive_id' => $voteinfo->position_id,
                    'studentID' => $voteinfo->studentID,
                    'candidateID' => $voteinfo->candidateID,
                    'created_at' => $voteinfo->created_at,
                    'updated_at' => $voteinfo->updated_at
                ]);
            }
        }
        return true;
    }
}
