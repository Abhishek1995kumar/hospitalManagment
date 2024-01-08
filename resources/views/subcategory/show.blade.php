@extends('subcategory.layout')
@section('content')
 
 
<div class="card">
  <div class="card-header">Contactus Page</div>
  <div class="card-body">
   
 
        <div class="card-body">
        <h5 class="card-title">Sub Category : {{ $subcategory->subcategory }}</h5>
        <p class="card-text">Category : {{ $subcategory->category}}</p>
  </div>
       
    </hr>
  
  </div>
</div>