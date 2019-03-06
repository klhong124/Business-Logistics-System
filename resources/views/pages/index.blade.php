<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CC Express</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
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
                max-width: 100%;
                max-height: 100%;
            }

            .box{
                padding: 50px;
                outline: red solid 5px;
            }

            /*  Small devices (landscape phones, more than 576px) */
            @media (max-width: 576px) { 
                .box{
                    padding: 15px;
                    outline: red solid 2px;
                }
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
        <div class="top-right links">
        <a href="{{ url('/') }}/csv-upload-page">Upload a CSV</a>
        <a href="{{ url('/') }}/service">Services</a>
        <a href="{{ url('/') }}/help">Help Center</a>
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
                <form class="box" action="/query" method="get">
                    Enter your invoice code: <br>
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" placeholder="Invoice Code Search">
                        <button type="button" class="btn btn-outline-primary"><i class="fas fa-search"></i></button>
                    </div>
                </form> 
                <!-- <form class="box" action="/uploadCSV" method="post" enctype="multipart/form-data">
                    @csrf
                    Select image to upload:
                    <input type="file" name="fileToUpload" id="fileToUpload">
                    <input type="submit" value="Upload Image" name="submit">
                </form> -->
            </div>
        </div>
    </body>
</html>