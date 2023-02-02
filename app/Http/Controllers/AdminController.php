<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Vote;
use App\Models\Admin;
use App\Models\Officer;
use App\Models\Student;
use App\Models\Election;
use App\Models\Position;
use App\Models\Template;
use App\Models\Candidate;
use App\Models\Application;
use Illuminate\Http\Request;
use App\Models\PasswordReset;
use App\Models\Electionarchive;
use App\Models\Applicationarchive;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\AdminlogController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ApplicationarchiveController;
use App\Models\Partylist;

class AdminController extends Controller
{
    public function index(){
        Carbon::setWeekStartsAt(Carbon::SUNDAY);
        Carbon::setWeekEndsAt(Carbon::SATURDAY);
        $carbon = new Carbon();
        $voters = User::all();
        $students = Student::all();
        $candidates = Candidate::all();
        $elections = Election::all();
        $applications = Application::all();
        $archivedApplications = Applicationarchive::all();
        return view('admin.dashboard', [
            'heading' => 'Dashboard',
            'voters' => $voters,
            'students' => $students,
            'candidates' => $candidates,
            'elections' => $elections,
            'carbon' => $carbon,
            'applications' => $applications,
            'archivedApplications' => $archivedApplications
        ]);
    }
    public function elections(){
        $positions = Position::all();
        $candidates = Candidate::all();
        $templates = Template::all();
        $votes = Vote::all();
        $users = User::all();
        $elections = Election::latest()->filter(request(['search', 'campus', 'status']))->paginate(request()->rows ? request()->rows : 8);
        return view('admin.elections', [
            'heading' => 'Elections',
            'elections' => $elections,
            'positions' => $positions,
            'candidates' => $candidates,
            'templates' => $templates,
            'votes' => $votes,
            'users' => $users,
        ]);
    }

    //show accounts db
    public function accounts(){
        $users = User::latest()->filter(request(['search','campus', 'program','year']))->paginate(request()->rows ? request()->rows : 8);
        $students = Student::all();
        return view('admin.accounts', [
            'heading' => 'Users',
            'users' => $users,
            'students' => $students,
        ]);
    }

    public function candidates(){
        $applications = Application::latest()->filter(request(['search', 'status', 'campus']))->paginate(request()->rows ? request()->rows : 8);
        $elections = Election::all();
        $partyLists = Partylist::all();
        return view('admin.candidates', [
            'heading' => 'Candidates',
            'applications' => $applications,
            'elections' => $elections,
            'partyLists' => $partyLists
        ]);
    }
    public function passwords(){
        $requests = PasswordReset::latest()->filter(request(['search', 'status', 'campus']))->paginate(request()->rows ? request()->rows : 8);
        $users = User::all();
        return view('admin.passwords', [
            'heading' => 'Password Resets',
            'requests' => $requests,
            'users' => $users,
        ]);
    }

    public function settings(){
        $admins = Admin::all();
        $officers = Officer::all();
        return view('admin.settings', [
            'heading' => 'Settings',
            'admins' => $admins,
            'officers' => $officers
        ]);
    }
    // this is called on usercontroller to check it first before loging a student
    public function authenticate(Request $request){
        $username = $request->username;
        $password = $request->password;

        $creds = [
            'username' => $username,
            'password' => $password,
        ];
        $credsCheck = (auth()->guard('admin')->attempt($creds));
        if($credsCheck){
            $request->session()->regenerate();
            (new AdminlogController)->store(auth()->guard('admin')->user()->firstName,auth()->guard('admin')->user()->lastName,'Logged in');
            return true;
        }
        return false;
    }


    // logout button admin
    public function logout(Request $request) {
        (new AdminlogController)->store(auth()->guard('admin')->user()->firstName,auth()->guard('admin')->user()->lastName,'Logged out');
        auth()->guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->with('message', 'You have been logged out!');

    }

