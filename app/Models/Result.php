<?php

namespace App\Models;

use App\Models\Election;
use App\Models\Winner;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function election(){
        return $this->belongsTo(Election::class, 'election_id');
    }

    public function winners(){
        return $this->hasMany(Winner::class, 'result_id');
    }

    
}
