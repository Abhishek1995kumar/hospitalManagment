@extends('layouts.app')
@section('title')
{{ __('Post OT Master') }}
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
                <a href="{{ route('postot') }}"
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
                    
                <form action="{{url('postot/add')}}" method="post" id="doctoranalysis" name="doctoranalysis">
                    @csrf
                        <div class="row gx-10 mb-5">
                        <div class="col-md-3">
                                        <div class="form-group mb-5">
                                          <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Patient NO :</label>
                                         <select class="form-select" name="post_mr_no" onchange="fetchpostot()" id="post_mr_no"  >
                                                <option value="">--Select Patient No--</option>
                                                @foreach($patientpostot as $items)
                                        <option value="{{ $items->id }}">{{ $items->user_id}}{{'(Patient_00'.$items->id.')'}}</option>
                                        @endforeach
                                         </select>
                                  </div>
                            </div>
<!--script for patient id through patient name-->
                            <script>
                        function fetchpostot(){
                                var post_id =  $('#post_mr_no').val();
                                //alert(post_id);
                                $.ajax({
                                        url: "{{url('/fetchdata_postot')}}",
                                        method:'POST',
                                        data :{
                                            "_token": "{{ csrf_token() }}",
                                            id:post_id,
                                        },
                                        success:function(data){
                                            if(data)
                                            {
                                            // $('#privious_date').val(data[0].created_at);
                                            $('#post_patient_name').val(data[0].first_name);
                                            
                                            
                                            }
                                            
                                        },
                                    });
                                    
                                }
                        </script>
                        <!--script end  for patient id through patient name-->

                            <div class="col-md-3">
                                        <div class="form-group mb-5">
                                            <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Patient Name :</label>
                                            <input type="text" class='form-control' name="post_patient_name"  id="post_patient_name" >  
                                           </div>
                            </div>

                         

                            <div class="col-md-3">
                                        <div class="form-group mb-5">
                                            <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">
                                            Surgeon Name :</label>
                                            <!-- <input class='form-control' name="post_surgeon_name"  id="post_surgeon_name" >   -->

                                            <select class="form-select" name="post_surgeon_name" id="post_surgeon_name"  >
                                                <option value="">--Select Surgeon Name --</option> 
                                @foreach($postotdoctor as $items)
                                <option value="{{ $items->id }}">{{$items->full_name}}</option>
                                @endforeach
                    </select>
                                               
                                       
                                           </div>
                            </div>

                            <div class="col-md-3">
                                        <div class="form-group mb-5">
                                            <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">
                                            Nurse Name :</label>
                                            <!-- <input class='form-control' name="post_surgeon_name"  id="post_surgeon_name" >   -->

                                            <select class="form-select" name="post_nurse_name" id="post_nurse_name"  >
                                                <option value="">--Select Nurse Name --</option> 
                                @foreach($postotnurse as $items)
                                <option value="{{ $items->id }}">{{$items->full_name}}</option>
                                @endforeach
                    </select>
                 </div>
             </div>
                       <!-- <div class="col-md-3">
                                        <div class="form-group mb-5">
                                            <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Eye:</label>
                                            <input class='form-control' name="post_eye"  id="post_eye" >  
                                           </div>
                            </div> -->

                            <!-- <div class="col-md-3">
                                        <div class="form-group mb-5">
                                            <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">
                                             Eye clean By:</label>
                                            <input class='form-control' name="post_clean_by"  id="post_clean_by">  
                                           </div>
                            </div> -->

                              <div class="col-md-3">
                                <div class="form-group mb-5">
                                <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Date:</label>
                                 <input type="date" class="form-control billdate" name="post_date" id="post_date">
                             </div>
                            </div>
                         <hr>

                         <!--code for emergency drug-->
  <div class="row">
                                <div class="col-md-12">
                                    <legend>Details</legend>
                                     <hr>
                                    <table class="table table-striped table-bordered text-center" id="itemedetails" style="border: 1px solid grey;">
                                        <tr>
                                            <th style="border: 1px solid #a9a5a5;">Action</th>
                                            <th style="border: 1px solid #a9a5a5;">Details</th>
                                             <th style="border: 1px solid #a9a5a5;">Remark</th>
                                            
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #a9a5a5;">
                                                <button type="button" id='addButton_details' class="btn btn-default addButton_details"><i class="fa fa-plus"></i></button>
                                            </td>
                                            <td style="border: 1px solid #a9a5a5;">
                                                <div class="form-group">

                                                <select name="post_detailsrange[]" id="post_detailsrange" class="form-control">
                                    <option value="">--Select--</option>
                                    @foreach($postdetail as $items)
                                <option value="{{ $items->detail }}">{{$items->detail}}</option>
                                @endforeach
                                </select> 
                            </div>
                            <br>

                            <a>
                        <button type="button"   class="btn btn-sm  btn-active-primary pull-left showiddetais">{{ __('Add')}}</button>
                        </a>
                           
                         </td>
                         <br>

                         <script>
           $(".showiddetais").click(function(){
   
           $("#detaismodal").modal('show');
           });
       </script>

       

                                            <td style="border: 1px solid #a9a5a5;">
                                                <div class="form-group">
                                                <input type="text" class="form-control post_details_remark" name="post_details_remark[]" id="post_details_remark"  required><br>
                                                </div>
                                            </td>
                                         </tr>
                                    </table>
                                </div>
                            </div>
                            <!--end emergency drug code-->



                           

                  



                   


                    

                    

                    



                   

                   

                    


                   

                    


                    

                    

                    

                   

                   

                   

                    



                          
 <!--code for emergency drug-->
  <div class="row">
                                <div class="col-md-12">
                                    <legend>Emergency Drug</legend>
                                     <hr>
                                    <table class="table table-striped table-bordered text-center" id="itememergencydrug" style="border: 1px solid grey;">
                                        <tr>
                                            <th style="border: 1px solid #a9a5a5;">Action</th>
                                            <th style="border: 1px solid #a9a5a5;">Emergency Drug</th>
                                             <th style="border: 1px solid #a9a5a5;">Remark</th>
                                            
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #a9a5a5;">
                                                <button type="button" id='addButton_drug' class="btn btn-default addButton_drug"><i class="fa fa-plus"></i></button>
                                            </td>
                                            <td style="border: 1px solid #a9a5a5;">
                                                <div class="form-group">

                                                <select name="drug[]" id="drug" class="form-control">
                                    <option value="">--Select Emergency Drug--</option>
                                    @foreach($postdrug as $items)
                                <option value="{{ $items->drug }}">{{$items->drug}}</option>
                                @endforeach
                                </select> 
                            </div>
                            <br>
                            <a>
                        <button type="button"   class="btn btn-sm  btn-active-primary pull-left showiddrug">{{ __('Add')}}</button>
                        </a>
                     </td>

                     <script>
           $(".showiddrug").click(function(){
   
           $("#drugsmodal").modal('show');
           });
       </script>

                                            <td style="border: 1px solid #a9a5a5;">
                                                <div class="form-group">
                                                <input type="text" class="form-control drug_remark" name="drug_remark[]" id="drug_remark" required><br>
                                                </div>
                                            </td>
                                         </tr>
                                    </table>
                                </div>
                            </div>
                            <!--end emergency drug code-->




  <!--code ofOT Consumable List-->
  <div class="row">
                                <div class="col-md-12">
                                    <legend>OT Consumable List</legend>
                                     <hr>
                                    <table class="table table-striped table-bordered text-center" id="itemotcomsumable" style="border: 1px solid grey;">
                                        <tr>
                                            <th style="border: 1px solid #a9a5a5;">Action</th>
                                            <th style="border: 1px solid #a9a5a5;">Product Name</th>
                                             <th style="border: 1px solid #a9a5a5;">Quantity</th>
                                             <th style="border: 1px solid #a9a5a5;">Reusable</th>
                                             <th style="border: 1px solid #a9a5a5;">Price</th>
                                             <th style="border: 1px solid #a9a5a5;">To Be Billed</th>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #a9a5a5;">
                                                <button type="button" id='addButton_ot' class="btn btn-default addButton_ot"><i class="fa fa-plus"></i></button>
                                            </td>
                                            <td style="border: 1px solid #a9a5a5;">
                                                <div class="form-group">
                                                <!-- <input type="text" class="form-control post_product" name="post_product[]" id="post_product" placeholder="Enter Product" required> -->
                                                <select class="form-select post_product " name="post_product[]" id="post_product" required>
                                                <option value="">--Select Product Name --</option> 
                                                @foreach($productpostot as $items)
                
                <option value="{{ $items->id }}">{{ $items->product_name}}</option>
        @endforeach
                                                 </select>
                                                 <br>

                                                </div>
                                               </td>

                                            <td style="border: 1px solid #a9a5a5;">
                                                <div class="form-group">
                                                <input type="text" class="form-control post_quantity" name="post_quantity[]" id="post_quantity" placeholder="Enter Quantity" required><br>
                                                </div>
                                            </td>

                                            <td style="border: 1px solid #a9a5a5;">
                                                <div class="form-group">
                                                <input type="text" class="form-control post_reusable" name="post_reusable[]" id="post_reusable" placeholder="Enter Reusable" required><br>
                                                </div>
                                            </td>
                                            <td style="border: 1px solid #a9a5a5;">
                                                <div class="form-group">
                                                <input type="text" class="form-control post_price" name="post_price[]" id="post_price" placeholder="Enter Post Price" required><br>
                                                </div>
                                            </td>

                                            <td style="border: 1px solid #a9a5a5;">
                                                <div class="form-group">
                                                    <select class="form-select" id="post_tobebilled" name="post_tobebilled[]" id="post_tobebilled" >
                                                    <option value="">--Select--</option>
                                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                   
                                </select> 

                                                   
                                                 </select><br>
                                                </div>
                                            </td>

                                            
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <!--end OT Consumable List  Details code-->






