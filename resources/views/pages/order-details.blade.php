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
                                                Goods arrived
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

                                            <h3 class="timeline-header">{{$data->warehouse}} sent the goods</h3>
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
                                        <td>{{$customer_info_str->customer_name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Contact</th>
                                        <td>{{$customer_info_str->contact}}</td>
                                    </tr>
                                    <tr>
                                        <th>Description</th>
                                        <td>{{$customer_info_str->description}}</td>
                                    </tr>
                                    <tr>
                                        <th>Address</th>
                                        <td>{{$customer_info_str->address}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <div class="row">
                        @foreach ($product_list_str as $key => $product)
                            <div class="col-md-6">
                                <div class="box box-solid box-info">
                                    <div class="box-header">
                                        <h3 class="box-title">Product Information</h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body no-padding">
                                        <table class="table table-striped">
                                            <tbody>
                                                <tr>
                                                    <th style="width: 50%">Proudct Name</th>
                                                    <td>{{$product->product_name}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Description</th>
                                                    <td>{{$product->description}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Quantity</th>
                                                    <td>{{$product->qty}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Net Weight</th>
                                                    <td>{{$product->weight}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>

            </section>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include('adminlte-layouts.footer')
