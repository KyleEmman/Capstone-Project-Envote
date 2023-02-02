<?php

namespace App\Models;

use App\Models\Vote;
use App\Models\Election;
use App\Models\Position;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Voteinfo extends Model
{
    use HasFactory;
    protected $guarded = []; 
    public function vote(){
        return $this->belongsTo(Vote::class, 'vote_id');
    }
    public function election(){
        return $this->belongsTo(Election::class, 'election_id');
    }
    public function position(){
        return $this->belongsTo(Position::class, 'position_id');
    }
}
