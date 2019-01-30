@include('adminlte-layouts.header')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Profile
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->
        <div class="box box-danger">
            <div class="box-body">
                <form method="POST" action="/admin/change-profile">
                    {!! csrf_field() !!}
                    <!-- text input -->
                    <div class="form-group">
                        <label>Email:</label>
                        <input type="text" class="form-control" disabled value="{{$data->email}}">
                    </div>
                    <div class="form-group">
                        <label>Join At:</label>
                        <input type="text" class="form-control" disabled value="{{$data->created_at}}">
                    </div>
                    <div class="form-group">
                        <label>User Name:</label>
                        <input type="text" name="username" class="form-control" value="{{$data->name}}">
                    </div>
                    <button type="submit" class="btn btn-primary">Confirm</button>
                </form>
            </div>
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include('adminlte-layouts.footer')
