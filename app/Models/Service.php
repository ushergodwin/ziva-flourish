<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //
    protected $fillable = [
        'service_category_id',
        'name',
        'slug',
        'short_description',
        'full_description',
        'price',
        'price_note',
        'is_active',
        'image',
        'show_on_home',
    ];

    public function category()
    {
        return $this->belongsTo(ServiceCategory::class, 'service_category_id');
    }

    public function bookings()
    {
        return $this->hasMany(\App\Models\Booking::class);
    }
}
