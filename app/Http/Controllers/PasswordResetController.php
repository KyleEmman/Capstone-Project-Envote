<?php

namespace App\Http\Controllers;

use App\Models\PasswordResetArchive;
use App\Models\PasswordReset;
use App\Http\Controllers\PasswordResetArchiveController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Http\Request;

class PasswordResetController extends Controller
{
    public function retrieve($id){
        $archive = PasswordResetArchive::find($id);
        PasswordReset::create([
            'id' => $archive->id,
            'username' => $archive->username,
            'reason' => $archive->reason,
            'proof' => $archive->proof,
            'status' => $archive->status,
            'created_at' => $archive->created_at,
        ]);
        $archive->delete();
        (new AdminlogController)->store(auth()->guard('admin')
        ->user()->firstName,auth()->guard('admin')->user()->lastName,'Retrieved a password reset request');
        return back()->with('successMessage', 'A password reset request has been retrieved!');
    }
    // accept multiple password resets admin
    public function multiAccept(Request $request) {
        $failed = array();
        $accepter = new UserController();
        foreach($request->id as $id) {
            $PR = PasswordReset::where('id', $id)->first();
            if ($PR->status != 'pending') {
                $failed[] = $PR->username;
            }
            else {
                $studentID = $PR->username;
                $user = User::where('userID', $id)->first();
                if ($user) {
                    $accepter->resetPasswordReuse($user);
                    $PR->update(['status' => 'Password Reset Success']);
                }
            }
        }
        (new AdminlogController)->store(auth()->guard('admin')
        ->user()->firstName,auth()->guard('admin')->user()->lastName,'Accepted multiple password request');
        return back()->with('successMessage', 'Requests accepted successfully except for the following students: ' . implode(", ", $failed));
    }
    // reject multiple password resets admin
    public function multiReject(Request $request) {
        $failed = array();
        foreach($request->id as $id) {
            $PR = PasswordReset::where('id', $id)->first();
            if ($PR->status != 'pending') {
                $failed[] = $PR->username;
            }
            else {
                $PR->update(['status' => 'Rejected']);
            }
        }
        (new AdminlogController)->store(auth()->guard('admin')
        ->user()->firstName,auth()->guard('admin')->user()->lastName,'Rejected multiple password request');
        return back()->with('successMessage', 'Requests rejected successfully except for the following students: ' . implode(", ", $failed));
    }
    // archive multiple password resets admin
    public function multiArchive(Request $request) {
        $archiver = new PasswordResetArchiveController();
        foreach($request->id as $id) {
            $archiver->store($id);
        }
        (new AdminlogController)->store(auth()->guard('admin')
        ->user()->firstName,auth()->guard('admin')->user()->lastName,'Archived multiple password request');
        return back()->with('successMessage', 'Requests archived successfully');
    }
    // retrieve multiple password resets admin
    public function multiRetrieve(Request $request) {
        foreach($request->id as $id) {
            (new PasswordResetController)->retrieve($id);
        }
        (new AdminlogController)->store(auth()->guard('admin')
        ->user()->firstName,auth()->guard('admin')->user()->lastName,'Retrieved multiple password request');
        return back()->with('successMessage', 'Requests retrieved successfully');
    }
    // delete multiple password resets admin
    public function multiDelete(Request $request) {
        $destroyer = new PasswordResetArchiveController();
        foreach($request->id as $id) {
            $destroyer->destroy($id);
        }
        (new AdminlogController)->store(auth()->guard('admin')
        ->user()->firstName,auth()->guard('admin')->user()->lastName,'Deleted multiple password request');
        return back()->with('successMessage', 'Requests deleted successfully');
    }
    
}
