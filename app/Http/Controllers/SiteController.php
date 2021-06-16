<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Gallery;
use App\Models\Hotel;
use App\Models\Schedule;
use App\Models\Speaker;
use App\Models\Sponsor;
use App\Models\Venue;
use Illuminate\Console\Scheduling\Event;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function home()
    {
        if(auth()->user()->role == 'Admin')
            return redirect('/admin');

        return redirect('/');
    }

    public function index(Request $request)
    {
        $schedules = Schedule::with(['speaker'])->orderBy('created_at', 'desc')->limit(6)->get();
        $schedule_count   = Schedule::count();

        $speakers = Speaker::with(['media'])->orderBy('created_at', 'asc')->limit(4)->get();

        $speaker_count = Speaker::count();

        $faqs = Faq::select(['id','question','answer'])->limit(6)->get();

        $galleries = Gallery::with(['media'])->orderBy('created_at', 'desc')->limit(6)->get();

        $sponsors = Sponsor::with(['media'])->get();

        $sponsor_count  = Sponsor::count();

        $venues = Venue::with(['media'])->limit(6)->get();

        $hotels = Hotel::with(['media'])->get();

        $venue = Venue::with(['media'])->first();

        $venue_count = Venue::count();


        return view('welcome', compact('faqs', 'speakers','speaker_count','schedules','schedule_count','galleries', 'sponsors', 'sponsor_count', 'venues','hotels', 'venue','venue_count'));
    }
}
