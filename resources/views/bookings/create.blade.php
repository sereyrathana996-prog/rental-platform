<h1>Book Asset</h1>

<h3>
{{ $asset->title }}
</h3>

<form
action="{{ route(
'bookings.store',
$asset->id
) }}"
method="POST">

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

Book

</button>

</form>