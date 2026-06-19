<h1>Assets</h1>

<a href="{{ route('assets.create') }}">
Create Asset
</a>

<hr>

@foreach($assets as $asset)

<div>

{{ $asset->title }}

</div>

@endforeach