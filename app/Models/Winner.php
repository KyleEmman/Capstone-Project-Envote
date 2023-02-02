<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Election;
use App\Models\Result;

class Winner extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function election(){
        return $this->belongsTo(Election::class, 'election_id');
    }
    public function result(){
        return $this->belongsTo(Result::class, 'result_id');
    }
}
