@extends('layouts.app')
@section('title')
{{ __('Edit Doctor Analysis') }}
    @endsection
@section('page_css')
    <link rel="stylesheet" href="{{ asset('assets/css/int-tel/css/intlTelInput.css') }}">
    <!--script for droupdown serch-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script> 
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css">

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
                <a href="{{ route('analysisdoctor') }}"
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
                    
                <form action="{{url('analysisdoctor/edit/'.$doctoranalysis->id)}}" method="post" id="updatedoctoranalysis" name="updatedoctoranalysis">                    @csrf
                    @csrf
                    <div class="row gx-10 mb-5">
                        <div class="col-md-3">
                                        <div class="form-group mb-5">
                                          

                                            <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">MR No :</label>
                                           
                                            <select class="form-select chosen" name="patient_id" id="patient_id" style="width:120%" required style="width:115%">
                                            @foreach($doctoranalysispatient as $items)
                <option value="{{$items->id}}" {{$doctoranalysis->patient_id == $items->id  ? 'selected' : ''}}>{{$items->first_name}} {{ $items->last_name}}{{'( Patient_00'.$items->id.')'}}</option>
                 @endforeach
                                                       
                                            </select>
                                        </div>
                            </div>
<!--script for droupdown serch -->
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.js"></script>
<script type="text/javascript">
  $(".chosen").chosen();
</script>
<!--end script-->
                            <div class="col-md-3">
                                        <div class="form-group mb-5">
                                            <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Privious Date :</label>
                                             <!-- <input type="text" name="bill_no" id="bill_no"    class="form-control" > -->
                                             <select class="form-select "  name="privious_date" id="privious_date" value="{{$doctoranalysis->privious_date}}">
                                            
                                            </select>
                                           
                                        </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-5">
                                        <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Patient Name :</label>
                                         <input type="text" name="patient_name" id="patient_name"    class="form-control" value="{{$doctoranalysis->patient_name}}" required >

                                 </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group mb-5">
                                        <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Date Of Doctor Analysis:</label>
                                           <input type="text" class="form-control billdate" name="date_doctoranalysis" value="<?=date('d-m-Y');?>" readonly>

                                 </div>
                            </div>

                           <div class="col-md-3">
                                <div class="form-group mb-5">
                                <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Patient Category :</label>
                                    <select class="form-select patientType" id="patient_category" name="patient_category[]" multiple="multiple" style="width:105%"  required>

                                    <?php
                                    $patient_cat = explode(",", $doctoranalysis['patient_category']);
                                    foreach($patient_cat as $val){
                                    foreach($patientcategory as $items){
                                        ?>
                <option value="{{$items->cat_id}}" {{$val == $items->cat_id ? 'selected' : ''}}>{{$items->cat_name}}</option>

<?php
}}

?>
                                    </select>
                                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css"/>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>
                                </div>
                            </div>

                            <script>
                               
                               $(".patientType").select2({
                              });
                         </script>
                                       <script>
                                          $('.select2-multi').select2();
                                      </script>


                                   
























                            <div class="col-md-3">
                                        <div class="form-group mb-5">
                                        <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Diagnosis :</label>
                                            <textarea name="diagnosis" class="form-control" required>{{$doctoranalysis->diagnosis}}</textarea>
                                        </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group mb-5">
                                <label for="ven_name" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Cancelled Check-File Upload</label> 
                                <input type="file" name="upload_document" id="upload_document" class="form-control upload_document" >
                                </div>
                            </div>  

<!--code of further investigation recommdation-->
                            <div class="row">
                                <div class="col-md-12">
                                    <legend>Further Investigation Recommendation </legend>
