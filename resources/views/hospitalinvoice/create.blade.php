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
      
      <form action="{{url('hospitalinvoice')}}" method="post">
        {!! csrf_field() !!}
        <div class="form-group row">
       


          <div class="col-lg-3">
            <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Hospital Invoice  No :</label>
            <input type="text" name="invoice_no" id="invoice_no"   value="HOSP_INV_{{ $lastId }}"   class="form-control"  readonly>
            </div>
         




            <div class="col-lg-3">
                <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Date Of Admission:</label>
                <input type="text" name="mr_admission_date" id="mr_admission_date" class="form-control" readonly value="<?=date('d-m-Y');?>">
            </div>

            <div class="col-sm-3">
               
                <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Date Of Disharge :</label>
                <input type="text" name="mr_discharge_date" id="mr_discharge_date" class="form-control" value="<?=date('d-m-Y');?>">
            </div>

            <div class="col-sm-3">
               <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Doctor Name :</label>
                     <select class="form-control" data-live-search="true" name="doctorname" id="doctorname" required>
                        <option value="">Select Doctor name</option>
                                @foreach($doctorref as $items)
                                <option value="{{ $items->id }}">{{$items->full_name}}</option>
                                @endforeach
                    </select>
            </div>
        </div>
        <br>
       
        <div class="form-group row">
            <div class="col-sm-4">
                 <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Patient Code/Cr code :</label>
                    <select class="form-control" data-live-search="true"  name="patientname" id="patientname" required>
                        <option value="">Select Patient name</option>
                                @foreach($patientref as $items)
                        <option value="{{ $items->id }}">{{ $items->full_name}}{{'( P'.$items->id.')'}}</option>
                                @endforeach
                    </select>
            </div>
            <div class="col-sm-4">
            
                <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Select Type:</label>
                <select id="selecttype" name="selecttype" class="form-control" required>
                  <option value="">Select Type</option>
                  <option value="New">New</option>
                  <option value="Old">Old</option>
                  <option value="Others">Others</option>
                  <option value="Review">Review</option>
                 </select>
            </div>
            <div class="col-sm-4">
                 
                 <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Room Type:</label>
                <select id="roomtype" name="roomtype" class="form-control" required>
                   <option value="">Select Room Type</option>
                  <option value="Single bed ">Single bed</option>
                  <option value="Double bed ">Double bed</option>
                  <option value="General ward">General ward</option>
                  <option value="Private">Private</option>
                </select>
         </div>
        </div><br>

        <div class="form-group row">
            <div class="col-sm-4">
            <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Payment</label>
                  <select id="paymenttype" name="paymenttype" class="form-control" required>
                   <option value="">Select Payment</option>
                   <option value="advance">Advance</option>
                   <option value="refund">Refund</option>
                </select>
            </div>
            <div class="col-sm-4">
            <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3" >Payment amount</label>
                <input type="text" name="payment_amount" id="payment_amount" class="form-control" required>
            </div>
            <div class="col-sm-4">
            <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Procedure</label>
                <textarea class='form-control' type='text' name="procedure" id="procedure" class="form-control" required></textarea>
            </div>
        </div>
        <br>
        <div class="form-group row">
            <div class="col-sm-4">
            <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Details</label>
                <textarea class='form-control' type='text' name="details" id="details" class="form-control" required></textarea>
            </div>
            <div class="col-sm-4">

            <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Patient Type</label>
                <select id="patienttype" name="patienttype" class="form-control" required>
                               <option value="">Select Patient Type</option>
                                <option value="Self">Self</option>
                                <option value="TPA">TPA</option>
                                <option value="RSBY">RSBY</option>
                                <option value="MJPJAY">MJPJAY</option>
                                <option value="Railway">Railway</option>
                                <option value="Ayushman Bharat">Ayushman Bharat</option>
                                <option value="ECHS">ECHS</option>
                                <option value="Post Office">Post Office</option>
                                <option value="CGHS">CGHS</option>
                                <option value="ESIC">ESIC</option>
                                <option value="JNPT">JNPT</option>
                                <option value="BSNL">BSNL</option>
                                <option value="HUMRAHEE CAMP">HUMRAHEE CAMP</option>
                                <option value="AIR INDIA">AIR INDIA</option>
                                <option value="CRPF">CRPF</option>
                                <option value="CISF">CISF</option>
                                <option value="NAVAL DOCKYARD">NAVAL DOCKYARD</option>
                </select>
        </div>
        
        <div class="col-sm-4">     
          <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Payment Type </label>
                 <select id="paymenttypeone" name="paymenttypeone" class="form-control" required>
                                        <option value="">Select Payment Type</option>
                                        <option value="Paid">Paid</option>
                                        <option value="Credit">Credit</option>
                                        <option value="FOC">FOC</option>
                                        <option value="AAC">Academic</option>
                                        <option value="Copayment">Copayment</option>
                </select>
        </div>
        </div><br>
        
        <div class="form-group row">
            <div class="col-sm-4">
            <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Category </label>
                <select id="category" name="category" class="form-control" required>
                @foreach( $vcateg as $items)
                  <option value="{{ $items->cat_id }}">{{ $items->cat_name}}</option>
                @endforeach
                </select>
            </div>
            <div class="col-sm-4">
            <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Sub-Category </label>
                <select id="subcategory" name="subcategory" class="form-control" required>
                </select>
            </div>
      </div><br>
              <div class="row" style=" overflow-x:scroll;">
                <div class="col-md-12">
                  <legend>Product Details </legend>
                  <table class="table table-striped table-bordered text-center" id="producttable" style= "width:180vh;border: 1px solid #a9a5a5; overflow-x:scroll;">
                      <tr>
                          <th style="border: 1px solid #a9a5a5;">Action</th>
                          <th style="border: 1px solid #a9a5a5;">Select Product</th>
                          <th style="border: 1px solid #a9a5a5;">MRP</th>
                          <th style="border: 1px solid #a9a5a5;">Quanity</th>
                          <th style="border: 1px solid #a9a5a5;">Amount</th>
                      </tr>

                      <tr>
                          <td style="border: 1px solid #a9a5a5;">
                              <button type="button" id='add_pr_btn' class="btn btn-default add_pr_btn"><i class="fa fa-plus"></i></button>
                          </td>
                          <td style="border: 1px solid #a9a5a5;">
                              <div class="form-group">
                                <select class="form-control select2Product " onchange="fetchProductPrice()"  name="productname[]" id="pro_id" placeholder='select Product'>
                                  @foreach( $product as $items)
                                    <option value="{{ $items->id }}">{{ $items->product_name}}</option>
                                  @endforeach
                              </select>
                              </div>
                          </td>
                          <td style="border: 1px solid #a9a5a5;">
                                  <div class="form-group">
                                  <input type="text" class="form-control  mrp" id="mrp" name="mrp[]" placeholder="Enter MRP" />
                                  </div>
                          </td>
                          <td style="border: 1px solid #a9a5a5;">
                                  <div class="form-group">
                                  <input type="text" class="form-control qty editQty" id="qty" name="qty[]" placeholder="Enter QTY"   />
                                  </div>
                          </td>
                          <td style="border: 1px solid #a9a5a5;">
                              <div class="form-group">
                                  <div class="col-sm-11">
                                  <input type="text" value="" class="form-control price" id="product_price" name="price[]" data-discount="" placeholder="Enter MRP Price"   readonly >
                                  </div>
                                
                              </div>
                          </td>
                      </tr>
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
                            var i=0;
                            $("#add_pr_btn").click(function(){
                                    i++;
                                    var html2 =
                                    `<tr>
                                   
                                        <td style="border: 1px solid #a9a5a5;">
                                            <button type="button" id='remove_pr_btn' class="btn btn-default remove_pr_btn"><i class="fa fa-trash"></i></button>
                                        </td>

                                       

                                        <td style="border: 1px solid #a9a5a5;">
                                            <div class="form-group">
                                              <select class="form-control select2Product" onchange="fetchProductPriceMulti(${i})"  name="productname[]" id="pro_id_${i}" placeholder='select Product'>
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
                                                    <input type="text" class="form-control qty_ editQty" id="qty_${i}" name="qty[]" placeholder="Enter QTY"   />
                                                    </div>
                                                </td>

                                        <td style="border: 1px solid #a9a5a5;">
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
                                // $('#ttlamt').val(data[0].mrp);
                                $('#product_price_'+incre_i).val(data[0].mrp);
                                $('#qty_'+incre_i).val(1);
                              
           
       
                                        updateTotalAmount();
                                      
                                      
                                        }
                                    },
                                });
                              } 

                              $("#producttable").on('click','.remove_pr_btn',function() {
                                  $(this).closest('tr').remove();
                                  updateTotalAmount();
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
  // function calTotalAmount(){
  //   var add_total_amount=0;
  //   $('#producttable tr').each(function(index, tr) {
  //       if(index > 0){
  //           let self = $(this);
  //           let total_amount = self.find("td:eq(3) input[type='text']").val();
  //           let discount_amount = self.find("td:eq(2) input[name='discount[]']").val();
  //           console.log(total_amount);
  //           console.log(discount_amount);
  //           let amount_with_discount =  total_amount - discount_amount;
  //           add_total_amount = add_total_amount + amount_with_discount;
  //           $("#ttlamt").val(add_total_amount);
  //       }
  //   });
  // }
  

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
                              <div class="row">
                                <div class="col-md-3">
                                            Discount Amount:
                                </div>
                                <div class="col-md-3">
                                    <select class="form-control discType" id="discType" name="discType">
                                                <option value="%">%</option>
                                                <option value="Lumpsum">Lumpsum</option>
                                    </select>
                                </div>
                                <div class="col-md-3 form-group ">
                                    <input type="text" class="form-control discRate" name="discRate"  id="discRates" onkeyup="calDiscount()" value="" />
                                </div>
                                <div class="col-md-3 discounts">
                                    <input type="hidden" id="mrpGrossTotal" name="">
                                    <input type="text" class="form-control discount" name="discount"  id="discount" value="" readonly   />
                                </div>
                              </div>
                              <div class="row" style="margin-top: 10px;">
                                <div class="col-md-12 row">
                                  <div class="col-md-9">
                                      Total Amount
                                  </div>
                                  <div class="col-md-3 ttlamts">
                                    <input type="text" class="form-control ttlamt"  name="ttlamt" value="0" id="ttlamt" style="float:right;" readonly />
                                </div>
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
                                    <tr>
                                        <td style="border: 1px solid #a9a5a5;">
                                            <button type="button" id='add_payment_btn' class="btn btn-default add_payment_btn"><i class="fa fa-plus"></i></button>
                                        </td>
                                         <td style="border: 1px solid #a9a5a5;">
                                            <div class="form-group">
                                              <select class="form-control payment_paymode"  name="payment_paymode[]" id="payment_paymode" placeholder='select Payment'>
                                              @foreach( $pharama as $items)
                                                <option value="{{ $items->id }}">{{ $items->paymentmode}}</option>
                                              @endforeach
                                             </select>

                                             <!--select for payment details-->
                                            </div>
                                            <script>
                                              $ (document).ready(function(){
                                                $(".payment_paymode").change(function(){
                                                 var payment_paymode= $(this).val();
                                                // alert(payment_paymode);
                                                 if(payment_paymode){
                                                  $.ajax({
                                                    type:"GET",
                                                    url:"{{url('getPayMode')}}?tpapaymentmode="+payment_paymode,
                                                    success:function(res){        
                                                    if(res){
                                                      $("#payment_pay").empty();
                                                      $("#payment_pay").append('<option>Select payment_pay</option>');
                                                      $.each(res,function(key,value){
                                                        $("#payment_pay").append('<option value="'+key+'">'+value+'</option>');
                                                      });
                                                    
                                                    }else{
                                                      $("#payment_pay").empty();
                                                    }
                                                    }
                                                  });
                                                 }

                                                });

                                              });

                                            </script>
                                            <!--end payment details-->
                                            </td>

                                        <td style="border: 1px solid #a9a5a5;">
                                            <div class="form-group">
                                                <select class="form-control"  name="payment_pay[]" id="payment_pay" placeholder='select item'>
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
                                            <div class="col-sm-11">
                                              <input type="text" class="form-control amount" name="amount[]" placeholder="Enter Amount" id="amount" onkeyup="amountmanage()">
                                        </div>
                                            </div>
                                        </td>
                                    </tr>
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
                  
            $("#paymenttable").append(html3);});

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

                    $("#paymenttable").on('click','.remove_payment_btn',function() {
                      $(this).closest('tr').remove();
                      amountmanage();
                    });
              </script>
                         
                 <!--kishhori end code-->          
                     <div class="row" style="margin-top: 10px;">
                            <div class="col-md-12 row">
                                <div class="col-md-9 text-right">
                                    Paid Amount
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control paidamt" name="paidamt" id="paidamt"  readonly />
                                </div>
                            </div>
                        </div>
                    </div>

                </div class="row">
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
    
      $('#product_price').val(data[0].mrp);
         
        $('#mrp').val(data[0].mrp);
          $('#itemamounts').val(data[0].mrp);
        $('#qty').val(1);
       
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

