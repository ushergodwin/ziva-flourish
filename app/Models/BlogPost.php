<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'author_name',
        'published_at',
        'is_published',
        'thumbnail',
    ];
    public function comments()
    {
        return $this->hasMany(BlogComment::class);
    }

    public function stats()
    {
        return $this->hasOne(BlogPostStat::class);
    }

    protected static function booted()
    {
        static::created(function ($post) {
            $post->stats()->create();
        });
    }

    public function blogCategory()
    {
        return $this->belongsTo(BlogCategory::class);
    }
}
