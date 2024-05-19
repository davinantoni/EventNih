@extends('Layout.layout')
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="/css/EventDetail.css">
</head>
</html>

@section('title', 'Event Detail')
@section('content')
<div>
    <div class="detail-container">
    <img src="{{ asset('assets/FotoAcara/'.$event->Photo)  }}" alt="Event Photo" class="event-image">
    <div class="event-detail">
        <h3 class="event-title">{{$event->Title}}</h3>
        <p class="event-date">{{ date('j F Y', strtotime($event->Date)) }}</p>
        <p class="event-time">{{ date('H:i', strtotime($event->event_details->Start_time)) }} - {{ date('H:i', strtotime($event->event_details->End_time)) }} WIB</p>
        <p class="event-location">{{ $event->Location }}, {{$event->City}}</p>
        <p class="event-price">Rp. {{ number_format($event->Price, 2) }}</p>
        <button type="button">Buy Ticket</button>
    </div>
</div>

<div class="event-description">
    <h2>Description</h2>
    <p>{{$event->event_details->Description}} Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam laboriosam suscipit incidunt doloribus ut voluptate voluptatibus temporibus perspiciatis nostrum amet. Perferendis adipisci fugiat, nostrum quam voluptate quis minus ut alias! Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit laudantium qui quaerat beatae magnam veritatis corporis ipsa rem, commodi alias perferendis inventore, porro fuga libero nihil quasi. Vel, magni at? Lorem ipsum, dolor sit amet consectetur adipisicing elit. Rerum minus architecto inventore. Obcaecati expedita repellendus et culpa, quae rem veniam, voluptates eius tenetur delectus iure qui, omnis sit? Numquam, quam.</p>
</div>
</div>
@endsection