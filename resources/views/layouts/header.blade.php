<?php
// Start the session
session_start();
?>
@php    
    $notifications = getNotification(Auth::user()->roles->pluck('name')->first());
    $notificationCount = count($notifications);
@endphp

@php
    $location = (Auth::user()->roles->pluck('lname')->first());
   
@endphp
<!-- <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"> -->

<div id="kt_header" class="header align-items-stretch">
    <div class="container-fluid d-flex align-items-stretch justify-content-between">
        <div class="d-flex align-items-center d-lg-none ms-n3 me-1" title="Show aside menu">
            <div class="btn btn-icon btn-active-color-white" id="kt_aside_mobile_toggle">
                <i class="bi bi-list fs-1"></i>
            </div>
        </div>
        <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
            <a href="{{ url('/') }}" class="d-lg-none" title="{{ getAppName() }}">
                <!--<img alt="Logo" src="{{ getLogoUrl() }}" class="h-15px">-->
                 <img src="{{('assets/img/logo-red-black.png')}}" class="front-header-logo" alt="logo" style="width:100px;height:45px;" class="image">
            </a>
        </div>
        <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
            <div class="d-flex align-items-stretch" id="kt_header_nav">
                <div class="header-menu align-items-stretch" data-kt-drawer="true" data-kt-drawer-name="header-menu"
                     data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
                     data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="end"
                     data-kt-drawer-toggle="#kt_header_menu_mobile_toggle" data-kt-swapper="true"
                     data-kt-swapper-mode="prepend"
                     data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav'}">
                    @include('layouts.sub_menu')
                </div>
            </div>
            <div class="d-flex">
                <div class="d-flex align-items-stretch">


               

                <!-- <div class="topbar-item position-relative p-8 d-flex align-items-center hoverable" style="padding-right: 0px !important;"
                         data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end"
                         data-kt-menu-flip="bottom">
                        <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-trigger="hover" title="" >
                        <a>
                        <button type="button"  class="btn showid"><img src="{{('assets/img/pdf.png')}}" class="user-image" alt="User Image" style="width:80px;height:45px;">Insure Eye Institute Aurangabad </button>
                        </a>
                        
                        </div>
                    </div>
                    
                     -->

                   

                        <!-- <img src="{{('assets/img/pdf.png')}}" class="user-image" alt="User Image" style="width:80px;height:45px;">
                                    Insure Eye Institute Aurangabad    -->

                                    <div class="menu menu-sub menu-sub-dropdown menu-column w-250px w-lg-275px overflow-auto h-200px" id="location_model" data-kt-menu="true" style="background-color:#87CEEB;">
                                {{--<div class="d-flex justify-content-between bgi-no-repeat rounded-top"--}}
                                {{--style="">--}}
                                <div class="d-flex justify-content-between bgi-no-repeat rounded-top sticky-top">
                                <a type="" class="close bt" id="closedlocation" style="width:10%;">
                                            <span aria-hidden="true" style="color:red;font-weight:bold;font-size:20px">&times;</span>
                                        </a>                                </div>

                                <div class="dropdown-list-content dropdown-list-icons force-scroll mx-2">
                                <div class="form-group" style="width: 259px;">
                                    

                                  <!-- <span>{{ Auth::user()->pluck('lname')->first() }}</span> -->
                                 @php
                                 $location = Auth::user()->pluck('lname')->first();
                                @endphp
                                <?php
                                        $id = Auth::user()->pluck('id')->first();
                                         $test1 =  DB::table('location')
                                         ->select( 'location.lname as locname','location.id','users.lname') 
                                         ->join('users', 'location.id', '=', 'users.lname')
                                        //  ->where('users.id', '=', $id)
                                        ->get();
                                    
                                       
                                        //  print_r($test1);

                                        //   print_r(Auth::user()->pluck('lname')->first())
                                        //  ->get();
                                        //  print_r(Auth::user()->pluck('lname')->first())
                                        ?>
                                    <?php
                                        if(isset($_GET) && !empty($_GET)){
                                            $_SESSION["loc"] = $_GET['location'];
                                            $_SESSION["fin_year"] = $_GET['financial_year'];
                                            $location = $_GET['location'];
                                            $set_loc = DB::table('location')
                                            ->select('id','lname')->where('id','=', $location)
                                            ->get();
                                            // print_r($set_loc); die();
                                            //Doctor query//
                                            // $location_name = DB::select(DB::raw("SELECT lname FROM `location` where id = $location"));
                                            // // print_r($location_name);die();
                                            $set_loc2 = $set_loc[0]->lname;

                                            // print_r($set_loc2);die();
                                            $_SESSION['location_name'] = $set_loc2;
                                            //print_r($_SESSION['location_name']);die();
                                        }
                                    ?>
                            <form action="{{url('bdashoard') }}" method="get">
                               
                                    <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                                    <select id="location" name="location" class="form-control" required>
                                        <option value="">--Select Location--</option>
                                          
                                        @foreach($test1 as $loc)
                                           
                                        <option value="{{$loc->id}}"> {{$loc->locname}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            <br>
                            <div class="form-group" style="width: 259px;">
                                <select id="financial_year" name="financial_year" class="form-control" required>
                                <option value="">--Select Year--</option>
                                </select>
                            </div>
                            </div>
                            </br>
                            <div>
                                <div class="form-group text-center"> <button type='Submit' class="btn-sm btn-primary" id="loc_sub" onclick="fetchlocation()">Submit</button></div>
                            </div>
                        </form>
                    <!--end code-->
<!-- <script>
                      function fetchlocation(){
                                                    var locid =  $('#location').val();
                                                    alert(locid);
                                                    $.ajax({
                                                            url: "{{url('/location')}}",
                                                            method:'POST',
                                                            data :{
                                                                "_token": "{{ csrf_token() }}",
                                                                id:locid,
                                                            },
                                                            success:function(data){
                                                               if(data)
                                                               {
                                                                
                                                                $('#modal_body').html(data[0].lname);
                                                               // $("#modal_body").html(str);
                                                               
                                                              
                                                               }
                                                            },
                                                        });
                                                       
                                                    }
                                            </script> -->

<!--end script-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
$('#location').change(function(){
     var locid = $(this).val();  
        // alert(locid);
    if(locid){
        $.ajax({
        type:"GET",
        url:"{{url('fetch_location')}}?id="+locid,

        success:function(res){        
        if(res){
            $("#financial_year").empty();
            $("#financial_year").append('<option>Select Financial Year</option>');
            $.each(res,function(key,value){
            $("#financial_year").append('<option value="'+key+'">'+value+'</option>');
            });
        
        }else{
            $("#financial_year").empty();
        }
        }
        });
    }else{
        $("#financial_year").empty();
        
    }   
    });
});
</script>
<!--end script-->
 </div>
                            
                           <div class="topbar-item position-relative p-4 d-flex align-items-center hoverable"
                            name="lcoation" id="lcoation">
                            <i class="fas fa-map-marker-alt fa-2x" style="width:30px;color:green"></i>
                            <b>
                                <?php 
                                    if(isset($_SESSION['location_name'])){
                                        print_r($_SESSION['location_name']);
                                    }   
                                ?>
                            </b>
                         </div>
                        <br>

                            <div id="location_mode2l"  style="width:80%; height:20;display:none">
                                <div class="modal-dialog">
                                <div class="modal-content" style="width:40%; height:120">
                                        <a type="" class="close" id="closedlocation" style="width:200%;" style="width: 10%;">
                                            <span aria-hidden="true">&times;</span>
                                        </a>
                                            <div class="form-group row" >
                                                <div class="col-sm-10">
                                              <center><select id="selecttype" name="selecttype" class="form-control-20" style="margin:8" required></center>
                                              <option value="">Insure Eye Instistute Ahamedabaad</option>
                                              <option value="New">INsure</option>
                                              <option value="Old">Old</option>
                                              <option value="Others">Others</option>
                                              <option value="Review">Review</option>
                                             </select>
                 </div>
                 <div class="col-sm-10">
                 <center><select id="selecttype" name="selecttype" class="form-control-20" style="margin:8" required></center>
                  <option value="">Select Financial Year</option>
                  <option value="New">INsure</option>
                  <option value="Old">Old</option>
                  <option value="Others">Others</option>
                  <option value="Review">Review</option>
                 </select>
                 </div>
                 </div>  
            <div class="form-group row" >
         </div><br>
                                       
                                     
                                    
                                </div>
                            </div>
