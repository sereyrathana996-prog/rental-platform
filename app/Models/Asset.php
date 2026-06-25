<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Booking;

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
    protected $fillable = [
        'owner_id',
        'category_id',
        'title',
        'description',
        'price_per_day',
        'deposit_amount',
        'cover_photo',
        'status'
    ];

    public function reviews()
    {
        return $this->hasManyThrough(
            Review::class,
            Booking::class,
            'asset_id',
            'booking_id',
            'id',
            'id'
        );
    }
}
