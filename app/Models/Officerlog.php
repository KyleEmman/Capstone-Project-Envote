<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Officerlog extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scopeFilter($query, array $filters){
        if($filters['search'] ?? false){
            $query->where('officer', 'like', '%' . request('search') . '%')
                ->orWhere('activity', 'like', '%' . request('search') . '%')
                ;
        }
    }
}