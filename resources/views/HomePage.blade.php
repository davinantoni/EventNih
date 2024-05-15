@extends('Layout.layout')

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="/css/HomePage.css">
</head>
</html>

@section('title', 'Home')
@section('content')
    <div class="container">
        <h1>Event</h1>
        <div class="card-container">
            @foreach ($event as $events)
            <div class="card">
                <img src="{{ asset('assets/FotoAcara/'.$events->Photo)  }}" alt="Event Photo" class="card-image">
                <div class="card-content">
                    <h2 class="card-title">{{ $events->Title }}</h2>
                    <p class="card-date">{{ date('j F Y', strtotime($events->Date)) }}</p>
                    <p class="card-location">📍 {{ $events->Location }}</p>
                    <p class="card-price">Rp {{ number_format($events->Price, 2) }}</p>
                </div>
            </div>
            @endforeach 
        </div>    
    </div>
    
@endsection