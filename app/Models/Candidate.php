<?php

namespace App\Models;

use App\Models\Cprofile;
use App\Models\Position;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Candidate extends Model
{
    use HasFactory;

    protected $guarded = []; 

    public function position(){
        return $this->belongsTo(Position::class, 'position_id');
    }
    public function cprofile(){
        return $this->hasOne(Cprofile::class, 'candidate_id');
    }
}
