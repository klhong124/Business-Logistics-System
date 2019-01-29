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
                    <a href="#"><h3 class="widget-user-username">{{$data->retailer_name}}</h3></a>
                    <h5 class="widget-user-desc">Join at: {{$data->created_at}}</h5>
                </div>
            </div>
            <div class="box-footer">
                <form action="/admin/post-retailer-info" method="POST">
                    {!! csrf_field() !!}
                    <input hidden name="id" value="{{$data->id}}">
                    <div class="form-group" >
                        <label class="desc-text-wrap">Name:</label>
                        <input type="text" class="form-control" name="retailer_name" value="{{$data->retailer_name}}">
                    </div>
                    <div class="form-group">
                        <label class="desc-text-wrap">Description:</label>
                        <textarea class="form-control" rows="5" name="description">{{$data->description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label class="desc-text-wrap">Website:</label>
                        <input type="text" class="form-control" name="url" value="{{$data->url}}">
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
            <!-- /.widget-user -->
        </div>
        <div class="col-md-4">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Browser Usage</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="chart-responsive">
                                <canvas id="pieChart" height="155" width="162" style="width: 162px; height: 155px;"></canvas>
                            </div>
                            <!-- ./chart-responsive -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-4">
                            <ul class="chart-legend clearfix">
                                <li><i class="fa fa-circle-o text-red"></i> Chrome</li>
                                <li><i class="fa fa-circle-o text-green"></i> IE</li>
                                <li><i class="fa fa-circle-o text-yellow"></i> FireFox</li>
                                <li><i class="fa fa-circle-o text-aqua"></i> Safari</li>
                                <li><i class="fa fa-circle-o text-light-blue"></i> Opera</li>
                                <li><i class="fa fa-circle-o text-gray"></i> Navigator</li>
                            </ul>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer no-padding">
                    <ul class="nav nav-pills nav-stacked">
                        <li><a href="#">United States of America
                            <span class="pull-right text-red"><i class="fa fa-angle-down"></i> 12%</span></a>
                        </li>
                        <li><a href="#">India <span class="pull-right text-green"><i class="fa fa-angle-up"></i> 4%</span></a>
                        </li>
                        <li><a href="#">China
                            <span class="pull-right text-yellow"><i class="fa fa-angle-left"></i> 0%</span></a>
                        </li>
                    </ul>
                </div>
                        <!-- /.footer -->
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