<!--hide table script of ot consumable -->
  <script>
      var i=0;
      
    $("#addButton_ot").click(function(){
        i++;
       
                                    var html2 =`<tr>
                                            <td style="border: 1px solid #a9a5a5;">
                                                <button type="button" id='remove_consummable_row' class="btn btn-default remove_consummable_row"><i class="fa fa-trash"></i></button>
                                            </td>

                                            <td style="border: 1px solid #a9a5a5;">
                                                <div class="form-group">
                                               

                                                <select class="form-select post_product " name="post_product[]" id="post_product_${i}"  onchange="fetchotMulti(${i})"  required>
                                                <option value="">--Select Product Name --</option> 
                                                @foreach($productpostot as $items)
                
                <option value="{{ $items->id }}">{{ $items->product_name}}</option>
        @endforeach
                                                 </select>
                                               





                                                <br>
                                                </div>
                                            </td>

                                            <td style="border: 1px solid #a9a5a5;">
                                                <div class="form-group">
                                                <input type="text" class="form-control post_quantity" name="post_quantity[]" id="post_quantity_${i}" placeholder="Enter Quantity" required><br>
                                                </div>
                                            </td>

                                            <td style="border: 1px solid #a9a5a5;">
                                                <div class="form-group">
                                                <input type="text" class="form-control post_reusable" name="post_reusable[]" id="post_reusable_${i}" placeholder="Enter Reusable" required><br>
                                                </div>
                                            </td>
                                            <td style="border: 1px solid #a9a5a5;">
                                                <div class="form-group">
                                                <input type="text" class="form-control post_price" name="post_price[]" id="post_price_${i}" placeholder="Enter Post Price" required><br>
                                                </div>
                                            </td>

                                            <td style="border: 1px solid #a9a5a5;">
                                                <div class="form-group">
                                                    <select class="form-select" id="post_tobebilled" name="post_tobebilled[]" id="post_tobebilled_${i}" >
                                                    <option value="">--Select--</option>
                                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                                   
                                                 </select><br>
                                                </div>
                                            </td>

                                           
                                        </tr>`;
                                    $("#itemotcomsumable").append(html2);
                                    });


                                     //multi td script of surgery details//
                                     function fetchotMulti(incre_i){
                                               
                                               // $("#payment_paymode_").change(function(incre_i){
                                                 var postproductid = $('#post_product_'+incre_i).val();
                                                 console.log(postproductid);
                                               // var payment_paymode= $(this).val();
                                              
                                              
                                                 $.ajax({
                                                   type:"GET",
                                                   url:"{{url('fetch_ot')}}?category="+postproductid,
                                                   success:function(res){        
                                                   
                                                   }
                                                 });
                                               
}
 //end multi td script of ot consumable //
                            $("#itemotcomsumable").on('click','.remove_consummable_row',function()
                                    {
                                        $(this).closest('tr').remove();
                                        
                                    });
  </script>
  <!--script end of hide surgery details-->


  <!--hide table script of ot consumable -->
  <script>
     var i=0;
      
      
    $("#addButton_drug").click(function(){
        i++;
      
       
                                    var html2 =`<tr>
                                            <td style="border: 1px solid #a9a5a5;">
                                                <button type="button" id='remove_drug_row' class="btn btn-default remove_drug_row"><i class="fa fa-trash"></i></button>
                                            </td>

                                            <td style="border: 1px solid #a9a5a5;">
                                                <div class="form-group">

                                                <select name="drug[]" id="drug_${i}"  onchange="fetchdrugMulti(${i})" class="form-control">
                                                @foreach($postdrug as $items)
                                <option value="{{ $items->drug }}">{{$items->drug}}</option>
                                @endforeach
                                </select> 
                            </div>
                         </td>

                                            <td style="border: 1px solid #a9a5a5;">
                                                <div class="form-group">
                                                <input type="text" class="form-control drug_remark" name="drug_remark[]" id="drug_remark_${i}"  required><br>
                                                </div>
                                            </td>

                                           
                                        </tr>`;
                                    $("#itememergencydrug").append(html2);
                                    });


                                     //multi td script of surgery details//
                                     function fetchdrugMulti(incre_i){
                                               
//                                                // $("#payment_paymode_").change(function(incre_i){
                                                 var postdrugid = $('#drug_'+incre_i).val();
                                                 console.log(postdrugid);
//                                                // var payment_paymode= $(this).val();
                                              
                                              
                                                 $.ajax({
                                                   type:"GET",
                                                   url:"{{url('fetch_drug')}}?category="+postdrugid,
                                                   success:function(res){        
                                                   
                                                   }
                                                 });
                                               
 }
 //end multi td script of ot consumable //


                                    
 

                                    $("#itememergencydrug").on('click','.remove_drug_row',function()
                                    {
                                        $(this).closest('tr').remove();
                                        
                                    });
  </script>
  <!--script end of hide surgery details-->


  
  <!--hide table script of ot consumable -->
  <script>
  
  var i=0;
      
    $("#addButton_details").click(function(){
        i++;
     
       
                                    var html2 =`<tr>
                                            <td style="border: 1px solid #a9a5a5;">
                                                <button type="button" id='remove_details_row' class="btn btn-default remove_details_row"><i class="fa fa-trash"></i></button>
                                            </td>

                                            <td style="border: 1px solid #a9a5a5;">
                                                <div class="form-group">

                                                <select name="post_detailsrange[]"  onchange="fetchdetailsMulti(${i})" id="post_detailsrange_${i}" class="form-control">
                                    <option value="">--Select--</option>
                                    @foreach($postdetail as $items)
                                <option value="{{ $items->detail }}">{{$items->detail}}</option>
                                @endforeach
                                </select> 
                            </div>
                         </td>


                         <td style="border: 1px solid #a9a5a5;">
                                                <div class="form-group">
                                                <input type="text" class="form-control post_details_remark" name="post_details_remark[]" id="post_details_remark_${i}"  required><br>
                                                </div>
                                            </td>
                                           
                                        </tr>`;
                                    $("#itemedetails").append(html2);
                                    });

                                    //multi td script of surgery details//
                                     function fetchdetailsMulti(incre_i){
                                               
//                                                // $("#payment_paymode_").change(function(incre_i){
                                                 var postdetailsid = $('#post_detailsrange'+incre_i).val();
                                                 console.log(postdetailsid);
//                                                // var payment_paymode= $(this).val();
                                              
                                              
                                                 $.ajax({
                                                   type:"GET",
                                                   url:"{{url('fetch_details')}}?category="+postdetailsid,
                                                   success:function(res){        
                                                   
                                                   }
                                                 });
                                               
 }
 //end multi td script of ot consumable //




                                    


                                    
 

                                    $("#itemedetails").on('click','.remove_details_row',function()
                                    {
                                        $(this).closest('tr').remove();
                                        
                                    });
  </script>
  <!--script end of hide surgery details-->




  <div class="row">
                                <div class="col-md-12">
                                    <legend>Reporting </legend>
