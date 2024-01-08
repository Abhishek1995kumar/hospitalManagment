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
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Hospital Invoice</h1>
            </div>
            <div class="d-flex align-items-left py-1">
                <a href="{{route('hospitalinvoice.index')}}"
                   class="btn btn-sm btn-light btn-active-light-primary pull-right">{{ __('messages.common.back')}}</a>
            </div>
        </div>
    </div>
@endsection
<div class="card"><br>
  <div class="card-body">
      
  <form action="{{ url('hospitalinvoice/' .$contacts->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$contacts->id}}" id="id" />

        <div class="form-group row">
            <div class="col-lg-4">

            <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Date Of Admission:</label>
        <input type="text" name="mr_admission_date" id="mr_admission_date" value="{{$contacts->mr_admission_date}}"class="form-control" readonly value="<?=date('d-m-Y');?>"></br>
</div>
<div class="col-lg-4">
            <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3"> Hospital Invoice No :</label>
            <input type="text" name="invoice_no" id="invoice_no" value="{{$contacts->invoice_no}}" class="form-control"  readonly>
</div>  
    <div class="col-sm-4">
        <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Date Of Disharge :</label>
        <input type="text" name="mr_discharge_date" id="mr_discharge_date" value="{{$contacts->mr_discharge_date}}" class="form-control"  readonly value="<?=date('d-m-Y');?>"></br>
</div>

<div class="col-sm-4">

      
        <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Doctor Name :</label>
          <select class="form-select " name="doctorname" id="doctorname" required>
			<option value="">Select Doctor name</option>
                
                
             @foreach($doctorref as $items)
                <option value="{{$items->id}}" {{$contacts->doctorname == $items->id  ? 'selected' : ''}}>{{$items->full_name}}</option>
             @endforeach
                 
        </select>
         <br>
</div>

       
       <div class="col-sm-4">
         <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Patient Code/Cr code :</label>

         <select class="form-select" name="patientname" id="patientname" required>
        <option value="">Select Patient Coode</option>
                 @foreach($patientref as $items)
                     <option value="{{$items->id}}" {{$contacts->patientname == $items->id  ? 'selected':''}}>{{$items->full_name}}</option>
                 @endforeach
        </select>
         <br>
</div>
    
<div class="col-sm-4">
    <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Select Type :</label>
        <select id="selecttype" name="selecttype" class="form-control" value="{{$contacts->selecttype}}" required>
        <option value="">Select Type</option>
        @foreach ($data as $item)
        <option <?php echo $item->selecttype == 'New' ?  "selected" : "" ?> value="New">New</option>
        <option <?php echo $item->selecttype == 'Old' ?  "selected" : "" ?> value="Old">Old</option>
        <option <?php echo $item->selecttype == 'Others' ?  "selected" : "" ?> value="Others">Others</option>
        <option <?php echo $item->selecttype == 'Review' ?  "selected" : "" ?> value="Review">Review</option>
         @endforeach
         </select>
         <br>
</div>

<div class="col-sm-4">
    <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Room Type :</label>
       <select id="roomtype" name="roomtype" class="form-control" required>
        <option value="">Select Room Type</option>
        @foreach ($data as $item)
        <option <?php echo $item->roomtype == 'Single bed' ?  "selected" : "" ?> value="Single bed">Single bed</option>
        <option <?php echo $item->roomtype == 'Double bed' ?  "selected" : "" ?> value="Double bed">Double bed</option>
        <option <?php echo $item->roomtype == 'General ward' ?  "selected" : "" ?> value="General ward">General ward</option>
        <option <?php echo $item->roomtype == 'Private' ?  "selected" : "" ?> value="Private">Private</option>
         @endforeach
        </select>
         <br>
</div>


<div class="col-sm-4">
    <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Payment :</label>
        <select id="paymenttype" name="paymenttype" class="form-control" required>
        <option value="">Select Payment</option>
        @foreach ($dataone as $item)
        <option <?php echo $item->paymenttype == 'advance' ?  "selected" : "" ?> value="advance">Advance</option>
        <option <?php echo $item->paymenttype == 'refund' ?  "selected" : "" ?> value="refund">Refund</option>
         @endforeach
        </select>
        <br>