<hr>
                                    <table class="table table-striped table-bordered text-center" id="itemfurtherinvestigationrecommendation" style="border: 1px solid grey;">
                                        <tr>
                                            <th style="border: 1px solid #a9a5a5;">Action</th>
                                            <th style="border: 1px solid #a9a5a5;">Investigation For</th>
                                             <th style="border: 1px solid #a9a5a5;">Investigation</th>
                                         </tr>

                                         <?php
                              $investigationfor_dt = explode(",", $doctoranalysis['investigation_for']);
                              $investigation_dt = explode(",", $doctoranalysis['investigation']);
                                     
                              for($i = 0; $i < count($investigationfor_dt); $i++) {
                                    ?>
<tr>
                                     

                                            <td style="border: 1px solid #a9a5a5;">
                                                <button type="button" id='addButton_furtherinvestigation' class="btn btn-default addButton_furtherinvestigation"><i class="fa fa-plus"></i></button>
                                            </td>
                                            
                                            <td style="border: 1px solid #a9a5a5;">
                                                <div class="form-group">
                                                    <select class="form-select " name="investigation_for[]" id="investigation_for" required>
                                                    <?php
                                    foreach($doctorsubcategory as $items){
                                    ?>
                                      <option value="{{$items->subcat_id }}" {{$investigationfor_dt[$i]  == $items->subcat_id ? 'selected' : ''}}>{{$items->subcat_name}}</option>
                                      <?php
                              }
                                                    ?>
                                                    </select>
                                   <br>
            <div class="">
                <a href="{{ route('subcategory.create') }}"
                   class="btn btn-sm  btn-active-primary pull-left">{{ __('Add | Sub-Category')}}</a>
            </div>
                                                 
                                                </div>
                                            </td>
                                            <td style="border: 1px solid #a9a5a5;">
                                                <div class="form-group">
                                                <!-- <input type="text" class="form-control investigation" name="investigation[]" id="investigation" placeholder="Select Item"> -->
                                                <select id="investigation" name="investigation[]" class="form-control" required>

                                                <?php
                                            foreach($product as $items){
                                            ?>
                <option value="{{$items->id}}" {{$investigation_dt[$i]== $items->id  ? 'selected' : ''}}>{{$items->product_name}}</option>
                <?php
                                            }                
                                                    ?>
                                                </select>
                                                <br>

            <div class="">
                <a href="{{ route('product.create') }}"
                   class="btn btn-sm  btn-active-primary pull-left">{{ __(' Add|Product')}}</a>
            </div>
                                                  </div>
                                            </td>
                                           
                                        </tr>
                                        <?php 
                                    }
                                    ?>   
                                    </table>
                                </div>
                            </div>
                            <!--end further recommendation code-->



                            <!--code of Medicine-->
                            <div class="row">
                                <div class="col-md-12">
                                    <legend>Medicine</legend>
                                    <hr>
                                    <table class="table table-striped table-bordered text-center" id="itemedicine" style="border: 1px solid grey;">
                                        <tr>
                                            <th style="border: 1px solid #a9a5a5;">Action</th>
                                            <th style="border: 1px solid #a9a5a5;">Medicine</th>
                                             <th style="border: 1px solid #a9a5a5;">Qty.</th>
                                             <th style="border: 1px solid #a9a5a5;">No.Of Days</th>
                                             <th style="border: 1px solid #a9a5a5;">Dose</th>
                                        </tr>

                                        <?php
                                        $medicine_dt = explode(",", $doctoranalysis['medicine']);
                                        $qty_dt = explode(",", $doctoranalysis['quantity']);
                                        $no_of_days_dt = explode(",", $doctoranalysis['no_of_days']);
                                        $dose_dt = explode(",", $doctoranalysis['dose']);
                                        

                                      
                                        // $id = $pharama['id'];
                                    for($i = 0; $i < count($medicine_dt); $i++) {
                                    ?>

                                        <tr>
                                            <td style="border: 1px solid #a9a5a5;">
                                                <button type="button" id='addButton_medicine' class="btn btn-default addButton_medicine"><i class="fa fa-plus"></i></button>
                                            </td>
                                            <td style="border: 1px solid #a9a5a5;">
                                                <div class="form-group">
                                                    <select class="form-select " name="medicine[]" id="medicine" required>
                                                 <?php
                                                    foreach($product as $items){
                                                        ?>
                                      <option value="{{ $items->id }}"{{$medicine_dt[$i]== $items->id ? 'selected' : ''}}>{{$items->product_name}}</option>
                                                  <?php
                                                    }
                                                    ?>
                                                   
                                                 </select><br>
                                                </div>
                                            </td>

                                            <td style="border: 1px solid #a9a5a5;">
                                                <div class="form-group">
                                                <input type="text" class="form-control quantity" name="quantity[]" id="quantity" placeholder="Enter Qty"  value="{{$qty_dt[$i]}}" required><br>
                                                </div>
                                            </td>

                                            <td style="border: 1px solid #a9a5a5;">
                                                <div class="form-group">
                                                <input type="text" class="form-control no_of_days" name="no_of_days[]" id="no_of_days" placeholder="Enter No.of Days" value="{{$no_of_days_dt[$i]}}" required><br>
                                                </div>
                                            </td>

                                            <td style="border: 1px solid #a9a5a5;">
                                                <div class="form-group">
                                                <input type="text" class="form-control dose"  id="dose" name="dose[]" placeholder="Enter Dose"  value="{{$dose_dt[$i]}}" required><br>
                                                </div>
                                            </td>
                                            
                                        </tr>
                                        <?php 
                                    }
                                    ?>   

                                    </table>
                                </div>
                            </div>
                            <!--end Medicine code-->




                              <!--code of Surgery Details-->
                              <div class="row">
                                <div class="col-md-12">
                                    <legend>Surgery Details</legend>
                                     <hr>
                                    <table class="table table-striped table-bordered text-center" id="itemsurgerydetails" style="border: 1px solid grey;">
                                        <tr>
                                            <th style="border: 1px solid #a9a5a5;">Action</th>
                                            <th style="border: 1px solid #a9a5a5;">Surgery Category</th>
                                             <th style="border: 1px solid #a9a5a5;">Product</th>
                                             <th style="border: 1px solid #a9a5a5;">Injection</th>
                                             <th style="border: 1px solid #a9a5a5;">Suggested Package Price</th>
                                        </tr>

                                        <?php
                                    $surgerycategory_dt = explode(",", $doctoranalysis['surgery_category']);
                                        $productdoctor_dt = explode(",", $doctoranalysis['products']);
                                        $injection_dt = explode(",", $doctoranalysis['injection']);
                                        $suggested_dt = explode(",", $doctoranalysis['packege_price']);
                                        

                                      
                                        // $id = $pharama['id'];
                                    for($i = 0; $i < count( $surgerycategory_dt); $i++) {
                                    ?>

                                        <tr>
                                            <td style="border: 1px solid #a9a5a5;">
                                                <button type="button" id='addButton_surgerydetails' class="btn btn-default addButton_surgerydetails"><i class="fa fa-plus"></i></button>
                                            </td>

                                            <td style="border: 1px solid #a9a5a5;">
                                                <div class="form-group">
                                                    <select class="form-select " name="surgery_category[]" id="surgery_category" required>
                                                    <?php
                                                    foreach($doctorcategory as $items){
                                                        ?>
                                    <option value="{{ $items->cat_id }}"{{ $surgerycategory_dt[$i] == $items->cat_id ? 'selected' : ''}}>{{$items->cat_name}}</option>
                                    <?php
                              }
                                                    ?>
                                                  
                                                 </select><br>
                                                </div>
                                            </td>

                                            <td style="border: 1px solid #a9a5a5;">
                                                <div class="form-group">
                                                    <select class="form-control " name="products[]" id="products" required>
                                                    <?php
                                                    foreach($product as $items){
                                                        ?>
                <option value="{{$items->id}}" {{ $productdoctor_dt[$i]  == $items->id  ? 'selected' : ''}}>{{$items->product_name}}</option>
                <?php
                              }
                                                    ?>
                                                    
                                                </select><br>
                                                </div>
                                            </td>

                                            <td style="border: 1px solid #a9a5a5;">
                                                <div class="form-group">
                                                    <select class="form-select" id="injection" name="injection[]" id="injection" required>
                                                        <?php
                                                    foreach($product as $items){
                                                        ?>
                                      <option value="{{ $items->id }}"{{$injection_dt[$i] == $items->id ? 'selected' : ''}}>{{$items->product_name}}</option>
                                      <?php
                              }
                                                    ?>
                                                 </select><br>
                                                </div>
                                            </td>

                                            <td style="border: 1px solid #a9a5a5;">
                                                <div class="form-group">
                                                <input type="text" class="form-control packege_price" name="packege_price[]" id="packege_price" placeholder="Enter Package Price" value="{{$suggested_dt[$i]}}" required><br>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php 
                                    }
                                    ?>   
                                    </table>
                                </div>
                            </div>
                            <!--end Surgery Details code-->

                            <div class="row">
                                <div class="col-md-6">
                                    <legend>Doctor's Advice</legend>
                                    <div class="form-group">
                                    <textarea type="text" name="doctor_advice" class="form-control doctor_advice" id="doctor_advice"  rows="4" cols="60" required>{{$doctoranalysis->doctor_advice}}</textarea>               
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <legend>Clinical Remarks</legend>
                                    <div class="form-group">
                                    <textarea type="text" name="clinical_remark" class="form-control clinical_remark" id="clinical_remark"  rows="4" cols="60" required>{{$doctoranalysis->clinical_remark}}</textarea>               
                                    </div>
                                    <br>
                                </div>
                            </div>
                           

                           


                <div class="row gx-10 mb-5">
                        <div class="col-md-3">
                                        <div class="form-group mb-5">
                                          

                                            <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Number Of Follow Up Days* :</label>
                                           
                                            <input type="text" name="no_of_followup_days" onkeyup="calNextFollowUpDate(this);"id="no_of_followup_days" placeholder="Enter Days"  class="form-control" value="{{$doctoranalysis->no_of_followup_days}}" required>
                                        </div>
                            </div>
                            <div class="col-md-3">
                                        <div class="form-group mb-5">
                                            <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Follow Up Date* :</label>
                                            <input type="text" name="followup_date" id="followUpDate"   class="form-control" value="{{$doctoranalysis->followup_date}}" readonly  >
                                           
                                        </div>
                            </div>
