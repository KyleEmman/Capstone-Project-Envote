<?php

namespace App\Http\Controllers;

use App\Models\Cprofilearchive;
use Illuminate\Http\Request;

class CprofilearchiveController extends Controller
{
    public function store($cprofile){
        Cprofilearchive::create([
            'candidatearchive_id' => $cprofile->candidate_id,
            'displayPhoto' => $cprofile->displayPhoto,
            'platforms' => $cprofile->platforms,
            'updatedBy' => $cprofile->updatedBy,
            'created_at' => $cprofile->created_at,
            'updated_at' => $cprofile->updated_at,
        ]);
        return true;
    }
}
