<?php

namespace App\Models;

use App\Models\Electionarchive;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Certificatearchive extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function election(){
        return $this->belongsTo(Electionarchive::class, 'electionarchive_id');
    }
}
