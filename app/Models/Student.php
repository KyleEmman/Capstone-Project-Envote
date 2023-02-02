<?php

namespace App\Models;


use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class Student extends Model
{
    public $incrementing = false;
    protected $connection = 'mysql2';
    protected  $primaryKey = 'studentID';
    use HasFactory;

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
        if($filters['q'] ?? false){
            if(request('q') == 'users'){
                $query->where(function($q){
                    $users = User::get();
                    foreach($users as $user){
                        $q->orWhere('studentID', $user->studentID);
                    }
                });
            }
            else if (request('q') == 'non'){
                $query->whereNot(function($q){
                    $users = User::get();
                    foreach($users as $user){
                        $q->orWhere('studentID', $user->studentID);
                    }
                });
            }
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
