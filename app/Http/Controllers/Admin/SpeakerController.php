<?php

namespace App\Http\Controllers\Admin;

use App\Models\Speaker;
use Illuminate\Http\Request;
use App\Services\MediaService;
use App\Http\Controllers\Controller;

class SpeakerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $speakers = Speaker::with(['media'])->paginate(10);

        return view('admin.speakers.index', compact('speakers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
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
            'name'      =>  ['required', 'max:100'],
            'title'     =>  ['required', 'max:100'],
            'body'      =>  ['required'],
            'image'     => ['nullable', 'image', 'mimes:png,jpeg,gif'],
            'facebook'  =>  ['nullable'],
            'instagram' =>  ['nullable'],
            'email'     =>  ['nullable'],
            'twitter'   =>  ['nullable'],
        ]);

        if ($request->has('image') && !empty($request->file('image'))) {
            $media_id = MediaService::upload($request->file('image'), "speakers");
        }

        Speaker::create([
            'name'      =>  $request->name,
            'title'     =>  $request->title,
            'body'      => $request->body,
            'media_id'  => $media_id ?? null,
            'facebook'  =>  $request->facebook,
            'instagram' => $request->instagram,
            'twitter'   =>  $request->twitter,
            'email'     =>  $request->email,

        ]);

        return redirect()->route('admin.speakers.index')
            ->with('success', 'New Speaker Created Successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Speaker $speaker)
    {
        return view('admin.speakers.show', compact('speaker'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Speaker $speaker)
    {
        return view('admin.speakers.edit', compact('speaker'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Speaker $speaker)
    {
        $request->validate([
            'name'      =>  ['required', 'max:100'],
            'title'     =>  ['required', 'max:100'],
            'body'      =>  ['required'],
            'image'     => ['nullable', 'image', 'mimes:png,jpeg,gif'],
            'facebook'  =>  ['nullable'],
            'instagram' =>  ['nullable'],
            'email'     =>  ['nullable'],
            'twitter'   =>  ['nullable'],
        ]);

        if ($request->has('image') && !empty($request->file('image'))) {
            $media_id = MediaService::upload($request->file('image'), "speakers");
        }

        $speaker->update([
            'name'      =>  $request->name,
            'title'     =>  $request->title,
            'body'      => $request->body,
            'media_id'  => $media_id ?? $speaker->media_id,
            'facebook'  =>  $request->facebook,
            'instagram' => $request->instagram,
            'twitter'   =>  $request->twitter,
            'email'     =>  $request->email,

        ]);

        return redirect()->route('admin.speakers.index')
            ->with('success', 'Speaker Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Speaker $speaker)
    {
        $speaker->delete();

        return redirect()->route('admin.speakers.index')
            ->with('success', 'Speaker Deleted Successfully!');
    }
}
