<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GiftCard extends Model
{
    //

    protected $fullable = [
        'code',
        'amount',
        'recipient_email',
        'sender_name',
        'note',
        'is_redeemed'
    ];
}
