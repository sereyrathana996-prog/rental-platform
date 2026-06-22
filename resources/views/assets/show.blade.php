<h1>

{{ $asset->title }}

</h1>

@if($asset->cover_photo)

<img
src="{{ Storage::url(
$asset->cover_photo
) }}"
width="300">

@endif


<p>

Description:

{{ $asset->description }}

</p>


<p>

Price:

$

{{ $asset->price_per_day }}

</p>


<p>

Deposit:

$

{{ $asset->deposit_amount }}

</p>


<p>

Status:

{{ $asset->status }}

</p>

<hr>

<a href="{{ route('bookings.create', $asset->id) }}">

Book Now

</a>


<a
href="{{ route(
'assets.index'
) }}">

Back

</a>