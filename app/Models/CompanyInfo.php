<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyInfo extends Model
{
    //

    protected $fillable = [
        'phone_1',
        'phone_2',
        'phone_3',
        'phone_4',
        'email',
        'address',
        'facebook',
        'twitter',
        'instagram',
        'linkedin',
        'youtube',
        'tiktok',
        'whatsapp',
    ];
}