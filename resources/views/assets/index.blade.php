<x-app-layout>

<div class="max-w-7xl mx-auto p-8">

```
<h1 class="text-4xl font-bold mb-8">
    Assets
</h1>


{{-- Filter --}}
<form class="flex gap-4 mb-8">

    <input
        type="text"
        name="search"
        value="{{ request('search') }}"
        placeholder="Search assets..."
        class="border rounded-lg px-4 py-2 w-80"
    >

    <select
        name="category"
        class="border rounded-lg px-4 py-2"
    >

        <option value="">
            All Categories
        </option>

        @foreach ($categories as $category)

            <option
                value="{{ $category->id }}"
                {{ request('category') == $category->id ? 'selected' : '' }}
            >
                {{ $category->name }}
            </option>

        @endforeach

    </select>

    <button
        class="bg-blue-600 text-white px-6 rounded-lg"
    >
        Filter
    </button>

</form>



{{-- Create --}}
<a
    href="{{ route('assets.create') }}"
    class="
        inline-block
        mb-8
        bg-green-600
        text-white
        px-5
        py-3
        rounded-lg
    "
>
    Create Asset
</a>



{{-- Assets --}}
<div
    class="
        grid
        grid-cols-1
        md:grid-cols-2
        lg:grid-cols-3
        gap-8
    "
>

    @forelse ($assets as $asset)

    ```
    <x-asset-card
        :asset="$asset"
    />
    ```

    @empty

    <p class="text-gray-500">

    No assets found

    </p>

    @endforelse


</div>
```

</div>

</x-app-layout>
