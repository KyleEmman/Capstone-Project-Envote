<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PasswordReset extends Model
{
    use HasFactory;
    protected $guarded = [];
    const UPDATED_AT = null;
    protected $attributes = [
        'status' => 'pending'
    ];

    public function scopeFilter($query, array $filters) {
        if($filters['campus'] ?? false){
            $query->where('username', 'like','%' . request('campus') . '%');
        }
        if($filters['status'] ?? false){
            $query->where('status',request('status'));
        }

        if($filters['search'] ?? false) {


            $query->where('username', 'like', '%' . request('search') . '%')
            ->orWhere('status', 'like', '%' . request('search') . '%')
            ->orWhere('reason', 'like', '%' . request('search') . '%')
            ->orWhere(function($q){

            $users = User::latest()->filter(['search' => request('search')])->get();

                foreach($users as $user){
                    $q->orWhere('username', $user->studentID);
                }
                
            });
        }
        
    }
}
