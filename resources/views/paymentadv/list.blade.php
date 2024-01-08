@extends('layouts.app')
@section('title')
    {{ __('Advance Payment System') }}
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
                <input type="search" id="payment" data-datatable-filter="search" name="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search"/>
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
                        <a href="{{ route('paymentadv.add') }}"
                               class="menu-link px-5">{{ __('Add Advance Payment') }}</a>
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
        <table class="table table-responsive-sm align-middle table-row-dashed fs-6 gy-5 dataTable no-footer w-100" id="paymentmodule">
            <thead>
                <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                    <th>Payment Receipt No</th>
                    <th>Patient Name </th>
                    <th>Date</th> 
                    <th>Amount</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 fw-bold" id="paymentad">
                @foreach($paymentadvs as $data)
                <tr>
                    <td>{{$data->receiptpaymentadv_name}}</td>
                    <td>{{$data->first_name}} {{$data->last_name}}</td>
                
                    <td>{{$data->date}}</td>
                    <td>{{$data->ammount_paymentadv}}</t>
                
                    <td>
                        <a href="{{url('/paymentadv/delete/')}}/{{$data->id}}"><button class="btn"><i class="fa fa-2xs fa-trash"></i></button></a>
                        <a href="{{url('/paymentadv/edit/')}}/{{$data->id}}"><button class="btn"><i class="fa fa-lg  fa-edit"></i></button></a>
                        <a><button type="button"  value="{{$data->id}}" class="btn showidpayment"><i class="fa fa-lg  fa-eye"></i></button></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>        



<!-- <table class="container-wrapper" style="border: 1px solid black;"> -->








<script>
    const = form = document.querySelector("form-group"),
            nextForm = document.querySelector("form-group"),
            backForm = document.querySelector("form-group"),
            allInput = document.querySelector("form-control input");
    allInput.addEventListener("click"=> {
        allInput.for(x==0; x<input; x++){
            if (input.value!=''){
                form.classList.add("form-group adjust_lenght");
            }else{
                form.classList.remove("form-group close_lenght");
                alert("form not work proper")
            }
        }
    })
</script>
        <div class="modal fade"  id="paymentadvss" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content"style="width:70%;">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Advance Payment System</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="card">
                        <div class="card-body shadow border-0">
                            <div class="modal-body">
                                <div style="border: 2px solid black; width:100%;">
                                    <input type="hidden" id="stud_id"/>
                                    <div class='mp text-center' style='font-size:12px;margin:1px;font-family:Times New Roman'>
                                        <div class="form-group col-sm-12 text-center">
                                            <img src = assets/img/logo-red-black.png style="margin-top:2rem;height: 50px;">
                                        </div>
                                    </div><br><br>
                                    <div class="form-group row" style="text-align:left;">&nbsp;&nbsp;              
                                    <div class="form-group col-sm-10" style="width:90%;">
                                         <label for="" class="ms-5 form-label fs-6 fw-bolder text-gray-700" >Patient Name. :</label>
                                        <input type="text" class="form-control secid ms-5" id="patient_full_name"  name="secid" readonly>
                                    </div>
                                    </div><br>
                                    <div class="form-group row" style="text-align: left;" style="">&nbsp;&nbsp;
                                        <div class="form-group col-sm-10" style="width:90%;">
                                             <label for="" class="ms-5 form-label fs-6 fw-bolder text-gray-700">Payment Receipt No :</label>
                                             <input type="text" class="form-control ms-5 paymentname" id="paymentname" value=""  name="paymentname" readonly/>
                                        </div>
                                    </div><br>
                                    <div class="form-group row" style="text-align:left;">&nbsp;&nbsp;    
                                        <div class="form-group col-sm-10" style="width:90%;">
                                            <label for="" class="ms-5 form-label fs-6 fw-bolder text-gray-700">Amount:</label>
                                            <input type="text" class="form-control ms-5 paymentamount" id="paymentamount"  name="paymentamount" value="" readonly/>
                                        </div>
                                    </div><br>
                                    <div class="form-group row" style="text-align:left;">&nbsp;&nbsp;      
                                        <div class="form-group col-sm-10" style="width:90%;">
                                             <label for="" class="form-label ms-5 fs-6 fw-bolder text-gray-700">Date:</label>
                                             <input type="text" class="form-control ms-5 paymentdate" id="paymentdate"  name="paymentdate" value="" readonly/>
                                        </div> 
                                    </div><br><br>    
                                    <div class="form-group row" style="text-align: left;">
                                        <div class="col-sm-12">
                                            <tr>&nbsp;&nbsp;
                                                <td style="border:solid black;border-width:0px 0px 0px 0px;text-align: left;">
                                                    <strong style="">Created By :</strong>
                                                    <span id="adminsign"></span>
                                                </td><br>
                                            <div class="d-flex-justify-content">
                                                <tr>
                                                    <td style="border:solid black;border-width:0px 0px 0px 0px;text-align: left;">
                                                        <strong style="" class="ms-3"> Reporting Time:</strong>
                                                        <span id="timing"></span>
                                                </td>
                                                <tr>
                                                    <td  style="border:solid black;border-width:0px 0px 0px 0px;text-align: right;">
                                                        <strong style="margin-left:7rem;" class="">Authorised Signature</strong>
                                                    </td>
                                                </tr>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer adjust_lenght">
                        <tr>
                            <td>
                                <button onclick="myprints()" class="btn-sm btn-primary">Print</button>
                            </td>
                            <td>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </td>
                        </tr>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>      

  @endsection
<script>
        function myprints()
        {
            window.print();
        }
    </script>
  @section('scripts')
<script src="https://code.jquery.com/jquery-3.6.1.slim.js" integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>
<script type="text/javascript" src="//media.twiliocdn.com/sdk/js/client/v1.3/twilio.min.js"></script>
<script type="text/javascript" src="{{ asset('js/browser-calls.js') }}"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
<script type="text/javascript">
           $(".showidpayment").click(function(){
             
              var id = $(this).val();
   
           $("#paymentadvss").modal('show');
            $.ajax({
            type    :"GET",
            url     :"/paymentadv_data/"+id,
            dataType:"json",
            success :function(res)
            {
                console.log(res[0].patient_full_name);
                $('#patient_full_name').val(res[0].patient_full_name);
               
                $('#paymentname').val(res[0].receiptpaymentadv_name);
                $('#paymentamount').val(res[0].ammount_paymentadv);
                $('#paymentdate').val(res[0].date);
                $("#adminsign").text(res[0].full_name);
                $("#timing").text(res[0].timing);
              }
        });
        
    });
       </script>
        




<script>
        $(document).ready(function () {
            $('#paymentmodule').DataTable({
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
        $("#payment").on("keyup",function(){
           var value = $(this).val().toLowerCase();
           //alert(value);
           $("#paymentad tr").filter(function(){
           $(this).toggle($(this).text().toLowerCase().indexOf(value)>-1);

           });

        });

    });
   </script>
   <!--end search code -->

   
    
@endsection