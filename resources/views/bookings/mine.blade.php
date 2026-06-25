<x-app-layout>

<div class="max-w-7xl mx-auto p-8">

<h1
class="
text-4xl
font-bold
mb-8
"
>

My Bookings

</h1>

<form class="flex gap-3 mb-8">

<button
name="status"
value=""
class="px-4 py-2 rounded bg-gray-200"
>
All
</button>

<button
name="status"
value="pending"
class="px-4 py-2 rounded bg-yellow-400"
>
Pending
</button>

<button
name="status"
value="approved"
class="px-4 py-2 rounded bg-green-500 text-white"
>
Approved
</button>

<button
name="status"
value="rejected"
class="px-4 py-2 rounded bg-red-500 text-white"
>
Rejected
</button>

</form>


<div
class="
grid
grid-cols-1
md:grid-cols-2
gap-6
"
>

@forelse($bookings as $booking)

<div
class="
bg-white
rounded-2xl
shadow
overflow-hidden
"
>

@if($booking->asset->cover_photo)

<img
src="{{ asset('storage/'.$booking->asset->cover_photo) }}"
class="
w-full
h-56
object-cover
">

@endif


<div class="p-6">

<h2
class="
text-2xl
font-bold
"
>

{{ $booking->asset->title }}

</h2>


<p class="mt-3">

{{ $booking->start_date }}

→

{{ $booking->end_date }}

</p>

<p class="mt-2">

{{ \Carbon\Carbon::parse($booking->start_date)->diffInDays($booking->end_date) }}

days

</p>


<p
class="
text-blue-600
font-bold
mt-2
"
>

${{ $booking->total_price }}

</p>


<span
class="
inline-block
mt-4
px-4
py-2
rounded-full

@if($booking->status=='approved')
bg-green-100 text-green-700

@elseif($booking->status=='rejected')
bg-red-100 text-red-700

@else
bg-yellow-100 text-yellow-700
@endif
">

<span
class="
inline-block
mt-4
px-4
py-2
rounded-full

@if($booking->status=='pending')
bg-yellow-100 text-yellow-700

@elseif($booking->status=='approved')
bg-green-100 text-green-700

@else
bg-red-100 text-red-700
@endif
"
>

{{ ucfirst($booking->status) }}

</span>

</span>

</div>

</div>

@empty

<p>

No bookings yet

</p>

@endforelse

</div>

</div>

</x-app-layout>