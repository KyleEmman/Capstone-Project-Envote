<?php

namespace App\Models;

use App\Models\Cprofilearchive;
use App\Models\Positionarchive;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Candidatearchive extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function position(){
        return $this->belongsTo(Positionarchive::class, 'positionarchive_id');
    }
    public function cprofile(){
        return $this->hasOne(Cprofilearchive::class, 'candidatearchive_id');
    }
}
