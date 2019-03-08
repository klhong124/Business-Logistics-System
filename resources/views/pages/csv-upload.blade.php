@extends('base')

@section('main-content')

@if(!empty($error_message))
<div class="alert alert-danger" role="alert">
    {{$error_message}}
</div>
@endif

@if(!empty($python_last_message))
  @if($python_last_message['status'] == 'success') 
    <div class="alert alert-success" role="alert">
      {{$python_last_message['name']}} has been uploaded at {{$python_last_message['time']}} 
      (Invoice ID:  <a href="/query?q={{$python_last_message['invoice_id']}}">{{$python_last_message['invoice_id']}}</a>)
    </div>
  @else
    <div class="alert alert-danger" role="alert">
      <p><strong>Error Occur:</strong></p>
      <p><b>Please check your .csv file </b></p>
      <hr>
      <p><small>{{$python_last_message['status']}}</small></p>
    </div>
  @endif
@endif

  <div class="div-space"></div>
  <div class="d-flex justify-content-center">
    <h1>Please upload your CSV file here. </h1>
  </div>
  <div class="d-flex justify-content-center">
    <div class="popupbox">
        <form class="box" action="/uploadCSV" method="post" enctype="multipart/form-data">
            @csrf
            Select file to upload:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Upload CSV" name="submit">
        </form>
    </div>
  </div>
  <div class="d-flex justify-content-center">
    <p><small>Only CSV file is accepted. </small></p>
  </div>
@endsection

<div class="div-space"></div>

<style>
  .div-space {
    min-height: 200px;
  }
</style>
