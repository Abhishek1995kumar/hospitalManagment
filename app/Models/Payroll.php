<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    protected $table = 'payroll';
    protected $primaryKey = 'id';
    protected $fillable = ['sr_no', 'payroll_id', 'role', 'employee_id', 'employee', 'status', 'basic', 'hra', 'gross_salary', 'pf_employee_contro', 'esic_employee_contro', 'pt' ,'total_deduction' ,'net_salary', 'employer_contro_pf', 'employer_contro_esic', 'mediclaim_benefit', 'ctc', 'month', 'total_working_day', 'per_day_salary', 'total_present_day', 'total_absent_day', 'salary', 'incentive_bonus', 'conveyance_allowance', 'medical_allowance', 'rent_by_company', 'net_payable'];
}
 