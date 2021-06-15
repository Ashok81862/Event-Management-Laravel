<?php

namespace App\Http\Controllers\Admin;

use App\Models\Amenity;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AmenitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $amenities = Amenity::select(['id', 'name'])->paginate(10);

        return view('admin.amenities.index', compact('amenities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.amenities.create');
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
            'name'  =>  ['required','max:100'],
        ]);

        Amenity::create([
            'name'  =>  $request->name,
        ]);

        return redirect()->route('admin.amenities.index')
            ->with('success','Amenity Created Successfully !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Amenity $amenity)
    {
        return view('admin.amenities.edit', compact('amenity'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Amenity $amenity)
    {
        $request->validate([
            'name'  =>  ['required','max:100'],
        ]);

        $amenity->update([
            'name'  =>  $request->name,
        ]);

        return redirect()->route('admin.amenities.index')
            ->with('success','Amenity Updated Successfully !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Amenity $amenity)
    {
        $amenity->delete();

        return redirect()->route('admin.amenities.index')
            ->with('success', 'Amenity Deleted Successfully !!');
    }
}
