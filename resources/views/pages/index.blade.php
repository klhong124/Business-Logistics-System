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
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 80vh;
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
                font-size: 8vw;
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
                font-size: 2vw;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-top: 20%;
                margin-bottom: 30px;
            }

            .popupbox{
                left: 0;
                bottom: 0;
                position: sticky;
                max-width: 100%;
                max-height: 100%;
            }

            .box{
                padding: 50px;
                outline: red solid 5px;
                width: 400px;
            }

            /*  Small devices (landscape phones, more than 576px) */
            @media (max-width: 576px) { 
                .box{
                    padding: 12px;
                    outline: red solid 2px;
                    width: 300px;
                }
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light" style="box-shadow: -2px -2px 16px rgba(0, 0, 0, .5);}">
            <a class="navbar-brand" href="{{url('/')}}">曹操速遞</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}/csv-upload-page">Upload a CSV</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Advanced
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ url('/') }}/service">Services</a>
                        <a class="dropdown-item" href="{{ url('/') }}/help">Help Center</a>
                        <a class="dropdown-item" href="{{ url('/') }}/about-us">About Us</a>
                        {{-- <div class="dropdown-divider"></div> --}}
                    </div>
                </li>
                </ul>
                <div class="form-inline my-2 my-lg-0">
                    @if (Route::has('login'))
                        @auth
                            <a class="nav-link" href="{{ url('/') }}/dashboard">Dashboard</a>
                            <a class="nav-link" href="{{ url('/') }}/logout"> logout </a>
                        @else
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                            @if (Route::has('register'))
                                <a class="nav-link" href="{{ route('register') }}">Register</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </nav>
        <div class="container content">
            <div class="row">
                <div class="col">
                    <div class="title m-b-md">
                        曹操速遞
                    </div>
                    <div class="link">
                        <a href="{{ url('/') }}/help">Track & Trace</a>
                        <a href="{{ url('/') }}/csv-upload-page">Shipping</a>
                    </div>
                </div>
            </div>
        </div>
        <div style="height: 156px;"></div>
        <footer class="text-muted text-small">
            <div class="popupbox">
                <form class="box" action="/query" method="get">
                    Enter your invoice code: <br>
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" placeholder="Invoice Code Search">
                        <button type="button" class="btn btn-outline-primary"><i class="fas fa-search"></i></button>
                    </div>
                </form> 
            </div>
        </footer>
    </body>
</html>