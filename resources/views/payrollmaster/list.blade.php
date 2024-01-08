@extends('layouts.app')
@section('title')
    {{ __('Payroll') }}
@endsection
@section('page_css')
    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">
@endsection
@section('content')
    @include('flash::message')
    <div class="card">
    <div class="d-flex align-items-center p-5">
    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Payroll Records</h1>
            </div>
        <div class="card-header border-0 pt-6">
            @include('layouts.search-component')
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
                        <a href="{{ route('payrollmaster.create') }}"
                               class="menu-link px-5">{{ __('Add Payroll') }}</a>
                        </div>
                        <div class="menu-item px-5">
                            <a href="{{ route('patient.excel') }}"
                               class="menu-link px-5">{{ __('messages.common.export_to_excel') }}</a>
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
                <table class="table table-responsive-sm align-middle table-row-dashed fs-6 gy-5 dataTable no-footer w-100" id="payrolltb">
                    <thead>
                        <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                     <!--<th>Sr NO</th>-->
                        <th>Payroll Id</th>
                        <th>Month</th>
                        <th>Net Salary</th>
                        <th>Status</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 fw-bold">
                      
                    @foreach($payroll as $item)
                    <tr class="border-top border-light">
                    <!--<td>{{$item->sr_no}}</td>-->
                    <td>{{$item->payrollno}}</td>
                    <td>{{$item->month}}</td>
                    <td>{{$item->net_salary}}</td>
                    <td>{{$item->status }}</td>
                   <td>
                                <a href="{{url('/payrollmaster/edit/')}}/{{$item->id}}">
                                    <button class="btn "><i class="fa fa-lg  fa-edit"></i></button>
                                </a>
                                <a href="{{url('/payrollmaster/delete/')}}/{{$item->id}}">
                                    <button class="btn "><i class="fa fa-lg  fa-trash"></i></button>
                                </a>
                                <a>
                                <button type="button"  value="{{$item->id}}" class="btn showid"><i class="fa fa-lg  fa-eye"></i></button>
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
                        <h5 class="modal-title" id="exampleModalLabel">Employee Salary Slip</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <html>
