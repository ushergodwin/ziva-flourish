<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    //
    protected $fillable = [
        'name',
        'email',
        'phone',
        'service_id',
        'preferred_date',
        'preferred_time',
        'notes',
        'status',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
