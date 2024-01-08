<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 'location';
    protected $primaryKey = 'id';
    protected $fillable = ['lname', 'alname', 'specialization','constitution','mobile','email','phone','fax_no','building','street','suburb','zip_code','gst','country','state','city','drug_lic_no','financial_year'];
}
