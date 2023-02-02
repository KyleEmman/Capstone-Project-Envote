<?php

namespace App\Models;

use App\Models\Vote;
use App\Models\Voteinfo;
use App\Models\Winner;
use App\Models\Result;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Election extends Model
{
    use HasFactory;

    protected $guarded = []; 

    public function positions(){
        return $this->hasMany(Position::class, 'election_id');
    }
    public function votes(){
        return $this->hasMany(Vote::class, 'election_id');
    }
    public function voteinfos(){
        return $this->hasMany(Voteinfo::class, 'election_id');
    }
    public function certificates(){
        return $this->hasMany(Certificate::class, 'election_id');
    }

    public function winners(){
        return $this->hasMany(Winner::class, 'election_id');
    }

    public function Result(){
        return $this->hasOne(Result::class, 'election_id');
    }

    public function scopeFilter($query, array $filters) {
        if($filters['campus'] ?? false){
            $query->where('campus', request('campus'));
        }
        if($filters['status'] ?? false){
            $query->where('status', request('status'));
        }
        if($filters['search'] ?? false) {
            $query->where(function($q){
                $q->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('campus', 'like', '%' . request('search') . '%')
                ->orWhere('for', 'like', '%' . request('search') . '%')
                ->orWhere('status', 'like', '%' . request('search') . '%');
            }
            );
        }
    }

}
