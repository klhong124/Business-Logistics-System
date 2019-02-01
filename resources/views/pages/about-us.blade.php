@extends('base')

@section('main-content')
  <body class="text-center">

  <div class="cover-container d-flex h-100 p-3 mx-auto flex-column">
    <header class="masthead mb-auto">
      {{-- <div class="inner">
        <h3 class="masthead-brand">Cover</h3>
        <nav class="nav nav-masthead justify-content-center">
          <a class="nav-link active" href="#">Home</a>
          <a class="nav-link" href="#">Features</a>
          <a class="nav-link" href="#">Contact</a>
        </nav>
      </div> --}}
    </header>

    <main role="main" class="inner cover">
      <h1 class="cover-heading">About Us</h1>
      <p class="lead">CC Express was established in Kowloon Tong, Hong Kong in 2016. We aim to provide promising logistic services to retailers and customers. Services including standard product delivery, product packaging and value-added services such as shipment storage and warehousing service.</p>
    </main>

    {{-- <footer class="mastfoot mt-auto">
      <div class="inner">
        <p>Cover template for <a href="https://getbootstrap.com/">Bootstrap</a>, by <a href="https://twitter.com/mdo">@mdo</a>.</p>
      </div>
    </footer> --}}
  </div>
</div>
@endsection

<style>
.cover-container {
  max-width: 42em;
}


/*
 * Header
 */
/* .masthead {
  margin-bottom: 2rem;
} */

/* .masthead-brand {
  margin-bottom: 0;
} */

.nav-masthead .nav-link {
  padding: .25rem 0;
  font-weight: 700;
  color: rgba(255, 255, 255, .5);
  background-color: transparent;
  border-bottom: .25rem solid transparent;
}

.nav-masthead .nav-link:hover,
.nav-masthead .nav-link:focus {
  border-bottom-color: rgba(255, 255, 255, .25);
}

.nav-masthead .nav-link + .nav-link {
  margin-left: 1rem;
}

.nav-masthead .active {
  color: #fff;
  border-bottom-color: #fff;
}

@media (min-width: 48em) {
  .masthead-brand {
    float: left;
  }
  .nav-masthead {
    float: right;
  }
}


/*
 * Cover
 */
.cover {
  padding: 0 1.5rem;
}
.cover .btn-lg {
  padding: .75rem 1.25rem;
  font-weight: 700;
}

.h-100 {
    max-height: 400px!important;
}


</style>
