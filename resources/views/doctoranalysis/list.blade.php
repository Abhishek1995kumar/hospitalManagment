list page 



@extends('layouts.app')
@section('title')
    {{ __('Doctor Analysis') }}
@endsection
@section('page_css')
    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">
@endsection
@section('content')
    @include('flash::message')
    <div class="card">
      <div class="d-flex align-items-center p-5">
    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Doctor Analysis Records</h1>
            </div>
        <div class="card-header border-0 pt-6">
           <!--State code serch-->
<div>
        <input type="search" id="docana" data-datatable-filter="search" name="search" 
               class="form-control form-control-solid w-250px ps-14" placeholder="Search"/>
</div>
<!--end code serch -->
            <div class="card-toolbar">
                <div class="d-flex align-items-center py-1">
                    <div class="me-4">
                        <a href="#" class="btn btn-flex btn-light-primary fw-bolder"
                           data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
                            <span class="svg-icon svg-icon-5 svg-icon-gray-500 me-1">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                     viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"></rect>
                                        <path
                                            d="M5,4 L19,4 C19.2761424,4 19.5,4.22385763 19.5,4.5 C19.5,4.60818511 19.4649111,4.71345191 19.4,4.8 L14,12 L14,20.190983 C14,20.4671254 13.7761424,20.690983 13.5,20.690983 C13.4223775,20.690983 13.3458209,20.6729105 13.2763932,20.6381966 L10,19 L10,12 L4.6,4.8 C4.43431458,4.5790861 4.4790861,4.26568542 4.7,4.1 C4.78654809,4.03508894 4.89181489,4 5,4 Z"
                                            fill="#000000"></path>
                                    </g>
                                </svg>
                            </span>
                            {{ __('messages.common.filter') }}</a>
                        <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true"
                             id="kt_menu_6113c71822d0d">
                            <div class="px-7 py-5">
                                <div class="fs-5 text-dark fw-bolder">{{ __('messages.common.filter_options') }}</div>
                            </div>
                            <div class="separator border-gray-200"></div>
                            <div class="px-7 py-5">
                           
                                <div class="d-flex justify-content-end">
                                    <button type="reset" class="btn btn-sm fs-6 btn-light btn-active-light-primary me-2"
                                            id="resetFilter"
                                            data-kt-menu-dismiss="true">{{ __('messages.common.reset') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="#" class="btn btn-primary ps-7 show menu-dropdown" data-kt-menu-trigger="click"
                       data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end"
                       data-kt-menu-flip="bottom">{{ __('messages.common.actions') }}
                        <span class="svg-icon svg-icon-2 me-0">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                             xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                             height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none"
                                                               fill-rule="evenodd">
                                                                <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                                <path
                                                                    d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z"
                                                                    fill="#000000" fill-rule="nonzero"
                                                                    transform="translate(12.000003, 11.999999) rotate(-180.000000) translate(-12.000003, -11.999999)"></path>
                                                            </g>
                                                        </svg>
                                                    </span>
                    </a>
                    <div
                        class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold py-4 w-200px fs-6"
                        data-kt-menu="true">
                        <div class="menu-item px-5">
                        <a href="{{ route('analysisdoctor.add') }}"
                               class="menu-link px-5">{{ __('Add Doctor Analysis') }}</a>
                        </div>
                      
                    </div>
                </div>
            </div>
            @if(Session::has('msg'))
            <div class="col-12">
                    <div class="alert alert-success">{{Session::get('msg')}}</div>
                </div>
            @endif
        </div>






        <div class="card-body pt-0 fs-6 py-8 px-8  px-lg-10 text-gray-700">
        <table class="table table-responsive-sm align-middle table-row-dashed fs-6 gy-5 dataTable no-footer w-100" id="doctoranalysis">
    <thead>
    <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
        <th>MR ID</th>
        <th>Doctor Date </th>
        <!-- <th>Doctor Name</th> -->
        <th>Patient Name</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody class="text-gray-600 fw-bold" id="doctoranalysiss">
    @foreach($doctoranalysis as $data)
        <tr>
        <td>{{'Patient_00'.$data->patient_id.''}}</td>
        
        <td>{{$data->date_doctoranalysis}}</td>
        <td>{{$data->patient_name}}</td>
       
        <td>
                        <a href="{{url('/analysisdoctor/delete/')}}/{{$data->id}}">
                        <button class="btn "><i class="fa fa-2xs fa-trash"></i></button>
                        </a>
                        <a href="{{url('/analysisdoctor/edit/')}}/{{$data->id}}">
                        <button class="btn   "><i class="fa fa-lg  fa-edit"></i></button>
                        </a>
                        <!-- <a href="{{url('/pharma/viewmodel/')}}/{{$data->id}}">
                        <button class="btn btn-primary">view</button>
                        </a> -->
                        
                        <!-- safe -->
                        <!-- <button type="button" value="{{$data->id}}" class="btn btn-primary showid  btn-lg" >show</button> -->
                        <a>
                        <button type="button"  value="{{$data->id}}" class="btn showid"><i class="fa fa-lg  fa-eye"></i></button>
                        </a>
                </td>
        


        </tr>

        @endforeach
    </tbody>
</table>

    <div class="modal fade" id="userShowModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Doctor Analysis Records</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="stud_id"/>
                    <div class='mp' style='font-size:12px;margin:10px;font-family:Times New Roman'>
                        <div class="row">
                            <table class='table' style='width:91%;margin:0 auto;border-color: black' frame="box">
                                <tr>
                                    <td colspan="2" style="border:solid black;border-width:1px 1px 1px 1px;padding:  2px;">
                                        <img src = assets/img/logo-red-black.png style="margin-top:2rem;">
                                    </td>
                                    <td colspan="2" style="border:solid black;border-width:1px 1px 1px 1px;padding:  2px;">
                                        <p style="text-align: center;border:solid black;border-width:0px 0px 0px 0px;padding: 0px;margin: 0px;">
                                            <font size="5"><b>HMS PVT.LTD.</b></font><br/>
                                            <font size="3">(UNIT OF HMS  PVT.LTD.)</font><br/>
                                            <font size="2">Flat No 156, 157, 158 & Flat No 154, 155, 1st Floor, D Wing, Kasturi Plaza, Manpada Road,Dombivli, Maharashtra, 421201, IndiaTelephone No:9324999941GST No:27AAACC6606P1ZDDrug & Lic. No.:MH-TZ6-445865, MH-TZ6-445866, MH-TZ6-445867</font>
                                        </p>
                                    </td>
                                </tr>
                            </table>
                            <table class='table' style='width:91%;margin:0 auto;border-color: black' frame="box">
                                <tr>
                                    <td style="border:solid black;border-width:0px 0px 0px 0px;"> 
                                        <p><strong style="margin-left:1rem;">Doctor Analysis Date:</strong> <span id="date_doctoranalysis"></span></p>
                                    </td>
                                    <td style="border:solid black;border-width:0px 0px 0px 0px;">            
                                        <p><strong>MR Date:</strong> <span id="privious_date"></span></p>
                                    </td>
                                    <td  style="border:solid black;border-width:0px 0px 0px 0px;">
                                        <p><strong>Mr No:</strong> <span id="patient_id"></span></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border:solid black;border-width:0px 0px 0px 0px;">
                                        <p><strong style="margin-left:1rem;">Patient Name:</strong> <span id="patient_name"></span></p>
                                    </td>
                                    <td  style="border:solid black;border-width:0px 0px 0px 0px;">
                                        <p><strong>Patient Category:</strong> <span id="patient_category"></span></p>
                                    </td>
                                    <td  style="border:solid black;border-width:0px 0px 0px 0px;">
                                        <p><strong>Follow Up Date:</strong> <span id="followup_date"></span></p>
                                    </td>
                                </tr>
                            </table>
                            <table class='table' id="pharmaproductlist" style='width:91%;margin:0 auto;border-color: black;padding: 0px;' frame="box" >
                            <h1 class="text-center">Further Investigation Recommendation</h1>
                                <thead>
                                    <tr>
                                        <th class='text-center' style="border:solid black;border-width:1px 1px 1px 1px;width: 10%;">
                                            SR.No
                                        </th>
                                        <th  class='text-center' style="border:solid black;border-width:1px 1px 1px 1px;width:20%;">
                                           Investigation For
                                        </th>
                                        <th  class='text-center' style="border:solid black;border-width:1px 1px 1px 1px;width: 10%;">
                                           Investigation
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                <tr>
                                        <td colspan="7" style="border-top:1px solid black;">
                                             <p><strong>Doctor Advice : </strong><span id="doctor_advice"></span></p>
                                        </td>
                                 
                                  
                                    
                                </tfoot>
                                   
                            </table>
                            <table class='table' id="medicineonelist" style='width:91%;margin:0 auto;border-color: black;padding: 0px;' frame="box">
                                <h1 class="text-center">Medicine</h1>
                                <thead>
                                                <tr>
                                                        <th class='text-center' style="border:solid black;border-width:1px 1px 1px 1px;">
                                                        Medicine
                                                        </th>
                                                        <th class='text-center' style="border:solid black;border-width:1px 1px 1px 1px;">
                                                          Quantity
                                                        </th>
                                                        <th  class='text-center' style="border:solid black;border-width:1px 1px 1px 1px;">
                                                           No of Days
                                                        </th>
                                                        <th class='text-center' style="border:solid black;border-width:1px 1px 1px 1px;">
                                                           Dose
                                                        </th>
                                                </tr>
                                </thead>
                                <tbody>
                                                <!-- <tr>
                                                        <td class='text-center' style="border:solid black;border-width:1px 1px 1px 1px;">
                                                            <span id="payment_paymode"></span>
                                                        </td>
                                                        <td class='text-center' style="border:solid black;border-width:1px 1px 1px 1px;">
                                                            <span id="paymentdate"></span>
                                                        </td>
                                                        <td class='text-center' style="border:solid black;border-width:1px 1px 1px 1px;">
                                                            <span id="paymentremark"></span> 
                                                        </td>
                                                        <td class='text-center' style="border:solid black;border-width:1px 1px 1px 1px;">
                                                            <span id="amount"></span>
                                                        </td>
                                                </tr> -->

                                </tbody>
                                <tfoot>
                                        <table class='table'  style='width:91%;margin:0 auto;border-color: black;padding: 0px; margin-top:2rem;'  >

<tbody>
<tr>


 <td colspan="3" class='text-left mt-2' style="border:solid black;border-width:0px 0px 0px 0px;">
 <strong> Created By : </strong><span id="adminsign"></span>
 </td>
 

</tr>

<tr>
 <td colspan="6" class='text-left' style="border:solid black;border-width:0px 0px 0px 0px;">

 <strong> Reporting Time : </strong><span>{{ now()->toTimeString() }}</span>
</td>

<td colspan="6" class='text-right' style="border:solid black;border-width:0px 0px 0px 0px;">
     <strong style="margin-left:20rem;">  Authorised Signatory </strong>
 </td>


</tr>

</tbody>
</table>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button onclick="myprints()" class="btn-sm btn-primary">Print</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
        </div>
    </div>
        
</div>
        

@endsection

@section('scripts')
<script>
        function myprints()
        {
            window.print();
        }
    </script>

<script src="https://code.jquery.com/jquery-3.6.1.slim.js" integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>
<script type="text/javascript" src="//media.twiliocdn.com/sdk/js/client/v1.3/twilio.min.js"></script>
<script type="text/javascript" src="{{ asset('js/browser-calls.js') }}"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
<script type="text/javascript">
       
$(document).ready(function () {  
    $(".showid").click(function(){
   
        
        var id = $(this).val();
        // alert(id);
       
            $("#userShowModal").modal('show');
        // var userURL = $(this).data('url');
        
        $.ajax({
            type    :"GET",
            url     :"/investigation/"+id,
            dataType:"json",
            success :function(response){
                console.log(response);
     
                if(response.status == "200"){
                    $("#pharmaproductlist tbody").html('');
                    let investigation_for = response.data.investigation_for;
                    let pro_array = investigation_for.split(",");
                    let investigation_array = response.data.investigation.split(",");
                    let count = pro_array.length;
                    console.log(response.data);
                    for(let i=0; i<pro_array.length; i++){
                        let html_row = `<tr>
                                            <td class='text-center' style="border:solid black;border-width:1px 1px 1px 1px;">
                                            <p><span id="id">${count}</span></p>
                                            </td>
                                            <td  class='text-center' style="border:solid black;border-width:1px 1px 1px 1px;">
                                                <p><span id="pr_name">${pro_array[i]}</span></p>   
                                            </td>
                                        
                                            <td class='text-center' style="border:solid black;border-width:1px 1px 1px 1px;">
                                                <p><span id="investigation">${investigation_array[i]}</span></p>     
                                            </td>
                                        </tr>`;
                                   
                                    $("#pharmaproductlist tbody").prepend(html_row);
                                    count--;
                    }
                  
                    //$("#patient_name").text(response.data.first_name + " " + response.data.last_name)
                   // $("#doctor_name").text(response.data[0].df_name + " " + response.data[0].dl_name)
                    $("#date_doctoranalysis").text(response.data.date_doctoranalysis)
                    $("#privious_date").text(response.data.privious_date)
                    $("#patient_id").text(response.data.patient_id)
                    $("#patient_name").text(response.data.patient_name)
                   
                    $("#patient_category").text(response.data.patient_category)
                    $("#followup_date").text(response.data.followup_date)
                    $("#investigation_for").text(response.data.investigation_for)
                    $("#investigation").text(response.data.investigation)
                    // $("#medicine").text(response.data.medicine)
                    // $("#quantity").text(response.data.quantity)
                    // $("#no_of_days").text(response.data.no_of_days)
                    $("#id").text(response.data.id)
                    // $("#dose").text(response.data.dose)
                    $("#doctor_advice").text(response.data.doctor_advice)

                    
                 }else{
                    alert("fail");
                }
            }
        });
        
    });
    
});
</script>

<!--script for medicine table -->
 <script type="text/javascript">
       
$(document).ready(function () {  
    $(".showid").click(function(){
   
        
        var id = $(this).val();
        // alert(id);
       
            $("#userShowModal").modal('show');
        // var userURL = $(this).data('url');
        
        $.ajax({
            type    :"GET",
            url     :"/medicinetable/"+id,
            dataType:"json",
            success :function(response){
                console.log(response);
     
                if(response.status == "200"){
                    $("#medicineonelist tbody").html('');
                    let medicine = response.data.medicine;
                    let medicine_array = medicine.split(",");
                    let quatity_array = response.data.quantity.split(",");
                    let no_of_days_array = response.data.no_of_days.split(",");
                    let dose_array = response.data.dose.split(",");

                    let count = medicine_array.length;
                   // console.log(response.data);
                    for(let i=0; i<medicine_array.length; i++){
                        let html_row2 = `<tr>
                                            <td class='text-center' style="border:solid black;border-width:1px 1px 1px 1px;">
                                            <p><span id="id">${medicine_array}</span></p>
                                            </td>
                                            <td  class='text-center' style="border:solid black;border-width:1px 1px 1px 1px;">
                                                <p><span id="pr_name">${quatity_array[i]}</span></p>   
                                            </td>
                                        
                                            <td class='text-center' style="border:solid black;border-width:1px 1px 1px 1px;">
                                                <p><span id="investigation">${no_of_days_array[i]}</span></p>     
                                            </td>

                                            <td class='text-center' style="border:solid black;border-width:1px 1px 1px 1px;">
                                                <p><span id="investigation">${dose_array[i]}</span></p>     
                                            </td>
                                        </tr>`;
                                   
                                    $("#medicineonelist tbody").prepend(html_row2);
                                    count--;
                    }
                  
                  
                     $("#medicine").text(response.data.medicine)
                     $("#quantity").text(response.data.quantity)
                    $("#no_of_days").text(response.data.no_of_days)
                     $("#dose").text(response.data.dose)
                    $("#adminsign").text(response.data.full_name)
                     $("#timing").text(response.data.timing)
                    
                 }else{
                    alert("fail");
                }
            }
        });
        
    });
    
});
</script> 
<!--script end of medicine-->

@endsection
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            $('#doctoranalysis').DataTable({
				scrollX: true,
                "searching": false,
                pageLength : 5,
				dom: 'Blfrtip',
                buttons: [
                   {
                        extend: 'excelHtml5',
                        footer: true,
                        exportOptions: {
                            
                       }
                    }
                ],
                processing : true,
                order: [[0, 'desc']]
            });
        });
    </script>

<!--script for serch box-->
   <script type="text/javascript">
    $(document).ready(function(){
        $("#docana").on("keyup",function(){
           var value = $(this).val().toLowerCase();
           //alert(value);
           $("#doctoranalysiss tr").filter(function(){
           $(this).toggle($(this).text().toLowerCase().indexOf(value)>-1);

           });

        });

    });
   </script>
   <!--end search code -->














