<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailNotify;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function sendMail($positions, $election, $candidates){
        $user = auth()->user();
        $data = [
            'subject' => 'ENVote - Voting Receipt',
            'election' => $election,
            'positions' => $positions,
            'candidates' => $candidates
        ];
        try {
            Mail::to($user->email)->send(new MailNotify($data));
            return back();
        } catch (Exception $th) {
            return back()->with('errorMessage', 'Something Went Wrong');
        }
    }
}
