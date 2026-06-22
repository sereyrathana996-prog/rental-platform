<h1>My Bookings</h1>

<a href="{{ route('assets.index') }}">
    Browse Assets
</a>

<hr>

@forelse($bookings as $booking)

<div>

    <h3>
        {{ $booking->asset->title }}
    </h3>

    <p>
        Start:
        {{ $booking->start_date }}
    </p>

    <p>
        End:
        {{ $booking->end_date }}
    </p>

    <p>
        Total:
        ${{ $booking->total_price }}
    </p>

    <p>
        Status:
        {{ $booking->status }}
    </p>

</div>

<hr>

@empty

<p>
No bookings yet
</p>

@endforelse