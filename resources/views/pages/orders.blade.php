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
                            <th>Invoice No.</th>
                            <th>Client</th>
                            <th>Order Time</th>
                            <th>Details</th>
                            <th>Updated At</th>
                            <th>Archived</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($retailers as $value)
                            <tr>
                                <form method="POST" action="/admin/order-post">
                                    {!! csrf_field() !!}
                                    <td>12345678</td>
                                    <td>
                                        <a href="{{url('/')}}/admin/retailer/{{$value->id}}">
                                            <button type="button" class="btn btn-block btn-sm btn-link">{{$value->retailer_name}}</button>
                                        </a>
                                    </td>
                                    <td>2018-1-12 12:00:00</td>
                                    <td><a href="{{url('/')}}/admin/order-details"><button type="button" class="btn btn-block btn-sm btn-link">See More</button></a></td>
                                    <td>2018-1-12 12:00:00</td>
                                    <td class="archived-td">
                                        <div class="form-group">
                                            <select class="form-control form-control-sm" name="archived-choice" disabled>
                                                <option>Yes</option>
                                                <option>No</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td class="btn-group-td">
                                        <button type="button" class="btn btn-block btn-sm btn-primary edit-btn">Edit</button>
                                        <button type="submit" class="btn btn-block btn-sm btn-primary hide save-btn">Save</button>
                                        <button type="button" class="btn btn-block btn-sm btn-primary hide cancel-btn">Cancel</button>
                                    </td>
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
        var form = $(this).parent().parent();

        form.find('.archived-td').children().children().prop('disabled', false);
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
