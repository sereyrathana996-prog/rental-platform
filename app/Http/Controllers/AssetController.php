<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Asset;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Asset::query();

        // search by title
        if ($request->search) {
            $query->where(
                'title',
                'like',
                '%' . $request->search . '%'
            );
        }

        // filter category
        if ($request->category) {
            $query->where(
                'category_id',
                $request->category
            );
        }

        $assets = $query->get();

        $categories = Category::all();

        return view(
            'assets.index',
            compact(
                'assets',
                'categories'
            )
        );
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories =
            Category::all();

        return view(
            'assets.create',
            compact(
                'categories'
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'title'=>'required',

            'category_id'=>'required',

            'description'=>'required',

            'price_per_day'=>'required',

            'deposit_amount'=>'required',

            'photo'=>'nullable|image|max:2048',

        ]);

        $imagePath = null;

            if ($request->hasFile('photo')) {

            $imagePath =
            $request
            ->file('photo')
            ->store(
                'assets',
                'public'
            );

        }

        Asset::create([

            'owner_id'=>auth()->id(),

            'category_id'=>
            $request->category_id,

            'title'=>
            $request->title,

            'description'=>
            $request->description,

            'price_per_day'=>
            $request->price_per_day,

            'deposit_amount'=>
            $request->deposit_amount,

            'cover_photo'=>
            $imagePath,

            'status'=>
            'draft'

        ]);

        return redirect()
            ->route('assets.index')
            ->with(
                'success',
                'Asset created'
            );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $asset =
        Asset::findOrFail(
            $id
        );

        return view(
            'assets.show',
            compact(
                'asset'
            )
        );
    }

    public function mine()
    {
        $assets = Asset::where(
            'owner_id',
            auth()->id()
        )
        ->with('bookings')
        ->get();

        return view(
            'assets.mine',
            compact('assets')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $asset =
        Asset::findOrFail(
        $id
        );

        $categories =
        Category::all();

        return view(

        'assets.edit',

        compact(

        'asset',

        'categories'

        )

        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $asset =
        Asset::findOrFail(
        $id
        );


        $asset
        ->update([

        'title'=>
        $request
        ->title,

        'description'=>
        $request
        ->description,

        'price_per_day'=>
        $request
        ->price_per_day

        ]);


        return redirect()

        ->route(

        'assets.mine'

        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    $asset = Asset::findOrFail($id);

    if ($asset->cover_photo) {

        Storage::disk('public')
            ->delete($asset->cover_photo);

    }

    $asset->delete();

    return redirect()
        ->route('assets.mine')
        ->with(
            'success',
            'Asset deleted'
        );
    }
}
