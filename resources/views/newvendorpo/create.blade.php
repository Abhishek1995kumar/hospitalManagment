@extends('layouts.app')
@section('title')
    {{ __('Add Vendor Po') }}
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
                <a href="{{ route('newvendorpo') }}"
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
               
                    <form action="{{url('newvendorpo/create')}}" method="post" id="addewproduct" name="addewproduct">
                        {!! csrf_field() !!}      
                        <div id="validation">                           
                            <span class=" text-danger error"> </span><br>   
                        </div>               
                 
                        <div class="row gx-10 mb-5">
                            <div class="col-md-6">
                                <div class="form-group mb-5">
                                    <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3"> Po No :</label>
                                    <input type="text" name="venpo_no" id="venpo_no" value="VEN_PO_{{ $lastId }}"   class="form-control"  readonly>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-5">
                                        <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Vendor :</label>
                                        <select name="vendorname" id="vendor" class="form-control vendor" required>
                                            <option value="">--Select Vendor--</option>
                                                @foreach( $hello as $items)
                                                    <option value="{{ $items->id }}">{{ $items->v_name}}</option>
                                                @endforeach
                                            </select>                                  
                                        </div>
                                    </div>
                                
                                    <div class="col-md-6">
                                    <!-- <div class="form-group mb-5">
                                        <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Date :</label>
                                        <input type="date" name="date" id="date"   class="form-control"  >
                                        
                                     </div> -->
                                     <div class="form-group">
                                            <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Date :</label>
                                            <input type="text" name="date" id="date" value="<?=date('d-m-Y');?>"  class="form-control" >
                                    </div>
                                     
                                </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-5">
                                            <label for="Category" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Category</label>     
                                            <select name="category" id="category" class="form-control category" required>
                                <!-- @foreach( $categ as $items)
                                  <option value="{{ $items->id }}">{{ $items->cat_name}}</option>
                                @endforeach -->
                                 </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-5">
                                                <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Sub Category</label>     
                                                <select name="sub_category" id="sub_category" class="form-control" requiered>
                                </select>
                                        </div>
                                </div>

