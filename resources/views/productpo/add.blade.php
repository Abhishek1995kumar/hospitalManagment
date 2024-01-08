@extends('layouts.app')
@section('title')
    {{ __('messages.productpo') }}
    @endsection
@section('page_css')
    <link rel="stylesheet" href="{{ asset('assets/css/int-tel/css/intlTelInput.css') }}">
@endsection
@section('header_toolbar')
    <div class="toolbar" id="kt_toolbar">
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                 data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                 class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">@yield('title')</h1>
            </div>
            <div class="d-flex align-items-center py-1">
                <a href="{{ route('pharma') }}"
                   class="btn btn-sm btn-light btn-active-light-primary pull-right">{{ __('messages.common.back') }}</a>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="d-flex flex-column flex-lg-row">
        <div class="flex-lg-row-fluid mb-10 mb-lg-0 me-lg-7 me-xl-10">
            <div class="row">
                <div class="col-12">
                    @include('layouts.errors')
                </div>
            </div>
           
            <div class="card">
                <div class="card-body p-12">
                    <form action="{{url('productpo/create')}}" method="post" id="addproduct" name="addproduct">
                        @csrf
                            <div class="row gx-10 mb-5">
                                <div class="col-md-6">
                                    <div class="form-group mb-5">
                                        <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Product :</label>
                                        <select class="form-select"  name="products" id="products">
                                            <option value="">Select Product name</option>
                                                @foreach( $medicinesref as $items)
                                                    <option value="{{ $items->id }}">{{ $items->product_name}}</option>
                                                @endforeach
                                        </select>                                  
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-5">
                                        <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Date :</label>
                                        <input type="date" name="date" id="date"   class="form-control" >
                                        
                                     </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-5">
                                        <label for="Category">Category</label>     
                                        <select name="category" id="category" class="form-control category">
                                            <option value="">Select category first</option>
                                        </select>
                                    </div>
                                </div>
                               
                                
                                <div class="row">
                                      <!-- pharmacy-->
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered text-center" id="itemTable" style="border: 1px solid grey;">
                                                    <tr>
                                                        <th style="border: 1px solid #a9a5a5;">Action</th>
                                                        <th style="border: 1px solid #a9a5a5;">Vendor Name</th>
                                                        <th style="border: 1px solid #a9a5a5;">Product Name</th>
                                                        <th style="border: 1px solid #a9a5a5;">Price</th>
                                                        <th style="border: 1px solid #a9a5a5;">HSN Code</th>   
                                                        <th style="border: 1px solid #a9a5a5;">Size</th>
                                                        <th style="border: 1px solid #a9a5a5;">Current Qty</th>
                                                        <th style="border: 1px solid #a9a5a5;">Minimum Stock Qty</th>
                                                        <th style="border: 1px solid #a9a5a5;">Maximum Stock Qty</th>
                                                        <th style="border: 1px solid #a9a5a5;">PO Qty</th>
                                                        <th style="border: 1px solid #a9a5a5;">Cost</th>                                    
                                                        <th style="border: 1px solid #a9a5a5;">Total Expected Cost</th>
                                                        <th style="border: 1px solid #a9a5a5;">Qty Sold Last 30 Days</th>
                                                        <th style="border: 1px solid #a9a5a5;">Qty Sold Last 90 Days</th>
                                                       
                                                    </tr>
                                                    <tr>
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <a type="button" id="hello" class="fa fa-plus"></a>    
                                                        </td>
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <div class="form-group">
                                                                <select class="form-control" class="vendors" name="vendors[]" onchange="fetchProductPrice('pharmacy')" id="pharmacy_products">
                                                                    <option value="">Select Vendor name</option>
                                                                    @foreach( $vendorref as $items)
                                                                          <option value="{{ $items->id }}">{{ $items->v_name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </td>
                                                        <td style="border: 1px solid #a9a5a5;"> 
                                                            <div class="form-group">
                                                            <input type="text" class=" product_id" name="product_id[]"  id="pharmacy_product_id">
                                                            </div>
                                                        </td>
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <div class="form-group">
                                                                <input type="text" class="mrp" name="mrp[]" id="pharmacy_mrp"> 
                                                            </div>
                                                        </td>
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <div class="form-group">
                                                            <input type="text" class="hsn" name="hsn[]" id="pharmacy_hsn">                                           
                                                            </div>
                                                        </td>
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <div class="form-group">
                                                            <input type="text" class="size" name="size[]" id="size">                                           
                                                            </div>
                                                        </td>
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <div class="form-group">
                                                                <input type="text" class="current_qty" name="current_qty[]" id="pharmacy_current_qty">                                         
                                                            </div>
                                                        </td>
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <div class="form-group">
                                                                <input type="text" class="minimum_qty" name="minimum_qty[]" id="pharmacy_minimum_qty">                                    
                                                            </div>
                                                        </td>
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <div class="form-group">
                                                                <input type="text" class="maximum_qty" name="maximum_qty[]" id="pharmacy_maximum_qty">                                     
                                                            </div>
                                                        </td>
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <div class="form-group">
                                                            <input type="text" class="po_qty" name="po_qty[]" id="pharmacy_po_qty">                                        
                                                            </div>
                                                        </td>
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <div class="form-group">
                                                                <input type="text" class="cost" name="cost[]" id="pharmacy_cost">                              
                                                            </div>
                                                        </td>

                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <div class="form-group">
                                                                <input type="text" class="expected_sale" name="expected_sale[]"  id="expected_sale" >                                        
                                                            </div>
                                                        </td>
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <div class="form-group">
                                                                <input type="text" class="last_30_days" name="last_30_days[]"  id="last_30_days" >                                        
                                                            </div>
                                                        </td>
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <div class="form-group">
                                                                <input type="text" class="last_90_days" name="last_90_days[]"  id="last_90_days" >                                        
                                                            </div>
                                                        </td>
                                                        
                                                    </tr>
                                            </table>
                                        </div>
                                    </div><br><br>
                                    <script>
                                                var i=0
                                            $("#hello").click(function(){
                                                    i++;
                                                    var html = 
                                                            `<tr>
                                                                <td style="border: 1px solid #a9a5a5;">
                                                                    <a type="button" id="hello" class="fa fa-trash removepharmacyRow"></a>    
                                                                </td>
                                                                <td style="border: 1px solid #a9a5a5;">
                                                                     <div class="form-group">
                                                                     <select class="form-control" class="vendors" name="vendors[]" onchange="fetchmultiProductPrice(${i})" id="hd_pharmacy_products_${i}">
                                                                    <option value="">Select vendor name</option>
                                                                    @foreach( $vendorref as $items)
                                                                          <option value="{{ $items->id }}">{{ $items->v_name}}</option>
                                                                    @endforeach 
                                                                </select>
                                                                    </div>
                                                                </td>
                                                                <td style="border: 1px solid #a9a5a5;"> 
                                                                     <div class="form-group">
                                                                          <input type="text" class=" product_id" name="product_id[]"  id="hd_pharmacy_product_id_${i}">
                                                                      </div>
                                                                </td>
                                                                <td style="border: 1px solid #a9a5a5;">
                                                                    <div class="form-group">
                                                                    <input type="text" class="mrp" name="mrp[]" id="hd_pharmacy_mrp_${i}"> 
                                                                    </div>
                                                                </td>
                                                                <td style="border: 1px solid #a9a5a5;">
                                                                    <div class="form-group">
                                                                    <input type="text" class="hsn" name="hsn[]" id="hd_pharmacy_hsn_${i}">                                                                        </div>
                                                                </td>
                                                                <td style="border: 1px solid #a9a5a5;">
                                                                    <div class="form-group">
                                                                    <input type="text" class="size" name="size[]" id="size" id="hd_pharmacy_size_${i}">                                           
                                                                    </div>
                                                                </td>
                                                                <td style="border: 1px solid #a9a5a5;">
                                                                    <div class="form-group">
                                                                    <input type="text" class="current_qty" name="current_qty[]" id="hd_pharmacy_current_qty_${i}   ">                                                                        </div>
                                                                </td>
                                                                <td style="border: 1px solid #a9a5a5;">
                                                                    <div class="form-group">
                                                                    <input type="text" class="minimum_qty" name="minimum_qty[]" id="hd_pharmacy_minimum_qty_${i}">                                                                        </div>
                                                                </td>
                                                                <td style="border: 1px solid #a9a5a5;">
                                                                    <div class="form-group">
                                                                    <input type="text" class="maximum_qty" name="maximum_qty[]" id="hd_pharmacy_maximum_qty_${i}">                                                                      </div>
                                                                </td>
                                                                <td style="border: 1px solid #a9a5a5;">
                                                                    <div class="form-group">
                                                                    <input type="text" class="po_qty" name="po_qty[]" id="hd_pharmacy_po_qty_${i}">                                                                          </div>
                                                                </td>
                                                                <td style="border: 1px solid #a9a5a5;">
                                                                    <div class="form-group">
                                                                    <input type="text" class="cost" name="cost[]" id="hd_pharmacy_cost_${i}">                                                                      </div>
                                                                </td>

                                                                <td style="border: 1px solid #a9a5a5;">
                                                                    <div class="form-group">
                                                                        <input type="text" class="expected_sale" name="expected_sale[]"  id="expected_sale" >                                        
                                                                    </div>
                                                                </td>
                                                                <td style="border: 1px solid #a9a5a5;">
                                                                    <div class="form-group">
                                                                        <input type="text" class="last_30_days" name="last_30_days[]"  id="last_30_days" >                                        
                                                                    </div>
                                                                </td>
                                                                <td style="border: 1px solid #a9a5a5;">
                                                                    <div class="form-group">
                                                                        <input type="text" class="last_90_days" name="last_90_days[]"  id="last_90_days" >                                        
                                                                    </div>
                                                                </td>
                                                            </tr>`;
                                                    $("#itemTable").append(html);
                                                    });
                                                    $("#itemTable").on('click','.removepharmacyRow',function()
                                                        {
                                                            $(this).closest('tr').remove();
                                                        
                                                        });
                                    </script>
                                    <script>
                                        $(function(){
                                        $("#itemTable").hide();
                                        
                                        $(".category").change(function(){
                                            var status = $('.category option:selected').text();
                                            
                                            if(status == "Pharmacy/OT" || status == "Pharmacy" ){
                                                $("#itemTable").show();
                                            }
                                            else{
                                                $("#itemTable").hide();
                                            }
                                        });
                                        });
                                    </script>
                                    <script>
                                             function fetchProductPrice(type_cate){
                                            if(type_cate == 'OPD'){
                                                var ven_id =  $('#opd_products').val();
                                            
                                            }else if(type_cate == "optical_sunglass"){
                                                var ven_id =  $('#optical_sunglass_products').val();
                                            }
                                            else if(type_cate == 'optical_sunglass'){
                                                var ven_id =  $('#optical_sunglass_products').val();
                                            }
                                            else if(type_cate == 'pharmacy'){
                                                var ven_id =  $('#pharmacy_products').val();
                                            }
                                            else if(type_cate == "frame"){
                                                var ven_id =  $('#frame_products').val();
                                            }
                                            else if(type_cate == "spectacle"){
                                                var ven_id =  $('#spectacle_products').val();
                                            }
                                            else if(type_cate == "contact"){
                                                var ven_id =  $('#contact_products').val();
                                            }
                                            

                                            alert(ven_id);
                                            $.ajax({
                                                    url: "{{url('/Product_pricess')}}",
                                                    method:'POST',
                                                    data :{
                                                        "_token": "{{ csrf_token() }}",
                                                        id:ven_id,
                                                    },
                                                    success:function(data){
                                                        
                                                    if(data)
                                                    {
                                                        if(type_cate == 'OPD'){
                                                            $('#opd_product_id').val(data[0].product_name);
                                                            $('#opd_mrp').val(data[0].mrp);
                                                            $('#opd_hsn').val(data[0].hsn);
                                                            $('#opd_cost').val(data[0].cost);
                                                            $('#opd_size').val(data[0].size);
                                                            $('#opd_po_qty').val(data[0].po_qty);
                                                            $('#opd_total_cost').val(data[0].total_cost);   

                                                        
                                                            
                                                        }
                                                        else if(type_cate == 'optical_sunglass'){
                                                        
                                                            $('#optical_mrp').val(data[0].mrp);
                                                        
                                                            $('#optical_product_id').val(data[0].product_name);
                                                        
                                                            $('#optical_hsn').val(data[0].hsnno);
                                                    
                                                            $('#optical_po_qty').val(1);
                                                        }
                                                        else if(type_cate == 'pharmacy'){
                                                            $('#pharmacy_mrp').val(data[0].mrp);
                                                            $('#pharmacy_cost').val(data[0].mrp);
                                                            $('#pharmacy_product_id').val(data[0].product_name);
                                                            $('#pharmacy_current_qty').val(data[0].current_qty);
                                                            $('#pharmacy_hsn').val(data[0].hsn);
                                                            $('#pharmacy_size').val(data[0].size);
                                                            $('#pharmacy_minimum_qty').val(data[0].minimum_qty);
                                                            $('#pharmacy_maximum_qty').val(data[0].maximum_qty);
                                                        
                                                            $('#pharmacy_po_qty').val(1);
                                                        
                                                        }
                                                        else if(type_cate == "frame"){
                                                            $('#frame_product_id').val(data[0].product_name);
                                                        $('#frame_hsn').val(data[0].hsn);
                                                        $('#frame_po_qty').val(1);
                                                        }
                                                        else if(type_cate == "spectacle"){
                                                            $('#spactle_product_id').val(data[0].product_name);
                                                            $('#spectacle_mrp').val(data[0].mrp);
                                                            $('#spectacle_total_cost').val(data[0].mrp);
                                                            $('#spectacle_po_qty').val(1);
                                                            
                                                            $('#spectacle_cost_price').val(data[0].mrp);
                                                            $('#spectacle_hsn').val(data[0].hsn);
                                                        
                                                        
                                                        
                                                        }
                                                        else if(type_cate == "contact"){
                                                            
                                                            $('#contact_mrp').val(data[0].mrp);
                                                        
                                                            $('#contact_product_id').val(data[0].product_name);
                                                        
                                                            $('#contact_hsn').val(data[0].hsnno);
                                                        
                                                            
                                                        }
                                                        
                                                        
                                                    
                                                    }
                                                    },
                                                });
                                            
                                            }
                                    </script>
                                    <script>
                                                 function fetchmultiProductPrice(milt_i){
                                                   var products_hid =  $('#hd_pharmacy_products_'+milt_i).val();
                                                   alert(products_hid)
                                                     $.ajax({
                                                            url: "{{url('/Product_pricess')}}",
                                                            method:'POST',
                                                            data :{
                                                                "_token": "{{ csrf_token() }}",
                                                                id:products_hid,
                                                            },
                                                            success:function(data){
                                                                if(data)
                                                                {
                                                            $('#hd_pharmacy_mrp_'+milt_i).val(data[0].mrp);
                                                            $('#hd_pharmacy_cost_'+milt_i).val(data[0].mrp);
                                                            $('#hd_pharmacy_product_id_'+milt_i).val(data[0].product_name);
                                                            $('#hd_pharmacy_current_qty_'+milt_i).val(data[0].current_qty);
                                                            $('#hd_pharmacy_hsn_'+milt_i).val(data[0].hsn);
                                                            $('#hd_pharmacy_size_'+milt_i).val(data[0].size);
                                                            $('#hd_pharmacy_minimum_qty_'+milt_i).val(data[0].minimum_qty);
                                                            $('#hd_pharmacy_maximum_qty_'+milt_i).val(data[0].maximum_qty);
                                                        
                                                            $('#hd_pharmacy_po_qty_'+milt_i).val(1);
                                                               
                                                                }
                                                            },
                                                        });
                                                   

                                                   
                                                    
                                                   
                                                    }
                                    </script>
                                 
                                  
                                       <!-- OPD consulation-->
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered text-center" id="opd" style="border: 1px solid #a9a5a5;">
                                                <tr>
                                                    <th style="border: 1px solid #a9a5a5;">Action</th>
                                                    <th style="border: 1px solid #a9a5a5;">Vendor Name</th>
                                                    <th style="border: 1px solid #a9a5a5;">Product Name</th>
                                                    <th style="border: 1px solid #a9a5a5;">MRP</th>
                                                    <th style="border: 1px solid #a9a5a5;">HSN Code</th>
                                                    <th style="border: 1px solid #a9a5a5;">Cost</th>
                                                    <th style="border: 1px solid #a9a5a5;">Brand</th>
                                                    <th style="border: 1px solid #a9a5a5;">Model No</th>
                                                    <th style="border: 1px solid #a9a5a5;">Size</th>
                                                    <th style="border: 1px solid #a9a5a5;">Make</th>
                                                    <th style="border: 1px solid #a9a5a5;">Material</th>
                                                    <th style="border: 1px solid #a9a5a5;">Gender</th>
                                                    <th style="border: 1px solid #a9a5a5;">Shape</th>
                                                    <th style="border: 1px solid #a9a5a5;">Color</th>
                                                    <th style="border: 1px solid #a9a5a5;">Po QTY</th>
                                                    <th style="border: 1px solid #a9a5a5;">Total Cost</th>  
                                                </tr>                       
                                                <tr>  
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <a type="button"  class="fa fa-plus" id="addopdconul"></a> 
                                                        </td>

                                                        <td style="border: 1px solid #a9a5a5;">
                                                        <select class="form-control" class="vendors" name="vendors[]" onchange="fetchProductPrice('OPD')" id="opd_products">
                                                            <option value="">Select Vendors name</option>
                                                            @foreach( $vendorref as $items)
                                                                          <option value="{{ $items->id }}">{{ $items->v_name}}</option>
                                                                    @endforeach    
                                                        </select>
                                                        </td>
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <input type="text" class="product_id" id="opd_product_id" name="product_id[]">
                                                        </td> 
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <input type="text" class="mrp" id="opd_mrp" name="mrp[]">
                                                        </td>                                             
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <input type="text" class="hsn" id="opd_hsn" name="hsn[]">
                                                        </td>
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <input type="text" class="cost" id="opd_cost" name="cost[]">
                                                        </td>
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <input type="text" class="brand" name="brand[]" id="opd_brand">
                                                        </td>
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <input type="text" class="model_no" id="model_no" name="model_no[]">
                                                        </td>
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <input type="text" class="size" id="opd_size" name="size[]">
                                                        </td>
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <input type="text" class="make" id="opd_make" name="make[]" >
                                                        </td> 
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <input type="text" class="material" name="material[]">
                                                        </td>
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <input type="text" class="gender" name="gender[]">
                                                        </td>
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <input type="text" class="shape" name="shape[]" >
                                                        </td> 
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <input type="text" class="color" name="color[]">
                                                        </td>
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <input type="text" class="po_qty" id="opd_po_qty" name="po_qty[]">
                                                        </td> 
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <input type="text" class="total_cost" id="opd_total_cost" name="total_cost[]" >
                                                        </td>
                                                </tr>                
                                            </table>
                                        </div>    
                                    </div><br><br>
                                    <script>
                                                var i=0
                                            $("#addopdconul").click(function(){
                                                    i++;
                                                    var opdconsul = 
                                                            `<tr>
                                                                <td style="border: 1px solid #a9a5a5;">
                                                                    <a type="button"  class="fa fa-trash removeopdRow"></a>    
                                                                </td>
                                                                <td style="border: 1px solid #a9a5a5;">
                                                                    <select class="form-control" class="vendors" name="vendors[]" onchange="fetchopdProductPrice(${i})" id="hd_opd_products_${i}">
                                                                    <option value="">Select Vendors name</option>
                                                                    @foreach( $vendorref as $items)
                                                                          <option value="{{ $items->id }}">{{ $items->v_name}}</option>
                                                                    @endforeach  
                                                                    </select>
                                                                </td>
                                                                <td style="border: 1px solid #a9a5a5;">
                                                                    <input type="text" class="product_id" id="hd_opd_product_id_${i}" name="product_id[]">
                                                                </td> 
                                                                <td style="border: 1px solid #a9a5a5;">
                                                                    <input type="text" class="mrp" id="hd_opd_mrp_${i}" name="mrp[]">
                                                                </td>                                             
                                                                <td style="border: 1px solid #a9a5a5;">
                                                                    <input type="text" class="hsn" id="hd_opd_hsn_${i}" name="hsn[]">
                                                                </td>
                                                                <td style="border: 1px solid #a9a5a5;">
                                                                    <input type="text" class="cost" id="hd_opd_cost_${i}" name="cost[]">
                                                                </td>
                                                                <td style="border: 1px solid #a9a5a5;">
                                                                    <input type="text" class="brand" name="brand[]" id="opd_brand">
                                                                </td>
                                                                <td style="border: 1px solid #a9a5a5;">
                                                                    <input type="text" class="model_no" id="model_no" name="model_no[]">
                                                                </td>
                                                                <td style="border: 1px solid #a9a5a5;">
                                                                    <input type="text" class="size" id="hd_opd_size_${i}" name="size[]">
                                                                </td>
                                                                <td style="border: 1px solid #a9a5a5;">
                                                                    <input type="text" class="make" id="opd_make" name="make[]" >
                                                                </td> 
                                                                <td style="border: 1px solid #a9a5a5;">
                                                                    <input type="text" class="material" name="material[]">
                                                                </td>
                                                                <td style="border: 1px solid #a9a5a5;">
                                                                    <input type="text" class="gender" name="gender[]">
                                                                </td>
                                                                <td style="border: 1px solid #a9a5a5;">
                                                                    <input type="text" class="shape" name="shape[]" >
                                                                </td> 
                                                                <td style="border: 1px solid #a9a5a5;">
                                                                    <input type="text" class="color" name="color[]">
                                                                </td>
                                                                <td style="border: 1px solid #a9a5a5;">
                                                                    <input type="text" class="po_qty" id="hd_opd_po_qty_${i}" name="po_qty[]">
                                                                </td> 
                                                                <td style="border: 1px solid #a9a5a5;">
                                                                    <input type="text" class="total_cost" id="hd_opd_total_cost_${i}"name="total_cost[]" >
                                                                </td>
                                                            </tr>`;
                                                    $("#opd").append(opdconsul);
                                                    });
                                                    $("#opd").on('click','.removeopdRow',function()
                                                        {
                                                            $(this).closest('tr').remove();
                                                        
                                                        });
                                    </script>
                                    <script>
                                        $(function(){
                                        $("#opd").hide();
                                        
                                        $(".category").change(function(){
                                            var status = $('.category option:selected').text();
                                            if(status == "OT Consumables" || status == "OPD/Consultation"){
                                                $("#opd").show();
                                            }
                                            else
                                            {
                                                $("#opd").hide();
                                            }
                                        });
                                        });
                                    </script>
                                     <script>
                                                 function fetchopdProductPrice(milt_i){
                                                   var products_hid =  $('#hd_opd_products_'+milt_i).val();
                                                   alert(products_hid)
                                                     $.ajax({
                                                            url: "{{url('/Product_pricess')}}",
                                                            method:'POST',
                                                            data :{
                                                                "_token": "{{ csrf_token() }}",
                                                                id:products_hid,
                                                            },
                                                            success:function(data){
                                                                if(data)
                                                                {
                                                                $('#hd_opd_product_id_'+milt_i).val(data[0].product_name);
                                                                $('#hd_opd_mrp_'+milt_i).val(data[0].mrp);
                                                                $('#hd_opd_hsn_'+milt_i).val(data[0].hsn);
                                                                $('#hd_opd_cost_'+milt_i).val(data[0].mrp);
                                                                $('#hd_opd_total_cost_'+milt_i).val(data[0].mrp);
                                                                $('#hd_opd_size_'+milt_i).val(data[0].size);
                                                                $('#hd_opd_po_qty_'+milt_i).val(data[0].po_qty);
                                                             }
                                                            },
                                                        });
                                                   

                                                   
                                                    
                                                   
                                                    }
                                    </script>
                                   
                                    <!-- optical glasses/sunglass-->
                                    <div class="col-md-12"> 
                                        <div class="table-responsive">
                                            <table class="table table-striped" id="optical" style="border: 1px solid #a9a5a5;">
                                                    <tr>
                                                        <th style="border: 1px solid #a9a5a5;">Action</th>
                                                        <th style="border: 1px solid #a9a5a5;">Vendor Name</th>
                                                        <th style="border: 1px solid #a9a5a5;">Product Name</th>
                                                        <th style="border: 1px solid #a9a5a5;">MRP</th>
                                                        <th style="border: 1px solid #a9a5a5;">HSN CODE</th>
                                                        <th style="border: 1px solid #a9a5a5;">PO QTY</th>
                                                        <th style="border: 1px solid #a9a5a5;">COATING</th>
                                                        <th style="border: 1px solid #a9a5a5;">Vision</th>
                                                        <th style="border: 1px solid #a9a5a5;">Diameter</th>
                                                        <th style="border: 1px solid #a9a5a5;">Fitting Height</th>
                                                        <th style="border: 1px solid #a9a5a5;">Frame A Size</th>
                                                        <th style="border: 1px solid #a9a5a5;">Frame B Size</th>
                                                        <th style="border: 1px solid #a9a5a5;">Frame DBL Size</th>
                                                    </tr>                                                             
                                                    <tr>
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <a type="button" id="addoptical" class="fa fa-plus"></a>      
                                                        </td>
                                                        <td style="border: 1px solid #a9a5a5;">
                                                        <select class="form-control" class="vendors" name="vendors[]" onchange="fetchProductPrice('optical_sunglass')" id="optical_sunglass_products">
                                                                    <option value="">Select vendors name</option>
                                                                    @foreach( $vendorref as $items)
                                                                          <option value="{{ $items->id }}">{{ $items->v_name}}</option>
                                                                    @endforeach
                                                                  
                                                        </select>                                               
                                                        </td>
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <input type="text" class="product_id" id="optical_product_id" name="product_id[]" id="">                                                
                                                        </td>
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <input type="text" class="mrp" name="mrp[]" id="optical_mrp">
                                                        </td>
                                                        <td style="border: 1px solid #a9a5a5;">                                                
                                                            <input type="text" class="hsn" id="optical_hsn" name="hsn[]"  id="">                                              
                                                        </td>
                                                        <td style="border: 1px solid #a9a5a5;">                                                
                                                            <input type="text" class="po_qty" id="optical_po_qty" name="po_qty[]" id="po_qty">                                            
                                                        </td>
                                                        <td style="border: 1px solid #a9a5a5;">                                             
                                                            <input type="text" class="coating" name="coating[]" id="coating">                                             
                                                        </td>
                                                        <td style="border: 1px solid #a9a5a5;">                                             
                                                            <input type="text" class="vision" name="vision[]" id="vision">                                              
                                                        </td>
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <input type="text" class="diameter" name="diameter[]" id="diameter">
                                                        </td>
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <input type="text" class="fitting_height" name="fitting_height[]" id="fitting_height">
                                                        </td>
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <input type="text" class="frame_a" name="frame_a[]" id="frame_a">
                                                        </td>
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <input type="text" class="frame_b" name="frame_b[]" id="frame_b">
                                                        </td>
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <input type="text" class="frame_dbl" name="frame_dbl[]" id="frame_dbl">
                                                        </td>   
                                                    </tr>                
                                            </table>    
                                        </div>
                                    </div><br><br>
                                    <script>
                                                var i=0
                                            $("#addoptical").click(function(){
                                                    i++;
                                                    var optical = 
                                                            `<tr>
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <a type="button"  class="fa fa-trash" id="removeoptical"></a>     
                                                        </td>
                                                        <td style="border: 1px solid #a9a5a5;">
                                                        <select class="form-control" class="vendors" name="vendors[]" onchange="fetchopticalProductPrice(${i})" id="optical_sunglass_products_${i}">
                                                                    <option value="">Select vendors name</option>
                                                                    @foreach( $vendorref as $items)
                                                                          <option value="{{ $items->id }}">{{ $items->v_name}}</option>
                                                                    @endforeach
                                                                  
                                                        </select>                                               
                                                        </td>
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <input type="text" class="product_id" id="hd_optical_product_id_${i}" name="product_id[]" id="">                                                
                                                        </td>
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <input type="text" class="mrp" name="mrp[]" id="hd_optical_mrp_${i}">
                                                        </td>
                                                        <td style="border: 1px solid #a9a5a5;">                                                
                                                            <input type="text" class="hsn" id="hd_optical_hsn_${i}" name="hsn[]"  id="">                                              
                                                        </td>
                                                        <td style="border: 1px solid #a9a5a5;">                                                
                                                            <input type="text" class="po_qty" id="hd_optical_po_qty_${i}" name="po_qty[]" id="po_qty">                                            
                                                        </td>
                                                        <td style="border: 1px solid #a9a5a5;">                                             
                                                            <input type="text" class="coating" name="coating[]" id="coating">                                             
                                                        </td>
                                                        <td style="border: 1px solid #a9a5a5;">                                             
                                                            <input type="text" class="vision" name="vision[]" id="vision">                                              
                                                        </td>
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <input type="text" class="diameter" name="diameter[]" id="diameter">
                                                        </td>
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <input type="text" class="fitting_height" name="fitting_height[]" id="fitting_height">
                                                        </td>
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <input type="text" class="frame_a" name="frame_a[]" id="frame_a">
                                                        </td>
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <input type="text" class="frame_b" name="frame_b[]" id="frame_b">
                                                        </td>
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <input type="text" class="frame_dbl" name="frame_dbl[]" id="frame_dbl">
                                                        </td>    
                                                    </tr> `;
                                                    $("#optical").append(optical);
                                                    });
                                                    $("#optical").on('click','#removeoptical',function()
                                                        {
                                                            $(this).closest('tr').remove();
                                                        
                                                        });
                                    </script>
                                    <script>
                                        $(function(){
                                        $("#optical").hide();  
                                        $(".category").change(function(){
                                            var status = $('.category option:selected').text();
                                            if(status == "SUNGLASS" || status == "RX SUNGLASS" || status == "SELVET"){
                                                $("#optical").show(); 
                                            }
                                            else
                                            {
                                                $("#optical").hide();
                                            }
                                        });
                                        });

                                    </script>
                                     <script>
                                                 function fetchopticalProductPrice(milt_i){
                                                   var products_hid =  $('#optical_sunglass_products_'+milt_i).val();
                                                     $.ajax({
                                                            url: "{{url('/Product_pricess')}}",
                                                            method:'POST',
                                                            data :{
                                                                "_token": "{{ csrf_token() }}",
                                                                id:products_hid,
                                                            },
                                                            success:function(data){
                                                                if(data)
                                                                {
                                                                  $('#hd_optical_mrp_'+milt_i).val(data[0].mrp);
                                                                  
                                                                   $('#hd_optical_po_qty'+milt_i).val(1);
                                                                    $('#hd_optical_product_id_'+milt_i).val(data[0].product_name);
                                                        
                                                                    $('#hd_optical_hsn_'+milt_i).val(data[0].hsn);
                                                                  
                                                               
                                                                }
                                                            },
                                                        });
                                                     }
                                    </script>
                                    
                                   
                                   
                                      <!--frame-->
                                    <div class="col-md-12">                                    
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered text-center" id="optical_frame" style="border: 1px solid #a9a5a5;">
                                            <tr>
                                                <th style="border: 1px solid #a9a5a5;">Action</th>
                                                <th style="border: 1px solid #a9a5a5;">Vendor Name</th>
                                                <th style="border: 1px solid #a9a5a5;">Product Name</th>
                                                <th style="border: 1px solid #a9a5a5;">Price Range</th>
                                                <th style="border: 1px solid #a9a5a5;">HSN CODE</th>
                                                <th style="border: 1px solid #a9a5a5;">PO QTY</th>
                                                <th style="border: 1px solid #a9a5a5;">Make</th>
                                                <th style="border: 1px solid #a9a5a5;">Material</th>
                                                <th style="border: 1px solid #a9a5a5;">Gender</th>
                                                <th style="border: 1px solid #a9a5a5;">Shape</th>
                                                <th style="border: 1px solid #a9a5a5;">Color</th>
                                            </tr>                                                                         
                                            <tr>
                                                <td style="border: 1px solid #a9a5a5;">
                                                    <a type="button" id="addframe" class="fa fa-plus"></a> 
                                                </td>
                                                <td style="border: 1px solid #a9a5a5;">
                                                    <select name="vendors[]" id="frame_product_id" class="vendors" onchange="fetchProductPrice()">
                                                        <option value="">Select Vendor</option>
                                                        @foreach( $vendorref as $items)
                                                                          <option value="{{ $items->id }}">{{ $items->v_name}}</option>
                                                                    @endforeach
                                                    </select>
                                                </td>
                
                                                <td style="border: 1px solid #a9a5a5;">
                                                            <input type="text" class="product_id" id="frame_id" name="product_id[]">                                                
                                                        </td>
                                                <td style="border: 1px solid #a9a5a5;">
                                                    <input type="text" class="mrp" id="frame_mrp" name="mrp[]">
                                                </td>
                                                <td style="border: 1px solid #a9a5a5;">
                                                    <input type="text" class="hsn" id="frame_hsn" name="hsn[]" >
                                                </td>
                                                <td style="border: 1px solid #a9a5a5;">
                                                    <input type="text" class="po_qty" id="frame_po_qty" name="po_qty[]">
                                                </td>
                                                <td style="border: 1px solid #a9a5a5;">
                                                    <input type="text" class="make"  name="make[]">
                                                </td>
                                                <td style="border: 1px solid #a9a5a5;">
                                                    <input type="text" class="material"  name="material[]">
                                                </td>
                                                <td style="border: 1px solid #a9a5a5;">
                                                    <input type="text" class="gender"  name="gender[]">
                                                </td>
                                                <td style="border: 1px solid #a9a5a5;">
                                                    <input type="text" class="shape"  name="shape[]">
                                                </td>
                                                <td style="border: 1px solid #a9a5a5;">
                                                    <input type="text" class="color"  name="color[]">
                                                </td>  
                                            </tr>                
                                        </table>    
                                    </div>
                                    </div><br><br>
                                    <script>
                                                var i=0
                                            $("#addframe").click(function(){
                                                    i++;
                                                    var frame = 
                                                            `<tr>
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <a type="button"  class="fa fa-trash" id="removeframe"></a>     
                                                        </td>
                                                        <td style="border: 1px solid #a9a5a5;">
                                                        <select class="form-control" class="vendors" name="vendors[]" onchange="fetchframeProductPrice(${i})" id="frame_products_${i}">
                                                                    <option value="">Select vendors name</option>
                                                                    @foreach( $vendorref as $items)
                                                                          <option value="{{ $items->id }}">{{ $items->v_name}}</option>
                                                                    @endforeach
                                                                  
                                                        </select>                                               
                                                        </td>
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <input type="text" class="product_id" id="hd_frame_product_id_${i}" name="product_id[]">                                                
                                                        </td>
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <input type="text" class="mrp" id="hd_frame_mrp_${i}" name="mrp[]">
                                                        </td>
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <input type="text" class="hsn" id="hd_frame_hsn_${i}" name="hsn[]" >
                                                        </td>
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <input type="text" class="po_qty" id="hd_frame_po_qty_${i}" name="po_qty[]">
                                                        </td>
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <input type="text" class="make"  name="make[]">
                                                        </td>
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <input type="text" class="material"  name="material[]">
                                                        </td>
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <input type="text" class="gender"  name="gender[]">
                                                        </td>
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <input type="text" class="shape"  name="shape[]">
                                                        </td>
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <input type="text" class="color"  name="color[]">
                                                        </td>  
                                                    </tr> `;
                                                    $("#optical_frame").append(frame);
                                                    });
                                                    $("#optical_frame").on('click','#removeframe',function()
                                                        {
                                                            $(this).closest('tr').remove();
                                                        
                                                        });
                                    </script>
                                    <script>
                                        $(function(){
                                        $("#optical_frame").hide();
                                        
                                        $(".category").change(function(){
                                            var status = $('.category option:selected').text();
                                            if(status == "FRAMES"){
                                                $("#optical_frame").show();
                                            }
                                            else
                                            {
                                                $("#optical_frame").hide();
                                            }
                                        });
                                        });
                                    </script>
                                    <script>
                                                 function fetchframeProductPrice(milt_i){
                                                   var products_hid =  $('#frame_products_'+milt_i).val();
                                                     $.ajax({
                                                            url: "{{url('/Product_pricess')}}",
                                                            method:'POST',
                                                            data :{
                                                                "_token": "{{ csrf_token() }}",
                                                                id:products_hid,
                                                            },
                                                            success:function(data){
                                                                if(data)
                                                                {
                                                                 $('#frame_product_id'+milt_i).val(data[0].product_name);
                                                                   $('#hd_frame_po_qty'+milt_i).val(1);
                                                                   $('#hd_frame_hsn_'+milt_i).val(data[0].hsn);
                                                                  
                                                               
                                                                }
                                                            },
                                                        });
                                                   

                                                   
                                                    
                                                   
                                                    }
                                    </script>
                                  
                                      <!-- spectacle / case-->
                                    <div class="col-md-12">                                    
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered text-center" id="spectacle" style="border: 1px solid #a9a5a5;">
                                                    <tr>
                                                        <th style="border: 1px solid #a9a5a5;">Action</th>
                                                        <th style="border: 1px solid #a9a5a5;">Vendor Name</th>
                                                        <th style="border: 1px solid #a9a5a5;">Product Name</th>
                                                        <th style="border: 1px solid #a9a5a5;">MRP</th>
                                                        <th style="border: 1px solid #a9a5a5;">HSN CODE</th>
                                                        <th style="border: 1px solid #a9a5a5;">Pack Size</th>
                                                        <th style="border: 1px solid #a9a5a5;">Po QTY</th>
                                                        <th style="border: 1px solid #a9a5a5;">Cost Price</th>
                                                        <th style="border: 1px solid #a9a5a5;">Total Cost</th>
                                                    </tr>                                                                     
                                                    <tr>
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <a type="button" id="addspectacle" class="fa fa-plus"></a> 
                                                        </td>
                    
                                                        <td style="border: 1px solid #a9a5a5;">
                                                        <select class="form-control" class="vendors" name="vendors[]" onchange="fetchProductPrice('spectacle')" id="spectacle_products">
                                                                    <option value="">Select vendors name</option>
                                                                    @foreach( $vendorref as $items)
                                                                          <option value="{{ $items->id }}">{{ $items->v_name}}</option>
                                                                    @endforeach
                                                                   
                                                                </select>                                   
                                                        </td>
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <input type="text" class="product_id" id="spactle_product_id" name="product_id[]">                                                
                                                        </td>
                                                        <td style="border: 1px solid #a9a5a5;">                                           
                                                                <input type="text" class="mrp" id="spectacle_mrp" name="mrp[]" >                                              
                                                            </td>
                                                            <td style="border: 1px solid #a9a5a5;">                                              
                                                                <input type="text" class="hsn" id="spectacle_hsn" name="hsn[]" >                                          
                                                            </td>
                                                            <td style="border: 1px solid #a9a5a5;">                                            
                                                                <input type="text" class="pack_size" name="pack_size[]" id="spectacle_pack_size">                                            
                                                            </td>
                                                            <td style="border: 1px solid #a9a5a5;">                                               
                                                                <input type="text" class="s_po_qty" name="s_po_qty[]"  id="spectacle_po_qty">                                           
                                                            </td>
                                                            <td style="border: 1px solid #a9a5a5;">
                                                                <input type="text" class="s_cost_price" name="s_cost_price[]" id="spectacle_cost_price"> 
                                                            </td>
                                                            <td style="border: 1px solid #a9a5a5;">
                                                                <input type="text" class="total_cost" id="spectacle_total_cost" name="total_cost[]">
                                                            </td>                                          
                                                    </tr>                
                                            </table>    
                                        </div>
                                    </div><br><br>
                                    <script>
                                                var i=0
                                            $("#addspectacle").click(function(){
                                                    i++;
                                                    var frame = 
                                                            `<tr>
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <a type="button"  class="fa fa-trash" id="removespectacle"></a>     
                                                        </td>
                                                        <td style="border: 1px solid #a9a5a5;">
                                                        <select class="form-control" class="vendors" name="vendors[]" onchange="fetchspactleProductPrice(${i})" id="spectacle_products_${i}">
                                                                    <option value="">Select vendors name</option>
                                                                    @foreach( $vendorref as $items)
                                                                          <option value="{{ $items->id }}">{{ $items->v_name}}</option>
                                                                    @endforeach
                                                                  
                                                                </select>                                   
                                                        </td>
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <input type="text" class="product_id" id="hd_spactle_product_id_${i}" name="product_id[]">                                                
                                                        </td>
                                                        <td style="border: 1px solid #a9a5a5;">                                           
                                                                <input type="text" class="mrp" id="hd_spectacle_mrp_${i}" name="mrp[]" >                                              
                                                            </td>
                                                            <td style="border: 1px solid #a9a5a5;">                                              
                                                                <input type="text" class="hsn" id="hd_spectacle_hsn_${i}" name="hsn[]" >                                          
                                                            </td>
                                                            <td style="border: 1px solid #a9a5a5;">                                            
                                                                <input type="text" class="pack_size" name="pack_size[]">                                            
                                                            </td>
                                                            <td style="border: 1px solid #a9a5a5;">                                               
                                                                <input type="text" class="s_po_qty" id="hd_spectacle_po_qty_${i}" name="s_po_qty[]">                                           
                                                            </td>
                                                            <td style="border: 1px solid #a9a5a5;">
                                                                <input type="text" class="s_cost_price" id="hd_spectacle_cost_price_${i}" name="s_cost_price[]"> 
                                                            </td>
                                                            <td style="border: 1px solid #a9a5a5;">
                                                                <input type="text" class="total_cost" id="hd_spectacle_total_cost_${i}" name="total_cost[]">
                                                            </td>                        
                                                    </tr> `;
                                                    $("#spectacle").append(frame);
                                                    });
                                                    $("#spectacle").on('click','#removespectacle',function()
                                                        {
                                                            $(this).closest('tr').remove();
                                                        
                                                        });
                                    </script>
                                    <script>
                                        $(function(){
                                        $("#spectacle").hide();
                                        
                                        $(".category").change(function(){
                                            var status = $('.category option:selected').text();
                                            //  var status = $(this).val();
                                            // alert(status);
                                            if(status == "Case"){
                                                $("#spectacle").show();  
                                            }
                                            else
                                            {
                                                $("#spectacle").hide();
                                            }
                                        });
                                        });
                                    </script>
                                     <script>
                                         function fetchspectacleProductPrice(milt_i){
                                                   var products_hid =  $('#spectacle_products_'+milt_i).val();
                                                     $.ajax({
                                                            url: "{{url('/Product_pricess')}}",
                                                            method:'POST',
                                                            data :{
                                                                "_token": "{{ csrf_token() }}",
                                                                id:products_hid,
                                                            },
                                                            success:function(data){
                                                                if(data)
                                                                { 
                                                                     $('#hd_spactle_product_id_'+milt_i).val(data[0].product_name);
                                                                   $('#hd_spectacle_mrp_'+milt_i).val(data[0].mrp);
                                                                   $('#hd_spectacle_total_cost_'+milt_i).val(data[0].mrp);
                                                                   $('#hd_spectacle_cost_price').val(data[0].mrp);
                                                                   $('#hd_spectacle_po_qty').val(1);
                                                                    $('#hd_spectacle_hsn_'+milt_i).val(data[0].hsn);
                                                                  
                                                               
                                                                }
                                                            },
                                                        });
                                                   

                                                   
                                                    
                                                   
                                                    }
                                    </script>
                                   
                                     <!-- contact lens-->
                                    <div class="col-md-12">                                    
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered text-center" id="contact" style="border: 1px solid #a9a5a5;">
                                                
                                                    <th style="border: 1px solid #a9a5a5;">Action</th>
                                                    <th style="border: 1px solid #a9a5a5;">Vendor Name</th>
                                                    <th style="border: 1px solid #a9a5a5;">Product Name</th>
                                                    <th style="border: 1px solid #a9a5a5;">MRP</th>
                                                    <th style="border: 1px solid #a9a5a5;">HSN</th>
                                                    <th style="border: 1px solid #a9a5a5;">Color</th>
                                                    <th style="border: 1px solid #a9a5a5;">Vision</th>
                                                                                                                                                    
                                                    <tr>
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <a type="button" id="addcontact" class="fa fa-plus"></a> 
                                                        </td>
                    
                                                        <td style="border: 1px solid #a9a5a5;">
                                                        <select class="form-control" class="vendors" name="vendors[]" onchange="fetchProductPrice('contact')" id="contact_products">
                                                                    <option value="">Select Vendor name</option>
                                                                    @foreach( $vendorref as $items)
                                                                          <option value="{{ $items->id }}">{{ $items->v_name}}</option>
                                                                    @endforeach
                                                                </select>
                                                        </td>
                                                            <td style="border: 1px solid #a9a5a5;">
                                                                <input type="text" class="product_id" id="contact_product_id" name="product_id[]">
                                                            </td>
                                                            <td style="border: 1px solid #a9a5a5;">
                                                                <input type="text" class="mrp" id="contact_mrp" name="mrp[]">
                                                            </td>
                                                            <td style="border: 1px solid #a9a5a5;">
                                                                <input type="text" class="hsn" id="contact_hsn" name="hsn[]">
                                                            </td>
                                                            <td style="border: 1px solid #a9a5a5;">
                                                                <input type="text" class="color" name="color[]">
                                                            </td>
                                                            <td style="border: 1px solid #a9a5a5;">
                                                                <input type="text" class="vision" name="vision[]">
                                                            </td>  
                                                    </tr>                
                                            </table>    
                                        </div>
                                    </div><br><br>
                                    <script>
                                                var i=0
                                            $("#addcontact").click(function(){
                                                    i++;
                                                    var frame = 
                                                            `<tr>
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <a type="button"  class="fa fa-trash" id="removecontact"></a>     
                                                        </td>
                                                        <td style="border: 1px solid #a9a5a5;">
                                                        <select class="form-control" class="vendors" name="vendors[]" onchange="fetchcontactProductPrice(${i})" id="contact_products_${i}">
                                                                    <option value="">Select Vendors name</option>
                                                                    @foreach( $vendorref as $items)
                                                                          <option value="{{ $items->id }}">{{ $items->v_name}}</option>
                                                                    @endforeach
                                                                </select>
                                                        </td>
                                                            <td style="border: 1px solid #a9a5a5;">
                                                                <input type="text" class="product_id" id="contact_product_id" name="product_id[]">
                                                            </td>
                                                            <td style="border: 1px solid #a9a5a5;">
                                                                <input type="text" class="mrp" id="hd_contact_mrp" name="mrp[]">
                                                            </td>
                                                            <td style="border: 1px solid #a9a5a5;">
                                                                <input type="text" class="hsn" id="hd_contact_hsn" name="hsn[]">
                                                            </td>
                                                            <td style="border: 1px solid #a9a5a5;">
                                                                <input type="text" class="color" name="color[]">
                                                            </td>
                                                            <td style="border: 1px solid #a9a5a5;">
                                                                <input type="text" class="vision" name="vision[]">
                                                            </td> 
                                                    </tr> `;
                                                    $("#contact").append(frame);
                                                    });
                                                    $("#contact").on('click','#removecontact',function()
                                                        {
                                                            $(this).closest('tr').remove();
                                                        
                                                        });
                                    </script>
                                    <script>
                                        $(function(){
                                        $("#contact").hide();
                                        
                                        $(".category").change(function(){
                                            var status = $('.category option:selected').text();
                                            if(status == "Contact Lenses"){
                                                $("#contact").show();
                                            }
                                            else
                                            {
                                                $("#contact").hide();
                                            }
                                        });
                                        });
                                    </script>
                                         <script>
                                         function fetchspectacleProductPrice(milt_i){
                                                   var products_hid =  $('#contact_products_'+milt_i).val();
                                                     $.ajax({
                                                            url: "{{url('/Product_pricess')}}",
                                                            method:'POST',
                                                            data :{
                                                                "_token": "{{ csrf_token() }}",
                                                                id:products_hid,
                                                            },
                                                            success:function(data){
                                                                if(data)
                                                                {
                                                                   
                                                                    
                                                                   

                                                                   $('#hd_contact_mrp_'+milt_i).val(data[0].mrp);
                                                                  
                                                                   $('#hd_contact_product_id'+milt_i).val(data[0].product_name);
                                                                  
                                                        
                                                                    $('#hd_contact_hsn'+milt_i).val(data[0].hsn);
                                                                  
                                                               
                                                                }
                                                            },
                                                        });
                                                   

                                                   
                                                    
                                                   
                                                    }
                                    </script>
                                   
                                                                 
                                       <!-- IOL-->
                                    <div class="col-md-12">
                                        <div class="rows table-responsive">
                                            <table class="table table-striped table-bordered text-center" id="iol" style="border: 1px solid #a9a5a5;">
                                                
                                                    <th style="border: 1px solid #a9a5a5;">Action</th>
                                                    <th style="border: 1px solid #a9a5a5;">Lens Name</th>
                                                                                      
                                                    <th style="border: 1px solid #a9a5a5;">Lens Focal Point</th>
                                                    <th style="border: 1px solid #a9a5a5;">MRP Lens Only</th>
                                                    <th style="border: 1px solid #a9a5a5;">KR K1</th>
                                                    <th style="border: 1px solid #a9a5a5;">KR K2</th>
                                                    <th style="border: 1px solid #a9a5a5;">Diaopter</th>
                                                    <th style="border: 1px solid #a9a5a5;">A Constant</th>
                                                    <th style="border: 1px solid #a9a5a5;">IOL Power</th>
                                                    <th style="border: 1px solid #a9a5a5;">Cyl Value</th>
                                                    <th style="border: 1px solid #a9a5a5;">PO Qty</th>
                                                    <th style="border: 1px solid #a9a5a5;">Supply By Date</th>
                                                    <th style="border: 1px solid #a9a5a5;">HSN</th>
                                                    <th style="border: 1px solid #a9a5a5;">Total Cost</th>
                                                                                        
                                                    <tr>  
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <a type="button" id="addiol" class="fa fa-plus"></a>
                                                        
                                                        </td>
                    
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <input type="text" class="lens_name" name="lens_name[]">
                                                                <!-- <select name="lens_name[]" id="" class="lens_name">
                                                                    <option value="">Select Lens Name</option>
                                                                </select> -->
                                                            </div>
                                                        </td>
                                                      
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <div class="form-group">
                                                                <input type="text" class="lens_point" name="lens_point[]">
                                                            </div>
                                                        </td>                                             
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <div class="form-group">
                                                                <input type="text" class="mrp" name="mrp[]">
                                                            </div>
                                                        </td>
                                                    
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <div class="form-group">
                                                            <input type="text" class="size" name="kr_k1[]" id="kr_k1">
                                                            </div>
                                                        </td>
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <div class="form-group">
                                                            <input type="text" class="kr_k2" name="kr_k2[]">
                                                            </div>
                                                        </td>
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <div class="form-group">
                                                            <input type="text" class="diaopter" name="diaopter[]">
                                                            </div>
                                                        </td>
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <div class="form-group">
                                                            <input type="text" class="constant" name="constant[]" >
                                                            </div>
                                                        </td>
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <div class="form-group">
                                                            <input type="text" class="iol_power" name="iol_power[]">
                                                            </div>
                                                        </td> 
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <div class="form-group">
                                                            <input type="text" class="cyl_value" name="cyl_value[]" >
                                                            </div>
                                                        </td>
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <div class="form-group">
                                                            <input type="text" class="po_qty" name="po_qty[]">
                                                            </div>
                                                        </td>
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <div class="form-group">
                                                            <input type="text" class="supply_date" name="supply_date[]">
                                                            </div>
                                                        </td> 
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <div class="form-group">
                                                            <input type="text" class="hsn" name="hsn[]" >
                                                            </div>
                                                        </td>
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <div class="form-group">
                                                            <input type="text" class="total_cost" name="total_cost[]">
                                                            </div>
                                                        </td> 
                                                        
                                                    </tr>                
                                            </table>
                                        </div>    
                                    </div><br><br>
                                    <script>
                                                var i=0
                                            $("#addiol").click(function(){
                                                    i++;
                                                    var frame = 
                                                            `<tr>
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <a type="button"  class="fa fa-trash" id="removeiol"></a>     
                                                        </td>
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <input type="text" class="lens_name" name="lens_name[]">
                                                                <!-- <select name="lens_name[]" id="" class="lens_name">
                                                                    <option value="">Select Lens Name</option>
                                                                </select> -->
                                                            </div>
                                                        </td>
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <div class="form-group">
                                                                <input type="text" class="lens_id" name="lens_id[]" >
                                                            </div>
                                                        </td> 
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <div class="form-group">
                                                                <input type="text" class="lens_point" name="lens_point[]">
                                                            </div>
                                                        </td>                                             
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <div class="form-group">
                                                                <input type="text" class="mrp" name="mrp[]">
                                                            </div>
                                                        </td>
                                                    
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <div class="form-group">
                                                            <input type="text" class="size" name="kr_k1[]" id="kr_k1">
                                                            </div>
                                                        </td>
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <div class="form-group">
                                                            <input type="text" class="kr_k2" name="kr_k2[]">
                                                            </div>
                                                        </td>
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <div class="form-group">
                                                            <input type="text" class="diaopter" name="diaopter[]">
                                                            </div>
                                                        </td>
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <div class="form-group">
                                                            <input type="text" class="constant" name="constant[]" >
                                                            </div>
                                                        </td>
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <div class="form-group">
                                                            <input type="text" class="iol_power" name="iol_power[]">
                                                            </div>
                                                        </td> 
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <div class="form-group">
                                                            <input type="text" class="cyl_value" name="cyl_value[]" >
                                                            </div>
                                                        </td>
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <div class="form-group">
                                                            <input type="text" class="po_qty" name="po_qty[]">
                                                            </div>
                                                        </td>
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <div class="form-group">
                                                            <input type="text" class="supply_date" name="supply_date[]">
                                                            </div>
                                                        </td> 
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <div class="form-group">
                                                            <input type="text" class="hsn" name="hsn[]" >
                                                            </div>
                                                        </td>
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <div class="form-group">
                                                            <input type="text" class="total_cost" name="total_cost[]">
                                                            </div>
                                                        </td>   
                                                    </tr> `;
                                                    $("#iol").append(frame);
                                                    });
                                                    $("#iol").on('click','#removeiol',function()
                                                        {
                                                            $(this).closest('tr').remove();
                                                        
                                                        });
                                    </script>
                                    <script>
                                        $(function(){
                                            $("#iol").hide();
                                            
                                            $(".category").change(function(){
                                                var status = $('.category option:selected').text();
                                                if(status == "IOL"){
                                                    $("#iol").show();
                                                }
                                                else
                                                {
                                                    $("#iol").hide();
                                                }
                                            });
                                            });
                                    </script>

                                    
                                </div>

                               
                            <div class="form-group">
                                <button type="submit" name="submit" class="btn btn-primary mt-3">save </button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
   
   
@endsection

@section('page_scripts')
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/int-tel/js/intlTelInput.min.js') }}"></script>
    <script src="{{ asset('assets/js/int-tel/js/utils.min.js') }}"></script>
@endsection
@section('scripts')
    <script>
        let utilsScript = "{{asset('assets/js/int-tel/js/utils.min.js')}}";
        let isEdit = false;
        let defaultAvatarImageUrl = "{{ asset('assets/img/avatar.png') }}";
    </script>
    <script src="{{ mix('assets/js/patients/create-edit.js') }}"></script>
    <script src="{{ mix('assets/js/custom/add-edit-profile-picture.js') }}"></script>
    <script src="{{ mix('assets/js/custom/phone-number-country-code.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
                                    $('#products').change(function(){
                                    var prid = $(this).val();  
                                    //alert(prid);
                                    if(prid){
                                        $.ajax({
                                        type:"GET",
                                        url:"{{url('fetch_categ')}}?id="+prid,

                                        success:function(res){        
                                        if(res){
                                            $("#category").empty();
                                            $("#category").append('<option>Select Category</option>');
                                            $.each(res,function(key,value){
                                            $("#category").append('<option value="'+key+'">'+value+'</option>');
                                            });
                                        
                                        }else{
                                            $("#category").empty();
                                        }
                                        }
                                        });
                                    }else{
                                        $("#category").empty();
                                       
                                    }   
                                    });

                                  
                                
                                
                        
    </script>

@endsection


<script src="https://code.jquery.com/jquery-3.6.1.slim.js" integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>

