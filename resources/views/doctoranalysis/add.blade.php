@extends('layouts.app')
@section('title')
{{ __('Add Doctor Analysis') }}
    @endsection
@section('page_css')
    <link rel="stylesheet" href="{{ asset('assets/css/int-tel/css/intlTelInput.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script> -->
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/themes/smoothness/jquery-ui.css">
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script> -->


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
                    
                <form action="{{url('analysisdoctor/add')}}" method="post" id="doctoranalysis" name="doctoranalysis">
                    @csrf
                    <div class="row gx-10 mb-5">
                        <div class="col-md-3">
                                        <div class="form-group mb-5">
                                    <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">MR No :</label>
                                    <select class="form-select chosen" name="patient_id" id="patient_id" onchange="fetchanalysis()" style = width:"115%">
                                        <!-- <option value="">--Select MR No--</option> -->
                                        @foreach($doctoranalysispatient as $items)
                                        <option value="{{ $items->id }}">{{ $items->user_id}} {{$items->first_name}}
                                            {{ $items->last_name}} {{'(Patient_00'.$items->id.')'}}</option>
                                        @endforeach
                                    </select>
                                </div>
                   </div>
</div>         
                        
                       
                        <div class="row gx-10 mb-5">
                        <!--script for serch box-->
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.js"></script>
                        <script type="text/javascript">
                        $(".chosen").chosen();
                        </script>
                        <!--script for serch box-->
                        <!--script for mr no to patinet name -->
                        <script>
                        function fetchanalysis(){
                                var pati_id =  $('#patient_id').val();
                                //alert(emp_id);
                                $.ajax({
                                        url: "{{url('/Payroll_pricedoctoranalysis')}}",
                                        method:'POST',
                                        data :{
                                            "_token": "{{ csrf_token() }}",
                                            id:pati_id,
                                        },
                                        success:function(data){
                                            if(data)
                                            {
                                            // $('#privious_date').val(data[0].created_at);
                                            $('#patient_name').val(data[0].first_name);
                                            
                                            
                                            }
                                            
                                        },
                                    });
                                    
                                }
                        </script>
                        <!--end script-->
                        <!--script for fetch privious date  to patinet data -->
                        <script>
                                           function fetchpatientpriviousedata(){
                                                    var pre_id =  $('#privious_date').val();
                                                 //alert(emp_id);
                                                    $.ajax({
                                                            url: "{{url('/fetchpriviouse')}}",
                                                            method:'POST',
                                                            data :{
                                                                "_token": "{{ csrf_token() }}",
                                                                id:pre_id,
                                                            },
                                                            success:function(data){
                                                               if(data)
                                                               {
                                                                // $('#privious_date').val(data[0].created_at);
                                               $('#diagnosis').val(data[0].diagnosis);
                                               $('#patient_category').val(data[0].patient_category);
                                               $('#investigation_for').val(data[0].investigation_for);
                                               $('#investigation').val(data[0].product_name);
                                               $('#medicine').val(data[0].medicine);
                                               $('#quantity').val(data[0].quantity);
                                               $('#no_of_days').val(data[0].no_of_days);
                                               $('#dose').val(data[0].dose);
                                               $('#surgery_category').val(data[0].surgery_category);
                                               $('#products').val(data[0].products);
                                               $('#injection').val(data[0].injection);
                                               $('#packege_price').val(data[0].packege_price);
                                               $('#doctor_advice').val(data[0].doctor_advice);
                                               $('#clinical_remark').val(data[0].clinical_remark);
                                               $('#no_of_followup_days').val(data[0].no_of_followup_days);
                                               $('#followUpDate').val(data[0].followup_date);
                                               }
                                             },
                                          });
                                         }
                                        </script>
                                    <!--end script-->


                                    <div class="col-md-3">
                                <div class="form-group mb-5">
                                    <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Privious Date :</label>
                                        <!-- <input type="text" name="bill_no" id="bill_no"    class="form-control" > -->
                                        <select class="form-select"  name="privious_date" id="privious_date"  onchange="fetchpatientpriviousedata()" >
                                        <option value="">--Select Privious Date--</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-5">
                                        <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Patient Name :</label>
                                         <input type="text" name="patient_name" id="patient_name"    class="form-control" required>

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
                                    <select class="form-select patientType" id="patient_category" name="patient_category[]" multiple="multiple" style="width:100%"  required>
                                        <option>--select patient category--</option>
                                    @foreach( $patientcategory as $items)
                  <option value="{{ $items->cat_id }}">{{ $items->cat_name}}</option>
                @endforeach
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
                                            <textarea name="diagnosis" id="diagnosis" class="form-control" required ></textarea>
                                        </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group mb-5">
                                    <label for="ven_name" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Cancelled Check-File Upload</label> 
                                    <input type="file" name="upload_document" id="upload_document" class="form-control upload_document">
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
                                        <tr>
                                            <td style="border: 1px solid #a9a5a5;">
                                                <button type="button" id='addButton_furtherinvestigation' class="btn btn-default addButton_furtherinvestigation"><i class="fa fa-plus"></i></button>
                                            </td>
                                            
                                            <td style="border: 1px solid #a9a5a5;">
                                                <div class="form-group">
                                                    <select class="form-select " name="investigation_for[]" id="investigation_for" required>
                                                    <option value="">--Select--</option>
                                                    @foreach($doctorsubcategory as $items)
                                    <option value="{{ $items->subcat_id }}">{{ $items->subcat_name}}</option>
                                                    @endforeach
                                                 </select>
                                                 <br>
            <div class="">
                <!-- <a href="{{ route('subcategory.create') }}"
                   class="btn btn-sm  btn-active-primary pull-left">{{ __('Add | Sub-Category')}}</a> -->

                   <a>
                        <button type="button"   class="btn btn-sm  btn-active-primary pull-left showidone">{{ __('Add')}}</button>
                        </a>
            </div>

           

     

            
                                                 
                                                </div>
                                            </td>
                                            <td style="border: 1px solid #a9a5a5;">
                                                <div class="form-group">
                                                <!-- <input type="text" class="form-control investigation" name="investigation[]" id="investigation" placeholder="Select Item"> -->
                                                 <select id="investigation" name="investigation[]" class="form-control" required> 
                                                 </select>
                                                <br>

            <div class="">
                <!-- <a href="{{ route('product.create') }}"
                   class="btn btn-sm  btn-active-primary pull-left">{{ __(' Add|Product')}}</a> -->


                   <a>
                        <button type="button"   class="btn btn-sm  btn-active-primary pull-left showidtwo">{{ __('Add')}}</button>
                        </a>
            </div>
                                                  
                                                </div>
                                            </td>
                                        </tr>
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
                                        <tr>
                                            <td style="border: 1px solid #a9a5a5;">
                                                <button type="button" id='addButton_medicine' class="btn btn-default addButton_medicine"><i class="fa fa-plus"></i></button>
                                            </td>
                                            <td style="border: 1px solid #a9a5a5;">
                                                <div class="form-group">
                                                    <select class="form-select " name="medicine[]" id="medicine" required>
                                                    @foreach($product as $items)
                
                <option value="{{ $items->id }}">{{ $items->product_name}}</option>
        @endforeach
                                                 </select><br>
                                                </div>
                                            </td>

                                            <td style="border: 1px solid #a9a5a5;">
                                                <div class="form-group">
                                                <input type="text" class="form-control quantity" name="quantity[]" id="quantity" placeholder="Enter Qty" required><br>
                                                </div>
                                            </td>

                                            <td style="border: 1px solid #a9a5a5;">
                                                <div class="form-group">
                                                <input type="text" class="form-control no_of_days" name="no_of_days[]" id="no_of_days" placeholder="Enter No.of Days" required><br>
                                                </div>
                                            </td>

                                            <td style="border: 1px solid #a9a5a5;">
                                                <div class="form-group">
                                                <input type="text" class="form-control dose"  id="dose" name="dose[]" placeholder="Enter Dose" required><br>
                                                </div>
                                            </td>
                                            
                                        </tr>
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
                                        <tr>
                                            <td style="border: 1px solid #a9a5a5;">
                                                <button type="button" id='addButton_surgerydetails' class="btn btn-default addButton_surgerydetails"><i class="fa fa-plus"></i></button>
                                            </td>
                                            <td style="border: 1px solid #a9a5a5;">
                                                <div class="form-group">
                                                    <select class="form-select " name="surgery_category[]" id="surgery_category" required>
                                                    <option value="">-- Select Surgery Category--</option>
                                                    @foreach(  $doctorsubcategory as $items)
                                                    <option value="{{ $items->subcat_id }}">{{$items->subcat_name}}</option>
                                                    @endforeach
                                                 </select><br>
                                                </div>
                                            </td>

                                            <td style="border: 1px solid #a9a5a5;">
                                                <div class="form-group">
                                                    <select class="form-control " name="products[]" id="products" required>
                                                    <option value="">-- Select Surgery Product--</option>
                                                    
                                                </select><br>
                                                </div>
                                            </td>

                                            <td style="border: 1px solid #a9a5a5;">
                                                <div class="form-group">
                                                    <select class="form-select" id="injection" name="injection[]" id="injection" required>
                                                    <option value="">--Select Surgery Injection--</option>
                                                    @foreach( $product as $items)
                
                <option value="{{ $items->id }}">{{ $items->product_name}}</option>
        @endforeach
                                                 </select><br>
                                                </div>
                                            </td>

                                            <td style="border: 1px solid #a9a5a5;">
                                                <div class="form-group">
                                                <input type="text" class="form-control packege_price" name="packege_price[]" id="packege_price" placeholder="Enter Package Price" required><br>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <!--end Surgery Details code-->

                            <div class="row">
                                <div class="col-md-6">
                                    <legend>Doctor's Advice</legend>
                                    <div class="form-group">
                                    <textarea type="text" name="doctor_advice" class="form-control doctor_advice" id="doctor_advice"  rows="4" cols="60" required></textarea>               
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <legend>Clinical Remarks</legend>
                                    <div class="form-group">
                                    <textarea type="text" name="clinical_remark" class="form-control clinical_remark" id="clinical_remark"  rows="4" cols="60" required></textarea>               
                                    </div>
                                    <br>
                                </div>
                            </div>
                           

                           


                <div class="row gx-10 mb-5">
                        <div class="col-md-3">
                                        <div class="form-group mb-5">
                                          

                                            <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Number Of Follow Up Days* :</label>
                                           
                                            <input type="text" name="no_of_followup_days" onkeyup="calNextFollowUpDate(this);"  id="no_of_followup_days" placeholder="Enter Days"  class="form-control" required >
                                        </div>
                            </div>
                            <div class="col-md-3">
                                        <div class="form-group mb-5">
                                            <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Follow Up Date* :</label>
                                            <input type="text" name="followup_date" id="followUpDate"   class="form-control" value="<?=date('d-m-Y');?>" readonly  >
                                           
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
        // $('#patient_id').select2();
