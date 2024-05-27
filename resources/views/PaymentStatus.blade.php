@extends('Layout.layout')

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="/css/PaymentStatus.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
</html>

@section('title', 'Payment')
@section('content')
        <div class = container>
            <img src="{{ asset('assets/FotoPayment/checkedLogo.png')  }}" class="chekced-img">
            <div class = container-header>
                <h2>Payment Successful</h2>      
            </div>

            <div class = payBtn>
                <a href="/"><p>Back To Main Page</p></a>
            </div>
        </div>
    
@endsection