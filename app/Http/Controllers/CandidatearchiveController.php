<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cprofilearchive;
use App\Models\Candidatearchive;
use App\Models\Cpositionarchive;
use App\Http\Controllers\CprofilearchiveController;

class CandidatearchiveController extends Controller
{
    public function store($candidates){
        if($candidates){
            foreach($candidates as $candidate){
                Candidatearchive::create([
                    'id' => $candidate->id,
                    'positionarchive_id' => $candidate->position_id,
                    'studentID' => $candidate->studentID,
                    'firstName' => $candidate->firstName,
                    'middleName' => $candidate->middleName,
                    'lastName' => $candidate->lastName,
                    'program' => $candidate->program,
                    'yearLevel' => $candidate->yearLevel,
                    'section' => $candidate->section,
                    'party' => $candidate->party,
                    'votes' => $candidate->votes,
                    'created_at' => $candidate->created_at,
                    'updated_at' => $candidate->updated_at,
                ]);
                $cprofile = $candidate->cprofile()->first();
                (new CprofilearchiveController)->store($cprofile);
            }
        }
        return true;
    }
}
