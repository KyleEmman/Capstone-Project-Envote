<?php

namespace App\Models;

use App\Models\Voteinfo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Position extends Model
{
    use HasFactory;
    protected $guarded = []; 
    public function election(){
        return $this->belongsTo(Election::class, 'election_id');
    }
    public function candidates(){
        return $this->hasMany(Candidate::class, 'position_id');
    }
    public function applications(){
        return $this->hasMany(Application::class, 'position_id');
    }
    public function voteinfos(){
        return $this->hasMany(Voteinfo::class, 'position_id');
    }
}