<!-- pharmacy-->
<!--kishhori start code-->
                        <div class="row">
                            <div class="col-md-12">
                                <legend>Product Details</legend>
                                <div class="table-responsive">
                                <table class="table table-striped table-bordered  text-center"  id="pharmacy_table" style="border: 1px solid #a9a5a5;" style="width:100px">
                                    <tr>
                                       <th style="border: 1px solid #a9a5a5;">Action</th>
                                        <th style="border: 1px solid #a9a5a5;">SelectProduct</th>
                                        <th style="border: 1px solid #a9a5a5;">ProductId</th>
                                        <th style="border: 1px solid #a9a5a5;">MRP</th>
                                        <th style="border: 1px solid #a9a5a5;">HSNCode</th>
                                        <!-- <th style="border: 1px solid #a9a5a5;">Size  </th> -->
                                        <!-- <th style="border: 1px solid #a9a5a5;">CurrentQTY</th>
                                        <th style="border: 1px solid #a9a5a5;">MinimumQTY</th>
                                        <th style="border: 1px solid #a9a5a5;">MaximumQTY</th> -->
                                        <th style="border: 1px solid #a9a5a5;">PoQTY  </th>
                                        <th style="border: 1px solid #a9a5a5;">Total Cost</th>
                                        <!-- <th style="border: 1px solid #a9a5a5;">TotalExpectedSale</th>
                                        <th style="border: 1px solid #a9a5a5;">QtySoldLast30Days</th>
                                        <th style="border: 1px solid #a9a5a5;">QtySoldLast90Days</th> -->
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #a9a5a5;">
                                            <button type="button" id='add_payment_btn'  class="btn btn-default add_payment_btn"><i class="fa fa-plus"></i></button>
                                        </td>
                                        <td style="border: 1px solid #a9a5a5;">
                                                <select name="product[]"  class="product" onchange="fetchProductPrice()" id="pro_id">
                                                    <option value="">Select Product</option>
                                                    @foreach( $product as $items)
                                                        <option value="{{ $items->id }}">{{ $items->product_name}}</option>
                                                    @endforeach
                                                </select> 
                                            </td>
                                            <td style="border: 1px solid #a9a5a5;">
                                                <input type="text" class="product_id" name="product_id[]"  id="product_id" readonly>
                                            </td> 
                                            <td style="border: 1px solid #a9a5a5;">  
                                                <input type="text" class="mrp"  name="mrp[]" id ="mrp" readonly>
                                            </td>                                             
                                            <td style="border: 1px solid #a9a5a5;">
                                                <input type="text" class="hsn" name="hsn[]" id ="hsn" readonly>
                                            </td>
                                            <!-- <td style="border: 1px solid #a9a5a5;">    
                                                <input type="text" class="size" name="size[]" id="cp" readonly> 
                                            </td> -->
                                            <!-- <td style="border: 1px solid #a9a5a5;">    
                                                <input type="text" class="current_qty" name="current_qty[]" >   
                                            </td>
                                            <td style="border: 1px solid #a9a5a5;">   
                                                <input type="text" class="minimum_qty" name="minimum_qty[]" id="min_qty" readonly>        
                                            </td>
                                            <td style="border: 1px solid #a9a5a5;"> 
                                                <input type="text" class="maximum_qty" name="maximum_qty[]" id="max_qty" readonly>        
                                            </td> -->
                                            <td style="border: 1px solid #a9a5a5;">
                                                <input type="text" class="po_qty editQty" name="po_qty[]">
                                            </td> 
                                            <td style="border: 1px solid #a9a5a5;">
                                                <input type="text" class=" cost" name="cost[]" readonly>
                                            </td>
                                            <!-- <td style="border: 1px solid #a9a5a5;">
                                                <input type="text" class="expected_sale" name="expected_sale[]">
                                            </td>
                                            <td style="border: 1px solid #a9a5a5;">
                                                <input type="text" class="last_30_days" name="last_30_days[]">                              
                                            </td> 
                                            <td style="border: 1px solid #a9a5a5;">  
                                                <input type="text" class="last_90_days" name="last_90_days[]">                                        
                                            </td> -->
                                    </tr>
                                </table>
                             </div>
                        </div>




