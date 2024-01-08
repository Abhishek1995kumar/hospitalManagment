@extends('layouts.app')
@section('content')
@section('page_css')
    <link rel="stylesheet" href="{{ asset('assets/css/int-tel/css/intlTelInput.css') }}">
    <style>
        a { text-decoration:None; }
        .form-control { 
            width:100%;
            padding: 0.20rem 0.70rem; 
            border: 1px solid #a1a5b7; 
            border-radius:4px;

        }
    </style>
@endsection
@section('header_toolbar')
    <div class="toolbar" id="kt_toolbar">
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                 data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                 class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Edit Ticket Master</h1>
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
        <form action="{{ url('ticketcustom/' .$ticket->id) }}" method="post">
        {!! csrf_field() !!} @method("PATCH")
        <div class="form-group row">
            <div class="col-sm-3">
                <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-1"> Ticket id:</label>
                <input type="text" name="ticket_id" id="ticket_id" class="form-control" value="{{$ticket->ticket_id}}" readonly>
            </div>
            <div class="col-sm-3">
                <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-1"> Ticket By:</label>
                <input type="text" name="ticket_by" id="ticket_by" class="form-control" value="{{$ticket->ticket_by}}" readonly>
            </div>
            <div class="col-sm-3">
                <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-1"> Ticket For:</label>
                <select style="width:100%;" name="ticket_for" id="ticket_for" class="form-control" >
                @foreach($ticket1 as $data)
                <option value="{{ $data->u_id }}" {{$ticket->ticket_for == $data->u_id  ? 'selected' : ''}}>{{ $data->first_name}} {{$data->last_name}}</option>
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
            <select style="width:100%;" name="manager" id="manager" class="form-control" value="{{$ticket->manager}}">
            <option>-- select ticket --</option>
              @foreach($ticket1 as $data)
              <option value="{{ $data->mid }}" {{$ticket->manager == $data->mid  ? 'selected' : ''}}>{{ $data->manager_name}} {{$data->manager_last}}</option>
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
                <input type="text" name="purpose" id="purpose" class="form-control" value="{{$ticket->purpose}}">
            </div>
            <div class="col-sm-6">
                <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-1"> Priority:</label>
                <select style="width:100%;" class="form-control" id="priority" name="priority" value="">
                    @foreach ($priority_val as $item)
                    <option <?php echo $item->priority == 'Low' ?  "selected" : "" ?> value="Low">Low</option>
                    <option <?php echo $item->priority == 'High' ?  "selected" : "" ?> value="High">High</option>
                    <option <?php echo $item->priority == 'Medium' ?  "selected" : "" ?> value="Medium">Medium</option>
                    <option <?php echo $item->priority == 'Urgent' ?  "selected" : "" ?> value="Urgent">Urgent</option>
                    @endforeach 
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
                <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-1"> Start Date:</label>
                <input type="text" name="start_date" id="start_date" class="form-control" value="{{$ticket->start_date}}">
            </div>
            <div class="col-sm-3">
                <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-1"> End Date:</label>
                <input type="text" name="end_date" id="end_date" class="form-control" value="{{$ticket->end_date}}">
            </div>
            <div class="col-sm-3">
                <label for="ven_name" class="form-label fs-6 fw-bolder text-gray-700 mb-1">Cancelled Check-File Upload</label> 
                <input type="file" name="upload_document_ticket" id="upload_document_ticket" class="form-control upload_document_ticket">
            </div>
        </div>
        <div align="left" class="form-group" style="margin-top:2rem;">
            <input type="submit" value="Update" name="submitdt" id="submitdt" class="border border-2 btn btn-primary py-2" />
        </div>
    </form>
   
  </div>
</div>
 
@stop