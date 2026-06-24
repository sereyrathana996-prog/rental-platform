<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Asset;
use App\Models\Booking;

class DashboardController extends Controller
{
    public function index()
    {
        $assets =
        Asset::where(
            'owner_id',
            auth()->id()
        )->count();

        $bookings =
        Booking::count();

        $approved =
        Booking::where(
            'status',
            'approved'
        )->count();

        $revenue =
        Booking::where(
            'status',
            'approved'
        )->sum(
            'total_price'
        );

        return view(
            'dashboard',
            compact(
                'assets',
                'bookings',
                'approved',
                'revenue'
            )
        );
    }
}
