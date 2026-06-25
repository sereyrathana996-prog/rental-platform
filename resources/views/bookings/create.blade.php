<x-app-layout>

<div class="max-w-3xl mx-auto p-8">

<div
class="
bg-white
rounded-2xl
shadow-lg
p-8
">

<h1
class="
text-4xl
font-bold
mb-8
"
>

Book Asset

</h1>

<div
class="
mb-8
"
>

<h2
class="
text-2xl
font-semibold
"
>

{{ $asset->title }}

</h2>

<p
class="
text-blue-600
text-xl
mt-2
"
>

${{ $asset->price_per_day }}

<span class="text-gray-500">

/ day

</span>

</p>

</div>

<form
action="{{ route('bookings.store',$asset->id) }}"
method="POST"
>

@csrf

<div class="mb-6">

<label
class="
block
mb-2
font-medium
"

>

Start Date

</label>

<input
type="date"
name="start_date"

class="
w-full
border
rounded-xl
p-4
"

>

</div>

<div class="mb-6">

<label
class="
block
mb-2
font-medium
"

>

End Date

</label>

<input
type="date"
name="end_date"

class="
w-full
border
rounded-xl
p-4
"

>

</div>

<div
class="
flex
gap-4
"
>

<button
class="
bg-blue-600
text-white
px-8
py-4
rounded-xl
"

>

Confirm Booking

</button>

<a
href="{{ route('assets.show',$asset->id) }}"

class="
bg-gray-200
px-8
py-4
rounded-xl
"

>

Cancel

</a>

</div>

</form>

</div>

</div>

</x-app-layout>
