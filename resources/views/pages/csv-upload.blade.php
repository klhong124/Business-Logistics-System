@extends('base')

@section('main-content')

@if(!empty($error_message))
<div class="alert alert-danger" role="alert">
    {{$error_message}}
</div>
@endif

@if(!empty($python_last_message))
<div class="alert alert-success" role="alert">
    {{$python_last_message['name']}} has been uploaded at {{$python_last_message['time']}}
</div>
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
