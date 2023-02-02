<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    public function scopeFilter($query, array $filters) {
        if($filters['search'] ?? false) {
            $query->where('title', 'like', '%' . request('search') . '%')
            ->orWhere('content', 'like', '%' . request('search') . '%')
            ->orWhere('created_at', 'like', '%' . request('search') . '%');
        }
    }
    protected $guarded = [];
    protected  $primaryKey = 'announcementID';
    use HasFactory;
}
