<x-app-layout>

<div class="max-w-6xl mx-auto p-8">

<div
class="
bg-white
rounded-3xl
shadow
overflow-hidden
grid
md:grid-cols-2
gap-8
"
>

<div>

@if($asset->cover_photo)

<img
src="{{ asset('storage/'.$asset->cover_photo) }}"
class="
w-full
h-[500px]
object-cover
">

@endif

</div>

<div class="p-8">

<h1
class="
text-5xl
font-bold
"
>

{{ $asset->title }}

</h1>

<p
class="
text-blue-600
text-3xl
font-bold
mt-5
"
>

${{ $asset->price_per_day }}

<span
class="
text-gray-500
text-lg
"

>

/ day

</span>

</p>

<div class="mt-8 space-y-3">

<p>

Category:

{{ $asset->category->name }}

</p>

<p>

Status:

{{ ucfirst($asset->status) }}

</p>

</div>

@if($asset->description)

<div class="mt-8">

<h2 class="font-bold text-xl">

Description

</h2>

<p class="mt-3">

{{ $asset->description }}

</p>

</div>

@endif

<div class="mt-10">

@if($asset->status=='rented')

<button
disabled
class="
bg-gray-300
px-8
py-4
rounded-xl
"

>

Unavailable

</button>

@else

<a
href="{{ route('bookings.create',$asset->id) }}"
class="
bg-blue-600
text-white
px-8
py-4
rounded-xl
"

>

Book Now

</a>

@endif

</div>

</div>

</div>

</div>

</x-app-layout>
