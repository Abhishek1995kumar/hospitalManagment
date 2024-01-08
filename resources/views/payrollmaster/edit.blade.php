@extends('layouts.app')
@section('title')
    {{ __('Payroll') }}
    @endsection
@section('page_css')
    <link rel="stylesheet" href="{{ asset('assets/css/int-tel/css/intlTelInput.css') }}">
    <style>
        a { text-decoration:None; }
        .form-control { 
            width:100%;
            padding: 0.20rem 0.70rem; 
            border: 1px solid #a1a5b7; 
            border-radius:4px;
        }
    </style>
@endsection
@section('header_toolbar')
    <div class="toolbar" id="kt_toolbar">
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                 data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                 class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Edit Payroll</h1>
            </div>
            <div class="d-flex align-items-center py-1">
                <a href="{{ route('payrollmaster')}}"
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
                    <form action="{{url('payrollmaster/edit/'.$payroll->id)}}" method="post" id="updateproductmaster" name="updateproductmaster">
                        @csrf
                        <div class="row gx-10 mb-5">
                            <div class="col-lg-3 pe-0">
                                <div class="form-group mb-5">
                                    <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-1">Payroll Id::</label>
                                    <input type="text" name="payrollno" id="payrollno" class="form-control" value="{{$payroll->payrollno}}" readonly> 
                                </div>
                            </div>
                            <div class="col-lg-3 pe-0">
                                <div class="form-group mb-5">
                                    <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-1">Employee Id:</label>
                                    <input type="text" name="employee_id" id="employee_id" class="form-control"  value="{{$payroll->employee_id}}">
                                </div>
                            </div>
                            <div class="col-lg-3 pe-0">
                                <div class="form-group mb-5">
                                    <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-1">Employee Name:</label>
                                    <input type="text" name="employee" id="employee" class="form-control"  value="{{$payroll->employee}}"> 
                                </div>
                            </div>
                            <div class="col-lg-3 pe-0">
                                <div class="form-group mb-5">
                                    <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-1">Employee Department:</label>
                                    <input type="text" name="employeedepartment" id="employeedepartment" class="form-control" value="{{$payroll->employeedepartment}}"> 
                                </div>
                            </div>
                            <div class="col-lg-3 pe-0">
                                <div class="form-group mb-5">
                                    <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-1">Status:</label>
                                    <input type="text" name="status" id="status" class="form-control" value="{{$payroll->status}}" >  
                                </div>
                            </div>
                            <div class="col-lg-3 pe-0">
                                <div class="form-group mb-5">
                                    <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-1">Basic:</label>
                                    <input type="text" name="basic" id="basic" class="form-control"  value="{{$payroll->basic}}">     
                                </div>
                            </div>
                            <div class="col-lg-3 pe-0">
                                <div class="form-group mb-5">
                                    <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-1">HRA:</label>
                                    <input type="text" name="hra" id="hra" class="form-control" value="{{$payroll->hra}}"> 
                                </div>
                            </div>
                            <div class="col-lg-3 pe-0">
                                <div class="form-group mb-5">
                                    <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-1">Gross Salary:</label>
                                    <input type="text" name="gross_salary" id="gross_salary" class="form-control" value="{{$payroll->gross_salary}}">   
                                </div>
                            </div>
                            <div class="col-lg-3 pe-0" style="margin-top:1.5rem;">
                                <div class="form-group mb-5">
                                    <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-1">PF (Employee Contribution):</label>
                                    <input type="text" name="pf_employee_contro" id="pf_employee_contro" class="form-control" value="{{$payroll->pf_employee_contro}}" >     
                                </div>
                            </div>
                            <div class="col-lg-3 pe-0" style="margin-top:1.5rem;">
                                <div class="form-group mb-5">
                                    <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-1">ESIC (Employee Contribution):</label>
                                    <input type="text" name="esic_employee_contro" id="esic_employee_contro" class="form-control" value="{{$payroll->esic_employee_contro}}">   
                                </div>
                            </div>      
                            <div class="col-lg-3 pe-0" style="margin-top:1.5rem;">
                                <div class="form-group mb-5">
                                    <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-1">Professional Tax:</label>
                                    <input type="text" name="pt" id="pt" class="form-control" value="{{$payroll->pt}}">    
                                </div>
                            </div>      
                            <div class="col-lg-3 pe-0" style="margin-top:1.5rem;">
                                <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-1">Total Deductions:</label>
                                <input type="text" name="total_deduction" id="total_deduction" class="form-control" value="{{$payroll->total_deduction}}">   
                            </div>      
                            <div class="col-lg-3 pe-0" style="margin-top:1.5rem;">
                                <div class="form-group mb-5">
                                    <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-1">Net Salary:</label>
                                    <input type="text" name="net_salary" id="net_salary" class="form-control"  value="{{$payroll->net_salary}}">     
                                </div>
                            </div>
                            <div class="col-lg-3 pe-0" style="margin-top:1.5rem;">
                                <div class="form-group mb-5">
                                    <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-1">Employer Contribution PF:</label>
                                    <input type="text" name="employer_contro_pf" id="employer_contro_pf" class="form-control"  value="{{$payroll->employer_contro_pf}}" > 
                                </div>
                            </div>  
                            <div class="col-lg-3 pe-0" style="margin-top:1.5rem;">
                                <div class="form-group mb-5">
                                    <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-1">Employer Contribution ESIC:</label>
                                    <input type="text" name="employer_contro_esic" id="employer_contro_esic" class="form-control" value="{{$payroll->employer_contro_esic}}">   
                                </div>
                            </div>  
                             <div class="col-lg-3 pe-0" style="margin-top:1.5rem;">
                                <div class="form-group mb-5">
                                    <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-1">Mediclaim Benefit:</label>
                                    <input type="text" name="mediclaim_benefit" id="mediclaim_benefit" class="form-control" value="{{$payroll->mediclaim_benefit}}">  
                                </div>
                            </div>   
                            <div class="col-lg-3 pe-0" style="margin-top:1.5rem;">
                                <div class="form-group mb-5">
                                    <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-1">Employer Contribution:</label>
                                    <input type="text" name="ctc" id="ctc" class="form-control" value="{{$payroll->ctc}}">  
                                </div>
                            </div> 
                            
                            <div class="col-lg-3 pe-0" style="margin-top:1.5rem;">
                                <div class="form-group mb-5">
                                    <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-1">CTC:</label>
                                    <input type="text" name="ctc_payroll" value="{{$payroll->ctc_payroll}}" id="ctc_payroll" class="form-control" required>    
                                </div>
                            </div>   
                            <div class="col-lg-3 pe-0" style="margin-top:1.5rem;">
                                <div class="form-group mb-5">
                                <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-1">Month:</label>
                               <input type="text" name="month" id="payrollmonth" class="form-control"  value="{{$payroll->month}}"> 
                                </div>
                            </div>    
                            <div class="col-lg-3 pe-0" style="margin-top:1.5rem;">
                                <div class="form-group mb-5">
                                    <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-1">Total Working Day:</label>
                                    <input type="text" name="total_working_day" id="total_working_day" class="form-control" value="{{$payroll->total_working_day}}">  
                                </div>
                            </div>   
                            <div class="col-lg-3 pe-0" style="margin-top:1.5rem;">
                                <div class="form-group mb-5">
                                    <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-1">Per day salary:</label>
                                    <input type="text" name="per_day_salary" id="per_day_salary" class="form-control" value="{{$payroll->per_day_salary}}" >   
                                </div>
                            </div>   
                            <div class="col-lg-3 pe-0" style="margin-top:1.5rem;">
                                <div class="form-group mb-5">
                                    <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-1">Total Present Days:</label>
                                    <input type="text" name="total_present_day" id="total_present_day" class="form-control" value="{{$payroll->total_present_day}}"> 
                                </div>
                            </div>   
                            <div class="col-lg-3 pe-0" style="margin-top:1.5rem;">
                                <div class="form-group mb-5">
                                    <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-1">Total Absent Days:</label>
                                    <input type="text" name="total_absent_day" id="total_absent_day" class="form-control" value="{{$payroll->total_absent_day}}">  
                                </div>
                            </div>   
                            <div class="col-lg-3 pe-0" style="margin-top:1.5rem;">
                                <div class="form-group mb-5">
                                    <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-1">Salary:</label>
                                    <input type="text" name="salary" id="salary" class="form-control"  value="{{$payroll->salary}}">
                                </div>
                            </div>  
                            <div class="col-lg-3 pe-0" style="margin-top:1.5rem;">
                                <div class="form-group mb-5">
                                    <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-1">Incentive & Bonus:</label>
                                    <input type="text" name="incentive_bonus" id="incentive_bonus" class="form-control" value="{{$payroll->incentive_bonus}}" > 
                                </div>                       
                            </div>

                            <div class="col-lg-3 pe-0" style="margin-top:1.5rem;">
                                <div class="form-group mb-5">
                                    <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-1">Conveyance Allowance:</label>
                                    <input type="text" name="conveyance_allowance" id="conveyance_allowance" class="form-control" value="{{$payroll->conveyance_allowance}}" >
                                </div>
                            </div>  
            
                            <div class="col-md-3 pe-0" style="margin-top:1.5rem;">
                                <div class="form-group mb-5">
                                    <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-1">Medical Allowance:</label>
                                    <input type="text" name="medical_allowance" id="medical_allowance" class="form-control" value="{{$payroll->medical_allowance}}">   
                                </div>  
                            </div>
                            <div class="col-lg-3 pe-0" style="margin-top:1.5rem;">
                                <div class="form-group mb-5">
                                    <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-1">Rent By Company:</label>
                                    <input type="text" name="rent_by_company" id="rent_by_company" class="form-control" value="{{$payroll->rent_by_company}}">     
                                </div> 
                            </div>
                            <div class="col-lg-3 pe-0" style="margin-top:1.5rem;">
                                <div class="form-group mb-5">
                                    <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-1">Over Time:</label>
                                    <input type="text" name="over_time" id="over_time" class="form-control" value="{{$payroll->over_time}}">     
                                </div> 
                            </div>
                            <div class="col-lg-3 pe-0" style="margin-top:1.5rem;">
                                <div class="form-group mb-5">
                                    <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-1">Net Payable:</label>
                                    <input type="text" name="net_payable" id="net_payable" class="form-control" value="{{$payroll->net_payable}}" required>    
                                </div>
                            </div>
                            <div class="form-group" style="margin-top:1.5rem;">
                                <button type="submit" name="submit" class="border border-2 btn btn-primary py-2">save </button>
                            </div>
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/base/jquery-ui.css" rel="stylesheet"/>

   

    <script type="text/javascript">

