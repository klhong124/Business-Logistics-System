@include('adminlte-layouts.header')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Change Password
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/')}}/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Change Password</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <!-- Flash messge -->
      @if(Session::has('message'))
       <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <p>{{ Session::get('message') }}</p>
        </div>
      @endif
      @if(Session::has('success'))
       <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <p>{{ Session::get('success') }}</p>
        </div>
      @endif

      <!--------------------------
        | Your Page Content Here |
        -------------------------->
        <div class="box box-danger">
            <div class="box-body">
                <form action="/admin/reset-password" method="POST">
                  {!! csrf_field() !!}
                  <div class="form-group">
                    <label>Origin Password</label>
                    <input type="password" class="form-control" name="oldPassword" placeholder="Password to login">
                    <small class="form-text text-muted">We'll never disclose your with anyone else.</small>
                  </div>
                  <div class="form-group">
                    <label>New Password</label>
                    <input type="password" class="form-control" name="newPasswordA" placeholder="New Password">
                  </div>
                  <div class="form-group">
                    <label>Confirm New Password</label>
                    <input type="password" class="form-control" name="newPasswordB" placeholder="Confirm New Password">
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include('adminlte-layouts.footer')
