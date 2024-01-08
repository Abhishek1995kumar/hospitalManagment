@extends('layouts.app')
@section('title')
{{ __('Role Master') }}
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
                <a href="{{ route('masterrole') }}"
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
                    
                <form action="{{url('masterrole/edit/'.$rolemasters->id)}}" method="post" id="doctoranalysis" name="doctoranalysis">
                @csrf
                        <div class="row gx-10 mb-5">
                        <div class="col-md-3">
                                        <div class="form-group mb-5">
                                           <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Role Description:</label>
                                            <input class='form-control  select2Patient' name="role_description"  id="role_description" value="{{$rolemasters->role_description}}">  
                                      </div>
                                    </div>

                            <div class="col-md-3">
                                <div class="form-group mb-5">
                                        <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Status :</label>
                                        <select name="status" id ="status" class="form-control">
                                    <option value="">--Select Type--</option>
                                    @foreach($statusone as $item)
                     <option <?php echo $item->status == 'Enable' ?  "selected" : "" ?> value="Enable">Enable</option>
                 <option <?php echo $item->status == 'Disable' ?  "selected" : "" ?> value="Disable">Disable</option>
                                @endforeach
                                </select>  
                            </div>
                            </div>


                            
                            <div class="col-md-3">
                                <div class="form-group mb-5">
                                     <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">IS admin :</label>
                                        <div class="checkbox ">
                                             <label class="container2" for="selectall" style="padding-left: 24px;">Admin
                                             <input type="checkbox"  name="is_admin" id="selectall" value="Admin">
                                             <span class="checkmark"></span>
                                             </label>
                                             </div>
                                            </div>
                                      </div>
                                      <hr>
                    <script type="text/javascript">
                    $('#selectall').click(function() {
                        if($(this).is(':checked')) {
                            $('input[type = "checkbox"]').prop('checked', true);
                        } else {
                            $('input[type = "checkbox"]').prop('checked', false);
                        }
                    });
                </script>

<!-- <script type="text/javascript">
                    $('#selectall').on('click', function() {
                      admin_chck_all();  
                    });
                    function admin_chck_all() {
                        if($('#selectall').is(':checked', true)) {
                            $("input[type=checkbox]").prop('checked', $(this).prop('checked', true));

                            $('#lm_actions').css('display', 'block');
                            $('#ce_actions').css('display', 'block');
                            $('#preot_actions').css('display', 'block');
                            $('#postot_actions').css('display', 'block');
                            $('#da_actions').css('display', 'block');
                            $('#rc_actions').css('display', 'block');
                            $('#rt_actions').css('display', 'block');
                            $('#pc_actions').css('display', 'block');
                        }else {
                            $("input[type=checkbox]").prop('checked', false);
                            $('#lm').prop('checked', false);
                            $('#lm_actions').css('display', 'block');
                            $('#ce_actions').css('display', 'none');
                            $('#preot_actions').css('display', 'none');
                            $('#postot_actions').css('display', 'none');
                            $('#da_actions').css('display', 'none');
                            $('#rc_actions').css('display', 'none');
                            $('#rt_actions').css('display', 'none');
                            $('#pc_actions').css('display', 'none');
                        }
                    }
                </script>


<script type="text/javascript">
       $(document).ready(function() {
        if( $('#lm').is(':checked') ) $('#lm_actions').css('display', 'block');
        else $('#lm_actions').css('display', 'none');

        if( $('#ce').is(':checked') ) $('#ce_actions').css('display', 'block');
        else $('#ce_actions').css('display', 'none');

        if( $('#preot').is(':checked') ) $('#preot_actions').css('display', 'block');
        else $('#preot_actions').css('display', 'none');

        if( $('#postot').is(':checked') ) $('#postot_actions').css('display', 'block');
        else $('#postot_actions').css('display', 'none');

        if( $('#da').is(':checked') ) $('#da_actions').css('display', 'block');
        else $('#da_actions').css('display', 'none');

        if( $('#rc').is(':checked') ) $('#rc_actions').css('display', 'block');
        else $('#rc_actions').css('display', 'none');

        if( $('#rt').is(':checked') ) $('#rt_actions').css('display', 'block');
        else $('#rt_actions').css('display', 'none');

        if( $('#pc').is(':checked') ) $('#pc_actions').css('display', 'block');
        else $('#pc_actions').css('display', 'none');
       })
   </script> -->