$('#payrollmonth').datepicker({
    changeMonth: true,
    changeYear: true,
    showButtonPanel: true,
    dateFormat: 'MM yy',
    onClose: function(dateText, inst){
        var year = inst.selectedYear, month = inst.selectedMonth+1;
        $("#total_working_day").val(new Date(year, month, 0).getDate());
        set_per_day_salary();
        
    },
});

function set_per_day_salary() {
    total_deduction();
    var twd = $('#total_working_day').val();
    var net_salary = $('#net_salary').val();
    // alert(twd);
      if(twd != '' && net_salary !='') {
        ttl_wd = parseFloat(twd);
        net_sal = parseFloat(net_salary);
        per_day_sal = net_sal / ttl_wd ;
         $('#per_day_salary').val(per_day_sal.toFixed(2));
      }else {
         per_day_sal = 0;
         $('#per_day_salary').val('0');
      }

 }

 $(document).on('keyup', '#gross_salary', function(){
        calculate_hra_basic();
        total_deduction();
        set_per_day_salary();
        salary();
        // net_payable();
    });

     $(document).on('keyup', '#pf_employee_contro', function(){
        total_deduction();
    });
    $(document).on('keyup', '#esic_employee_contro', function(){
        total_deduction();
    });
    $(document).on('keyup', '#pt', function(){
        total_deduction();
    });