$('#surgery_category').change(function(){
     var subcatid = $(this).val();  
                                    // alert(catid);
    if(subcatid){
        $.ajax({
        type:"GET",
        url:"{{url('fetch_cat_doctoranalysis')}}?category="+subcatid,

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

<!--script for id throu priviouse date -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
$('#patient_id').change(function(){
     var patientdoctorssid = $(this).val();  
        // alert(patientdoctorssid);
    if(patientdoctorssid){
        $.ajax({
        type:"GET",
        url:"{{url('fetch_date')}}?id="+patientdoctorssid,

        success:function(res){        
        if(res){
            $("#privious_date").empty();
            $("#privious_date").append('<option>Select priviouse date</option>');
            $.each(res,function(key,value){
            $("#privious_date").append('<option value="'+key+'">'+value+'</option>');
            });
        
        }else{
            $("#privious_date").empty();
        }
        }
        });
    }else{
        $("#privious_date").empty();
        
    }   
    });
});
</script>
<!--end script-->


































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
                                                    <option value="">--Select--</option>
                                                    @foreach(  $doctorsubcategory as $items)
                                    <option value="{{ $items->subcat_id }}">{{ $items->subcat_name}}</option>
                                                    @endforeach
                                                 </select><br>
                                               </div>
                                            </td>

                                            <td style="border: 1px solid #a9a5a5;">
                                                <div class="form-group">
                                                <select id="investigation_${i}" name="investigation[]" class="form-control" required>
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
                
                <option value="{{ $items->id }}">{{ $items->product_name}}</option>
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
                                    <option value="{{ $items->cat_id }}">{{ $items->cat_name}}</option>
                                                    @endforeach
                                                 </select><br>
                                                </div>
                                            </td>

                                            <td style="border: 1px solid #a9a5a5;">
                                                <div class="form-group">
                                                    <select class="form-control "name="products[]" id="products_${i}" required>
                                                    <option value="">-- Select Surgery Product--</option>
                                                 </select><br>
                                                </div>
                                            </td>

                                            <td style="border: 1px solid #a9a5a5;">
                                                <div class="form-group">
                                                    <select class="form-select " name="injection[]" id="injection_${i}">
                                                    <option value="">--Select Surgery Injection--</option>
                                                    @foreach( $product as $items)
                
                <option value="{{ $items->id }}">{{ $items->product_name}}</option>
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



  <!--Popup code of investigation-->

  <div class="modal fade" id="catgeoryShowModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Add Investigation</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        <form action="" id="addsubcategory" >                   
                                                {{csrf_field()}}
                                                    <div class="form-group row">
                                                        
                                                         
                                                        
                                                        <div class="col-sm-12">
                                                            <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Investigation:</label>
                                                            <input type="text" class="form-control  subcat" id="subcat" name="subcat"  />

                                                        </div>
                                                       
                                                        <div class="form-group">
                                                               <center><input type="submit" value="Save"  class="btn btn-primary mt-3 text-center" onclick="savecat();"></center>
                                                               <!-- <button type="button" class="btn btn-primary mt-3 text-center">Submit</button> -->
                                                            </div>
                                            </form>
                                        </div>
                                       
                                        </div>
                                    </div>
                                </div>
                             </div>
                             
        <script>
           $(".showidone").click(function(){
   
           $("#catgeoryShowModal").modal('show');
           });
       </script>

       <!--script for add subcategory into droupdown list-->
       <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

<script type="text/javascript">

function savecat(){
  

    let name = $('#subcat').val();
    // alert(name);
    $.ajax({
      url: "/submit-catform",
      type:"POST",
      data:{
        "_token": "{{ csrf_token() }}",
        name:name,
     
      },
      success:function(response){
        $('#successMsg').show();
        console.log(response);
        // location.reload();
        alert("Added Successfully.");
        window.location = "/analysisdoctor/add";
      },
     
      });
  
    
  
     }
  </script>
       <!--end script-->
       <!-- End Popup code of investigation-->






       <!--Popup code of investigation-->

  <div class="modal fade" id="investigationfoShowModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Add Investigation For</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        <form action="" id="addinvestigationfor">                   
                                                {{csrf_field()}}
                                                    <div class="form-group row">
                                                        
                                                    <div class="col-sm-12">
                                                            <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Investigation For:</label>
                                                            <input type="text" class="form-control  investifor" id="investifor" name="investifor"/>
                                                           
                                                        <br>
                                                        </div>
                                                        
                                                        <div class="col-sm-12">
                                                            <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Investigation:</label>
                                                            <input type="text" class="form-control  investi" id="investi" name="investi" />
                                                           

                                                        </div>


                                                       
                                                       
                                                        <div class="form-group">
                                                               <center><input type="submit" value="Save"  class="btn btn-primary mt-3 text-center" onclick="saveinst();"></center>
                                                               <!-- <button type="button" class="btn btn-primary mt-3 text-center">Submit</button> -->
                                                            </div>
                                            </form>
                                        </div>
                                       
                                        </div>
                                    </div>
                                </div>
                             </div>

                             <script>
           $(".showidtwo").click(function(){
   
           $("#investigationfoShowModal").modal('show');
           });
       </script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

<script type="text/javascript">

function saveinst(){
  

    let name = $('#investifor').val();
     //alert(name);
    $.ajax({
      url: "/submit-invest",
      type:"POST",
      data:{
        "_token": "{{ csrf_token() }}",
        name:name,
     
      },
      success:function(response){
        $('#successMsg').show();
        console.log(response);
        // location.reload();
        alert("Added Successfully.");
        window.location = "/analysisdoctor/add";
      },
     
      });
  
    
  
     }
  </script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>

                        <script  type="text/javascript">
                            $(document).ready(function () {
                                $('select').selectize({
                                    sortField: 'text';
                                    console.log("hello1");
                                });
                            });
                        </script>
                             
@endsection