<div class="col-md-12" >
                    <div class="col-md-12 table-responsive">
                        <table class="table table-striped active" width="100%">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="list">Options</th>
                                    <th scope="type">Type</th> 
                                    <th scope="delete">View</th>
                                    <th scope="add">Add</th>
                                    <th scope="edit">Edit</th>
                                    <th scope="delete">Delete</th>
                                    <th scope="print">Print</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($rolemasterlist as $row => $val) 
                                <?php
                                    $chckd = array();
                                   
                                    $id = $val->id;
                                    $title = $val->title;
                                    $type = $val->type;
                                ?>
                                <tr>
                                    <td><?php echo $title; ?></td>
                                    <td><?php echo $type; ?></td>
                                    <?php 
                                        if($type == 'System'){
                                            $chckd['V'] = '';
                                            $chckd['A'] = '';
                                            $chckd['U'] = '';
                                            $chckd['D'] = '';
                                            $chckd['P'] = '';
                                            if(!empty($data['system_list'])) {
                                                for($i=0; $i < count($data['system_list']); $i++) {
                                                    $shrt_frm;
                                                    if($data['system_list'][$i] != '') $shrt_frm = strtolower($data['system_list'][$i]);

                                                    if($val->short_form == $shrt_frm) {
                                                        foreach($actions as $rows => &$keys) {
                                                            if($rows == $shrt_frm) {
                                                                $chckd['V'] = ( (in_array('V',$keys)) ? 'checked' : '');
                                                                $chckd['A'] = ( (in_array('A',$keys)) ? 'checked' : '');
                                                                $chckd['U'] = ( (in_array('U',$keys)) ? 'checked' : '');
                                                                $chckd['D'] = ( (in_array('D',$keys)) ? 'checked' : '');
                                                                $chckd['P'] = ( (in_array('P',$keys)) ? 'checked' : '');

                                                            }
                                                        }
                                                    }
                                                }
                                                ?>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['V']; ?> value="<?php echo $id.'_V'; ?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['A']; ?> value="<?php echo $id.'_A'; ?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['U']; ?> value="<?php echo $id.'_U'; ?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['D']; ?> value="<?php echo $id.'_D'; ?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['P']; ?> value="<?php echo $id.'_P'; ?>"> </td>
                                                <?php
                                            }else{
                                                ?>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_V'?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_A'?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_U'?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_D'?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_P'?>"> </td>
                                            <?php
                                            }
                                        }
                                    ?>

                                     <?php 
                                        if($type == 'Masters'){
                                            $chckd['V'] = '';
                                            $chckd['A'] = '';
                                            $chckd['U'] = '';
                                            $chckd['D'] = '';
                                            $chckd['P'] = '';
                                            if(!empty($data['masters_list'])) {
                                                for($i=0; $i < count($data['masters_list']); $i++) {
                                                    $shrt_frm;
                                                    if($data['masters_list'][$i] != '') $shrt_frm = strtolower($data['masters_list'][$i]);

                                                    if($val->short_form == $shrt_frm) {
                                                        foreach($actions as $rows => &$keys) {
                                                            if($rows == $shrt_frm) {
                                                                $chckd['V'] = ( (in_array('V',$keys)) ? 'checked' : '');
                                                                $chckd['A'] = ( (in_array('A',$keys)) ? 'checked' : '');
                                                                $chckd['U'] = ( (in_array('U',$keys)) ? 'checked' : '');
                                                                $chckd['D'] = ( (in_array('D',$keys)) ? 'checked' : '');
                                                                $chckd['P'] = ( (in_array('P',$keys)) ? 'checked' : '');

                                                            }
                                                        }
                                                    }
                                                }
                                                ?>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['V']; ?> value="<?php echo $id.'_V'; ?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['A']; ?> value="<?php echo $id.'_A'; ?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['U']; ?> value="<?php echo $id.'_U'; ?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['D']; ?> value="<?php echo $id.'_D'; ?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['P']; ?> value="<?php echo $id.'_P'; ?>"> </td>
                                                <?php
                                            }else{
                                                ?>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_V'?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_A'?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_U'?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_D'?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_P'?>"> </td>
                                            <?php
                                            }
                                        }
                                    ?>

<?php 
                                        if($type == 'Lab'){
                                            $chckd['V'] = '';
                                            $chckd['A'] = '';
                                            $chckd['U'] = '';
                                            $chckd['D'] = '';
                                            $chckd['P'] = '';
                                            if(!empty($data['lab_list'])) {
                                                for($i=0; $i < count($data['lab_list']); $i++) {
                                                    $shrt_frm;
                                                    if($data['lab_list'][$i] != '') $shrt_frm = strtolower($data['lab_list'][$i]);

                                                    if($val->short_form == $shrt_frm) {
                                                        foreach($actions as $rows => &$keys) {
                                                            if($rows == $shrt_frm) {
                                                                $chckd['V'] = ( (in_array('V',$keys)) ? 'checked' : '');
                                                                $chckd['A'] = ( (in_array('A',$keys)) ? 'checked' : '');
                                                                $chckd['U'] = ( (in_array('U',$keys)) ? 'checked' : '');
                                                                $chckd['D'] = ( (in_array('D',$keys)) ? 'checked' : '');
                                                                $chckd['P'] = ( (in_array('P',$keys)) ? 'checked' : '');

                                                            }
                                                        }
                                                    }
                                                }
                                                ?>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['V']; ?> value="<?php echo $id.'_V'; ?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['A']; ?> value="<?php echo $id.'_A'; ?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['U']; ?> value="<?php echo $id.'_U'; ?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['D']; ?> value="<?php echo $id.'_D'; ?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['P']; ?> value="<?php echo $id.'_P'; ?>"> </td>
                                                <?php
                                            }else{
                                                ?>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_V'?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_A'?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_U'?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_D'?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_P'?>"> </td>
                                            <?php
                                            }
                                        }
                                    ?>

