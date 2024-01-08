@extends('layouts.app')
@section('content')
@section('title')
    {{ __('Edit Product') }}
@endsection
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
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Edit Product Master</h1>
            </div>
            <div class="d-flex align-items-left py-1">
                <a href="{{url('product')}}"
                   class="btn btn-sm btn-light btn-active-light-primary pull-right">{{ __('messages.common.back')}}</a>
            </div>
        </div>
    </div>
@endsection
 
<div class="card">
  <div class="card-header"></div>
  <div class="card-body">
      
      <form action="{{ url('product/' .$product->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <div class="form-group row">
          <div class="col-sm-4">
          <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3"> Category:</label>
            <select id="category" name="category" class="form-control" required>
                 @foreach($cata as $items)
                <option value="{{$items->cat_id}}" {{$product->category == $items->cat_id  ? 'selected' : ''}}>{{$items->cat_name}}</option>
                 @endforeach
                 </select>
          </div>
          <div class="col-sm-4">
           <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3"> Sub Category:</label>
            <select id="subcategory" name="subcategory" class="form-control" required>
                @foreach($subcateg as $items)
                <option value="{{$items->subcat_id}}" {{$product->subcategory == $items->subcat_id  ? 'selected' : ''}}>{{$items->subcat_name}}</option>
                 @endforeach
                </select>
          </div>
          <div class="col-sm-4">
           
               <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3"> Product Name:</label>
            <input type="text" name="product_name" id="product_name" value="{{$product->product_name}}" class="form-control" required>
          </div>
        </div>
        <br>
        <div class="form-group row">
          <div class="col-sm-4">
          <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3"> HSN No:</label>
            <input type="text" name="hsnno" id="hsnno" value="{{$product->hsnno}}" class="form-control" required>
          </div>
          <div class="col-sm-4">
           <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3"> Min Qty:</label>
            <input type="text" name="min_qty" id="min_qty" value="{{$product->min_qty}}" class="form-control" required>
          </div>
          <div class="col-sm-4">
            <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3"> Max Qty:</label>
            <input type="text" name="max_qty" id="max_qty" value="{{$product->max_qty}}" class="form-control" required>
          </div>
        </div>
        <br>
        <div class="form-group row">
          <div class="col-sm-4">
                      <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3"> Discount:</label>
            <input type="text" name="discount" id="discount" value="{{$product->discount}}" class="form-control" required>
          </div>
          <div class="col-sm-4">
              <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3"> Supplier Name:</label>
            <input type="text" name="supplier_name" id="supplier_name" value="{{$product->supplier_name}}" class="form-control" required>
          </div>
          <div class="col-sm-4">  
              <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3"> C.P:</label>
            <input type="text" name="cp" id="cp" value="{{$product->cp}}" class="form-control" required>
          </div>
        </div>
        <br>
        <div class="form-group row">
          <div class="col-sm-4">
          <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3"> MRP:</label>
            <input type="text" name="mrp" id="mrp" value="{{$product->mrp}}" class="form-control" required>
          </div>
          <div class="col-sm-4">
          <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3"> Ref Code:</label>
            <input type="text" name="ref_code" id="ref_code" value="{{$product->ref_code}}" class="form-control" readonly />
        </div>
      </div> <br>

      <div class="form-group">
            <input type="submit" value="Update"  class="btn btn-primary mt-3">
        </div>
          
          
    </form>
   
  </div>
</div>
 
@stop
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
       

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#category').change(function(){
  var category = $(this).val();  
  if(category){
    $.ajax({
      type:"GET",
      url:"{{url('get_sub_cat')}}?category="+category,
       headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
      success:function(res){        
      if(res){
        $("#subcategory").empty();
        $("#subcategory").append('<option>Select State</option>');
        $.each(res,function(key,value){
          $("#subcategory").append('<option value="'+key+'">'+value+'</option>');
        });
      
      }else{
        $("#subcategory").empty();
      }
      }
    });
  }else{
    $("#subcategory").empty();
  }   
  });
  });

</script>