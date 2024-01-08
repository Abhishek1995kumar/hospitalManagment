<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Details extends Model
{
    protected $table = 'postotdetails';
    public $fillable = ['detail', 'created_at', 'updated_at'];
}