<!-- OPD/Consultation-->
<!--kishhori start code-->
<div class="row">
                            <div class="col-md-12">
                                <legend></legend>
                                <div class="table-responsive">
                                <table class="table table-striped table-bordered text-center"  id="opd_consultation" style="border: 1px solid #a9a5a5;">
                                    <tr>
                                    <th style="border: 1px solid #a9a5a5;">Action</th>
                                        <th style="border: 1px solid #a9a5a5;">Select Product</th>
                                        <th style="border: 1px solid #a9a5a5;">Product Id</th>
                                        <th style="border: 1px solid #a9a5a5;">MRP</th>
                                        <th style="border: 1px solid #a9a5a5;">HSN Code</th>
                                        <!-- <th style="border: 1px solid #a9a5a5;">MRP</th> -->
                                        <!-- <th style="border: 1px solid #a9a5a5;">Brand</th> -->
                                        <!-- <th style="border: 1px solid #a9a5a5;">Model No</th>
                                        <th style="border: 1px solid #a9a5a5;">Size</th>
                                        <th style="border: 1px solid #a9a5a5;">Make</th>
                                        <th style="border: 1px solid #a9a5a5;">Material</th>
                                        <th style="border: 1px solid #a9a5a5;">Gender</th>
                                        <th style="border: 1px solid #a9a5a5;">Shape</th>
                                        <th style="border: 1px solid #a9a5a5;">Color</th> -->
                                        <th style="border: 1px solid #a9a5a5;">Po QTY</th>
                                        <th style="border: 1px solid #a9a5a5;">Total Cost</th>   
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #a9a5a5;">
                                            <button type="button" id='opd_btn'  class="btn btn-default opd_btn"><i class="fa fa-plus"></i></button>
                                        </td>
                                        <td style="border: 1px solid #a9a5a5;">
                                                <select name="product[]"  class="product" onchange="fetchOpdPrice()" id="pro_idone">
                                                    <option value="">Select Product</option>
                                                    @foreach( $product as $items)
                                                        <option value="{{ $items->id }}">{{ $items->product_name}}</option>
                                                    @endforeach
                                                </select> 
                                            </td>
                                            
                                            <td style="border: 1px solid #a9a5a5;">
                                                <input type="text" class="product_id"  name="product_id[]" id="product_idone" readonly >
                                            </td> 
                                            <td style="border: 1px solid #a9a5a5;">
                                                <input type="text" class="mrp" name="mrp[]" id ="mrpone" readonly>
                                            </td>                                             
                                            <td style="border: 1px solid #a9a5a5;">
                                                <input type="text" class="hsn" name="hsn[]" id ="hsnone" readonly>
                                            </td>
                                          
                                            <!-- <td style="border: 1px solid #a9a5a5;">
                                                <input type="text" class="brand" name="brand[]" id="brand">
                                            </td> -->
                                            <!-- <td style="border: 1px solid #a9a5a5;">
                                                <input type="text" class="model_no" name="model_no[]" id="model_no">
                                            </td> -->
                                            <!-- <td style="border: 1px solid #a9a5a5;">
                                                <input type="text" class="size" name="size[]" id="size">
                                            </td> -->
                                            <!-- <td style="border: 1px solid #a9a5a5;">
                                                <input type="text" class="make" name="make[]" id="make">
                                            </td>  -->
                                             <!-- <td style="border: 1px solid #a9a5a5;">
                                                <input type="text" class="material" name="material[]" id="material">
                                            </td> -->
                                            <!-- <td style="border: 1px solid #a9a5a5;">
                                                <input type="text" class="gender" name="gender[]" id="gender">
                                            </td> -->
                                            <!-- <td style="border: 1px solid #a9a5a5;">
                                                <input type="text" class="shape" name="shape[]" id="shape" >
                                            </td>  -->
                                            <!-- <td style="border: 1px solid #a9a5a5;">
                                                <input type="text" class="color" name="color[]" id="color">
                                            </td> -->
                                            <td style="border: 1px solid #a9a5a5;">
                                                <input type="text" class="po_qty editQty" name="po_qty[]" id="po_qtyone">
                                            </td> 
                                            <td style="border: 1px solid #a9a5a5;">
                                                <input type="text" class="cost" name="cost[]" id="costone" readonly>
                                            </td>
                                    </tr>
                                </table>
                             </div>
                        </div>
                   </div>




                   <!-- contact lens-->
                   <div class="row">
                            <div class="col-md-12">
                                <legend></legend>
                                <div class="table-responsive">
                                <table class="table table-striped table-bordered text-center"  id="contact_lens" style="border: 1px solid #a9a5a5;">
                                    <tr>
                                    <th style="border: 1px solid #a9a5a5;">Action</th>
                                       <th style="border: 1px solid #a9a5a5;">Select Product</th>
                                       <th style="border: 1px solid #a9a5a5;">Product Id</th>
                                       <th style="border: 1px solid #a9a5a5;">MRP</th>
                                       <th style="border: 1px solid #a9a5a5;">HSN</th>
                                       <!-- <th style="border: 1px solid #a9a5a5;">Color</th>
                                       <th style="border: 1px solid #a9a5a5;">Vision</th>   -->
                                     
                                       <th style="border: 1px solid #a9a5a5;">Po Oty</th>
                                       <th style="border: 1px solid #a9a5a5;">Total Cost</th>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #a9a5a5;">
                                            <button type="button" id='contact_btn'  class="btn btn-default contact_btn"><i class="fa fa-plus"></i></button>
                                        </td>
                                        <td style="border: 1px solid #a9a5a5;">
                                                <select name="product[]"  class="product" onchange="fetchContactlens()" id="pro_idtwo">
                                                    <option value="">Select Product</option>
                                                    @foreach( $product as $items)
                                                        <option value="{{ $items->id }}">{{ $items->product_name}}</option>
                                                    @endforeach
                                                </select> 
                                            </td>
                                            
                                            <td style="border: 1px solid #a9a5a5;">
                                                <input type="text" class="product_id"  name="product_id[]" id="product_idtwo" readonly >
                                            </td> 
                                            <td style="border: 1px solid #a9a5a5;">
                                                <input type="text" class="mrp" name="mrp[]" id ="mrptwo" readonly>
                                            </td>                                             
                                            <td style="border: 1px solid #a9a5a5;">
                                                <input type="text" class="hsn" name="hsn[]" id ="hsntwo" readonly>
                                            </td>
                                            <!-- <td style="border: 1px solid #a9a5a5;">
                                                <input type="text" class="color" name="color[]" id="color_c">
                                            </td> -->
                                            <!-- <td style="border: 1px solid #a9a5a5;">
                                                <input type="text" class="size" name="size[]" id="size_c">
                                            </td> -->
                                            <!-- <td style="border: 1px solid #a9a5a5;">
                                                <input type="text" class="vision" name="vision[]" id="vision_c">
                                            </td>  -->
                                            <td style="border: 1px solid #a9a5a5;">
                                                <input type="text" class="po_qty editQty" name="po_qty[]" id="po_qtyc">
                                            </td> 
                                            <td style="border: 1px solid #a9a5a5;">
                                                <input type="text" class="cost" name="cost[]" id="cost" readonly>
                                            </td>
                                        </tr>
                                </table>
                             </div>
                        </div>
                   </div>








                        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/js/bootstrap.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twbs-pagination/1.3.1/jquery.twbsPagination.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js"></script>

