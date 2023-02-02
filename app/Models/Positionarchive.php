<?php

namespace App\Models;

use App\Models\Voteinfo;
use App\Models\Candidate;
use App\Models\Electionarchive;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Positionarchive extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function election(){
        return $this->belongsTo(Electionarchive::class, 'electionarchive_id');
    }
    public function application(){
        return $this->hasMany(Applicationarchive::class, 'positionarchive_id');
    }
    public function candidates(){
        return $this->hasMany(Candidatearchive::class, 'positionarchive_id');
    }
    public function voteinfos(){
        return $this->hasMany(Voteinfoarchive::class, 'positionarchive_id');
    }
}
