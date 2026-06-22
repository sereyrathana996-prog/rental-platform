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
        $assetId
    ) {

        $asset =
        Asset::findOrFail(
            $assetId
        );


        $request->validate([

            'start_date' =>
            'required|date',

            'end_date' =>
            'required|date|after:start_date'

        ]);


        $days =
        now()
        ->parse(
            $request->start_date
        )
        ->diffInDays(
            $request->end_date
        );


        Booking::create([

            'asset_id' =>
            $asset->id,

            'renter_id' =>
            auth()->id(),

            'start_date' =>
            $request->start_date,

            'end_date' =>
            $request->end_date,

            'total_price' =>
            $days *
            $asset->price_per_day,

            'status' =>
            'pending'

        ]);


        return redirect()
            ->route(
                'assets.show',
                $asset->id
            );

    }
}