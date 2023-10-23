<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <style>
            body {
                font-family: 'Nunito';
            }
            .container {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }
            .btn {
                display: block;
                margin: 10px;
                padding: 10px 20px;
                font-size: 18px;
                text-align: center;
                text-decoration: none;
                color: #fff;
                background: #4299e1;
                border-radius: 5px;
                transition: background 0.3s ease;
            }
            .btn:hover {
                background: #3182ce;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="container">
            @if (Route::has('login'))
                <a href="{{ route('login') }}" class="btn">Login</a>
            @endif
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="btn">Register</a>
            @endif
        </div>
    </body>
</html>
