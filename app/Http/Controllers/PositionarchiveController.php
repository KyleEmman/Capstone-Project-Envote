<?php

namespace App\Http\Controllers;

use App\Models\Positionarchive;
use Illuminate\Http\Request;

class PositionarchiveController extends Controller
{
    public function store($positions){
        foreach($positions as $position){
            Positionarchive::create([
                'id' => $position->id,
                'electionarchive_id' => $position->election_id,
                'title' => $position->title,
                'created_at' => $position->created_at,
                'updated_at' => $position->updated_at
            ]);
        }
        return true;
    }

}
