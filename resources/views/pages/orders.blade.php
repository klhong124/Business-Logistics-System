@include('adminlte-layouts.header')
  <!-- Content Wrapper. Contains page content -->
    <script src="{{asset('dist/jquery.min.js')}}"></script>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Orders
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/')}}/admin/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Orders</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->
        <!-- timeline -->
            <!-- Main content -->
            <!-- <section class="content"> -->

                <table id="order-list" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Order Code</th>
                            <th>Client</th>
                            <th>Created At</th>
                            <th>Details</th>
                            <th>Updated At</th>
                            <th>Archived</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($retailers as $value)
                            <tr>
                                <td>12345678</td>
                                <td>
                                    <a href="{{url('/')}}/admin/retailer/{{$value->id}}">
                                        <button type="button" class="btn btn-block btn-sm btn-link">{{$value->retailer_name}}</button>
                                    </a>
                                </td>
                                <td>2018-1-12 12:00:00</td>
                                <td><a href="{{url('/')}}/admin/order-details"><button type="button" class="btn btn-block btn-sm btn-link">See More</button></a></td>
                                <td>2018-1-12 12:00:00</td>
                                <td>Yes/No</td>
                                <td><button type="button" class="btn btn-block btn-sm btn-primary">Edit</button></td>
                            </tr>
                        @endforeach
                        <!-- @for ($i = 0; $i < 100; $i++)
                            <tr>
                                <td>12345678</td>
                                <td>
                                    <button type="button" class="btn btn-block btn-sm btn-link">Apple Inc.</button>
                                </td>
                                <td>2018-1-12 12:00:00</td>
                                <td><a href="/order-details"><button type="button" class="btn btn-block btn-sm btn-link">See More</button></a></td>
                                <td>2018-1-12 12:00:00</td>
                                <td>Yes/No</td>
                                <td><button type="button" class="btn btn-block btn-sm btn-primary">Edit</button></td>
                            </tr>
                        @endfor -->
                    </tbody>
                </table>
            <!-- </section> -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @include('adminlte-layouts.footer')
  <!-- datatable -->
    <link rel="stylesheet" type="text/css" href="{{asset('dist/datatables/jquery.dataTables.css')}}">
    <script type="text/javascript" charset="utf8" src="{{asset('dist/datatables/jquery.dataTables.js')}}"></script>

    <script>
        $(document).ready(function() {
            $('#order-list').DataTable({
                'columnDefs': [
                    {
                        "className": "text-center",
                        "orderable": false, "targets": [1, 3, 6],
                    }
                ],
                "scrollX": true
            });
        } );
    </script>