</div>
<!--script for follow up days -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/base/jquery-ui.css" rel="stylesheet"/>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<!--script form follow up days -->
<script>
function calNextFollowUpDate(self)
{
  var days = $(self).val();
  if(days != '')
  {
    var newDate = new Date();
     if (newDate) { // Not null
        var newdays = newDate.getDate() + Number(days);
        var follow_date = new Date(newDate.getFullYear(), newDate.getMonth(), newdays);
        var dd = follow_date.getDate();
        var mm = follow_date.getMonth() + 1;
        var yy = follow_date.getFullYear();
        let followUpDate = dd+"-"+mm+"-"+yy;
        $('#followUpDate').val(followUpDate);
     }
   }

}

</script>
<!--end script followup days-->


<!--end followupdays script-->

<!--script for dependent droupdown subcategory to product-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
$('#investigation_for').change(function(){
     var proid = $(this).val();  
                                    // alert(catid);
    if(proid){
        $.ajax({
        type:"GET",
        url:"{{url('fetch_sub_cat_doctoranalysis')}}?subcategory="+proid,

        success:function(res){        
        if(res){
            $("#investigation").empty();
            $("#investigation").append('<option>Select Product</option>');
            $.each(res,function(key,value){
            $("#investigation").append('<option value="'+key+'">'+value+'</option>');
            });
        
        }else{
            $("#investigation").empty();
        }
        }
        });
    }else{
        $("#investigation").empty();
        
    }   
    });
});
</script>
<!--end script-->

