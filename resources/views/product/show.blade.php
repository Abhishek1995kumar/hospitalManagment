@extends('product.layout')
@section('content')
 
 
<div class="card">
  <div class="card-header">Contactus Page</div>
  <div class="card-body">
   
 
        <div class="card-body">
        <h5 class="card-title">Category : {{ $product->category }}</h5>
        <p class="card-text">Sub Category : {{ $product->subcategory }}</p>
        <p class="card-text">Product Name : {{ $product->product_name }}</p>
        <h5 class="card-title">HSN No. : {{ $product->hsnno }}</h5>
        <p class="card-text">Min Qty : {{ $product->min_qty }}</p>
        <p class="card-text">Max Qty : {{ $product->max_qty }}</p>
        <h5 class="card-title">Discount : {{ $product->discount }}</h5>
        <p class="card-text">Supplier Name : {{ $product->supplier_name }}</p>
        <p class="card-text">C.P : {{ $product->cp }}</p>
        <p class="card-text">MRP : {{ $product->mrp }}</p>
        <p class="card-text">Ref Code : {{ $product->ref_code }}</p>
  </div>
       
    </hr>
  
  </div>
</div>