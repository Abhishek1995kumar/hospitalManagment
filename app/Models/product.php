<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $table = 'product';
    protected $primaryKey = 'id';
    protected $fillable = ['category', 'subcategory', 'product_name','hsnno','min_qty','max_qty','discount','supplier_name','cp','mrp','ref_code'];
}
