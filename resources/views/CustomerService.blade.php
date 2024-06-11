@extends('Layout.layout')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">



    <!--=============== BOXICONS ===============-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="/css/CustomerService.css">
</head>

@section('title', 'Customer Service')
@section('content')
    <div class="customer__service" id="customer__service">
        <div class="customer__service__header">
            <h1 class="customer__service__title-center">Customer Service</h1>
            {{-- <i class="bx bx-x customer__service__close"></i> --}}
        </div>

        <div class="customer__service__wrapper">
            <div class="price__container">
                <article class="customer__service__prices">
                    <div class="customer__service__item-info-price">

                        <div class="customer__service__prices-details">
                            <div class="group__container">
                                <div class="form-group">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control underlined-input" value={{Auth::user()->name}}>

                                    <label class="form-label">E-mail</label>
                                    <input type="text" class="form-control underlined-input mb-1"
                                        value={{Auth::user()->email}}>
                                </div>

                                <!-- kalau email harus dikonfirmasi -->
                                <!-- <div class="alert alert-warning mt-3">
                                        Your email is not confirmed. Please check your inbox.<br>
                                        <a href="javascript:void(0)">Resend confirmation</a>
                                    </div> -->

                                <div class="form-group2">
                                    <label class="form-label">What can we help?</label>
                                    <textarea class="form-control" rows="5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nunc arcu, dignissim sit amet sollicitudin iaculis, vehicula id urna. Sed luctus urna nunc. Donec fermentum, magna sit amet rutrum pretium, turpis dolor molestie diam, ut lacinia diam risus eleifend sapien. Curabitur ac nibh nulla. Maecenas nec augue placerat, viverra tellus non, pulvinar risus.
                                    </textarea>
                                </div>
                            </div>

                            <div class="button__container">
                                <button class="send__button">Send</button>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>
@endsection
