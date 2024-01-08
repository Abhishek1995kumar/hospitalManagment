<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendancess extends Model
{
    protected $table = 'attendance';
    protected $primaryKey = 'id';
    protected $fillable = ['fdate', 'tdate', 'emp_name','date','shift_start','shift_end','tea_break','tea_break_out','lunch_break','lunch_break_out','meeting_break','meeting_break_out','note','total_duty_hours','total_tea_break','total_lunch_break','total_meeting_break'];
}
