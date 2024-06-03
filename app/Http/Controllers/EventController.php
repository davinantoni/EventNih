<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventType;
use App\Models\EventDetail;
use Illuminate\Http\Request;
use App\Models\EventOrganizer;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\createEventRequest;

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

    public function create(){
        $eventTypes = EventType::select('id', 'Type_name')->get();
        return view('CreateEvent', ['eventTypes' => $eventTypes]);
    }

    public function store(createEventRequest $request){
        $pictureName = '';
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $pictureName = time() . '_' . $file->getClientOriginalName(); // Generate a unique file name
            $file->move(public_path('assets/FotoAcara'), $pictureName);
            // $file->storeAs('photos', $pictureName); // Save the file to the 'photos' directory
        }
        $organizer = new EventOrganizer;
        $organizer->OrganizerName = $request->OrganizerName;
        $organizer->OrganizerEmail = $request->OrganizerEmail;
        $organizer->OrganizerPhoneNumber = $request->OrganizerPhoneNumber;
        $organizer->save();

        $event = new Event;
        $event->Title = $request->Title;      
        $event->EventType_id = $request->EventType_id;
        $event->City = $request->City;
        $event->Location = $request->Location;
        $event->Date = $request->Date;
        $event->Price = $request->Price;
        $event->organizer_id = $organizer->id;
        $event->Photo = $pictureName;
        $event->save();

        $eventDetail = new EventDetail;
        $eventDetail->event_id = $event->id;
        $eventDetail->Description = $request->Description;
        $eventDetail->Start_time = $request->Start_time;
        $eventDetail->End_time = $request->End_time;
        $eventDetail->Seat = $request->Seat;
        $eventDetail->save();

        if($event && $organizer && $eventDetail){
            Session::flash('status', 'success');
            Session::flash('message', 'Event successfully added!');
        }

        return redirect()->back();
    }
}
