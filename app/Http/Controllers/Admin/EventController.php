<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::orderBy('event_date')->get();
        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        return view('admin.events.form', ['event' => new Event()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => ['required', 'string', 'max:200'],
            'description' => ['required', 'string', 'max:1000'],
            'location'    => ['required', 'string', 'max:200'],
            'event_date'  => ['required', 'date'],
            'link'        => ['nullable', 'url', 'max:500'],
            'image'       => ['nullable', 'image', 'mimes:jpeg,jpg,png,webp', 'max:2048'],
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('events', 'public');
        }

        Event::create($data);

        return redirect()->route('admin.events.index')
            ->with('success', 'Event created successfully.');
    }

    public function edit(Event $event)
    {
        return view('admin.events.form', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $data = $request->validate([
            'title'       => ['required', 'string', 'max:200'],
            'description' => ['required', 'string', 'max:1000'],
            'location'    => ['required', 'string', 'max:200'],
            'event_date'  => ['required', 'date'],
            'link'        => ['nullable', 'url', 'max:500'],
            'image'       => ['nullable', 'image', 'mimes:jpeg,jpg,png,webp', 'max:2048'],
        ]);

        if ($request->hasFile('image')) {
            if ($event->image) {
                Storage::disk('public')->delete($event->image);
            }
            $data['image'] = $request->file('image')->store('events', 'public');
        }

        $event->update($data);

        return redirect()->route('admin.events.index')
            ->with('success', 'Event updated successfully.');
    }

    public function destroy(Event $event)
    {
        if ($event->image) {
            Storage::disk('public')->delete($event->image);
        }

        $event->delete();
        return back()->with('success', 'Event deleted.');
    }
}
