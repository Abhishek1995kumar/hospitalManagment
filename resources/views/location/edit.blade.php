@extends('layouts.app')
@section('title')
    {{ __('Edit Location Master') }}
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
                <a href="{{ route('location') }}"
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
                    
                <form action="{{url('location/edit/'.$location->id)}}" method="post" id="updatelocation" name="updatepharma">                    @csrf
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <label class="form-label fs-6 fw-bolder text-gray-700 mb-1">Location Name</label>
                            <input type="text" name="lname" id="lname" value="{{$location->lname}}" class="form-control" required>
                        </div>
                        <div class="col-sm-3">
                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-1">Alternate Location Name</label>
                            <input type="text" name="alname" id="alname" value="{{$location->alname}}" class="form-control" required>
                        </div>
                        <div class="col-sm-3">
                            <label class="form-label fs-6 fw-bolder text-gray-700 mb-1">Specialization</label>
                            <input type="text" name="specialization" id="specialization" value="{{$location->specialization}}" class="form-control" required>
                        </div> 
                        <div class="col-sm-3">
                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-1">Constitution</label>
                        <input type="text" name="constitution" id="constitution" value="{{$location->constitution}}" class="form-control" required> 
                        </div>
                    </div>

                    <div class="form-group row" style="margin-top:2rem;">
                        <div class="col-sm-3">
                            <label class="form-label fs-6 fw-bolder text-gray-700 mb-1">Mobile</label>
                            <input type="number" name="mobile" id="mobile" value="{{$location->mobile}}" class="form-control" required>
                        </div>
                        <div class="col-sm-3">
                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-1">Email</label>
                            <input type="email" name="email" id="email" value="{{$location->email}}" class="form-control" required>
                        </div>
                        <div class="col-sm-3">
                            <label class="form-label fs-6 fw-bolder text-gray-700 mb-1">Phone No.</label>
                            <input type="number" name="phone" id="phone" value="{{$location->phone}}" class="form-control" required>
                        </div> 
                        <div class="col-sm-3">
                            <label class="form-label fs-6 fw-bolder text-gray-700 mb-1">Fax No.</label>
                            <input type="text" name="fax_no" id="fax_no" value="{{$location->fax_no}}" class="form-control" required>
                        </div> 
                    </div>
                    <div class="form-group row" style="margin-top:2rem;">
                        <div class="col-sm-3">
                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-1">Building</label>
                            <input type="text" name="building" id="building" value="{{$location->building}}" class="form-control" required>
                        </div>
                        <div class="col-sm-3">
                            <label class="form-label fs-6 fw-bolder text-gray-700 mb-1">Street</label>
                            <input type="text" name="street" id="street" value="{{$location->street}}" class="form-control" required>
                        </div>
                        <div class="col-sm-3">
                            <label class="form-label fs-6 fw-bolder text-gray-700 mb-1">Suburb</label>
                            <input type="text" name="suburb" id="suburb" value="{{$location->suburb}}" class="form-control" required>
                        </div>
                        <div class="col-sm-3">
                            <label class="form-label fs-6 fw-bolder text-gray-700 mb-1">Zip Code</label>
                            <input type="text" name="zip_code" id="zip_code" value="{{$location->zip_code}}" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group row" style="margin-top:2rem;">
                        <div class="col-sm-3">
                            <label class="form-label fs-6 fw-bolder text-gray-700 mb-1">GST No.</label>
                            <input type="text" name="gst" id="gst" value="{{$location->gst}}" class="form-control" required>
                        </div>
                        <div class="col-sm-3">
                            
                            <label class="form-label fs-6 fw-bolder text-gray-700 mb-1">Country</label>
                            <select style="width:100%;" name="country" id="country" class="form-control" >
                            @foreach($country as $country)
                                <option value="{{$country->id}}" {{$location->country == $country->id  ? 'selected' : ''}}>{{$country->name}}</option>
                            @endforeach   
                            </select>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>          
                            <script>
                                width:'100%',
                                $('#country').select2({ });
                            </script>
                        </div>
                        <div class="col-sm-3">
                            <label class="form-label fs-6 fw-bolder text-gray-700 mb-1">State</label>
                            <select style="width:100%;" id="state" class="form-control state" name="state">
                                @foreach($state as $state)
                                    <option value="{{$state->id}}" {{$location->state == $state->id  ? 'selected' : ''}}>{{$state->name}}</option>
                                @endforeach
                            </select>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>          
                            <script>
                                width:'100%',
                                $('#state').select2({ });
                            </script>
                        </div>
                        <div class="col-sm-3">
                            <label class="form-label fs-6 fw-bolder text-gray-700 mb-1">City</label>
                            <select style="width:100%;" id="city" class="form-control city" name="city">
                                @foreach($city as $city)
                                    <option value="{{$city->id}}" {{$location->city == $city->id  ? 'selected' : ''}}>{{$city->name}}</option>
                                @endforeach
                            </select>  
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>          
                            <script>
                                width:'100%',
                                $('#city').select2({ });
                            </script>
                        </div>
                    </div>
                    <div class="form-group row" style="margin-top:2rem;">
                        <div class="col-sm-3">
                            <label class="form-label fs-6 fw-bolder text-gray-700 mb-1">Financial Year</label>
                            <input type="text" name="financial_year" id="financial_year" value="{{$location->financial_year}}" class="form-control" required>
                        </div>
                        <div class="col-sm-3">
                            <label class="form-label fs-6 fw-bolder text-gray-700 mb-1">Drug & Lic. No.</label>
                            <input type="area" name="drug_lic_no" id="user_id" value="{{$location->drug_lic_no}}" class="form-control" required>
                        </div>
                    </div>
                    <div align="left" style="margin-top:1.5rem;">
                        <input type="submit" value="Update" class="border border-2 py-2 btn btn-success" id="submitdt"></br>
                    </div>
                </form>
   
            </div>
        </div>
    </div>
@stop
<script src="https://code.jquery.com/jquery-3.6.1.slim.js" integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>






















