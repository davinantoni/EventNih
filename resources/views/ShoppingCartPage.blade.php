@extends('Layout.layout')

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="/css/ShoppingCart.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

</html>

@section('title', 'Cart')
@section('content')
    <div class="wrapper">
        <h1>Your Cart</h1>
        @if ($eventCart->isEmpty())
            <div class="empty-cart-message">Your cart is empty</div>
        @else
            <div class="container">
                <div class="shop">
                    @foreach ($eventCart as $item)
                        <div class="box">
                            @foreach ($item->events as $event)
                                <img src="{{ asset('assets/FotoAcara/' . $event->Photo) }}" class="payment-img">
                                <div class="content">
                                    <h3>{{ $event->Title }}</h3>
                                    <p>{{ $event->Date }}</p>
                                    <p>📍{{ $event->City }}</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                        exercitation ullamco laboris nisi </p>
                                    <div class="icon-container">
                                        <button class="icon-button1 heart-button"><i class="fas fa-heart"></i></button>
                                        <button class="icon-button trash-button" data-cart-id="{{ $item->id }}"><i
                                                class="fas fa-trash-alt"></i></button>
                                        <div class="quantity-container">
                                            <button class="quantity-button decrease-button"
                                                data-cart-id="{{ $item->id }}">-</button>
                                            <input type="number" value="{{ $item->Quantity }}" min="1"
                                                class="quantity-input" data-cart-id="{{ $item->id }}">
                                            <button class="quantity-button increase-button"
                                                data-cart-id="{{ $item->id }}">+</button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>

                <div class="right-bar">
                    <h1>Shopping Summary</h1>
                    <p>
                        <span>Total</span>
                        <span>
                            Rp. {{ number_format($totalPrice, 0, ',', '.') }}
                        </span>
                    </p>
                    <hr>
                    <a href="/Payment" class="payBtn">
                        <div>Checkout</div>
                    </a>
                </div>
            </div>
        @endif
    </div>
    <script>
        $(document).ready(function() {
            // Update quantity
            $('.quantity-button').click(function() {
                var button = $(this);
                var cartId = button.data('cart-id');
                var input = $('input[data-cart-id="' + cartId + '"]');
                var newQuantity = parseInt(input.val());

                if (button.hasClass('increase-button')) {
                    newQuantity++;
                } else if (button.hasClass('decrease-button')) {
                    newQuantity = newQuantity > 1 ? newQuantity - 1 : 1;
                }

                input.val(newQuantity);

                $.ajax({
                    url: '{{ route('cart.updateQuantity') }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        cart_id: cartId,
                        quantity: newQuantity
                    },
                    success: function(response) {
                        alert(response.message);
                        location.reload(); // Refresh page to update total price
                    },
                    error: function(xhr) {
                        alert('Error: ' + xhr.responseText);
                    }
                });
            });

            // Delete item
            $('.trash-button').click(function() {
                var cartId = $(this).data('cart-id');

                $.ajax({
                    url: '{{ route('cart.deleteItem') }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        cart_id: cartId
                    },
                    success: function(response) {
                        alert(response.message);
                        location.reload(); // Refresh page to remove deleted item
                    },
                    error: function(xhr) {
                        alert('Error: ' + xhr.responseText);
                    }
                });
            });
        });
    </script>
@endsection