</div>

                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/base/jquery-ui.css" rel="stylesheet"/>

<script type="text/javascript">
    $('#location_model').hide();
    $("#lcoation").click(function(e){

        $('#location_model').show();
        // alert("Hello");
    });

    $("#closedlocation").click(function(e){
        
        $('#location_model').hide();
        // alert("Hello");
    });

</script>

 <div class="topbar-item position-relative p-8 d-flex align-items-center hoverable" style="padding-right: 0px !important;"
                         data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end"
                         data-kt-menu-flip="bottom">
                        <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-trigger="hover" title="" data-bs-original-title="{{ getLoggedInUser()->thememode ? 'Switch to Light Mode' : 'Switch to Dark Mode' }}">
                        <a href="{{ route('user.mode') }}">
                            <i class="fas user-check-icon {{ getLoggedInUser()->thememode ? 'fa-sun' : 'fa-moon' }} fs-3"></i>
                        </a>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-stretch">
                    <div class="topbar-item position-relative p-8 d-flex align-items-center hoverable"
                         data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end"
                         data-kt-menu-flip="bottom">
                        <i class="far fa-bell fs-3"></i>
                        @if(count(getNotification(Auth::user()->roles->pluck('name')->first())) != 0)
                            <span
                                    class="badge navbar-badge bg-primary notification-count notification-message-counter rounded-circle position-absolute translate-middle d-flex justify-content-center align-items-center {{($notificationCount > 9)?'end-0':'counter-0'}}"
                                    id="counter">{{ count(getNotification(Auth::user()->roles->pluck('name')->first())) }}</span>
                        @endif
                    </div>
                    
                    <!--ujwala code start-->
                    <div class="topbar-item position-relative p-4 d-flex align-items-center hoverable"
                            name="clock" id="clock">
                             <i class="far fa-solid fa-clock fs-3"></i>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="color: red;"><path d="M256 512C114.6 512 0 397.4 0 256S114.6 0 256 0S512 114.6 512 256s-114.6 256-256 256zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z"/></svg></i>
                        </div><br>
                            <div id="eyestructure_model" style="display:none;">
                                <div class="modal-dialog">

                                    <div class="modal-content">
                                        <a type="" class="close" id="closed" style="width: 10%;" style="width: 10%;">
                                            <span aria-hidden="true">&times;</span>
                                        </a>
                                        <div class="form-group row" >
                                                <div class="col-sm-6">
                                                    <!-- <label class="">login</label> -->
                                                    <h6 style="text-align: center;">login</h6>
                                                </div>
                                                <div class="form-group mb-5 col-sm-6">
                                                    <div class="form-check form-switch form-check-custom form-check-solid">
                                                        <input class="form-check-input w-35px h-20px is-active" name="loginclock" id="loginclock" type="checkbox" value="0" unchecked>
                                                    </div>
                                                </div>
                                        </div><br>  
                                        <div class="form-group row" >
                                                <div class="col-sm-6">
                                                    <!-- <label class="">Tea Break</label> -->
                                                    <h6 style="text-align: center;">Tea Break</h6>
                                                </div>
                                                <div class="form-group mb-5 col-sm-6">
                                                    <div class="form-check form-switch form-check-custom form-check-solid">
                                                        <input class="form-check-input w-35px h-20px is-active" name="teaclock" id="teaclock" type="checkbox" value="0" unchecked>
                                                    </div>
                                                </div>
                                        </div><br>
                                        <div class="form-group row" >
                                                <div class="col-sm-6">
                                                    <!-- <label class="">Lunch Break</label> -->
                                                    <h6 style="text-align: center;">Lunch Break</h6>
                                                </div>
                                                <div class="form-group mb-5 col-sm-6">
                                                    <div class="form-check form-switch form-check-custom form-check-solid">
                                                        <input class="form-check-input w-35px h-20px is-active" name="lunchclock" id="lunchclock" type="checkbox" value="0" unchecked>
                                                    </div>
                                                </div>
                                        </div><br>
                                        <div class="form-group row" >
                                                <div class="col-sm-6">
                                                    <!-- <label class="">Meeting Break</label> -->
                                                    <h6 style="text-align: center;">Meeting Break</h6>
                                                </div>
                                                <div class="form-group mb-5 col-sm-6">
                                                    <div class="form-check form-switch form-check-custom form-check-solid">
                                                        <input class="form-check-input w-35px h-20px is-active" name="meetingclock" id="meetingclock" type="checkbox" value="0" unchecked>
                                                    </div>
                                                </div>
                                        </div><br>
                                    </div>
                                </div>
                            </div>
                            <!--end code-->

                    <div class="menu menu-sub menu-sub-dropdown menu-column w-350px w-lg-375px overflow-auto h-400px"
                         data-kt-menu="true">
                        {{--                        <div class="d-flex justify-content-between bgi-no-repeat rounded-top"--}}
                        {{--                             style="background-image:url({{ asset('assets/img/pattern-1.jpeg') }})">--}}
                        <div class="d-flex justify-content-between bgi-no-repeat rounded-top sticky-top"
                             style="background-color:#009ef7;">
                            <h3 class="text-white fw-bold px-9 mt-7 mb-5">{{__('messages.notification.notifications')}}
                                <span class="fs-8 opacity-75 ps-3 text-right" style="margin-left: 90px;">
                                <a href="#" class="read-all-notification text-white" id="readAllNotification">
                                    {{ __('messages.notification.mark_all_as_read') }}</a>
                            </span>
                            </h3>
                        </div>
                        <div class="dropdown-list-content dropdown-list-icons force-scroll">
                            @if($notificationCount > 0)
                                @foreach($notifications as $notification)
                                    <a href="#" data-id="{{ $notification->id }}"
                                       class="notification text-hover-primary" id="notification">
                                        <div class="scroll-y mh-325px my-5 px-5">
                                            <div class="d-flex flex-stack py-4">
                                                <div class="d-flex align-items-center">
                                                    <div class="symbol symbol-35px me-4">
                                                <span class="symbol-label bg-light-primary">
                                                  <i class="{{ getNotificationIcon($notification->type) }}"></i>
                                                </span>
                                                    </div>
                                                    <div class="mb-0 me-2 text-hover-primary">
                                                        <span class="fs-6 text-gray-800 fw-bold text-hover-primary">{{ $notification->title }}</span>
                                                    </div>
                                                </div>
                                                <span class="badge badge-light fs-8">{{ \Carbon\Carbon::parse($notification->created_at)->diffForHumans(null, true)}}</span>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            @else
                                <div class="empty-state fs-6 text-gray-800 fw-bold text-center mt-5" data-height="400">
                                    <p>{{ __('messages.notification.you_don`t_have_any_new_notification') }}</p>
                                </div>
                            @endif
                        </div>
                        <div class="empty-state empty-notification d-none fs-6 text-gray-800 fw-bold text-center mt-5"
                             data-height="400">
                            <p>{{ __('messages.notification.you_don`t_have_any_new_notification') }}</p>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-stretch flex-shrink-0">
                    <div class="d-flex align-items-stretch flex-shrink-0">
                        <div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
                            <div class="cursor-pointer symbol symbol-30px symbol-md-40px" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end" data-kt-menu-flip="bottom">
                                <img src="{{ Auth::user()->image_url ?? '' }}" alt="InfyOm">
                            </div>
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px" data-kt-menu="true">
                                <div class="menu-item px-3">
                                    <div class="menu-content d-flex align-items-center px-3">
                                        <div class="symbol symbol-50px me-5">
                                            <img alt="InfyOm" src="{{ Auth::user()->image_url??'' }}" class="object-fit-cover" id="loginUserImage">
                                        </div>
                                        <div class="d-flex flex-column">
                                            <div class="fw-bolder d-flex align-items-center fs-5">{{ (Auth::user()->full_name)??'' }}
                                            </div>
                                            <a href="#" class="fw-bold text-muted text-hover-primary fs-7">{{ (Auth::user()->email)??'' }}</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="separator my-2"></div>
                                <div class="menu-item px-5">
                                    <a href="#" class="editProfile menu-link px-5" data-bs-toggle="modal" data-bs-target="#editProfileModal"
                                       data-id="{{ getLoggedInUserId() }}">{{ __('messages.user.edit_profile') }}</a>
                                </div>
                                <div class="menu-item px-5">
                                    <a href="#" data-bs-toggle="modal"
                                       data-id="{{ getLoggedInUserId() }}"
                                       data-bs-target="#changePasswordModal" class="menu-link px-5">
                                        <span class="menu-text">{{ __('messages.user.change_password') }}</span>
                                    </a>
                                </div>
                                <div class="menu-item px-5">
                                    <a href="#" data-bs-toggle="modal" data-id="{{ getLoggedInUserId() }}" data-bs-target="#changeLanguageModal" class="menu-link px-5">
                                        <span class="menu-text">{{__('messages.profile.change_language')}}</span>
                                    </a>
                                </div>
                                <div class="menu-item px-5">
                                    <a href="{{ route('logout.user') }}"
                                       onclick="event.preventDefault(); localStorage.clear();  document.getElementById('logout-form').submit();"
                                       class="menu-link px-5">
                                        <span class="menu-text">{{ __('messages.user.logout') }}</span>
                                    </a>
                                </div>
                                <form id="logout-form" action="{{ route('logout.user') }}" method="POST" class="d-none">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--start code ujwala-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/base/jquery-ui.css" rel="stylesheet"/>

