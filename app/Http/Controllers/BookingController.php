<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Booking;
use Illuminate\Http\Request;
use Carbon\Carbon;



class BookingController extends Controller
{
    public function create($assetId)
    {
        $asset = Asset::findOrFail($assetId);

        return view(
            'bookings.create',
            compact('asset')
        );
    }


    public function store(
    Request $request,
    Asset $asset
    )
    {
        $request->validate([

            'start_date'=>
            'required|date',

            'end_date'=>
            'required|date'

        ]);

        $start =
        Carbon::parse(
        $request->start_date
        );

        $end =
        Carbon::parse(
        $request->end_date
        );

        $days =
        $start->diffInDays(
        $end
        );

        $total =
        $days
        *
        $asset->price_per_day;


        Booking::create([

            'asset_id'=>
            $asset->id,

            'renter_id'=>
            auth()->id(),

            'start_date'=>
            $request->start_date,

            'end_date'=>
            $request->end_date,

            'total_price'=>
            $total,

            'status'=>
            'pending'

        ]);

        return redirect()
            ->route(
                'assets.index'
            );
    }

    public function approve(
    Booking $booking
    )
    {
        $booking->update([
            'status' =>
            'approved'
        ]);

        return back();
    }

    public function reject(
    Booking $booking
    )
    {
        $booking->update([
            'status' =>
            'rejected'
        ]);

        return back();
    }
}