</div>

<div class="col-sm-4">
    <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Payment Amount :</label>
      <input type="text" name="payment_amount" id="payment_amount" value="{{$contacts->payment_amount}}" class="form-control" required></br>
</div>

<div class="col-sm-4">
    <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Procedure:</label>
     <textarea class='form-control' type='text' name="procedure" id="procedure"  class="form-control" required>{{$contacts->procedure}}</textarea></br>
</div>

<div class="col-sm-4">
    <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Details:</label>
    <textarea class='form-control' type='text' name="details" id="details" value="" class="form-control" required>{{$contacts->details}}</textarea></br>
</div>

<div class="col-sm-4">
    <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Patient Type:</label>
       
        <select id="patienttype" name="patienttype" class="form-control" required>
        <option value="">Select Patient Type</option>
        @foreach ($datapatienttype as $item)
        <option <?php echo $item->patienttype == 'Self' ?  "selected" : "" ?> value="Self">Self</option>
        <option <?php echo $item->patienttype == 'TPA' ?  "selected" : "" ?> value="TPA">TPA</option>
        <option <?php echo $item->patienttype == 'RSBY' ?  "selected" : "" ?> value="RSBY">RSBY</option>
        <option <?php echo $item->patienttype == 'MJPJAY' ?  "selected" : "" ?> value="MJPJAY">MJPJAY</option>
        <option <?php echo $item->patienttype == 'Railway' ?  "selected" : "" ?> value="Railway">Railway</option>
        <option <?php echo $item->patienttype == 'Ayushman Bharat' ?  "selected" : "" ?> value="Ayushman Bharat">Ayushman Bharat</option>
        <option <?php echo $item->patienttype == 'ECHS' ?  "selected" : "" ?> value="ECHS">ECHS</option>
        <option <?php echo $item->patienttype == 'Post Office' ?  "selected" : "" ?> value="Post Office">Post Office</option>
        <option <?php echo $item->patienttype == 'CGHS' ?  "selected" : "" ?> value="CGHS">CGHS</option>
        <option <?php echo $item->patienttype == 'ESIC' ?  "selected" : "" ?> value="ESIC">ESIC</option>
        <option <?php echo $item->patienttype == 'JNPT' ?  "selected" : "" ?> value="JNPT">JNPT</option>
        <option <?php echo $item->patienttype == 'BSNL' ?  "selected" : "" ?> value="BSNL">BSNL</option>
        <option <?php echo $item->patienttype == 'HUMRAHEE CAMP' ?  "selected" : "" ?> value="HUMRAHEE CAMP">HUMRAHEE CAMP</option>
        <option <?php echo $item->patienttype == 'AIR INDIA' ?  "selected" : "" ?> value="AIR INDIA">AIR INDIA</option>
        <option <?php echo $item->patienttype == 'CRPF' ?  "selected" : "" ?> value="CRPF">CRPF</option>
        <option <?php echo $item->patienttype == 'CISF' ?  "selected" : "" ?> value="CISF">CISF</option>
        <option <?php echo $item->patienttype == 'NAVAL DOCKYARD' ?  "selected" : "" ?> value="NAVAL DOCKYARD">NAVAL DOCKYARD</option>
         @endforeach
        </select>
         <br>
</div>

<div class="col-sm-4">
    <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Payment Type:</label>
     <select id="paymenttypeone" name="paymenttypeone" class="form-control" required>
        <option value="">Select Payment Type</option>
         @foreach ($paymenttypeone as $item)
        <option <?php echo $item->paymenttypeone == 'Paid' ?  "selected" : "" ?> value="Paid">Paid</option>
        <option <?php echo $item->paymenttypeone == 'Credit' ?  "selected" : "" ?> value="Credit">Credit</option>
        <option <?php echo $item->paymenttypeone == 'FOC' ?  "selected" : "" ?> value="FOC">FOC</option>
        <option <?php echo $item->paymenttypeone == 'Academic' ?  "selected" : "" ?> value="Academic">Academic</option>
        <option <?php echo $item->paymenttypeone == 'Copayment' ?  "selected" : "" ?> value="Copayment">Copayment</option>
         @endforeach
        </select>
         <br>
