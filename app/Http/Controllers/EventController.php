<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(){
        $event = Event::all();
        return view('HomePage', ['event'=>$event]);
    }
}
