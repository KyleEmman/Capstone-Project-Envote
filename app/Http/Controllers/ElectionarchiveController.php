<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Election;
use App\Models\Votearchive;
use Illuminate\Http\Request;
use App\Models\Electionarchive;
use App\Models\Positionarchive;
use App\Http\Controllers\Controller;
use App\Http\Controllers\VotearchiveController;
use App\Http\Controllers\PositionarchiveController;
use App\Http\Controllers\VoteinfoarchiveController;
use App\Http\Controllers\CandidatearchiveController;
use App\Http\Controllers\ApplicationarchiveController;
use App\Http\Controllers\CertificatearchiveController;

class ElectionarchiveController extends Controller
{

    public function index(){
        $positions = Positionarchive::all();
        $votes = Votearchive::all();
        $users = User::all();
        $elections = Electionarchive::latest()->filter(request(['search', 'campus', 'status']))->paginate(request()->rows ? request()->rows : 8);
        return view('admin.electionsArchives', [
            'heading' => 'Elections',
            'elections' => $elections,
            'positions' => $positions,
            'votes' => $votes,
            'users' => $users,
        ]);
    }

    public function store(Election $election){
        $electionFields = [
            'id' => $election->id,
            'title' => $election->title,
            'campus' => $election->campus,
            'for' => $election->for,
            'status' => $election->status,
            'created_at' => $election->created_at,
            'updated_at' => $election->updated_at,
        ];
        $positions = $election->positions()->get();
        $votes = $election->votes()->get();
        $voteinfos = $election->voteinfos()->get();
        $certificates = $election->certificates()->get();
        

        // transfer
        Electionarchive::create($electionFields);
        $addPositionArchive = (new PositionarchiveController)->store($positions);
        $addVoteArchive = (new VotearchiveController)->store($votes);
        $addVoteinfosArchive = (new VoteinfoarchiveController)->store($voteinfos);
        $addCertificatesArchive = (new CertificatearchiveController)->store($certificates);
        $addCandidatesArchive = false;
        $addApplicationArchive = false;
        
        foreach($positions as $position){
            $candidates = $position->candidates()->get();
            $applications = $position->applications()->get();
            $addApplicationArchive = (new ApplicationarchiveController)->store($applications);
            $addCandidatesArchive = (new CandidatearchiveController)->store($candidates);
        }

        if($addPositionArchive && $addVoteArchive && $addVoteinfosArchive && $addCertificatesArchive && $addCandidatesArchive && $addApplicationArchive){
            $election->delete();
            (new AdminlogController)->store(auth()->guard('admin')
            ->user()->firstName,auth()->guard('admin')->user()->lastName,'Archived '.$election->title);
            return back()->with('successMessage', 'The election is now on archives table');
        }
        else {
            return back()->with('errorMessage', 'The election has failed to be on archives');
        }

    }

    public function destroy(Electionarchive $election){
        Electionarchive::find($election)->first()->delete();
        return back()->with('successMessage', 'Election has been permanently deleted!');
    }
}
