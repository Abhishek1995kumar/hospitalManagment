<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    protected $table = 'leave';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'leave_reason','description','status','leave_from','leave_to','updated_on','applied_on'];
}