function total_deduction(){
        var e_pf = document.getElementById('pf_employee_contro').value;
        var e_esic = document.getElementById('esic_employee_contro').value;
        var e_pt = document.getElementById('pt').value;
        var g = document.getElementById('gross_salary').value;
        
        var result = parseInt(e_pf) + parseInt(e_esic)+parseInt(e_pt);
        var result2 = parseInt(g) - result ;
        
        if (!isNaN(result)) {
            document.getElementById('total_deduction').value = result;
            document.getElementById('net_salary').value = result2;
        }else{
             document.getElementById('total_deduction').value = 0;
              document.getElementById('net_salary').value = 0;
        }
    }

    $(document).on('keyup', '#employer_contro_pf', function(){
        total_company_contribution();
    });
    $(document).on('keyup', '#employer_contro_esic', function(){
        total_company_contribution();
    });
    $(document).on('keyup', '#mediclaim_benefit', function(){
        total_company_contribution();
    });

    function total_company_contribution() {
        var pf = document.getElementById('employer_contro_pf').value;
        var esic = document.getElementById('employer_contro_esic').value;
        var medi = document.getElementById('mediclaim_benefit').value; 
        var gross_salary = document.getElementById('gross_salary').value; 
        var result = parseInt(pf) + parseInt(esic)+parseInt(medi);
        var result2 = result + parseInt(gross_salary);
        if ((!isNaN(result)) && (!isNaN(result2))) {
            document.getElementById('ctc').value = result;
            document.getElementById('ctc_payroll').value = result2;

        }else{
            document.getElementById('ctc').value = 0;
            document.getElementById('ctc_payroll').value = 0;
        }
    }

    function calculate_hra_basic() {         
        var gross_salary = document.getElementById('gross_salary').value;
        var hra = (28/100)*(parseInt(gross_salary));
        var basic = (72/100)*(parseInt(gross_salary));
        if ((!isNaN(hra))&&(!isNaN(basic))){
            document.getElementById('hra').value = hra.toFixed(4);
            document.getElementById('basic').value = basic.toFixed(4); 
        }
        else{
            document.getElementById('hra').value = 0;
            document.getElementById('basic').value = 0;
        }

        $(document).on('keyup', '#total_present_day', function(){
        salary();
        });
        $(document).on('keyup', '#per_day_salary', function(){
        salary();
        });

        function salary()
        {
            var Total_present_day = document.getElementById('total_present_day').value;
            var per_day_salary = document.getElementById('per_day_salary').value;
             var result = parseInt(Total_present_day) * parseFloat(per_day_salary);
                if (!isNaN(result)) {
                    document.getElementById('salary').value = result.toFixed(2);

                }else{
                    document.getElementById('salary').value = 0;
                }

        }

        $(document).on('keyup', '#salary', function(){
            net_payable();
        });
        $(document).on('keyup', '#incentive_bonus', function(){
            net_payable();
        });
        $(document).on('keyup', '#conveyance_allowance', function(){
            net_payable();
        });
        $(document).on('keyup', '#medical_allowance', function(){
            net_payable();
        });
        $(document).on('keyup', '#rent_by_company', function(){
            net_payable();
        });

        function net_payable(){
            var salary = document.getElementById('salary').value;
            var incentive_bonus = document.getElementById('incentive_bonus').value;
            var Conveyance_Allowance = document.getElementById('conveyance_allowance').value;
            var Medical_Allowance = document.getElementById('medical_allowance').value;
            var Rent_By_Company = document.getElementById('rent_by_company').value;

            var result = parseInt(salary) + parseFloat(incentive_bonus) + parseFloat(Conveyance_Allowance) + parseFloat(Medical_Allowance)+parseFloat(Rent_By_Company);
                if (!isNaN(result)) {
                    document.getElementById('net_payable').value = result.toFixed(2);

                }else{
                    document.getElementById('net_payable').value = 0;
                }

        }
    } 

</script>
@endsection