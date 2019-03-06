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

                                @if ($invoice_details->pickup_time)

                                    <!-- timeline time label -->
                                    <li class="time-label">
                                        <span class="bg-red">
                                            {{date("d M.Y",strtotime($invoice_details->pickup_time))}}
                                        </span>
                                    </li>
                                    <!-- /.timeline-label -->
                                    <!-- timeline item -->
                                    <li>
                                        <i class="fa fa-cubes bg-blue"></i>

                                        <div class="timeline-item">
                                            <span class="time"><i class="fa fa-clock-o"></i> {{date("H:i:s",strtotime($invoice_details->pickup_time))}}</span>

                                            <h3 class="timeline-header">
                                                Goods arrived
                                            </h3>

                                            <div class="timeline-footer">
                                                <a href="{{url('/')}}/admin/confirm-order/{{$invoice_details->invoice_id}}" class="{{($invoice_details->complete_time != 0) ? 'btn btn-success btn-xs' : 'btn btn-info btn-xs'}}" {{($invoice_details->complete_time != 0) ? 'disabled' : ''}} > {{($invoice_details->complete_time != 0) ? 'Received the good' : 'Confirm'}} </a>
                                                <!-- <a class="btn btn-danger btn-xs">Delete</a> -->
                                            </div>
                                        </div>
                                    </li>
                                    <!-- END timeline item -->
                                @endif

                                @if ($invoice_details->order_time !== null)

                                    <!-- timeline time label -->
                                    <li class="time-label">
                                        <span class="bg-red">
                                            {{date("d M.Y",strtotime($invoice_details->order_time))}}
                                        </span>
                                    </li>
                                    <!-- /.timeline-label -->
                                    <!-- timeline item -->
                                    <li>
                                        <i class="fa fa-truck bg-yellow"></i>

                                        <div class="timeline-item">
                                            <span class="time"><i class="fa fa-clock-o"></i> {{date("H:i:s",strtotime($invoice_details->order_time))}}</span>

                                            <h3 class="timeline-header">{{$invoice_details->name}} sent the goods</h3>
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
                    <br>
                    <div class="box box-solid box-primary">
                        <div class="box-header">
                            <h3 class="box-title">Customer Information</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <th style="width: 50%">Customer Name</th>
                                        <td>{{$invoice_details->receiver_name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Contact</th>
                                        <td>{{$invoice_details->receiver_contact}}</td>
                                    </tr>
                                    <tr>
                                        <th>Address</th>
                                        <td>{{$invoice_details->address}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <div class="row">
                            <div class="col-md-12">
                                <div class="box box-solid box-info">
                                    <div class="box-header">
                                        <h3 class="box-title">Invoice Detail</h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body no-padding">
                                        <table class="table table-striped">
                                            <tbody>
                                                <tr>
                                                    <th>Invoice ID</th>
                                                    <td>{{$invoice_details->invoice_id}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Quantity</th>
                                                    <td>{{$invoice_details->quantity}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Net Weight</th>
                                                    <td>{{$invoice_details->weight}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Size</th>
                                                    <td>{{$invoice_details->size}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                    </div>

                </div>

            </section>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include('adminlte-layouts.footer')
