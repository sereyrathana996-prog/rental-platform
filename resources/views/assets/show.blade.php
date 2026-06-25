<x-app-layout>

<div class="max-w-6xl mx-auto p-8">

<div
class="
grid
grid-cols-1
lg:grid-cols-2
gap-10
">

<div>

@if($asset->cover_photo)

<img
src="{{ asset('storage/'.$asset->cover_photo) }}"
class="
w-full
rounded-2xl
shadow
h-[500px]
object-cover
">

@endif

</div>

<div>

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
text-gray-600
mt-6
"
>

{{ $asset->description }}

</p>

<div
class="
mt-8
"
>

<p
class="
text-4xl
font-bold
text-blue-600
"
>

${{ $asset->price_per_day }}

<span
class="
text-lg
text-gray-500
"

>

/ day

</span>

</p>

</div>

<div
class="
mt-6
"
>

<span
class="
bg-green-100
text-green-700
px-4
py-2
rounded-full
"

>

{{ $asset->status }}

</span>

</div>

<div
class="
mt-10
flex
gap-4
">

<a
href="{{ route('bookings.create',$asset->id) }}"
class="
bg-blue-600
text-white
px-6
py-4
rounded-xl
"

>

Book Now

</a>

<a
href="{{ route('assets.index') }}"
class="
bg-gray-200
px-6
py-4
rounded-xl
"

>

Back

</a>

</div>

</div>

</div>

</div>

</x-app-layout>
