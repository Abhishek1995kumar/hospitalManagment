@extends('layouts.app')
@section('content')
@section('page_css')
    <link rel="stylesheet" href="{{ asset('assets/css/int-tel/css/intlTelInput.css') }}">
@endsection
@section('header_toolbar')
    <div class="toolbar" id="kt_toolbar">
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                 data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                 class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Add Patient Feedback</h1>
            </div>
            <div class="d-flex align-items-center py-1">
                <a href="{{ route('feedback.index') }}"
                   class="btn btn-sm btn-light btn-active-light-primary pull-right">{{ __('messages.common.back') }}</a>
            </div>
        </div>
    </div>
@endsection

<head>
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.21.1/dist/bootstrap-table.min.css">
<script src=
"https://unpkg.com/ag-grid-community/dist/ag-grid-community.min.nostyle.js">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-bootgrid/1.3.1/jquery.bootgrid.js"></script>  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head> 
<div class="card">
  <div class="card-header"></div>
  <div class="card-body">
      
      <form action="{{ url('feedback') }}" method="post">
        {{csrf_field()}}
        
       <div class="form-group row">
          <!-- <div class="col-sm-4">
            
              <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">ID:</label>
              <input type="text" name="feedback_id" id="feedback_id" class="form-control">
          </div> -->
           <div class="col-sm-6">
         
              <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Patient Name:</label>
              <select class="form-control" data-live-search="true"  name="patient_name" id="patient_name" required>
                <option value="">Select Patient name</option>
                @foreach($patientref as $items)
                <option value="{{ $items->id }}"> {{ $items->full_name}}{{'( P'.$items->id.')'}} </option>
                @endforeach
            </select>
          </div>
           <div class="col-sm-6">
             
              <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Mobile No:</label>
              <input type="text" name="mobile" id="mobile" class="form-control" required>
          </div>  
        </div><br>
        <div id="complaint" class="tab-pane">
                    <legend>&nbsp;&nbsp;</legend>
                    <div class="col-md-12">
                        <div class="row table-responsive">
                            <div class="col-md-12">
                                <table class="table  table-bordered text-center" id="previousTables" style="border: 1px solid #a9a5a5;">
                                    <tr>
                                        <th style="border: 1px solid #a9a5a5;">Query</th>
                                        <th style="border: 1px solid #a9a5a5;">Response</th>
                                        
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #a9a5a5;">Is Patient Name Correct?</td>
                                         <td style="border: 1px solid #a9a5a5;">
                                            <label>yes</label>
                                            <input type="radio" name="pname_correct" class="form-cont" value="yes" required>
                                            &nbsp;&nbsp;
                                            <label>No</label>
                                            <input type="radio" name="pname_correct" value="no" checked required>
                                         </td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #a9a5a5;">Is Patient Mobile No Correct?</td>
                                        <td style="border: 1px solid #a9a5a5;">
                                            <label>yes</label>
                                            <input type="radio" name="pnumber_correct" class="form-cont" value="yes" required>
                                            &nbsp;&nbsp;
                                            <label>No</label>
                                            <input type="radio" name="pnumber_correct" value="no" required checked>
                                         </td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #a9a5a5;">Clinical Remark? </td>
                                        <td style="border: 1px solid #a9a5a5;">
                                            <label>yes</label>
                                            <input type="radio" name="clinical_remark" class="form-cont" value="yes" required>
                                            &nbsp;&nbsp;
                                            <label>No</label>
                                            <input type="radio" name="clinical_remark" value="no" required checked>
                                         </td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #a9a5a5;">Medicine purchase</td>
                                        <td style="border: 1px solid #a9a5a5;">
                                            <label>yes</label>
                                            <input type="radio" name="medicine_purchase" class="form-cont" value="yes" required>
                                            &nbsp;&nbsp;
                                            <label>No</label>
                                            <input type="radio" name="medicine_purchase" value="no" required checked>
                                         </td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #a9a5a5;">Diagnostic Test</td>
                                        <td style="border: 1px solid #a9a5a5;">
                                            <label>yes</label>
                                            <input type="radio" name="diagnostic_test" class="form-cont" value="yes" required>
                                            &nbsp;&nbsp;
                                            <label>No</label>
                                            <input type="radio" name="diagnostic_test" value="no" required checked>
                                         </td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #a9a5a5;">Glass Invoice</td>
                                        <td style="border: 1px solid #a9a5a5;">
                                            <label>yes</label>
                                            <input type="radio" name="glass_invoice" class="form-cont" value="yes" required>
                                            &nbsp;&nbsp;
                                            <label>No</label>
                                            <input type="radio" name="glass_invoice" value="no" required checked>
                                         </td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #a9a5a5;">What was the treatment recommended by Doctor?</td>
                                        <td style="border: 1px solid #a9a5a5;">
                                            <input type="text" name="treatment_recommended" required>
                                         </td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #a9a5a5;">Have you taken the medicines as guided by Doctor?</td>
                                        <td style="border: 1px solid #a9a5a5;">
                                            <label>yes</label>
                                            <input type="radio" name="medicines_guided" class="form-cont" value="yes" required>
                                            &nbsp;&nbsp;
                                            <label>No</label>
                                            <input type="radio" name="medicines_guided" value="no" required checked>
                                         </td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #a9a5a5;">Have you done your tests as recommended by doctor? </td>
                                        <td style="border: 1px solid #a9a5a5;">
                                            <label>yes</label>
                                            <input type="radio" name="tests_recommended" class="form-cont" value="yes" required>
                                            &nbsp;&nbsp;
                                            <label>No</label>
                                            <input type="radio" name="tests_recommended" value="no" required checked>
                                         </td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #a9a5a5;">Did You Bought the Glasses as recommended by Doctor?  </td>
                                        <td style="border: 1px solid #a9a5a5;">
                                            <label>yes</label>
                                            <input type="radio" name="glasses_recommended" class="form-cont" value="yes" required>
                                            &nbsp;&nbsp;
                                            <label>No</label>
                                            <input type="radio" name="glasses_recommended" value="no" required checked>
                                         </td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #a9a5a5;">Was any Surgery Recommened by Doctor?  </td>
                                        <td style="border: 1px solid #a9a5a5;">
                                            <label>yes</label>
                                            <input type="radio" name="surgery_recommened" class="form-cont" value="yes" required>
                                            &nbsp;&nbsp;
                                            <label>No</label>
                                            <input type="radio" name="surgery_recommened" value="no" required checked>
                                         </td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #a9a5a5;">Surgery Recommended Product </td>
                                        <td style="border: 1px solid #a9a5a5;">
                                            <label>yes</label>
                                            <input type="radio" name="surgery_recommended_product" class="form-cont" value="yes" required>
                                            &nbsp;&nbsp;
                                            <label>No</label>
                                            <input type="radio" name="surgery_recommended_product" value="no" required checked>
                                         </td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #a9a5a5;">Did You understood the Surgery Suggested by Doctor?  </td>
                                        <td style="border: 1px solid #a9a5a5;">
                                            <label>yes</label>
                                            <input type="radio" name="understood_surgery_suggested" class="form-cont" value="yes" required>
                                            &nbsp;&nbsp;
                                            <label>No</label>
                                            <input type="radio" name="understood_surgery_suggested" value="no" required checked>
                                         </td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #a9a5a5;">Did Counsellor Meet You?</td>
                                        <td style="border: 1px solid #a9a5a5;">
                                            <label>yes</label>
                                            <input type="radio" name="counsellor_meet" class="form-cont" value="yes" required>
                                            &nbsp;&nbsp;
                                            <label>No</label>
                                            <input type="radio" name="counsellor_meet" value="no" required checked>
                                         </td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #a9a5a5;">Was surgery reason and its benefits explained to you?</td>
                                        <td style="border: 1px solid #a9a5a5;">
                                            <label>yes</label>
                                            <input type="radio" name="surgery_reason" class="form-cont" value="yes" required>
                                            &nbsp;&nbsp;
                                            <label>No</label>
                                            <input type="radio" name="surgery_reason" value="no" required checked>
                                         </td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #a9a5a5;">When in your surgery scheduled or planning to go for Surgery?  </td>
                                        <td style="border: 1px solid #a9a5a5;">
                                            <label>yes</label>
                                            <input type="radio" name="planning_to_surgery" class="form-cont" value="yes" required>
                                            &nbsp;&nbsp;
                                            <label>No</label>
                                            <input type="radio" name="planning_to_surgery" value="no" required checked>
                                         </td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #a9a5a5;">Kindly rate your experience of meeting Receptionist? </td>
                                        <td style="border: 1px solid #a9a5a5;">
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                <select class="form-control" id="receipt" name="receipt" required>
                                                <option required>select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                            </select>
                                        </div>
                                            <div class="col-sm-5" id="meeting_dropdown" style="display: none;" align="left">
                                                <select name="rate_receptionist" class="form-control">
                                                    <option value="">Rating</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option> 
                                                </select>
                                            </div>
                                            </div>
                                            <script type="text/javascript">
                                            $(document).ready(function () {
                                               $('#receipt').change(function(){
                                                    $receipt = $('#receipt').val();
                                                    if($receipt == 'yes') {
                                                        $('#meeting_dropdown').show();
                                                    }else {
                                                       $('#meeting_dropdown').hide(); 
                                                    }
                                                });
                                            });
                                            </script>
                                         </td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #a9a5a5;">Kindly rate your experience of meeting Optometrist </td>
                                        <td style="border: 1px solid #a9a5a5;">
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                <select class="form-control" id="optpmetrist" name="optpmetrist">
                                                <option>select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                            </select>
                                        </div>
                                            <div class="col-sm-5" id="dropdown" style="display: none;" align="left">
                                                <select name="rate_optometrist"  class="form-control">
                                                    <option value="">Rating</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option> 
                                                </select>
                                            </div>
                                            </div>
                                            <script type="text/javascript">
                                            $(document).ready(function () {
                                               $('#optpmetrist').change(function(){
                                                    $optpmetrist = $('#optpmetrist').val();
                                                    if($optpmetrist == 'yes') {
                                                        $('#dropdown').show();
                                                    }else {
                                                       $('#dropdown').hide(); 
                                                    }
                                                });
                                            });
                                            </script>
                                         </td>

                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #a9a5a5;">Kindly rate your experience of meeting Doctor</td>
                                        <td style="border: 1px solid #a9a5a5;">
                                            <div class="form-group row">
                                            <div class="col-sm-6">
                                            <select class="form-control" id="doctor" name="doctor">
                                                <option>select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                            </select>
                                        </div>
                                            <div class="col-sm-5" id="doctor_dropdown" style="display: none;" align="left">
                                                <select name="rate_doctor"  class="form-control">
                                                    <option value="">Rating</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option> 
                                                </select>
                                            </div>
                                        </div>
                                            <script type="text/javascript">
                                            $(document).ready(function () {
                                               $('#doctor').change(function(){
                                                    $doctor = $('#doctor').val();
                                                    if($doctor == 'yes') {
                                                        $('#doctor_dropdown').show();
                                                    }else {
                                                       $('#doctor_dropdown').hide(); 
                                                    }
                                                });
                                            });
                                            </script>
                                         </td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #a9a5a5;">Kindly rate your experience of meeting Counsellor </td>
                                        <td style="border: 1px solid #a9a5a5;">
                                            <div class="form-group row">
                                            <div class="col-sm-6">
                                        <select class="form-control" id="counsellor" name="counsellor">
                                                <option>select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                            </select>
                                        </div>
                                            <div class="col-sm-5" id="counsellor_dropdown" style="display: none;" align="left">
                                                <select name="rate_counsellor"  class="form-control" >
                                                    <option value="">Rating</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option> 
                                                </select>
                                            </div>
                                            <script type="text/javascript">
                                            $(document).ready(function () {
                                               $('#counsellor').change(function(){
                                                    $counsellor = $('#counsellor').val();
                                                    if($counsellor == 'yes') {
                                                        $('#counsellor_dropdown').show();
                                                    }else {
                                                       $('#counsellor_dropdown').hide(); 
                                                    }
                                                });
                                            });
                                            </script>
                                         </td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #a9a5a5;">Kindly rate your experience of meeting Centre Head? </td>
                                        <td style="border: 1px solid #a9a5a5;">
                                            <div class="form-group row">
                                            <div class="col-sm-6">
                                            <select class="form-control" id="centre_head" name="centre_head">
                                                <option>select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                            </select>
                                        </div>
                                            <div class="col-sm-5" id="centre_head_dropdown" style="display: none;" align="left">
                                                <select name="rate_centre_head"  class="form-control">
                                                    <option value="">Rating</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option> 
                                                </select>
                                            </div>
                                            <script type="text/javascript">
                                            $(document).ready(function () {
                                               $('#centre_head').change(function(){
                                                    $centre_head = $('#centre_head').val();
                                                    if($centre_head == 'yes') {
                                                        $('#centre_head_dropdown').show();
                                                    }else {
                                                       $('#centre_head_dropdown').hide(); 
                                                    }
                                                });
                                            });
                                            </script>
                                         </td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #a9a5a5;">Kindly rate your experience of meeting Pharmacist</td>
                                        <td style="border: 1px solid #a9a5a5;">
                                            <div class="form-group row">
                                            <div class="col-sm-6">
                                            <select class="form-control" id="pharmacist" name="pharmacist">
                                                <option>select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                            </select>
                                        </div>
                                            <div class="col-sm-5" id="pharmacist_dropdown" style="display: none;" align="left">
                                           
                                                <select name="rate_pharmacist"  class="form-control">
                                                    <option value="">Rating</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option> 
                                                </select>
                                           
                                            </div>
                                        </div>
                                            <script type="text/javascript">
                                            $(document).ready(function () {
                                               $('#pharmacist').change(function(){
                                                    $pharmacist = $('#pharmacist').val();
                                                    if($pharmacist == 'yes') {
                                                        $('#pharmacist_dropdown').show();
                                                    }else {
                                                       $('#pharmacist_dropdown').hide(); 
                                                    }
                                                });
                                            });
                                            </script>
                                         </td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #a9a5a5;">Kindly rate your experience of meeting Optical Person  </td>
                                        <td style="border: 1px solid #a9a5a5;">
                                            <div class="form-group row">
                                            <div class="col-sm-6">
                                            <select class="form-control" id="optical_person" name="optical_person">
                                                <option>select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                            </select>
                                        </div>
                                            <div class="col-sm-5" id="optical_person_dropdown" style="display: none;" align="left">
                                                <select name="rate_optical_person"  class="form-control">
                                                    <option value="">Rating</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option> 
                                                </select>
                                            </div>
                                        </div>
                                            <script type="text/javascript">
                                            $(document).ready(function () {
                                               $('#optical_person').change(function(){
                                                    $optical_person = $('#optical_person').val();
                                                    if($optical_person == 'yes') {
                                                        $('#optical_person_dropdown').show();
                                                    }else {
                                                       $('#optical_person_dropdown').hide(); 
                                                    }
                                                });
                                            });
                                            </script>
                                         </td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #a9a5a5;">Kindly rate your experience of Total Time Spent at Hospital </td>
                                        <td style="border: 1px solid #a9a5a5;">
                                            <div class="form-group row">
                                            <div class="col-sm-6">
                                            <select class="form-control" id="time_spent" name="time_spent">
                                                <option>select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                            </select>
                                        </div>
                                            <div class="col-sm-5" id="time_spent_dropdown" style="display: none"; align="left">
                                                <select name="rate_time_spent"  class="form-control">
                                                    <option value="">Rating</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option> 
                                                </select>
                                            </div>
                                            <script type="text/javascript">
                                            $(document).ready(function () {
                                               $('#time_spent').change(function(){
                                                    $time_spent = $('#time_spent').val();
                                                    if($time_spent == 'yes') {
                                                        $('#time_spent_dropdown').show();
                                                    }else {
                                                       $('#time_spent_dropdown').hide(); 
                                                    }
                                                });
                                            });
                                            </script>
                                         </td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #a9a5a5;">Kindly rate your experience of Cleanliness at Hospital</td>
                                        <td style="border: 1px solid #a9a5a5;">
                                            <div class="form-group row">
                                                
                                            <div class="col-sm-6">
                                        <select class="form-control" id="cleanness" name="cleanness">
                                                <option>select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                            </select>
                                        </div>
                                            <div class="col-sm-5" id="cleanness_dropdown" style="display: none;" align="left">

                                                <select name="rate_cleanliness"  class="form-control">
                                                    <option value="">Rating</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option> 
                                                </select>
                                          </div>
                                            </div>

                                            <script type="text/javascript">
                                            $(document).ready(function () {
                                               $('#cleanness').change(function(){
                                                    $cleanness = $('#cleanness').val();
                                                    if($cleanness == 'yes') {
                                                        $('#cleanness_dropdown').show();
                                                    }else {
                                                       $('#cleanness_dropdown').hide(); 
                                                    }
                                                });
                                            });
                                            </script>
                                         </td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #a9a5a5;">Kindly rate your overall experience of visiting Hospital </td>
                                        <td style="border: 1px solid #a9a5a5;">
                                            <div class="form-group row">
                                            <div class="col-sm-6">
                                            <select class="form-control" id="visiting" name="visiting">
                                                <option>select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                            </select>
                                        </div>
                                            <div class="col-sm-5" id="visiting_dropdown" style="display: none;" align="left">
                                                <select name="rate_visiting_hospital"  class="form-control">
                                                    <option value="">Rating</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option> 
                                                </select>
                                            </div>
                                        </div>
                                            <script type="text/javascript">
                                            $(document).ready(function () {
                                               $('#visiting').change(function(){
                                                    $visiting = $('#visiting').val();
                                                    if($visiting == 'yes') {
                                                        $('#visiting_dropdown').show();
                                                    }else {
                                                       $('#visiting_dropdown').hide(); 
                                                    }
                                                });
                                            });
                                            </script>
                                         </td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #a9a5a5;">Any Name of Staff including Doctor you would like to mention </td>
                                        <td style="border: 1px solid #a9a5a5;">
                                            <!-- <input type="text" name="staff_mention"> -->
                                            <select class="form-control" data-live-search="true"  name="staff_mention" id="staff_mention" required>
                                            <option value=""></option>
                                            @foreach($user2 as $items)
                                            <option value="{{ $items->id }}"> {{ $items->full_name}}  </option>
                                            @endforeach
                                        </select>
                                         </td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #a9a5a5;">Would you like to recommened us to others  </td>
                                        <td style="border: 1px solid #a9a5a5;">
                                            <label>yes</label>
                                            <input type="radio" name="recommened_us" class="form-cont" value="yes" required>
                                            &nbsp;&nbsp;
                                            <label>No</label>
                                            <input type="radio" name="recommened_us" value="no" required checked>
                                         </td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #a9a5a5;">Your Next visit review Date is</td>
                                        <td style="border: 1px solid #a9a5a5;">
                                            <input type="date" name="next_visit_date" required>
                                         </td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #a9a5a5;">Are You planning to come on mentioned date </td>
                                        <td style="border: 1px solid #a9a5a5;">
                                            <label>yes</label>
                                            <input type="radio" name="planning_to" class="form-cont" value="yes" required>
                                            &nbsp;&nbsp;
                                            <label>No</label>
                                            <input type="radio" name="planning_to" value="no" required checked>
                                         </td>
                                    </tr>

                                    
                                </table>   
                            </div>
                        </div>      
                    </div>      
                </div>       
   
           <div align="center">
       <input type="submit" value="Save" class="btn btn-success"></br>
       </div>
    </form>
   
  </div>
</div>
 
@stop

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/base/jquery-ui.css" rel="stylesheet"/>

<script type="text/javascript">
    $(document).ready(function(){
        $(this).on('change','#patient_name',function(e){
            var patient_name = $(this).val();
            $.ajax({
                url:"{{url('patient_details')}}?id="+patient_name,
                type:'get',
                success : function(resp) {
                    console.log(resp);
                    $("#mobile").val(resp.phone);
                    
                },
            });
        });
    });
</script>

