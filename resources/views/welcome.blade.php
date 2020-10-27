<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
             html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 48px;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .links>a:hover {
            font-size: 14px;
            font-weight: 800;
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .links>a {
                font-size: 12px;
            }
            .links>a:hover {
                font-size: 13px;
            }

            .img-fluid {
                max-width: 100%;
            }

            .title {
                font-size: 90%;
            }
        }
        </style>
    </head>
    <body class="antialiased">
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
            <div class="top-right links">
                @auth
                <a href="{{ url('/home') }}">Home</a>
                @else
                <a href="{{ route('login') }}">Login</a>
                <!-- @if (Route::has('register'))
                {{-- <a
                    href="{{ route('register') }}">Register</a> --}}
                @endif -->
                @endauth
            </div>
            @endif
    
            <div class="content">
                <div>
                    <img class="img-fluid" width="100%" src="{{ asset('/images/BestShape.png') }}" alt="">
                </div>
                <div class="title">
                    ADMIN PANEL
                </div>
            </div>
    
        </div>
    </body>
</html>
