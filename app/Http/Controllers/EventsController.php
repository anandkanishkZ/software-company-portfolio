<?php

namespace App\Http\Controllers;

use App\Models\Event;

class EventsController extends Controller
{
    public function index()
    {
        $upcomingEvents = Event::where('event_date', '>=', now())->orderBy('event_date')->get();
        $pastEvents = Event::where('event_date', '<', now())->orderBy('event_date', 'desc')->get();

        return view('events', compact('upcomingEvents', 'pastEvents'));
    }
}
