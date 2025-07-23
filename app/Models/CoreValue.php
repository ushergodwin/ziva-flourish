<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CoreValue extends Model
{
    //

    protected $fillable = [
        'title',
        'icon',
        'description',
        'is_active',
    ];
}