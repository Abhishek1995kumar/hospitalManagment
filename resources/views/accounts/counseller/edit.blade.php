@extends('layouts.app')
@section('title')
    {{ __('Counseller Entry') }}
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
                <a href="{{ route('counseller') }}"
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
                <form action="{{url('counseller/edit/'.$counseller->id)}}" method="POST" id="updatecounseler" name="updatecounseler">
                        @csrf
                        <div class="row gx-10 mb-5">
                            <div class="col-md-3">
                                <div class="form-group mb-5">
                                    <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">MR No :</label>
                                        <select class="form-select" name="ref_patient_id" id="ref_patient_id" onchange="fetchanalysis()" required>
                                            <option value="">--Select MR No--</option>
                                                @foreach($doctoranalysispatient as $items)
                                                    <option value="{{$items->id}}" {{$counseller->ref_patient_id == $items->id  ? 'selected' : ''}}>{{'( Patient_00'.$items->id.')'}}</option>
                                                @endforeach
                                               
                                        </select>
                                </div>
                            </div> 
                                            <script>
       
                                                function fetchanalysis(){
                                                    var ref_patient_id =  $('#ref_patient_id').val();
                                                    // alert(ref_patient_id);
                                                    $.ajax({
                                                            url: "{{url('/Counseller_data')}}",
                                                            method:'POST',
                                                            data :{
                                                                "_token": "{{ csrf_token() }}",
                                                                id:ref_patient_id,
                                                            },
                                                            success:function(data){
                                                               if(data)
                                                               {
                                                                $('#p_name').val(data[0].patient_name);
                                                                $('#diagosis').val(data[0].diagnosis);
                                                                $('#d_advice').val(data[0].doctor_advice);
                                                                $('#c_remarks').val(data[0].clinical_remark);
                                                                
                                                               
                                                                
                                                               
                                                               
                                                               }
                                                             
                                                            },
                                                        });
                                                       
                                                    }
                                            </script>
                                       
                            <div class="col-md-3">
                                <div class="form-group mb-5">
                                    <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Patient Name :</label>
                                    <input type="text" class="form-control p_name" name="p_name" id="p_name" value="{{old('p_name',$counseller->p_name)}}" readonly >
                                </div>
                            </div> 
                            <div class="col-md-3">
                                <div class="form-group mb-5">
                                    <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Doctor Name :</label>
                                   <select class="form-control" data-live-search="true" name="doctorname" id="doctorname" required>
                                        <option value="">--Select Doctor--</option>
                                       

                                        @foreach($doctorref as $items)
                                            <option value="{{$items->id}}" {{$counseller->doctorname == $items->id  ? 'selected' : ''}}>{{$items->full_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> 
                            <div class="col-md-3">
                                <div class="form-group mb-5">
                                    <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Diagosis</label>
                                    <input type="text" class="form-control diagosis" name="diagosis" id="diagosis" value="{{old('diagosis',$counseller->diagosis)}}"  >
                                </div>
                            </div>  
                           
                            <div class="col-md-3">
                                <div class="form-group mb-5">
                                    <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Doctors Advice :</label>
                                    <input type="text" class="form-control d_advice" id="d_advice" name="d_advice" value="{{old('d_advice',$counseller->d_advice)}}" >
                                </div>
                            </div> 
                            <div class="col-md-3">
                                <div class="form-group mb-5">
                                    <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Clinical Remarks</label>
                                    <input type="text" class="form-control c_remarks" name="c_remarks" id="c_remarks" value="{{old('c_remarks',$counseller->c_remarks)}}" >
                                </div>
                            </div>  
                            <div class="row">
                                <legend>Surgery Details</legend>
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered text-center" id="itemTable" style="border: 1px solid grey;width:150vw;" id="alltb" >
                                       
                                            <tr>
                                                <th style="border: 1px solid #a9a5a5;">Action</th>
                                                <th style="border: 1px solid #a9a5a5;">Surgery Category</th>
                                                <th style="border: 1px solid #a9a5a5;">Product</th>
                                                <th style="border: 1px solid #a9a5a5;">Injection</th>
                                                <th style="border: 1px solid #a9a5a5;">Package Price</th>
                                                <th style="border: 1px solid #a9a5a5;">Payment Mode </th>
                                                <th style="border: 1px solid #a9a5a5;">Payment Type</th>
                                                <th style="border: 1px solid #a9a5a5;">Bed</th>
                                                <th style="border: 1px solid #a9a5a5;">Date Of Surgery</th>
                                                <th style="border: 1px solid #a9a5a5;">Surgery Status</th>
                                                <th style="border: 1px solid #a9a5a5;">Remark</th>
                                            </tr>

                                            <?php
                                                    $surgcat = explode(",", $counseller['sutg_cate']);
                                                    $products = explode(",", $counseller['products']);
                                                    $injection = explode(",", $counseller['injection']);
                                                    $packageprice = explode(",", $counseller['pk_price']);
                                                    $paymentmodess = explode(",", $counseller['payment_paymode']);
                                                    $paymenttypess = explode(',', $counseller['p_type']);
                                                    $bedss = explode(',', $counseller['bed']);
                                                    $dos = explode(',', $counseller['s_date']);
                                                    $surstatus = explode(',', $counseller['s_status']);
                                                    $remark = explode(',', $counseller['remark']);
                                                   

                                                    
                                                    
                                                
                                                   
                                                   

                                                        $product_mul_count = 0;
                                                        for($i = 0; $i < count($surgcat); $i++) {
                                                            $count = ($i>0 ? '_'.$i : '');
                                                       
                                                      
                                            
                                                ?>
                                            <tr>
                                                <td style="border: 1px solid #a9a5a5; ">
                                                    <a type="button" id="hello" class="fa fa-plus"></a>   
                                                    <a value="{{$counseller->id}}" type="button" id="removetb" class="fa fa-trash"></a>    
 
                                                </td>
                                                <td style="border: 1px solid #a9a5a5;">
                                                    <div class="form-group">
                                                      

                                                        <select class="form-control" data-live-search="true" name="sutg_cate[]"  onchange="fetchsergerycat(<?php echo $i; ?>)" id="sutg_cate<?php echo $count?>"  required>
                                                            <option value="">--Surgery Category--</option>
                                                            @foreach($surcateg as $items)
                                                                <option value="{{$items->subcat_id}}" {{$surgcat[$i] == $items->subcat_id  ? 'selected' : ''}}>{{$items->subcat_name}}</option>
                                                             @endforeach
                                                        </select>
                                                    </div>
                                                </td>
                                                <script>
                                               function fetchsergerycat(count_numss){
                                                    // var products_id =  `${$("#products")}`;
                                                    let count_num_inc = (count_numss > 0 ? '_'+count_numss : '');
                                                    var ref_surcat_id  = $("#sutg_cate"+count_num_inc).val();
                                                    if(ref_surcat_id){
                                                  $.ajax({
                                                    type:"GET",
                                                    url:"{{url('sucat_data')}}?id="+ref_surcat_id,
                                                    success:function(res){        
                                                    if(res){
                                                      $("#products"+count_num_inc).empty();
                                                      $("#products"+count_num_inc).append('<option>--Select payment_pay--</option>');
                                                      $.each(res,function(key,value){
                                                        $("#products"+count_num_inc).append('<option value="'+key+'">'+value+'</option>');
                                                      });
                                                    
                                                    }else{
                                                      $("#products"+count_num_inc).empty();
                                                    }
                                                    }
                                                  });
                                                 }

                                                       
                                                    }

                                            </script>
                                                <td style="border: 1px solid #a9a5a5;">
                                                    <div class="form-group">
                                                        <select class="form-select" class="products" name="products[]"  id="products<?php echo $count; ?>">
                                                            @foreach($refinjection as $items)
                                                                <option value="{{$items->id}}" {{$products[$i] == $items->id  ? 'selected' : ''}}>{{$items->product_name}}</option>
                                                             @endforeach

                                                             

                                                               
                                                        </select>
                                                    </div>
                                                </td>
                                                <td style="border: 1px solid #a9a5a5;">
                                                    <div class="form-group">
                                                       

                                                        <select class="form-control" data-live-search="true" name="injection[]" onchange="fetchproductpr(<?php echo $i; ?>)" id="injection<?php echo $count?>" required>
                                                            <option value="">--Injection--</option>
                                                            @foreach($refinjection as $items)
                                                                <option value="{{$items->id}}" {{$injection[$i] == $items->id  ? 'selected' : ''}}>{{$items->product_name}}</option>
                                                             @endforeach
                                                        </select>
                                                    </div>
                                                </td>
                                                <script>
       
                                                            function fetchproductpr(count_num){
                                                                // var pr_price =  $('#injection').val();
                                                                let count_num_inc = (count_num > 0 ? '_'+count_num : '');
                                                                var pr_price = $("#injection"+count_num_inc).val();
                                                                $.ajax({
                                                                        url: "{{url('/consouller_prprice')}}",
                                                                        method:'POST',
                                                                        data :{
                                                                            "_token": "{{ csrf_token() }}",
                                                                            id:pr_price,
                                                                        },
                                                                        success:function(data){
                                                                            if(data)
                                                                            {
                                                                            // $('#pk_price').val(data[0].mrp);
                                                                            $('#pk_price'+count_num_inc).val(data[0].mrp);
                                                                            }
                                                                            
                                                                        },
                                                                    });
                                                                    
                                                                }
                                                        </script>
                                                <td style="border: 1px solid #a9a5a5;">
                                                    <div class="form-group">
                                                    <input type="text" class="form-control pk_price" name="pk_price[]" id="pk_price<?php echo $count; ?>" placeholder="Enter"  value="{{$packageprice[$i]}}"  />
                                                    <lable class="lblExpireDate"></lable>
                                                    </div>
                                                </td>
                                                <td style="border: 1px solid #a9a5a5;">
                                                    <div class="form-group">
                                                    <select class="form-control payment_paymode"  name="payment_paymode[]" id="payment_paymode<?php echo $count?>"  onchange="fetchPaymentmode(<?php echo $i; ?>)" placeholder='select Payment'>
                                                            <option value="">--Select Payment Mode--</option>
                                                      
                                                             @foreach($paymode as $items)
                                                                <option value="{{$items->id}}" {{$paymentmodess[$i] == $items->id  ? 'selected' : ''}}>{{$items->paymentmode}}</option>
                                                             @endforeach
                                                    </select>
                                                    </div>
                                                </td>
                                                <script>
                                               function fetchPaymentmode(count_numsss){
                                                    // var products_id =  `${$("#products")}`;
                                                    let count_num_inc = (count_numsss > 0 ? '_'+count_numsss : '');
                                                    var p_type = $("#payment_paymode"+count_num_inc).val();
                                                    if(p_type){
                                                  $.ajax({
                                                    type:"GET",
                                                    url:"{{url('getcounsulePayMode')}}?tpapaymentmode="+p_type,
                                                    success:function(res){        
                                                    if(res){
                                                      $("#p_type"+count_num_inc).empty();
                                                      $("#p_type"+count_num_inc).append('<option>--Select payment_pay--</option>');
                                                      $.each(res,function(key,value){
                                                        $("#p_type"+count_num_inc).append('<option value="'+key+'">'+value+'</option>');
                                                      });
                                                    
                                                    }else{
                                                      $("#p_type"+count_num_inc).empty();
                                                    }
                                                    }
                                                  });
                                                 }

                                                       
                                                    }

                                            </script>    
                                                <td style="border: 1px solid #a9a5a5;">
                                                    <div class="form-group">
                                                    <select class="form-select" class="p_type" name="p_type[]"  id="p_type<?php echo $count; ?>">

                                                            
                                                            @foreach($paymenttype as $items)
                                                                <option value="{{$items->id}}" {{$paymenttypess[$i] == $items->id  ? 'selected' : ''}}>{{$items->tpapaymenttype}}</option>
                                                             @endforeach
                                                        </select>
                                                    </div>
                                                </td>
                                                <td style="border: 1px solid #a9a5a5;">
                                                    <div class="form-group">
                                                        <select class="form-select" class="bed" name="bed[]"  id="bed">
                                                        <?php foreach($counseller as  $val_member)?>
                                                            <?php echo '<option value="'.$bedss[$i].'" selected>'.$bedss[$i].'</option>'; ?>   
                                                           
                                                            <option value="SingleBed">Single Bed</option>
                                                            <option value="DoubleBed">Double Bed</option>
                                                            <option value="PrivateWard">Private Ward</option>
                                                            <option value="GeneralWard">General Ward</option>
                                                        </select>
                                                    </div>
                                                </td>
                                                <td style="border: 1px solid #a9a5a5;">
                                                    <div class="form-group">
                                                    <input type="date" class="form-control s_date" id="s_date" name="s_date[]" value="{{$dos[$i]}}"  placeholder="Date Of surgery"  />
                                                    </div>
                                                </td>
                                                <td style="border: 1px solid #a9a5a5;">
                                                    <div class="form-group">
                                                      
                                                        <select class="form-select" class="s_status" name="s_status[]"  id="s_status">
                                                        <?php foreach($counseller as  $val_member)?>
                                                            <?php echo '<option value="'.$surstatus[$i].'" selected>'.$surstatus[$i].'</option>'; ?>
                                                          
                                                            <option value="Pending">Pending</option>
                                                            <option value="Confirm">Confirm</option>
                                                            <option value="Cancel">Cancel</option> 
                                                        </select>

                                                           
                                                            
                                                        </select>
                                                    </div>
                                                </td>
                                                <td style="border: 1px solid #a9a5a5;">
                                                    <div class="form-group">
                                                    <input type="text" class="form-control s_date" id="remark" name="remark[]" placeholder="Remark" value="{{$remark[$i]}}"  />
                                                    </div>
                                                </td>
                                            
                                            </tr>
                                            <?php 
                                             $product_mul_count++;
                                
                                  } ?>
                                                                       <input type="hidden" value="<?php echo $product_mul_count-1; ?>" id="product_mul_count">

                                           
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <script>
                                
                                var i = $("#product_mul_count").val();
                                            $("#hello").click(function(){
                                                    i++;
                                                    var html = 
                                                                ` <tr>
                                                                <td style="border: 1px solid #a9a5a5;">
                                                                        <a type="button" id="hello" class="fa fa-trash removepharmacyRow"></a>    
                                                                    </td>
                                                <td style="border: 1px solid #a9a5a5;">
                                                    <div class="form-group">
                                                       <select class="form-control" data-live-search="true" name="sutg_cate[]" onchange="fetchsurgymulti(${i})" id="surgcat_${i}" required>
                                                            <option value="">--Surgery Category--</option>
                                                            @foreach($surcateg as $items)
                                                            <option value="{{ $items->subcat_id }}">{{$items->subcat_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </td>
                                                <td style="border: 1px solid #a9a5a5;">
                                                    <div class="form-group">
                                                        <select class="form-select" class="products" name="products[]"   id="products_${i}">
                                                               
                                                        </select>
                                                    </div>
                                                </td>
                                                <td style="border: 1px solid #a9a5a5;">
                                                    <div class="form-group">
                                                       

                                                        <select class="form-control" data-live-search="true" name="injection[]" onchange="fetchProductPriceMult(${i})" id="injection_${i}" required>
                                                            <option value="">--Injection--</option>
                                                            @foreach($refinjection as $items)
                                                            <option value="{{ $items->id }}">{{$items->product_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </td>
                                            <td style="border: 1px solid #a9a5a5;">
                                                    <div class="form-group">
                                                    <input type="text" class="form-control pk_price" name="pk_price[]"  id="pk_price_${i}" placeholder="Enter"  />
                                                    <lable class="lblExpireDate"></lable>
                                                    </div>
                                                </td>
                                                <td style="border: 1px solid #a9a5a5;">
                                                    <div class="form-group">
                                                    <select class="form-control payment_paymode"  name="payment_paymode[]" id="payment_paymode_${i}" placeholder='select Payment' onchange="fetchPaymentPriceMulti(${i})">
                                                            <option value="">--Select Payment Mode--</option>
                                                        @foreach( $paymode as $items)
                                                            <option value="{{ $items->id }}">{{ $items->paymentmode}}</option>
                                                        @endforeach
                                                    </select>
                                                    </div>
                                                </td>
                                                <td style="border: 1px solid #a9a5a5;">
                                                    <div class="form-group">
                                                    <select class="form-select" class="p_type" name="p_type[]" id="p_type_${i}">
                                                               
                                                        </select>
                                                    </div>
                                                </td>
                                                <td style="border: 1px solid #a9a5a5;">
                                                    <div class="form-group">
                                                        <select class="form-select" class="bed" name="bed[]"  id="bed">
                                                            <option value="SingleBed">Single Bed</option>
                                                            <option value="DoubleBed">Double Bed</option>
                                                            <option value="PrivateWard">Private Ward</option>
                                                            <option value="GeneralWard">General Ward</option>
                                                        </select>
                                                    </div>
                                                </td>
                                                <td style="border: 1px solid #a9a5a5;">
                                                    <div class="form-group">
                                                    <input type="date" class="form-control s_date" id="s_date" name="s_date[]" placeholder="Date Of surgery"  />
                                                    </div>
                                                </td>
                                                <td style="border: 1px solid #a9a5a5;">
                                                    <div class="form-group">
                                                        <select class="form-select" class="s_status" name="s_status[]"  id="s_status">
                                                            <option value="Pending">Pending</option>
                                                            <option value="Confirm">Confirm</option>
                                                            <option value="Cancel">Cancel</option>
                                                            
                                                        </select>
                                                    </div>
                                                </td>
                                                <td style="border: 1px solid #a9a5a5;">
                                                    <div class="form-group">
                                                    <input type="text" class="form-control s_date" id="remark" name="remark[]" placeholder="Remark"  />
                                                    </div>
                                                </td>
                                            
                                            </tr>`;
                                                           
                                                    $("#itemTable").append(html);
                                                    });
                                                    $("#itemTable").on('click','.removepharmacyRow',function()
                                                        {
                                                            $(this).closest('tr').remove();
                                                        
                                                        });

                                                        
                                                        $("#itemTable").on('click','#removetb',function()
                                                                        {

                                                                            var removesql=$(this).val();
                                                                            var ids = $(this).attr("id");
                                                                            alert(ids)
                                                                            if(confirm("Are you sure you want to delete this?"))  
                                                                            { 
                                                                            // alert(id);
                                                                                $(this).closest('tr').remove();
                                                                                
                                                                            
                                                                            }
                                                            });
                            </script>
                            <script>
                                function fetchProductPriceMult(milt_i){
                                    var products_id =  $('#injection_'+milt_i).val();
                                //    products_
                                    //  alert(products_id);
                                    $.ajax({
                                        url: "{{url('/consouller_prprice')}}",
                                        method:'POST',
                                        data :{
                                            "_token": "{{ csrf_token() }}",
                                            id:products_id,
                                        },
                                        success:function(data){
                                            if(data)
                                            {
                                            $('#pk_price_'+milt_i).val(data[0].mrp);
                                           
                                            }
                                        },
                                    });

                                }
                            </script>
                             <script>
                                function fetchsurgymulti(incre_i){
                                      
                                                  var ref_surcat_id =  $('#surgcat_'+incre_i).val();
                                                //   alert(ref_surcat_id);
                                                
                                               
                                               
                                                  $.ajax({
                                                    type:"GET",
                                                    url:"{{url('sucat_data')}}?id="+ref_surcat_id,
                                                    success:function(res){        
                                                    if(res){
                                                      $('#products_'+incre_i).empty();
                                                      $('#products_'+incre_i).append('<option>--Select payment_pay--</option>');
                                                      $.each(res,function(key,value){
                                                        $('#products_'+incre_i).append('<option value="'+key+'">'+value+'</option>');
                                                      });
                                                    
                                                    }else{
                                                      $('#products_'+incre_i).empty();
                                                    }
                                                    }
                                                  });
                                                 }
                                    </script>
                                    <script>
                                         function fetchPaymentPriceMulti(increment_i){
                                               
                                              
                                                 var payment_paymode =  $('#payment_paymode_'+increment_i).val();
                                                //  alert(payment_paymode);
                                             
                                              
                                              
                                                 $.ajax({
                                                   type:"GET",
                                                   url:"{{url('getcounsulePayMode')}}?tpapaymentmode="+payment_paymode,
                                                   success:function(res){        
                                                   if(res){
                                                     $('#p_type_'+increment_i).empty();
                                                     $('#p_type_'+increment_i).append('<option>--Select payment_pay--</option>');
                                                     $.each(res,function(key,value){
                                                       $('#p_type_'+increment_i).append('<option value="'+key+'">'+value+'</option>');
                                                     });
                                                   
                                                   }else{
                                                     $('#p_type_'+increment_i).empty();
                                                   }
                                                   }
                                                 });
                                                }
                                    </script>
                            
                           
                            
                           
                        </div>
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-primary">save </button>
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
    

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>
    

                         
          
      
@endsection








