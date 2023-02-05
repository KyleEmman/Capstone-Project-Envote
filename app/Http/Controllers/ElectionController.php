<?php

namespace App\Http\Controllers;

use PdfReport;
use App\Models\User;
use App\Models\Vote;
use App\Models\Election;
use App\Models\Electionarchive;
use App\Models\Position;
use App\Models\Template;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class ElectionController extends Controller
{
    public function store(Request $request){

        $electionFields = $request->validate([
            'title' => 'required',
            'campus' => 'required',
            'for' => 'required',
            'status' => 'required',
        ]);
        
        $isExisting = Election::where('title', $request->title)->first();
        $templatePositions = Template::find($request->template)->templateinfos()->get();
        if ($request->status == 'openForFiling') {
            if (Election::where('for', $request->for)->where('status', 'openForFIling')->where('campus', $request->campus)->first()) {
                return back()->with('errorMessage', 'There is an existing open for filing election for this campus');
            }
        }

        $createElection = Election::create($electionFields);
        if($createElection){
            foreach($templatePositions as $position){
                Position::create(['election_id' => $createElection->id, 'title' => $position->positionName]);
            }
            (new AdminlogController)->store(auth()->guard('admin')
            ->user()->firstName,auth()->guard('admin')->user()->lastName,'Created '.$request->title);
            return redirect('admin/elections')->with(['successMessage' => 'Election has been created!']);
        }
        

    }
    public function retrieve(Electionarchive $election){
        if ($election->status == 'Ongoing') {
            if (Election::where('for', $election->for)->where('campus', $election->campus)->where('status', 'Ongoing')->orWhere('status', 'Onhold')->first()) {
                return back()->with('errorMessage', 'There is an existing ongoing election for this campus');
            }
        }

        $electionField = [
            'id' => $election->id,
            'title' => $election->title,
            'campus' => $election->campus,
            'for' => $election->for,
            'status' => $election->status,
        ];

        $positions = $election->positions()->get(); 
        $votes = $election->votes()->get();
        $voteinfos = $election->voteinfos()->get();
        $certificates = $election->certificates()->get();

        $createElection = Election::create($electionField);
        $addPositions = (new PositionController)->store($positions);
        $addVotes = (new VoteController)->retrieve($votes);
        $addVoteinfos = (new VoteinfoController)->retrieve($voteinfos);
        $addCertificates = (new CertificateController)->retrieve($certificates);
        $addCandidatearchive = false;


        foreach ($positions as $position){
            $candidates = $position->candidates()->get();
            $addCandidatearchive = (new CandidateController)->retrieve($candidates);
        }
        
        if($addPositions && $addVotes && $addVotes && $addVoteinfos && $addCertificates && $addCandidatearchive){
            $deleteArchive = (new ElectionarchiveController)->destroy($election);

            (new AdminlogController)->store(auth()->guard('admin')
            ->user()->firstName,auth()->guard('admin')->user()->lastName,'retrieved '.$election->title);
            return back()->with('successMessage', 'Election has been retrieved!');
        }
        else{
            return back()->with('errorMessage', 'Election has not been retrieved!');
        }
    }


    public function editElection(Request $request){
        
        $electionField = [
            'title' => $request->electionTitle,
            'status' => $request->electionStatus,
        ];
        $electionCheck = Election::where('id', $request->electionID)->first();
        
        if($electionCheck->status == 'Ongoing' || $electionCheck->status == 'Onhold'){
            //this should be empty
        }
        else {
            if ($request->electionStatus == 'Ongoing') {
                if (Election::where('for', $electionCheck->for)->where('campus', $electionCheck->campus)->where('status', 'Ongoing')->orWhere('status', 'Onhold')->first()) {
                    return back()->with('errorMessage', 'There is an existing ongoing election for this campus');
                }
            }
        }
        if ($electionCheck) {
            $electionCheck->update($electionField);
        }
        // update
        foreach($request->positionName as $positionid => $position) {
            $positionCheck = Position::where('id', $positionid)->first();
            if ($positionCheck) {
                $positionCheck->update([
                    'title' => $position
                ]);
            }
        }
        (new AdminlogController)->store(auth()->guard('admin')
        ->user()->firstName,auth()->guard('admin')->user()->lastName,'Updated '.$request->electionTitle);
        return redirect('admin/elections')->with(['successMessage' => 'Election: ' . $request->electionTitle . ' updated Successfully']);
    }


    // AJAX CALL
    public function getDDElection($id){
        $campusDictionary = ['MA' => 'Malolos', 'OB' => 'Obando', 'PA' => 'Pandi', 'SJ' => 'San Jose', 'SM' => 'San Miguel'
        , 'BO' => 'Bocaue', 'SR' => 'San Rafael', 'AN' => 'Angat'];
        $idAlpha = substr($id, 0, 2);
        $yearLevel = User::where('studentID', $id)->first()->yearLevel;
        $forWhat = $yearLevel < 6 ? 'college' : 'shs';
        $elections = Election::where('status', 'openForFiling')
                                ->where('for', $forWhat)
                                ->where('campus', $campusDictionary[$idAlpha])->first();
        
        return response()->json($elections);
    }

    // vote now 
    public function showVoteNow(){
        $votes = Vote::all();

        $elections = Election::all();
        $campusDictionary = ['MA' => 'Malolos', 'OB' => 'Obando', 'PA' => 'Pandi', 'SJ' => 'San Jose', 'SM' => 'San Miguel'
        , 'BO' => 'Bocaue', 'SR' => 'San Rafael', 'AN' => 'Angat'];
        $idAlpha = substr(auth()->user()->studentID, 0, 2);
        $forWhat = auth()->user()->yearLevel < 6 ? 'college' : 'shs';
        $ongoing = $elections->where('status', 'Ongoing')->where('for', $forWhat)->where('campus', $campusDictionary[$idAlpha])->first();
        if(count($votes->where('studentID', auth()->user()->studentID)->where('election_id', $ongoing->id)) != 0){
            return redirect('/');
        }
        if($ongoing){
            return view('users.voteNow', [
                'heading' => 'Voting now...',
                'election' => $ongoing
            ]);
        }
        return redirect('/');
    }

    public function liveTally(Election $election){
        return view('officer.partials._liveTally', [
            'election' => $election,
            'votes' => Vote::all(),
        ]);
    }

    public function viewElectionsOfficer(){
        return view('officer.elections', [
            'heading' => 'Elections',
            'elections' => Election::latest()->filter(request(['search']))->get(),
        ]);
    }
    // generate report
    public function generateReport(Request $request){
        $election = Election::where('id', $request->id)->first();
      	$votes = Vote::all();
        return view('admin.electionResultsReport', [
            'heading' => $election->title,
            'election' => $election,
          	'votes' => $votes
        ]);
    }
    public function toggle(Election $election, Request $request) {
        $status = $election->status;
        if($request->toggler){
            $status = "Ongoing";
        }
        else if($request->toggler == null){
            $status = "Onhold";
        }
        $election->update([
            'status' => $status,
        ]);
        return back();
    }
   
}
