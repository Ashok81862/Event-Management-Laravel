<?php

namespace App\Http\Controllers\Admin;

use App\Models\Venue;
use Illuminate\Http\Request;
use App\Services\MediaService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class VenueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $venues = Venue::with(['media'])->paginate(10);

        return view('admin.venues.index', compact('venues'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.venues.create');
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
        'longitude' =>  ['nullable','integer'],
        'latitude'  =>  ['nullable','integer'],
        'body'      =>      ['nullable'],
        'image' => ['nullable', 'image', 'mimes:png,jpeg,gif'],
        ]);

        if ($request->has('image') && !empty($request->file('image'))) {
            $media_id = MediaService::upload($request->file('image'), "venues");
        }

        Venue::create([
            'name'  =>  $request->name,
            'address'   =>  $request->address,
            'longitude' =>  $request->longitude,
            'latitude'  =>  $request->latitude,
            'media_id'  =>  $media_id ?? null,
        ]);

        return redirect()->route('admin.venues.index')
            ->with('success', 'New Venue Created Successfully !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Venue $venue)
    {
        return view('admin.venues.show', compact('venue'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Venue $venue)
    {
        return view('admin.venues.edit', compact('venue'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Venue $venue)
    {
        $request->validate([
            'name'      =>  ['required','max:50'],
            'address'   =>  ['required'],
            'longitude' =>  ['nullable','integer'],
            'latitude'  =>  ['nullable','integer'],
            'body'      =>      ['nullable'],
            'image' => ['nullable', 'image', 'mimes:png,jpeg,gif'],
            ]);

            if ($request->has('image') && !empty($request->file('image'))) {
                if ($venue->media_id)
                    Storage::delete("public/" . $venue->media->path);
                $media_id = MediaService::upload($request->file('image'), "venues");
            }

            $venue->update([
                'name'  =>  $request->name,
                'address'   =>  $request->address,
                'longitude' =>  $request->longitude,
                'latitude'  =>  $request->latitude,
                'media_id'  =>  $media_id ?? $venue->media_id,
            ]);

            return redirect()->route('admin.venues.index')
                ->with('success', 'Venue Updated Successfully !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venue $venue)
    {
        $venue->delete();

        return redirect()->route('admin.venues.index')
            ->with('success', 'Venue Deleted Successfully !!');
    }
}
