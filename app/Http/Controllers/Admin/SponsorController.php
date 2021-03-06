<?php

namespace App\Http\Controllers\Admin;

use App\Models\Sponsor;
use Illuminate\Http\Request;
use App\Services\MediaService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class SponsorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sponsors = Sponsor::with(['media'])->paginate(10);

        return view('admin.sponsors.index', compact('sponsors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sponsors.create');
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
            'image' => ['nullable', 'image', 'mimes:png,jpeg,gif'],
            'email' =>  ['required'],
        ]);

        if ($request->has('image') && !empty($request->file('image'))) {
            $media_id = MediaService::upload($request->file('image'), "sponsors");
        }

        Sponsor::create([
            'name'      =>  $request->name,
            'media_id'  =>  $media_id ?? null,
            'email'     => $request->email
        ]);

        return redirect()->route('admin.sponsors.index')
            ->with('success', 'New Sponsors Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Sponsor $sponsor)
    {
        return view('admin.sponsors.show', compact('sponsor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Sponsor $sponsor)
    {
        return view('admin.sponsors.edit', compact('sponsor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sponsor $sponsor )
    {
        $request->validate([
            'name'  =>  ['required','max:100'],
            'image' => ['nullable', 'image', 'mimes:png,jpeg,gif'],
            'email' =>  ['required'],
        ]);

        if ($request->has('image') && !empty($request->file('image'))) {
            if ($sponsor->media_id)
                Storage::delete("public/" . $sponsor->media->path);
            $media_id = MediaService::upload($request->file('image'), "sponsors");
        }

        $sponsor->update([
            'name'      =>  $request->name,
            'media_id'  =>  $media_id ?? $sponsor->media_id,
            'email'     => $request->email
        ]);

        return redirect()->route('admin.sponsors.index')
            ->with('success', 'New Sponsors Created Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sponsor $sponsor)
    {
        $sponsor->delete();

        return redirect()->route('admin.sponsors.index')
            ->with('success', 'Sponsor Deleted Successfully !!');
    }
}
