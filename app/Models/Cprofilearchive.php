<?php

namespace App\Models;

use App\Models\Candidatearchive;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cprofilearchive extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function candidate(){
        return $this->belongsTo(Candidatearchive::class, 'candidatearchive_id');
    }
}
