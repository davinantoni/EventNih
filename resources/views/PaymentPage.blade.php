@extends('Layout.layout')

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="/css/PaymentPage.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
</head>

</html>

@section('title', 'Payment')
@section('content')
    <div class=header>
        <h2>Choose Payment Method</h2>
    </div>

    <form action="AddTransaction" method="POST">
        @csrf
        <div class=container>
            <div class=container-header>
                <h2>Total Payment</h2>
                <h2>Rp. {{ number_format($totalPrice, 0, ',', '.') }}</h2>
            </div>

            <div class=content>
                <img src="{{ asset('assets/FotoPayment/gopayLogo.png') }}" class="payment-img">
                <p>GoPay</p>
                <div class=radioBtn>
                    <input type="radio" name="0" id="radioBtn">
                </div>
            </div>

            <div class=content>
                <img src="{{ asset('assets/FotoPayment/danaLogo.png') }}" class="payment-img">
                <p>DANA</p>
                <div class=radioBtn>
                    <input type="radio" name="0" id="radioBtn">
                </div>
            </div>

            <div class=content>
                <img src="{{ asset('assets/FotoPayment/linkajaLogo.png') }}" class="payment-img">
                <p>LinkAja</p>
                <div class=radioBtn>
                    <input type="radio" name="0" id="radioBtn">
                </div>
            </div>

            <div class=content>
                <img src="{{ asset('assets/FotoPayment/bcaLogo.png') }}" class="payment-img">
                <p>BCA</p>
                <div class=radioBtn>
                    <input type="radio" name="0" id="radioBtn">
                </div>
            </div>

            {{-- <a href="/PaymentStatus" class="payBtn">
                        <div>Pay</div>
                    </a>  
             </div> --}}
            <button type="submit" class="payBtn">Pay</button>
        </div>
    </form>

@endsection
