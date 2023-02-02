<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cprofile;
use App\Models\Election;
use App\Models\Candidate;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Http\Controllers\CprofileController;

class CandidateController extends Controller
{
    public function store($application){
        $user = User::where('studentID', $application->studentID)->first();
        $createCandidate = [
            'position_id' => $application->position_id,
            'studentID' => $application->studentID,
            'firstName' => $application->firstName,
            'middleName' => $application->middleName,
            'lastName' => $application->lastName,
            'program' => $application->program,
            'yearLevel' => $application->yearLevel,
            'section' => $application->section,
            'party' => $application->party,
            'votes' => 0
        ];
        $createCandidate = Candidate::create($createCandidate);
        $displayPhoto = "";

        if($user->displayPhoto){
            File::copy('storage/'.$user->displayPhoto, 'storage/candidatePhoto/'.$user->displayPhoto);
          	$displayPhoto = 'candidatePhoto/'.$user->displayPhoto;
        }

        $cProfileDetails = [
            'candidate_id' => $createCandidate->id,
            'displayPhoto' => $displayPhoto ? $displayPhoto : "",
            'updatedBy' => "",
            'platforms' => ""
        ];
        $createProfile = (new CprofileController)->store($cProfileDetails);
        
        return true;
    }
    public function destroy($application){
        $destroy = Candidate::where('position_id', $application->position_id)
                        ->where('studentID', $application->studentID)->first();
        if($destroy){
            $destroy->delete();
            return true;
        }
        return false;
    }

    public function retrieve($candidates){
        if(count($candidates) != 0){
            foreach($candidates as $candidate){
                Candidate::create([
                    'id' => $candidate->id,
                    'position_id' => $candidate->positionarchive_id,
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
                (new CprofileController)->retrieve($cprofile);
            }
        }
        return true;
    }

    public function showCandidateProfile(Candidate $candidate){
        return view('users.ongoingElection.candidateProfile', [
            'candidate' => $candidate
        ]);
    }

}
