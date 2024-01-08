<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ticket extends Model
{
    protected $table = 'ticket';
    protected $primaryKey = 'id';
    protected $fillable = ['ticket_id', 'ticket_by', 'ticket_for' , 'manager' , 'purpose' ,'priority','start_date' ,'end_date','start_time','end_time','total_time','ticket_status','progress_update','remarks','upload','assign'];
}
