<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preottest extends Model
{
    protected $table = 'preottest';
    public $fillable = ['testpreots', 'created_at', 'updated_at'];
}
