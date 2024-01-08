<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospitalinvoice extends Model
{
    protected $table = 'hospitalinvoice';
    protected $primaryKey = 'id';
    protected $fillable = ['mr_discharge_date','payment_amount','procedure','details','mr_admission_date','selecttype','roomtype','paymenttype','patienttype','paymenttypeone','doctorname','patientname','category','subcategory','productname','discType','discRate','discount','price','ttlamt','payment_paymode','payment_pay','paymentdate','paymentremark','amount','paidamt'];

}
