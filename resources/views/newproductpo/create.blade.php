@extends('layouts.app')
@section('title')
    {{ __('Newproductpo') }}
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
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Add Newproduct Po</h1>
            </div>
            <div class="d-flex align-items-center py-1">
                <a href="{{ route('newproduct') }}"
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
                    <form action="{{url('newproduct/create')}}" method="post" id="addewproduct" name="addewproduct">
                        @csrf
                            <div class="row gx-10 mb-5">
                            <div class="col-md-6">
                                        <div class="form-group mb-5">
                                        <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3"> Po No :</label>
                                        
                                        <input type="text" name="po_no" id="po_no"   value="NEWP_PO_{{ $lastId }}"   class="form-control"  readonly>
                                            
                                        </div>
                                    </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-5">
                                        <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Vendor :</label>
                                        <select class="form-select"  name="vendor" id="vendor" >
                                            <option value="">Select vendor name</option>
                                            @foreach( $vendorname as $items)
                                            <option value="{{ $items->id }}">{{ $items->v_name}}</option>
                                            @endforeach
                                        </select>                                  
                                    </div>
                                </div>
                                <div class="col-md-6">
                                   
                                     <div class="form-group">
                                            <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Date :</label>
                                            <input type="text" class="form-control po_date" name="po_date" value="<?=date('d-m-Y');?>" readonly>
                                    </div>
