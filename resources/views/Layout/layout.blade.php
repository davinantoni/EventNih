<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/layout.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <title>EventNih! | @yield('title')</title>
</head>
<body>
    <nav class="navbarr">
        <div class="navbar-left">
            <a href="/">
                <img src="/assets/logo.png" alt="Logo" class="logo">
            </a>
        </div>
        <div class="navbar-center">
            <form action="" method="GET">
                <input type="text" class="search-input" placeholder="Find your favorite event here" name="keyword">
                <button class="search-button">
                    <img src="/assets/search.png" alt="Search">
                </button>
            </form>
        </div>
        <div class="navbar-right">
            <a href="/CreateEvent" class="create-event">Create Event</a>
            <a href="/ShoppingCart">
                <img src="/assets/shopping-cart.png" alt="Cart" class="icon">
            </a>
            <a href="/Profile">
                <img src="/assets/profile.png" alt="Profile" class="icon">
            </a>          
        </div>
    </nav>


    @yield('content')

    <footer class="footer">
        <div class="footer-top">
            <div class="footer-logo">
                <img src="/assets/logo.png" alt="Logo">
            </div>
            <p class="footer-description">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur condimentum suscipit libero, eget rutrum arcu efficitur eu.
            </p>
        </div>
        <hr class="footer-divider">
        <div class="footer-middle">
            <h4>Follow Us</h4>
            <ul class="social-links">
                <li><a href="https://instagram.com"><img src="/assets/instagram.png" alt="Instagram"> @Instagram</a></li>
                <li><a href="https://twitter.com"><img src="/assets/twitter.png" alt="Twitter"> @Twitter</a></li>
                <li><a href="https://youtube.com"><img src="/assets/youtube.png" alt="YouTube"> YouTube</a></li>
            </ul>
        </div>
        <div class="footer-bottom">
            <p>©EventNih!, 2024. ALL RIGHTS RESERVED <span class="separator">•</span> <a href="/CustomerService">Contact Us</a></p>
        </div>
    </footer>
</body>
</html>