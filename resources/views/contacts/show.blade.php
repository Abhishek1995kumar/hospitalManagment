@extends('layouts.app')
@section('content')
<div class="card">
  <div class="card-header">Contactus Page</div>
  <div class="card-body">
  
        <div class="card-body">
        <h5 class="card-title">Visit Reference : {{ $contacts->visitreference }}</h5>
        <p class="card-text">Name : {{ $contacts->name }}</p>
        <p class="card-text">Appointment type : {{ $contacts->appointmenttype}}</p>
        <p class="card-text">Doctor : {{ $contacts->doctor }}</p>
  </div>
      
    </hr>
  
  </div>
</div>