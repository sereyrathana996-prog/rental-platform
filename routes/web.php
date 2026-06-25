<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReviewController;


Route::get('/', function () {
    return view('welcome');
});

Route::get(
    '/dashboard',
    [DashboardController::class, 'index']
)
->middleware([
    'auth'
])
->name(
    'dashboard'
);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {

    Route::resource(
        'assets',
        AssetController::class
    );

    Route::get(
        '/bookings/create/{asset}',
        [BookingController::class, 'create']
    )->name('bookings.create');


    Route::post(
        '/bookings/store/{asset}',
        [BookingController::class, 'store']
    )->name('bookings.store');

    Route::post(
    '/bookings/{booking}/approve',
    [BookingController::class, 'approve']
    )->name('bookings.approve');


    Route::post(
    '/bookings/{booking}/reject',
    [BookingController::class, 'reject']
    )->name('bookings.reject');

    Route::get(
    '/my-bookings',
    [BookingController::class, 'mine']
    )->name(
    'bookings.mine'
    );

    Route::post(
    '/reviews/{asset}',
    [ReviewController::class,'store']
    )->name(
    'reviews.store'
    );

});

Route::get(
    '/my-assets',
    [AssetController::class, 'mine']
)->name('assets.mine');


Route::get(
'/incoming-bookings',
[
BookingController::class,
'incoming'
]

)->middleware('auth')

->name(
'bookings.incoming'
);




require __DIR__.'/auth.php';
