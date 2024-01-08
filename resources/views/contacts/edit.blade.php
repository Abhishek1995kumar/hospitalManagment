@extends('layouts.app')
@section('content')
<div class="card">
  <div class="card-header">Contactus Page</div>
  <div class="card-body">
      
      <form action="{{ url('contact/' .$contacts->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$contacts->id}}" id="id" />
        <label>Visit and reference</label></br>
        <input type="text" name="visitreference" id="visitreference" value="{{$contacts->visitreference}}" class="form-control"></br>
        <label>Name</label></br>
        <input type="text" name="name" id="name" value="{{$contacts->name}}" class="form-control"></br>
        <label>Appointmenttype</label></br>
        <input type="text" name="appointmenttype" id="appointmenttype" value="{{$contacts->appointmenttype}}" class="form-control"></br>
        <label>Select Doctor</label></br>
        <input type="text" name="doctor" id="doctor" value="{{$contacts->doctor}}" class="form-control"></br>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
   </div>
</div>
@stop