</div>

<div class="col-sm-4">
    <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Category:</label>
         
    <select id="category" name="category" class="form-control" required>
              
                @foreach($vcateg as $items)
                <option value="{{$items->cat_id}}" {{$contacts->category == $items->cat_id  ? 'selected' : ''}}>{{$items->cat_name}}</option>
                 @endforeach
                </select>
         <br>
</div>
<div class="col-sm-4">
<label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Sub-Category </label>
                <select id="subcategory" name="subcategory" class="form-control" required>
                @foreach($subcateg as $items)
                <option value="{{$items->subcat_id}}" {{$contacts->subcategory == $items->subcat_id  ? 'selected' : ''}}>{{$items->subcat_name}}</option>
                 @endforeach
                </select>
                </select>
         <br>
</br>
</div>


                            <div class="row">
                            <div class="col-md-12">
                                <legend>Product Details </legend>
                                <table class="table table-striped table-bordered text-center" id="producttable" style= "width:100%;border: 1px solid #a9a5a5;" >
                                    <tr>
                                        <th style="border: 1px solid #a9a5a5;">Action</th>
                                        <th style="border: 1px solid #a9a5a5;">Select Product</th>
                                        <th style="border: 1px solid #a9a5a5;">MRP</th>
                                        <th style="border: 1px solid #a9a5a5;">Quanity</th>
                                        <th style="border: 1px solid #a9a5a5;">Total Amount</th>
                                    </tr>
                                    <?php
                                        $product_dt = explode(",", $contacts['productname']);
                                        $mrp_dt = explode(",", $contacts['mrp']);
                                        $qty_dt = explode(",", $contacts['qty']);
                                        $price_dt = explode(",", $contacts['price']);

                                       
                                        // $id = $pharama['id'];

                                        
                                        
                                       
                                      
                                          
                                        $product_mul_counts = 0;
                                        for($i = 0; $i < count($product_dt); $i++) {
                                            $counts = ($i>0 ? '_'.$i : '');
                                            
                                            
                                    ?>

                                    <tr>
                                    <td style="border: 1px solid #a9a5a5;">
                                            <button type="button" id='add_pr_btn' class="btn btn-default add_pr_btn"><i class="fa fa-plus"></i></button>
                                            <a value="{{$contacts->id}}" type="button" id="helloremove" class="fa fa-trash"></a>    

                                        </td>

                                       

                                          <td style="border: 1px solid #a9a5a5;">
                                            <div class="form-group">
                                            <select class="form-control" onchange="fetchProductPrice(<?php echo $i; ?>)"  name="productname[]" id="products<?php echo $counts?>" placeholder='select Product'>


                                             <?php
                                                           foreach ($product as $items) {
                                                            ?>
                                                            <option value="{{$items->id}}" {{$product_dt[$i] == $items->id  ? 'selected' : ''}}>{{$items->product_name}}</option>
                                                          
                                                    <?php
                                                           }
                                                    ?>
                                          
                                            </select>
                                            </div>
                                          </td>
                                          <td style="border: 1px solid #a9a5a5;">
                                                <div class="form-group">
                                                <input type="text" class="form-control  mrp" id="mrp<?php echo $counts; ?>" name="mrp[]" placeholder="Enter MRP"  value="{{$mrp_dt[$i]}}"/>
                                                </div>
                                            </td>
                                            <td style="border: 1px solid #a9a5a5;">
                                                <div class="form-group">
                                                <input type="text" class="form-control  editQty" id="qty<?php echo $counts; ?>" name="qty[]" placeholder="Enter QTY"   value="{{$qty_dt[$i]}}"/>
                                                </div>
                                            </td>

                                        


                                        <td style="border: 1px solid #a9a5a5;">
                                            <div class="form-group">
                                            <div class="col-sm-11">
                                                <input type="text" class="form-control price" value="{{$price_dt[$i]}}" id="product_price<?php echo $counts; ?>" name="price[]"  placeholder="Enter MRP Price"   readonly >
                                                </div>
                                              
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                     $product_mul_counts++;
                                     } 
                                    ?>
                                     <input type="hidden" value="<?php echo $product_mul_counts-1; ?>" id="product_mul_counts">
                                </table>
                            </div>
                        </div>
                        <script>
                          document.getElementById("producttable").addEventListener('keyup', function(e){
    if(e.target.classList.contains('editQty')){
      updateTotalAmount();
      

    }
});
                        </script>
                        