<?php 
                                        if($type == 'Common Master'){
                                            $chckd['V'] = '';
                                            $chckd['A'] = '';
                                            $chckd['U'] = '';
                                            $chckd['D'] = '';
                                            $chckd['P'] = '';
                                            if(!empty($data['commonmaster_list'])) {
                                                for($i=0; $i < count($data['commonmaster_list']); $i++) {
                                                    $shrt_frm;
                                                    if($data['commonmaster_list'][$i] != '') $shrt_frm = strtolower($data['commonmaster_list'][$i]);

                                                    if($val->short_form == $shrt_frm) {
                                                        foreach($actions as $rows => &$keys) {
                                                            if($rows == $shrt_frm) {
                                                                $chckd['V'] = ( (in_array('V',$keys)) ? 'checked' : '');
                                                                $chckd['A'] = ( (in_array('A',$keys)) ? 'checked' : '');
                                                                $chckd['U'] = ( (in_array('U',$keys)) ? 'checked' : '');
                                                                $chckd['D'] = ( (in_array('D',$keys)) ? 'checked' : '');
                                                                $chckd['P'] = ( (in_array('P',$keys)) ? 'checked' : '');

                                                            }
                                                        }
                                                    }
                                                }
                                                ?>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['V']; ?> value="<?php echo $id.'_V'; ?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['A']; ?> value="<?php echo $id.'_A'; ?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['U']; ?> value="<?php echo $id.'_U'; ?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['D']; ?> value="<?php echo $id.'_D'; ?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['P']; ?> value="<?php echo $id.'_P'; ?>"> </td>
                                                <?php
                                            }else{
                                                ?>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_V'?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_A'?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_U'?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_D'?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_P'?>"> </td>
                                            <?php
                                            }
                                        }
                                    ?>

<?php 
                                        if($type == 'Product Master'){
                                            $chckd['V'] = '';
                                            $chckd['A'] = '';
                                            $chckd['U'] = '';
                                            $chckd['D'] = '';
                                            $chckd['P'] = '';
                                            if(!empty($data['productmaster_list'])) {
                                                for($i=0; $i < count($data['productmaster_list']); $i++) {
                                                    $shrt_frm;
                                                    if($data['productmaster_list'][$i] != '') $shrt_frm = strtolower($data['productmaster_list'][$i]);

                                                    if($val->short_form == $shrt_frm) {
                                                        foreach($actions as $rows => &$keys) {
                                                            if($rows == $shrt_frm) {
                                                                $chckd['V'] = ( (in_array('V',$keys)) ? 'checked' : '');
                                                                $chckd['A'] = ( (in_array('A',$keys)) ? 'checked' : '');
                                                                $chckd['U'] = ( (in_array('U',$keys)) ? 'checked' : '');
                                                                $chckd['D'] = ( (in_array('D',$keys)) ? 'checked' : '');
                                                                $chckd['P'] = ( (in_array('P',$keys)) ? 'checked' : '');

                                                            }
                                                        }
                                                    }
                                                }
                                                ?>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['V']; ?> value="<?php echo $id.'_V'; ?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['A']; ?> value="<?php echo $id.'_A'; ?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['U']; ?> value="<?php echo $id.'_U'; ?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['D']; ?> value="<?php echo $id.'_D'; ?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['P']; ?> value="<?php echo $id.'_P'; ?>"> </td>
                                                <?php
                                            }else{
                                                ?>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_V'?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_A'?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_U'?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_D'?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_P'?>"> </td>
                                            <?php
                                            }
                                        }
                                    ?>

<?php 
                                        if($type == 'HRM'){
                                            $chckd['V'] = '';
                                            $chckd['A'] = '';
                                            $chckd['U'] = '';
                                            $chckd['D'] = '';
                                            $chckd['P'] = '';
                                            if(!empty($data['hrmmaster_list'])) {
                                                for($i=0; $i < count($data['hrmmaster_list']); $i++) {
                                                    $shrt_frm;
                                                    if($data['hrmmaster_list'][$i] != '') $shrt_frm = strtolower($data['hrmmaster_list'][$i]);

                                                    if($val->short_form == $shrt_frm) {
                                                        foreach($actions as $rows => &$keys) {
                                                            if($rows == $shrt_frm) {
                                                                $chckd['V'] = ( (in_array('V',$keys)) ? 'checked' : '');
                                                                $chckd['A'] = ( (in_array('A',$keys)) ? 'checked' : '');
                                                                $chckd['U'] = ( (in_array('U',$keys)) ? 'checked' : '');
                                                                $chckd['D'] = ( (in_array('D',$keys)) ? 'checked' : '');
                                                                $chckd['P'] = ( (in_array('P',$keys)) ? 'checked' : '');

                                                            }
                                                        }
                                                    }
                                                }
                                                ?>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['V']; ?> value="<?php echo $id.'_V'; ?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['A']; ?> value="<?php echo $id.'_A'; ?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['U']; ?> value="<?php echo $id.'_U'; ?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['D']; ?> value="<?php echo $id.'_D'; ?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['P']; ?> value="<?php echo $id.'_P'; ?>"> </td>
                                                <?php
                                            }else{
                                                ?>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_V'?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_A'?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_U'?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_D'?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_P'?>"> </td>
                                            <?php
                                            }
                                        }
                                    ?>



