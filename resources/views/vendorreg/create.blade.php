@extends('layouts.app')
@section('title')
    {{ __('messages.vendorreg') }}
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
                <a href="{{ route('vendorreg') }}"
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
                    <form action="{{url('vendorreg/create')}}" method="post" id="addvendor" name="addvendor" enctype="multipart/form-data">
                        @csrf
                        <div class="row gx-10 mb-5">
                            <div class="col-md-3">
                                <div class="form-group mb-5">
                               
                               
                                    <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3"> Reference Code :</label>
                                    
                                    <input type="text" name="reference_code" id="reference_code"   value="VEN{{ $lastId }}"   class="form-control"  readonly>
                                </div>
                            </div>  
                            <div class="col-md-3">
                                <div class="form-group mb-5">
                                    <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Vendor Name :</label>
                                    <input type="text" name="v_name" id="v_name"  class="form-control" >
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-5">
                                    <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Mobile :</label>
                                    <input type="text" name="mobile" id="mobile"  class="form-control" minlength="10" maxlength="10" >
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-5">
                                    <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Email :</label>
                                    <input type="email" name="email" id="email"  class="form-control" >
                                </div>
                            </div> 
                            <div class="col-md-3">
                                <div class="form-group mb-5">
                                    <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Alternate Mobile</label> 
                                    <input type="text" name="alternate_mobile" id="alternate_mobile" class="form-control" minlength="10" maxlength="10" >
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-5">
                                    <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Alternate Vendor Name</label> 
                                    <input type="text" name="alternate_vendor_name" id="alternate_vendor_name" class="form-control" >
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-5">
                                     <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Vendor Name AS PerInvocing</label> 
                                    <input type="text" name="v_perinvocing" id="v_perinvocing"  class="form-control " >
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-5">
                                    <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">GST NO</label> 
                                    <input type="text" name="gst_no" id="gst_no"  class="form-control" >
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-5">
                                    <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">PAN NO</label> 
                                    <input type="text" name="pan_no" id="pan_no" class="form-control " >
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-5">
                                    <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">License No</label> 
                                    <input type="text" name="license_no" id="license_no"  class="form-control " >
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-5">
                                    <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Tranportation Mode</label> 
                                    <input type="text" name="transportation_mode" id="transportation_mode"  class="form-control " >
                                </div>
                            </div>      
                            <div class="col-md-3">
                                <div class="form-group mb-5">
                                    <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Buliding</label> 
                                    <input type="text" name="buliding" id="buliding"  class="form-control" >
                                </div>
                            </div>      
                            <div class="col-md-3">
                                <div class="form-group mb-5">
                                    <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Street</label> 
                                    <input type="text" name="street" id="street"  class="form-control" >
                                </div>
                            </div>      
                            <div class="col-md-3">
                                <div class="form-group mb-5">
                                    <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Suburb</label> 
                                    <input type="text" name="suburb" id="suburb"  class="form-control" >
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-5">
                                    <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Zip Code</label> 
                                    <input type="text" name="zipcode" id="zipcode"  class="form-control" >
                                </div>
                            </div>  
                            <div class="col-md-3">
                                <div class="form-group mb-5">
                                    <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Country</label> 
                                    <select id="country" class="form-control form-select" name="country">
                                            @foreach( $country as $countries)
                                            <option value="{{ $countries->id }}">{{ $countries->name}}</option>
                                            @endforeach
                                    </select>
                                    
                                </div>
                            </div>  
                             <div class="col-md-3">
                                <div class="form-group mb-5">
                                    <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">State</label>
                                     <select id="state" class="form-control state" name="state">
                                        <option value="">Select Country first</option>
                                    </select>
                                </div>
                            </div>   
                            <div class="col-md-3">
                                <div class="form-group mb-5">
                                    <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">City</label>
                                    <select id="city" class="form-control city" name="city">
                                        <option value="">Select state first</option>
                                    </select>  
                                </div>
                            </div>    
                            <div class="col-md-3">
                                <div class="form-group mb-5">
                                    <label for="ven_name" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Bank Name</label> 
                                    <input type="text" name="bank_name" id="bank_name"  class="form-control " >  
                                </div>
                            </div>    
                            <div class="col-md-3">
                                <div class="form-group mb-5">
                                    <label for="ven_name" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Registered Name</label> 
                                    <input type="text" name="register_name" id="register_name"  class="form-control " > 
                                </div>
                            </div>   
                            <div class="col-md-3">
                                <div class="form-group mb-5">
                                    <label for="ven_name" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Account Number</label> 
                                    <input type="text" name="account_number" id="account_number"  class="form-control " >
                                </div>
                            </div>   
                            <div class="col-md-3">
                                <div class="form-group mb-5">
                                    <label for="ven_name" class="form-label fs-6 fw-bolder text-gray-700 mb-3">IFSC Code</label> 
                                    <input type="text" name="ifsc_code" id="ifsc_code"  class="form-control " >
                                </div>
                            </div>   
                            <div class="col-md-3">
                                <div class="form-group mb-5">
                                    <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Account Type</label>
                                    <select id="account_type" class="form-control" name="account_type">
                                        <option value="Saving">Saving</option>
                                        <option value="Current">Current</option>
                                    </select>
                                </div>
                            </div>   
                            <div class="col-md-3">
                                <div class="form-group mb-5">
                                    <label for="ven_name" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Cancelled Check-File Upload</label> 
                                    <input type="file" name="upload_document" id="upload_document" class="form-control upload_document">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="" class="control-label fs-6 fw-bolder text-gray-700 mb-3 ">Vendor Category :</label>
                                <select class="form-control vender_category"  name="vender_category[]"   multiple="multiple">
                                        @foreach( $vcateg as $items)
                                        <option value="{{ $items->cat_id }}">{{ $items->cat_name}}</option>
                                        @endforeach
                                </select>
                            </div>
                            
                           
                        </div>
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-primary">save </button>
                        </div>
                    </form>  
                </div>
            </div>
        </div>
    </div>

