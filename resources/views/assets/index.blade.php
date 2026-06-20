<h1>Assets</h1>

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

@if($asset->cover_photo)

<img
src="{{ asset(
'storage/'.$asset->cover_photo
) }}"
width="200">

@endif

</div>



@endforeach