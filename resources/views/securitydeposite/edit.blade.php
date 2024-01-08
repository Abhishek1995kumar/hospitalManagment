<!-- Abhishek Code -->
@extends('layouts.app')
@section('title')
{{ __('Security Deposit') }}
    @endsection
@section('page_css')
    <link rel="stylesheet" href="{{ asset('assets/css/int-tel/css/intlTelInput.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>
    <style>
        .padd{
            padding:0.25rem 0.70rem;
            border:1px solid #a1a5b7;
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
                <a href="{{ route('securitydeposite') }}"
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
                    
                <form action="{{url('securitydeposite/add')}}" method="post" id="securitydepo" name="securitydepo">
                    @csrf
                    <div class="row gx-10 mb-5">
                        <div class="col-md-6">
                            <div class="form-group mt-5 mb-5">
                                <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-1">Patient Name :</label>
                                <select style="width:100%;" class="form-control" data-live-search="true"  name="patientsecurity_name" id="patientsecurity_name" required>
                                    <option value="">--Select Patient name--</option>
                                    @foreach($patientsecurity as $items)
                                    <option value="{{ $items->id }}" {{$securtiydeposite->patientsecurity_name == $items->id ? 'selected' : ''}}>{{'( Patient_00'.$items->id.')'}} - {{ $items->full_name}}</option>
                                    @endforeach
                                </select>
                                <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>
                                <script>
                                    width:'100%',
                                    $('#patientsecurity_name').select2({ });
                                </script>
                            </div>
                        </div>
                                       
                        <div class="col-md-6">
                            <div class="form-group mt-5">
                                <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-1">Receipt No :</label>
                                <input type="text" class="padd form-control  receipt_name" id="receipt_name"   value="{{$securtiydeposite->receipt_name}}" name="receipt_name" readonly/>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group mt-5 mb-5">
                                <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-1">Amount:</label>
                                <input type="text" class="padd form-control  ammount_security" required  id="ammount_security" name="ammount_security" value="{{$securtiydeposite->ammount_security}}" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group mt-5 mb-5">
                                <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-1">Date:</label>
                                <input type="date" class="padd form-control billdate" required name="date"  value="{{$securtiydeposite->date}}" id="date">
                            </div>
                        </div>

                        <div class="form-group mt-5">
                            <button type="submit" name="submit" class="border border-2 py-2 btn btn-primary mt-3">save </button>
                        </div>
                   </form>
                </div>
            </div>
        </div>
</div>
@endsection









