@extends('layouts.app')
@section('title')
    {{ __('Attendance') }}
@endsection
@section('page_css')
    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">
@endsection
<!-- <head>
    <meta http-equiv="refresh" content="10">
</head> -->
@section('content')
    @include('flash::message')
    <div class="card">
        <div class="card-header border-0 pt-6">
            <!-- @include('layouts.search-component') -->
            <h2>Attendance List<h2>
            <div class="card-toolbar">
                <div class="d-flex align-items-center py-1">
                    <div class="me-4">   
                        <a href="#" class="btn btn-flex btn-light-primary fw-bolder"
                           data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
                            <span class="svg-icon svg-icon-5 svg-icon-gray-500 me-1">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                     viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"></rect>
                                        <path
                                            d="M5,4 L19,4 C19.2761424,4 19.5,4.22385763 19.5,4.5 C19.5,4.60818511 19.4649111,4.71345191 19.4,4.8 L14,12 L14,20.190983 C14,20.4671254 13.7761424,20.690983 13.5,20.690983 C13.4223775,20.690983 13.3458209,20.6729105 13.2763932,20.6381966 L10,19 L10,12 L4.6,4.8 C4.43431458,4.5790861 4.4790861,4.26568542 4.7,4.1 C4.78654809,4.03508894 4.89181489,4 5,4 Z"
                                            fill="#000000"></path>
                                    </g>
                                </svg>
                            </span>
                            {{ __('messages.common.filter') }}</a>
                        <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true"
                             id="kt_menu_6113c71822d0d">
                            <div class="px-7 py-5">
                                <div class="fs-5 text-dark fw-bolder">{{ __('messages.common.filter_options') }}</div>
                            </div>
                            
                            <div class="separator border-gray-200"></div>
                            <div class="px-7 py-5">
                           
                                <div class="d-flex justify-content-end">
                                    <button type="reset" class="btn btn-sm fs-6 btn-light btn-active-light-primary me-2"
                                            id="resetFilter"
                                            data-kt-menu-dismiss="true">{{ __('messages.common.reset') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="#" class="btn btn-primary ps-7 show menu-dropdown" data-kt-menu-trigger="click"
                       data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end"
                       data-kt-menu-flip="bottom">{{ __('messages.common.actions') }}
                        <span class="svg-icon svg-icon-2 me-0">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                             xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                             height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none"
                                                               fill-rule="evenodd">
                                                                <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                                <path
                                                                    d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z"
                                                                    fill="#000000" fill-rule="nonzero"
                                                                    transform="translate(12.000003, 11.999999) rotate(-180.000000) translate(-12.000003, -11.999999)"></path>
                                                            </g>
                                                        </svg>
                                                    </span>
                    </a>
                    <div
                        class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold py-4 w-200px fs-6"
                        data-kt-menu="true">
                        <div class="menu-item px-5">
                        <a href="{{ route('attendance.create') }}"
                               class="menu-link px-5">{{ __('Add Attendance') }}</a>
                        </div>
                        <div class="menu-item px-5">
                            <a href="{{ route('patient.excel') }}"
                               class="menu-link px-5">{{ __('messages.common.export_to_excel') }}</a>
                        </div>
                    </div>
                </div>
            </div>
            @if(Session::has('msg'))
            <div class="col-12">
                    <div class="alert alert-success">{{Session::get('msg')}}</div>
                </div>
            @endif
        </div>
        <br>
        <br>
                 
                        <div class="table-responsive">
                            <div class="form-group row">
                               
                            <!-- <div class="col-sm-1"></div> -->
                              <div class="col-sm-3">
                                
                                  <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">From Date:</label>
                                  <input type="date" name="from_date" id="from_date" class="form-control">
                              </div>&nbsp;&nbsp;&nbsp;&nbsp;
                               <div class="col-sm-3">
                                 
                                  <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">To Date:</label>
                                  <input type="date" name="to_date" id="to_date" class="form-control">
                              </div>&nbsp;&nbsp;&nbsp;&nbsp;
                               <div class="col-sm-3">
                                       <!-- <?php print_r($user2); ?> -->
                                        <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Employee:</label>
                                        <select class="form-control" id="employe" name="employe">
                                          <option value="0" disabled="true" selected="true">--select--</option>
                                            @foreach($user2 as $item)
                                            <option value="{{$item->id }}"->{{$item->first_name }} {{$item->last_name }}</option>
                                            @endforeach  
                                        </select>
                              </div>&nbsp;&nbsp;&nbsp;&nbsp;
                              <div class="col-sm-2">
                                 <!-- <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Total Records: <b><span id="total_records"></span></b></label> -->
                                 <button type="button" name="filter" id="filter" class="form-control btn btn-info btn-sm" style="width:50%">Search</button><br><br>
                                <button type="button" name="refresh" id="refresh" class="form-control btn btn-warning btn-sm" style="width:50%">Refresh</button>
                            </div>
                        <br>
</div><br>
@if(Session::has('msg'))
            <div class="col-12">
                    <div class="alert alert-success">{{Session::get('msg')}}</div>
                </div>
            @endif
        </div>
         <div class="card-body pt-0 fs-6 py-8 px-8  px-lg-10 text-gray-700">
        <table class="table table-responsive-sm align-middle  table-striped table-bordered table-row-dashed fs-6 gy-5 dataTable no-footer w-100" > 

                        <div class="table-responsive">
                            <table class="table" id="tt">
                                <thead>
                                <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                        <!-- <th>Sr No.</th> -->
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
                        </div>
 
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
    var _token = $('input[name="_token"]').val();

fetch_data();

function fetch_data(from_date = '', to_date = '')
{
 $.ajax({
  url:"{{ url('daterange/fetch_data') }}",
  method:"POST",
  data:{from_date:from_date, to_date:to_date, _token:_token},
  dataType:"json",
  success:function(data)
  {
    // console.log(data)
   var output = '';
   $('#total_records').text(data.length);
   for(var count = 0; count < data.length; count++)

   {
    
    var ss = data[count].shift_start;
    var se =   data[count].shift_end;

    if(ss != null && se != null){
         var ttl_duration = TimeDiff(se, ss);
     }else{
        ss = null;
        se = null;
     }

    var tb = data[count].tea_break;
    var tbo =   data[count].tea_break_out;
    if(tb != null && tbo != null){
         var ttl_tea = TimeDiff2(tbo, tb);
     }else{
        tb = null;
        tbo = null;
     }

    var lb = data[count].lunch_break;
    var lbo =   data[count].lunch_break_out;

    if(lb != null && lbo != null){
        var ttl_lunch = TimeDiff3(lbo, lb);
     }else{
        lb = null;
        lbo = null;
     }


    var mb = data[count].meeting_break;
    var mbo =   data[count].meeting_break_out;

    if(mb != null && mbo != null){
        var ttl_meeting = TimeDiff4(mbo, mb);
     }else{
        mb = null;
        mbo = null;
     }
   
    

    
    
      

    let mainurl = '{{url('/')}}'+'/attendance/'+data[count].id+"/edit";
    let user_names = (data[count].emp_name == null) ? data[count].first_name +" "+ data[count].last_name : data[count].emp_name;
   
    output += '<tr class="border-top border-light">';
  
    // output += '<td>' + data[count].id + '</td>';
    output += '<td>' + data[count].first_name  +' '+ data[count].last_name +'</td>';
    output += '<td>' + data[count].date + '</td>';
    output += '<td>' + data[count].shift_start + '</td>';
    output += '<td>' + data[count].shift_end + '</td>';
    output += '<td>' + ttl_duration + '</td>';
    output += '<td>' + ttl_tea + '</td>';
    output += '<td>' + ttl_lunch + '</td>';
    output += '<td>' + ttl_meeting + '</td>';
    output += '<td><button type="button" class="btn  btn-xs delete" id="'+data[count].id+'"><i class="fa fa-lg  fa-trash"></i> </button></td><td><a href='+mainurl+' id="'+data[count].id+'" class="btn  btn-sm"><i class="fa fa-2xs fa-edit"></i></a></td>';

    

    output += '</tr>';

   }
   $('tbody').html(output);
  }
 })
}

$('#filter').click(function(){
 var from_date = $('#from_date').val();
 var to_date = $('#to_date').val();
 // var employe = $('#employe').val();
 // alert(employe);
 if(from_date != '' &&  to_date != '' )
 {
  fetch_data(from_date, to_date);

 }
 // else
 // {
 //  alert('Both Date and Employee name is required');
 // }
});

fetch_data2();
function fetch_data2(employe ='')
{
 $.ajax({
  url:"{{ url('daterange/fetch_data2') }}",
  method:"POST",
  data:{employe:employe, _token:_token},
  dataType:"json",
  success:function(data)
  {
    // console.log(data)
   var output = '';
   $('#total_records').text(data.length);
   for(var count = 0; count < data.length; count++)

   {
    
    var ss = data[count].shift_start;
    var se =   data[count].shift_end;

    if(ss != null && se != null){
         var ttl_duration = TimeDiff(se, ss);
     }else{
        ss = null;
        se = null;
     }

    var tb = data[count].tea_break;
    var tbo =   data[count].tea_break_out;
    if(tb != null && tbo != null){
         var ttl_tea = TimeDiff2(tbo, tb);
     }else{
        tb = null;
        tbo = null;
     }

    var lb = data[count].lunch_break;
    var lbo =   data[count].lunch_break_out;

    if(lb != null && lbo != null){
        var ttl_lunch = TimeDiff3(lbo, lb);
     }else{
        lb = null;
        lbo = null;
     }


    var mb = data[count].meeting_break;
    var mbo =   data[count].meeting_break_out;

    if(mb != null && mbo != null){
        var ttl_meeting = TimeDiff4(mbo, mb);
     }else{
        mb = null;
        mbo = null;
     }
   

    let mainurl = '{{url('/')}}'+'/attendance/'+data[count].id+"/edit";
    let user_names = (data[count].emp_name == null) ? data[count].first_name +" "+ data[count].last_name : data[count].emp_name;
   
    output += '<tr class="border-top border-light">';
  
    // output += '<td>' + data[count].id + '</td>';
    output += '<td>' + data[count].first_name  +' '+ data[count].last_name +'</td>';
    output += '<td>' + data[count].date + '</td>';
    output += '<td>' + data[count].shift_start + '</td>';
    output += '<td>' + data[count].shift_end + '</td>';
    output += '<td>' + ttl_duration + '</td>';
    output += '<td>' + ttl_tea + '</td>';
    output += '<td>' + ttl_lunch + '</td>';
    output += '<td>' + ttl_meeting + '</td>';
    output += '<td><button type="button" class="btn  btn-xs delete" id="'+data[count].id+'"><i class="fa fa-lg  fa-trash"></i> </button></td><td><a href='+mainurl+' id="'+data[count].id+'" class="btn  btn-sm"><i class="fa fa-2xs fa-edit"></i></a></td>';

    

    output += '</tr>';

   }
   $('tbody').html(output);
  }
 })
}


 $(document).on("change","#employe",function(){
 // var from_date = $('#from_date').val();
 // var to_date = $('#to_date').val();
 var employe = $('#employe').val();
// alert(employe);
 if(employe != '')
 {
    fetch_data2(employe);
 }
 else
 {
  alert('Employee name is required');
 }
});

$('#refresh').click(function(){
 $('#from_date').val('');
 $('#to_date').val('');
 $('#employe').val('');
 fetch_data();
});

$(document).on('click', '.delete', function(){
  var id = $(this).attr("id");
  if(confirm("Are you sure you want to delete this records?"))
  {
   $.ajax({
    url:"{{ url('delete_data') }}",
    method:"POST",
    data:{id:id, _token:_token},
    success:function(data)
    {
     $('#message').html(data);
     fetch_data();
    }
   });
  }
 });



});

