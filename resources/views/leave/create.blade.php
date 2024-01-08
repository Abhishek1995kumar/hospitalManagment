@extends('layouts.app')
@section('content')
@section('page_css')
    <!-- <link rel="stylesheet" href="{{ asset('assets/css/int-tel/css/intlTelInput.css') }}"> -->
    <!--add kishori code-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css"> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
  <!--kishori end code-->
@endsection
@section('header_toolbar')
    <div class="toolbar" id="kt_toolbar">
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                 data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                 class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Add Leave</h1>
            </div>
            <div class="d-flex align-items-left py-1">
                <a href="{{url('leave')}}"
              class="btn btn-sm btn-light btn-active-light-primary pull-right">{{ __('messages.common.back')}}</a>
            </div>
        </div>
    </div>
@endsection
 
<div class="card">
  <div class="card-header"></div>
  <div class="card-body">
      
      <form action="{{ url('leave') }}" method="post">
        {!! csrf_field() !!}
        <div class="form-group row">
          <div class="col-sm-4">
            
            <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3"> Name :</label>
            <input type="text" name="name" id="name" class="form-control">
          </div>
          <div class="col-sm-4">
            
            <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3"> Leave Reason :</label>
            <input type="text" name="leave_reason" id="leave_reason" class="form-control">
          </div>
          <div class="col-sm-4">
            
            <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3"> Description:</label>
             <input type="text" name="description" id="description" class="form-control"> 
           
          </div>
</div><br>
        <div class="form-group row">
          <div class="col-sm-4">
           
            <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3"> From Date:</label>
             <input type="date" name="leave_from" id="leave_from" class="form-control"> 
          </div>
          <div class="col-sm-4">
      
            <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3"> To Date:</label>
             <input type="date" name="leave_to" id="leave_to" class="form-control"> 
          </div>
         </div>
        <br>
        <div class="form-group">
          <input type="submit" value="Save" class="btn btn-primary mt-3">
        </div>
      
                              
    </form>
   
  </div>
</div>
@stop