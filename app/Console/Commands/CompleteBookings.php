<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Booking;
use Carbon\Carbon;

class CompleteBookings extends Command
{
    protected $signature =
        'bookings:complete';

    protected $description =
        'Auto complete expired bookings';

    public function handle()
    {
        $bookings =
        Booking::where(
            'status',
            'approved'
        )
        ->whereDate(
            'end_date',
            '<',
            Carbon::today()
        )
        ->get();

        foreach (
            $bookings
            as
            $booking
        ) {

            $booking->update([

                'status' =>
                'completed'

            ]);

            $booking
            ->asset
            ->update([

                'status' =>
                'available'

            ]);

        }

        return 0;
    }
}