<script type="text/javascript">
    $('#eyestructure_model').hide();
    $("#clock").click(function(e){

        $('#eyestructure_model').show();
        // alert("Hello");
    });

    $("#closed").click(function(e){
        
        $('#eyestructure_model').hide();
        // alert("Hello");
    });

</script>

<script type="text/javascript">
    $(document).ready(function(e){
        $("#loginclock").on("click", function(){
            if($(this).is(':checked')){
             $.ajax({
               method:'POST',  
               url: "{{url('log_in')}}",      
               dataType: 'JSON',
               success:function(resp) {
                     $('loginclock').attr('hidden',true);
                 }      
            });
        }

        else
        {
            // alert("hii");
            $.ajax({
                   method:'POST',  
                   url: "{{url('log_out')}}",      
                   dataType: 'JSON',
                   success:function(resp) {
                         $('loginclock').attr('hidden',true);
                     }
           
               
                });

        }
    });
});

    
$("#teaclock").click(function(e){
        
        // alert("Hello");
        if($(this).is(':checked')){
             $.ajax({
               method:'POST',  
               url: "{{url('tea_in')}}",      
               dataType: 'JSON',
               success:function(resp) {
                     $('teaclock').attr('hidden',true);
                 }      
   });
     }
     else
     {
        // alert("hii");
        $.ajax({
               method:'POST',  
               url: "{{url('tea_out')}}",      
               dataType: 'JSON',
               success:function(resp) {
                     $('teaclock').attr('hidden',true);
                 }
            });

     }
});
$("#lunchclock").click(function(e){
        
        // $('#eyestructure_model').hide();
        // alert("Hello");
        if($(this).is(':checked')){
             $.ajax({
               method:'POST',  
               url: "{{url('lunch_in')}}",      
               dataType: 'JSON',
               success:function(resp) {
                     $('lunchclock').attr('hidden',true);
                 }      
            });
        }
        else
     {
        // alert("hii");
        $.ajax({
               method:'POST',  
               url: "{{url('lunch_out')}}",      
               dataType: 'JSON',
               success:function(resp) {
                     $('lunchclock').attr('hidden',true);
                 }
       
           
            });

            
        }
    });

$("#meetingclock").click(function(e){
        
        // $('#eyestructure_model').hide();
        // alert("Hello");
    if($(this).is(':checked')){
             $.ajax({
               method:'POST',  
               url: "{{url('meeting_in')}}",      
               dataType: 'JSON',
               success:function(resp) {
                     $('meetingclock').attr('hidden',true);
                 }      
            });
        }
        else
     {
        // alert("hii");
        $.ajax({
               method:'POST',  
               url: "{{url('meeting_out')}}",      
               dataType: 'JSON',
               success:function(resp) {
                     $('meetingclock').attr('hidden',true);
                 }
       
           
            });

     }
    });
</script>


<!--end code-->
