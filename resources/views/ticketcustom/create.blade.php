@extends('layouts.app')
@section('content')
@section('page_css')
    <link rel="stylesheet" href="{{ asset('assets/css/int-tel/css/intlTelInput.css') }}">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        a { text-decoration:None; }
        .form-control { 
            width:100%;
            padding: 0.20rem 0.70rem; 
            border: 1px solid #a1a5b7; 
            border-radius:4px;

        }
    </style>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>
<script type="text/javascript">
    width: '100%',
    $("#vendor").select2({ });
</script> -->
@endsection
@section('header_toolbar')
    <div class="toolbar" id="kt_toolbar">
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                 data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                 class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Add Ticket Master</h1>
            </div>
            <div class="d-flex align-items-center py-1">
                <a href="{{ route('ticketcustom.index') }}"
                   class="btn btn-sm btn-light btn-active-light-primary pull-right">{{ __('messages.common.back') }}</a>
            </div>
        </div>
    </div>
@endsection
 
<div class="card">
    <div class="card-body">
        <form action="{{ url('ticketcustom') }}" method="post">
        {{csrf_field()}}
        <div class="form-group row">
            <div class="col-sm-3">
                <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-1"> Ticket id:</label>
                <input type="text" name="ticket_id" id="ticket_id" value="tick_00{{ $lastId }}" class="form-control"  readonly>
                <span class="text-danger error-text ticket_id_err"></span>
            </div>
            <div class="col-sm-3">
                <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-1"> Ticket By:</label>
                <input type="text" name="ticket_by" id="ticket_by" value="{{ $user_name->first_name }} {{ $user_name->last_name }}" class="form-control" readonly>
                    <span class="text-danger error-text ticket_by_err" ></span>
            </div>
            <div class="col-sm-3">
                <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-1"> Ticket For:</label>
                <select style="width:100%;" class="form-control" id="ticket_for" name="ticket_for">
                    <option value="0" disabled="true" selected="true">--select--</option>
                    @foreach($user as $item)
                    <option value="{{$item->id }}">{{$item->first_name}}</option>
                    @endforeach
                </select>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>
                <script type="text/javascript">
                    width: '100%',
                    $("#ticket_for").select2({ });
                </script>
            </div>
            <div class="col-sm-3">
                <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-1"> Manager:</label>
                <select style="width:100%;" class="form-control" id="manager" name="manager">
                    <option value="0" disabled="true" selected="true">--select--</option>
                    @foreach($user as $item)
                    <option value="{{$item->id }}">{{$item->first_name}}</option>
                    @endforeach
                </select>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>
                <script type="text/javascript">
                    width: '100%',
                    $("#manager").select2({ });
                </script>
            </div>
        </div>
        <div class="form-group row" style="margin-top:2rem;">
            <div class="col-sm-6">
            <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-1"> Purpose:</label>
                <input type="text" name="purpose" id="purpose" class="form-control">
                <span class="text-danger error-text purpose_err"></span>
            </div>
            <div class="col-sm-6">
                <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-1"> Priority-kjhgfghjklkjhgfghjk:</label>
                <select style="width:100%;" class="form-control" id="priority" name="priority">
                    <option value="0" disabled="true" selected="true">-- Select Priority --</option>
                    <option value="Low">Low</option>
                    <option value="High">High</option>
                    <option value="Medium">Medium</option>
                    <option value="Urgent">Urgent</option>
                </select>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>
                <script type="text/javascript">
                    width: '100%',
                    $("#priority").select2({ });
                </script>
            </div> 
        </div>
        <div class="form-group row" style="margin-top:2rem;">
            <div class="col-sm-3">
                <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-1">Start Date:</label>
                <input type="text" name="start_date" id="start_date" class="form-control" value="{{date('y-m-d')}}">
                <span class="text-danger error-text start_date_err"></span>
            </div>
            <div class="col-sm-3">
                <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-1"> End Date:</label>
                <input type="date" name="end_date" id="end_date" class="form-control">
            </div>
            <div class="col-sm-3">
                <label for="ven_name" class="form-label fs-6 fw-bolder text-gray-700 mb-1">File Upload:</label> 
                <input type="file" name="upload_document_ticket" id="upload_document_ticket" class="form-control upload_document_ticket">
            </div>
        </div>
        <br>
        
        <div align="left" class="form-group" style="margin-top:2rem;">
            <input type="submit" value="Save" name="submitdt" id="submitdt" class="border border-2 btn btn-primary py-2" />
        </div>
    </form>
  </div>
</div>
 
@stop

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<!--<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/base/jquery-ui.css" rel="stylesheet"/>-->

<script type="text/javascript">
    $(document).ready(function() {
        $("#submitdt").click(function(e){
            e.preventDefault();
            var _token = $("input[name='_token']").val();
            var ticket_id = $("#ticket_id").val();
            var ticket_by = $("#ticket_by").val();
            var ticket_for = $("#ticket_for").val();
            var manager = $("#manager").val();
            var purpose = $("#purpose").val();
            var priority = $("#priority").val();
            var start_date = $("#start_date").val();
            var end_date = $("#end_date").val();
            $.ajax({
                url: "{{ url('validation') }}",
                type:'POST',
                data: {_token:_token, ticket_id:ticket_id, ticket_by:ticket_by, ticket_for:ticket_for, manager:manager, purpose:purpose, priority:priority, start_date:start_date, end_date:end_date},
                success: function(data) {
                  console.log(data.error)
                    if($.isEmptyObject(data.error)){
                        window.location.href = '{{url('ticket')}}';
                    }else{
                        printErrorMsg(data.error);
                    }
                }
            });
        }); 

        function printErrorMsg (msg) {
            $.each( msg, function( key, value ) {
            console.log(key);
              $('.'+key+'_err').text(value);
            });
        }
    });
</script>