<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.js"></script>
<!--script for pharmacy category-->
                        <script>
                            $(document).ready(function () {
                            $("#pharmacy_table").hide();
                            $(".category").change(function(){
                                var status = $('.category option:selected').text();
                                if(status == "Pharmacy/OT" || status == "Pharmacy" ){
                                    $("#pharmacy_table").show();
                                }
                                else{
                                    $("#pharmacy_table").hide();
                                }
                            });
                            });
                        </script>
                        <script>
                                    document.getElementById("pharmacy_table").addEventListener('keyup', function(e){
                                         if(e.target.classList.contains('editQty')){
                                      
                                            updateTotalAmountph();

                                            }
                                        });
                                        function updateTotalAmountph(){
                                            // console.log("hello");
                                            let total_amount = 0;
                                            let  mrp_add = 0;
                                            $('#pharmacy_table tr').each(function(index, tr) {
                                            if(index > 0){

                                                var self = $(this);
                                              
                                                var qty = self.find("td:eq(5) input[type='text']").val();
                                              
                                                var mrp = self.find("td:eq(3) input[type='text']").val();
                                               
                                                total_amount = mrp * qty;
                                                self.find("td:eq(6) input[type='text']").val(total_amount);
                                            }
                                            

                                       });

                                        }
                        </script>
                         <!--script for opd category-->
                        <script>
                            $(document).ready(function () {
                            $("#opd_consultation").hide();
                            $(".category").change(function(){
                                var status = $('.category option:selected').text();
                                if(status == "OT Consumables" || status == "OPD/Consultation"  || status == "OPD Procedure" || status == "Surgery"  || status == "CL SOLUTION " || status == "Diagnostic" || status == "Lab Test"  || status == "MISCELLANEOUS" || status == "READING PENTO"  || status == "RX SUNGLASS" || status == "SPECTACLE LENSES" || status == "SPECTALES"){
                                    $("#opd_consultation").show();
                                }
                                else{
                                    $("#opd_consultation").hide();
                                }
                            });
                            });
                        </script>

