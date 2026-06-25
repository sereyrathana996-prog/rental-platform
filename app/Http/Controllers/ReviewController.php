<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(
        Request $request,
        Asset $asset
    )
    {
        $request->validate([

        'booking_id'=>'required',

        'rating'=>'required',

        'comment'=>'required'

        ]);


        Review::create([

        'booking_id'=>$request->booking_id,

        'rating'=>$request->rating,

        'comment'=>$request->comment

        ]);


        return back()->with(

            'success',

            'Review submitted'

        );
    }
}