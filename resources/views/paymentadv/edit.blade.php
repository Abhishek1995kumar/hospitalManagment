@extends('layouts.app')
@section('title')
{{ __('Edit Advance Payment System') }}
    @endsection
@section('page_css')
    <link rel="stylesheet" href="{{ asset('assets/css/int-tel/css/intlTelInput.css') }}">
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
            <a href="{{ route('paymentadv') }}"
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
                    <form action="{{url('paymentadv/edit/'.$paymentadvs->id)}}" method="post" id="paymentad" name="paymentad">
                    @csrf
                        <div class="row gx-10 mb-5">
                            <div class="col-md-6">
                                <div class="form-group mb-5">
                                    <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">MR No :</label>
                                    <select class="form-select" name="patientpaymentadv_name" id="patientpaymentadv_name" required>
                                        <option value="">--Select Patient name--</option>
                                            @foreach($patientpaymentadv as $items)
                                        <option value="{{$items->id}}" {{$paymentadvs->patientpaymentadv_name == $items->id  ? 'selected':''}}>{{$items->full_name}}{{'( Patient_00'.$items->id.')'}}</option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Payment Receipt No :</label>
                                    <input type="text" class="form-control  receiptpaymentadv_name" id="receiptpaymentadv_name"   value="{{$paymentadvs->receiptpaymentadv_name}}" name="receiptpaymentadv_name" readonly/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-5">
                                    <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Amount:</label>
                                    <input type="text" class="form-control  ammount_paymentadv" required  id="ammount_paymentadv" name="ammount_paymentadv" value="{{$paymentadvs->ammount_paymentadv}}" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-5">
                                    <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Date:</label>
                                    <input type="date" class="form-control billdate" required name="date"  value="{{$paymentadvs->date}}" id="date">
                               
                                </div>
                            </div>
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-primary mt-3">save </button>
                        </div>
                   </form>
                </div>
            </div>
        </div>
</div>
   @endsection







