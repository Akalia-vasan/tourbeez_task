<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
class EventController extends Controller
{
    public function index(Request $request)
    {

        $events = Event::simplePaginate(15);
        return view('event.index', compact('events'));
    }

    public function create()
    {
        return view('event.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'date' => 'required',
            'price' => 'required',
        ]);

        $event = new Event();
        $event->title = $request->title;
        $event->date = $request->date;
        $event->venue = $request->venue;
        $event->price = $request->price;
        $event->save();


        return redirect()->route('event.index');
    }

    public function edit($id)
    {
        $event = Event::find($id);
        return view('event.edit', compact('event'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'date' => 'required',
            'price' => 'required',
        ]);

        $event = Event::find($id);
        $event->title = $request->title;
        $event->date = $request->date;
        $event->venue = $request->venue;
        $event->price = $request->price;
        $event->save();


        return redirect()->route('event.index');
    }

    public function delete($id)
    {
        $event = Event::find($id);
        $event->delete();
         return redirect()->back();
    }
}
