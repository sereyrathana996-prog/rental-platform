<div
    class="
        bg-white
        rounded-xl
        shadow
        overflow-hidden
    "
>

```
@if ($asset->cover_photo)

    <img
        src="{{ asset('storage/' . $asset->cover_photo) }}"
        class="w-full h-60 object-cover"
    >

@endif


<div class="p-5">

    <h2 class="text-xl font-bold">
        {{ $asset->title }}
    </h2>


    <p class="text-green-600 text-lg mt-2">
        ${{ $asset->price_per_day }}
    </p>


    <div class="flex gap-3 mt-5">

        <a
            href="{{ route('assets.show', $asset->id) }}"
            class="
                bg-blue-500
                text-white
                px-4
                py-2
                rounded
            "
        >
            View
        </a>


        <a
            href="{{ route('bookings.create', $asset->id) }}"
            class="
                bg-green-500
                text-white
                px-4
                py-2
                rounded
            "
        >
            Book
        </a>

    </div>

</div>
```

</div>
