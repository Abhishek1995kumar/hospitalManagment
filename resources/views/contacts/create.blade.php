@extends('layouts.app')
@section('title')
    {{ __('Add Live Patients') }}
    @endsection
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
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">@yield('title')</h1>
            </div>
            <div class="d-flex align-items-center py-1">
                <a href="{{ route('contact.index') }}"
                   class="btn btn-sm btn-light btn-active-light-primary pull-right">{{ __('messages.common.back') }}</a>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="d-flex flex-column flex-lg-row">
        <div class="flex-lg-row-fluid mb-10 mb-lg-0 me-lg-7 me-xl-10">
            <div class="row">
                <div class="col-12">
                    @include('layouts.errors')
                </div>
            </div>
           
            <div class="card">
                <div class="card-body p-12">
      
        <form action="{{ url('contact') }}" method="post">
            {!! csrf_field() !!}
            <div class="form-group row">
                <div class="col-lg-6">
                    <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-1"> Visit and reference:</label>
                    <select style="width:100%;" id="visitreference" name="visitreference" class="form-control" required>
                    <option value="">--Select Visit--</option>
                    <option value="Walkin">Walk In</option>
                    <option value="Appointment">Appointment</option>
                    </select>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>
                    <script type="text/javascript">
                        width: '100%',
                        $("#visitreference").select2({ });
                    </script>
            </div>
                <div class="col-lg-6">
                        <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-1"> Name:</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name" required>
                </div>
            </div>
            <div class="form-group row" style="margin-top:2rem;">
                <div class="col-lg-6">
                    <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-1"> Appointment Type:</label>
                    <select style="width:100%;" id="appointmenttype" name="appointmenttype" class="form-control" required>
                        <option value="">--Select Appointment--</option>
                        <option value="Old">Old</option>
                        <option value="New">New</option>
                    </select>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>
                    <script type="text/javascript">
                        width: '100%',
                        $("#appointmenttype").select2({ });
                    </script>
                </div>
                <div class="col-lg-6">
                    <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-1"> Select Doctor:</label>
                    <select style="width:100%;" id="doctor" class="form-control" name="doctor" required>
                        <option value="">--Select Doctor--</option>
                        @foreach($doctorref as $items)
                        <option value="{{ $items->id }}">{{$items->full_name}}</option>
                        @endforeach
                    </select>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>
                    <script type="text/javascript">
                        width: '100%',
                        $("#doctor").select2({ });
                    </script>      
                </div>
            </div>
            <div class="form-group" style="margin-top:2rem;">
                <input type="submit" value="Save" class="border border-2 btn btn-primary py-2">
            </div>
        </form>
  
    </div>
</div>
</div></div>
@stop