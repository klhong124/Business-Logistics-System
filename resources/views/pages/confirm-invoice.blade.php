@extends('base')

@section('main-content')

    <div class="container">
      <div style="height: 200px;"></div>
      <div class="py-5 text-center">
        {{-- <img class="d-block mx-auto mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72"> --}}
        <h2>Confirmation form</h2>
      </div>

      <div class="row">
        {{-- right hand side --}}
        <div class="col-md-4 order-md-2 mb-4">
          <div class="card" style="width: 18rem;">
              <div class="card-body">
                <h5 class="card-title">QR Code</h5>
                <p class="card-text">Please scan the code below to confirm the order</p>
                <ul class="list-group mb-2">
                    <?php
                      echo QRCode::url('http://'.$_SERVER['REMOTE_ADDR'].':8080/complete_invoice'.'/'.$data->invoice_id)
                      // echo QRCode::url('http://ls27.asuscomm.com:8080/complete_invoice/60')
                      ->setSize(8)
                      ->setMargin(2)
                      ->svg();
                    ?>
                  </ul>
              </div>
            </div>
        </div>

        {{-- left hand side --}}
        <div class="card-body">
          <div class="col-md-8 order-md-1">
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
                  <input type="text" disabled class="form-control" value="{{$data->contact}}">
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
              <hr class="mb-4">
              <button class="btn btn-primary btn-lg btn-block" type="submit"><i class="fas fa-print"></i> Print Invoice</button>
          </div>
        </div>
      </div>
    </div>

   

@endsection

