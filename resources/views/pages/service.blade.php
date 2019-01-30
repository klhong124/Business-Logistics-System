@extends('base')

<!-- @include('base-header') -->

@section('content')
<link href="{{ asset('css/products.css') }}" rel="stylesheet">
<style>
	.bd-placeholder-img {
		font-size: 1.125rem;
		text-anchor: middle;
	}

	@media (min-width: 768px) {
		.bd-placeholder-img-lg {
			font-size: 3.5rem;
		}
	}

    .icon-center-grey {
        color: grey;
        margin-top: 18%
    }

    .icon-center-white {
        color: white;
        margin-top: 18%
    }
</style>
<body>

<div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
  <div class="col-md-5 p-lg-5 mx-auto my-5">
    <h1 class="display-4 font-weight-normal">Standard Express Service</h1>
  </div>
  <div class="product-device shadow-sm d-none d-md-block"></div>
  <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
</div>

<div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3">
  <div class="bg-dark mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden">
    <div class="my-3 py-3" style="height: 250px;">
      <h2 class="display-5">Service Introduction</h2>
      <p class="lead">C.C. Express provides high standard door-to-door express delivery service 365 days a year to ensure a competitive transit time for every shipment..</p>
    </div>
    <div class="bg-light shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"><i class="fas fa-truck fa-10x icon-center-grey"></i></div>
  </div>
  <div class="bg-light mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
    <div class="my-3 p-3" style="height: 250px;">
      <h2 class="display-5">Parcel Classification</h2>
      <p class="lead">Standard Express services include Document and Parcel Express.</p>
    </div>
    <div class="bg-dark shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"><i class="fas fa-scroll fa-10x icon-center-white"></i></div>
  </div>
</div>

<div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3">
  <div class="bg-light mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
    <div class="my-3 p-3" style="height: 250px;">
      <h2 class="display-5">Same Day Delivery Service</h2>
      <p class="lead">• Shipment could be delivered on the same day if the order is confirmed or the shipment is dropped off at the C.C. Express Service Centers before cut-off time. <hr>• Same day delivery service is applicable to the shipments where shipping and delivery addresses are both local Industrial / Commercial addresses.</p>
    </div>
    <div class="bg-dark shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"><i class="fas fa-archive fa-10x icon-center-white"></i></div>
  </div>
  <div class="bg-primary mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden">
    <div class="my-3 py-3" style="height: 250px;">
      <h2 class="display-5">Service Advantage</h2>
      <p class="lead">√ The service is relatively efficient and precise in time. <hr>√ C.C. also provides Cash on Delivery, Shipment Protection Plus Service, Pickup Authorization Service, Declaration Service and other value-added services.</p>
    </div>
    <div class="bg-light shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"><i class="fas fa-check-circle fa-10x icon-center-grey"></i></div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.2/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="/docs/4.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-zDnhMsjVZfS3hiP7oCBRmfjkQC4fzxVxFhBx8Hkz2aZX8gEvA/jsP3eXRCvzTofP" crossorigin="anonymous"></script>

</body>
@endsection
