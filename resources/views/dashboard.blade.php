<x-app-layout>

<x-slot name="header">
    <h2 class="text-2xl font-bold">
        Dashboard
    </h2>
</x-slot>

<div class="max-w-7xl mx-auto p-6">

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

<div class="bg-white rounded-xl shadow p-6">

<h3 class="text-gray-500">
Total Assets
</h3>

<p class="text-4xl font-bold mt-3">
{{ $totalAssets }}
</p>

</div>

<div class="bg-white rounded-xl shadow p-6">

<h3 class="text-gray-500">
Bookings
</h3>

<p class="text-4xl font-bold mt-3">
{{ $totalBookings }}
</p>

</div>

<div class="bg-white rounded-xl shadow p-6">

<h3 class="text-gray-500">
Pending
</h3>

<p class="text-4xl font-bold mt-3 text-green-600">
{{ $pendingBookings }}
</p>

</div>

<div class="bg-white rounded-xl shadow p-6">

<h3 class="text-gray-500">
Revenue
</h3>

<p class="text-3xl font-bold mt-3 text-blue-600">
${{ number_format($revenue,2) }}
</p>

</div>

</div>

<div class="mt-8 flex gap-4">

<a
href="{{ route('assets.index') }}"
class="bg-blue-600 text-white px-5 py-3 rounded-lg">

Browse Assets

</a>

<a
href="{{ route('assets.mine') }}"
class="bg-gray-800 text-white px-5 py-3 rounded-lg">

My Assets

</a>

<a
href="{{ route('bookings.mine') }}"
class="bg-green-600 text-white px-5 py-3 rounded-lg">

My Bookings

</a>

</div>

</div>

</x-app-layout>