<?php 
                                        if($type == 'Transaction Master'){
                                            $chckd['V'] = '';
                                            $chckd['A'] = '';
                                            $chckd['U'] = '';
                                            $chckd['D'] = '';
                                            $chckd['P'] = '';
                                            if(!empty($data['transactionmaster_list'])) {
                                                for($i=0; $i < count($data['transactionmaster_list']); $i++) {
                                                    $shrt_frm;
                                                    if($data['transactionmaster_list'][$i] != '') $shrt_frm = strtolower($data['transactionmaster_list'][$i]);

                                                    if($val->short_form == $shrt_frm) {
                                                        foreach($actions as $rows => &$keys) {
                                                            if($rows == $shrt_frm) {
                                                                $chckd['V'] = ( (in_array('V',$keys)) ? 'checked' : '');
                                                                $chckd['A'] = ( (in_array('A',$keys)) ? 'checked' : '');
                                                                $chckd['U'] = ( (in_array('U',$keys)) ? 'checked' : '');
                                                                $chckd['D'] = ( (in_array('D',$keys)) ? 'checked' : '');
                                                                $chckd['P'] = ( (in_array('P',$keys)) ? 'checked' : '');

                                                            }
                                                        }
                                                    }
                                                }
                                                ?>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['V']; ?> value="<?php echo $id.'_V'; ?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['A']; ?> value="<?php echo $id.'_A'; ?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['U']; ?> value="<?php echo $id.'_U'; ?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['D']; ?> value="<?php echo $id.'_D'; ?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['P']; ?> value="<?php echo $id.'_P'; ?>"> </td>
                                                <?php
                                            }else{
                                                ?>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_V'?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_A'?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_U'?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_D'?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_P'?>"> </td>
                                            <?php
                                            }
                                        }
                                    ?>


<?php 
                                        if($type == 'Supply Chain'){
                                            $chckd['V'] = '';
                                            $chckd['A'] = '';
                                            $chckd['U'] = '';
                                            $chckd['D'] = '';
                                            $chckd['P'] = '';
                                            if(!empty($data['supplychain_list'])) {
                                                for($i=0; $i < count($data['supplychain_list']); $i++) {
                                                    $shrt_frm;
                                                    if($data['supplychain_list'][$i] != '') $shrt_frm = strtolower($data['supplychain_list'][$i]);

                                                    if($val->short_form == $shrt_frm) {
                                                        foreach($actions as $rows => &$keys) {
                                                            if($rows == $shrt_frm) {
                                                                $chckd['V'] = ( (in_array('V',$keys)) ? 'checked' : '');
                                                                $chckd['A'] = ( (in_array('A',$keys)) ? 'checked' : '');
                                                                $chckd['U'] = ( (in_array('U',$keys)) ? 'checked' : '');
                                                                $chckd['D'] = ( (in_array('D',$keys)) ? 'checked' : '');
                                                                $chckd['P'] = ( (in_array('P',$keys)) ? 'checked' : '');

                                                            }
                                                        }
                                                    }
                                                }
                                                ?>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['V']; ?> value="<?php echo $id.'_V'; ?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['A']; ?> value="<?php echo $id.'_A'; ?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['U']; ?> value="<?php echo $id.'_U'; ?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['D']; ?> value="<?php echo $id.'_D'; ?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['P']; ?> value="<?php echo $id.'_P'; ?>"> </td>
                                                <?php
                                            }else{
                                                ?>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_V'?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_A'?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_U'?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_D'?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_P'?>"> </td>
                                            <?php
                                            }
                                        }
                                    ?>


<?php 
                                        if($type == 'Patient'){
                                            $chckd['V'] = '';
                                            $chckd['A'] = '';
                                            $chckd['U'] = '';
                                            $chckd['D'] = '';
                                            $chckd['P'] = '';
                                            if(!empty($data['patient_list'])) {
                                                for($i=0; $i < count($data['patient_list']); $i++) {
                                                    $shrt_frm;
                                                    if($data['patient_list'][$i] != '') $shrt_frm = strtolower($data['patient_list'][$i]);

                                                    if($val->short_form == $shrt_frm) {
                                                        foreach($actions as $rows => &$keys) {
                                                            if($rows == $shrt_frm) {
                                                                $chckd['V'] = ( (in_array('V',$keys)) ? 'checked' : '');
                                                                $chckd['A'] = ( (in_array('A',$keys)) ? 'checked' : '');
                                                                $chckd['U'] = ( (in_array('U',$keys)) ? 'checked' : '');
                                                                $chckd['D'] = ( (in_array('D',$keys)) ? 'checked' : '');
                                                                $chckd['P'] = ( (in_array('P',$keys)) ? 'checked' : '');

                                                            }
                                                        }
                                                    }
                                                }
                                                ?>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['V']; ?> value="<?php echo $id.'_V'; ?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['A']; ?> value="<?php echo $id.'_A'; ?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['U']; ?> value="<?php echo $id.'_U'; ?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['D']; ?> value="<?php echo $id.'_D'; ?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['P']; ?> value="<?php echo $id.'_P'; ?>"> </td>
                                                <?php
                                            }else{
                                                ?>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_V'?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_A'?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_U'?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_D'?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_P'?>"> </td>
                                            <?php
                                            }
                                        }
                                    ?>

                                      



