<x-app-layout>

    <x-slot name="header">

        <h2>

            Dashboard

        </h2>

    </x-slot>


    <div class="py-12">

        <div class="max-w-7xl mx-auto">

            <div>

                <h3>

                    Total Assets:
                    {{ $assets }}

                </h3>

                <hr>

                <br>


                <h3>

                    Total Bookings:
                    {{ $bookings }}

                </h3>

                <hr>

                <br>


                <h3>

                    Approved Bookings:
                    {{ $approved }}

                </h3>

                <hr>

                <br>


                <h3>

                    Revenue:
                    $
                    {{ $revenue }}

                </h3>
                <hr>

                <br>

                <a href="{{ route('assets.index') }}">

                Browse Assets

                </a>

                <br><br>

                <a href="{{ route('assets.mine') }}">

                My Assets

                </a>

                <br><br>

                <a href="{{ route('bookings.mine') }}">

                My Bookings

                </a>

                <br><br>

                <a href="{{ route('assets.create') }}">

                Create New Asset

                </a>

            </div>

        </div>

    </div>

</x-app-layout>