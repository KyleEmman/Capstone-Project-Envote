<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class central extends Model
{
    protected $connection = 'mysql2';
    use HasFactory;
}