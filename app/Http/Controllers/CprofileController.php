<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cprofile;
use App\Models\Election;
use App\Models\Candidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CprofileController extends Controller
{
    public function store($details) {
        $createProfile = Cprofile::create($details);
    }

    public function retrieve($cprofile){
        Cprofile::create([
            'candidate_id' => $cprofile->candidatearchive_id,
            'displayPhoto' => $cprofile->displayPhoto,
            'platforms' => $cprofile->platforms,
            'updatedBy' => $cprofile->updatedBy,
            'created_at' => $cprofile->created_at,
            'updated_at' => $cprofile->updated_at,
        ]);
    }

    public function edit(Election $election){
        $positions = $election->positions()->get();
        
        return view('officer.editCandidates', [
            'heading' => 'Edit Candidates',
            'election' => $election,
            'positions' => $positions,
        ]);
    }

    public function update($cprofile, Request $request){
        $candidate = Candidate::where('id', $cprofile)->first();
        $dp = $request->file('displayPhoto') != null ?  $request->file('displayPhoto')->store('candidatePhoto', 'public') : "";
        $formFields = $request->validate([
            'platforms' => 'required'
        ]);
        if($formFields){
            Cprofile::where('candidate_id', $cprofile)->update(array_merge($formFields, ['updatedBy' => auth()->guard('officer')->user()->firstName . " " . auth()->guard('officer')->user()->lastName]));
        }
        if($dp){
            $candidate = Candidate::where('id', $cprofile)->first();
            $candidateUserDP = User::where('studentID', $candidate->studentID)->first()->displayPhoto;
            if($candidateUserDP != $candidate->cprofile()->first()->displayPhoto){
                File::delete('storage/'.$candidate->cprofile()->first()->displayPhoto);
            }
            Cprofile::where('candidate_id', $cprofile)->update(['displayPhoto' => $dp]);
        }   
        (new OfficerlogController)->store(auth()->guard('officer')->user()->firstName,auth()->guard('officer')->user()->lastName,'Updated profile of candidate: '. $candidate->studentID );
        return back()->with('successMessage', 'Candidate profile updated successfully');
    }
}
