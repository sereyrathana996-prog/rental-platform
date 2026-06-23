<h1>Assets</h1>

<form>

<input
type="text"
name="search"
placeholder="Search asset">

<button>

Search

</button>

</form>

<hr>

<a href="{{ route('assets.create') }}">
Create Asset
</a>

<hr>

@foreach($assets as $asset)

<div>

<h3><a
href="{{ route(
'assets.show',
$asset->id
) }}">

{{ $asset->title }}

</a></h3>

<a
href="{{ route(
'bookings.create',
$asset->id
) }}">

Book Now

</a>

@if($asset->cover_photo)

<img
src="{{ asset(
'storage/'.$asset->cover_photo
) }}"
width="200">

@endif

</div>



@endforeach