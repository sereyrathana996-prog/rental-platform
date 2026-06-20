<h1>Create Asset</h1>

<form
action="{{ route('assets.store') }}"
method="POST"
enctype="multipart/form-data">

@csrf

<div>

<label>Title</label>

<input
type="text"
name="title">

</div>

<br>

<div>

<label>Description</label>

<textarea
name="description">
</textarea>

</div>

<br>


<div>

<label>
Category
</label>

<select
name="category_id">

@foreach($categories as $category)

<option
value="{{ $category->id }}">

{{ $category->name }}

</option>

@endforeach

</select>

</div>

<br>

<div>

<label>Price Per Day</label>

<input
type="number"
step="0.01"
name="price_per_day">

</div>

<br>

<div>

<label>Deposit Amount</label>

<input
type="number"
step="0.01"
name="deposit_amount">

</div>

<br>

<div>

<label>Photo</label>

<input
type="file"
name="photo">

</div>

<br>

<button type="submit">
Save Asset
</button>

</form>

