@extends('layouts.app')
@section('title')
    {{ __('Add Location Master') }}
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
                    
                <form action="{{url('location/add')}}" method="post" id="addlocation" name="addlocation">
                    @csrf
                    <!-- Location Name, Alternate Location Name, Specialization, Constitution -->
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <label class="form-label fs-6 fw-bolder text-gray-700 mb-1">Location Name:</label>
                            <input type="text" name="lname" id="lname" class="form-control" placeholder="Enter location" required>
                        </div>
                        <div class="col-sm-3">
                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-1">Alternate Location Name:</label>
                            <input type="text" name="alname" id="alname" placeholder="Enter Alternate location" class="form-control" required>
                        </div>
                        <div class="col-sm-3">
                            <label class="form-label fs-6 fw-bolder text-gray-700 mb-1">Specialization:</label>
                            <input type="text" name="specialization" id="specialization" placeholder="Enter Specialization" class="form-control" required>
                        </div> 
                        <div class="col-sm-3">
                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-1">Constitution:</label>
                        <input type="text" name="constitution" id="constitution" placeholder="Enter Constitution"  class="form-control" required> 
                        </div>
                    </div>

                    <!-- Mobile, Email, Phone No, Fax No -->
                    <div class="form-group row" style="margin-top: 1.5rem;">
                        <div class="col-sm-3 mt-5">
                            <label class="form-label fs-6 fw-bolder text-gray-700 mb-1">Mobile:</label>
                            <input type="number" name="mobile" id="mobile" placeholder="Enter Mobile" class="form-control" required>
                        </div>
                        <div class="col-sm-3 mt-5">
                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-1">Email:</label>
                            <input type="email" name="email" id="email" placeholder="Enter Email" class="form-control" required>
                        </div>
                        <div class="col-sm-3 mt-5">
                            <label class="form-label fs-6 fw-bolder text-gray-700 mb-1">Phone No:</label>
                            <input type="number" name="phone" id="phone"  placeholder=" Enter Phone No" class="form-control" required>
                        </div> 
                        <div class="col-sm-3 mt-5">
                            <label class="form-label fs-6 fw-bolder text-gray-700 mb-1">Fax No:</label>
                            <input type="text" name="fax_no" id="fax_no" placeholder="Enter Fax No" class="form-control" required>
                        </div> 
                    </div>

                    <!-- Building, Street, Suburb, Zip Code -->
                    <div class="form-group row" style="margin-top: 1.5rem;">
                        <div class="col-sm-3 mt-5">
                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-1">Building:</label>
                            <input type="text" name="building" id="building" placeholder="Enter Building" class="form-control" required>
                        </div>
                        <div class="col-sm-3 mt-5">
                            <label class="form-label fs-6 fw-bolder text-gray-700 mb-1">Street:</label>
                            <input type="text" name="street" id="street" placeholder="Enter Street" class="form-control" required>
                        </div>
                        <div class="col-sm-3 mt-5">
                            <label class="form-label fs-6 fw-bolder text-gray-700 mb-1">Suburb:</label>
                            <input type="text" name="suburb" id="suburb" placeholder="Enter Suburb" class="form-control" required>
                        </div>
                        <div class="col-sm-3 mt-5">
                            <label class="form-label fs-6 fw-bolder text-gray-700 mb-1">Zip Code:</label>
                            <input type="text" name="zip_code" id="zip_code" placeholder="Enter Zip Code" class="form-control" required>
                        </div>
                    </div>

                    <!-- GST No, Country, State, City -->
                    <div class="form-group row" style="margin-top: 1.5rem;">
                        <div class="col-sm-3 mt-5">
                            <label class="form-label fs-6 fw-bolder text-gray-700 mb-1">GST No:</label>
                            <input type="text" name="gst" id="gst"  placeholder="Enter GST No" class="form-control" required>
                        </div>
                        <div class="col-sm-3 mt-5">
                            
                            <label class="form-label fs-6 fw-bolder text-gray-700 mb-1">Country</label>
                            <select style="width:100%;" id="country" name="country" class="form-control" required>
                                <option value="">Select Country</option>
                                @foreach ($country as $item)
                                <option value="{{$item->id}}">{{$item->id}} - {{$item->name}}</option>
                                @endforeach
                            </select>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>          
                            <script>
                                width:'100%',
                                $('#country').select2({ });
                            </script>
                        </div>
                        <div class="col-sm-3 mt-5">
                            <label class="form-label fs-6 fw-bolder text-gray-700 mb-1">State</label>
                            <select  style="width:100%;" id="state" class="form-control" name="state">
                                <option value="--select state--">-- select state --</option>
                                @foreach($state as $state)
                                <option value="{{$state->id}}">{{$state->name}}</option>
                                @endforeach
                            </select>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>          
                            <script>
                                width:'100%',
                                $('#state').select2({ });
                            </script>
                        </div>
                        <div class="col-sm-3 mt-5">
                            <label class="form-label fs-6 fw-bolder text-gray-700 mb-1">City</label>
                            <select  style="width:100%;" id="city" class="form-control" name="city">
                                <option value="--select state--">-- select state --</option>
                                @foreach($city as $city)
                                <option value="{{$city->id}}">{{$city->name}}</option>
                                @endforeach
                            </select>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>          
                            <script>
                                width:'100%',
                                $('#city').select2({ });
                            </script>
                        </div>
                    </div>

                    <!--  -->
        <div class="form-group row" style="margin-top: 2rem;">
          <div class="col-sm-3 mt-5">
            <label class="form-label fs-6 fw-bolder text-gray-700 mb-1">Financial Year:</label>
            <!-- <input type="text" name="financial_year" placeholder="Enter Financial Year" id="financial_year" -->
            <select class="form-select financialyear " name="financial_year" id="financial_year" multiple="multiple" required> 
            <option value="">--Select--</option>
                                @foreach($locationyear as $items)
                                <option value="{{ $items->locationyears }}">{{$items->locationyears}}</option>
                                @endforeach
                             </select> 
                           <br>
                        <a>
                        <button type="button"   class="btn btn-sm  btn-active-primary pull-left showidyear">{{ __('Add')}}</button>
                    
                        </a>
                        <script>
                                $(".financialyear").select2({
                                    });
                                    </script>
                            <script>
                                $('.select2-multi').select2();
                            </script>
                        
          <script>
           $(".showidyear").click(function(){
   
           $("#testmodalyear").modal('show');
           });
       </script>
        </div>
        <div class="col-sm-3 mt-5">
            <label class="form-label fs-6 fw-bolder text-gray-700 mb-1">Drug & Lic. No:</label>
            <input type="area" name="drug_lic_no" placeholder="Enter Drug & Lic.No:" id="user_id" class="form-control" required>
        </div>
        </div><br>
        <div align="left" style="margin-top: 1.5rem;">
       <input type="submit" value="Save" class="btn btn-primary border border-2 py-2" id="submitdt"></br>
       </div>
    </form>
   

