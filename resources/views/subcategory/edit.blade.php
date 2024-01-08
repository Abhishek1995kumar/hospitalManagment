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
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Edit Sub-Category</h1>
            </div>
            <div class="d-flex align-items-left py-1">
                <a href="{{route('subcategory.index')}}"
                   class="btn btn-sm btn-light btn-active-light-primary pull-right">{{ __('messages.common.back')}}</a>
            </div>
        </div>
    </div>
@endsection
 
<div class="card">
  <div class="card-header"></div>
  <div class="card-body">
      
     
   
    <form action="{{ url('subcategory/'.$subcategory->subcat_id ) }}" method="post">
      
    <input type="hidden" name="subcat_id"  value="{{$subcategory->subcat_id}}">
        {!! csrf_field() !!}
        @method("PATCH")
        
        
        <div class="form-group row">
            <div class="col-lg-4">
            <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Sub Category:</label><br>
            <input type="text" name="subcat_name" id="subcat_name" value="{{$subcategory->subcat_name}}" class="form-control"></br>
            </div>

         <div class="col-lg-4">
            <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Category:</label><br>
           
        <select id="category" name="category" class="form-control">
       
          @foreach($category as $role)
            <option value="{{$role->cat_id}}" {{$subcategory->category == $role->cat_id  ? 'selected' : ''}}>{{$role->cat_name}}</option>
         @endforeach
         
        </select><br>
</div>

        
        
        <!-- <input type="text" name="address" id="address" value="{{$subcategory->category_name}}" class="form-control"></br> -->
        <!-- <input type="submit" value="Update" class="btn btn-success"></br> -->
        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-primary mt-3">update </button>
                        </div>
    </form>
  </div>
</div>
 
@stop