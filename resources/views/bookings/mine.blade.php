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
bg-yellow-100
text-yellow-700
"
>

{{ $booking->status }}

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