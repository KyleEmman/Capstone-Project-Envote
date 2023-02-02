<?php

namespace App\Models;

use App\Models\Templateinfo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Template extends Model
{
    use HasFactory;
    protected $guarded = []; 
    public function templateinfos(){
        return $this->hasMany(Templateinfo::class, 'template_id');
    }
}
