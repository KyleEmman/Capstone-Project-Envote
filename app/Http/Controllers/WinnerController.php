<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Winner;

class WinnerController extends Controller
{
    public function store($winner, $result_id, $election_id){
        $fields = [
            'result_id' => $result_id,
            'election_id' => $election_id,
            'positionTitle' => $winner->position->title ?? $winner,
            'firstName' => $winner->firstName ?? null,
            'middleName' => $winner->middleName ?? null,
            'lastName' => $winner->lastName ?? null,
            'party' => $winner->party ?? null,
            'program' => $winner->program ?? null,
            'year' => $winner->yearLevel ?? null,
            'section' => $winner->section ?? null,
            'voteCount' => $winner->votes ?? null

        ];
        Winner::create($fields);
    }
}
