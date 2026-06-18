<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    public function owner()
    {
        return $this->belongsTo(
            User::class,
            'owner_id'
        );
    }

    public function category()
    {
        return $this->belongsTo(
            Category::class
        );
    }

    public function photos()
    {
        return $this->hasMany(
            AssetPhoto::class
        );
    }

    public function bookings()
    {
        return $this->hasMany(
            Booking::class
        );
    }
}
