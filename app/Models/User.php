<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $primaryKey = 'userID';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopeFilter($query, array $filters) {

        if($filters['campus'] ?? false ){
            $query->where('studentID', 'like', '%' . request('campus') . '%');
        }

        if($filters['program'] ?? false ){
            $query->where('program', request('program'));
        }

        if($filters['year'] ?? false){
            $query->where('yearLevel', request('year'));
        }
        if($filters['search'] ?? false) {
            $query->where(function($q){
                $q->where('firstName', 'like', '%' . request('search') . '%')
                ->orWhere('middleName', 'like', '%' . request('search') . '%')
                ->orWhere('studentID', 'like', '%' . request('search') . '%')
                ->orWhere('lastName', 'like', '%' . request('search') . '%')
                ->orWhere('program', 'like', '%' . request('search') . '%')
                ->orWhere('yearLevel', 'like', '%' . request('search') . '%')
                ->orWhere('section', 'like', '%' . request('search') . '%');
        });
        }
    }
}