<script src="https://code.jquery.com/jquery-3.6.1.slim.js" integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>
                        <script>
                             var i = $("#product_mul_counts").val();
                            //  alert(i);
                             $("#add_pr_btn").click(function(){
                                    i++;
                                    var html2 =
                                    `<tr>
                                   
                                        <td style="border: 1px solid #a9a5a5;">
                                            <button type="button" id='remove_pr_btn' class="btn btn-default remove_pr_btn"><i class="fa fa-trash"></i></button>
                                        </td>

                                       

                                        <td style="border: 1px solid #a9a5a5;">
                                            <div class="form-group">
                                              <select class="form-control  " onchange="fetchProductPriceMulti(${i})"  name="productname[]" id="pro_id_${i}" placeholder='select Product'>
                                              
                                              @foreach( $product as $items)
                
                                                      <option value="{{ $items->id }}">{{ $items->product_name}}</option>
                                              @endforeach
                                          
                                            </select>
                                            </div>
                                        </td>
                                        <td style="border: 1px solid #a9a5a5;">
                                                            <div class="form-group">
                                                            <input type="text" class="form-control mrp_" name="mrp[]" placeholder="Enter MRP" id="mrp_${i}"   />
                                                            </div>
                                                        </td>
                                                        <td style="border: 1px solid #a9a5a5;">
                                                            <div class="form-group">
                                                            <input type="text" class="form-control qty_ editQty" id="qty_${i}" name="qty[]" placeholder="Enter QTY"/>
                                                            </div>
                                                        </td>

                                         

                                       <td>
                                        <div class="form-group">
                                                <div class="col-sm-11">
                                                <input type="text" value="" class="form-control price" id="product_price_${i}" name="price[]" data-discount="" placeholder="Enter MRP Price"   readonly >
                                                </div>
                                         </td>
                                    </tr>`;

                                    
                                    $("#producttable").append(html2);
                                   

                                     });
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
           
          $('#product_price_'+incre_i).val(data[0].mrp);
          $('#mrp_'+incre_i).val(data[0].mrp);
          $('#qty_'+incre_i).val(1);
       
          updateTotalAmount();


         
            
           
            
           
         
         
          }
      },
  });
} 

$("#producttable").on('click','.remove_pr_btn',function()
   {
      $(this).closest('tr').remove();
      updateTotalAmount();
    });
    $("#producttable").on('click','#helloremove',function()
                                    {
                                        var removesq=$(this).val();
                                        var id = $(this).attr("id");
                                       
                                        if(confirm("Are you sure you want to delete this?"))  
                                        { 
                                        
                                            $(this).closest('tr').remove();
                                            updateTotalAmount();
                                            calDiscount();
                                        }
                                    });

                                  


function updateTotalAmount(){
  let total_amount = 0;
    let  mrp_add = 0;
    

    $('#producttable tr').each(function(index, tr) {
        if(index > 0){
            var self = $(this);
            var qty = self.find("td:eq(2) input[type='text']").val();
            var mrp = self.find("td:eq(3) input[type='text']").val();

            total_amount = mrp * qty;
            self.find("td:eq(4) input[type='text']").val(total_amount);
            mrp_add = Number(parseFloat(mrp_add) + parseFloat(total_amount)).toFixed(2);
            $("#ttlamt").val(mrp_add);
            $("#mrpGrossTotal").val(mrp_add);
            calDiscount();
          
        }
  });
  }