<hr>
</div></div>

                          <div class="col-md-3">
                                <div class="form-group mb-5">
                                <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Incident Reporting</label> 
                                <br>
                                        <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Remark:</label>
                                         <input type="text" name="post_incident_remark" id="post_incident_remark" class="form-control" required>

                                 </div>
                            </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <div class="col-md-3">
                                <div class="form-group mb-5">
                                <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">OT Conduct</label> 
                                <br>
                                        <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Remark:</label>
                                         <input type="text" name="post_otconduct_remark" id="post_otconduct_remark" class="form-control" required>

                                 </div>
                            </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


                            <div class="col-md-3">
                                <div class="form-group mb-5">
                                <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Doctor's Note</label> 
                                <br>
                                        <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Remark:</label>
                                         <input type="text" name="post_doctornote_remark" id="post_doctornote_remark" class="form-control" required>

                                 </div>
                            </div>
                           
                            
  <div class="row">
                                <div class="col-md-12">
                                    <legend> Post OT check </legend>
<hr>
</div></div>


                           <div class="col-md-3">
                                <div class="form-group mb-5">
                                <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">BP:</label>
                                         <input type="text" name="post_bloodpresure" id="post_bloodpresure" class="form-control" required>

                                 </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group mb-5">
                                <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">SPO2:</label>
                                         <input type="text" name="post_spotwos" id="post_spotwos" class="form-control" required>

                                 </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group mb-5">
                                <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Heart Rate:</label>
                                         <input type="text" name="post_heartrate" id="post_heartrate" class="form-control" required>

                                 </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group mb-5">
                                <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Follow Up Date for Counsellor:</label>
                                <input type="date" class="form-control ocular_history companyname12" id="" name="post_followupdatecoun" name="post_followupdatecoun"  placeholder="" value="<?php echo date('Y-m-d')?>">
                                    </div>
                                </div>
                            

                            <div class="col-md-3">
                                <div class="form-group mb-5">
                                <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Follow Up Date for Doctor:</label>
                                <input type="date" class="form-control ocular_history companyname12" id="" name="post_followupdatedoctor" name="post_followupdatedoctor"  placeholder="" value="<?php echo date('Y-m-d')?>">
                                         </div>
                                        </div>
                            

                           


                            <div class="col-md-3">
                                <div class="form-group mb-5">
                                <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Discharge:</label>
                                <input type="text" name="discharge" id="discharge" class="form-control" required> </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group mb-5">
                                <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Dos and Don'ts:</label>
                                         <input type="text" name="doesdonts" id="doesdonts" class="form-control" required>
                                    </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group mb-5">
                                <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Post Ot Medication:</label>
                                         <input type="text" name="postotmedication" id="postotmedication" class="form-control" required>

                                 </div>
                            </div>
                            </div>
                            </div>

                   
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-primary mt-3">save </button>
                        </div>
                   </form>
                </div>
            </div>
        </div>


        <!--Popup code of investigation-->

  <div class="modal fade" id="detaismodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Add Details</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="detaisthree"></button>
                                        </div>
                                        <div class="modal-body">
                                        <form action="" id="addsubcategory" >                   
                                                {{csrf_field()}}
                                                    <div class="form-group row">
                                                        
                                                         
                                                        
                                                        <div class="col-sm-12">
                                                            <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Add Info:</label>
                                                            <input type="text" class="form-control  info" id="info" name="detail"/>

                                                        </div>
                                                       
                                                        <div class="form-group">
                                                               <center><input type="button" value="Save"  class="btn btn-primary mt-3 text-center" onclick="saveinfo();"></center>
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

