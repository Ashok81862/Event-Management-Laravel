<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Amenitie;
use Illuminate\Http\Request;

class AmenitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $amenities = Amenitie::select(['id', 'name'])->get();

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

        Amenitie::create([
            'name'  =>  $request->name,
        ]);

        return redirect()->route('admin.amenities.index')
            ->with('success','Amenitie Created Successfully !!');
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
    public function edit(Amenitie $amenitie)
    {
        return view('admin.amenities.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Amenitie $amenitie)
    {
        $request->validate([
            'name'  =>  ['required','max:100'],
        ]);

        $amenitie->delete([
            'name'  =>  $request->name,
        ]);

        return redirect()->route('admin.amenities.index')
            ->with('success','Amenitie Updated Successfully !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Amenitie $amenitie)
    {
        $amenitie->delete();

        return redirect()->route('admin.amenities.index')
            ->with('success', 'Amenitie Deleted Successfully !!');
    }
}
