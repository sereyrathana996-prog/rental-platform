<div
    class="
        bg-white
        rounded-2xl
        overflow-hidden
        shadow-md
        hover:shadow-xl
        transition
        duration-300
    "
>

```
@if ($asset->cover_photo)

    <img
        src="{{ asset('storage/' . $asset->cover_photo) }}"
        class="
            w-full
            h-60
            object-cover
        "
    >

@endif


<div class="p-6">

    <div class="flex justify-between items-center">

        <h2
            class="
                text-xl
                font-bold
            "
        >
            {{ $asset->title }}
        </h2>


        <span
            class="
                bg-green-100
                text-green-700
                px-3
                py-1
                rounded-full
                text-sm
            "
        >

            {{ $asset->status }}

        </span>

    </div>


    <p
        class="
            text-3xl
            font-bold
            text-blue-600
            mt-4
        "
    >

        ${{ $asset->price_per_day }}

        <span
            class="
                text-sm
                text-gray-500
            "
        >

            / day

        </span>

    </p>


    <div
        class="
            flex
            gap-3
            mt-6
        "
    >

        <a
            href="{{ route('assets.show', $asset->id) }}"
            class="
                flex-1
                text-center
                bg-gray-900
                text-white
                py-3
                rounded-xl
            "
        >

            View

        </a>


        @if($asset->status == 'rented')

        <button
            disabled
            class="
            bg-gray-300
            text-gray-600
            px-4
            py-2
            rounded
            cursor-not-allowed
            ">

            Unavailable

        </button>

            @else

            <a
            href="{{ route('bookings.create',$asset->id) }}"
            class="
            bg-green-500
            text-white
            px-4
            py-2
            rounded
            hover:bg-green-600
            ">

            Book

            </a>

        @endif


    </div>

</div>
```

</div>