//vishal sir //
  

  function calDiscount()
          {
            var  discType = $("#discType").val();
            var grand_total = 0;
                if(discType ==  "%") 
                { // %
                    let dis_rate = $("#discRates").val();
                    let ttlamt = $("#ttlamt").val();
                        if(dis_rate > 0)
                        {
                            
                            $("#discount").val($("#mrpGrossTotal").val() * $("#discRates").val() / 100);
                            $("#ttlamt").val($("#mrpGrossTotal").val() - $("#discount").val());
                        }
                        else{
                            $("#discount").val($("#mrpGrossTotal").val() * $("#discRates").val() / 100);
                            $("#ttlamt").val($("#mrpGrossTotal").val() - $("#discount").val());

                        }
                       
                }
                else if(discType == "Lumpsum")
                {  
                    let item = $("#mrpGrossTotal").val();
                    // let item = $(".itemamount").val();
                    let dis_rate = $("#discRates").val();
                    var discount = $( "div.discounts" ).find( 'input.discount' );
                    let ttlamt = $("#ttlamt").val();
                    var ttlamtt = $( "div.ttlamts" ).find( 'input.ttlamt' );
                    var disc_amt = dis_rate ;
                    discount.val(disc_amt);
                //      var discount = $( "div.discounts" ).find( 'input.discount' );
                // var ttlamtt = $( "div.ttlamts" ).find( 'input.ttlamt' );
               
                if(dis_rate > 0)
                        {
                            finett = item - disc_amt;
                            ttlamtt.val(finett);
                      
                        }
                        else{
                            finett = item - disc_amt;
                            ttlamtt.val(finett);
                        }
                    
                    
                    // lumpsum
                //     var item_amt = $("#itemamounts").val();
                // var tt_amts = $("#ttlamt").val();
                // var discount = $( "div.discounts" ).find( 'input.discount' );
                // var ttlamtt = $( "div.ttlamts" ).find( 'input.ttlamt' );
              
                // var disc_amt = dis_rate ;
                // discount.val(disc_amt);
                // finett = item_amt - disc_amt;
                // ttlamtt.val(finett);

                } 
          
        }

       
</script>
<div class="row">
                                <div class="col-md-3">
                                            Discount Amount:
                                </div>
                                <div class="col-md-3">
                                    <select class="form-control discType" id="discType" name="discType">
                                        @if ( $contacts['discType'] == "%" )
                                        <option value="%" selected>%</option>
                                        @elseif ( $contacts['discType'] == "Lumpsum" )
                                        <option value="Lumpsum" selected>Lumpsum</option>
                                      
                                        
                                        @endif
                                        <option value="%">%</option>
                                        <option value="Lumpsum">Lumpsum</option>
                                    </select>
                                </div>
                                <div class="col-md-3 form-group ">
                                    <input type="text" class="form-control discRate" name="discRate"  id="discRates" onkeyup="calDiscount()" value="{{old('discRate',$contacts->discRate)}}" />
                                </div>
                                <div class="col-md-3 discounts">
                                    <input type="hidden" id="mrpGrossTotal" name="">
                                    <input type="text" class="form-control discount" name="discount"  id="discount"  value="{{old('discount',$contacts->discount)}}" readonly   />
                                </div>
                            </div>

<div class="row" style="margin-top: 10px;">
                            <div class="col-md-12 row">
                                <div class="col-md-9">
                                    Total Amount
                                </div>
                                <div class="col-md-3 ttlamts">
                                <input type="text" class="form-control ttlamt"  name="ttlamt"  id="ttlamt" value="{{$contacts->ttlamt}}" style="float:right;" readonly />                                </div>
                              </div>
                           </div>
