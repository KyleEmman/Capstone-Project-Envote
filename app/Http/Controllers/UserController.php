<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vote;
use App\Models\Student;
use App\Models\Election;
use App\Models\Position;
use App\Models\Announcement;
use App\Models\Certificate;
use Illuminate\Http\Request;
use App\Models\PasswordReset;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // show index page
    public function index(){
        $elections = Election::all();
        return view('client.index', [
            'heading' => 'Bulacan Polytechnic College - Envote',
            'announcements' => Announcement::all(),
            'elections' => $elections,
        ]);
    }

    // show upcoming elections
    public function upcomingElections(){
        $elections = Election::latest()->filter(request(['search']));
        return view('users.upcoming', [
            'heading' => 'Upcoming Elections',
            'elections' => $elections,
        ]);
    }

    // go to specific upcoming election
    public function upcomingElection($id){
        $election = Election::where('id', $id)->first();
        $positions = $election->positions;
        return view('users.upcomingElection', [
            'heading' => $election->title,
            'election' => $election,
            'positions' => $positions
        ]);
    }

     // show results of elections
     public function electionResults(){
        $elections = Election::latest()->filter(request(['search']));
        return view('users.results', [
            'heading' => 'Election Results',
            'elections' => $elections,
        ]);
    }

    // go to specific election result
    public function electionResult($id){
        $election = Election::where('id', $id)->first();
        $positions = $election->positions;
        return view('users.electionResult', [
            'heading' => $election->title,
            'election' => $election,
            'positions' => $positions
        ]);
    }

    // show login form
    public function login(){
        return view('users.login', [
            'heading' => 'Bulacan Polytechnic College - Envote Login'
        ]);
    }

    // show change password field
    public function changePasswordShow(){
        $sessionSID = session('studentID');
        if(!$sessionSID){
            return redirect('/login');
        }
        return view('users.changePassword', [
            'heading' => 'Change Password'
        ]);
    }

    // this is just a function for login
    public function loginProceed($request, $student, $isExisting){
        $SID = $student[0]->studentID;
        $firstName = ucfirst($student[0]->firstName)." ";
        $MI = "";
        $DP = "";
        if($student[0]->middleName == null || strtolower($student[0]->middleName) == "n/a"){
            $MI = "";
        }
        else{
            $MI = mb_substr(ucfirst($student[0]->middleName), 0,1).". ";
        }
        $lastName = ucfirst($student[0]->lastName);
        $program = $student[0]->program;
        $yearSection = $student[0]->yearLevel." - ".$student[0]->section;
        $email = $student[0]->email ?? '';
        $sessionProfile = [
            'studentID' => $SID,
            'fullName' => $firstName.$MI.$lastName,
            'displayPhoto' => $DP,
            'program' => $program,
            'yearSection' => $yearSection,
            'email' => $email
        ];

        $request->session()->regenerate();
        session(['profile' => $sessionProfile]);
    }

    // authenticate login
    public function authenticate(Request $request){
        // authenticate if admin, if not, it continues
        $isAdmin = app('App\Http\Controllers\AdminController')->authenticate($request);
        if($isAdmin){
            return redirect('admin/dashboard');
        }
        $isOfficer = app('App\Http\Controllers\OfficerController')->authenticate($request);
        // authenticate if officer, if not, it continues
        if($isOfficer){
            return redirect('/officer');
        }

        $origPassword = $request->password;
        $request->password = bcrypt($request->password);
        $formFieldsUser = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        $formFieldsCDB = $request->validate([
            'username' => 'required'
        ]);

        $formFieldsUser['studentID'] = $formFieldsUser['username'];
        unset($formFieldsUser['username']);

        $student = Student::find($formFieldsCDB);
        $centralDB = ($student);
        $isExisting = (User::where('studentID', $formFieldsCDB)->first());
        $credentialsCheck = (auth()->attempt($formFieldsUser));
        
        if(count($centralDB) == 0){
            return back()->withErrors(['password' => 'Records does not match']);
        }
        // if first time login
        else if(!$isExisting){
            //default password == can change anytime
            $defaultPassword = $student[0]->program.$student[0]->yearLevel.$student[0]->section.$student[0]->birthDate;
            if ($origPassword == $defaultPassword){
                session(['studentID' => $student[0]->studentID]);
                return redirect('/login/changePassword');
            }
            else{
                return back()->withErrors(['password' => 'Records does not match']);
            }
        }

        $userCheck = User::where('studentID', $student[0]->studentID)->first();
        $defaultPassword = $student[0]->program.$student[0]->yearLevel.$student[0]->section.$student[0]->birthDate;
        // if password was reset
        if($origPassword == $defaultPassword && $userCheck->password == null){
            session(['studentID' => $student[0]->studentID]);
            return redirect('/login/changePassword');
        }
        else if($credentialsCheck){     
            UserController::loginProceed($request, $student, $isExisting);
            return redirect('/');
        }
        else {   
            return back()->withErrors(['password' => 'Records does not match']);
        }

    }

    // change password function account
    public function create(Request $request){
        $userCheck = User::where('studentID', session('studentID'))->first();
        $student = [Student::where('studentID', session('studentID'))->first()];
        

        $formFields = $request->validate([
            'password' => 'required|confirmed|min:8'
        ]);
        $studentID = session('studentID');

        $request->request->add(['studentID' => $studentID]);
        $userCreateData = [
            'studentID' => $studentID,
            'password' => bcrypt($request->password)
        ];
        
        if(!$formFields){
            return back()->withErrors('Something went wrong...');
        }
        else {
            // Create User and login
            if(!$userCheck){
                $studentQ = Student::where('studentID', session('studentID'))->first();
                $studentAdditionalDetails = [
                    'firstName' => $studentQ->firstName,
                    'middleName' => $studentQ->middleName,
                    'lastName' => $studentQ->lastName,
                    'program' => $studentQ->program,
                    'yearLevel' => $studentQ->yearLevel,
                    'section' => $studentQ->section,
                    'birthDate' => $studentQ->birthDate,
                ];
                $user = User::create(array_merge($userCreateData,$studentAdditionalDetails));
                auth()->login($user);
                UserController::loginProceed($request,$student,$userCheck);
                return redirect('/');
            }
            //update user and login
            else{
                $user = User::where('studentID', $studentID)->first();
                $userCheck->where('studentID', $studentID)->update($userCreateData);
                auth()->login($user);
                UserController::loginProceed($request,$student,$userCheck);
                return redirect('/');
            }
        }
    }

    // Logout User
    public function logout(Request $request) {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('message', 'You have been logged out!');

    }

    //show voterside profile
    public function show(){
        $user = auth()->user();
        return view('users.profile', [
            'heading' => 'Bulacan Polytechnic College - Envote Profile',
            'cert' => Certificate::all(),
            'user' => $user,
        ]);
    }

    //change profile password
    public function profileChangePassword(Request $request){
        $user = User::where('studentID', $request->studentID)->first();
        $formFields = $request->validate([
            'currentPassword' => 'required',
            'newPassword' => 'required|min:8'
        ]);

        if (!(Hash::check($request->currentPassword, $user->password))){
            return back()->withErrors(['wrongPassword' => 'Password does not match']);
        }
        else if ($formFields) {
            
            $newPass = bcrypt($request->newPassword);
    
            $user->update([
                'password' => $newPass
            ]);
            return redirect('/profile')->with('successMessage' , 'Password changed successfully');
            
        }
    }

    //change profile picture
    public function changeProfilePicture(Request $request){
        $user = User::where('studentID', $request->studentID)->first();
        
        $rules = $request->validate([
            'upload' => 'mimes:jpeg,jpg,png,gif|required|max:50000'
        ]);

        if($rules){

            $dp = $request->file('upload')->store('profilePics', 'public');
            $user->update([
                'displayPhoto' => $dp
            ]);
            if(auth()->user()->displayPhoto != null || auth()->user()->displayPhoto != ""){
                File::delete('storage/'.auth()->user()->displayPhoto);
            }
            session(['profile.displayPhoto' => $dp]);
            return redirect('/profile')->with('successMessage', 'Profile photo changed successfully');
        }
    }

    //show forgot passwrod form
    public function forgotPassword(){
        return view('users.forgotPassword', [
            'heading' => 'Forgot Password'
        ]);
    }

    // forgot password action submit
    public function retrieve(Request $request){
        $users = User::where('studentID', $request->username)->first();
        if(!$users){
            return back()->withErrors(['username' => "Sorry, username does not exist"]);
        }
        $formFields = $request->validate([
            'username' => 'required',
            'reason' => 'required',
        ]);
        $request->validate([
            'proof' => 'mimes:jpeg,jpg,png,gif|required|max:50000'
        ]);
        $dp = $request->file('proof')->store('resetPasswordProofs', 'public');

        if($formFields){
            PasswordReset::create(array_merge($formFields, ['proof' => $dp]));
            
            return redirect('/login')->with(['successMessage' => 'Your request have been queued!, Please wait for 2-3 days to reset your password']);
        }
    }

    // admin change user password
    public function adminChangeUserPass(Request $request) {
        $studentCheck = User::where('studentID', $request->studentID)->first();
        if ($studentCheck) {
            $studentCheck->update([
                'password' => bcrypt($request->editPass)
            ]);
            return redirect('admin/accounts')->with(['successMessage' => 'User with the id ' . $request->studentID . ': Password changed successfully']);
        }
    }   

    // admin reset user password
    public function adminResetUserPass(Request $request) {
        $studentCheck = User::where('studentID', $request->studentID)->first();
        $reset = (new UserController)->resetPasswordReuse($studentCheck);

        if($reset){
            return redirect('/admin/accounts')->with(['successMessage' => 'User with the id ' . $request->studentID . ': Password reset successfully']);
        }
        else{
            return back()->with('errorMessage', "Password reset failed");
        }
    }

    //reset password request on password resets
    public function resetPasswordRequest(Request $request){
        $PR = PasswordReset::where('id', $request->id);

        $PR->update(['status' => 'Password Reset Success']);
        
        UserController::adminResetUserPass($request);
        return redirect('/admin/passwords');
    }

    // reject password request reset
    public function rejectPasswordRequest(Request $request){
        $PR = PasswordReset::where('id', $request->id);

        $PR->update(['status' => 'Rejected']);
        return redirect('/admin/passwords');
    }

    // ongoing elections
    public function ongoingElections(Request $request){
        
        return view('users.ongoingElections', [
            'heading' => 'Ongoing Elections',
        ]);
    }
    public function resetPasswordReuse($studentCheck){
        if ($studentCheck) {
            $studentCheck->update([
                'password' => ""
            ]);
            return true;
        }
    }

    
    public function multiResetPassword(Request $request){
        foreach($request->id as $id){
            $user = User::where('userID', $id)->first();
            (new UserController)->resetPasswordReuse($user);
        }
        (new AdminlogController)->store(auth()->guard('admin')
        ->user()->firstName,auth()->guard('admin')->user()->lastName,'Accepted a password request');
        return back()->with('successMessage', "Password Resets Successful!");
    }

    public function changeProfileEmail(Request $request){
        $user = User::where('studentID', $request->studentID)->first();
        $email = $request->email;
        $user->update([
            'email' => $email
        ]);
        return back()->with('successMessage', 'Email changed successfully');
    }
    
}
