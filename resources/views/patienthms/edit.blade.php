@extends('layouts.app')
@section('title')
{{ __('Edit Pre OT Master') }}
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
                <a href="{{ route('preot') }}"
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
                    
                <form action="{{url('preot/edit/'.$preot->id)}}" method="post" id="preot" name="preot">
                @csrf
                    @csrf
                        <div class="row gx-10 mb-5">
                        <div class="col-md-3">
                                        <div class="form-group mb-5">
                                          

                                            <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">MR NO :</label>
                                           
                                            <select class="form-select" name="pre_id" id="pre_id" onchange="fetchpatientid()" required>
                                                <option value="">--Select MR No--</option>
                                                @foreach($preotpatient as $items)
                <option value="{{$items->id}}" {{$preot->pre_id == $items->id  ? 'selected' : ''}}>{{'( Patient_00'.$items->id.')'}}</option>
                 @endforeach
                        </select>
                            </div>
                            </div>

                            <!--script for mr no to patinet name,mobile no , age -->
                            <script>
                                           function fetchpatientid(){
                                                    var preot_id =  $('#pre_id').val();
                                                 //alert(emp_id);
                                                    $.ajax({
                                                            url: "{{url('/preot_fetch')}}",
                                                            method:'POST',
                                                            data :{
                                                                "_token": "{{ csrf_token() }}",
                                                                id:preot_id,
                                                            },
                                                            success:function(data){
                                                               if(data)
                                                               {
                                                                // $('#privious_date').val(data[0].created_at);
                                                                $('#patientpre_name').val(data[0].first_name);
                                                                $('#mobile_pre').val(data[0].phone);
                                                                $('#age_pre').val(data[0].age);
                                                                
                                                                
                                                                
                                                               }
                                                             
                                                            },
                                                        });
                                                       
                                                    }
                                            </script>
                                            <!--end script-->




                             <div class="col-md-3">
                                        <div class="form-group mb-5">
                                            <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Patient Name :</label>
                                            
                                           
                                <input class='form-control  select2Patient' name="patientpre_name"  id="patientpre_name" value="{{$preot->patientpre_name}}" >  
                                           </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-5">
                                        <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Mob No :</label>
                                         <input type="text" name="mobile_pre" id="mobile_pre"    class="form-control"  value="{{$preot->mobile_pre}}"required>

                                 </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group mb-5">
                                        <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Age</label>
                                        <input type="text" value="{{$preot->age_pre}}" name="age_pre" id="age_pre" class="form-control" >   

                                 </div>
                            </div>

                           <div class="col-md-3">
                                <div class="form-group mb-5">
                                <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Operating Dr name :</label>
                                    <select class="form-select patientType" id="doctor_namepre" name="doctor_namepre" required>
                                        <option>--select Operating doctor--</option>
                                       
                                @foreach($preotdoctor as $items)
                <option value="{{$items->id}}" {{$preot->doctor_namepre == $items->id  ? 'selected' : ''}}>{{$items->full_name}}</option>
             @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-3">
                                        <div class="form-group mb-5">
                                        <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Date :</label>
                                        <input type="date" name="date_pre" value="{{$preot->date_pre}}" id="date_pre" class="form-control" >   
                                        </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group mb-5">
                                        <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Eye :</label>
                                        <select name="eye_pre" id ="eye_pre" class="form-control">
                                    <option value="">--Eye Type--</option>
                                   

                                    @foreach ($eyetype as $item)
        <option <?php echo $item->eye_pre == 'LE' ?  "selected" : "" ?> value="LE">LE</option>
        <option <?php echo $item->eye_pre == 'RE' ?  "selected" : "" ?> value="RE">RE</option>
        <option <?php echo $item->eye_pre == 'BE' ?  "selected" : "" ?> value="BE">BE</option>
       
         @endforeach
                                </select>  

                                 </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group mb-5">
                                        <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Surgery Category:</label>
                                        <select name="surgerycategory_pre" id ="surgerycategory_pre" class="form-control">
                                   


                                    @foreach($surgerycategory as $item)
        <option <?php echo $item->surgerycategory_pre == 'Cataract' ?  "selected" : "" ?> value="Cataract">Cataract</option>
        <option <?php echo $item->surgerycategory_pre == 'Retina' ?  "selected" : "" ?> value="Retina">Retina</option>
        <option <?php echo $item->surgerycategory_pre == 'Pterygium' ?  "selected" : "" ?> value="Pterygium">Pterygium</option>

        <option <?php echo $item->surgerycategory_pre == 'Squint' ?  "selected" : "" ?> value="Squint">Squint</option>
        <option <?php echo $item->surgerycategory_pre == 'Retina Injection' ?  "selected" : "" ?> value="Retina Injection">Retina Injection</option>
        <option <?php echo $item->surgerycategory_pre == 'Chalazion' ?  "selected" : "" ?> value="Chalazion">Chalazion</option>

        <option <?php echo $item->surgerycategory_pre == 'Cornea' ?  "selected" : "" ?> value="Cornea">Cornea</option>
        <option <?php echo $item->surgerycategory_pre == 'SOR' ?  "selected" : "" ?> value="SOR">SOR</option>
        <option <?php echo $item->surgerycategory_pre == 'Vitrectomy' ?  "selected" : "" ?> value="Vitrectomy">Vitrectomy</option>

        <option <?php echo $item->surgerycategory_pre == 'Retinal Detachment' ?  "selected" : "" ?> value="Retinal Detachment">Retinal Detachment</option>
        <option <?php echo $item->surgerycategory_pre == 'DCR' ?  "selected" : "" ?> value="DCR">DCR</option>
        <option <?php echo $item->surgerycategory_pre == 'DCT' ?  "selected" : "" ?> value="DCT">DCT</option>

        <option <?php echo $item->surgerycategory_pre == 'Syringing' ?  "selected" : "" ?> value="Syringing">Syringing</option>
        
       
       
         @endforeach
                                 </select>        

                                 </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-5">
                                        <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Type:</label>
                                        <select name="type_pre" id ="type_pre" class="form-control">
                                       

                                        @foreach ($typepre as $item)
        <option <?php echo $item->type_pre == 'PHACO' ?  "selected" : "" ?> value="PHACO">PHACO</option>
        <option <?php echo $item->type_pre == 'MICS' ?  "selected" : "" ?> value="MICS">MICS</option>
        <option <?php echo $item->type_pre == 'SICS' ?  "selected" : "" ?> value="SICS">SICS</option>
        <option <?php echo $item->type_pre == 'APHAKIA' ?  "selected" : "" ?> value="APHAKIA">APHAKIA</option>
       
         @endforeach
                                </select> 

                                 </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-5">
                                        <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Diabetic Status:</label>
                                        <select name="diabeticstatus_pre" id ="diabeticstatus_pre" class="form-control">
                                        <option value="">--Select Status--</option>
                                       
                                   

                                    
                                    @foreach ($diabeticstatuspre as $item)
        <option <?php echo $item->diabeticstatus_pre == 'yes' ?  "selected" : "" ?> value="yes">YES</option>
        <option <?php echo $item->diabeticstatus_pre == 'no' ?  "selected" : "" ?> value="no">NO</option>
       
       
         @endforeach
         </select>
              </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group mb-5">
                                        <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Package:</label>
                                         <input type="text" name="package_pre" id="package_pre"    class="form-control" value="{{$preot->package_pre}}" required>

                                 </div>
                            </div>

                           <!-- <div class="col-md-12">
                            <legend>  Surgery Specific Detal </legend>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered text-center"  id="itemTable">
                                  
                                <th style="border: 1px solid #a9a5a5;">Product</th>
                                    <th style="border: 1px solid #a9a5a5;">Product ID</th>
                                    <th style="border: 1px solid #a9a5a5;">Lens ID</th>
                                    <th style="border: 1px solid #a9a5a5;">Lens Name</th>
                                    <th style="border: 1px solid #a9a5a5;">Lens Focal Point</th>
                                    <th style="border: 1px solid #a9a5a5;">KR K1</th> 
                                    <th style="border: 1px solid #a9a5a5;">KR K2</th>
                                    <th style="border: 1px solid #a9a5a5;">Diaopter</th>
                                    <th style="border: 1px solid #a9a5a5;">A Constant</th>
                                    <th style="border: 1px solid #a9a5a5;">IOL Power</th> 
                                    <th style="border: 1px solid #a9a5a5;">Cyl Value</th>                                    
                                        
                                                                                                        
                                        <tr id="1">  
                                            
        
                                        <td style="border: 1px solid #a9a5a5;">
                                            <div class="form-group">
                                                <input type="text" name="product[]" id="product" class="">
                                            </div>
                                        </td>
                                        <td style="border: 1px solid #a9a5a5;">
                                            <div class="form-group">
                                                <input type="text" name="product_id[]" id="product_id" class="">
                                            </div>
                                        </td>
                                        <td style="border: 1px solid #a9a5a5;">
                                            <div class="form-group">
                                                <input type="text" name="lens_id[]" id="lens_id" class="">  
                                            </div>
                                        </td>
                                        <td style="border: 1px solid #a9a5a5;">
                                            <div class="form-group">
                                                <input type="text" name="lens_name[]" id="lens_name" class="">    
                                            </div>
                                        </td>
                                        <td style="border: 1px solid #a9a5a5;">
                                            <div class="form-group">
                                                <input type="text" name="lens_focal[]" id="lens_focal" class="">
                                            </div>
                                        </td>
                                        <td style="border: 1px solid #a9a5a5;">
                                            <div class="form-group">
                                                <input type="text" name="kr_k1[]" id="kr_k1" class=" ">
                                            </div>
                                        </td>
                                        <td style="border: 1px solid #a9a5a5;">
                                            <div class="form-group">
                                                <input type="text" name="kr_k2[]" id="kr_k2" class="">  
                                            </div>
                                        </td>
                                        <td style="border: 1px solid #a9a5a5;">
                                            <div class="form-group">
                                                <input type="text" name="diaopter[]" id="diaopter" class="">    
                                            </div>
                                        </td>
                                        <td style="border: 1px solid #a9a5a5;">
                                            <div class="form-group">
                                                <input type="text" name="constant[]" id="constant" class="">
                                            </div>
                                        </td>
                                        <td style="border: 1px solid #a9a5a5;">
                                            <div class="form-group">
                                                <input type="text" name="iol_power[]" id="iol_power" class=" ">
                                            </div>
                                        </td>
                                        <td style="border: 1px solid #a9a5a5;">
                                            <div class="form-group">
                                                <input type="text" name="cyl_power[]" id="cyl_power" class="">
                                            </div>
                                        </td>
                                        </tr>                
                                </table>
                            </div>  --> 
                    </div>

                    <!--code of testdetail-->
                    <div class="row">
                                <div class="col-md-12">
                                    <legend>Test Detail </legend>
