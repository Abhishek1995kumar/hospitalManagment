@extends('layouts.app')
@section('title')
{{ __('Appointment') }}
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
                <a href="{{ route('patienthms') }}"
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
                    
                <form action="{{url('patienthms/add')}}" method="post" id="doctoranalysis" name="doctoranalysis">
                    @csrf
                        <div class="row gx-10 mb-5">
                        <div class="col-md-3">
                                        <div class="form-group mb-5">
                                        <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Patient Name:</label>
                                           
                                        <input class='form-control  select2Patient' name="patient"  id="patient" >  
                    </div>
                </div>

                           


                             
                            <div class="col-md-3">
                                <div class="form-group mb-5">
                                        <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Mobile No :</label>
                                         <input type="text" name="mobileno" id="mobileno"    class="form-control" required>

                                 </div>
                            </div>


                            <div class="col-md-3">
                                <div class="form-group mb-5">
                                        <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Location:</label>
                                        <input type="text" name="location" id="location" class="form-control" >   

                                 </div>
                            </div>

                           <div class="col-md-3">
                                <div class="form-group mb-5">
                                <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3"> Doctor Department :</label>
                                    <select class="form-select patientType" id="doctordepartments" name="doctordepartments" required>
                                        <option>--select Operating doctor--</option>
                                      
                                    
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-3">
                                        <div class="form-group mb-5">
                                        <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Doctor:</label>
                                        <input type="text" name="doctor" id="doctor" class="form-control">   
                                 </div>
                            </div>

                            <div class="col-md-3">
                                        <div class="form-group mb-5">
                                        <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Description:</label>
                                        <input type="text" name="description" id="description" class="form-control" >   
                                    </div>
                              </div>
                              <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-primary mt-3">save </button>
                        </div>
                        </form>
                </div>
   @endsection







