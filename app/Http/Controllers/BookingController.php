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
    ) {

        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);


        // Prevent owner booking

        if ($asset->owner_id == auth()->id()) {

            return back()->with(
                'error',
                'You cannot book your own asset'
            );

        }


        // Prevent double booking

        $alreadyBooked = Booking::where(
            'asset_id',
            $asset->id
        )

        ->where(
            'status',
            'approved'
        )

        ->where(function ($query) use ($request) {

            $query->whereBetween(
                'start_date',
                [
                    $request->start_date,
                    $request->end_date
                ]
            )

            ->orWhereBetween(
                'end_date',
                [
                    $request->start_date,
                    $request->end_date
                ]
            );

        })

        ->exists();


        if ($alreadyBooked) {

            return back()->with(
                'error',
                'Asset unavailable'
            );

        }


        // Calculate total

        $start = Carbon::parse(
            $request->start_date
        );

        $end = Carbon::parse(
            $request->end_date
        );

        $days = $start->diffInDays(
            $end
        );

        $total =
            $days *
            $asset->price_per_day;


        // Create booking

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
            $total,

            'status' =>
            'pending',

        ]);


        return redirect()

        ->route(
            'bookings.mine'
        )

        ->with(
            'success',
            'Booking created'
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

    public function mine()
    {
        $bookings =
        Booking::where(
            'renter_id',
            auth()->id()
        )
        ->with(
            'asset'
        )
        ->get();

        return view(
            'bookings.mine',
            compact(
                'bookings'
            )
        );
    }
}