<!--script for category to product-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
$('#surgery_category').change(function(){
     var productssid = $(this).val();  
                                    // alert(catid);
    if(productssid){
        $.ajax({
        type:"GET",
        url:"{{url('fetch_cat_doctoranalysis')}}?category="+productssid,

        success:function(res){        
        if(res){
            $("#products").empty();
            $("#products").append('<option>Select Product</option>');
            $.each(res,function(key,value){
            $("#products").append('<option value="'+key+'">'+value+'</option>');
            });
        
        }else{
            $("#products").empty();
        }
        }
        });
    }else{
        $("#products").empty();
        
    }   
    });
});
</script>

<!--end script-->























<!--end script for dependent droupdown subcategory to product-->


                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-primary mt-3">save </button>
                        </div>
                </form>
                </div>
            </div>
        </div>
    </div>

<!--hide table script of further investigation recommendation -->
   <script>
     var i=0;
    $("#addButton_furtherinvestigation").click(function(){
        i++;
                                    var html2 =`<tr>
                                            <td style="border: 1px solid #a9a5a5;">
                                                <button type="button" id='remove_furtherinvestigation_row' class="btn btn-default remove_furtherinvestigation_row"><i class="fa fa-trash"></i></button>
                                            </td>

                                            <td style="border: 1px solid #a9a5a5;">
                                                <div class="form-group">
                                                    <select class="form-select " name="investigation_for[]" id="investigation_for_${i}" onchange="fetchfurtherinvestigationMulti(${i})">
                                                   
                                                    @foreach($doctorsubcategory as $items)
                                      <option value="{{ $items->subcat_id }}"{{$doctoranalysis->investigation_for == $items->subcat_id ? 'selected' : ''}}>{{$items->subcat_name}}</option>
                                                    @endforeach
                                                   
                                                 </select><br>
                                               </div>
                                            </td>

                                            <td style="border: 1px solid #a9a5a5;">
                                                <div class="form-group">
                                                <select id="investigation_${i}" name="investigation[]" class="form-control" required>
                                                @foreach($product as $items)
                <option value="{{$items->id}}" {{$doctoranalysis->investigation == $items->id  ? 'selected' : ''}}>{{$items->product_name}}</option>
                 @endforeach
                                                </select>
                                                <br>
                                             </div>
                                            </td>

                                           
                                        </tr>`;
                                    $("#itemfurtherinvestigationrecommendation").append(html2);
                                    });

                                    //multi td script of further investigation//
                                    function fetchfurtherinvestigationMulti(incre_i){
                                               
                                               // $("#payment_paymode_").change(function(incre_i){
                                                 var proid =  $('#investigation_for_'+incre_i).val();
                                                 console.log(proid);
                                               // var payment_paymode= $(this).val();
                                              
                                              
                                                 $.ajax({
                                                   type:"GET",
                                                   url:"{{url('fetch_sub_cat_doctoranalysis')}}?subcategory="+proid,
                                                   success:function(res){        
                                                   if(res){
                                                     $('#investigation_'+incre_i).empty();
                                                     $('#investigation_'+incre_i).append('<option>Select product</option>');
                                                     $.each(res,function(key,value){
                                                       $('#investigation_'+incre_i).append('<option value="'+key+'">'+value+'</option>');
                                                     });
                                                   
                                                   }else{
                                                     $('#investigation_'+incre_i).empty();
                                                   }
                                                   }
                                                 });
                                               
}
 //end multi td script of further investigation//

