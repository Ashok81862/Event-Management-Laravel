<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use App\Models\Speaker;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedules = Schedule::with(['speaker'])->orderBy('start_date','desc')->paginate(10);

        return view('admin.schedules.index', compact('schedules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $speakers = Speaker::select(['id', 'name'])->get();

        return view('admin.schedules.create', compact('speakers'));
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
            'title'         =>  ['required','max:100'],
            'sub_title'     =>  ['nullable'],
            'start_date'    => ['required','string'],
            'speaker_id'    =>  ['required','exists:speakers,id'],
        ]);

        Schedule::create([
            'title'         =>  $request->title,
            'sub_title'     =>  $request->sub_title,
            'start_date'    =>  $request->start_date,
            'speaker_id'    =>  $request->speaker_id
        ]);

        return redirect()->route('admin.schedules.index')
            ->with('success','New Schedule Created Successfully !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Schedule $schedule)
    {
        return view('admin.schedules.show', compact('schedule'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Schedule $schedule)
    {
        $speakers = Speaker::select(['id', 'name'])->get();

        return view('admin.schedules.edit', compact('speakers','schedule'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Schedule $schedule)
    {
        $request->validate([
            'title'         =>  ['required','max:100'],
            'sub_title'     =>  ['nullable'],
            'start_date'    => ['required','string'],
            'speaker_id'    =>  ['required','exists:speakers,id'],
        ]);

        $schedule->update([
            'title'         =>  $request->title,
            'sub_title'     =>  $request->sub_title,
            'start_date'    =>  $request->start_date,
            'speaker_id'    =>  $request->speaker_id
        ]);

        return redirect()->route('admin.schedules.index')
            ->with('success','Schedule Updated Successfully !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedule $schedule)
    {
        $schedule->delete();

        return redirect()->route('admin.schedules.index')
            ->with('success','Schedule Deleted Successfully !!');
    }
}
