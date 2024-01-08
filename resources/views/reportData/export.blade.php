@extends('layouts.app')
@section('title')
{{ __('MIS Report Analysis') }}
@endsection
@section('header')

@endsection('header')
@section('page_css')
    <link rel="stylesheet" href="{{ asset('assets/css/int-tel/css/intlTelInput.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        a{
            text-decoration:None;
        }
    </style>
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
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
                <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/all.min.js" ></script>
                
                <!--<a href="{{ route('export_csv') }}" class="btn btn-sm btn-light btn-active-light-primary pull-right">
                <ol class="breadcrumb">
                    <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
                    <li> > </li>
                    <li><a href="">MIS Report</a></li>
                    <li> ></li>
                    <li class="active">MIS Report</li>
                </ol> 
                </a>-->
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
                    
                <form action="{{url('export_csv')}}" method="post" id="doctoranalysis" name="doctoranalysis">
                    @csrf
                    <div class="row gx-10 col-sm-12">
                        <div class="col-sm-12 d-flex" style="gap:0.2rem;">
                            <div class="col-sm-3">
                                <div class="form-group mb-3">
                                    <div>
                                        <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Transaction Type :</label>
                                        <select class="form-select form-control" id="transaction_type" name="transaction_type" style="width:100%;">
                                            <option value="hospital">--Select Transaction Type--</option>
                                            <option value="hospital">Hospital Records</option>
                                            <option value="pharmacy">Pharmacy Records</option>
                                            <option value="mis">MIS Reports</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group mb-3">
                                    <div>
                                    <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Report Type :</label>
                                        <select class="form-select form-control" id="report_type" name="report_type" style="width:100%;">
                                            <option value="">--Select Report Type--</option>
                                            <option value="hospital">Sales MIS Report</option>
                                            <option value="pharmacy">Category wise Sales MIS Report</option>
                                            <option value="mis">Optometry Report</option>
                                            <option value="mis">Doctor Analysis Report</option>
                                            <option value="mis">Counsellor Report</option>
                                            <option value="mis">Pharmacy Purchase Records</option>
                                            <option value="mis">GST Report</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group mb-3">
                                    <div>
                                        <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Patient Name & Code :</label>
                                        <select class="form-control form-select patient"  name="patient_id" id="patient_id"  
                                        onchange="fetchanalysis()" style="width:100%;" required>
                                        <option value="">--Select Patient Code--</option>
                                        @foreach($patientdata as $items)
                                            <option value="{{ $items->id }}">{{ $items->full_name}} {{'( Patient_00'.$items->id.')'}}</option>
                                        @endforeach
                                    </select>
                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>
                                    <script type="text/javascript">
                                        width: '100%',
                                        $("#patient_id").select2({ });
                                    </script>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group mb-3">
                                    <div>
                                        <label for="doctor_id" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Doctor Name :</label>
                                        <select style="width:100%;" class="form-control patient"  name="doctor_id" id="doctor_id"  
                                        onchange="fetchanalysis()" required>
                                        <option value="">--Select Category--</option>
                                        @foreach($doctordata as $items)
                                            <option value="{{ $items->id }}">{{$items->id}} - {{$items->full_name}}</option>
                                        @endforeach
                                    </select>
                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>
                                    <script type="text/javascript">
                                        width: '100%',
                                        $("#doctor_id").select2({ });
                                    </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 d-flex" style="gap:0.2rem;">
                            <div class="col-sm-3">
                                <div class="form-group mb-3">
                                    <div>
                                        <label for="catagory" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Select Category :</label>
                                        <select style="width:100%;" class="form-control patient"  name="catagory" id="catagory"  
                                        onchange="fetchanalysis()" required>
                                        <option value="">--Select Category--</option>
                                        @foreach($cat as $items)
                                            <option value="{{ $items->id }}">{{ $items->cat_name}}</option>
                                        @endforeach
                                    </select>
                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>
                                    <script type="text/javascript">
                                        width: '100%',
                                        $("#catagory").select2({ });
                                    </script>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group mb-3">
                                    <div>
                                        <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Investigation for :</label>
                                        <select style="width:100%;" class="form-control patient"  name="investigation_for[]" id="investigation_for"  
                                        onchange="fetchanalysis()" required>
                                        <option value="" style="">--Select Investigation for--</option>
                                        @foreach($doctorsubcategory as $items)
                                            <option value="{{ $items->subcat_id }}">{{ $items->subcat_id }} -- {{ $items->subcat_name }}</option>
                                        @endforeach
                                    </select>
                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>
                                    <script type="text/javascript">
                                        width: '100%',
                                        $("#investigation_for").select2({ });
                                    </script>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group mb-3">
                                    <div>
                                        <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Investigation :</label>
                                        <input type="text" name="" id="" class="form-control">
                                    </select>
                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>
                                    <script type="text/javascript">
                                        width: '100%',
                                        $("#patient_id").select2({ });
                                    </script>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group mb-3">
                                    <div>
                                        <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">From Date :</label><br>
                                        <input type="date" name="" id="" class="form-control">
                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>
                                    <script type="text/javascript">
                                        width: '100%',
                                        $("#patient_id").select2({ });
                                    </script>
                                    </div>
                                </div>
                            </div>
                        </div class="mt-5">
                        <div class="col-sm-12 d-flex" style="gap:0.2rem;">
                            <div class="col-sm-3">
                                <div class="form-group mb-3">
                                    <div>
                                        <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">To Date :</label><br>
                                        <input type="date" name="" id="" class="form-control">
                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>
                                    <script type="text/javascript">
                                        width: '100%',
                                        $("#patient_id").select2({ });
                                    </script>
                                    </div>
                                </div>
                            </div>
                        </div>
<!--script for mr no to patinet name -->
                <!-- <script>
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
                                  $('#patient_name').val(data[0].first_name + ' '+data[0].last_name);
                                    }
                                },
                            });
                        }
                </script> -->
                <!--end script -->
                <!--script for fetch privious date  to patinet data -->
                <!-- <script>
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
                                 -->
                <!--end script-->
<script>
    $(".furtherinvestigation").select2({ });
</script>
<script>
    $(".investigation ").select2({ });
</script>                            
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/base/jquery-ui.css" rel="stylesheet"/>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script type="text/javascript">
   $(".surgeryinjection").select2({ }); 
</script>
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
<!--abhishek script for dependent droupdown subcategory to product-->
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
<!-- Abhishek code script end -->
<!--abhishek code investigation for -->
<script>
    var i=0;
    function fetchfurtherinvestigationMulti(incre_i){
         var proid =  $('#investigation_for_'+incre_i).val();
         console.log(proid);
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
    $("#itemfurtherinvestigationrecommendation").on('click','.remove_furtherinvestigation_row',function()
        {
            $(this).closest('tr').remove();
            
        });
</script>
  <!-- abhishek script end of hide investigation recommendation-->

<!--Popup code of investigation-->               
<script>
   $(".showidone").click(function(){

   $("#catgeoryShowModal").modal('show');
   });
</script>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js"></script>
<script  type="text/javascript">
    $(document).ready(function () {
        $('select').selectize({
            sortField: 'text';
            console.log("hello1");
        });
    });
</script>
@endsection
