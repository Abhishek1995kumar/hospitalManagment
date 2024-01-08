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
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">TPA Master</h1>
            </div>
            <div class="d-flex align-items-center py-1">
                <a href="{{ route('tpamaster.index') }}"
                   class="btn btn-sm btn-light btn-active-light-primary pull-right">{{ __('messages.common.back') }}</a>
            </div>
        </div>
    </div>
@endsection
<div class="card">
  <div class="card-body">
        <form action="{{url('tpamaster/add')}}" method="post" id="addtpa" name="addtpa">
        @csrf
        <div class="form-group row">
            <div class="col-lg-6">
                <label class="form-label fs-6 fw-bolder text-gray-700 mb-1">Payment Mode</label>
                <select style="width:100%;" id="tpapaymentmode" name="tpapaymentmode" class="form-control" required>
                    <option value="">--Select Payment Mode--</option>
                    @foreach( $pharamaone as $items)
                    <option value="{{ $items->id }}">{{ $items->paymentmode}}</option>
                    @endforeach
                </select>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>
                <script type="text/javascript">
                    width: '100%',
                    $("#tpapaymentmode").select2({ });
                </script>  
            </div>  
            <div class="col-lg-6">                                   
                <label class="form-label fs-6 fw-bolder text-gray-700 mb-1">Payment Type</label>
                <input type="text" name="tpapaymenttype" id="tpapaymenttype" class="form-control" required>
            </div>
        </div><br><br>
        <div align="left" class="form-group">
            <input type="submit" value="Save" class="border border-2 btn btn-primary py-2">
        </div>
    </form>
  </div>
</div> 

<!-- <script>$(document).ready(function(){$('.selectpicker').selectpicker();$('#framework').change(function(){ $('#hidden_framework').val($('#framework').val());});}); </script>
 -->
@stop