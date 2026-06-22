<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Booking;
use Illuminate\Http\Request;



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
            $asset->price_per_day,


            'status'=>
            'pending'

        ]);

        return redirect()
            ->route(
                'assets.index'
            );
    }
}