<head>
<style>
table{
width: 96%;
padding-left: 10px;
padding-right: 10px;
margin-left:15px;
/* margin-right:10px; */
/* border-collapse:1px; */
border: 1px solid black;

}
table td{line-height:20px;padding-left:10px;border:1px}
table th{color:#363636; text-align: center;}
.image {
        width: 150px;
        height: 50px;
        /*border-radius: 50%;*/
      }
</style>

</head>
<body>

<table>

<br>
<tr height="30px" style="background-color:lightpink;color:#ffffff;text-align:center;font-size:20px; font-weight:500;">
<td colspan='6'><img src = assets/img/logo-red-black.png style="margin-top:2rem;"></td>

</tr>
<tr style="background-color:lightpink;"><td colspan='6' style="text-align:center"><b>HMS PVT.LTD.</b></td></tr>
</table>

<br><br>
<table>
  <tr height="30px" style="background-color: powderblue;">
  <td colspan="4" style="text-align:center;font-weight:bold;">Salary Slip</td>
  <td colspan="2" style="text-align:center;font-weight:bold;">
     Month: <p id="payroll_month"></p>
    </td>
</tr>
<tr><td>&nbsp;</td></tr>
<tr>
  <td colspan="2" style="font-weight:bold;">Employee code:<p id="employeesid"></p></td>
  <td colspan="2" style="font-weight:bold;">Department:<p id="employeedepartment"></p></td>
  <td colspan="2" style="font-weight:bold;">Total Present Day:<p id="total_present_day"></p></td>
</tr>
<tr>
  <td colspan="2" style="font-weight:bold;">Employee Name:<p id="employee"></p></td>
   <td colspan="2" style="font-weight:bold;">Payroll Id:<p id="payrollno"></p></td> 
  <td colspan="2" style="font-weight:bold;">Total Absent Day:<p id="total_absent_day"></p></td>
</tr>
<tr><td>&nbsp;</td></tr>
</table>
<br>

<table>
<tr>
  <td><b>Basic:</b></td>
  <td><p id="basic"></p></td>
  <td><b>HRA:</b></td>
  <td><p id="hra"></p></td>
  <td><b>Gross Salary:</td>
  <td><p id="gross_salary"></p></td>
</tr>
<tr>
  <td><b>PF(Employee Contribution):</b></td>
  <td><p id="pf_employee_contro"></p></td>
  <td><b>ESIC:</b></td>
  <td><p id="esic_employee_contro"></p></td>
  <td><b>PT:</b></td>
  <td><p id="pt"></p></td>
</tr>

<tr>
  <td><b>Total Deductions:</b></td>
  <td><p id="total_deduction"></p></td>
  <td><b>Net Salary: </b></td>
  <td><p id="net_salary"></p></td>
  <td><b>Employer Contribution PF:</b></td>
  <td><p id="employer_contro_pf"></p></td>
</tr>

<tr>
  <td><b>Employer Contribution ESIC:</b></td>
  <td><p id="employer_contro_esic"></p></td>
  <td><b>Mediclaim Benefit:</b></td>
  <td><p id="mediclaim_benefit"></p></td>
  <td><b>CTC:</b></td>
  <td><p id="ctc_payroll"></p></td>
</tr>

<tr>
 <!--  <td><b>Month : </b></td>
  <td></td> -->
  <td><b>Total Working Days : </b></td>
  <td><p id="total_working_day"></p></td>
  <td><b>Per Day Salary  :</b></td>
  <td><p id="per_day_salary"></p></td>
  <td><b>Total Present Day : </b></td>
  <td><p id="total_present_day"></p></td>
</tr>
<tr>
  <!-- <td><b>Total Present Day : </b></td>
  <td></td> -->
  <td><b>Total Absent Day : </b></td>
  <td><p id="total_absent_day"></p></td>
  <td><b>Salary  :</b></td>
  <td><p id="salary"></p></td>
   <td><b>conveyance Allowances:</b></td>
  <td><p id="conveyance_allowance"></p> </td>
</tr>

<tr>
 <!--  <td><b>conveyance Allowances : </b></td>
  <td> </td> -->
  <td><b>medical Allowance : </b></td>
  <td><p id="medical_allowance"></p></td>
  <td><b>Rent By Company  :</b></td>
  <td><p id="rent_by_company"></p></td>
   <td><b>Incentiv & Bonus : </b></td>
  <td><p id="incentive_bonus"></p></td>
  
</tr>
<!-- <tr>
  <td><b>Incentiv & Bonus : </b></td>
  <td></td>
</tr> -->
<!-- <tr><td>&nbsp;</td></tr> -->
<tr> 
  <td colspan="6" style="background-color:hsla(9, 100%, 64%, 0.5); text-align: center;"><h4><b>Net Payable: <b></h4></td>
  <td><p id="net_payable"></p></td>
</tr>




<!-- <td>House Rent Allowance</td>
<td></td>
<td>professional tax</td>
<td></td>
</tr>

<tr>
<td>conveyance Allowances</td>
<td></td>
<td>ESIC</td>
<td></td>
</tr>

<tr>
<td>medical Allowance</td>
<td>></td>
<td>Incentive & Bonus</td>
<td></td>
</tr>
<tr>
<td>Gross Earnings</td>
<td></td>
<td>Total Deductions</td>
<td></td>

</tr>
<tr>
<td>NET Pay</td>
<td></td>
<td>CTC</td>
<td></td>
</tr>
</tr> -->

</table>
<!-- <tr>
<th>Employee code:</th>
<td></td>
<th>Name</th>
<td></td>
</tr>
<tr>
<th>Department</th>
<td></td>
<th>Designation</th>
<td></td>
</tr>
<tr>
<th>Total Working Days</th>
<td></td>
<th>No. Of Working Days Attended</th>
<td></td>
</tr>
<tr>
<th>Leaves</th>
<td></td>
<th>Per Day Salary</th>
<td></td>
</tr> -->
<!-- </table> -->
<!-- <tr></tr>
<br/>
<table border="1">
  <tr style="background-color: powderblue;">
  <td colspan="4"><h5 style="text-align:center;font-weight:bold;">This is The Salary Slip Of Month </h5></td>

</tr>
<tr style="background-color:hsla(9, 100%, 64%, 0.5);">
<th> Earnings</th>
<th> Amount</th>
<th> Deductions</th>
<th> Amount</th>
</tr>


<tr>
<td>Basic</td>
<td></td>
<td>provident fund</td>
<td></td>
  </tr>
<tr>

<td>House Rent Allowance</td>
<td></td>
<td>professional tax</td>
<td></td>
</tr>

<tr>
<td>conveyance Allowances</td>
<td></td>
<td>ESIC</td>
<td></td>
</tr>

<tr>
<td>medical Allowance</td>
<td></td>
<td>Incentive & Bonus</td>
<td></td>
</tr>
<tr>
<td>Gross Earnings</td>
<td></td>
<td>Total Deductions</td>
<td></td>

</tr>
<tr>
<td>NET Pay</td>
<td></td>
<td>CTC</td>
<td></td>
</tr>
</tr> -->

</table>
</body>
</html>


                    <div class="modal-body">
                        <input type="hidden" id="stud_id"/>
                        <div class='mp' style='font-size:12px;margin:10px;font-family:Times New Roman'>
                            <div class="row">
                            
                                <table class='table' style='width:91%;margin:0 auto;border-color: black' frame="box">
                                    <tr>
                                    
                                       
                                    </tr>
                                   
                                </table>
    <table class='table' id="newproductList"  style='width:91%;margin:0 auto;border-color: black' frame="box">
            <thead>
                <tr>
               </tr>
            </thead>
            <tbody>
             </tbody>
           </table>
             <div class="modal-footer">
                        <button onclick="myprints()" class="btn-sm btn-primary">Print</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
       
// $(document).ready(function () {  
    $(".showid").click(function(){
   
        
        var id = $(this).val();
        //alert(id);
        // var userURL = $("#url").val();
        // console.log($("#show-user").find('input').val());
            $("#userShowModal").modal('show');
        // var userURL = $(this).data('url');
        
        $.ajax({
            type    :"GET",
            url     :"/fetch_pay_data/"+id,
            dataType:"json",
            success :function(resp)
            {
                console.log(resp[0]);
                $('#payroll_month').text(resp[0].month);
                $('#payrollno').text(resp[0].payrollno);
                $('#employeesid').text(resp[0].employee_id);
                $('#employeedepartment').text(resp[0].employeedepartment);
                $('#total_present_day').text(resp[0].total_present_day);
                $('#employee').text(resp[0].employee);
                //$('#role').text(resp[0].role);
                $('#total_absent_day').text(resp[0].total_absent_day);
                $('#basic').text(resp[0].basic);
                $('#hra').text(resp[0].hra);
                $('#gross_salary').text(resp[0].gross_salary);
                $('#pf_employee_contro').text(resp[0].pf_employee_contro);
                $('#esic_employee_contro').text(resp[0].esic_employee_contro);
                $('#pt').text(resp[0].pt);
                $('#total_deduction').text(resp[0]. total_deduction);
                $('#net_salary').text(resp[0].net_salary);
                $('#employer_contro_pf').text(resp[0].employer_contro_pf);
                $('#employer_contro_esic').text(resp[0].employer_contro_esic);
                $('#mediclaim_benefit').text(resp[0].mediclaim_benefit);
                $('#ctc_payroll').text(resp[0].ctc_payroll);
                $('#total_working_day').text(resp[0].total_working_day);
                $('#per_day_salary').text(resp[0]. per_day_salary);
                $('#total_present_day').text(resp[0].total_present_day);

                $('#total_absent_day').text(resp[0].total_absent_day);
                $('#salary').text(resp[0].salary);
                $('#conveyance_allowance').text(resp[0].conveyance_allowance);
                $('#medical_allowance').text(resp[0].medical_allowance);
                $('#rent_by_company').text(resp[0].rent_by_company);
                $('#incentive_bonus').text(resp[0].incentive_bonus);
                $('#net_payable').text(resp[0].net_payable);
                
                
                 
                
                
                
                

                
                
               
                
                
                
               
                
                
             }
        });
        
    });
    </script>


<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            $('#payrolltb').DataTable({
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
    
@endsection