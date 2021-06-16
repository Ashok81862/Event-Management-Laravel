<?php

namespace App\Http\Controllers\Admin;

use App\Models\Hotel;
use Illuminate\Http\Request;
use App\Services\MediaService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotels = Hotel::with(['media'])->paginate(10);

        return view('admin.hotels.index', compact('hotels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.hotels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'      =>  ['required','max:50'],
            'address'   =>  ['required'],
            'rating' =>  ['nullable'],
            'body'      =>      ['nullable'],
            'image' => ['nullable', 'image', 'mimes:png,jpeg,gif'],
            ]);

            if ($request->has('image') && !empty($request->file('image'))) {
                $media_id = MediaService::upload($request->file('image'), "hotels");
            }

            Hotel::create([
                'name'  =>  $request->name,
                'address'   =>  $request->address,
                'rating' =>  $request->rating,
                'body'  =>  $request->body,
                'media_id'  =>  $media_id ?? null,
            ]);

            return redirect()->route('admin.hotels.index')
                ->with('success', 'New Hotel Created Successfully !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Hotel $hotel)
    {
        return view('admin.hotels.show', compact('hotel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Hotel $hotel)
    {
        return view('admin.hotels.edit', compact('hotel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hotel $hotel)
    {
        $request->validate([
            'name'      =>  ['required','max:50'],
            'address'   =>  ['required'],
            'rating' =>  ['nullable'],
            'body'      =>      ['nullable'],
            'image' => ['nullable', 'image', 'mimes:png,jpeg,gif'],
            ]);

            if ($request->has('image') && !empty($request->file('image'))) {
                if ($hotel->media_id)
                    Storage::delete("public/" . $hotel->media->path);
                $media_id = MediaService::upload($request->file('image'), "hotels");
            }

            $hotel->update([
                'name'  =>  $request->name,
                'address'   =>  $request->address,
                'rating' =>  $request->rating,
                'body'  =>  $request->body,
                'media_id'  =>  $media_id ?? $hotel->media_id,
            ]);

            return redirect()->route('admin.hotels.index')
                ->with('success', 'Hotel Updated Successfully !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hotel $hotel)
    {
        $hotel->delete();

        return redirect()->route('admin.hotels.index')
                ->with('success', 'Hotel Deleted Successfully !!');
    }
}
