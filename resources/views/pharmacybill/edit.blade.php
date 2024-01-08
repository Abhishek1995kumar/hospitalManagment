@extends('layouts.app')
@section('title')
{{ __('Edit Pharmacy Bill') }}
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
                    
                <form action="{{url('pharma/edit/'.$pharama->id)}}" method="post" id="updatepharma" name="updatepharma">                    @csrf
                    @csrf
                        <div class="row gx-10 mb-5">
                        <div class="col-md-6">
                                <div class="form-group mb-5">
                                        <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Bill date :</label>
                                        <input type="text" name="billdate" id="billdate" value="{{old('billdate',$pharama->billdate)}}" class="form-control"  readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                        <div class="form-group mb-5">
                                        <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3"> Bill No :</label>
                                        <input type="text" name="bill_no" id="bill_no" value="{{$pharama->bill_no}}" class="form-control"  readonly>
                                           
                                        </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-5">
                                        <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Doctor Name :</label>

                                        <select class="form-select "  name="dname" id="dname">
                                                <option value="">Select Doctor name</option>
                                                       

                                                        <option value="">Please Select</option>
                                                         @foreach($doctorref as $items)
                                                        
                                                        <option value="{{$items->id}}" {{$pharama->dname == $items->id  ? 'selected' : ''}}>{{$items->full_name}}</option>
                                                      @endforeach
                                        </select>
                                            
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-5">
                                        <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Patient Name :</label>

                                        <select class="form-select "  name="pname" id="pname">
                                                <option value="">Select patient name</option>
                                                    
                                                         @foreach($patientref as $items)
                                                        
                                                        <option value="{{$items->id}}" {{$pharama->pname == $items->id  ? 'selected' : ''}}>{{$items->full_name}}</option>
                                                      @endforeach
                                        </select>
                                            
                                </div>
                            </div>
                           
                            <div class="col-md-6">
                                <div class="form-group mb-5">
                                    <label for="patientType">Patient Type</label> 
                                    <select class="form-control patientType" id="patientType" name="patientType">
                                        @if ( $pharama['patientType'] == "old" )
                                        <option value="old" selected>old</option>
                                        @elseif ( $pharama['patientType'] == "Review" )
                                        <option value="Review" selected>Review</option>
                                        @elseif ( $pharama['patientType'] == "New" )
                                        <option value="New" selected>New</option>
                                        @elseif( $pharama['patientType'] == "Medicine" )
                                        <option value="Medicine" selected>Medicine</option>
                                        @else
                                        
                                        @endif
                                        <option value="old" >old</option>
                                        <option value="Review">Review</option>
                                        <option value="New" >New</option>
                                        <option value="Medicine" >Medicine</option>
                                    </select>
                                  
                                </div>
                            </div>
                            <div class="col-md-6">
                                        <div class="form-group mb-5">
                                            <label for="details">Details</label> 
                                            <textarea name="details" class="form-control"  value="{{old('details')}}">{{$pharama->details}}</textarea>
                                        </div>
                            </div>
                            <div class="col-md-6">
                                        <div class="form-group mb-5">
                                        <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Bill No :</label>
                                        <input type="text" name="bill_no" class="form-control" value="{{old('bill_no',$pharama->bill_no)}}">
                                           
                                        </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-striped table-bordered text-center" id="itemTable" style="border: 1px solid grey;">
                                        <tr>
                                            <th style="border: 1px solid #a9a5a5;">Action</th>
                                            <th style="border: 1px solid #a9a5a5;">Select Product</th>
                                            <th style="border: 1px solid #a9a5a5;">Packaging</th>
                                            <!-- <th style="border: 1px solid #a9a5a5;width:10%;">Batch No.</th> -->
                                            <th style="border: 1px solid #a9a5a5;">Expiry Date</th>
                                            <th style="border: 1px solid #a9a5a5;">HSN Code</th>
                                            <th style="border: 1px solid #a9a5a5;">MRP</th>
                                            <th style="border: 1px solid #a9a5a5;">QTY</th>
                                            <th style="border: 1px solid #a9a5a5;">Amount</th>
                                        </tr>
                                        <?php
                                        $product_dt = explode(",", $pharama['products']);
                                        $hsn_dt = explode(",", $pharama['hsncode']);
                                        $mrp_dt = explode(",", $pharama['mrp']);
                                        $qty_dt = explode(",", $pharama['qty']);
                                        $itemamount_dt = explode(",", $pharama['itemamount']);
                                        $pakage_dt = explode(',', $pharama['packaging']);
                                        $expire_date_dt = explode(',', $pharama['expire_date']);
                                        // $id = $pharama['id'];

                                        
                                        
                                       
                                        $product_mul_count = 0;
                                        for($i = 0; $i < count($product_dt); $i++) {
                                            $count = ($i>0 ? '_'.$i : '');
                                            
                                    ?>
                                        <tr>
                                            <td style="border: 1px solid #a9a5a5;">
                                                <a type="button" id="hello" class="fa fa-plus"></a>  
                                                <a value="{{$pharama->id}}" type="button" id="helloremove" class="fa fa-trash"></a>    
  
                                                   

                                            </td>
                                            <td style="border: 1px solid #a9a5a5;">
                                                <div class="form-group">
                                                <select class="form-select" class="products" name="products[]" onchange="fetchProductPrice(<?php echo $i; ?>)" id="products<?php echo $count?>">
                                                            <option value="">Select medicines name</option>
                                                            <?php
                                                           foreach ($medicinesref as $items) {
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
                                                    <select class="form-control packaging" id="packaging" name="packaging[]"  >
                                                    <?php foreach($pharama as  $val_member)?>
                                                    <?php echo '<option value="'.$pakage_dt[$i].'" selected>'.$pakage_dt[$i].'</option>'; ?> 
                                                        <option value="1">1</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="6">6</option>
                                                        <option value="10">10</option>
                                                        <option value="15">15</option>
                                                        <option value="18">18</option>
                                                    </select>
                                                </div>
                                            </td>
                                            <!-- <td style="border: 1px solid #a9a5a5;">
                                                <div class="form-group">
                                            <select class="form-control batchno" id="batchno" name="batchno[]" onchange="batchNoOnChange(this)"  >
                                                        
                                                    </select>
                                                </div>
                                            </td> -->
                                            <td style="border: 1px solid #a9a5a5;">
                                                <div class="form-group">
                                                <input type="text" class="form-control expire_date" name="expire_date[]" placeholder="Enter Expire Date" value="{{$expire_date_dt[$i]}}" />
                                                <lable class="lblExpireDate"></lable>
                                                </div>
                                            </td>
                                            <td style="border: 1px solid #a9a5a5;">
                                                <div class="form-group">
                                                <input type="text" class="form-control hsncode" id="hsncode<?php echo $count; ?>" name="hsncode[]" placeholder="Enter HSN Code"   value="{{$hsn_dt[$i]}}"  />
                                                </div>
                                            </td>
                                            <td style="border: 1px solid #a9a5a5;">
                                                <div class="form-group">
                                                <input type="text" class="form-control  mrp" id="mrp<?php echo $count; ?>" name="mrp[]" placeholder="Enter MRP"  value="{{$mrp_dt[$i]}}"/>
                                                </div>
                                            </td>
                                            <td style="border: 1px solid #a9a5a5;">
                                                <div class="form-group">
                                                <input type="text" class="form-control qty editQty" id="qty<?php echo $count; ?>" name="qty[]" placeholder="Enter QTY"  value="{{$qty_dt[$i]}}"  />
                                                </div>
                                            </td>
                                            <td style="border: 1px solid #a9a5a5;">
                                                <div class="form-group">
                                                <input type="text" class="form-control itemamount" id="itemamounts<?php echo $count; ?>" name="itemamount[]" placeholder="Enter Amount" value="{{$itemamount_dt[$i]}}"   />
                                                </div>
                                            </td>
                                        </tr>
                                       
                                        <?php 
                                        $product_mul_count++;
                                    }?>
                                     <input type="hidden" value="<?php echo $product_mul_count-1; ?>" id="product_mul_count">
                                    </table>
                                </div>
                            </div>

                            <script>
                                
                                var i = $("#product_mul_count").val();
                               $("#hello").click(function(){
                                    i++;
                                    var html = 
                                    `       <tr>
                                                <td style="border: 1px solid #a9a5a5;">
                                                    
                                                    <a type="button"  class="fa fa-trash removeMedicalProductModalRow"></a>    

                                                </td>
                                                <td style="border: 1px solid #a9a5a5;">
                                                    <div class="form-group">
                                                    <select class="form-select" onchange="fetchProductPriceMult(${i})" class="products" name="products[]" id="products_${i}">
                                                            <option value="">Select medicines name</option>
                                                            @foreach( $medicinesref as $items)
                                                            <option value="{{ $items->id }}">{{ $items->product_name}}</option>
                                                            @endforeach
                                                    </select>
                                                      
                                                    </div>
                                                </td>
                                                <td style="border: 1px solid #a9a5a5;">
                                                    <div class="form-group">
                                                        <select class="form-control packaging" id="packaging" name="packaging[]"  >
                                                            <option value="1">1</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="6">6</option>
                                                            <option value="10">10</option>
                                                            <option value="15">15</option>
                                                            <option value="18">18</option>
                                                        </select>
                                                    </div>
                                                </td>
                                                <td style="border: 1px solid #a9a5a5;">
                                                    <div class="form-group">
                                                    <input type="text" class="form-control expire_date" name="expire_date[]" placeholder="Enter Expire Date"  />
                                                    <lable class="lblExpireDate"></lable>
                                                    </div>
                                                </td>
                                                <td style="border: 1px solid #a9a5a5;">
                                                    <div class="form-group">
                                                    <input type="text" class="form-control hsncode" id="hsncode_${i}" name="hsncode[]" placeholder="Enter HSN Code"   />
                                                    </div>
                                                </td>
                                                <td style="border: 1px solid #a9a5a5;">
                                                    <div class="form-group">
                                                    <input type="text" class="form-control mrp_" name="mrp[]" placeholder="Enter MRP" id="mrp_${i}"   />
                                                    </div>
                                                </td>
                                                <td style="border: 1px solid #a9a5a5;">
                                                    <div class="form-group">
                                                    <input type="text" class="form-control qty_ editQty" id="qty_${i}" name="qty[]" placeholder="Enter QTY"   />
                                                    </div>
                                                </td>
                                                <td style="border: 1px solid #a9a5a5;">
                                                    <div class="form-group">
                                                    <input type="text" id="itemamount_${i}" class="form-control itemamount" name="itemamount[]" placeholder="Enter Amount"/>
                                                    </div>
                                                </td>
                                            </tr>`;
                                    $("#itemTable").append(html);
                                    });
function fetchProductPriceMult(milt_i){
    var products_id =  $('#products_'+milt_i).val();
    // alert(products_id);
    $.ajax({
        url: "{{url('/Product_pricess')}}",
        method:'POST',
        data :{
            "_token": "{{ csrf_token() }}",
            id:products_id,
        },
        success:function(data){
            if(data)
            {
            $('#mrp_'+milt_i).val(data[0].mrp);
            // $('#ttlamt').val(data[0].mrp);
            $('#itemamount_'+milt_i).val(data[0].mrp);
            $('#qty_'+milt_i).val(1);
            $('#hsncode_'+milt_i).val(data[0].hsn_name);
            updateTotalAmount();
            }
        },
    });

}

                                    $("#itemTable").on('click','.removeMedicalProductModalRow',function()
                                    {
                                        $(this).closest('tr').remove();
                                        updateTotalAmount();
                                        calDiscount();
                                    });
                                    $("#itemTable").on('click','#helloremove',function()
                                    {
                                        var removesq=$(this).val();
                                        var id = $(this).attr("id");
                                        if(confirm("Are you sure you want to delete this?"))  
                                        { 
                                        // alert(id);
                                            $(this).closest('tr').remove();
                                            updateTotalAmount();
                                            calDiscount();
                                        }
                                    });

                                   
                                      
//cal product price base on qty    
function updateTotalAmount(){
    let total_amount = 0;
    let  mrp_add = 0;

    $('#itemTable tr').each(function(index, tr) {
        if(index > 0){
            var self = $(this);
            var qty = self.find("td:eq(6) input[type='text']").val();
            var mrp = self.find("td:eq(5) input[type='text']").val();

            total_amount = mrp * qty;
            self.find("td:eq(7) input[type='text']").val(total_amount);
            mrp_add = Number(parseFloat(mrp_add) + parseFloat(total_amount)).toFixed(2);
            $("#ttlamt").val(mrp_add);
            $("#mrpGrossTotal").val(mrp_add);
            calDiscount();
        }

    });
}

// $(document).on('keyup', '.qty_', function(){
//             var hdprice = $(this).parents('tr').find('input.mrp_').val();
//             var hditem_amt = $(this).parents('tr').find('input.itemamount');
//            var hdqty = $(this).val();
//             var hdtotal_qty = hdqty * hdprice;
//             hditem_amt.val(hdtotal_qty);
           


           
//         });   
                      
document.getElementById("itemTable").addEventListener('keyup', function(e){
    if(e.target.classList.contains('editQty')){
        updateTotalAmount();
        calDiscount();
//         // console.log($("#"+e.target.getAttribute("id")).val());
//         var productQty = $("#"+e.target.getAttribute("id")).val();
//         // var proRate =$("#"+e.target.previousSibling.getAttribute("id")).val();
//         console.log(e.target.previousSibling);
//         // $(this).find("td:eq(7) input[type='text']").val(productQty * proRate)
//         // e.target.closest("tr").children[7].textContent = productQty * proRate;
    }
});
                      
                            </script>
                            <div class="row">
                                <div class="col-md-3">
                                            Discount Amount:
                                </div>
                                <div class="col-md-3">
                                    <select class="form-control discType" id="discType" name="discType">
                                                


                                         @if ( $pharama['discType'] == "%" )
                                        <option value="%" selected>%</option>
                                        @elseif ( $pharama['discType'] == "Lumpsum" )
                                        <option value="Lumpsum" selected>Lumpsum</option>
                                      
                                        
                                        @endif
                                        <option value="%">%</option>
                                        <option value="Lumpsum">Lumpsum</option>


                                                
                                    </select>
                                </div>
                                <div class="col-md-3 form-group ">
                                    <input type="text" class="form-control discRate" name="discRate"  id="discRates" onkeyup="calDiscount()"  value="{{old('discRate',$pharama->discRate)}}" />
                                </div>
                                <div class="col-md-3 discounts">
                                    <input type="hidden" id="mrpGrossTotal" name="">
                                    <input type="text" class="form-control discount" readonly name="discount"  id="discount"  value="{{old('discount',$pharama->discount)}}" readonly    />
                                </div>
                            </div>
                            <div class="row" style="margin-top: 10px;">
                            
                                <div class="col-md-9">
                                    Total Amount
                                </div>
                                <div class="col-md-3 form-group ttlamts">
                                    <input type="text" class="form-control ttlamt" readonly name="ttlamt"  id="ttlamt" style="float:right;" value="{{old('ttlamt',$pharama->ttlamt)}}" readonly/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                                <div class="col-md-12">
                                    <legend>Payment Details </legend>
                                    <table class="table table-striped table-bordered text-center" id="itemTablePayementDetails" style="border: 1px solid grey;">
                                        <tr>
                                            <th style="border: 1px solid #a9a5a5;">Action</th>
                                            <th style="border: 1px solid #a9a5a5;">Select Payment Mode</th>
                                            <th style="border: 1px solid #a9a5a5;">Payment Date</th>
                                            <th style="border: 1px solid #a9a5a5;">Remark</th>
                                            <th style="border: 1px solid #a9a5a5;">Amount</th>
                                        </tr>
                                        <?php
                                        $paymode_dt = explode(",", $pharama['payment_paymode']);
                                        $remark_dt = explode(",", $pharama['paymentremark']);
                                        $amt_dt = explode(",", $pharama['amount']);
                                      
                                        // $id = $pharama['id'];

                                        
                                        
                                       
                                        
                                        for($i = 0; $i < count($paymode_dt); $i++) {
                                    ?>
                                        <tr>
                                            <td style="border: 1px solid #a9a5a5;">
                                                <button type="button" id='addButton_PaymentDetails' class="btn btn-default addButton_PaymentDetails"><i class="fa fa-plus"></i></button>
                                                <a value="{{$pharama->id}}" type="button" id="remove" class="fa fa-trash"></a>    

                                            </td>
                                            <td style="border: 1px solid #a9a5a5;">
                                                <div class="form-group">
                                                <select class="form-select "  name="payment_paymode[]" id="payment_paymode">
                                                      
                                                      <?php
                                                           foreach ($paymentref as $items) {
                                                            ?>
                                                            <option value="{{$items->id}}" {{$paymode_dt[$i] == $items->id  ? 'selected' : ''}}>{{$items->payment_name}}</option>
                                                          
                                                    <?php
                                                           }
                                                    ?>
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
                                                <input type="text" class="form-control paymentremark" name="paymentremark[]" value="{{$remark_dt[$i]}}"  placeholder="Enter Remark" >
                                                </div>
                                            </td>
                                            <td style="border: 1px solid #a9a5a5;">
                                                <div class="form-group">
                                                <input type="text" class="form-control" name="amount[]" placeholder="Enter Amount" onkeyup="updateTotalpaymentAmount()"   value="{{$amt_dt[$i]}}"   >
                                                </div>
                                            </td>
                                        </tr>
                                        <?php }?>
                                    </table>
                                     </div>
                            </div>
                            <script>


function updateTotalpaymentAmount(){
    let total_amount = 0;
    let  mrp_add = 0;

    $('#itemTablePayementDetails tr').each(function(index, tr) {
        if(index > 0){
            var self = $(this);
           
            total_amount = self.find("td:eq(4) input[type='text']").val();
            mrp_add = Number(parseFloat(mrp_add) + parseFloat(total_amount)).toFixed(2);
            $("#paidamt").val(mrp_add);
           
        }

    });
}

                               $("#addButton_PaymentDetails").click(function(){
                                    var html2 =`<tr>
                                            <td style="border: 1px solid #a9a5a5;">
                                                <button type="button" id='remove_paymentdetails_row' class="btn btn-default remove_paymentdetails_row"><i class="fa fa-trash"></i></button>
                                            </td>
                                            <td style="border: 1px solid #a9a5a5;">
                                                <div class="form-group">
                                                    <select class="form-select " name="payment_paymode[]" id="payment_paymode">
                                                      
                                                                @foreach( $paymentref as $items)
                                                                <option value="{{ $items->id }}">{{ $items->payment_name}}</option>
                                                                @endforeach
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
                                                <input type="text" class="form-control paymentremark" name="paymentremark[]" placeholder="Enter Remark" >
                                                </div>
                                            </td>
                                            <td style="border: 1px solid #a9a5a5;">
                                                <div class="form-group">
                                                <input type="text" class="form-control amount" name="amount[]" placeholder="Enter Amount" onkeyup="updateTotalpaymentAmount()" >
                                                </div>
                                            </td>
                                        </tr>`;
                                    $("#itemTablePayementDetails").append(html2);
                                    });
                                    $("#itemTablePayementDetails").on('click','.remove_paymentdetails_row',function()
                                    {
                                        $(this).closest('tr').remove();
                                        updateTotalpaymentAmount();
                                    });
                                    $("#itemTablePayementDetails").on('click','#remove',function()
                                    {
                                        var removes=$(this).val();
                                       
                                        var id = $(this).attr("id");
                                        //alert(id)
                                        if(confirm("Are you sure you want to delete this?"))  
                                        { 
                                    
                                            $(this).closest('tr').remove();
                                            updateTotalpaymentAmount();
                                        }
                                    });
                                    

                                   
                                      
                              
                      
                            </script>
                             <div class="row" style="margin-top: 10px;">
                                <div class="col-md-12">
                                    <div class="col-md-9 text-right">
                                        Paid Amount
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control paidamt" name="paidamt"  id="paidamt" value="{{old('paidamt',$pharama->paidamt)}}"  readonly  />
                                    </div>
                                </div>
                            </div>
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-primary mt-3">update </button>
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
    <script>
                                                function fetchProductPrice(count_num){
                                                    // var products_id =  `${$("#products")}`;
                                                    let count_num_inc = (count_num > 0 ? '_'+count_num : '');
                                                    var products_id = $("#products"+count_num_inc).val();
                                                    $.ajax({
                                                            url: "{{url('/Product_pricess')}}",
                                                            method:'POST',
                                                            data :{
                                                                "_token": "{{ csrf_token() }}",
                                                                id:products_id,
                                                            },
                                                            success:function(data){
                                                               if(data)
                                                               {
                                                                // console.log( e.target.parentElement.parentElement);
                                                                $('#mrp'+count_num_inc).val(data[0].mrp);
                                                                // $('#ttlamt').val(data[0].mrp);
                                                                $('#itemamounts'+count_num_inc).val(data[0].mrp);
                                                                $('#qty'+count_num_inc).val(1);
                                                                $('#hsncode'+count_num_inc).val(data[0].hsn_name);
                                                                updateTotalAmount();
                                                               }
                                                            },
                                                        });
                                                       
                                                    }
                                            </script>
    <script type="text/javascript">
       
       

        // $(document).on('keyup', '#qty', function(){
        //     var price = $(this).parents('tr').find('input.mrp').val();
            
        //     var item_amt = $(this).parents('tr').find('input.itemamount');
           
           
        //     //input find karne ke liye
        //     var ttlamtt = $( "div.ttlamts" ).find( 'input.ttlamt' );
        // //   var qty = $(this).val();
        // //   var total_qty = qty * price;  
        // //     item_amt.val(total_qty);
        // //     ttlamtt.val(total_qty);
            
           

           
        //   });


          
          function calDiscount()
          {
                var  discType = $("#discType").val();
               
            var grand_total = 0;
                if(discType == "%") 
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
@endsection


<script src="https://code.jquery.com/jquery-3.6.1.slim.js" integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>

