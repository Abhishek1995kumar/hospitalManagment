<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categ extends Model
{
    protected $table = 'categ';
    protected $primaryKey = 'cat_id';
    protected $fillable = ['cat_name'];
}
