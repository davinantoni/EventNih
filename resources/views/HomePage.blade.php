@extends('Layout.layout')

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="/css/HomePage.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js" defer></script>
    <script src="/js/HomePage.js" defer></script>

</head>
</html>

@section('title', 'Home')
@section('content')
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img src="assets/slider1.jpg" alt="">
            </div>
            <div class="swiper-slide">
                <img src="assets/slider2.jpg" alt="">
            </div>
            <div class="swiper-slide">
                <img src="assets/slider3.jpg" alt="">
            </div>
            </div>
        <div class="swiper-pagination"></div>
    </div>

    <div class="filter-container">
        <div class="filter-form">
            <form method="GET" action="{{ url('/') }}">
                <select name="location">
                    <option value="">Select Location</option>
                    @foreach($locations as $location)
                        <option value="{{ $location }}" {{ request('location') == $location ? 'selected' : '' }}>{{ $location }}</option>
                    @endforeach
                </select>
        
                <select name="category">
                    <option value="">Select Category</option>
                    @foreach($eventTypes as $eventType)
                        <option value="{{ $eventType }}" {{ request('category') == $eventType ? 'selected' : '' }}>{{ $eventType }}</option>
                    @endforeach
                </select>
        
                <select name="sort_by">
                    <option value="">Sort By</option>
                    <option value="newest" {{ request('sort_by') == 'newest' ? 'selected' : '' }}>Newest</option>
                    <option value="cheapest" {{ request('sort_by') == 'cheapest' ? 'selected' : '' }}>Cheapest</option>
                    <option value="most_expensive" {{ request('sort_by') == 'most_expensive' ? 'selected' : '' }}>Most Expensive</option>
                </select>  
                <div class="filter-button">
                    <button type="submit">Filter</button>
                    <button type="button" onclick="window.location='{{ url('/') }}'">Reset</button>
                </div>
            </form>
        </div>
    </div>

    <div class="eventCard-container">
        <h1>Event</h1>
        <div class="card-container">
            @foreach ($event as $events)
            <a href="/{{$events->id}}" class="card-link"> 
                <div class="card">
                    <img src="{{ asset('assets/FotoAcara/'.$events->Photo)  }}" alt="Event Photo" class="card-image">
                    <div class="card-content">
                        <h2 class="card-title">{{ $events->Title }}</h2>
                        <p class="card-date">{{ date('j F Y', strtotime($events->Date)) }}</p>
                        <p class="card-location">📍 {{ $events->Location }}</p>
                        <p class="card-price">Rp {{ number_format($events->Price, 2) }}</p>
                    </div>
                </div>
            </a>
            @endforeach 
        </div>    
    </div>
    
@endsection