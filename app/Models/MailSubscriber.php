<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MailSubscriber extends Model
{
    //

    protected $fillable = [
        'email',
        'name',
    ];
}
