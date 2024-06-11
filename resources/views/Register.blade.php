<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Register </title>
    <link rel="stylesheet" href="/css/Register.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    
</head>
<body>
    <div class="container">
        <div class="register-box">
            <div class="logo">
                <img src="/assets/Logo.png" alt="EventNih!">
            </div>

            <h2>Create Your Account</h2>

            @if (Session::has('status'))
                <div class="success-alert">
                    {{ Session::get('message') }}
                </div>
            @endif
            <form action="" method="POST">
                @csrf
                <div class="input-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="name" required>
                </div>
                <div class="input-group">
                    <label for="email">E-Mail</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="input-group">
                    <label for="confirm-password">Confirm Password</label>
                    <input type="password" id="confirm-password" name="password_confirmation" required>
                </div>
                <div class="terms">
                    <input class="checkbox" type="checkbox" id="terms" name="terms" required >
                    <label for="terms">I agree to the <a href="#">terms & conditions</a> and the <a href="#">privacy policy</a></label>
                </div>
                <button type="submit" class="register-btn">Register</button>
                <div class="login-link">
                    Already have an account? <a href="/Login" class="login">Login now!</a>
                </div>
            </form>
            @if ($errors->any())
                <div class="error-alert" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
    
</body>
</html>