    // change admin details
    public function settingsChangeAdminDetails(Request $request) {
        $adminAcc = Admin::where('id', auth()->guard('admin')->user()->id)->first();

        $firstName = $request->firstName ? ['firstName' => 'required'] : [];
        $lastName = $request->lastName ? ['lastName' => 'required'] : [];
        $username = $request->username ? ['username' => 'required | min:8'] : [];

        $formUnvalidated = [];

        $formUnvalidated = array_merge($formUnvalidated, $firstName, $lastName, $username);

        $formFields = $request->validate($formUnvalidated);

        if(!$formFields) {
            return back()->withErrors(['Required' => 'Fields are required']);
        }
        else {
            $updateData = array_merge($request->firstName ? ['firstName' => $request->firstName] : [],
            $request->lastName ? ['lastName' => $request->lastName] : [],
            $request->username ? ['username' => $request->username] : []);

            $adminAcc->update($updateData);
            (new AdminlogController)->store(auth()->guard('admin')->user()->firstName,auth()->guard('admin')->user()->lastName,'Updated admin profile');
            return redirect("/admin/settings")->with('successMessage', 'Updated successfully!');
        }
        
    }

    // change admin password form
    public function settingsChangeAdminPassword(Request $request){
        $adminAcc = Admin::where('id', auth()->guard('admin')->user()->id)->first();

        $formFields = $request->validate([
            'currentPassword' => 'required',
            'password' => 'required|confirmed|min:8'
        ]);

        if($formFields){
            if(Hash::check($request->currentPassword, auth()->guard('admin')->user()->password)){
                $adminAcc->update(['password' => bcrypt($request->password)]);
                (new AdminlogController)->store(auth()->guard('admin')->user()->firstName,auth()->guard('admin')->user()->lastName,'Changed admin password');
                return redirect('/admin/settings')->with('successMessage', 'Password changed successfully!');
            }
            else{
                return back()->withErrors(['currentPassword' => 'Wrong Password']);
            }
        }

    }

    //resetPassword
    public function resetPassword(Request $request){
        if(!(auth()->guard('admin')->check())) {
            abort(403, 'Unauthorized Action');
        }
        $defaultPassword = 'admin_BPC1971';
        $adminAcc = Admin::where('id', $request->adminID)->first();
        $adminName = $adminAcc->username;
        $adminAcc->update([
            'password' => bcrypt($defaultPassword)
        ]);
        (new AdminlogController)->store(auth()->guard('admin')->user()->firstName,auth()->guard('admin')->user()->lastName,'Password reset for '. $adminName);
        return redirect('admin/settings')->with(['successMessage' => 'Password reset for username: '.$adminName.' is successful']);

    }

    //admin change photo
    public function adminChangePhoto(Request $request){
        $adminAcc = Admin::where('id', auth()->guard('admin')->user()->id)->first();
        $rules = $request->validate([
            'adminPhoto' => 'mimes:jpeg,jpg,png,gif|required|max:50000'
        ]);
        if ($rules) {
            $dp = $request->file('adminPhoto')->store('adminPhotos', 'public');
            if(auth()->guard('admin')->user()->displayPhoto != null || auth()->guard('admin')->user()->displayPhoto != ""){
                File::delete('storage/'.auth()->guard('admin')->user()->displayPhoto);
            }
            $adminAcc->update([
                'displayPhoto' => $dp
            ]);
            (new AdminlogController)->store(auth()->guard('admin')->user()->firstName,auth()->guard('admin')->user()->lastName,'Updated admin display photo');
            return redirect('admin/settings')->with(['successMessage' => 'Photo changed successfully']);
        }
    }

    //admin add account accounts page
    public function adminAddUser(Request $request) {
        $id = $request->studentID;
        $isExisting = User::where('studentID', $id)->first();
        $studentQ = Student::where('studentID', $id)->first();
        if ($studentQ && !$isExisting) {
            $studentAdditionalDetails = [
                'firstName' => $studentQ->firstName,
                'middleName' => $studentQ->middleName,
                'lastName' => $studentQ->lastName,
                'program' => $studentQ->program,
                'yearLevel' => $studentQ->yearLevel,
                'section' => $studentQ->section,
                'birthDate' => $studentQ->birthDate,
            ];
            User::create(array_merge(['studentID' => $request->studentID,'password' => bcrypt($request->password)], $studentAdditionalDetails));
            (new AdminlogController)->store(auth()->guard('admin')->user()->firstName,auth()->guard('admin')->user()->lastName,'Added user: '.$id );
            return redirect('admin/accounts')->with(['successMessage' => 'user added successfully']);
        }
        else if ($isExisting){
            (new AdminlogController)->store(auth()->guard('admin')->user()->firstName,auth()->guard('admin')->user()->lastName,'Attempt to add user: '.$id );
            return back()->withErrors(['studentID' => 'ID already exists']);
        }
        else {
            (new AdminlogController)->store(auth()->guard('admin')->user()->firstName,auth()->guard('admin')->user()->lastName,'Attempt to add user: '.$id );
            return back()->withErrors(['studentID' => 'ID does not exist']);
        }
        

    }