<script>
                                    document.getElementById("opd_consultation").addEventListener('keyup', function(e){
                                         if(e.target.classList.contains('editQty')){
                                      
                                            updateTotalAmountopd();

                                            }
                                        });
                                        function updateTotalAmountopd(){
                                            // console.log("hello");
                                            let total_amount = 0;
                                            let  mrp_add = 0;
                                            $('#opd_consultation tr').each(function(index, tr) {
                                            if(index > 0){

                                                var self = $(this);
                                              
                                                var qty = self.find("td:eq(5) input[type='text']").val();
                                              
                                                var mrp = self.find("td:eq(3) input[type='text']").val();
                                               
                                                total_amount = mrp * qty;
                                                self.find("td:eq(6) input[type='text']").val(total_amount);
                                            }
                                            

                                       });

                                        }
                        </script>
                        <!--script for contact lens category-->
                        <script>
                            $(document).ready(function () {
                            $("#contact_lens").hide();
                            $(".category").change(function(){
                                var status = $('.category option:selected').text();
                                if(status == "Contact Lenses" || status =="FRAMES" || status =="HARD CASE" ){
                                    $("#contact_lens").show();
                                }
                                else{
                                    $("#contact_lens").hide();
                                }
                            });
                            });
                        </script>

                           <script>
                                    document.getElementById("contact_lens").addEventListener('keyup', function(e){
                                         if(e.target.classList.contains('editQty')){
                                      
                                            updateTotalAmountcontactlens();

                                            }
                                        });
                                        function updateTotalAmountcontactlens(){
                                            // console.log("hello");
                                            let total_amount = 0;
                                            let  mrp_add = 0;
                                            $('#contact_lens tr').each(function(index, tr) {
                                            if(index > 0){

                                                var self = $(this);
                                              
                                                var qty = self.find("td:eq(5) input[type='text']").val();
                                              
                                                var mrp = self.find("td:eq(3) input[type='text']").val();
                                               
                                                total_amount = mrp * qty;
                                                self.find("td:eq(6) input[type='text']").val(total_amount);
                                            }
                                            

                                       });

                                        }
                        </script>



                        
            </div>  
            <br>
            <div class="col-md-12">
                <!-- <button type="submit"  id="btn_submit" name="btn_submit" class="btn btn-success pull-right">Submit</button> -->
                 <input type="submit" value="Save" class="btn btn-success"></br>
</form>
                        
</div>

<!--Hide table for Pharmacy-->
 <script src="https://code.jquery.com/jquery-3.6.1.slim.js" integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>
                        <script>
                            var i=0;
                          
                             $("#add_payment_btn").click(function(){
                                i++;
                              
                                    var html3 =
                                    `<tr>
                                   
                                        <td style="border: 1px solid #a9a5a5;">
                                            <button type="button" id='remove_payment_btn' class="btn btn-default remove_payment_btn"><i class="fa fa-trash"></i></button>
                                        </td>

                                        <td style="border: 1px solid #a9a5a5;">
                                                <select name="product[]"  class="product" onchange="fetchProductPriceMulti(${i})"  id="pro_id_${i}">
                                                    <option value="">Select Product</option>
                                                    @foreach( $product as $items)
                                                        <option value="{{ $items->id }}">{{ $items->product_name}}</option>
                                                    @endforeach
                                                    

                                                </select> 
                                            </td>

                                        <td style="border: 1px solid #a9a5a5;">
                                                <input type="text" class="product_id" name="product_id[]" id="product_id_${i}" readonly>
                                            </td> 
                                            <td style="border: 1px solid #a9a5a5;">  
                                                <input type="text" class="mrp"  name="mrp[]"  id ="mrp_${i}" readonly>
                                            </td>                                             
                                            <td style="border: 1px solid #a9a5a5;">
                                                <input type="text" class="hsn" name="hsn[]" id ="hsn_${i}" readonly>
                                            </td>
                                           
                                           
                                            <td style="border: 1px solid #a9a5a5;">
                                                <input type="text" class="po_qty editQty" name="po_qty[]">
                                            </td> 
                                            <td style="border: 1px solid #a9a5a5;">
                                                <input type="text" class="cost" name="cost[]" readonly>
                                            </td>
                                         </tr>`;
                                    $("#pharmacy_table").append(html3);
                                    });