function TimeDiff(se, ss) {

      var first = se.split(":");
      var second = ss.split(":");
      var xx;
      var yy;

  if (parseInt(first[0]) < parseInt(second[0])) {
    if (parseInt(first[1]) < parseInt(second[1])) {
      yy = parseInt(first[1]) + 60 - parseInt(second[1]);
      xx = parseInt(first[0]) + 24 - 1 - parseInt(second[0]);
    } else {
      yy = parseInt(first[1]) - parseInt(second[1]);
      xx = parseInt(first[0]) + 24 - parseInt(second[0]);
    }
  } else if (parseInt(first[0]) == parseInt(second[0])) {
    if (parseInt(first[1]) < parseInt(second[1])) {
      yy = parseInt(first[1]) + 60 - parseInt(second[1]);
      xx = parseInt(first[0]) + 24 - 1 - parseInt(second[0]);
    } else {
      yy = parseInt(first[1]) - parseInt(second[1]);
      xx = parseInt(first[0]) - parseInt(second[0]);
    }
  } else {
    if (parseInt(first[1]) < parseInt(second[1])) {
      yy = parseInt(first[1]) + 60 - parseInt(second[1]);
      xx = parseInt(first[0]) - 1 - parseInt(second[0]);
    } else {
      yy = parseInt(first[1]) - parseInt(second[1]);
      xx = parseInt(first[0]) - parseInt(second[0]);
    }
  }

  if (xx < 10) {
    xx = "0" + xx;
  }

  if (yy < 10) {
    yy = "0" + yy;
  }

  return xx + ":" + yy;

}
 