<!--kishhori start code-->
                        <div class="row">
                            <div class="col-md-12">
                                <legend>Payment Details </legend>
                                <table class="table table-striped table-bordered text-center" id="paymenttable" style="border: 1px solid #a9a5a5;">
                                    <tr>
                                       <th style="border: 1px solid #a9a5a5;">Action</th>
                                        <th style="border: 1px solid #a9a5a5;">Select Payment Mode</th>
                                         <th style="border: 1px solid #a9a5a5;">Select Payment Type</th>
                                        <th style="border: 1px solid #a9a5a5;">Payment Date</th>
                                        <th style="border: 1px solid #a9a5a5;">Remark</th>
                                        <th style="border: 1px solid #a9a5a5;">Amount</th>
                                    </tr>
                                    <?php
                                        
                                        // $id = $pharama['id'];

                                        $paymode_dt = explode(",", $contacts['payment_paymode']);
                                        $remark_dt = explode(",", $contacts['paymentremark']);
                                        $amt_dt = explode(",", $contacts['amount']);
                                        $payment_pay_dt = explode(",", $contacts['payment_pay']);
                                        

                                        
                                        
                                       
                                        $pay_mul_count = 0;
                                        for($i = 0; $i < count($paymode_dt); $i++) {
                                          $count = ($i>0 ? '_'.$i : '');
                                            
                                            
                                    ?>
                                    <tr>
                                        <td style="border: 1px solid #a9a5a5;">
                                            <button type="button" id='add_payment_btn' class="btn btn-default add_payment_btn"><i class="fa fa-plus"></i></button>
                                            <a value="{{$contacts->id}}" type="button" id="paymenttableremove" class="fa fa-trash"></a>    

                                        </td>
                                         <td style="border: 1px solid #a9a5a5;">
                                            <div class="form-group">
                                            <select class="form-control payment_paymode"  onchange="fetchPaymentPrice(<?php echo $i; ?>)" name="payment_paymode[]" id="payment_paymode<?php echo $count?>" placeholder='select Payment'>
                                            <?php
                                                           foreach ($pharama as $items) {
                                                            ?>
                                                            <option value="{{$items->id}}" {{$paymode_dt[$i] == $items->id  ? 'selected' : ''}}>{{$items->paymentmode}}</option>
                                                          
                                                    <?php
                                                           }
                                                    ?>
                                             </select>
                                             

                                             <!--select for payment details-->
                                            </div>
                                            <script>
                                               function fetchPaymentPrice(count_num){
                                                    // var products_id =  `${$("#products")}`;
                                                    let count_num_inc = (count_num > 0 ? '_'+count_num : '');
                                                    var payment_paymode = $("#payment_paymode"+count_num_inc).val();
                                                    if(payment_paymode){
                                                  $.ajax({
                                                    type:"GET",
                                                    url:"{{url('getPayMode')}}?tpapaymentmode="+payment_paymode,
                                                    success:function(res){        
                                                    if(res){
                                                      $("#payment_pay"+count_num_inc).empty();
                                                      $("#payment_pay"+count_num_inc).append('<option>Select payment_pay</option>');
                                                      $.each(res,function(key,value){
                                                        $("#payment_pay"+count_num_inc).append('<option value="'+key+'">'+value+'</option>');
                                                      });
                                                    
                                                    }else{
                                                      $("#payment_pay"+count_num_inc).empty();
                                                    }
                                                    }
                                                  });
                                                 }

                                                       
                                                    }

                                            </script>
                                            <!--end payment details-->
                                            </td>

                                        <td style="border: 1px solid #a9a5a5;">
                                            <div class="form-group">
                                            <select class="form-control"  name="payment_pay[]"  id="payment_pay<?php echo $count; ?>"  placeholder='select item'>
                                             <?php
                                                           foreach ($paymentpay as $items) {
                                                            ?>
                                                            <option value="{{$items->id}}" {{$payment_pay_dt[$i] == $items->id  ? 'selected' : ''}}>{{$items->tpapaymenttype}}</option>
                                                          
                                                    <?php
                                                           }
                                                    ?>
                                                </select>
                                                
                                            </div>
                                        </td>
                                        <td style="border: 1px solid #a9a5a5;">
                                            <div class="form-group">
                                            <input type="text" class="form-control paymentdate" name="paymentdate[]" placeholder="Enter Payment Date" value="<?=date('d-m-Y');?>">                                            </div>
                                        </td>
                                        
                                        <td style="border: 1px solid #a9a5a5;">
                                            <div class="form-group">
                                            <input type="text" class="form-control paymentremark" value="{{$remark_dt[$i]}}" name="paymentremark[]" placeholder="Enter Remark" >                                            </div>
                                        </td>
                                        <td style="border: 1px solid #a9a5a5;">
                                            <div class="form-group">
                                            <div class="col-sm-11">
                                            <input type="text" class="form-control amount" name="amount[]" value="{{$amt_dt[$i]}}"  placeholder="Enter Amount"  onkeyup="amountmanage()" id="amount<?php echo $count; ?>">                                        </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php 
                                  $pay_mul_count++;
                                  } ?>
                                  <input type="hidden" value="<?php echo $pay_mul_count-1; ?>" id="pay_mul_count">
                                </table>
                                
                            </div>
                        </div>
                        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

                        <script type="text/javascript">
                          // alert('hii');
                          $(function(){
                            $('.amount').mask('#,###.##',{reverse : true});
                            var total_amount = function(){
                              var sum=0;
                              $('.amount').each(function(){
                                var num = $(this).val().replace(',','');
                                if(num != 0){
                                  sum += parseFloat(num);
                                }
                              });
                               $('.paidamt').val(sum);
                            }
                            $('.amount').keyup(function(){
                              paidamt();
                             });
                           });
                           </script> -->

