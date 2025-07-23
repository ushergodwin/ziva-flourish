<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    //

    protected $fillable = [
        'title',
        'caption',
        'media_type',
        'media_path',
        'link',
        'is_active',
    ];
}