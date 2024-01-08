<?php 

namespace App\Models;
 
Use Illuminate\Database\Eloquent\Factories\Hasfactory;
Use Illuminate\Database\Eloquent\Model;

class Livepatient extends Model
{
    protected $table = 'patientlive';
    protected $primarykey = 'id';
    protected $fillable = ['visited_reference','patient_name','appointment_type','doctor_name','date_time','status'];


}