<?php 
                                        if($type == 'Blood Bank'){
                                            $chckd['V'] = '';
                                            $chckd['A'] = '';
                                            $chckd['U'] = '';
                                            $chckd['D'] = '';
                                            $chckd['P'] = '';
                                            if(!empty($data['bloodbank_list'])) {
                                                for($i=0; $i < count($data['bloodbank_list']); $i++) {
                                                    $shrt_frm;
                                                    if($data['bloodbank_list'][$i] != '') $shrt_frm = strtolower($data['bloodbank_list'][$i]);

                                                    if($val->short_form == $shrt_frm) {
                                                        foreach($actions as $rows => &$keys) {
                                                            if($rows == $shrt_frm) {
                                                                $chckd['V'] = ( (in_array('V',$keys)) ? 'checked' : '');
                                                                $chckd['A'] = ( (in_array('A',$keys)) ? 'checked' : '');
                                                                $chckd['U'] = ( (in_array('U',$keys)) ? 'checked' : '');
                                                                $chckd['D'] = ( (in_array('D',$keys)) ? 'checked' : '');
                                                                $chckd['P'] = ( (in_array('P',$keys)) ? 'checked' : '');

                                                            }
                                                        }
                                                    }
                                                }
                                                ?>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['V']; ?> value="<?php echo $id.'_V'; ?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['A']; ?> value="<?php echo $id.'_A'; ?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['U']; ?> value="<?php echo $id.'_U'; ?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['D']; ?> value="<?php echo $id.'_D'; ?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['P']; ?> value="<?php echo $id.'_P'; ?>"> </td>
                                                <?php
                                            }else{
                                                ?>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_V'?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_A'?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_U'?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_D'?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_P'?>"> </td>
                                            <?php
                                            }
                                        }
                                    ?>

<?php 
                                        if($type == 'Documents'){
                                            $chckd['V'] = '';
                                            $chckd['A'] = '';
                                            $chckd['U'] = '';
                                            $chckd['D'] = '';
                                            $chckd['P'] = '';
                                            if(!empty($data['documents_list'])) {
                                                for($i=0; $i < count($data['documents_list']); $i++) {
                                                    $shrt_frm;
                                                    if($data['documents_list'][$i] != '') $shrt_frm = strtolower($data['documents_list'][$i]);

                                                    if($val->short_form == $shrt_frm) {
                                                        foreach($actions as $rows => &$keys) {
                                                            if($rows == $shrt_frm) {
                                                                $chckd['V'] = ( (in_array('V',$keys)) ? 'checked' : '');
                                                                $chckd['A'] = ( (in_array('A',$keys)) ? 'checked' : '');
                                                                $chckd['U'] = ( (in_array('U',$keys)) ? 'checked' : '');
                                                                $chckd['D'] = ( (in_array('D',$keys)) ? 'checked' : '');
                                                                $chckd['P'] = ( (in_array('P',$keys)) ? 'checked' : '');

                                                            }
                                                        }
                                                    }
                                                }
                                                ?>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['V']; ?> value="<?php echo $id.'_V'; ?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['A']; ?> value="<?php echo $id.'_A'; ?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['U']; ?> value="<?php echo $id.'_U'; ?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['D']; ?> value="<?php echo $id.'_D'; ?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['P']; ?> value="<?php echo $id.'_P'; ?>"> </td>
                                                <?php
                                            }else{
                                                ?>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_V'?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_A'?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_U'?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_D'?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_P'?>"> </td>
                                            <?php
                                            }
                                        }
                                    ?>


<?php 
                                        if($type == 'Doctor'){
                                            $chckd['V'] = '';
                                            $chckd['A'] = '';
                                            $chckd['U'] = '';
                                            $chckd['D'] = '';
                                            $chckd['P'] = '';
                                            if(!empty($data['doctor_list'])) {
                                                for($i=0; $i < count($data['doctor_list']); $i++) {
                                                    $shrt_frm;
                                                    if($data['doctor_list'][$i] != '') $shrt_frm = strtolower($data['doctor_list'][$i]);

                                                    if($val->short_form == $shrt_frm) {
                                                        foreach($actions as $rows => &$keys) {
                                                            if($rows == $shrt_frm) {
                                                                $chckd['V'] = ( (in_array('V',$keys)) ? 'checked' : '');
                                                                $chckd['A'] = ( (in_array('A',$keys)) ? 'checked' : '');
                                                                $chckd['U'] = ( (in_array('U',$keys)) ? 'checked' : '');
                                                                $chckd['D'] = ( (in_array('D',$keys)) ? 'checked' : '');
                                                                $chckd['P'] = ( (in_array('P',$keys)) ? 'checked' : '');

                                                            }
                                                        }
                                                    }
                                                }
                                                ?>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['V']; ?> value="<?php echo $id.'_V'; ?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['A']; ?> value="<?php echo $id.'_A'; ?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['U']; ?> value="<?php echo $id.'_U'; ?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['D']; ?> value="<?php echo $id.'_D'; ?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['P']; ?> value="<?php echo $id.'_P'; ?>"> </td>
                                                <?php
                                            }else{
                                                ?>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_V'?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_A'?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_U'?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_D'?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_P'?>"> </td>
                                            <?php
                                            }
                                        }
                                    ?>