$("#itemfurtherinvestigationrecommendation").on('click','.remove_furtherinvestigation_row',function()
                                    {
                                        $(this).closest('tr').remove();
                                        
                                    });
  </script>
  <!--script end of hide further investigation recommendation-->

  <!--hide table script of medicine -->
  <script>
    $("#addButton_medicine").click(function(){
                                    var html2 =`<tr>
                                            <td style="border: 1px solid #a9a5a5;">
                                                <button type="button" id='remove_medicine_row' class="btn btn-default remove_medicine_row"><i class="fa fa-trash"></i></button>
                                            </td>

                                            <td style="border: 1px solid #a9a5a5;">
                                                <div class="form-group">
                                                    <select class="form-select " name="medicine[]" id="medicine">
                                                    <option value="">--Select Medicine--</option>
                                                    @foreach($product as $items)
                <option value="{{$items->id}}" {{$doctoranalysis->products == $items->id  ? 'selected' : ''}}>{{$items->product_name}}</option>
                 @endforeach
                                                 </select><br>
                                                </div>
                                            </td>

                                            <td style="border: 1px solid #a9a5a5;">
                                                <div class="form-group">
                                                <input type="text" class="form-control quantity" name="quantity[]" id="quantity" placeholder="Enter Qty"><br>
                                                </div>
                                            </td>

                                            <td style="border: 1px solid #a9a5a5;">
                                                <div class="form-group">
                                                <input type="text" class="form-control no_of_days	" name="no_of_days[]" placeholder="Enter No.of Days" id="no_of_days"><br>
                                                </div>
                                            </td>

                                            <td style="border: 1px solid #a9a5a5;">
                                                <div class="form-group">
                                                <input type="text" class="form-control dose" name="dose[]" id="dose" placeholder="Enter Dose"><br>
                                                </div>
                                            </td>

                                           
                                        </tr>`;
                                    $("#itemedicine").append(html2);
                                    });
                                    $("#itemedicine").on('click','.remove_medicine_row',function()
                                    {
                                        $(this).closest('tr').remove();
                                        
                                    });
  </script>
  <!--script end of hide medicine-->


  <!--hide table script of surgery details -->
  <script>
       var i=0;
    $("#addButton_surgerydetails").click(function(){
        i++;
                                    var html2 =`<tr>
                                            <td style="border: 1px solid #a9a5a5;">
                                                <button type="button" id='remove_surgerydetails_row' class="btn btn-default remove_surgerydetails_row"><i class="fa fa-trash"></i></button>
                                            </td>

                                            <td style="border: 1px solid #a9a5a5;">
                                                <div class="form-group">
                                                    <select class="form-select " name="surgery_category[]" id="surgery_category_${i}" onchange="fetchsurgerydetailsMulti(${i})">
                                                    <option value="">-- Select Surgery Category--</option>
                                                    @foreach(  $doctorcategory as $items)
                                    <option value="{{ $items->cat_id }}"{{$doctoranalysis->surgery_category == $items->cat_id ? 'selected' : ''}}>{{$items->cat_name}}</option>
                                                    @endforeach
                                                 </select><br>
                                                </div>
                                            </td>

                                            <td style="border: 1px solid #a9a5a5;">
                                                <div class="form-group">
                                                    <select class="form-control "name="products[]" id="products_${i}" required>
                                                    <option value="">-- Select Surgery Product--</option>
                                                    @foreach($product as $items)
                <option value="{{$items->id}}" {{$doctoranalysis->products == $items->id  ? 'selected' : ''}}>{{$items->product_name}}</option>
                 @endforeach
                                                    
                                                 </select><br>
                                                </div>
                                            </td>

                                            <td style="border: 1px solid #a9a5a5;">
                                                <div class="form-group">
                                                    <select class="form-select " name="injection[]" id="injection_${i}">
                                                    <option value="">--Select Surgery Injection--</option>
                                                    @foreach($product as $items)
                <option value="{{$items->id}}" {{$doctoranalysis->products == $items->id  ? 'selected' : ''}}>{{$items->product_name}}</option>
                 @endforeach
                                                 </select><br>
                                                </div>
                                            </td>

                                            <td style="border: 1px solid #a9a5a5;">
                                                <div class="form-group">
                                                <input type="text" class="form-control packege_price" name="packege_price[]" id="packege_price_${i}" placeholder="Enter Package Price"><br>
                                                </div>
                                            </td>

                                           
                                        </tr>`;
                                    $("#itemsurgerydetails").append(html2);
                                    });


                                     //multi td script of surgery details//
                                     function fetchsurgerydetailsMulti(incre_i){
                                               
                                               // $("#payment_paymode_").change(function(incre_i){
                                                 var productssid = $('#surgery_category_'+incre_i).val();
                                                 console.log(productssid);
                                               // var payment_paymode= $(this).val();
                                              
                                              
                                                 $.ajax({
                                                   type:"GET",
                                                   url:"{{url('fetch_cat_doctoranalysis')}}?category="+productssid,
                                                   success:function(res){        
                                                   if(res){
                                                     $('#products_'+incre_i).empty();
                                                     $('#products_'+incre_i).append('<option>Select surgery product</option>');
                                                     $.each(res,function(key,value){
                                                       $('#products_'+incre_i).append('<option value="'+key+'">'+value+'</option>');
                                                     });
                                                   
                                                   }else{
                                                     $('#products_'+incre_i).empty();
                                                   }
                                                   }
                                                 });
                                               
}
 //end multi td script of surgery details//

                                    $("#itemsurgerydetails").on('click','.remove_surgerydetails_row',function()
                                    {
                                        $(this).closest('tr').remove();
                                        
                                    });
  </script>
  <!--script end of hide surgery details-->
@endsection







