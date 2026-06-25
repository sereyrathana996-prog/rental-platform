<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [

        'booking_id',
        'rating',
        'comment'

    ];

    public function asset()
    {
        return $this->belongsTo(
            Asset::class
        );
    }

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    public function user()
    {
        return $this->belongsTo(
            User::class,
            'booking_id',
            'id'
        );
    }
}
