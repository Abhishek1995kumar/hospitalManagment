<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sub_categorymodel extends Model
{
    protected $table = 'subcategory';
    protected $primaryKey = 'subcat_id';
    protected $fillable = ['subcat_name', 'category','updated_at','created_at'];
}
