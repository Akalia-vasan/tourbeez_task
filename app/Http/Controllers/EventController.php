<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use DB;
class EventController extends Controller
{
    public function index(Request $request)
    {

        $events = Event::orderBy('id');

        $term = $request->get('term');

        if(!empty($term))
        {
            $events->where(function($query) use($term){

                $query->where('title', 'like', '%' . $term .'%');
                    $query->orWhere('venue', 'like', '%' . $term .'%');

            });
        }
        
        
        $events = $events->simplePaginate(15);
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
        try {
            $event = new Event();
            $event->title = $request->title;
            $event->date = $request->date;
            $event->venue = $request->venue;
            $event->price = $request->price;
            $event->save();
        } catch (\Exception $e) {
                // An error occurred, rollback the transaction
                DB::rollback();

                return redirect()->back()->with('error', 'Failed to save data. Please try again.');
            }

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
try {
        $event = Event::find($id);
        $event->title = $request->title;
        $event->date = $request->date;
        $event->venue = $request->venue;
        $event->price = $request->price;
        $event->save();
} catch (\Exception $e) {
                // An error occurred, rollback the transaction
                DB::rollback();

                return redirect()->back()->with('error', 'Failed to save data. Please try again.');
            }


        return redirect()->route('event.index');
    }

    public function delete($id)
    {
        $event = Event::find($id);
        $event->delete();
         return redirect()->back();
    }
}
