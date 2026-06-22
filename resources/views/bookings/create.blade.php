<h1>

Book Asset

</h1>


<h3>

{{ $asset->title }}

</h3>


<form
method="POST"
action="{{ route(
'bookings.store',
$asset->id
) }}">

@csrf


<div>

<label>

Start Date

</label>

<input
type="date"
name="start_date">

</div>

<br>


<div>

<label>

End Date

</label>

<input
type="date"
name="end_date">

</div>

<br>


<button>

Confirm Booking

</button>

</form>