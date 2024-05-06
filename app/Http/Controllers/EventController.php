<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(){
        $event = Event::with(['event_types', 'event_organizers', 'event_details'])->get();
        return view('HomePage', ['event'=> $event]);
    }
}