<hr>
                                    <table class="table table-striped table-bordered text-center" id="testdetail" style="border: 1px solid grey;">
                                        <tr>
                                            <th style="border: 1px solid #a9a5a5;">Action</th>
                                            <th style="border: 1px solid #a9a5a5;">Test</th>
                                             <th style="border: 1px solid #a9a5a5;">Upload file</th>
                                         </tr>

                                         <?php
                                        $test_dt = explode(",", $preot['test_pre']);
                                        $uploaed_pre_dt = explode(",", $preot['uploaed_pre']);
                                        for($i = 0; $i < count($test_dt); $i++) {
                                            ?>
                                      
                                        
                                        <tr>
                                            <td style="border: 1px solid #a9a5a5;">
                                                <button type="button" id='addButton_testdetails' class="btn btn-default addButton_testdetails"><i class="fa fa-plus"></i></button>
                                                <a value="{{$preot->id}}" type="button" id="removetb" class="fa fa-trash"></a>  
                                            </td>
                                            
                                            <td style="border: 1px solid #a9a5a5;">
                                                <div class="form-group">
                                        <select class="form-select " name="test_pre[]"id="test_pre" required>
                                        <?php foreach($test as  $val_member)?>
                                                            <?php echo '<option value="'.$test_dt[$i].'" selected>'.$test_dt[$i].'</option>'; ?>   
                                                            <!-- <option value="Diabetic Status">Diabetic Status</option>
                                        <option value="Cardiac Concern">Cardiac Concern</option>
                                        <option value="ECG">ECG</option>
                                        <option value="Lab Test Required">APHALab Test Required</option>
                                        <option value="RTPCR">RTPCR</option>
                                        <option value="HIV">HIV</option>
                                        <option value="Hepatitis">Hepatitis</option>
                                        <option value="Blood Pressur">Blood Pressure</option>
                                        <option value="A Scan">A Scan</option>
                                        <option value="B Scan">B Scan</option>
                                        <option value="Allergy to Drug">Allergy to Drug</option>
                                        <option value="OCT">OCT</option>
                                        <option value="Syringing">Syringing</option>
                                        <option value="Fundus Examination">Fundus Examination</option> -->
                                        @foreach($posttest as $items)
                                <option value="{{ $items->testpreots }}">{{$items->testpreots}}</option>
                                @endforeach
                                                   
                                        </select> 
                                       <br>
                                                 <a>
                        <button type="button"   class="btn btn-sm  btn-active-primary pull-left showidtest">{{ __('Add')}}</button>
                        </a>


                                               

                        <script>
           $(".showidtest").click(function(){
   
           $("#testmodal").modal('show');
           });
       </script>
                                                 </div>
                                            </td>
                                            <td style="border: 1px solid #a9a5a5;">
                                                <div class="form-group">
                                                <input type="file" name="uploaed_pre[]" value="{{$preot->uploaed_pre}}" id="uploaed_pre" class="form-control upload_document">
                                                <br>
                                             </div>
                                            </td>
                                        </tr>
                                        <?php 
                                    }
                                    ?>   
                                    </table>
                                </div>
                            </div>
                            <!--end testdetail code-->

                            <script src="https://code.jquery.com/jquery-3.6.1.slim.js" integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>
                              <script>
                                  var i=0;
    
    $("#addButton_testdetails").click(function(){
        i++;
      
                                    var html2 =`<tr>
                                            <td style="border: 1px solid #a9a5a5;">
                                                <button type="button" id='remove_testdetail_row' class="btn btn-default remove_testdetail_row"><i class="fa fa-trash"></i></button>
                                            </td>

                                            <td style="border: 1px solid #a9a5a5;">
                                                <div class="form-group">
                                                <select class="form-select" onchange="fetchpreotMulti(${i})" name="test_pre[]" id="test_pre_${i}" "required>
                                                <option value="">--Select Test Type--</option>
                                                @foreach($posttest as $items)
                                <option value="{{ $items->testpreots }}">{{$items->testpreots}}</option>
                                @endforeach
                                    </select> 
                                                   
                                                 <br>
                                               </div>
                                            </td>

                                            <td style="border: 1px solid #a9a5a5;">
                                                <div class="form-group">
                                                <input type="file" name="uploaed_pre[]" id="uploaed_pre_${i}" class="form-control upload_document">
                                                <br>
                                             </div>
                                            </td>

                                           
                                        </tr>`;
                                    $("#testdetail").append(html2);
                                    });

  function fetchpreotMulti(incre_i){
  var pre_fetch_id =  $('#test_pre_'+incre_i).val();
  
  $.ajax({
      url: "{{url('/fetch_preot')}}",
      method:'POST',
      data :{
          "_token": "{{csrf_token()}}",
          id:pre_fetch_id,
      },
      success:function(data){
          if(data)
          {
           
          $('#uploaed_pre__'+incre_i).val(data[0].mrp);
         }
      },
  });
} 
       

                                    

