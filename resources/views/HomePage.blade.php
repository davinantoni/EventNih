@extends('Layout.layout')
@section('title', 'Home')
@section('content')
    <h1>HomePage</h1>
    <h1>Event</h1>
    <div>
        @foreach ($event as $events)
        <tr>
            <td>{{ $loop->iteration }}</td> <br>
            <td>Title : {{ $events->Title }} </td> <br>
            <td>Date : {{ $events->Date }} </td> <br>
            <td>Location : {{ $events->Location }} </td> <br>
            <td>Price : {{ $events->Price }} </td> <br>
            <td>Description :{{ $events->event_details->Description }} </td> <br>
            <td>Organizer Name :{{ $events->event_organizers->OrganizerName }} </td>  <br>
        </tr>
        <br>
    @endforeach
    </div>
@endsection