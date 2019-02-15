<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CC Express</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
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
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
            }
            .link > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 16px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .popupbox{
                left:0;
                bottom:0;
                position:absolute;
            }
            .box{
                padding: 50px;
                outline: red solid 5px;
            }
            #trackbth{
                color:white;
                background:red;
                padding:5px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
        <div class="top-right links">
        <a href="{{ url('/') }}/dashboard">Services</a>
        <a href="{{ url('/') }}/dashboard">Help Center</a>
        <a href="{{ url('/') }}/about-us">About Us</a>
            @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/') }}/dashboard">Dashboard</a>
                        <a href="{{ url('/') }}/logout"> logout </a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
            @endif
            </div>
            <div class="content">
                <div class="title m-b-md">
                    曹操速遞
                </div>
                <div class="link">
                    <a href="{{ url('/') }}/service">Track & Trace</a>
                    <a href="{{ url('/') }}/help">Shipping</a>
                </div>
            </div>

            <div class="popupbox">
                <form class="box" action="/.php">
                            Enter your waybill number:<br>
                            <input type="text" name="order">
                            <input type="submit" value="Track" id="trackbth">
                </form> 
            </div>
        </div>
    </body>
</html>