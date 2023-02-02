<?php

namespace App\Http\Controllers;

use App\Models\Election;
use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function getDDPosition($id){
        $getPositions = Election::find($id)->positions()->get();
        return response()->json($getPositions);
    }

    public function store($positions){
        if($positions){
            foreach($positions as $position){
                Position::create([
                    'id' => $position->id,
                    'election_id' => $position->electionarchive_id,
                    'title' => $position->title,
                    'created_at' => $position->created_at,
                    'updated_at' => $position->updated_at,
                ]);
            }
        }
        return true;
    }

}
