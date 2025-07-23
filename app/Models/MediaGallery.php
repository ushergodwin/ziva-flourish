<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MediaGallery extends Model
{

    protected $fillable = [
        'title',
        'image_url',
        'caption',
        'type',
        'related_id'
    ];
}
