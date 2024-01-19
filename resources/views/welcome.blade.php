<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Twubric</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: white;
            font-size: 16px;
            /* Adjusted font size */
        }

        .container {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        .login-box {
            max-width: 500px;
            width: 100%;
            padding: 30px;
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .login-box h1 {
            font-size: 28px;
            /* Adjusted heading font size */
            margin-bottom: 20px;
        }
    </style>
</head>

<body class="antialiased">

    <div class="container">
        <div class="login-box">
            <h1 class="text-center">Twubric</h1>
            @if (Route::has('login'))
            <div class="text-right mb-3">
                @auth
                <a href="{{ url('/home') }}" class="btn btn-sm btn-outline-primary">GO BACK</a>
                @else
                <a href="{{ route('login') }}" class="btn btn-sm btn-outline-primary">Log in</a>

                @if (Route::has('register'))
                <a href="{{ route('register') }}" class="btn btn-sm btn-outline-secondary ml-2">Register</a>
                @endif
                @endauth
            </div>
            @endif
        </div>
    </div>

    <!-- Bootstrap JS (Optional, if you need it) -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>