//pharmacy hide script//
function fetchProductPriceMulti(incre_i){
  var products_id =  $('#pro_id_'+incre_i).val();
  
  $.ajax({
      url: "{{url('/Product_price')}}",
      method:'POST',
      data :{
          "_token": "{{csrf_token()}}",
          id:products_id,
      },
      success:function(data){
          if(data)
          {
           
            mrp_ttl = $('#product_id_'+incre_i).val(data[0].id);
            mrp_ttlo = $('#mrp_'+incre_i).val(data[0].mrp);
            mrp_ttls = $('#hsn_'+incre_i).val(data[0].hsnno);
            mrp_ttlp = $('#cp_'+incre_i).val(data[0].cp);
            mrp_ttlm = $('#min_qty_'+incre_i).val(data[0].min_qty);
            mrp_ttlm = $('#max_qty_'+incre_i).val(data[0].max_qty);
            updateTotalAmountph();

        }
      },
  });
} 
 $("#pharmacy_table").on('click','.remove_payment_btn',function()
                                    {
                                        $(this).closest('tr').remove();
                                    });
                                 </script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">

function fetchProductPrice(){
  
  var products_id =  $('#pro_id').val();
  
  $.ajax({
      url: "{{url('/Product_price')}}",
      method:'POST',
      data :{
          "_token": "{{ csrf_token() }}",
          id:products_id,
      },
      success:function(data){
          if(data)
          {
    
           mrp_ttl = $('#product_id').val(data[0].id);
           mrp_tt = $('#mrp').val(data[0].mrp);
           mrp_tto = $('#hsn').val(data[0].hsnno);
           mrp_tts = $('#cp').val(data[0].cp);
           mrp_tts = $('#min_qty').val(data[0].min_qty);
           mrp_tts = $('#max_qty').val(data[0].max_qty);

          $('#product_id').val(data[0].id);
          $('#mrp').val(data[0].mrp);
          $('#hsn').val(data[0].hsnno);
          $('#cp').val(data[0].cp);
          $('#min_qty').val(data[0].min_qty);
          $('#max_qty').val(data[0].max_qty);
          //updateTotalAmount();

          
          }
      },
  });
} 


//opd script//
function fetchOpdPrice(){
  
  var products_id =  $('#pro_idone').val();
  
  $.ajax({
      url: "{{url('/Product_price')}}",
      method:'POST',
      data :{
          "_token": "{{ csrf_token() }}",
          id:products_id,
      },
      success:function(data){
          if(data)
          {
    
           mrp_ttl = $('#product_idone').val(data[0].id);
            mrp_tt = $('#mrpone').val(data[0].mrp);
           mrp_tto = $('#hsnone').val(data[0].hsnno);
        //    mrp_tts = $('#cp').val(data[0].cp);
        //    mrp_tts = $('#min_qty').val(data[0].min_qty);
        //    mrp_tts = $('#max_qty').val(data[0].max_qty);

          $('#product_idone').val(data[0].id);
           $('#mrpone').val(data[0].mrp);
           $('#hsnone').val(data[0].hsnno);
        //   $('#cp').val(data[0].cp);
        //   $('#min_qty').val(data[0].min_qty);
        //   $('#max_qty').val(data[0].max_qty);
          //updateTotalAmount();
          updateTotalAmountopd();
          
          }
      },
  });
} 

