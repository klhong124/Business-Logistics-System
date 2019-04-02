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
        <div class="box box-danger">
            <div class="box-body">
                <table id="order-list" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th><center> Invoice No. </center></th>
                            <th><center> Order Time </center></th>
                            <th><center> Retailer </center></th>
                            <th><center> Reciever </center></th>
                            <th><center> Updated At </center></th>
                            <th><center> Details </center></th>
                            <th><center> Archived </center></th>
                            @if (Auth::user()->role == '0')
                                <th></th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order_details as $order)
                            <tr>
                                <form method="POST" action="/admin/order-post">
                                    {!! csrf_field() !!}
                                    <!--Invoice No.-->
                                    <td>
                                        <center>
                                        <a style="color:black" href="{{url('/')}}/admin/order-details/{{$order->invoice_id}}">{{$order->invoice_id}}</a>
                                        <input hidden name="invoice_id" value="{{$order->invoice_id}}">
                                        </center> 
                                    </td>

                                     <!--Order Time-->
                                     <td><center>{{$order->order_time}}</center></td>

                                    <!--Retailer-->
                                    <td>
                                        <center> 
                                        <a style="color:black;text-align:center;" href="{{url('/')}}/admin/retailer/{{$order->shipper_id}}">{{$order->name}}</a>
                                        </center>
                                    </td>

                                    <!--Reciever-->
                                    <td><center>{{$order->receiver_name}}</center></td>
                                   
                                    <!--Updated At-->
                                    <td><center>{{$order->update_time}}</center></td>

                                    <!--Details-->
                                    <td><center><a href="{{url('/')}}/admin/order-details/{{$order->invoice_id}}"><button type="button" class="btn btn-block btn-sm btn-link">See More</button></a></center></td>

                                    <!--Archived-->
                                    {{-- check archived status --}}
                                        <td class="archived-td">
                                            <center>
                                            <div class="form-group">
                                                <select class="form-control form-control-sm" name="archived_choice" disabled>
                                                    <option {{($order->pickup_time != 0) ? 'selected' : ''}}>Yes</option>
                                                    <option {{($order->pickup_time == 0) ? 'selected' : ''}}>No</option>
                                                </select>
                                            </div>
                                            </center>
                                        </td>
                                        @if (Auth::user()->role == '0')
                                            <td class="btn-group-td">
                                                <center>
                                                    <button type="button" class="btn btn-block btn-sm btn-primary edit-btn" {{($order->pickup_time != 0) ? 'disabled' : ''}}>Edit</button>
                                                    <button type="submit" class="btn btn-block btn-sm btn-primary hide save-btn">Save</button>
                                                    <button type="button" class="btn btn-block btn-sm btn-primary hide cancel-btn">Cancel</button>
                                                </center>
                                            </td>
                                        @endif
                                </form>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- </section> -->
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@include('adminlte-layouts.footer')
<!-- datatable -->
<link rel="stylesheet" type="text/css" href="{{asset('dist/datatables/jquery.dataTables.css')}}">
<script type="text/javascript" charset="utf8" src="{{asset('dist/datatables/jquery.dataTables.js')}}"></script>

<style>
    .hide {
        display: none;
    }
</style>

<script>
$(document).ready(function() {
    $('#order-list').DataTable({
        'columnDefs': [
            {
                "className": "text-center",
                "orderable": false, "targets": [1, 3, 5, 6],
            }
        ],
        "scrollX": true
    });

    $('.edit-btn').click(function() {
        $(this).hide();
        var form = $(this).parent().parent().parent();

        form.find('.archived-td').children().children().children().prop('disabled', false);
        form.find('.btn-group-td .save-btn').removeClass('hide');
        form.find('.btn-group-td .cancel-btn').removeClass('hide');
    });

    $('.cancel-btn').click(function() {
        // var form = $(this).parent().parent();
        //
        // form.find('.archived-td').children().children().prop('disabled', true);
        // form.find('.btn-group-td .save-btn').addClass('hide');
        // form.find('.btn-group-td .cancel-btn').addClass('hide');
        // form.find('.btn-group-td .edit-btn').show();

        location.reload();
    });

} );
</script>