$("#testdetail").on('click','.remove_testdetail_row',function()
                                    {
                                        $(this).closest('tr').remove();
                                        
                                    });
                                    $("#testdetail").on('click','#removetb',function()
                                                                        {

                                                                            var removesql=$(this).val();
                                                                            var ids = $(this).attr("id");
                                                                            //alert(ids)
                                                                            if(confirm("Are you sure you want to delete this?"))  
                                                                            { 
                                                                            // alert(id);
                                                                                $(this).closest('tr').remove();
                                                                                
                                                                            
                                                                            }
                                                            });
  </script>
  <!--script end of hide testdetail-->
 

</div>
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-primary mt-3">save </button>
                        </div>
                </form>
                </div>
            </div>
        </div>


        <div class="modal fade" id="testmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Add Test</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="testpreotthree"></button>
                                        </div>
                                        <div class="modal-body">
                                        <form action="" id="addsubcategory" >                   
                                                {{csrf_field()}}
                                                    <div class="form-group row">
                                                        
                                                         
                                                        
                                                        <div class="col-sm-12">
                                                            <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Add Test:</label>
                                                            <input type="text" class="form-control  testpreots" id="testpreots" name="testpreots"/>

                                                        </div>
                                                       
                                                        <div class="form-group">
                                                               <center><input type="button" value="Save"  class="btn btn-primary mt-3 text-center" onclick="savetest();"></center>
                                                               <!-- <button type="button" class="btn btn-primary mt-3 text-center">Submit</button> -->
                                                            </div>
                                            </form>
                                        </div>
                                       
                                        </div>
                                    </div>
                                </div>
                             </div>

                             <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

<script type="text/javascript">

function savetest(){
  

    let name = $('#testpreots').val();
    url = "{{url('submittestform/')}}/";
    console.log(url);
    // alert(name);
    $.ajax({
      url: url,
      type:"POST",
      data:{
        "_token": "{{ csrf_token() }}",
        testpreots:name,
      },
      success:function(response){
        $('#testpreotthree').click();
        //window.location = "/analysisdoctor/add";
        jQuery('#test_pre').html('');
          for(let i=0;i < response.gettestpreots.length;i++){
            console.log(response.gettestpreots[i].testpreots);
            html = `<option value="${response.gettestpreots[i].testpreots}">${response.gettestpreots[i].testpreots}</option>`;
                    
            jQuery('#test_pre').append(html);
          }
      },
     
      });
   }
  </script>


















   
                            




                           
                   


@endsection