//contact lenses
function fetchContactlens(){
  
  var products_id =  $('#pro_idtwo').val();
  
  $.ajax({
      url: "{{url('/Product_price')}}",
      method:'POST',
      data :{
          "_token": "{{ csrf_token() }}",
          id:products_id,
      },
      success:function(data){
          if(data)
          {
    
           mrp_ttl = $('#product_idtwo').val(data[0].id);
            mrp_tt = $('#mrponetwo').val(data[0].mrp);
           mrp_tto = $('#hsnonetwo').val(data[0].hsnno);
        //    mrp_tts = $('#cp').val(data[0].cp);
        //    mrp_tts = $('#min_qty').val(data[0].min_qty);
        //    mrp_tts = $('#max_qty').val(data[0].max_qty);

          $('#product_idtwo').val(data[0].id);
           $('#mrptwo').val(data[0].mrp);
           $('#hsntwo').val(data[0].hsnno);
        //   $('#cp').val(data[0].cp);
        //   $('#min_qty').val(data[0].min_qty);
        //   $('#max_qty').val(data[0].max_qty);
          //updateTotalAmount();
          updateTotalAmountcontactlens();
          
          
          }
      },
  });
} 
//only for dependent droupdown//
    $(document).ready(function(){
    $('#category').change(function(){
  var category = $(this).val();  
  if(category){
    $.ajax({
      type:"GET",
      url:"{{url('fetch_subcat_newvendorpo')}}?category="+category,
       headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
      success:function(res){        
      if(res){
        $("#sub_category").empty();
        $("#sub_category").append('<option>Select Sub-category</option>');
        $.each(res,function(key,value){
          $("#sub_category").append('<option value="'+key+'">'+value+'</option>');
        });
      
      }else{
        $("#sub_category").empty();
      }
      }
    });
  }else{
    $("#sub_category").empty();
  }   
  });
  });

//script for vendor to category dependent droupdown//
  $(document).ready(function(){
        $('#vendor').change(function(){
        var vendorid = $(this).val();  
        //alert(vendorid);
        if(vendorid){
            $.ajax({
            type:"GET",
            url:"{{url('fetch_cat_newvendorpo')}}?id="+vendorid,
            success:function(res){        
            if(res){
                $("#category").empty();
                $("#category").append('<option>Select Category</option>');
                for(let i=0; i<res.length; i++)
                {
                                               
                $("#category").append('<option value="'+res[i]['cat_id']+'">'+res[i]['cat_name']+'</option>');
                    }
              
            
            }else{
                $("#category").empty();
            }
            }
            });
        }else{
            $("#category").empty();
            $("#sub_category").empty();
        }   
        });
    });
</script>

<!--hide opd consultation-->
<script>
    var i=0;
       $("#opd_btn").click(function(){
        i++;
            
             var html3 =
                `<tr>
                                   
                                        <td style="border: 1px solid #a9a5a5;">
                                            <button type="button" id='remove_opd_btn' class="btn btn-default remove_opd_btn"><i class="fa fa-trash"></i></button>
                                        </td>

                                       
                                            <td style="border: 1px solid #a9a5a5;">
                                                <select name="product[]"  class="product" onchange="fetchOpdMulti(${i})" id="pro_idone_${i}">
                                                    <option value="">Select Product</option>
                                                   
                                                    @foreach( $product as $items)
                                                        <option value="{{ $items->id }}">{{ $items->product_name}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td style="border: 1px solid #a9a5a5;">
                                                <input type="text" class="product_id"  name="product_id[]" id="product_idone_${i}" readonly>
                                            </td> 
                                            <td style="border: 1px solid #a9a5a5;">
                                                <input type="text" class="mrp" name="mrp[]"  id="mrpone_${i}" readonly>
                                            </td>                                             
                                            <td style="border: 1px solid #a9a5a5;">
                                                <input type="text" class="hsn" name="hsn[]" id="hsnone_${i}" readonly>
                                            </td>
                                         
                                           
                                         
                                          
                                            <td style="border: 1px solid #a9a5a5;">
                                                <input type="text" class="po_qty editQty" name="po_qty[]">
                                            </td> 
                                            <td style="border: 1px solid #a9a5a5;">
                                                <input type="text" class="cost" name="cost[]" readonly>
                                            </td>

                                        
                              </tr>`;
                                    $("#opd_consultation").append(html3);
                                    });


                                    //pharmacy hide script//
