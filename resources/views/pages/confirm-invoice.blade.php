@extends('base')

@section('main-content')

    <div class="container">
      <div style="height: 80px;"></div>
      <div class="py-5 text-center">
        {{-- <img class="d-block mx-auto mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72"> --}}
        <h2>Confirmation form</h2>
      </div>

      <div class="row">
        {{-- right hand side --}}
        <div class="col-md-4 order-md-2 mb-4">
          <div class="card" style="width: 18rem; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); transition: 0.3s;">
              <div class="card-body">
                
                <h5 class="card-title">{{$data->pickup_time == "" ? "QR Code" : "Order Status"}}</h5>
                <p class="card-text">{{$data->pickup_time == "" ? "Please scan the code below to confirm the order" : "Here is the latest status of your order"}}</p>
                <ul class="list-group mb-2">
                    <?php
                      // echo QRCode::url('http://'.$_SERVER['REMOTE_ADDR'].':8080/complete_invoice'.'/'.$data->invoice_id)
                      if( !empty($data->pickup_time) ){
                        echo 'Your order had been delivered at'.': '.$data->pickup_time; 
                      }else{
                        echo QRCode::url('http://ls27.asuscomm.com:302/complete_invoice/'.$invoice_id)
                        ->setSize(8)
                        ->setMargin(1)
                        ->svg();
                      }
                    ?>
                  </ul>
              </div>
            </div>
        </div>
        {{-- left hand side --}}
        <div class="col-md-8 order-md-1">
            <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); transition: 0.3s; padding: 36px;">
            <h4 class="mb-3">Receiver Details</h4>
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label>Name</label>
                  <input type="text" disabled class="form-control" value="{{$data->receiver_name}}">
                </div>
              </div>

              <div class="mb-3">
                <label>Contact</label>
                <div class="input-group">
                  <input type="text" disabled class="form-control" value="{{$data->receiver_contact}}">
                </div>
              </div>

              <div class="mb-3">
                <label for="address">Address</label>
                <input type="text" disabled class="form-control" value="{{$data->address}}">
              </div>
              {{-- placeholder --}}
              <hr class="mb-4"> 

              <div class="row">
                <div class="col-md-6 mb-3">
                  <h4 class="mb-3">Shipper</h4>
                    <ul class="list-group mb-3">
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                          <small>Name: </small>
                          <div>
                            <h6 class="my-0">{{$data->name}}</h6>
                          </div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                          <small>Email: </small>
                          <div>
                            <h6 class="my-0">{{$data->email}}</h6>
                          </div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <small>URL: </small>
                            <div>
                              <h6 class="my-0">{{$data->url}}</h6>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6 mb-3">
                    <h4 class="mb-3">Goods Information</h4>
                      <ul class="list-group mb-3">
                          <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <small>Quantity: </small>
                            <div>
                              <h6 class="my-0">{{$data->quantity}}</h6>
                            </div>
                          </li>
                          <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <small>Net Weight: </small>
                            <div>
                              <h6 class="my-0">{{$data->weight}}</h6>
                            </div>
                          </li>
                        </ul>
                </div>
              </div>
              
              <?php
                // echo QRCode::url('http://'.$_SERVER['REMOTE_ADDR'].':8080/complete_invoice'.'/'.$data->invoice_id)
                if( !empty($data->pickup_time) ){ ?>
                  <hr class="mb-4">
                  <button class="btn btn-primary btn-lg btn-block" type="submit" onclick="location.href='/print-invoice/{{$invoice_id}}';" ><i class="fas fa-print"></i> Print Invoice</button>
                <?php } ?>
          </div>
        </div>
      </div>
    </div>

   

@endsection

