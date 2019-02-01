@extends('base')

@section('main-content')
  <div class="div-space"></div>
  <div class="d-flex justify-content-center">
      <form class="form-inline mt-2 mt-md-0" method="GET" action="/query">
            <input class="form-control" type="text" name="q" placeholder="Invoice Code Search">
            <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
      </form>
  </div>
  <div class="d-flex justify-content-center">
    <p><small>You may put down your invoice code in the above search box for more invoice details. </small></p>
  </div>
@if(!empty($result))
  <div class="d-flex justify-content-center">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Invoice</h5>
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Invoice #</th>
              <th>Source</th>
              <th>Order Time</th>
              <th>Details</th>
              <th>Update At</th>
              <th>Received</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th>{{$result->invoice_id}}</th>
              <td>{{$result->retailer_name}}</td>
              <td>{{$result->received_datetime}}</td>
              <td><a href="{{url('/')}}/admin/order-details/{{$result->invoice_id}}">View</a></td>
              <td>{{$result->updated_at}}</td>
              <td>{{$result->archived_status}}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endif


  <div class="div-space"></div>

@endsection


<style>
  .div-space {
    min-height: 200px;
  }
</style>