function fetchOpdMulti(incre_i){
  var products_id =  $('#pro_idone_'+incre_i).val();
  
  $.ajax({
      url: "{{url('/Product_price')}}",
      method:'POST',
      data :{
          "_token": "{{csrf_token()}}",
          id:products_id,
      },
      success:function(data){
          if(data)
          {
           
            mrp_ttl = $('#product_idone_'+incre_i).val(data[0].id);
             mrp_ttlo = $('#mrpone_'+incre_i).val(data[0].mrp);
            mrp_ttls = $('#hsnone_'+incre_i).val(data[0].hsnno);
            // mrp_ttlp = $('#cp_'+incre_i).val(data[0].cp);
            // mrp_ttlm = $('#min_qty_'+incre_i).val(data[0].min_qty);
            // mrp_ttlm = $('#max_qty_'+incre_i).val(data[0].max_qty);
            updateTotalAmountopd();

        }
      },
  });
} 

 $("#opd_consultation").on('click','.remove_opd_btn',function()
                                    {
                                        $(this).closest('tr').remove();
                                    });
                                 </script>

<script>
      var i=0;
    
       $("#contact_btn").click(function(){
        i++;
     
            
             var html3 =
                `<tr>
                                          
                                   
                                        <td style="border: 1px solid #a9a5a5;">
                                            <button type="button" id='remove_contactlens_btn' class="btn btn-default remove_contactlens_btn"><i class="fa fa-trash"></i></button>
                                        </td>
                                        <td style="border: 1px solid #a9a5a5;">
                                                <select name="product[]"  class="product" onchange="fetchContactlensMulti(${i})" id="pro_idtwo_${i}">
                                                    <option value="">Select Product</option>
                                                   
                                                    @foreach( $product as $items)
                                                        <option value="{{ $items->id }}">{{ $items->product_name}}</option>
                                                    @endforeach
                                                </select>
                                            </td>

                                        <td style="border: 1px solid #a9a5a5;">
                                                <input type="text" class="product_id"  name="product_id[]" id="product_idthree_${i}" readonly>
                                            </td> 
                                            <td style="border: 1px solid #a9a5a5;">
                                                <input type="text" class="mrp" name="mrp[]"  id="mrpthree_${i}" readonly>
                                            </td>                                             
                                            <td style="border: 1px solid #a9a5a5;">
                                                <input type="text" class="hsn" name="hsn[]" id="hsnthree_${i}" readonly>
                                            </td>
                                         
                                            <td style="border: 1px solid #a9a5a5;">
                                                <input type="text" class="po_qty editQty" name="po_qty[]" id="po_qtyc_${i}">
                                            </td>  

                                            <td style="border: 1px solid #a9a5a5;">
                                                <input type="text" class="cost" name="cost[]" readonly>
                                            </td>

 </tr>`;
                                    $("#contact_lens").append(html3);
                                    });
    function fetchContactlensMulti(incre_i){
  var products_id =  $('#pro_idtwo_'+incre_i).val();
  
  $.ajax({
      url: "{{url('/Product_price')}}",
      method:'POST',
      data :{
          "_token": "{{csrf_token()}}",
          id:products_id,
      },
      success:function(data){
          if(data)
          {
           
            mrp_ttl = $('#product_idthree_'+incre_i).val(data[0].id);
             mrp_ttlo = $('#mrpthree_'+incre_i).val(data[0].mrp);
            mrp_ttls = $('#hsnthree_'+incre_i).val(data[0].hsnno);
            updateTotalAmountcontactlens();
           
            // mrp_ttlp = $('#cp_'+incre_i).val(data[0].cp);
            // mrp_ttlm = $('#min_qty_'+incre_i).val(data[0].min_qty);
            // mrp_ttlm = $('#max_qty_'+incre_i).val(data[0].max_qty);

        }
      },
  });
} 

 $("#contact_lens").on('click','.remove_contactlens_btn',function()
                                    {
                                        $(this).closest('tr').remove();
                                    });
                                 </script>

@stop