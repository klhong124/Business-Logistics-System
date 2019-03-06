@include('adminlte-layouts.header')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Retailer
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}/admin/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{url('/')}}/admin/orders"><i class="fa fa-list-alt"></i> Orders</a></li>
            <li class="active">Retailer</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <!-- Flash messge -->
        @if (Session::has('message'))
            <div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <p>{{ Session::get('message') }}</p>
            </div>
        @endif
        <!--------------------------
        | Your Page Content Here |
        -------------------------->
        <div class="col-md-8">
            <!-- Widget: user widget style 1 -->
            <div class="box box-widget widget-user-2">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-yellow">
                    <div class="widget-user-image">
                        <img class="img-circle" src="{{url('/')}}/dist/img/avatar2.png" alt="User Avatar">
                    </div>
                    <!-- /.widget-user-image -->
                    <a href="#"><h3 class="widget-user-username">{{$data->name}}</h3></a>
                    <h5 class="widget-user-desc">Join at: {{$data->created_at}}</h5>
                </div>
            </div>
            <div class="box-footer">
                <form action="/admin/post-retailer-info" method="POST">
                    {!! csrf_field() !!}
                    <input hidden name="id" value="{{$data->shipper_id}}">
                    <div class="form-group" >
                        <label class="desc-text-wrap">Name:</label>
                        <input type="text" class="form-control" name="retailer_name" value="{{$data->name}}" {{(Auth::user()->role == '0' || Auth::user()->id == $data->shipper_id) ? '' : 'disabled'}}>
                    </div>
                    <div class="form-group">
                        <label class="desc-text-wrap">Description:</label>
                        <textarea class="form-control" rows="5" name="description" {{(Auth::user()->role == '0' || Auth::user()->id == $data->shipper_id) ? '' : 'disabled'}}>{{$data->description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label class="desc-text-wrap">Website:</label>
                        <input type="text" class="form-control" name="url" value="{{$data->url}}" {{(Auth::user()->role == '0' || Auth::user()->id == $data->shipper_id) ? '' : 'disabled'}}>
                    </div>
                    <button type="submit" class="btn btn-primary" style="display: {{(Auth::user()->role == '0' || Auth::user()->id == $data->shipper_id) ? '' : 'none'}}")>Save</button>
                </form>
            </div>
            <!-- /.widget-user -->
        </div>
        <div class="col-md-4">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Sales</span>
                        <span class="info-box-number">{{$count}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
        </div>
    </section>
            <!-- /.content -->
</div>

<!-- /.content-wrapper -->
<style>
    .desc-text-wrap {
        padding-left: 10px;
        font-style: oblique;
        font-weight: bold;
    }
    .px-2 {
        padding-left: ($spacer * .5) !important;
        padding-right: ($spacer * .5) !important;
    }
</style>
@include('adminlte-layouts.footer')