function TimeDiff2(tbo, tb) {
      var first = tbo.split(":");
      var second = tb.split(":");
      var xx;
      var yy;
  if (parseInt(first[0]) < parseInt(second[0])) {
    if (parseInt(first[1]) < parseInt(second[1])) {
      yy = parseInt(first[1]) + 60 - parseInt(second[1]);
      xx = parseInt(first[0]) + 24 - 1 - parseInt(second[0]);
    } else {
      yy = parseInt(first[1]) - parseInt(second[1]);
      xx = parseInt(first[0]) + 24 - parseInt(second[0]);
    }
  } else if (parseInt(first[0]) == parseInt(second[0])) {
    if (parseInt(first[1]) < parseInt(second[1])) {
      yy = parseInt(first[1]) + 60 - parseInt(second[1]);
      xx = parseInt(first[0]) + 24 - 1 - parseInt(second[0]);
    } else {
      yy = parseInt(first[1]) - parseInt(second[1]);
      xx = parseInt(first[0]) - parseInt(second[0]);
    }
  } else {
    if (parseInt(first[1]) < parseInt(second[1])) {
      yy = parseInt(first[1]) + 60 - parseInt(second[1]);
      xx = parseInt(first[0]) - 1 - parseInt(second[0]);
    } else {
      yy = parseInt(first[1]) - parseInt(second[1]);
      xx = parseInt(first[0]) - parseInt(second[0]);
    }
  }

  if (xx < 10) {
    xx = "0" + xx;
  }

  if (yy < 10) {
    yy = "0" + yy;
  }

  return xx + ":" + yy;
}

