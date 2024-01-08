// Abhishek ---Create Code Start from here

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
    var net_salary = $('#ctc_payroll').val();
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
    CTC();
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

$(document).on('keyup', '#gross_salary', function(){
    CTC();
});

$(document).on('keyup', '#employer_contro_pf', function(){
    CTC();
});

$(document).on('keyup', '#employer_contro_esic', function(){
    CTC();
});

$(document).on('keyup', '#mediclaim_benefit', function(){
    CTC();
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
};


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

    $(document).on('keyup', '#total_present_day', function(){salary(); });
    $(document).on('keyup', '#per_day_salary', function(){ salary(); });

    function salary() {
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

    function CTC() {
        var pf = document.getElementById('employer_contro_pf').value;
        var esic = document.getElementById('employer_contro_esic').value;
        var medi = document.getElementById('mediclaim_benefit').value; 
        var gross = document.getElementById('gross_salary').value; 
        var result = parseInt(pf) + parseInt(esic)+parseInt(medi)+parseInt(gross);
        if (!isNaN(result)) {
            document.getElementById('ctc_payroll').value = result;

        }else{
            document.getElementById('ctc_payroll').value = 0;
        }
    }
} 


function fetchpayroll(){
    var emp_id =  $('#employee_id').val();
    //alert(emp_id);
    $.ajax({
        url: "{{url('/Payroll_price')}}",
        method:'POST',
        data :{
            "_token": "{{ csrf_token() }}",
            id:emp_id,
        },
        success:function(data){
           if(data) {
                $('#employee').val(data[0].first_name);
                $('#employeedepartment').val(data[0].name);
            }
        },
});}



function validate(){
    console.log("hello");
};

