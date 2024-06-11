@extends('Layout.layout')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/CreateEvent.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
</head>

</html>

@section('title', 'Create Event')
@section('content')
    
    <div class="container">
        <form action="event" class="event-form" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="upload-banner">
                <input type="file" id="fileUpload" hidden name="photo">
                <label for="fileUpload">
                    <div class="upload-container">
                        <div class="upload-icon">+</div>
                        <div class="upload-text">Upload your event poster/banner here</div>
                    </div>
                </label>
            </div>
            <div class="event-section">
                <div class="left-section">
                    <div class="form-group">
                        <label for="event-name">Event Name</label>
                        <input type="text" id="event-name" name="Title" placeholder="Enter event name">
                    </div>

                    <div class="form-group">
                        <label for="event-description">Event Description</label>
                        <textarea id="event-description" name="Description" placeholder="Enter event description"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="category">Category</label>
                        <select id="category" name="EventType_id">
                            <option value="">Choose event category</option>
                            @foreach ($eventTypes as $item)
                                <option value="{{ $item->id }}">{{ $item->Type_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="right-section">
                    <div class="form-group">
                        <label>City & Location</label>
                        <div class="city-location-container">
                            <div class="city-input">
                                <input type="text" id="event-city" name="City" placeholder="Enter event city">
                            </div>
                            <div class="loc-input">
                                <input type="text" id="event-location" name="Location" placeholder="Enter event location">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Date & Time</label>
                        <div class="date-time-container">
                            <div class="date-input">
                                <input type="text" placeholder="Date" name="Date" onfocus="(this.type='date')"
                                    onblur="(this.type='text')">
                            </div>
                            <div class="time-input">
                                <input type="text" placeholder="Start time" name="Start_time"
                                    onfocus="(this.type='time')" onblur="(this.type='text')">
                                <input type="text" placeholder="End time" name="End_time" onfocus="(this.type='time')"
                                    onblur="(this.type='text')">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Seat & Price</label>
                        <div class="seat-price-container">
                            <input type="text" id="seat" name="Seat" placeholder="Enter seat">
                            <input type="text" id="price" name="Price" placeholder="Enter price">
                        </div>
                    </div>
                </div>
            </div>

            <h3 class="organizer-title">Organizer Info</h3>
            <div class="organizer-section">
                <div class="left-section">
                    <div class="form-group">
                        <label for="organizer-name">Name</label>
                        <input type="text" id="organizer-name" name="OrganizerName" placeholder="Enter your name">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="OrganizerEmail" placeholder="Enter your email">
                    </div>
                </div>

                <div class="right-section">
                    <div class="form-group">
                        <label for="phone-number">Phone Number</label>
                        <input type="tel" id="phone-number" name="OrganizerPhoneNumber"
                            placeholder="Enter your phone number">
                    </div>
                </div>
            </div>

            <button class="createButton" type="submit">Create</button>
        </form>
    </div>
    @if ($errors->any())
        <div class="error-alert" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (Session::has('status'))
        <div class="success-alert">
            {{Session::get('message')}}
        </div>
    @endif
@endsection