<?php 
                                        if($type == 'Diagnosis'){
                                            $chckd['V'] = '';
                                            $chckd['A'] = '';
                                            $chckd['U'] = '';
                                            $chckd['D'] = '';
                                            $chckd['P'] = '';
                                            if(!empty($data['diagnosis_list'])) {
                                                for($i=0; $i < count($data['diagnosis_list']); $i++) {
                                                    $shrt_frm;
                                                    if($data['diagnosis_list'][$i] != '') $shrt_frm = strtolower($data['diagnosis_list'][$i]);

                                                    if($val->short_form == $shrt_frm) {
                                                        foreach($actions as $rows => &$keys) {
                                                            if($rows == $shrt_frm) {
                                                                $chckd['V'] = ( (in_array('V',$keys)) ? 'checked' : '');
                                                                $chckd['A'] = ( (in_array('A',$keys)) ? 'checked' : '');
                                                                $chckd['U'] = ( (in_array('U',$keys)) ? 'checked' : '');
                                                                $chckd['D'] = ( (in_array('D',$keys)) ? 'checked' : '');
                                                                $chckd['P'] = ( (in_array('P',$keys)) ? 'checked' : '');

                                                            }
                                                        }
                                                    }
                                                }
                                                ?>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['V']; ?> value="<?php echo $id.'_V'; ?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['A']; ?> value="<?php echo $id.'_A'; ?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['U']; ?> value="<?php echo $id.'_U'; ?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['D']; ?> value="<?php echo $id.'_D'; ?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['P']; ?> value="<?php echo $id.'_P'; ?>"> </td>
                                                <?php
                                            }else{
                                                ?>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_V'?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_A'?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_U'?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_D'?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_P'?>"> </td>
                                            <?php
                                            }
                                        }
                                    ?>



<?php 
                                        if($type == 'Finance'){
                                            $chckd['V'] = '';
                                            $chckd['A'] = '';
                                            $chckd['U'] = '';
                                            $chckd['D'] = '';
                                            $chckd['P'] = '';
                                            if(!empty($data['finance_list'])) {
                                                for($i=0; $i < count($data['finance_list']); $i++) {
                                                    $shrt_frm;
                                                    if($data['finance_list'][$i] != '') $shrt_frm = strtolower($data['finance_list'][$i]);

                                                    if($val->short_form == $shrt_frm) {
                                                        foreach($actions as $rows => &$keys) {
                                                            if($rows == $shrt_frm) {
                                                                $chckd['V'] = ( (in_array('V',$keys)) ? 'checked' : '');
                                                                $chckd['A'] = ( (in_array('A',$keys)) ? 'checked' : '');
                                                                $chckd['U'] = ( (in_array('U',$keys)) ? 'checked' : '');
                                                                $chckd['D'] = ( (in_array('D',$keys)) ? 'checked' : '');
                                                                $chckd['P'] = ( (in_array('P',$keys)) ? 'checked' : '');

                                                            }
                                                        }
                                                    }
                                                }
                                                ?>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['V']; ?> value="<?php echo $id.'_V'; ?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['A']; ?> value="<?php echo $id.'_A'; ?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['U']; ?> value="<?php echo $id.'_U'; ?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['D']; ?> value="<?php echo $id.'_D'; ?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['P']; ?> value="<?php echo $id.'_P'; ?>"> </td>
                                                <?php
                                            }else{
                                                ?>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_V'?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_A'?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_U'?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_D'?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_P'?>"> </td>
                                            <?php
                                            }
                                        }
                                    ?>

<?php 
                                        if($type == 'Front Office'){
                                            $chckd['V'] = '';
                                            $chckd['A'] = '';
                                            $chckd['U'] = '';
                                            $chckd['D'] = '';
                                            $chckd['P'] = '';
                                            if(!empty($data['frontoffice_list'])) {
                                                for($i=0; $i < count($data['frontoffice_list']); $i++) {
                                                    $shrt_frm;
                                                    if($data['frontoffice_list'][$i] != '') $shrt_frm = strtolower($data['frontoffice_list'][$i]);

                                                    if($val->short_form == $shrt_frm) {
                                                        foreach($actions as $rows => &$keys) {
                                                            if($rows == $shrt_frm) {
                                                                $chckd['V'] = ( (in_array('V',$keys)) ? 'checked' : '');
                                                                $chckd['A'] = ( (in_array('A',$keys)) ? 'checked' : '');
                                                                $chckd['U'] = ( (in_array('U',$keys)) ? 'checked' : '');
                                                                $chckd['D'] = ( (in_array('D',$keys)) ? 'checked' : '');
                                                                $chckd['P'] = ( (in_array('P',$keys)) ? 'checked' : '');

                                                            }
                                                        }
                                                    }
                                                }
                                                ?>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['V']; ?> value="<?php echo $id.'_V'; ?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['A']; ?> value="<?php echo $id.'_A'; ?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['U']; ?> value="<?php echo $id.'_U'; ?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['D']; ?> value="<?php echo $id.'_D'; ?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['P']; ?> value="<?php echo $id.'_P'; ?>"> </td>
                                                <?php
                                            }else{
                                                ?>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_V'?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_A'?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_U'?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_D'?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_P'?>"> </td>
                                            <?php
                                            }
                                        }
                                    ?>

