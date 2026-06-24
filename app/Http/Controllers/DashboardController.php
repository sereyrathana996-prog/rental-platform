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
        $totalAssets =
        Asset::count();

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
                'totalAssets',
                'bookings',
                'approved',
                'revenue'
            )
        );
    }
}
