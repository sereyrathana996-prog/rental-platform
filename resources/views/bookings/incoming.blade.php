<x-app-layout>

<div class="max-w-7xl mx-auto p-8">

<h1 class="text-4xl font-bold mb-8">

Incoming Bookings

</h1>

<div class="space-y-6">

@forelse($bookings as $booking)

<div
class="
bg-white
rounded-xl
shadow
p-6
"
>

<h2 class="text-2xl font-bold">

{{ $booking->asset->title }}

</h2>

<p class="mt-2">

Customer:
{{ $booking->renter->name }}

</p>

<p>

{{ $booking->start_date }}

→

{{ $booking->end_date }}

</p>

<p class="font-bold text-blue-600">

${{ $booking->total_price }}

</p>

@if($booking->status=='pending')

<div class="flex gap-4 mt-5">

<form
method="POST"
action="{{ route('bookings.approve',$booking->id) }}"
>

@csrf

<button
class="
bg-green-600
text-white
px-5
py-2
rounded
"   

>

Approve

</button>

</form>

<form
method="POST"
action="{{ route('bookings.reject',$booking->id) }}"
>

@csrf

<button
class="
bg-red-600
text-white
px-5
py-2
rounded
"

>

Reject

</button>

</form>

</div>

@else

<p class="mt-4">

{{ $booking->status }}

</p>

@endif

</div>

@empty

<p>

No incoming bookings

</p>

@endforelse

</div>

</div>

</x-app-layout>