<?php 
                                        if($type == 'Front CMS'){
                                            $chckd['V'] = '';
                                            $chckd['A'] = '';
                                            $chckd['U'] = '';
                                            $chckd['D'] = '';
                                            $chckd['P'] = '';
                                            if(!empty($data['frontcms_list'])) {
                                                for($i=0; $i < count($data['frontcms_list']); $i++) {
                                                    $shrt_frm;
                                                    if($data['frontcms_list'][$i] != '') $shrt_frm = strtolower($data['frontcms_list'][$i]);

                                                    if($val->short_form == $shrt_frm) {
                                                        foreach($actions as $rows => &$keys) {
                                                            if($rows == $shrt_frm) {
                                                                $chckd['V'] = ( (in_array('V',$keys)) ? 'checked' : '');
                                                                $chckd['A'] = ( (in_array('A',$keys)) ? 'checked' : '');
                                                                $chckd['U'] = ( (in_array('U',$keys)) ? 'checked' : '');
                                                                $chckd['D'] = ( (in_array('D',$keys)) ? 'checked' : '');
                                                                $chckd['P'] = ( (in_array('P',$keys)) ? 'checked' : '');

                                                            }
                                                        }
                                                    }
                                                }
                                                ?>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['V']; ?> value="<?php echo $id.'_V'; ?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['A']; ?> value="<?php echo $id.'_A'; ?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['U']; ?> value="<?php echo $id.'_U'; ?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['D']; ?> value="<?php echo $id.'_D'; ?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['P']; ?> value="<?php echo $id.'_P'; ?>"> </td>
                                                <?php
                                            }else{
                                                ?>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_V'?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_A'?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_U'?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_D'?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_P'?>"> </td>
                                            <?php
                                            }
                                        }
                                    ?>



<?php 
                                        if($type == 'Hospital Charges'){
                                            $chckd['V'] = '';
                                            $chckd['A'] = '';
                                            $chckd['U'] = '';
                                            $chckd['D'] = '';
                                            $chckd['P'] = '';
                                            if(!empty($data['hospitalcharges_list'])) {
                                                for($i=0; $i < count($data['hospitalcharges_list']); $i++) {
                                                    $shrt_frm;
                                                    if($data['hospitalcharges_list'][$i] != '') $shrt_frm = strtolower($data['hospitalcharges_list'][$i]);

                                                    if($val->short_form == $shrt_frm) {
                                                        foreach($actions as $rows => &$keys) {
                                                            if($rows == $shrt_frm) {
                                                                $chckd['V'] = ( (in_array('V',$keys)) ? 'checked' : '');
                                                                $chckd['A'] = ( (in_array('A',$keys)) ? 'checked' : '');
                                                                $chckd['U'] = ( (in_array('U',$keys)) ? 'checked' : '');
                                                                $chckd['D'] = ( (in_array('D',$keys)) ? 'checked' : '');
                                                                $chckd['P'] = ( (in_array('P',$keys)) ? 'checked' : '');

                                                            }
                                                        }
                                                    }
                                                }
                                                ?>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['V']; ?> value="<?php echo $id.'_V'; ?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['A']; ?> value="<?php echo $id.'_A'; ?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['U']; ?> value="<?php echo $id.'_U'; ?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['D']; ?> value="<?php echo $id.'_D'; ?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['P']; ?> value="<?php echo $id.'_P'; ?>"> </td>
                                                <?php
                                            }else{
                                                ?>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_V'?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_A'?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_U'?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_D'?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_P'?>"> </td>
                                            <?php
                                            }
                                        }
                                    ?>


<?php 
                                        if($type == 'Reports'){
                                            $chckd['V'] = '';
                                            $chckd['A'] = '';
                                            $chckd['U'] = '';
                                            $chckd['D'] = '';
                                            $chckd['P'] = '';
                                            if(!empty($data['reports_list'])) {
                                                for($i=0; $i < count($data['reports_list']); $i++) {
                                                    $shrt_frm;
                                                    if($data['reports_list'][$i] != '') $shrt_frm = strtolower($data['reports_list'][$i]);

                                                    if($val->short_form == $shrt_frm) {
                                                        foreach($actions as $rows => &$keys) {
                                                            if($rows == $shrt_frm) {
                                                                $chckd['V'] = ( (in_array('V',$keys)) ? 'checked' : '');
                                                                $chckd['A'] = ( (in_array('A',$keys)) ? 'checked' : '');
                                                                $chckd['U'] = ( (in_array('U',$keys)) ? 'checked' : '');
                                                                $chckd['D'] = ( (in_array('D',$keys)) ? 'checked' : '');
                                                                $chckd['P'] = ( (in_array('P',$keys)) ? 'checked' : '');

                                                            }
                                                        }
                                                    }
                                                }
                                                ?>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['V']; ?> value="<?php echo $id.'_V'; ?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['A']; ?> value="<?php echo $id.'_A'; ?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['U']; ?> value="<?php echo $id.'_U'; ?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['D']; ?> value="<?php echo $id.'_D'; ?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['P']; ?> value="<?php echo $id.'_P'; ?>"> </td>
                                                <?php
                                            }else{
                                                ?>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_V'?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_A'?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_U'?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_D'?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_P'?>"> </td>
                                            <?php
                                            }
                                        }
                                    ?>


