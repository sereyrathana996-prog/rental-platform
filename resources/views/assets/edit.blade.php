<h1>

Edit Asset

</h1>


<form
method="POST"
action="{{ route(
'assets.update',
$asset->id
) }}">

@csrf

@method(
'PUT'
)


<input
type="text"
name="title"
value="{{ $asset->title }}">

<br><br>


<textarea
name="description">

{{ $asset->description }}

</textarea>

<br><br>


<input
type="number"
step="0.01"
name="price_per_day"
value="{{ $asset->price_per_day }}">

<br><br>


<button>

Update

</button>

</form>