</div>
                                <div class="col-md-6">
                                    <div class="form-group mb-5">
                                    <label for="Category" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Category</label>     
                                        <select name="category" id="category" class="form-control category" >
                                            <option value="">Select category first</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-5">
                                    <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Sub Category</label>     
                                            <select name="subcategory" id="subcategory" class="form-control" >
                                              <option value="">Select subcategory first</option>
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
                                                        <th style="border: 1px solid #a9a5a5;">Product Name</th>
                                                        <th style="border: 1px solid #a9a5a5;">MRP</th>
                                                        <th style="border: 1px solid #a9a5a5;">HSN Code and Tax Rate</th>
                                                        <!-- <th style="border: 1px solid #a9a5a5;">Size</th> -->
                                                       
                                                        <th style="border: 1px solid #a9a5a5;">PO Qty</th>
                                                                                     
                                                        <th style="border: 1px solid #a9a5a5;">Total  Cost</th>
                                                       
                                                       
                                                    </tr>
                                                    <tr>
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <a type="button" id="hello" class="fa fa-plus"></a>    
                                                        </td>
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <div class="form-group">
                                                               
                                                                <input type="text" name="products[]" id="" id="pharmacy_products"  >
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
                                                            <input type="text" class="po_qty editQty" name="po_qty[]" id="pharmacy_po_qty">                                        
                                                            </div>
                                                        </td>
                                                      

                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <div class="form-group">
                                                                <input type="text" class="total_cost" name="total_cost[]"  id="expected_sale" >                                        
                                                            </div>
                                                        </td>
                                                       
                                                        
                                                    </tr>
                                            </table>
                                        </div>
                                    </div>
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
                                                                        <input type="text" name="products[]"  id="hd_pharmacy_products_${i}">
                                                                        </div>
                                                                    </td>
                                                                    <td style="border: 1px solid #a9a5a5;">
                                                                        <div class="form-group">
                                                                            <input type="text" class="mrp" name="mrp[]" id="hd_pharmacy_mrp_${i}"> 
                                                                        </div>
                                                                    </td>
                                                                    <td style="border: 1px solid #a9a5a5;">
                                                                        <div class="form-group">
                                                                        <input type="text" class="hsn" name="hsn[]" id="hd_pharmacy_hsn_${i}">                                           
                                                                        </div>
                                                                    </td>
                                                                    <td style="border: 1px solid #a9a5a5;">
                                                                        <div class="form-group">
                                                                        <input type="text" class="po_qty editQty" name="po_qty[]" >                                        
                                                                        </div>
                                                                    </td>
                                                                    

                                                                    <td style="border: 1px solid #a9a5a5;">
                                                                        <div class="form-group">
                                                                            <input type="text" class="total_cost" name="total_cost[]"  id="expected_sale_${i}" >                                        
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
                                    document.getElementById("itemTable").addEventListener('keyup', function(e){
                                         if(e.target.classList.contains('editQty')){
                                      
                                      updateTotalAmountph();

                                            }
                                        });
                                        function updateTotalAmountph(){
                                            // console.log("hello");
                                            let total_amount = 0;
                                            let  mrp_add = 0;
                                            $('#itemTable tr').each(function(index, tr) {
                                            if(index > 0){

                                                var self = $(this);
                                                var qty = self.find("td:eq(4) input[type='text']").val();
                                                console.log(qty);
                                                var mrp = self.find("td:eq(2) input[type='text']").val();
                                                console.log(mrp)
                                                total_amount = mrp * qty;
                                                self.find("td:eq(5) input[type='text']").val(total_amount);
                                            }
                                            

                                       });

                                        }
                                   </script>

   
                                
                                  

                                    
                                    
                                       <!-- OPD consulation-->
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered text-center" id="opd" style="border: 1px solid #a9a5a5;">
                                                <tr>
                                                    <th style="border: 1px solid #a9a5a5;">Action</th>
                                                    <th style="border: 1px solid #a9a5a5;">Product Name</th>
                                                    <th style="border: 1px solid #a9a5a5;">MRP</th>
                                                    <th style="border: 1px solid #a9a5a5;">Po QTY</th>
                                                    <th style="border: 1px solid #a9a5a5;">HSN Code</th>
                                                  
                                                    <th style="border: 1px solid #a9a5a5;">Brand</th>
                                                    <th style="border: 1px solid #a9a5a5;">Total Cost</th>  
                                                </tr>                       
                                                <tr>  
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <a type="button"  class="fa fa-plus" id="addopdconul"></a> 
                                                        </td>

                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <input type="text" name="products[]"  id="opd_products" >
                                                        </td>
                                                       
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <input type="text" class="mrp" id="opd_mrp" name="mrp[]">
                                                        </td> 
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <input type="text" class="po_qty editQty" id="opd_po_qty" name="po_qty[]">
                                                        </td>                                             
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <input type="text" class="hsn" id="opd_hsn" name="hsn[]">
                                                        </td>
                                                       
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <input type="text" class="brand" name="brand[]" id="opd_brand">
                                                        </td>
                                                      
                                                      
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <input type="text" class="total_cost" id="opd_total_cost" name="total_cost[]" >
                                                        </td>
                                                </tr>                
                                            </table>
                                        </div>    
                                    </div>
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
                                                                    <input type="text" name="products[]"  id="hd_opd_products_${i}">
                                                                </td>
                                                                <td style="border: 1px solid #a9a5a5;">
                                                                    <input type="text" class="mrp" id="hd_opd_mrp_${i}" name="mrp[]">
                                                                </td>     
                                                                <td style="border: 1px solid #a9a5a5;">
                                                                    <input type="text" class="po_qty editQty" id="hd_opd_po_qty_${i}" name="po_qty[]">
                                                                </td>                                        
                                                                <td style="border: 1px solid #a9a5a5;">
                                                                    <input type="text" class="hsn" id="hd_opd_hsn_${i}" name="hsn[]">
                                                                </td>
                                                               
                                                                <td style="border: 1px solid #a9a5a5;">
                                                                    <input type="text" class="brand" name="brand[]" id="opd_brand">
                                                                </td>
                                                                <td style="border: 1px solid #a9a5a5;">
                                                                    <input type="text" class="total_cost" id="hd_opd_total_cost_${i}" name="total_cost[]" >
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
                                    document.getElementById("opd").addEventListener('keyup', function(e){
                                         if(e.target.classList.contains('editQty')){
                                      
                                      updateTotalAmountopd();

                                            }
                                        });
                                        function updateTotalAmountopd(){
                                            let total_amount = 0;
                                            let  mrp_add = 0;
                                            $('#opd tr').each(function(index, tr) {
                                            if(index > 0){

                                                var self = $(this);
                                                var qty = self.find("td:eq(3) input[type='text']").val();
                                                console.log(qty);
                                                var mrp = self.find("td:eq(2) input[type='text']").val();
                                                total_amount = mrp * qty;
                                                self.find("td:eq(6) input[type='text']").val(total_amount);
                                            }
                                            

                                       });

                                        }
                                   </script>
                                     
                                    
                                    <!-- optical glasses/sunglass-->
                                    <div class="col-md-12"> 
                                        <div class="table-responsive">
                                            <table class="table table-striped" id="optical" style="border: 1px solid #a9a5a5;">
                                                    <tr>
                                                        <th style="border: 1px solid #a9a5a5;">Action</th>
                                                        <th style="border: 1px solid #a9a5a5;">Product Name</th>
                                                       
                                                        <th style="border: 1px solid #a9a5a5;">MRP</th>
                                                      
                                                        <th style="border: 1px solid #a9a5a5;">PO QTY</th>
                                                        <th style="border: 1px solid #a9a5a5;">HSN CODE</th>
                                                        <th style="border: 1px solid #a9a5a5;">COATING</th>
                                                        <th style="border: 1px solid #a9a5a5;">Vision</th>
                                                        <th style="border: 1px solid #a9a5a5;">Diameter</th>
                                                        <th style="border: 1px solid #a9a5a5;">Fitting Height</th>
                                                        <th style="border: 1px solid #a9a5a5;">Frame A Size</th>
                                                        <th style="border: 1px solid #a9a5a5;">Frame B Size</th>
                                                        <th style="border: 1px solid #a9a5a5;">Frame DBL Size</th>
                                                        <th style="border: 1px solid #a9a5a5;">Total Cost</th>
                                                    </tr>                                                             
                                                    <tr>
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <a type="button" id="addoptical" class="fa fa-plus"></a>      
                                                        </td>
                                                        <td style="border: 1px solid #a9a5a5;">
                                                       
                                                                    <input type="text" class="productss" id="optical_sunglass_products" name="products[]" >                                                

                                                                                                   
                                                        </td>
                                                       
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <input type="text" class="mrp" name="mrp[]" id="optical_mrp">
                                                        </td>
                                                        <td style="border: 1px solid #a9a5a5;">                                                
                                                            <input type="text" class="po_qty editQty" id="optical_po_qty" name="po_qty[]" id="po_qty">                                            
                                                        </td>
                                                        <td style="border: 1px solid #a9a5a5;">                                                
                                                            <input type="text" class="hsn" id="optical_hsn" name="hsn[]"  id="">                                              
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
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <input type="text" class="total_cost" name="total_cost[]" id="total_cost">
                                                        </td>
                                                    </tr>                
                                            </table>    
                                        </div>
                                    </div>
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
                                                                <input type="text" class="products" name="products[]" id="optical_sunglass_products_${i}">
                                                         </td>
                                                       
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <input type="text" class="mrp" name="mrp[]" id="hd_optical_mrp_${i}">
                                                        </td>
                                                        <td style="border: 1px solid #a9a5a5;">                                                
                                                            <input type="text" class="po_qty editQty" id="hd_optical_po_qty_${i}" name="po_qty[]" id="po_qty">                                            
                                                        </td>
                                                        <td style="border: 1px solid #a9a5a5;">                                                
                                                            <input type="text" class="hsn" id="hd_optical_hsn_${i}" name="hsn[]"  id="">                                              
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
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <input type="text" class="total_cost" name="total_cost[]" id="optical_total_cost${i}">
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
                                    document.getElementById("optical").addEventListener('keyup', function(e){
                                         if(e.target.classList.contains('editQty')){
                                      
                                      updateTotalAmountoptical();

                                            }
                                        });
                                        function updateTotalAmountoptical(){
                                            let total_amount = 0;
                                            let  mrp_add = 0;
                                            $('#optical tr').each(function(index, tr) {
                                            if(index > 0){

                                                var self = $(this);
                                                var qty = self.find("td:eq(3) input[type='text']").val();
                                                console.log(qty);
                                                var mrp = self.find("td:eq(2) input[type='text']").val();
                                                total_amount = mrp * qty;
                                                self.find("td:eq(12) input[type='text']").val(total_amount);
                                            }
                                            

                                       });

                                        }
                                   </script>
                                      <!--frame-->
                                    <div class="col-md-12">                                    
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered text-center" id="optical_frame" style="border: 1px solid #a9a5a5;">
                                                <tr>
                                                    <th style="border: 1px solid #a9a5a5;">Action</th>
                                                    <th style="border: 1px solid #a9a5a5;">Product Name</th>
                                                    <th style="border: 1px solid #a9a5a5;">Price Range</th>
                                                    <th style="border: 1px solid #a9a5a5;">HSN CODE</th>
                                                    <th style="border: 1px solid #a9a5a5;">PO QTY</th>
                                                    <th style="border: 1px solid #a9a5a5;">Total cost</th>
                                                
                                                </tr>                                                                         
                                                <tr>
                                                    <td style="border: 1px solid #a9a5a5;">
                                                        <a type="button" id="addframe" class="fa fa-plus"></a> 
                                                    </td>
                    
                                                    <td style="border: 1px solid #a9a5a5;">
                                                        <input type="text" class="products" id="frame_products" name="products[]">

                                                    </td>
                                                    <td style="border: 1px solid #a9a5a5;">
                                                        <input type="text" class="mrp" id="frame_mrp" name="mrp[]">
                                                    </td>
                                                    <td style="border: 1px solid #a9a5a5;">
                                                        <input type="text" class="hsn" id="frame_hsn" name="hsn[]" >
                                                    </td>
                                                    <td style="border: 1px solid #a9a5a5;">
                                                        <input type="text" class="po_qty editQty" id="frame_po_qty" name="po_qty[]">
                                                    </td>
                                                    <td style="border: 1px solid #a9a5a5;">
                                                        <input type="text" class="total_cost" id="frame_total_cost" name="total_cost[]">
                                                    </td>
                                                
                                                </tr>                
                                            </table>    
                                        </div>
                                    </div>
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
                                                
                                                <input type="text" class="products" id="frame_products_${i}" name="products[]">

                                                </td>
                                                <td style="border: 1px solid #a9a5a5;">
                                                    <input type="text" class="mrp" id="hd_frame_mrp_${i}" name="mrp[]">
                                                </td>
                                                <td style="border: 1px solid #a9a5a5;">
                                                    <input type="text" class="hsn" id="hd_frame_hsn_${i}" name="hsn[]" >
                                                </td>
                                                <td style="border: 1px solid #a9a5a5;">
                                                    <input type="text" class="po_qty editQty" id="hd_frame_po_qty_${i}" name="po_qty[]">
                                                </td>
                                                <td style="border: 1px solid #a9a5a5;">
                                                    <input type="text" class="po_qty" id="hd_frame_total_cost_${i}" name="po_qty[]">
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
                                        document.getElementById("optical_frame").addEventListener('keyup', function(e){
                                         if(e.target.classList.contains('editQty')){
                                      
                                      updateTotalAmountoptical_frame();

                                            }
                                        });
                                        function updateTotalAmountoptical_frame(){
                                            let total_amount = 0;
                                            let  mrp_add = 0;
                                            $('#optical_frame tr').each(function(index, tr) {
                                            if(index > 0){

                                                var self = $(this);
                                                var qty = self.find("td:eq(4) input[type='text']").val();
                                                console.log(qty);
                                                var mrp = self.find("td:eq(2) input[type='text']").val();
                                                total_amount = mrp * qty;
                                                self.find("td:eq(5) input[type='text']").val(total_amount);
                                            }
                                            

                                       });

                                        }
                                    </script>
                                     
                                      <!-- spectacle / case-->
                                    <div class="col-md-12">                                    
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered text-center" id="spectacle" style="border: 1px solid #a9a5a5;">
                                                    <tr>
                                                        <th style="border: 1px solid #a9a5a5;">Action</th>
                                                        <th style="border: 1px solid #a9a5a5;">Select Product</th>
                                                        <th style="border: 1px solid #a9a5a5;">MRP</th>
                                                        <th style="border: 1px solid #a9a5a5;">HSN CODE</th>
                                                        <th style="border: 1px solid #a9a5a5;">Pack Size</th>
                                                        <th style="border: 1px solid #a9a5a5;">Po QTY</th>
                                                        <th style="border: 1px solid #a9a5a5;">Total Cost</th>
                                                    </tr>                                                                     
                                                    <tr>
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <a type="button" id="addspectacle" class="fa fa-plus"></a> 
                                                        </td>
                    
                                                        <td style="border: 1px solid #a9a5a5;">
                                                        
                                                                <input type="text" class="products" id="spectacle_products" name="products[]" >                                              
                              
                                                        </td>
                                                        <td style="border: 1px solid #a9a5a5;">                                           
                                                                <input type="text" class="mrp" id="spectacle_mrp" name="mrp[]" >                                              
                                                            </td>
                                                            <td style="border: 1px solid #a9a5a5;">                                              
                                                                <input type="text" class="hsn" id="spectacle_hsn" name="hsn[]" >                                          
                                                            </td>
                                                            <td style="border: 1px solid #a9a5a5;">                                            
                                                                <input type="text" class="pack_size" name="pack_size[]">                                            
                                                            </td>
                                                            <td style="border: 1px solid #a9a5a5;">                                               
                                                                <input type="text" class="s_po_qty editQty" name="s_po_qty[]">                                           
                                                            </td>
                                                            
                                                            <td style="border: 1px solid #a9a5a5;">
                                                                <input type="text" class="total_cost" id="spectacle_total_cost" name="total_cost[]">
                                                            </td>                                          
                                                    </tr>                
                                            </table>    
                                        </div>
                                    </div>
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
                                                         
                                                                <input type="text" class="products" id="spectacle_products_${i}" name="products[]" >                                              
                                
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
                                                                <input type="text" class="s_po_qty editQty" name="s_po_qty[]">                                           
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
                                        document.getElementById("spectacle").addEventListener('keyup', function(e){
                                         if(e.target.classList.contains('editQty')){
                                      
                                      updateTotalAmountspectacle();

                                            }
                                        });
                                        function updateTotalAmountspectacle(){
                                            let total_amount = 0;
                                            let  mrp_add = 0;
                                            $('#spectacle tr').each(function(index, tr) {
                                            if(index > 0){

                                                var self = $(this);
                                                var qty = self.find("td:eq(5) input[type='text']").val();
                                                console.log(qty);
                                                var mrp = self.find("td:eq(2) input[type='text']").val();
                                                total_amount = mrp * qty;
                                                self.find("td:eq(6) input[type='text']").val(total_amount);
                                            }
                                            

                                       });

                                        }
                                   </script>

                                     <!-- contact lens-->
                                    <div class="col-md-12">                                    
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered text-center" id="contact" style="border: 1px solid #a9a5a5;">
                                                
                                                    <th style="border: 1px solid #a9a5a5;">Action</th>
                                                    <th style="border: 1px solid #a9a5a5;">Select Product</th>
                                                   
                                                    <th style="border: 1px solid #a9a5a5;">MRP</th>
                                                    <th style="border: 1px solid #a9a5a5;">Po Qty</th>
                                                    <th style="border: 1px solid #a9a5a5;">HSN</th>
                                                   
                                                  
                                                   
                                                    <th style="border: 1px solid #a9a5a5;">Vision</th>
                                                    <th style="border: 1px solid #a9a5a5;">Total Cost</th>
                                                                                                                                                    
                                                    <tr>
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <a type="button" id="addcontact" class="fa fa-plus"></a> 
                                                        </td>
                    
                                                        <td style="border: 1px solid #a9a5a5;">
                                                        
                                                                    <input type="text" name="products[]" class="productss" id="contact_products">
                                                               
                                                        </td>
                                                            
                                                            <td style="border: 1px solid #a9a5a5;">
                                                                <input type="text" class="mrp" id="contact_mrp" name="mrp[]">
                                                            </td>
                                                        
                                                            <td style="border: 1px solid #a9a5a5;">
                                                                <input type="text" class="po_qty editQty" id="po_qty" name="po_qty[]">
                                                            </td>
                                                            <td style="border: 1px solid #a9a5a5;">
                                                                <input type="text" class="hsn" id="contact_hsn" name="hsn[]">
                                                            </td>
                                                           
                                                            
                                                            <td style="border: 1px solid #a9a5a5;">
                                                                <input type="text" class="vision" name="vision[]">
                                                            </td>  
                                                            <td style="border: 1px solid #a9a5a5;">
                                                                <input type="text" class="total_cost" name="total_cost[]">
                                                            </td>  
                                                    </tr>                
                                            </table>    
                                        </div>
                                    </div>
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
                                                                   
                                                                <input type="text" class="productss" id="contact_products_${i}" name="products[]">

                                                        </td>
                                                            
                                                            <td style="border: 1px solid #a9a5a5;">
                                                                <input type="text" class="mrp" id="hd_contact_mrp" name="mrp[]">
                                                            </td>
                                                            <td style="border: 1px solid #a9a5a5;">
                                                                <input type="text" class="po_qty editQty" id="po_qty" name="po_qty[]">
                                                            </td>
                                                            <td style="border: 1px solid #a9a5a5;">
                                                                <input type="text" class="hsn" id="hd_contact_hsn" name="hsn[]">
                                                            </td>
                                                          
                                                            <td style="border: 1px solid #a9a5a5;">
                                                                <input type="text" class="vision" name="vision[]">
                                                            </td>
                                                            <td style="border: 1px solid #a9a5a5;">
                                                                <input type="text" class="total_cost" name="total_cost[]">
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
                                    document.getElementById("contact").addEventListener('keyup', function(e){
                                         if(e.target.classList.contains('editQty')){
                                      
                                      updateTotalAmountcontact();

                                            }
                                        });
                                        function updateTotalAmountcontact(){
                                            let total_amount = 0;
                                            let  mrp_add = 0;
                                            $('#contact tr').each(function(index, tr) {
                                            if(index > 0){

                                                var self = $(this);
                                                var qty = self.find("td:eq(3) input[type='text']").val();
                                                console.log(qty);
                                                var mrp = self.find("td:eq(2) input[type='text']").val();
                                                total_amount = mrp * qty;
                                                self.find("td:eq(6) input[type='text']").val(total_amount);
                                            }
                                            

                                       });

                                        }
                                   </script>           
                                       <!-- IOL-->
                                    <div class="col-md-12">
                                        <div class="rows table-responsive">
                                            <table class="table table-striped table-bordered text-center" id="iol" style="border: 1px solid #a9a5a5;">
                                                
                                                    <th style="border: 1px solid #a9a5a5;">Action</th>
                                                    <th style="border: 1px solid #a9a5a5;">Lens Name</th>
                                                    <th style="border: 1px solid #a9a5a5;">Lens ID</th>                                      
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
                                                            <input type="text" class="kr_k1" name="kr_k1[]" id="kr_k1">
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
                                                            <input type="text" class="po_qty editQty" name="po_qty[]">
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
                                    </div>
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
                                                            <input type="text" class="kr_k1" name="kr_k1[]" id="kr_k1">
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
                                                            <input type="text" class="po_qty editQty" name="po_qty[]">
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
                                    <script>
                                     document.getElementById("iol").addEventListener('keyup', function(e){
                                         if(e.target.classList.contains('editQty')){
                                      
                                      updateTotalAmountiol();

                                            }
                                        });
                                        function updateTotalAmountiol(){
                                            let total_amount = 0;
                                            let  mrp_add = 0;
                                            $('#iol tr').each(function(index, tr) {
                                            if(index > 0){

                                                var self = $(this);
                                                var qty = self.find("td:eq(11) input[type='text']").val();
                                                console.log(qty);
                                                var mrp = self.find("td:eq(4) input[type='text']").val();
                                                total_amount = mrp * qty;
                                                self.find("td:eq(14) input[type='text']").val(total_amount);
                                            }
                                            

                                       });

                                        }
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
                        //    $(function(){
                        //     $("#itemTable").hide();
                            
                        //     $(".category").change(function(){
                        //         var status = $('.category option:selected').text();
                                
                        //         if(status == "Pharmacy/OT" || status == "Pharmacy" ){
                        //             $("#itemTable").show();
                        //         }
                        //         else{
                        //             $("#itemTable").hide();
                        //         }
                        //     });
                        //     });
                           
                                               
                                 $(document).ready(function(){
                                    $('#vendor').change(function(){
                                    var vendorid = $(this).val();  
                                    // alert(vendorid);
                                    if(vendorid){
                                        $.ajax({
                                        type:"GET",
                                        url:"{{url('fetch_cat')}}?id="+vendorid,
                                        success:function(res){ 
                                            

                                        if(res){
                                            $("#category").empty();
                                            $("#category").append('<option>Select Category</option>');
                                            for(let i=0; i<res.length; i++){
                                               
                                            $("#category").append('<option value="'+res[i]['cat_id']+'">'+res[i]['cat_name']+'</option>');
                                            }
                                        
                                        }else{
                                            $("#category").empty();
                                        }
                                        }
                                        });
                                    }else{
                                        $("#category").empty();
                                        $("#subcategory").empty();
                                    }   
                                    });

                                    $('#category').change(function(){
                                    var catid = $(this).val();  
                                    // alert(catid);
                                    if(catid){
                                        $.ajax({
                                        type:"GET",
                                        url:"{{url('fetch_subcat')}}?id="+catid,

                                        success:function(res){        
                                        if(res){
                                            $("#subcategory").empty();
                                            $("#subcategory").append('<option>Select Category</option>');
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
@endsection




