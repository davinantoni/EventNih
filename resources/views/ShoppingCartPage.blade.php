@extends('Layout.layout')

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="/css/ShoppingCart.css">
    <script src="{{ asset('js/ShoppingCart.js') }}" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
</head>

</html>

@section('title', 'Cart')
@section('content')
    <div class=wrapper>
        <h1>Your Cart</h1>
        <div class=container>
            <div class=shop>
                @foreach ($eventCart as $item)
                    <div class=box>
                        @foreach ($item->events as $event)
                            <img src="{{ asset('assets/FotoAcara/' . $event->Photo) }}" class="payment-img">
                            <div class=content>
                                <h3>{{ $event->Title }}</h3>
                                <p>{{ $event->Date }}</p>
                                <p>📍{{ $event->City }}</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                    exercitation ullamco laboris nisi </p>
                                <div class="icon-container">
                                    <button class="icon-button1 heart-button"><i class="fas fa-heart"></i></button>
                                    <button class="icon-button trash-button"><i class="fas fa-trash-alt"></i></button>
                                    <div class="quantity-container">
                                        <button class="quantity-button decrease-button">-</button>
                                        <input type="number" value="1" min="1" class="quantity-input">
                                        <button class="quantity-button increase-button">+</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach

            </div>

            <div class=right-bar>
                <h1>Shopping Summary</h1>
                <p>
                    <span>Total</span>
                    <span>
                        Rp. {{ number_format($totalPrice, 0, ',', '.') }}
                    </span>
                </p>
                <hr>
                <a href="/Payment" class="payBtn">
                    <div>Pay</div>
                </a>
            </div>
        </div>
    </div>
@endsection
