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
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Invoice #</th>
            <th>Order Time</th>
            <th>Drop Off Time</th>
            <th>Pickup Time</th>
            <th>Update Time</th>
            <th>Quantity</th>
            <th>Weight</th>
            <th>Size</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th>{{$result->invoice_id}}</th>
            <td>{{$result->order_time}}</td>
            <td>{{$result->dropoff_time}}</td>
            <td>{{$result->pickup_time}}</td>
            <td>{{$result->update_time}}</td>
            <td>{{$result->quantity}}</td>
            <td>{{$result->weight}}</td>
            <td>{{$result->size}}</td>
            <td><a href="{{url('/')}}/admin/order-details/{{$result->invoice_id}}">View</a></td>
          </tr>
        </tbody>
      </table>
  </div>
@endif


  <div class="div-space"></div>

@endsection


<style>
  .div-space {
    min-height: 200px;
  }
</style>