<x-app-layout>

<x-slot name="header">

<h2 class="font-bold text-2xl">

Dashboard

</h2>

</x-slot>


<div class="p-8">

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">


<div class="bg-white rounded-xl shadow p-6">

<p class="text-gray-500">
Total Assets
</p>

<h1 class="text-4xl font-bold">

{{ $assets }}

</h1>

</div>


<div class="bg-white rounded-xl shadow p-6">

<p class="text-gray-500">
Bookings
</p>

<h1 class="text-4xl font-bold">

{{ $bookings }}

</h1>

</div>


<div class="bg-white rounded-xl shadow p-6">

<p class="text-gray-500">
Approved
</p>

<h1 class="text-4xl font-bold">

{{ $approved }}

</h1>

</div>


<div class="bg-white rounded-xl shadow p-6">

<p class="text-gray-500">
Revenue
</p>

<h1 class="text-4xl font-bold">

${{ $revenue }}

</h1>

</div>


</div>


<div class="mt-10 space-x-4">

<a
href="{{ route('assets.index') }}"
class="bg-blue-500 text-white px-5 py-3 rounded">

Browse Assets

</a>


<a
href="{{ route('assets.mine') }}"
class="bg-green-500 text-white px-5 py-3 rounded">

My Assets

</a>


<a
href="{{ route('bookings.mine') }}"
class="bg-purple-500 text-white px-5 py-3 rounded">

My Bookings

</a>


</div>

</div>

</x-app-layout>