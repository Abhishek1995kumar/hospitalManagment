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
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
@section('header_toolbar')
    <div class="toolbar" id="kt_toolbar">
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                 data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                 class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Attendance Master</h1>
            </div>
            <div class="d-flex align-items-left py-1">
                <a href="{{url('attendance.index')}}"
                   class="btn btn-sm btn-light btn-active-light-primary pull-right">{{ __('messages.common.back')}}</a>
            </div>
        </div>
    </div>
@endsection
<div class="card"><br>
  <div class="card-body">
      
      <form action="{{url('attendance')}}" method="post">
        {{csrf_field()}}
        <div class="form-group row">
          <div class="col-sm-4">
          <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Employee Name :</label>
           
            <select class="form-control" id="emp_name" name="emp">
              <option value="0" disabled="true" selected="true">--select employee name--</option>
            @foreach($user2 as $item)
            <option value="{{$item->id }}"->{{$item->first_name }} {{$item->last_name }}</option>
            @endforeach
            </select>
          
          </div>
           <div class="col-sm-4">
           <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Date :</label>
              
              <input type="date" name="date" id="date" class="form-control">               
          
          </div>
           <div class="col-sm-4">
            
              <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Shift Start :</label>
              <input type="time" name="shift_start" id="shift_start" class="form-control">
             
          </div>  
        </div></br>
       <div class="form-group row">
          <div class="col-sm-4">
          
              <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Shift End :</label>
              <input type="time" name="shift_end" id="shift_end" class="form-control">
            
          </div>
           <div class="col-sm-4">
          
              <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Tea Break:</label>
              <input type="time" name="tea_break" id="tea_break" class="form-control">
             
          </div>
           <div class="col-sm-4">
       
              <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Tea Break Out:</label>
              <input type="time" name="tea_break_out" id="tea_break_out" class="form-control">
              
          </div>  
        </div><br>
        <div class="form-group row">
          <div class="col-sm-4">
         
            <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Lunch Break:</label>
            <input type="time" name="lunch_break" id="lunch_break" class="form-control">
          
          </div>
           <div class="col-sm-4">
              
              <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Lunch Break Out:</label>
              <input type="time" name="lunch_break_out" id="lunch_break_out" class="form-control">
        
          </div>
           <div class="col-sm-4">
              
              <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Meeting Break:</label>
              <input type="time" name="meeting_break" id="meeting_break" class="form-control">
            
          </div>
        </div><br>

        <div class="form-group row">
          <div class="col-sm-4">
             
               <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Meeting Break Out:</label>
              <input type="time" name="meeting_break_out" id="meeting_break_out" class="form-control">
             
          </div>
          <div class="col-sm-4">
             
               <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Note:</label>
              <input type="text" name="note" id="note" class="form-control">
             
          </div>
        </div> <br>
        <div align="center">
       <input type="submit" value="Save" class="btn btn-success" id="submitdt"></br>
       </div>
    </form>
   
  </div>
</div>
 
@stop




