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

        $bookedDates = Booking::where(
            'asset_id',
            $asset->id
        )
        ->where(
            'status',
            'approved'
        )
        ->get();

        return view(
            'bookings.create',
            compact(
                'asset',
                'bookedDates'
            )
        );
    }


    public function store(
    Request $request,
    Asset $asset
    ) {

    $request->validate(

    [

    'start_date'=>

    'required|date',

    'end_date'=>

    'required|date|after:start_date'

    ],

    [

    'start_date.required'=>

    'Please select start date',

    'end_date.required'=>

    'Please select end date',

    'end_date.after'=>

    'End date must be after start date'

    ]

    );



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


        $booking
        ->asset
        ->update([

            'status' =>
            'rented'

        ]);


        return back()

        ->with(
        'success',
        'Booking approved'
        );
    }

    public function reject(
    Booking $booking
    )
    {
        $booking->update([
            'status' =>
            'rejected'
        ]);

        return back()

        ->with(
        'success',
        'Booking rejected'
        );
    }

   public function mine(Request $request)
    {
        $query =
            auth()
            ->user()
            ->bookings()
            ->with('asset');

        if ($request->status) {

            $query->where(
                'status',
                $request->status
            );

        }

        $bookings =
            $query
            ->latest()
            ->get();

        return view(
            'bookings.mine',
            compact(
                'bookings'
            )
        );
    }


    public function incoming()
    {
        $bookings = Booking::whereHas(
        'asset',

            function ($query) {

                $query->where(
                    'owner_id',
                    auth()->id()
                );

            }

        )

        ->with([
            'asset',
            'renter'
        ])

        ->latest()

        ->get();


        return view(

            'bookings.incoming',

            compact(
                'bookings'
            )

        );

    }


    

}