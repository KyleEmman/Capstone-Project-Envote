<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\PasswordReset;
use App\Models\PasswordResetArchive;

class PasswordResetArchiveController extends Controller
{
    public function index(){
        return view('admin.passwordsArchives', [
            'heading' => 'Password Resets Archive',
            'requests' => PasswordResetArchive::latest()->filter(request(['search', 'status', 'campus']))->paginate(request()->rows ? request()->rows : 8),
            'users' => User::all(),
        ]);
    }

    public function store($passwordReset){
        $PasswordReset = PasswordReset::find($passwordReset);
        PasswordResetArchive::create([
            'id' => $PasswordReset->id,
            'username' => $PasswordReset->username,
            'reason' => $PasswordReset->reason,
            'proof' => $PasswordReset->proof,
            'status' => $PasswordReset->status,
            'created_at' => $PasswordReset->created_at,
        ]);
        $PasswordReset->delete();
        (new AdminlogController)->store(auth()->guard('admin')
        ->user()->firstName,auth()->guard('admin')->user()->lastName,'Archived a password reset request');
        return back()->with('successMessage', 'A password reset request has been archived!');
    }

    public function destroy($id){
        PasswordResetArchive::find($id)->delete();

        return back()->with('successMessage', 'A password reset request has been deleted permanently!');
    }
}