    //pending application checker
    public function pendingChecker($request, $status) {
        $failed = array();
        $adder = new CandidateController;
        foreach($request as $id) {
            $application = Application::where('id', strval($id))->first();
            if ($application->status == 'pending') {
                if ($status == 'accepted') {
                    $application = Application::where('id', $id)->first();
                    $adder->store($application);
                }
                else if ($status == 'rejected') {
                    $application = Application::where('id', $id)->first();
                    $application->update([
                        'status' => 'rejected'
                    ]);
                }
                $application->update(['status' => $status]);
            }
            else {
                $failed[] = $application->studentID;
            }
        }
        return $failed;
    }

    //multi accept application admin
    public function multiAccept(Request $request) {
        $failed = (new AdminController)->pendingChecker($request->id, 'accepted');
        if (!$failed) {
            return back()->with('successMessage', "Applications accepted successfully");
        }
        else {
            return back()->with('successMessage', 'All applications are accepted except for the following students: ' . implode(", ", $failed));
        }
        (new AdminlogController)->store(auth()->guard('admin')->user()->firstName,auth()->guard('admin')->user()->lastName,'Accepted Multiple Candidate Applications');
    }
    //multi reject application admin
    public function multiReject(Request $request) {
        $failed = (new AdminController)->pendingChecker($request->id, 'rejected');
        if (!$failed) {
            return back()->with('successMessage', "Applications rejected successfully!");
        }
        else {
            return back()->with('successMessage', 'All applications are rejected except for the following students: ' . implode(", ", $failed));
        }
        (new AdminlogController)->store(auth()->guard('admin')->user()->firstName,auth()->guard('admin')->user()->lastName,'Rejected Multiple Candidate Applications');
    }
    //multi archive application admin
    public function multiArchive(Request $request) {
        $archiver = new ApplicationarchiveController();
        foreach($request->id as $id) {
            $application = Application::where('id', $id)->first();
            $archiver->store1($application);
        }
        (new AdminlogController)->store(auth()->guard('admin')->user()->firstName,auth()->guard('admin')->user()->lastName,'Archived Multiple Candidate Applications');
        return back()->with('successMessage', "Applications archived successfully!");
    }
    //multi retrieve application admin
    public function multiRetrieve(Request $request) {
        $failed = array();
        $retriever = new ApplicationController();
        foreach($request->id as $id) {
            $application = Applicationarchive::where('id', $id)->first();
            $retriever->retrieve($application);
            $failed[] = session('studentID1');
        }
        if (!$failed) {
            return back()->with('successMessage', "Applications retrieved successfully!");
        }
        else {
            return back()->with('successMessage', "Applications retrieved successfully except for the following students: " . implode(", ", array_filter($failed)));
        }
        (new AdminlogController)->store(auth()->guard('admin')->user()->firstName,auth()->guard('admin')->user()->lastName,'Retrieved Multiple Applications');
    }
    //multi delete application admin
    public function multiDelete(Request $request) {
        $deleter = new ApplicationarchiveController();
        foreach($request->id as $id) {
            $application = Applicationarchive::where('id', $id)->first();
            $deleter->destroy($application);
        }
        (new AdminlogController)->store(auth()->guard('admin')->user()->firstName,auth()->guard('admin')->user()->lastName,'Deleted Multiple Candidates');
        return back()->with('successMessage', "Applications deleted successfully!");
    }
    

}
