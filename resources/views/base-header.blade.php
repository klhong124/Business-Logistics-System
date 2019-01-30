<style>
    html, body {
        background-color: #fff;
        color: #636b6f;
        /* font-family: 'Nunito', sans-serif; */
        font-weight: 200;
        height: 100vh;
        margin: 0;
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
        right: 10px;
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
        text-transform: uppercase;
    }

    .m-b-md {
        margin-bottom: 30px;
    }
</style>

<header>
    <nav class="navbar navbar-expand-md navbar-light fixed-top bg-light" style="box-shadow: -2px -2px 16px rgba(0, 0, 0, .5);}">
        <a class="navbar-brand" href="{{ url('/') }}">曹操速遞</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <div class="dropdown">
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{$page_name}}
                    </button>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" {{($page_name == 'Service') ? 'hidden' : ''}} href="{{ url('/') }}/service">Service</a>
                        <a class="dropdown-item" {{($page_name == 'Help') ? 'hidden' : ''}} href="{{ url('/') }}/help">Help</a>
                        <a class="dropdown-item" {{($page_name == 'About Us') ? 'hidden' : ''}} href="{{ url('/') }}/about-us">About Us</a>
                    </div>
                </div>
            </ul>

            <div class="flex-center position-ref full-height">
                @if (Route::has('login'))
                    <div class="top-right links">
                        @auth
                            <a href="{{ url('/') }}/dashboard">Dashboard</a>
                            <a href="{{ url('/') }}/logout"> logout </a>
                        @else
                            <a href="{{ route('login') }}">Login</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>

            {{-- <form class="form-inline mt-2 mt-md-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form> --}}
    </div>
</nav>
</header>
