<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'lastname',
        'email',
        'track',
        'course',
        'country',
        'phone',
        'gender',
        'age',
        'education_level',
        'disabilities',
        'experience_level',
        'role_as',
        'password',
    ];
}
