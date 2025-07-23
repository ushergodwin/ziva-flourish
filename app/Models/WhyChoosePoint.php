<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhyChoosePoint extends Model
{
    //
    protected $fillable = [
        'title',
        'description',
        'is_active',
        'why_choose_us_id',
    ];
}