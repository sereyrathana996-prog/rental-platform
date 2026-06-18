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

    public function deposit()
    {
        return $this->hasOne(
            Deposit::class
        );
    }
}
