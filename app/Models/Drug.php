<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drug extends Model
{
    protected $table = 'postotdrug';
    public $fillable = ['drug', 'created_at', 'updated_at'];
}