<?php 
                                        if($type == 'Services'){
                                            $chckd['V'] = '';
                                            $chckd['A'] = '';
                                            $chckd['U'] = '';
                                            $chckd['D'] = '';
                                            $chckd['P'] = '';
                                            if(!empty($data['services_list'])) {
                                                for($i=0; $i < count($data['services_list']); $i++) {
                                                    $shrt_frm;
                                                    if($data['services_list'][$i] != '') $shrt_frm = strtolower($data['services_list'][$i]);

                                                    if($val->short_form == $shrt_frm) {
                                                        foreach($actions as $rows => &$keys) {
                                                            if($rows == $shrt_frm) {
                                                                $chckd['V'] = ( (in_array('V',$keys)) ? 'checked' : '');
                                                                $chckd['A'] = ( (in_array('A',$keys)) ? 'checked' : '');
                                                                $chckd['U'] = ( (in_array('U',$keys)) ? 'checked' : '');
                                                                $chckd['D'] = ( (in_array('D',$keys)) ? 'checked' : '');
                                                                $chckd['P'] = ( (in_array('P',$keys)) ? 'checked' : '');

                                                            }
                                                        }
                                                    }
                                                }
                                                ?>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['V']; ?> value="<?php echo $id.'_V'; ?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['A']; ?> value="<?php echo $id.'_A'; ?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['U']; ?> value="<?php echo $id.'_U'; ?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['D']; ?> value="<?php echo $id.'_D'; ?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['P']; ?> value="<?php echo $id.'_P'; ?>"> </td>
                                                <?php
                                            }else{
                                                ?>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_V'?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_A'?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_U'?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_D'?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_P'?>"> </td>
                                            <?php
                                            }
                                        }
                                    ?>



<?php 
                                        if($type == 'SMS/Mail'){
                                            $chckd['V'] = '';
                                            $chckd['A'] = '';
                                            $chckd['U'] = '';
                                            $chckd['D'] = '';
                                            $chckd['P'] = '';
                                            if(!empty($data['smsmail_list'])) {
                                                for($i=0; $i < count($data['smsmail_list']); $i++) {
                                                    $shrt_frm;
                                                    if($data['smsmail_list'][$i] != '') $shrt_frm = strtolower($data['smsmail_list'][$i]);

                                                    if($val->short_form == $shrt_frm) {
                                                        foreach($actions as $rows => &$keys) {
                                                            if($rows == $shrt_frm) {
                                                                $chckd['V'] = ( (in_array('V',$keys)) ? 'checked' : '');
                                                                $chckd['A'] = ( (in_array('A',$keys)) ? 'checked' : '');
                                                                $chckd['U'] = ( (in_array('U',$keys)) ? 'checked' : '');
                                                                $chckd['D'] = ( (in_array('D',$keys)) ? 'checked' : '');
                                                                $chckd['P'] = ( (in_array('P',$keys)) ? 'checked' : '');

                                                            }
                                                        }
                                                    }
                                                }
                                                ?>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['V']; ?> value="<?php echo $id.'_V'; ?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['A']; ?> value="<?php echo $id.'_A'; ?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['U']; ?> value="<?php echo $id.'_U'; ?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['D']; ?> value="<?php echo $id.'_D'; ?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['P']; ?> value="<?php echo $id.'_P'; ?>"> </td>
                                                <?php
                                            }else{
                                                ?>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_V'?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_A'?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_U'?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_D'?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_P'?>"> </td>
                                            <?php
                                            }
                                        }
                                    ?>


<?php 
                                        if($type == 'Setting'){
                                            $chckd['V'] = '';
                                            $chckd['A'] = '';
                                            $chckd['U'] = '';
                                            $chckd['D'] = '';
                                            $chckd['P'] = '';
                                            if(!empty($data['setting_list'])) {
                                                for($i=0; $i < count($data['setting_list']); $i++) {
                                                    $shrt_frm;
                                                    if($data['setting_list'][$i] != '') $shrt_frm = strtolower($data['setting_list'][$i]);

                                                    if($val->short_form == $shrt_frm) {
                                                        foreach($actions as $rows => &$keys) {
                                                            if($rows == $shrt_frm) {
                                                                $chckd['V'] = ( (in_array('V',$keys)) ? 'checked' : '');
                                                                $chckd['A'] = ( (in_array('A',$keys)) ? 'checked' : '');
                                                                $chckd['U'] = ( (in_array('U',$keys)) ? 'checked' : '');
                                                                $chckd['D'] = ( (in_array('D',$keys)) ? 'checked' : '');
                                                                $chckd['P'] = ( (in_array('P',$keys)) ? 'checked' : '');

                                                            }
                                                        }
                                                    }
                                                }
                                                ?>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['V']; ?> value="<?php echo $id.'_V'; ?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['A']; ?> value="<?php echo $id.'_A'; ?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['U']; ?> value="<?php echo $id.'_U'; ?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['D']; ?> value="<?php echo $id.'_D'; ?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" <?php echo $chckd['P']; ?> value="<?php echo $id.'_P'; ?>"> </td>
                                                <?php
                                            }else{
                                                ?>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_V'?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_A'?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_U'?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_D'?>"> </td>
                                                    <td><input type="checkbox" name="actions[]" value="<?php echo $id.'_P'?>"> </td>
                                            <?php
                                            }
                                        }
                                    ?>



























                                    










                                    </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
 </div>
                   <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-primary mt-3">save</button>
                    </div>
                   </form>
                </div>
            </div>
        </div>
 @endsection







