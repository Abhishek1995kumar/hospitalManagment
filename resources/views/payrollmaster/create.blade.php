@extends('layouts.app')
@section('title')
    {{ __('Payroll') }}
    @endsection
@section('page_css')
    <link rel="stylesheet" href="{{ asset('assets/css/int-tel/css/intlTelInput.css') }}">
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/base/jquery-ui.css" rel="stylesheet"/>

    <style>
        a {text-decoration:None; }
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
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Add Payroll</h1>
            </div>
            <div class="d-flex align-items-center py-1">
                <a href="{{ route('payrollmaster') }}"
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
                    <form action="{{url('payrollmaster/create')}}" method="post" id="addpayroll" name="addpayroll" onsubmit="return validate()" enctype="multipart/form-data">
                        @csrf
                        <div class="row gx-10 mb-5">
                            <div class="col-md-3 pe-0">
                                <div class="form-group mb-5">
                                    <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-1">Payroll Id:</label>
                                    <input type="text" name="payrollno" id="payrollno" value="PAYROLL_NO_{{ $lastId }}" class="form-control"  readonly>
                                </div>
                            </div>
                            <!-- <div class="col-md-3 pe-0">
                                <div class="form-group mb-5"><label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-1">Employee Id:</label>
                              <input type="text" name="employee_id" id="employee_id" class="form-control">  
                                <select style="width:100%;" class="form-control" id="employee_id" name="employee_id" onchange="fetchpayroll()" required>
                                    <option value="0" disabled="true" selected="true">--select--</option>
                                        @foreach($userref as $item)
                                        <option value="{{$item->id }}">{{$item->id}}</option>
                                        @endforeach
                                    </select>  
                                </div>
                            </div> -->
                            <div class="col-md-3 pe-0">
                                <div class="form-group mb-5">
                                    <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-1"> Employee Name:</label>
                              <input type="text" name="employee" id="employee" class="form-control" required>   
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group mb-5">
                                    <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-1">Employee Department:</label>
                                    <input type="text" name="employeedepartment" id="employeedepartment" class="form-control" required>   
                                </div>
                            </div>
                            <div class="col-md-3 pe-0">
                                <div class="form-group mb-5" style="margin-top:1.5rem;">
                                    <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-1">Status:</label>
                                    <input type="text" name="status" id="status" class="form-control" required>  
                                </div>
                            </div>
                            <div class="col-md-3 pe-0">
                                <div class="form-group mb-5" style="margin-top:1.5rem;">
                                <!-- <label class="col-form-label fs-6 fw-bolder text-gray-700 mb-3" >Basic</label> -->
                                <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-1">Basic:</label>
                              <input type="text" name="basic" id="basic" class="form-control" required>     
                                </div>
                            </div>
                            <div class="col-md-3 pe-0">
                                <div class="form-group mb-5" style="margin-top:1.5rem;">
                                <!-- <label class="col-form-label fs-6 fw-bolder text-gray-700 mb-3" >HRA</label> -->
                                <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-1">HRA:</label>
                              <input type="text" name="hra" id="hra" class="form-control" required>     
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-5" style="margin-top:1.5rem;">
                                <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-1">Gross Salary:</label>
                                <!-- <label class="col-form-label fs-6 fw-bolder text-gray-700 mb-3" >Gross Salary</label> -->
                            <input type="text" name="gross_salary" id="gross_salary" class="form-control" required>  
                                </div>
                            </div>
                            <div class="col-md-3 pe-0">
                                <div class="form-group mb-5" style="margin-top:1.5rem;">
                                    <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-1">PF (Employee Contribution):</label>
                                    <input type="text" name="pf_employee_contro" id="pf_employee_contro" class="form-control" required>  
                                </div>
                            </div>
                            <div class="col-md-3 pe-0">
                                <div class="form-group mb-5" style="margin-top:1.5rem;">
                                    <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-1">ESIC (Employee Contribution)</label>
                                    <input type="text" name="esic_employee_contro" id="esic_employee_contro" class="form-control" required>   
                                </div>
                            </div>      
                            <div class="col-md-3 pe-0">
                                <div class="form-group mb-5" style="margin-top:1.5rem;">
                                    <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-1">PT:</label>
                                    <input type="text" name="pt" id="pt" class="form-control" required>
                                </div>
                            </div>      
                            <div class="col-md-3">
                                <div class="form-group mb-5" style="margin-top:1.5rem;">
                                    <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-1">Total Deductions:</label>
                                    <input type="text" name="total_deduction" id="total_deduction" class="form-control" required>  
                                </div>
                            </div>      
                            <div class="col-md-3 pe-0">
                                <div class="form-group mb-5" style="margin-top:1.5rem;">
                                    <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-1">Net Salary:</label>
                                    <input type="text" name="net_salary" id="net_salary" class="form-control" required>    
                                </div>
                            </div>
                            <div class="col-md-3 pe-0">
                                <div class="form-group mb-5" style="margin-top:1.5rem;">
                                <!-- <label class="col-form-label fs-6 fw-bolder text-gray-700 mb-3" >Employer Contribution PF</label> -->
                                <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-1">Employer Contribution PF:</label>
                            <input type="text" name="employer_contro_pf" id="employer_contro_pf" class="form-control" required> 
                                </div>
                            </div>  
                            <div class="col-md-3 pe-0">
                                <div class="form-group mb-5" style="margin-top:1.5rem;">
                                <!-- <label class="col-form-label fs-6 fw-bolder text-gray-700 mb-3" >Employer Contribution ESIC</label> -->
                                <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-1">Employer Contribution ESIC:</label>
                            <input type="text" name="employer_contro_esic" id="employer_contro_esic" class="form-control" required>     
                                    
                                </div>
                            </div>  
                             <div class="col-md-3">
                                <div class="form-group mb-5" style="margin-top:1.5rem;">
                                    <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-1">Mediclaim Benefit:</label>
                                    <input type="text" name="mediclaim_benefit" id="mediclaim_benefit" class="form-control" required>   
                                </div>
                            </div>   
                            <div class="col-md-3 pe-0">
                                <div class="form-group mb-5" style="margin-top:1.5rem;">
                                    <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-1">Employer Contribution:</label>
                                    <input type="text" name="ctc" id="ctc" class="form-control" required>    
                                </div>
                            </div>   

                            <div class="col-md-3 pe-0">
                                <div class="form-group mb-5" style="margin-top:1.5rem;">
                                    <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-1">CTC:</label>
                                    <input type="text" name="ctc_payroll" id="ctc_payroll" class="form-control" required>    
                                </div>
                            </div>   
                            <div class="col-md-3 pe-0">
                                <div class="form-group" style="margin-top:1.5rem;">
                                    <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-1">Month:</label>
                                    <input type="text" name="month" id="payrollmonth" class="form-control" required>     
                                </div>    
                            </div>    
                            <div class="col-md-3">
                                <div class="form-group mb-5" style="margin-top:1.5rem;">
                                <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-1">Total Working Day:</label>
                                <!-- <label class="col-form-label fs-6 fw-bolder text-gray-700 mb-3" >Total Working Day</label> -->
                            <input type="text" name="total_working_day" id="total_working_day" class="form-control" required> 
                                </div>
                            </div>   
                            <div class="col-md-3 pe-0">
                                <div class="form-group mb-5" style="margin-top:1.5rem;">
                                    <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-1">Per day salary:</label>
                            <input type="text" name="per_day_salary" id="per_day_salary" class="form-control" required> 
                                </div>
                            </div>   
                            <div class="col-md-3 pe-0">
                                <div class="form-group mb-5" style="margin-top:1.5rem;">
                                    <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-1">Total Present Days:</label>
                                <input type="text" name="total_present_day" id="total_present_day" class="form-control" required>  
                                </div>
                            </div>   
                            <div class="col-md-3 pe-0">
                                <div class="form-group mb-5" style="margin-top:1.5rem;">
                                    <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-1">Total Absent Days:</label>
                                    <input type="text" name="total_absent_day" id="total_absent_day" class="form-control">   
                                </div>
                            </div>   
                            <div class="col-md-3">
                                <div class="form-group mb-5" style="margin-top:1.5rem;">
                                    <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-1">Salary:</label>
                                <input type="text" name="salary" id="salary" class="form-control" required>     
                                </div>
                            </div>

                            <div class="col-md-3 pe-0">
                            <div class="form-group mb-5" style="margin-top:1.5rem;">
                                <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-1">Incentive & Bonus:</label>

                            <input type="text" name="incentive_bonus" id="incentive_bonus" class="form-control" required>   

                            </div>
                         </div>

                         <div class="col-md-3 pe-0">
                            <div class="form-group mb-5" style="margin-top:1.5rem;">
                                <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-1">Conveyance Allowance:</label>
                            <input type="text" name="conveyance_allowance" id="conveyance_allowance" class="form-control" required>    

                            </div>
                         </div>

                         <div class="col-md-3 pe-0">
                            <div class="form-group mb-5" style="margin-top:1.5rem;">
                                <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-1">Medical Allowance:</label>
                            <input type="text" name="medical_allowance" id="medical_allowance" class="form-control" required>    

                            </div>
                         </div>

                         <div class="col-md-3">
                            <div class="form-group mb-5" style="margin-top:1.5rem;">
                                <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-1">Rent By Company:</label>

                            <input type="text" name="rent_by_company" id="rent_by_company" class="form-control" required>   

                            </div>
                         </div>

                         <div class="col-md-3 pe-0">
                            <div class="form-group mb-5" style="margin-top:1.5rem;">
                                <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-1">Net Payable:</label>
                                <input type="text" name="net_payable" id="net_payable" class="form-control" required>    
                            </div>
                         </div>
                        <div class="form-group" style="margin-top:1.5rem;">
                                <button type="submit" name="submit" class="border border-2 btn btn-primary py-2">save </button>
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
    <script src="{{URL::asset('assets/js/payrollmaster/create.js')}}"></script>                                       
    
    <script>
        function validate(e){
            console.log(e);
        };
    </script>

@endsection