<!--script for payment details -->
<!-- <script type="text/javascript">
    $('#amount').on('keyup', function() {
  var amt = parseInt($(this).val());
    amount = 0;
	$(".amount").each(function(){
		// alert($(this).val());
        if(amt != "")
        {
            amount += amt;
        }
    });
    $("#paidamt").val(amount);
    
});
</script> -->
<script>
// $(document).on("keyup", ".amount", function() {
//   // var id = $(this).parent().parent().attr('id');
//   // id = '#'+id;
//   // console.log(id);
//     var sum = 0;
//     $(".amount").each(function(){
//         sum += +$(this).val();
//     });
//     $(".paidamt").val(sum);
//   });
function amountmanage()
  {
    var sum = 0;
    $(".amount").each(function(){
        sum += +$(this).val();
    });
    $(".paidamt").val(sum);
     

  }
</script>
<!-- <script>
$('.amount').on('keyup', function() {        
            itemamounts = 0;
            $(".amount").each(function(){
                var amt = $(this).val();
                if(amt != ''){
                    itemamounts += +amt;
                    $(".paidamt").val(itemamounts);
                }else{
                    $(".paidamt").val(0);
                }
                
            });
            
        });
        </script> -->
<!--end script for payment details -->
 <!--kishori end code-->
<!--kishori start code-->
                          <script>
                           var i=0;
                           var i = $("#pay_mul_count").val();

                             $("#add_payment_btn").click(function(){
                              i++;
                                    var html3 =
                                    `<tr>
                                   
                                        <td style="border: 1px solid #a9a5a5;">
                                            <button type="button" id='remove_payment_btn' class="btn btn-default remove_payment_btn"><i class="fa fa-trash"></i></button>
                                        </td>

                                        <td style="border: 1px solid #a9a5a5;">
                                            <div class="form-group">
                                            <select class="form-control "  name="payment_paymode[]" id="payment_paymode_${i}" placeholder='select Payment' onchange="fetchPaymentPriceMulti(${i})">
                                              @foreach( $pharama as $items)
                                                <option value="{{ $items->id }}">{{ $items->paymentmode}}</option>
                                              @endforeach
                                            </select>
                                            </div>
                                        </td>
                                        <td style="border: 1px solid #a9a5a5;">
                                            <div class="form-group">
                                                <select class="form-control payment_pay"  name="payment_pay[]" id="payment_pay_${i}" placeholder='select item'>
                                                </select>
                                            </div>
                                        </td>
                                        <td style="border: 1px solid #a9a5a5;">
                                            <div class="form-group">
                                              <input type="text" class="form-control paymentdate" name="paymentdate[]" placeholder="Enter Payment Date" value="<?=date('d-m-Y');?>">
                                            </div>
                                        </td>
                                         <td style="border: 1px solid #a9a5a5;">
                                            <div class="form-group">
                                              <input type="text" class="form-control paymentremark" name="paymentremark[]" placeholder="Enter Remark" id="paymentremark_${i}">
                                            </div>
                                        </td>
                                        <td style="border: 1px solid #a9a5a5;">
                                            <div class="form-group">
                                            <div class="col-sm-11">
                                              <input type="text" class="form-control amount" name="amount[]" placeholder="Enter Amount" id="amount_${i}" onkeyup="amountmanage()">
                                        </div>
                                    </div>
                              </td>
                              </tr>`;
                                    $("#paymenttable").append(html3);
                                    });

                                    //kishori sub table code//

