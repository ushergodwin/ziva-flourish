<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    protected $fillable = [
        'name',
        'role',
        'photo',
        'bio',
        'linkedin',
        'twitter',
        'facebook',
        'email',
        'is_active',
    ];
}