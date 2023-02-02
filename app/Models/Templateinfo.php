<?php

namespace App\Models;

use App\Models\Template;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Templateinfo extends Model
{
    use HasFactory;
    protected $guarded = []; 
    public function template(){
        return $this->belongsTo(Template::class, 'template_id');
    }
}