function TimeDiff3(lbo, lb) {
      var first = lbo.split(":");
      var second = lb.split(":");
      var xx;
      var yy;
  if (parseInt(first[0]) < parseInt(second[0])) {
    if (parseInt(first[1]) < parseInt(second[1])) {
      yy = parseInt(first[1]) + 60 - parseInt(second[1]);
      xx = parseInt(first[0]) + 24 - 1 - parseInt(second[0]);
    } else {
      yy = parseInt(first[1]) - parseInt(second[1]);
      xx = parseInt(first[0]) + 24 - parseInt(second[0]);
    }
  } else if (parseInt(first[0]) == parseInt(second[0])) {
    if (parseInt(first[1]) < parseInt(second[1])) {
      yy = parseInt(first[1]) + 60 - parseInt(second[1]);
      xx = parseInt(first[0]) + 24 - 1 - parseInt(second[0]);
    } else {
      yy = parseInt(first[1]) - parseInt(second[1]);
      xx = parseInt(first[0]) - parseInt(second[0]);
    }
  } else {
    if (parseInt(first[1]) < parseInt(second[1])) {
      yy = parseInt(first[1]) + 60 - parseInt(second[1]);
      xx = parseInt(first[0]) - 1 - parseInt(second[0]);
    } else {
      yy = parseInt(first[1]) - parseInt(second[1]);
      xx = parseInt(first[0]) - parseInt(second[0]);
    }
  }
  if (xx < 10) {
    xx = "0" + xx;
  }

  if (yy < 10) {
    yy = "0" + yy;
  }

  return xx + ":" + yy;
}

function TimeDiff4(mbo, mb) {
      var first = mbo.split(":");
      var second = mb.split(":");
      var xx;
      var yy;
  if (parseInt(first[0]) < parseInt(second[0])) {
    if (parseInt(first[1]) < parseInt(second[1])) {
      yy = parseInt(first[1]) + 60 - parseInt(second[1]);
      xx = parseInt(first[0]) + 24 - 1 - parseInt(second[0]);
    } else {
      yy = parseInt(first[1]) - parseInt(second[1]);
      xx = parseInt(first[0]) + 24 - parseInt(second[0]);
    }
  } else if (parseInt(first[0]) == parseInt(second[0])) {
    if (parseInt(first[1]) < parseInt(second[1])) {
      yy = parseInt(first[1]) + 60 - parseInt(second[1]);
      xx = parseInt(first[0]) + 24 - 1 - parseInt(second[0]);
    } else {
      yy = parseInt(first[1]) - parseInt(second[1]);
      xx = parseInt(first[0]) - parseInt(second[0]);
    }
  } else {
    if (parseInt(first[1]) < parseInt(second[1])) {
      yy = parseInt(first[1]) + 60 - parseInt(second[1]);
      xx = parseInt(first[0]) - 1 - parseInt(second[0]);
    } else {
      yy = parseInt(first[1]) - parseInt(second[1]);
      xx = parseInt(first[0]) - parseInt(second[0]);
    }
  }
  if (xx < 10) {
    xx = "0" + xx;
  }

  if (yy < 10) {
    yy = "0" + yy;
  }

  return xx + ":" + yy;
}

</script>






