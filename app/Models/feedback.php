<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class feedback extends Model
{
    protected $table = 'feedback';
    protected $primaryKey = 'id';
    protected $fillable = ['feedback_id', 'patient_name', 'mobile','pname_correct','pnumber_correct','clinical_remark','medicine_purchase','diagnostic_test','glass_invoice','treatment_recommended','medicines_guided','tests_recommended','glasses_recommended','surgery_recommened','surgery_recommended_product','understood_surgery_suggested','counsellor_meet','surgery_reason','planning_to_surgery','rate_receptionist','rate_optometrist','rate_doctor','rate_counsellor','rate_centre_head','rate_pharmacist','rate_optical_person','rate_time_spent','rate_cleanliness','rate_visiting_hospital','staff_mention','recommened_us','next_visit_date','planning_to','receipt','optpmetrist','doctor','counsellor','centre_head','pharmacist','optical_person','time_spent','cleanness','visiting'];
}