function saveinfo(){
  

    let name = $('#info').val();
    url = "{{url('submitdetailsform/')}}/";
    console.log(url);
    // alert(name);
    $.ajax({
      url: url,
      type:"POST",
      data:{
        "_token": "{{ csrf_token() }}",
        detail:name,
      },
      success:function(response){
        $('#detaisthree').click();
        //window.location = "/analysisdoctor/add";
        jQuery('#post_detailsrange').html('');
          for(let i=0;i < response.getdetail.length;i++){
            console.log(response.getdetail[i].detail);
            html = `<option value="${response.getdetail[i].detail}">${response.getdetail[i].detail}</option>`;
                    
            jQuery('#post_detailsrange').append(html);
          }
      },
     
      });
   }
  </script>



 <!--Popup code of investigation-->

 <div class="modal fade" id="drugsmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Add Drug</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="drugthree"></button>
                                        </div>
                                        <div class="modal-body">
                                        <form action="" id="addsubcategory" >                   
                                                {{csrf_field()}}
                                                    <div class="form-group row">
                                                        
                                                         
                                                        
                                                        <div class="col-sm-12">
                                                            <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Add Drug:</label>
                                                            <input type="text" class="form-control drugone" id="drugone" name="drugone"  />

                                                        </div>
                                                       
                                                        <div class="form-group">
                                                               <center><input type="submit" value="Save"  class="btn btn-primary mt-3 text-center" onclick="savedrug();"></center>
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

function savedrug(){
  

    let name = $('#drugone').val();
    url = "{{url('submitdrugform/')}}/";
    console.log(url);
    // alert(name);
    $.ajax({
      url: url,
      type:"POST",
      data:{
        "_token": "{{ csrf_token() }}",
        drug:name,
      },
      success:function(response){
        $('#drugthree').click();
        //window.location = "/analysisdoctor/add";
        jQuery('#drug').html('');
          for(let i=0;i < response.getdrug.length;i++){
            console.log(response.getdrug[i].drug);
            html = `<option value="${response.getdrug[i].drug}">${response.getdrug[i].drug}</option>`;
                    
            jQuery('#drug').append(html);
          }
      },
     
      });
   }
  </script>

   @endsection