</div>
<div class="modal fade" id="testmodalyear" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Financial Year</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="testlocationthree"></button>
                                        </div>
                                        <div class="modal-body">
                                        <form action="" id="addsubcategory" >                   
                                                {{csrf_field()}}
                                                    <div class="form-group row">
                                                        
                                                         
                                                        
                                                        <div class="col-sm-12">
                                                            <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Add Financial Year:</label>
                                                            <input type="text" class="form-control  locationyears" id="locationyears" name="locationyears"/>

                                                        </div>
                                                       
                                                        <div class="form-group">
                                                               <center><input type="button" value="Save"  class="btn btn-primary mt-3 text-center" onclick="saveyears();"></center>
                                                               <!-- <button type="button" class="btn btn-primary mt-3 text-center">Submit</button> -->
                                                            </div>
                                            </form>
                                        </div>
                                     </div>
                                </div>
                            </div>
                        </div>
 
@stop
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#country').on('change', function (){
                // alert("hii");die();
                var idCountry = this.value;
                $("#state").html('');
                $.ajax({
                    url: "{{url('/fetchState')}}",
                    type: "GET",
                    data: {
                        country_id: idCountry,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#state').html('<option value="">Select State</option>');
                        $.each(result, function (key, value) {
                            $("#state").append('<option value="' +key + '">' + value + '</option>');
                        });
                        $('#city').html('<option value="">Select City</option>');
                    }
                });
            });
            $('#state').on('change', function () {
                // alert("hii");die();
                var idState = this.value;
                $("#city").html('');
                $.ajax({
                    url: "{{url('/fetchCity')}}",
                    type: "GET",
                    data: {
                        state_id: idState,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (res) {
                        $('#city').html('<option value="">Select City</option>');
                        $.each(res, function (key, value) {
                            $("#city").append('<option value="' + key + '">' + value + '</option>');
                        });
                    }
                });
            });
        });
    </script>



<script type="text/javascript">
function saveyears(){
  let name = $('#locationyears').val();
    url = "{{url('submityearform/')}}/";
    console.log(url);
    // alert(name);
    $.ajax({
      url: url,
      type:"POST",
      data:{
        "_token": "{{ csrf_token() }}",
        locationyears:name,
      },
      success:function(response){
        $('#testlocationthree').click();
        //window.location = "/analysisdoctor/add";
        jQuery('#financial_year').html('');
          for(let i=0;i < response.getlocationyears.length;i++){
            console.log(response.getlocationyears[i].locationyears);
            html = `<option value="${response.getlocationyears[i].locationyears}">${response.getlocationyears[i].locationyears}</option>`;
            jQuery('#financial_year').append(html);
          }
      },
     });
   }
  </script>
</body>
</html>