//   function fetchPaymentPriceMulti(incre_i){
//   var products_id =  $('#payment_paymode_'+incre_i).val();
  
//   $.ajax({
//       url: "{{url('/get_pay_mode')}}",
//       method:'POST',
//       data :{
//           "_token": "{{csrf_token()}}",
//           id:products_id,
//       },
//       success:function(data){
//           if(data)
//           {
//             console.log(data[0].mrp);
//           // $('#product_price_'+incre_i).val(data[0].mrp);
//           // $('#ttlamt').val(data[0].mrp);
//           }
//       },
//   });
// } 
//script for payment//
                                              function fetchPaymentPriceMulti(incre_i){
                                               
                                                // $("#payment_paymode_").change(function(incre_i){
                                                  var payment_paymode =  $('#payment_paymode_'+incre_i).val();
                                                  console.log(payment_paymode);
                                                // var payment_paymode= $(this).val();
                                               
                                               
                                                  $.ajax({
                                                    type:"GET",
                                                    url:"{{url('getPayMode')}}?tpapaymentmode="+payment_paymode,
                                                    success:function(res){        
                                                    if(res){
                                                      $('#payment_pay_'+incre_i).empty();
                                                      $('#payment_pay_'+incre_i).append('<option>Select payment_pay</option>');
                                                      $.each(res,function(key,value){
                                                        $('#payment_pay_'+incre_i).append('<option value="'+key+'">'+value+'</option>');
                                                      });
                                                    
                                                    }else{
                                                      $('#payment_pay_'+incre_i).empty();
                                                    }
                                                    }
                                                  });
                                                
 }

 $("#paymenttable").on('click','.remove_payment_btn',function()
                                    {
                                        $(this).closest('tr').remove();
                                        amountmanage();
                                      
                                        
                                    });
                                    $("#paymenttable").on('click','#paymenttableremove',function()
                                    {

                                        var removesql=$(this).val();
                                        var ids = $(this).attr("id");
                                        //alert(ids)
                                        if(confirm("Are you sure you want to delete this?"))  
                                        { 
                                        // alert(id);
                                            $(this).closest('tr').remove();
                                            amountmanage();
                                           
                                        }
                                    });
                                 </script>
                         
                 <!--kishhori end code-->          
                     <div class="row" style="margin-top: 10px;">
                            <div class="col-md-12 row">
                                <div class="col-md-9 text-right">
                                    Paid Amount
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control paidamt" name="paidamt" id="paidamt" value="{{$contacts->paidamt}}"  readonly />
                                </div>
                            </div>
                        </div>
                    </div>

               

                <div class="form-group">
                    <input type="submit" value="Save" class="btn btn-primary">
                    <button type="submit" class="btn btn-primary" id="HospitalInvoicePrint">Save & Print</button>
                    <input type='hidden' name='formaction' value='addMedicalRecord'/>
                    <input type='hidden' name='formactionPrint' id="onlySavePrint" value='onlySave'/>
                </div>
            </form>
        </div>
      </div>
<!--kishori end code-->
<!--kishori start patient code-->
<script>
$(document).ready(function(){
 $('.selectpicker').selectpicker();

 $('#patientname').change(function(){
  $('#hidden_framework').val($('#patientname').val());
 });
});
</script>

        <!--script for dependent droupdown-->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->


       

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">

function fetchProductPrice(count_num){
  
  // var products_id =  $('#pro_id').val();
  let count_num_inc = (count_num > 0 ? '_'+count_num : '');
  var products_id = $("#products"+count_num_inc).val();
  
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
    
          $('#product_price'+count_num_inc).val(data[0].mrp);
          $('#mrp'+count_num_inc).val(data[0].mrp);
        
         
          $('#qty'+count_num_inc).val(1);
        
          updateTotalAmount();
          
          }
      },
  });
} 


  $(document).ready(function(){
    
    $('#category').change(function(){
                                    var catid = $(this).val();  
                                    // alert(catid);
                                    if(catid){
                                        $.ajax({
                                        type:"GET",
                                        url:"{{url('fetch_sub_cat')}}?category="+catid,

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
<!--kishori end code-->
@stop

