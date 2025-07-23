<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogPostStat extends Model
{
    //

    protected $fillable = [
        'blog_post_id',
        'views',
        'likes',
        'comments',
    ];
    public function blogPost()
    {
        return $this->belongsTo(BlogPost::class);
    }

    protected static function booted()
    {
        static::created(function ($comment) {
            if ($comment->is_approved) {
                $comment->blogPost->stats?->increment('comments');
            }
        });

        static::deleted(function ($comment) {
            if ($comment->is_approved) {
                $comment->blogPost->stats?->decrement('comments');
            }
        });
    }
}
