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
            \App\Models\Asset::count();

        $totalBookings =
            \App\Models\Booking::count();

        $pendingBookings =
            \App\Models\Booking::where(
                'status',
                'pending'
            )->count();

        $revenue =
            \App\Models\Booking::where(
                'status',
                'approved'
            )->sum(
                'total_price'
            );

        return view(
            'dashboard',
            compact(
                'totalAssets',
                'totalBookings',
                'pendingBookings',
                'revenue'
            )
        );
    }
}
