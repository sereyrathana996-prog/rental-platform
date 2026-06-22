<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    public function user()
    {
        return $this->belongsTo(
            User::class
        );
    }

    public function asset()
    {
        return $this->belongsTo(
            Asset::class
        );
    }
    public function renter()
    {
        return $this->belongsTo(
            User::class,
            'renter_id'
        );
    }

    public function deposit()
    {
        return $this->hasOne(
            Deposit::class
        );
    }

    protected $fillable = [

    'asset_id',

    'renter_id',

    'start_date',

    'end_date',

    'total_price',

    'status'

    ];
}
