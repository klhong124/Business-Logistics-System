@include('adminlte-layouts.header')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Order Details
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/')}}/admin/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{url('/')}}/admin/orders"><i class="fa fa-list-alt"></i> Orders</a></li>
        <li class="active">Order Details</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->
        <!-- timeline -->
            <!-- Main content -->
            <section class="content">

                <!-- row -->
                <div class="row">
                    <div class="col-md-12">
                        <!-- The time line -->
                        <ul class="timeline">

                                @if ($data->arrived_datetime)

                                    <!-- timeline time label -->
                                    <li class="time-label">
                                        <span class="bg-red">
                                            {{date("d M.Y",strtotime($data->arrived_datetime))}}
                                        </span>
                                    </li>
                                    <!-- /.timeline-label -->
                                    <!-- timeline item -->
                                    <li>
                                        <i class="fa fa-cubes bg-blue"></i>

                                        <div class="timeline-item">
                                            <span class="time"><i class="fa fa-clock-o"></i> {{date("H:i:s",strtotime($data->arrived_datetime))}}</span>

                                            <h3 class="timeline-header">
                                                <a href="#">Good A</a>
                                                arrived
                                            </h3>

                                            <div class="timeline-footer">
                                                <a href="{{url('/')}}/admin/confirm-order/{{$data->invoice_id}}" class="{{($data->archived_status == 1) ? 'btn btn-success btn-xs' : 'btn btn-info btn-xs'}}" {{($data->archived_status == 1) ? 'disabled' : ''}} > {{($data->archived_status == 1) ? 'Received the good' : 'Confirm'}} </a>
                                                <!-- <a class="btn btn-danger btn-xs">Delete</a> -->
                                            </div>
                                        </div>
                                    </li>
                                    <!-- END timeline item -->
                                @endif

                                @if ($data->sent_datetime !== null)

                                    <!-- timeline time label -->
                                    <li class="time-label">
                                        <span class="bg-red">
                                            {{date("d M.Y",strtotime($data->sent_datetime))}}
                                        </span>
                                    </li>
                                    <!-- /.timeline-label -->
                                    <!-- timeline item -->
                                    <li>
                                        <i class="fa fa-truck bg-yellow"></i>

                                        <div class="timeline-item">
                                            <span class="time"><i class="fa fa-clock-o"></i> {{date("H:i:s",strtotime($data->sent_datetime))}}</span>

                                            <h3 class="timeline-header"><a href="#">The retailer</a> sent the good</h3>
                                        </div>
                                    </li>
                                    <!-- END timeline item -->
                                @endif

                            <!-- END timeline item -->
                            <li>
                                <i class="fa fa-clock-o bg-gray"></i>
                            </li>
                        </ul>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <div>
                    <h3>Customer Name</h3>
                    <h3>Contact</h3>
                    <h3>Description<h3>
                    <h3>Address</h3>

                    <h3>Proudct Name</h3>
                    <h3>Description</h3>
                    <h3>Weight</h3>
                </div>

            </section>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include('adminlte-layouts.footer')
