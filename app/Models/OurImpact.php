<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OurImpact extends Model
{

    protected $fillable = [
        'title',
        'background_image',
        'awards',
        'happy_clients',
        'therapy_sessions',
        'trainers',
    ];
}
