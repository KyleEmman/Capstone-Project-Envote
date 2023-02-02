<?php

namespace App\Http\Controllers;

use App\Models\Votearchive;
use Illuminate\Http\Request;

class VotearchiveController extends Controller
{
    public function store($votes){
        if($votes){            
            foreach($votes as $vote){
                Votearchive::create([
                    'id' => $vote->id,
                    'electionarchive_id' => $vote->election_id,
                    'studentID' => $vote->studentID,
                    'yearLevel' => $vote->yearLevel,
                    'program' => $vote->program,
                    'created_at' => $vote->created_at,
                    'updated_at' => $vote->updated_at
                ]);
            }
        }
        return true;
    }
}
