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

    protected $casts = [
        'is_active' => 'boolean',
        'show_on_home' => 'boolean',
    ];

    // appends book_button_text to the model
    protected $appends = ['book_button_text'];
    public function category()
    {
        return $this->belongsTo(ServiceCategory::class, 'service_category_id');
    }

    public function bookings()
    {
        return $this->hasMany(\App\Models\Booking::class);
    }

    public function getBookButtonTextAttribute()
    {
        $category_name = str_replace(' ', '_', $this->category->name);
        if (strtolower($category_name) === 'other_products') {
            return 'Order Now';
        }
        //Member Benefits
        else if (strtolower($category_name) === 'member_benefits') {
            return 'Claim Now';
        }
        // price === 0
        else if ($this->price === 0 || $this->price === null) {
            return 'Claim Now';
        }
        // Venue Hire = Reserve Now
        else if (strtolower($category_name) === 'venue_hire') {
            return 'Reserve Now';
        } else {
            return 'Book Now';
        }
    }
}