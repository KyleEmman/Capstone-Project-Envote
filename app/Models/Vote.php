<?php

namespace App\Models;

use App\Models\Election;
use App\Models\Voteinfo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vote extends Model
{
    use HasFactory;
    protected $guarded = []; 
    public function election(){
        return $this->belongsTo(Election::class, 'election_id');
    }
    
    public function voteinfos(){
        return $this->hasMany(Voteinfo::class, 'vote_id');
    }
}
