



@extends('layouts.app')
@section('title')
    {{ __('Security Deposite module') }}
@endsection
@section('page_css')
    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">
@endsection
@section('content')
    @include('flash::message')
    <div class="card">
        <div class="card-header border-0 pt-6">
            <!--search start code -->
        <div>
        <input type="search" id="security" data-datatable-filter="search" name="search" 
               class="form-control form-control-solid w-250px ps-14" placeholder="Search"/>
</div>
<!--serch end code-->
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
                        <a href="{{ route('securitydeposite.add') }}"
                               class="menu-link px-5">{{ __('Add Security Deposite') }}</a>
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
        <table class="table table-responsive-sm align-middle table-row-dashed fs-6 gy-5 dataTable no-footer w-100" id="securitymodule">
    <thead>
    <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
        <th>Receipt No</th>
        <th>Patient Name </th>
        <th>Date</th> 
        <th>Amount</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody class="text-gray-600 fw-bold" id="securitydeposit">
    @foreach($securtiydeposite as $data)
        <tr>
        <td>{{$data->receipt_name}}</td>
        <td>{{$data->first_name}} {{$data->last_name}}</td>
     
        <td>{{$data->date}}</td>
        <td>{{$data->ammount_security}}</td>
       
        <td>
                        
        <a href="{{url('/securitydeposite/delete/')}}/{{$data->id}}">
                        <button class="btn"><i class="fa fa-2xs fa-trash"></i></button>
                        </a>
                       
                        <a href="{{url('/securitydeposite/edit/')}}/{{$data->id}}">
                        <button class="btn"><i class="fa fa-lg  fa-edit"></i></button>
                        </a>

                        <a>
                        <button type="button"  value="{{$data->id}}" class="btn showidsecurity"><i class="fa fa-lg  fa-eye"></i></button>
                        </a>

                       
                </td>
        


        </tr>
        @endforeach
    
    </tbody>
</table>
<div class="modal fade" id="securitydepositess" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Security Deposit</h5>
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
                                    
                                    <td  style="border:solid black;border-width:0px 0px 0px 0px;">
                                        <p><strong>Mr No:</strong> <span id="secid"></span></p>
                                    </td>
                              
                                    <td style="border:solid black;border-width:0px 0px 0px 0px;">
                                        <p><strong style="margin-left:1rem;">Receipt No:</strong> <span id="receiptname"></span></p>
                                    </td>
                                    <td  style="border:solid black;border-width:0px 0px 0px 0px;">
                                        <p><strong>Amount:</strong> <span id="securityamount"></span></p>
                                    </td>
                                    <td  style="border:solid black;border-width:0px 0px 0px 0px;">
                                        <p><strong>Date:</strong> <span id="securitydate"></span></p>
                                    </td>
                                </tr>
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

 <strong> Reporting Time : </strong><span id="timing"></span>
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
<script src="https://code.jquery.com/jquery-3.6.1.slim.js" integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>
<script type="text/javascript" src="//media.twiliocdn.com/sdk/js/client/v1.3/twilio.min.js"></script>
<script type="text/javascript" src="{{ asset('js/browser-calls.js') }}"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
<script type="text/javascript">
           $(".showidsecurity").click(function(){
             
              var id = $(this).val();
   
           $("#securitydepositess").modal('show');
            $.ajax({
            type    :"GET",
            url     :"/securitydepositss_data/"+id,
            dataType:"json",
            success :function(resp)
            {
                console.log(resp[0]);
                $('#secid').text(resp[0].patientsecurity_name);
                $('#receiptname').text(resp[0].receipt_name);
                $('#securityamount').text(resp[0].ammount_security);
                $('#securitydate').text(resp[0].date);
                $("#adminsign").text(resp[0].full_name);
                $("#timing").text(resp[0].timing);
              }
        });
        
    });
       </script>
        




<script>
        $(document).ready(function () {
            $('#securitymodule').DataTable({
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
        $("#security").on("keyup",function(){
           var value = $(this).val().toLowerCase();
           //alert(value);
           $("#securitydeposit tr").filter(function(){
           $(this).toggle($(this).text().toLowerCase().indexOf(value)>-1);

           });

        });

    });
   </script>
   <!--end search code -->

   
        

@endsection















