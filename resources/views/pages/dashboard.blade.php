@include('adminlte-layouts.header')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Welcome back!
        <small>username here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      </ol>
      <p id="datetime"></p>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

    </section>
  </div>
  <script>
    var d = new Date();
    document.getElementById("datetime").innerHTML = d;
  </script>

  @include('adminlte-layouts.footer')
