<?php

namespace App\Http\Controllers;

use App\Http\Controllers\OfficerlogController;
use App\Models\Officer;
use App\Models\Election;
use App\Models\Announcement;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class OfficerController extends Controller
{
    public function index(){
        $electionsOngoing = Election::where('status', 'Ongoing')->get();
        return view('officer.index', [
            'heading' => 'Ongoing Elections',
            'electionsOngoing' => $electionsOngoing,
        ]);
    }

    public function authenticate(Request $request){
        $username = $request->username;
        $password = $request->password;

        $creds = [
            'username' => $username,
            'password' => $password,
        ];
        $credsCheck = (auth()->guard('officer')->attempt($creds));
        if($credsCheck){
            $request->session()->regenerate();
            (new OfficerlogController)->store(auth()->guard('officer')->user()->firstName,auth()->guard('officer')->user()->lastName,'Logged in');
            return true;
        }
        return false;
    }
    // logout button admin
    public function logout(Request $request) {
        (new OfficerlogController)->store(auth()->guard('officer')->user()->firstName,auth()->guard('officer')->user()->lastName,'Logged out');
        auth()->guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('message', 'You have been logged out!');
    }

    // reset officer password
    public function resetOfficerPassword(Request $request){
        if(!(auth()->guard('admin')->check())) {
            abort(403, 'Unauthorized Action');
        }
        $defaultPassword = 'officer_BPC1971';
        $officerAcc = Officer::where('id', $request->officerID)->first();
        $officerName = $officerAcc->username;
        $officerAcc->update([
            'password' => bcrypt($defaultPassword)
        ]);
        (new AdminlogController)->store(auth()->guard('admin')->user()->firstName,auth()->guard('admin')->user()->lastName,'Reset password of officer: ' . $officerName);
        return redirect('admin/settings')->with(['successMessage' => 'Password reset for username: '.$officerName.' is successful']);
    }

    // create an officer
    public function store(Request $request){
        $defaultPassword = bcrypt("officer_BPC1971");
        $concatPassword = ['password' => $defaultPassword];
        $officerCheck = Officer::where('username', $request->username)->first();
        $formFields = $request->validate([
            'username' => 'required',
            'firstName' => 'required',
            'lastName' => 'required'
        ]);
        if ($officerCheck) {
            return back()->with('errorMessage', 'Existing Username');
        }
        if($formFields){
            Officer::create(array_merge($formFields,$concatPassword));
            return redirect('/admin/settings')->with(['successMessage' => 'Officer added successfully!']);
        }
    }

    // delete an officer
    public function destroy(Officer $officer){
        if(!(auth()->guard('admin')->check())) {
            abort(403, 'Unauthorized Action');
        }
        $username = $officer->username;
        $officer->delete();
        return redirect('admin/settings')->with(['successMessage' => 'Officer '.$username.' successfully deleted!']);
    }

    // officer settings
    public function settings() {
        $officer = auth()->guard('officer')->user();
        return view('officer.settings', [
            'heading' => 'Settings',
            'officer' => $officer,
        ]);
    }

    // change details
    public function changeDetails(Request $request){
        $officer = auth()->guard('officer')->user();
        $id = $officer->id;
        $firstName = $request->firstName ?? $officer->firstName;
        $lastName = $request->lastName ?? $officer->lastName;
        $username = $request->username ?? $officer->username;
        $details = [
            'firstName' => $firstName,
            'lastName' => $lastName,
            'username' => $username
        ];
        Officer::where('id', $id)->first()->update($details);
        (new OfficerlogController)->store(auth()->guard('officer')->user()->firstName,auth()->guard('officer')->user()->lastName,'Changed officer details: '.$id );
        return redirect('/officer/settings')->with('successMessage', 'Details changed successfully');
    }
    
    // change password
    public function changePassword(Request $request){
        $officer = auth()->guard('officer')->user();
        $id = $officer->id;
        if (!(Hash::check($request->currentPassword, $officer->password))){
            return back()->withErrors(['wrongPassword' => 'Password does not match']);
        }
        if ($request->newPassword != $request->confirmPassword) {
            return back()->withErrors(['confirmPassword' => 'Passwords do not match']);
        }
        $newpass = bcrypt($request->newPassword);
        Officer::where('id', $id)->first()->update([
            'password' => $newpass
        ]);
        (new OfficerlogController)->store(auth()->guard('officer')->user()->firstName,auth()->guard('officer')->user()->lastName,'Changed officer password');
        return redirect('/officer/settings')->with('successMessage', 'Password changed successfully');
    }

    // change photo officer
    public function changePhoto(Request $request){
        $officer = auth()->guard('officer')->user();
        $id = $officer->id;
        $rules = $request->validate([
            'officerPhoto' => 'mimes:jpeg,jpg,png,gif|required|max:50000'
        ]);
        if ($rules) {
            $dp = $request->file('officerPhoto')->store('officerPhotos', 'public');
            if($officer->displayPhoto != null || $officer->displayPhoto != ""){
                File::delete('storage/'.$officer->displayPhoto);
            }
            Officer::where('id', $id)->first()->update([
                'displayPhoto' => $dp
            ]);
            (new OfficerlogController)->store(auth()->guard('officer')->user()->firstName,auth()->guard('officer')->user()->lastName,'Changed officer photo');
            return redirect('/officer/settings')->with('successMessage', 'Photo changed successfully');
        }
        else {
            return redirect('/officer/settings')->with('successMessage', 'Invalid Image');
        }
    }

    

}
