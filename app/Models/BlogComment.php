<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogComment extends Model
{
    //

    protected $fillable = [
        'blog_post_id',
        'name',
        'email', // Optional for public comments
        'comment',
        'is_approved' // for moderation
    ];

    public function blogPost()
    {
        return $this->belongsTo(BlogPost::class);
    }
}
