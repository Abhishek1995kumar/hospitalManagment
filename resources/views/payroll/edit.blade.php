@extends('layouts.app')
@extends('layouts.header')
@extends('layouts.footer')
@section('title')
    {{ __('Payroll') }}
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">
@endsection
@section('content')
<head>
<meta name="csrf-token" content="{{ csrf_token() }}">
</head> 
<div class="card">
  <div class="card-header">Payroll</div>
  <div class="card-body">
      
      <form action="{{ url('payroll/'.$payroll->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <div class="form-group row">
          <div class="col-sm-3">
            <label class="col-form-label" >Sr No.</label>
            <input type="text" name="sr_no" id="sr_no" class="form-control">   
          </div>
           <div class="col-sm-3">
            <label class="col-form-label" >Payroll Id</label>
            <input type="text" name="payroll_id" id="payroll_id" class="form-control">                
          </div>
           <div class="col-sm-3">
              <label class="col-form-label" >Role</label>
            <input type="text" name="role" id="role" class="form-control">     
          </div> 
          <div class="col-sm-3">
              <label class="col-form-label" >Employee Id</label>
            <input type="text" name="employee_id" id="employee_id" class="form-control">     
          </div>  
        </div></br>
       <div class="form-group row">
          <div class="col-sm-3">
            <label class="col-form-label" >Employee</label>
            <input type="text" name="employee" id="employee" class="form-control">   
          </div>
           <div class="col-sm-3">
            <label class="col-form-label" >Status</label>
            <input type="text" name="status" id="status" class="form-control">                
          </div>
           <div class="col-sm-3">
              <label class="col-form-label" >Basic</label>
            <input type="text" name="basic" id="basic" class="form-control">     
          </div> 
          <div class="col-sm-3">
              <label class="col-form-label" >HRA</label>
            <input type="text" name="hra" id="hra" class="form-control">     
          </div>  
        </div><br>
        <div class="form-group row">
          <div class="col-sm-3">
            <label class="col-form-label" >Gross Salary</label>
            <input type="text" name="gross_salary" id="gross_salary" class="form-control">   
          </div>
           <div class="col-sm-3">
            <label class="col-form-label" >PF (Employee Contribution)</label>
            <input type="text" name="pf_employee_contro" id="pf_employee_contro" class="form-control">                
          </div>
           <div class="col-sm-3">
              <label class="col-form-label" >ESIC (Employee Contribution)</label>
            <input type="text" name="esic_employee_contro" id="esic_employee_contro" class="form-control">     
          </div> 
          <div class="col-sm-3">
              <label class="col-form-label" >PT</label>
            <input type="text" name="pt" id="pt" class="form-control">     
          </div>
        </div><br>

        <div class="form-group row">
          <div class="col-sm-3">
            <label class="col-form-label" >Total Deductions</label>
            <input type="text" name="total_deduction" id="total_deduction" class="form-control">   
          </div>
           <div class="col-sm-3">
            <label class="col-form-label" >Net Salary</label>
            <input type="text" name="net_salary" id="net_salary" class="form-control">                
          </div>
           <div class="col-sm-3">
              <label class="col-form-label" >Employer Contribution PF</label>
            <input type="text" name="employer_contro_pf" id="employer_contro_pf" class="form-control">     
          </div> 
          <div class="col-sm-3">
              <label class="col-form-label" >Employer Contribution ESIC</label>
            <input type="text" name="employer_contro_esic" id="employer_contro_esic" class="form-control">     
          </div>
        </div> <br>
        <div class="form-group row">
          <div class="col-sm-3">
            <label class="col-form-label" >Mediclaim Benefit</label>
            <input type="text" name="mediclaim_benefit" id="mediclaim_benefit" class="form-control">   
          </div>
           <div class="col-sm-3">
            <label class="col-form-label" >CTC</label>
            <input type="text" name="ctc" id="ctc" class="form-control">                
          </div>
           <div class="col-sm-3">
              <label class="col-form-label" >Month</label>
            <input type="text" name="month" id="month" class="form-control">     
          </div> 
          <div class="col-sm-3">
              <label class="col-form-label" >Total Working Day</label>
            <input type="text" name="total_working_day" id="total_working_day" class="form-control">     
          </div>  
        </div><br>
        <div class="form-group row">
          <div class="col-sm-3">
            <label class="col-form-label" >Per day salary</label>
            <input type="text" name="per_day_salary" id="per_day_salary" class="form-control">   
          </div>
           <div class="col-sm-3">
            <label class="col-form-label" >Total Present Days</label>
            <input type="text" name="total_present_day" id="total_present_day" class="form-control">                
          </div>
           <div class="col-sm-3">
              <label class="col-form-label" >Total Absent Days</label>
            <input type="text" name="total_absent_day" id="total_absent_day" class="form-control">     
          </div> 
          <div class="col-sm-3">
              <label class="col-form-label" >Salary</label>
            <input type="text" name="salary" id="salary" class="form-control">     
          </div>  
        </div><br>
        <div class="form-group row">
          <div class="col-sm-3">
            <label class="col-form-label" >Incentive & Bonus</label>
            <input type="text" name="incentive_bonus" id="incentive_bonus" class="form-control">   
          </div>
           <div class="col-sm-3">
            <label class="col-form-label" >Conveyance Allowance</label>
            <input type="text" name="conveyance_allowance" id="conveyance_allowance" class="form-control">                
          </div>
           <div class="col-sm-3">
              <label class="col-form-label" >Medical Allowance</label>
            <input type="text" name="medical_allowance" id="medical_allowance" class="form-control">     
          </div> 
          <div class="col-sm-3">
              <label class="col-form-label" >Rent By Company</label>
            <input type="text" name="rent_by_company" id="rent_by_company" class="form-control">     
          </div>  
        </div><br>
        <div class="form-group row">
          <div class="col-sm-3">
            <label class="col-form-label" >Incentive & Bonus</label>
            <input type="text" name="incentive_bonus" id="incentive_bonus" class="form-control">   
          </div>  
        </div><br>
        <div align="center">
       <input type="submit" value="Save" class="btn btn-success"></br>
       </div>
    </form>
   
  </div>
</div>
 
@stop

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/base/jquery-ui.css" rel="stylesheet"/>

<script type="text/javascript">

$('#month').datepicker({
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
        var result = parseInt(pf) + parseInt(esic)+parseInt(medi);
        if (!isNaN(result)) {
            document.getElementById('ctc').value = result;

        }else{
            document.getElementById('ctc').value = 0;
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
 -->