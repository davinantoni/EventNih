<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventType;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(Request $request){
        // $event = Event::with(['event_types', 'event_organizers', 'event_details'])->get();
        // return view('HomePage', ['event'=> $event]);

        $locations = Event::select('City')->distinct()->pluck('City');
        $eventTypes = EventType::pluck('Type_name');
        $events = Event::with(['event_types', 'event_organizers', 'event_details']);
        $keyword = $request->keyword;

        if ($request->has('keyword') && $request->keyword != '') {
            $events->where('Title', 'LIKE', '%' . $keyword . '%')->orWhere('City', 'LIKE', '%' . $keyword . '%')
            ->orWhere('Location', 'LIKE', '%' . $keyword . '%');
        }

        if ($request->has('location') && $request->location != '') {
            $events->where('City', $request->location);
        }

        if ($request->has('category') && $request->category != '') {
            $events->whereHas('event_types', function($q) use ($request) {
                $q->where('Type_name', $request->category);
            });
        }

        if ($request->has('sort_by') && $request->sort_by != '') {
            switch ($request->sort_by) {
                case 'newest':
                    $events->orderBy('created_at', 'desc');
                    break;
                case 'cheapest':
                    $events->orderBy('Price', 'asc');
                    break;
                case 'most_expensive':
                    $events->orderBy('Price', 'desc');
                    break;
            }
        }

        $events = $events->get();

        return view('HomePage', ['event' => $events, 'locations' => $locations, 'eventTypes' => $eventTypes]);
    }

    public function show($id){
        $event = Event::with(['event_details'])->findOrFail($id);
        return view('Event-Detail', ['event' => $event]);
    }
}