@endsection

@section('page_scripts')
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/int-tel/js/intlTelInput.min.js') }}"></script>
    <script src="{{ asset('assets/js/int-tel/js/utils.min.js') }}"></script>
@endsection
@section('scripts')
    <script>
        let utilsScript = "{{asset('assets/js/int-tel/js/utils.min.js')}}";
        let isEdit = false;
        let defaultAvatarImageUrl = "{{ asset('assets/img/avatar.png') }}";
    </script>
    <script src="{{ mix('assets/js/patients/create-edit.js') }}"></script>
    <script src="{{ mix('assets/js/custom/add-edit-profile-picture.js') }}"></script>
    <script src="{{ mix('assets/js/custom/phone-number-country-code.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>
    

                                <script>
                                $(document).ready(function(){
                                    $('#country').change(function(){
                                    var countryID = $(this).val();  
                                    if(countryID){
                                        $.ajax({
                                        type:"GET",
                                        url:"{{url('fetch_state')}}?country_id="+countryID,
                                        success:function(res){        
                                        if(res){
                                            $("#state").empty();
                                            $("#state").append('<option>Select State</option>');
                                            $.each(res,function(key,value){
                                            $("#state").append('<option value="'+key+'">'+value+'</option>');
                                            });
                                        
                                        }else{
                                            $("#state").empty();
                                        }
                                        }
                                        });
                                    }else{
                                        $("#state").empty();
                                        $("#city").empty();
                                    }   
                                    });

                                    $('#state').on('change',function(){
                                        var stateID = $(this).val();  
                                        if(stateID){
                                            $.ajax({
                                            type:"GET",
                                            url:"{{url('getCity')}}?state_id="+stateID,
                                            success:function(res){        
                                            if(res){
                                                $("#city").empty();
                                                $("#city").append('<option>Select City</option>');
                                                $.each(res,function(key,value){
                                                $("#city").append('<option value="'+key+'">'+value+'</option>');
                                                });
                                            
                                            }else{
                                                $("#city").empty();
                                            }
                                            }
                                            });
                                        }else{
                                            $("#city").empty();
                                        }
                                            
                                        });
                                
                                });
                                
                           
                                </script>      
                                       
                            <script>
                               
                                    $(".vender_category").select2({
                                      
                                    });

                            </script>
                            <script>
                                $('.select2-multi').select2();
                            </script>

        @endsection








