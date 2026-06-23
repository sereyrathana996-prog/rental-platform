<h1>Assets</h1>

<form method="GET" action="{{ route('assets.index') }}">

    <input
        type="text"
        name="search"
        placeholder="Search"
        value="{{ request('search') }}">

    <select name="category">

        <option value="">
            All Categories
        </option>

        @foreach($categories as $category)

            <option
                value="{{ $category->id }}"
                {{ request('category') == $category->id ? 'selected' : '' }}>

                {{ $category->name }}

            </option>

        @endforeach

    </select>

    <button type="submit">
        Filter
    </button>

</form>

<hr>

<a href="{{ route('assets.create') }}">
    Create Asset
</a>

<hr>

@forelse($assets as $asset)

<div>

    <h3>

        <a href="{{ route('assets.show', $asset->id) }}">

            {{ $asset->title }}

        </a>

    </h3>

    <a href="{{ route('bookings.create', $asset->id) }}">
        Book Now
    </a>

    <br><br>

    @if($asset->cover_photo)

        <img
            src="{{ asset('storage/'.$asset->cover_photo) }}"
            width="200">

    @endif

    <p>
        ${{ $asset->price_per_day }}
    </p>

</div>

<hr>

@empty

<p>No assets found</p>

@endforelse