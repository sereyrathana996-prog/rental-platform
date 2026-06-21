<h1>My Assets</h1>

<a href="{{ route('assets.create') }}">
Create New
</a>

<hr>

@foreach($assets as $asset)

<div>

<h3>

{{ $asset->title }}

</h3>


@if($asset->cover_photo)

<img
src="{{ Storage::url($asset->cover_photo) }}"
width="200">

@endif


<p>

Price:
$
{{ $asset->price_per_day }}

</p>


<a
href="{{ route(
'assets.show',
$asset->id
) }}">

View

</a>

<a
href="{{ route(
'assets.edit',
$asset->id
) }}">

Edit

</a>

</div>

<hr>

@endforeach