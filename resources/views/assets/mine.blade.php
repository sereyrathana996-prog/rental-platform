<a href="{{ route('dashboard') }}">
← Dashboard
</a>

|

<a href="{{ route('assets.create') }}">
+ Create New Asset
</a>

<hr>

<h1>My Assets</h1>


@foreach($assets as $asset)

<div>

<h3>
{{ $asset->title }}
</h3>

@if($asset->cover_photo)

<img
src="{{ asset('storage/'.$asset->cover_photo) }}"
width="200">

@endif

<p>
Price:
${{ $asset->price_per_day }}
</p>

@if($asset->status=='available')

<p>
🟢 Available
</p>

@else

<p>
🔴 Rented
</p>

@endif

<a
href="{{ route(
'assets.show',
$asset->id
) }}">

View

</a>

|

<a
href="{{ route(
'assets.edit',
$asset->id
) }}">

Edit

</a>

|

<form
action="{{ route(
'assets.destroy',
$asset->id
) }}"
method="POST"
style="display:inline">

@csrf
@method('DELETE')

<button
onclick="return confirm(
'Delete asset?'
)">

Delete

</button>

</form>

<h4>Bookings</h4>

@forelse($asset->bookings as $booking)

<div>

Start:
{{ $booking->start_date }}

<br>

End:
{{ $booking->end_date }}

<br>

Total:
${{ $booking->total_price }}

<br>

@if($booking->status=='pending')

<p>
🟡 Pending
</p>

@elseif(
$booking->status=='approved'
)

<p>
🟢 Approved
</p>

@else

<p>
🔴 Rejected
</p>

@endif

</div>

@if(
$booking->status
==
'pending'
)

<form
action="{{ route(
'bookings.approve',
$booking->id
) }}"
method="POST">

@csrf

<button>
Approve
</button>

</form>

<form
action="{{ route(
'bookings.reject',
$booking->id
) }}"
method="POST">

@csrf

<button>
Reject
</button>

</form>

@endif

<hr>

@empty

<p>
No bookings
</p>

@endforelse

</div>

<br>

@endforeach