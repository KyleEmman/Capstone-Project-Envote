<?php

namespace App\Models;

use App\Models\Votearchive;
use App\Models\Positionarchive;
use App\Models\Voteinfoarchive;
use App\Models\Certificatearchive;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Electionarchive extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function positions(){
        return $this->hasMany(Positionarchive::class, 'electionarchive_id');
    }
    public function votes(){
        return $this->hasMany(Votearchive::class, 'electionarchive_id');
    }
    public function voteinfos(){
        return $this->hasMany(Voteinfoarchive::class, 'electionarchive_id');
    }
    public function certificates(){
        return $this->hasMany(Certificatearchive::class, 'electionarchive_id');
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
