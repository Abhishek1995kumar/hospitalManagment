@extends('layouts.app')
<!DOCTYPE html>
<html>
 <head>
  <title>Date Range Fiter Data in Laravel using Ajax</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
 </head>
 <body>
  <br />
  <div class="container box">
   <h3 align="center">Date Range Fiter Data in Laravel using Ajax</h3><br />
   <div class="panel panel-default">
    <div class="panel-heading">
     <div class="row">
      <div class="col-md-3">Sample Data - Total Records - <b><span id="total_records"></span></b></div>
      <div class="col-md-7">
       <div class="input-group input-daterange">
           <input type="text" name="from_date" id="from_date" readonly class="form-control" />
           <div class="input-group-addon">to</div>
           <input type="text"  name="to_date" id="to_date" readonly class="form-control" />
           
       </div><br>
                                       
        <!-- <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Employee:</label> -->
       
        <select class="form-control" id="employe" name="employe">
            <option value="0" disabled="true" selected="true">--select Employee--</option>
            @foreach($user2 as $item)
            <option value="{{$item->id }}"->{{$item->first_name }} {{$item->last_name }}</option>
            @endforeach  
        </select>
        <!-- </div> -->
      </div>
      <div class="col-md-2">
       <button type="button" name="filter" id="filter" class="btn btn-info btn-sm">Filter</button>
       <button type="button" name="refresh" id="refresh" class="btn btn-warning btn-sm">Refresh</button>
      </div>
     </div>
    </div>
    <div class="panel-body">
     <div class="table-responsive">
      <table class="table table-striped table-bordered">
       <thead>
        <tr>
        <th>ID</th>
        <th>Employee Name</th>
        <th>Date</th>
        <th>Loging Time</th>
        <th>Logout Time</th>
        <th>Total Duty Hours</th>
        <th>Tea Break</th>
        <th>Lunch Break</th>
        <th>Meeting Break</th>
        <th>Action</th>
        </tr>
       </thead>
       <tbody>
       
                                
</tbody>
      </table>
      {{ csrf_field() }}
     </div>
    </div>
   </div>
  </div>
 </body>
</html>

<script>
$(document).ready(function(){

 var date = new Date();

 $('.input-daterange').datepicker({
  todayBtn: 'linked',
  format: 'yyyy-mm-dd',
  autoclose: true
 });

 var _token = $('input[name="_token"]').val();

 fetch_data();

 function fetch_data(from_date = '', to_date = '',employe ='')
 {
  $.ajax({
   url:"{{ route('daterange.fetch_data') }}",
   method:"POST",
   data:{from_date:from_date, to_date:to_date,employe:employe, _token:_token},
   dataType:"json",
   success:function(data)
   {
    var output = '';
    $('#total_records').text(data.length);
    for(var count = 0; count < data.length; count++)
    {
     output += '<tr>';
     output += '<td>' + data[count].id + '</td>';
     output += '<td>' + data[count].first_name + '</td>';
     output += '<td>' + data[count].date + '</td>';
     output += '<td>' + data[count].shift_start + '</td>';
     output += '<td>' + data[count].shift_end + '</td>';
     output += '<td>' + data[count].total_duty_hours + '</td>';
     output += '<td>' + data[count].total_tea_break + '</td>';
     output += '<td>' + data[count].total_lunch_break + '</td>';
     output += '<td>' + data[count].total_meeting_break + '</td>';
     output += '</tr>';
    }
    $('tbody').html(output);
   }
  })
 }

 $('#filter').click(function(){
  var from_date = $('#from_date').val();
  var to_date = $('#to_date').val();
  var employe = $('#employe').val();
  if(from_date != '' &&  to_date != '' && employe != '')
  {
   fetch_data(from_date, to_date, employe);
  }
  else
  {
   alert('Both Date and Employee name is required');
  }
 });

 $('#refresh').click(function(){
  $('#from_date').val('');
  $('#to_date').val('');
  $('#employe').val('');
  fetch_data();
 });


});
</script>