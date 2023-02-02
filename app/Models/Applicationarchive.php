<?php

namespace App\Models;

use App\Models\Positionarchive;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Applicationarchive extends Model
{
    use HasFactory;
    protected $guarded = []; 

    public function position(){
        return $this->belongsTo(Positionarchive::class, 'positionarchive_id');
    }

    public function scopeFilter($query, array $filters) {
        if($filters['campus'] ?? false){
            $query->where('studentID', 'like', '%' . request('campus') . '%' );
        }
        if($filters['status'] ?? false){
            $query->where('status', request('status'));
        }

        if($filters['search'] ?? false) {
            $query->where('studentID', 'like', '%' . request('search') . '%')
            ->orWhere('firstName', 'like', '%' . request('search') . '%')
            ->orWhere('middleName', 'like', '%' . request('search') . '%')
            ->orWhere('lastName', 'like', '%' . request('search') . '%')
            ->orWhere('program', 'like', '%' . request('search') . '%')
            ->orWhere('yearLevel', 'like', '%' . request('search') . '%')
            ->orWhere('section', 'like', '%' . request('search') . '%')
            ->orWhere('party', 'like', '%' . request('search') . '%')
            ->orWhere('status', 'like', '%' . request('search') . '%')
            ->orWhereHas('position', function($q){
                $q->where('title', 'like', '%' . request('search') . '%');
            });
        }
    }
}
