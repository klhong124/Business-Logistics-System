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
        <li><a href="/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
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


                            @foreach($order_details as $detail)

                                @if ($detail->arrived_datetime !== null)
                                    
                                    <!-- timeline time label -->
                                    <li class="time-label">
                                        <span class="bg-red">
                                            {{date("d M.Y",strtotime($detail->arrived_datetime))}}
                                        </span>
                                    </li>
                                    <!-- /.timeline-label -->
                                    <!-- timeline item -->
                                    <li>
                                        <i class="fa fa-cubes bg-blue"></i>

                                        <div class="timeline-item">
                                            <span class="time"><i class="fa fa-clock-o"></i> {{date("H:i:s",strtotime($detail->arrived_datetime))}}</span>

                                            <h3 class="timeline-header">
                                                <a href="#">Good A</a> 
                                                arrived the 
                                                <a href="#">Warehouse A</a>
                                            </h3>

                                            <div class="timeline-footer">
                                                <a class="btn btn-success btn-xs">Received the good</a>
                                                <!-- <a class="btn btn-danger btn-xs">Delete</a> -->
                                            </div>
                                        </div>
                                    </li>
                                    <!-- END timeline item -->
                                @endif

                                @if ($detail->sent_datetime !== null)
                                    
                                    <!-- timeline time label -->
                                    <li class="time-label">
                                        <span class="bg-red">
                                            {{date("d M.Y",strtotime($detail->sent_datetime))}}
                                        </span>
                                    </li>
                                    <!-- /.timeline-label -->
                                    <!-- timeline item -->
                                    <li>
                                        <i class="fa fa-truck bg-yellow"></i>

                                        <div class="timeline-item">
                                            <span class="time"><i class="fa fa-clock-o"></i> {{date("H:i:s",strtotime($detail->sent_datetime))}}</span>

                                            <h3 class="timeline-header"><a href="#">The retailer</a> sent the good</h3>
                                        </div>
                                    </li>
                                    <!-- END timeline item -->
                                @endif

                            @endforeach
                            
                            <!-- END timeline item -->
                            <li>
                                <i class="fa fa-clock-o bg-gray"></i>
                            </li>
                        </ul>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include('adminlte-layouts.footer')
